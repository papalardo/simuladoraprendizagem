<?php

/*

Carrega o model com as classes

*/
require_once base_url('model/classes.php');

/*

Cria novo objeto

*/
$login = new Usuario();

/*

Carrega o Template

*/

#$data = array('title' => 'Simulador de logistica', 'content' => '');
#$tmpl = new Template('view/tpl/login.php', $data);
#echo $tmpl->render();



/*

Carrega as views de acordo com o GET['acao']

*/

#verifica_logon();


if ( empty($_GET['acao']) ) { $_GET['acao'] = 'index'; }

switch ( $_GET['acao'] ) {
    case 'index':
        $tmpl = new Template('templates/login.php');
        echo $tmpl->render();
        include 'view/login/index.php';
        break;
    case 'panel':
        $tmpl = new Template('templates/template.tpl','view/login/panel.php', array('titulo' => 'Painel usuario'));
        echo $tmpl->render();
        #include 'view/login/panel.php' ;
        break;
    case 'logout':
        session_destroy(); #Destroi a sessão
        setcookie('msg',"Deslogado!"); #Guarda mensagem
        redirect('?pag=login'); #Redireciona para página de login
        break;
    case 'login':
        $resposta = autenticar();
        if ( $resposta === TRUE ){ # Se for autenticado com sucesso, redireciona para o painel
            redirect('?pag=login&acao=panel');
        } else {
            setcookie('msg', $resposta );
            redirect('?pag=login'); #Se não for autenticado, redireciona para a tela de login
        }
        break;
}

/*

Execução dos métodos



if (isset($_POST)) { #Quando algum $_POST for lançado, será verificado qual e executará a função um método (funções logo abaixo).
    switch (isset($_POST['acao'])){
        case 'entrar':
            autenticar();
            break;
    }
}

*/


/*

Métodos

*/
function autenticar(){
    $login = new Usuario();
    /* resgata variáveis do formulário */
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($username) || empty($password)){ #Verifica se os dados estão todo preenchidos
        return 'Campos em branco.';
        } else {
                /* Cria o HASH MD5 da senha */
                #$passwordHash = md5($password);

                /* O html special e strip_tags serve para evitar a tentativa de sql_eject no BD */
                $username  = htmlspecialchars(strip_tags($_POST['username']));
                $password = htmlspecialchars(strip_tags($_POST['password']));

                $login->__set('username', $username);
                $login->__set('password', $password); # __set da senha SEM HASH
                #$login->__set('password', $passwordHash); # __set da senha COM HASH

                $user = $login->procurarPorUsername(); #Verifica se o Username existe
                if ($user) {
                    if ($user->senha_usu == $login->__get('password')){ #Se usuario existe, compara a senha
                        /* Se a senha for igual, seta as sessions. */
                        $_SESSION['logged_in'] = TRUE;
                        $_SESSION['user_id'] = $user->id_usu;
                        $_SESSION['nome_usu'] = $user->nome_usu;
                        $_SESSION['email_usu'] = $user->email_usu;
                        $_SESSION['sexo_usu'] = $user->sexo_usu;
                        return TRUE;
                        #redirect('?pag=login&acao=panel'); #Depois de setar as sessions, redireciona para o panel
                    } else {
                        // Se a senha for diferente..
                        return 'Senha inválida.';
                    }
                } else {
                    //Se nao achou o usuario..
                    return 'Usuario não cadastrado.';
                }

    }
}



?>
