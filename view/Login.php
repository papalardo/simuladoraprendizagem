<?php
	function __autoload($class_name){
		require_once 'models/' . strtolower($class_name) . '.class.php';
	}


$usuario = new Usuario();

?>


    <!DOCTYPE HTML>
<?php include 'index.php';

        //Chamar paginas 
        if(isset($_GET['acao']) && $_GET['acao'] == 'adicionar'){ include 'tpl/horario/add.horario.php'; }
        if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){ include 'tpl/horario/edit.horario.php';   } 
        if(empty($_GET)) { include 'tpl/index.php'; } 
          
          
        
        if(isset($_POST['cadastrar'])){

            
			$usuario->setNome($_POST['nome']);
			$usuario->setEmail($_POST['email']);
			$usuario->setCpf($_POST['cpf']);

			# Insert
			if($usuario->adicionar()){
				 echo msg_erro("success","Feito!","Horario cadastrado com sucesso!"); 
			}

		} # Termina Cadastro

		
		if(isset($_POST['atualizar'])){

			$horario_inicio  = $_POST['horario_inicio'];
			$horario_fim  = $_POST['horario_fim'];

			$usuario->setHoraInicial($horario_inicio);
			$usuario->setHoraFinal($horario_fim);

			if($usuario->atualizar($id)){
				echo msg_erro("success","Feito!","Horario alterado com sucesso!");    
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