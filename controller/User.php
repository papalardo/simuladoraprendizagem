<?php

$login = new Usuario();


if(empty($_GET['acao'])) {
    #include base_url('view/login/index.php');
    include 'view/login/index.php';
 }

if (isset($_GET['acao']) && $_GET['acao'] == 'panel') { include 'view/login/panel.php' ;}
if (isset($_GET['acao']) && $_GET['acao'] == 'foto') { include 'tpl/login/foto.usuario.php' ;}
if (isset($_GET['acao']) && $_GET['acao'] == 'edit') { include 'tpl/usuario/edit.usuario.php' ;}


if (isset($_POST['entrar'])){

// resgata variáveis do formulário
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($username) || empty($password)){
    setcookie('msg',"Dados em branco!");
    } else {



            // o html special e strip_tags serve para evitar a tentativa de sql_eject no BD
            $username  = htmlspecialchars(strip_tags($_POST['username']));
			$password = htmlspecialchars(strip_tags($_POST['password']));

			$pefil->__set('descricao', $descricao);


            if ($perfil->adicionar()){
                setcookie('msg',"Novo perfil cadastrado!");
            } else {
                setcookie('msg',"Ocorreu algum erro..");
            }

    }
    redirect('index.php?pag=perfil');
}


if (isset($_GET['acao']) && $_GET['acao'] == 'listar') {
    $teste = 'kkkk';
    include 'tpl/usuario/edit.usuario.php' ;
}

?>
