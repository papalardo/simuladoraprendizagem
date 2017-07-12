<?php

/*

Carrega o model com as classes

*/
require_once base_url('model/classes.php');

/*

Cria novo objeto

*/
$usuario = new Usuario();
$perfil = new Perfil();

/*

Carrega as views de acordo com o GET['acao']

*/

if ( empty($_GET['acao']) ) { $_GET['acao'] = 'index'; }

switch ( $_GET['acao'] ) {
    case 'index':
        #$perfis = $perfil->listarTodos();
        #include 'view/usuario/index.php';
        $data = array('titulo' => 'Painel usuario',
                      'perfis' => $perfil->listarTodos(),
                     'header' => 'Usurios',
                    'sub_header' => 'adicionar');

        $tmpl = new Template('templates/template.tpl','view/usuario/index.php', $data);
        echo $tmpl->render();
        break;
    case 'listar':
        #$listar = $usuario->listarTodos();
        $data = array('titulo' => 'Painel usuario',
                      'listar' => $usuario->listarTodos(),
                        'header' => 'Usurios',
                        'sub_header' => 'listar');
        $tmpl = new Template('templates/template.tpl','view/usuario/listar.php', $data);
        echo $tmpl->render();
        #include 'view/usuario/listar.php' ;
        break;
    case 'editar':
        $id = $_GET['id'];
        $resultado = $usuario->procurar($id);
        include 'view/usuario/editar.php';
        break;
    case 'deletar':
        $id = $_GET['id'];
        if ($usuario->deletar($id)){
            setcookie('msg',"Deletado!");
        }
        redirect('?pag=usuario&acao=listar');
        break;
    case 'novo':
        $return =  adicionar();
        setcookie('msg', $return);
        redirect('?pag=usuario');
        break;
    case 'atualizar':
        $return = atualizar();
        setcookie('msg', $return);
        redirect('?pag=usuario&acao=editar&id=' . $_GET['id']);
        break;
}

/*

Execução dos métodos


if (isset($_POST['acao'])) { #Quando algum $_POST for lançado, será verificado qual e executará a função um método (funções logo abaixo).
    switch ($_POST['acao']){
        case 'novo':
            adicionar();
            break;
        case 'update':
            atualizar();
            break;
    }
}


*/


/*

Metodos

*/
function atualizar(){
$usuario = new Usuario(); #Cria novo objeto

    $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $perfil = isset($_POST['perfil']) ? $_POST['perfil'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';

if (empty($username)){ #Verifica se os campos estão preenchidos
    return 'Dados em branco!'; #Se não tiver, armazena mensagem para mostrar.
    } else {
            $nome = htmlspecialchars(strip_tags($_POST['nome']));

            $usuario->__set('nome', $nome);
            $usuario->__set('sobrenome', $sobrenome);
            $usuario->__set('email', $email);
            $usuario->__set('username', $username);
            $usuario->__set('senha', $senha);
            $usuario->__set('cpf', $cpf);
            $usuario->__set('perfil', $perfil);
            $usuario->__set('sexo', $sexo);
            #$perfil->__set('avatar', $descricao);

            #$descricao  = htmlspecialchars(strip_tags($_POST['descricao']));

            $id = $_GET['id']; #Pega o ID para localizar no Banco de dados
            if ($usuario->atualizar($id)){ #Aqui faz o insert e seta um cookie para mostrar depois, dependendo da situação (se deu certo ou não)
                return 'Dados atualizados!';
                } else {
                return 'Ocorreu algum erro..';
            }

    }
    #return $msg;
   #redirect('index.php?pag=perfil&acao=editar&id='.$id);  #Tudo feito, redireciona de volta à página, evitando looping de requisições.
   # redirect('index.php?pag=usuario&acao=listar');  #Tudo feito, redireciona de volta à página, evitando looping de requisições.
}


function adicionar(){
$usuario = new Usuario();
    // resgata variáveis do formulário
    $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $perfil = isset($_POST['perfil']) ? $_POST['perfil'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';

    #$tipo_alerta = 'danger'; #Coloca como DEFAULT o alerta como ERRO.

    if (empty($username)){ #Verifica se os campos estão preenchidos
        return 'Dados em branco!'; #Se não tiver, armazena mensagem para mostrar.
        } else {

                if ( ($usuario->procurarEm('email_usu', $email)) || ($usuario->procurarEm('username_usu', $username)) ){
                   return 'Email ou Username ja utilizado!'; #Verifica se ja existe um email ou username com o valor digitado.
                } else {
                    #$descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                    $usuario->__set('nome', $nome);
                    $usuario->__set('sobrenome', $sobrenome);
                    $usuario->__set('email', $email);
                    $usuario->__set('username', $username);
                    $usuario->__set('senha', $senha);
                    $usuario->__set('cpf', $cpf);
                    $usuario->__set('perfil', $perfil);
                    $usuario->__set('sexo', $sexo);
                    #$perfil->__set('avatar', $descricao);
                    if ($usuario->adicionar()){ #Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
                        return 'Usuario cadastrado';
                    } else {
                        return 'Ocorreu algum erro';
                    }
                }
    }
}

?>
