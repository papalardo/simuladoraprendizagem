<?php

/*

Includes necessários

*/

require_once 'includes/functions.php';
require_once 'config/DB.php';
require_once 'model/classes.php';


session_start(); #Abrir session


if (SYSTEM_STATUS == 'em_contrucao'){ #So mostra erros se o sistema estiver em desenvolvimento
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
}


/* Includes do Layout
include base_url('view/tpl/menu-top.php'); */


?>


<title>Simulador Logistica</title>

 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0" />
    <title>Bank Fit</title>
    <meta name="description" content="Simulador Logistica" />
    <meta name="robots" content="index, follow" />
    <link rel="icon" type="image/png" href="<?=$url_base?>libs/imgs/icon.png" />
    <meta name="author" content="SENAC" />
    <link href="<?= base_url('libs/css/index.css')?>" rel="stylesheet" />
    <link href="<?= base_url('libs/css/bootstrap.css')?>" rel="stylesheet" />
    <script src="<?= base_url('libs/js/jquery.js')?>"></script>
    <script src="<?= base_url('libs/js/bootstrap.js')?>"></script>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Perfil <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"></a></li>
            <li><a href="<?= base_url('index.php?pag=perfil')?>">Adicionar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= base_url('index.php?pag=perfil&acao=listar')?>">Listar</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


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
    $url_pag_login = base_url('index.php?pag=login'); #URL da página de login (A que o usuario será redirecionado caso não esteja logado)
    $url_atual = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; # Padrão

    if ((isset($_SESSION['logged_in']) == FALSE) || empty($_SESSION['logged_in'])){
             if ($url_atual<>$url_pag_login){
                setcookie('msg','Você não está logado');
                redirect('index.php?pag=login');
             }
    }
    /* Se usuario já estiver logado e for para a página de login, é rediredicionado para o Perfil */
    if ((isset($_SESSION['logged_in']) == TRUE) && ($url_atual==$url_pag_login)){
        redirect('index.php?pag=login&acao=panel');
    }
}


?>

