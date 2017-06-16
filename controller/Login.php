<?php


require_once './model/classes.php';

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
    #echo "Dados em branco";
    #echo msg_erro("danger","ERRO","Digite todos os dados");
    } else {

// cria o hash da senha
//$passwordHash = make_hash($password);
//$passwordHash = $password;


            // o html special e strip_tags serve para evitar a tentativa de sql_eject no BD
            $username  = htmlspecialchars(strip_tags($_POST['username']));
			$password = htmlspecialchars(strip_tags($_POST['password']));

			$login->__set('username', $username);
			$login->__set('password', $password);


            // verifica se o username existe
            $user = $login->procurarPorUsername();
            if ($user) {
                //Se usuario existe, compara a senha
                if ($user->senha_usu == $login->__get('password')){
                    //Se a senha for igual, seta as sessions.
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_id'] = $user->id_usu;
                    $_SESSION['nome_usu'] = $user->nome_usu;
                    $_SESSION['email_usu'] = $user->email_usu;
                    $_SESSION['sexo_usu'] = $user->sexo_usu;
                    //Depois de setar as sessions, redireciona para o panel

                    redirect('index.php?pag=login&acao=panel');
                } else {
                    // Se a senha for diferente..
                    setcookie('msg',"Senha invalida");
                    redirect('index.php?pag=login');
                }
            } else {
                //Se nao achou o usuario..
                setcookie('msg',"Usuario nao cadastrado");
                redirect('index.php?pag=login');
            }

}
}

if (isset($_GET['acao']) && $_GET['acao'] == 'logout') {
    session_destroy();
    setcookie('msg',"Deslogado!");
    redirect('index.php?pag=login');
}

//Sempre destroi o cookie de mensagens
#unset($_COOKIE['msg']);

?>
