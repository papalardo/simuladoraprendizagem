<?php
	function __autoload($class_name){
		require_once 'models/' . strtolower($class_name) . '.class.php';
	}


$usuario = new Usuario();

?>


    <!DOCTYPE HTML>
<?php include 'index.php'; ?>

    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-item">
            <a class="nav-link" href="?acao=adicionar" role="tab">Adicionar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?acao=listar" role="tab">Listar</a>
        </li>
    </ul>

<br>
<div class="container">
<?php 
        //Chamar paginas 
        if(isset($_GET['acao']) && $_GET['acao'] == 'adicionar'){ include 'tpl/usuario/add.usuario.php'; }
        if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){ include 'tpl/usuario/edit.usuario.php';   } 
        if(empty($_GET) || $_GET['acao'] == 'listar') { include 'tpl/usuario/list.usuario.php'; } 
          

        
        if(isset($_POST['cadastrar'])){

			$usuario->setNome($_POST['nome']);
			$usuario->setEmail($_POST['email']);
			$usuario->setCpf($_POST['cpf']);

			# Insert
			if($usuario->adicionar()){
				 echo "Cadastrado";
			}

		} # Termina Cadastro

		
		if(isset($_POST['atualizar'])){

			$usuario->setNome($_POST['nome']);
			$usuario->setEmail($_POST['email']);
			$usuario->setCpf($_POST['cpf']);
            $id = $_GET['id'];
            
			if($usuario->atualizar($id)){
				echo "Atualizado";  
			}

		} #Termina Update
		

        if(isset($_GET['acao']) && $_GET['acao'] == 'deletar') {

			$id = (int)$_GET['id'];
			if($usuario->deletar($id)){
                echo msg_erro("success","Feito!","Horario deletado!"); 
				include 'tpl/horario/list.horario.php';
                
			}

		}//Fecha Delete
        
		?>
    
  </div>