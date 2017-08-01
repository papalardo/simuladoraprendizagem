<?php

class usuario {
    
   public function __construct(){
        #parent:: __construct();
        base_url('model/classes.php');
        $usuario = new usuario_model();
        $perfil = new Perfil();
    }

public function usarModel($nome_classe){
    $classe = new $nome_classe;
    return $classe;
}
    
public function index(){
        $perfil = new Perfil();
        $data = array('titulo' => 'Painel usuario',
                      'perfis' => $this->usarModel('usuario_model')->listarTodos(),
                     'header' => 'Usurios',
                    'sub_header' => 'adicionar');
        $tmpl = new Template('templates/template.tpl','view/usuario/index.php', $data);
        echo $tmpl->render();
}

public function listar(){
        $data = array('titulo' => 'Painel usuario',
                      'listar' => $this->usarModel('usuario_model')->listarTodos(),
                        'header' => 'Usurios',
                        'sub_header' => 'listar');
        $tmpl = new Template('templates/template.tpl','view/usuario/listar.php', $data);
        echo $tmpl->render();
}

    public function deletar(){
            $id = $this->usarModel('uri')->segment(4);
            if ($this->usarModel('usuario_model')->deletar($id)){
                setcookie('msg',"Deletado!");
            }
            redirect('usuario/listar');
    }
    
    public function editar(){
        $id = $this->usarModel('uri')->segment(4);
        $data = array('resultado' => $this->usarModel('usuario_model')->procurar($id),
                     'perfis' => $this->usarModel('usuario_model')->listarTodos());
        $tmpl = new Template('templates/template.tpl','view/usuario/editar.php', $data);
        echo $tmpl->render();
    }
    
    
    public function novo(){
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
        setcookie('msg','Dados em branco!'); #Se não tiver, armazena mensagem para mostrar.
        redirect('usuario/index');
        } else {

                if ( ($this->usarModel('usuario_model')->procurarEm('email_usu', $email)) || ($this->usarModel('usuario_model')->procurarEm('username_usu', $username)) ){
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
                    if ($this->usarModel('usuario_model')->adicionar()){ #Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
                        setcookie('msg','Usuario cadastrado!'); #Se não tiver, armazena mensagem para mostrar.
                        redirect('usuario/index');
                    } else {
                        setcookie('msg','Ocorreu algum erro'); #Se não tiver, armazena mensagem para mostrar.
                        redirect('usuario/index');
                    }
                }
    }
} 
    

    
function atualizar(){
    $usuario = new Usuario_model(); #Cria novo objeto
    $id = $this->usarModel('uri')->segment(4);
    
    $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $perfil = isset($_POST['perfil']) ? $_POST['perfil'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';

if (empty($username)){ #Verifica se os campos estão preenchidos
    setcookie('msg','Dados em branco!'); #Se não tiver, armazena mensagem para mostrar.
    redirect('usuario/editar/'.$id);
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

            if ($usuario->atualizar($id)){ #Aqui faz o insert e seta um cookie para mostrar depois, dependendo da situação (se deu certo ou não)
                setcookie('msg','Dados atualizados!'); #Se não tiver, armazena mensagem para mostrar.
                        redirect('usuario/editar/'.$id);
                } else {
                        setcookie('msg','Ocorreu algum erro'); #Se não tiver, armazena mensagem para mostrar.
                        redirect('usuario/editar/'.$id);
            }

    }
    #return $msg;
   #redirect('index.php?pag=perfil&acao=editar&id='.$id);  #Tudo feito, redireciona de volta à página, evitando looping de requisições.
   # redirect('index.php?pag=usuario&acao=listar');  #Tudo feito, redireciona de volta à página, evitando looping de requisições.
}

    
    
    
}



?>
