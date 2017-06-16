<?php


require_once './model/classes.php';

$perfil = new Perfil();


//GET de views abaixo ------------------->
if(empty($_GET['acao'])) {
    include 'view/perfil/index.php';
 }


if (isset($_GET['acao']) && $_GET['acao'] == 'listar') {
    $listar = $perfil->listarTodos();
    include 'view/perfil/listar.php' ;
}

if (isset($_GET['acao']) && $_GET['acao'] == 'editar') {
    $id = $_GET['id'];
    $resultado = $perfil->procurar($id);
    include 'view/perfil/editar.php' ;
}



//GETs de ações abaixo ------------------->

if (isset($_POST['novo'])){

// resgata variáveis do formulário
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';

if (empty($descricao)){
    setcookie('msg',"Dados em branco!");
    } else {
            // o html special e strip_tags serve para evitar a tentativa de sql_eject no BD
            $descricao  = htmlspecialchars(strip_tags($_POST['descricao']));
            $perfil->__set('descricao', $descricao);

            //Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
            if ($perfil->adicionar()){
                setcookie('msg',"Novo perfil cadastrado!");
            } else {
                setcookie('msg',"Ocorreu algum erro..");
            }

    }
    //Tudo feito, redireciona de volta à página, evitando looping de requisições
    redirect('index.php?pag=perfil');
}

if (isset($_GET['acao']) && $_GET['acao'] == 'deletar') {
    $id = $_GET['id'];
    if ($perfil->deletar($id)){ setcookie('msg',"Deletado!"); }
    redirect('index.php?pag=perfil&acao=listar');
}

if (isset($_POST['update'])){

// resgata variáveis do formulário
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';

if (empty($descricao)){
    setcookie('msg',"Dados em branco!");
    } else {
            // o html special e strip_tags serve para evitar a tentativa de sql_eject no BD
            $descricao  = htmlspecialchars(strip_tags($_POST['descricao']));
            $perfil->__set('descricao', $descricao);
            $id = $_GET['id'];
            //Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
            if ($perfil->atualizar($id)){
                setcookie('msg',"Dados atualizados!");
            } else {
                setcookie('msg',"Ocorreu algum erro..");
            }

    }
    //Tudo feito, redireciona de volta à página, evitando looping de requisições
    redirect('index.php?pag=perfil&acao=editar&id='.$id);
}


?>
