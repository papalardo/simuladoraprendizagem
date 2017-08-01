<?php

/*

Includes necessários

*/
session_start(); #Abrir session

require_once 'includes/functions.php';
require_once 'config/DB.php';
require_once 'model/classes.php';


if (SYSTEM_STATUS == 'em_contrucao'){ #So mostra erros se o sistema estiver em desenvolvimento
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
}


/*

URI trabalhando..

*/

$uri = new Uri();
#$class = $uri->segment(2);
#$function = $uri->segment(3);

$partes_url = explode('/', $_SERVER['REQUEST_URI'] );
if ( $uri->segment(2) == TRUE ){
    $class = $uri->segment(2);
} else {
    $class = 'login';
}

if ( $uri->segment(3) == TRUE ){
    $function = $uri->segment(3);
} else {
    $function = 'index';
}

include 'controller/'.$class.'.php';
$obj = new $class;
echo $obj->$function();


/*

Function ara verificação se o usuário está logado para acessar o sistema

*/

function verifica_logon(){
    /*
    Config url
    */
    $url_pag_login = base_url('login'); #URL da página de login (A que o usuario será redirecionado caso não esteja logado)
    $url_atual = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; # Padrão

    if ((isset($_SESSION['logged_in']) == FALSE) || empty($_SESSION['logged_in'])){
             if ($url_atual<>$url_pag_login){
                setcookie('msg','Você não está logado');
                redirect('login');
             }
    }
    /* Se usuario já estiver logado e for para a página de login, é rediredicionado para o Perfil */
    if ((isset($_SESSION['logged_in']) == TRUE) && ($url_atual==$url_pag_login)){
        redirect('login&acao=panel');
    }
}
          
ob_end_flush(); 
      
?>

