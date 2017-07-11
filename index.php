<?php

/*

Includes necessários

*/
session_start(); #Abrir session

require_once 'includes/functions.php';
require_once 'config/DB.php';
require_once 'model/classes.php';



if ( ! $_GET ){
    redirect('?pag=login');
}

if (SYSTEM_STATUS == 'em_contrucao'){ #So mostra erros se o sistema estiver em desenvolvimento
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
}


/* Includes do Layout
include base_url('view/tpl/menu-top.php'); */


?>





<?php

//Abrir os controllers apartir de GET
$pag = $_GET['pag'];
include 'controller/'.$pag.'.php';


/*

Function ara verificação se o usuário está logado para acessar o sistema

*/
function verifica_logon(){
    /*
    Config url
    */
    $url_pag_login = base_url('?pag=login'); #URL da página de login (A que o usuario será redirecionado caso não esteja logado)
    $url_atual = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; # Padrão

    if ((isset($_SESSION['logged_in']) == FALSE) || empty($_SESSION['logged_in'])){
             if ($url_atual<>$url_pag_login){
                return 'Você não está logado';
                redirect('?pag=login');
             }
    }
    /* Se usuario já estiver logado e for para a página de login, é rediredicionado para o Perfil */
    if ((isset($_SESSION['logged_in']) == TRUE) && ($url_atual==$url_pag_login)){
        redirect('index.php?pag=login&acao=panel');
    }
}

ob_end_flush();

?>

