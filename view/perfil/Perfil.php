<?php
	function __autoload($class_name){
		require_once 'models/' . strtolower($class_name) . '.class.php';
	}


$perfil = new Perfil();

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
        if(isset($_GET['acao']) && $_GET['acao'] == 'adicionar'){ include 'tpl/perfil/add.perfil.php'; }
        if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){ include 'tpl/perfil/edit.perfil.php';   } 
        if(empty($_GET) || $_GET['acao'] == 'listar') { include 'tpl/perfil/list.perfil.php'; } 
          
         if(isset($_POST['cadastrar'])){

            
			$perfil->setDescricao($_POST['descricao']);

			# Insert
			if($perfil->adicionar()){
				 echo "Cadastrado";
			}

		} # Termina Cadastro

		
		if(isset($_POST['atualizar'])){

            
			$perfil->setDescricao($_POST['descricao']);

			if($perfil->atualizar($id)){
				echo msg_erro("success","Feito!","Horario alterado com sucesso!");    
			}

		} #Termina Update
		

        if(isset($_GET['acao']) && $_GET['acao'] == 'deletar') {

			$id = (int)$_GET['id'];
			if($perfil->deletar($id)){
                echo msg_erro("success","Feito!","Horario deletado!"); 
				include 'tpl/horario/list.horario.php';
                
			}

		}//Fecha Delete
        
		?>  
    
  </div>