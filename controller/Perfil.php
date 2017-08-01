<?php


class Perfil {
    
    public function __construct(){
        require_once base_url('model/classes.php');
    }
    
    public function index(){
        $perfil = new Perfil_model();
         $tmpl = new Template('templates/template.tpl','view/perfil/index.php', array('titulo' => 'Painel usuario',
                                                                                    'header' => 'Perfil',
                                                                                    'sub_header' => 'adicionar'));
        echo $tmpl->render();
    }
    
    public function listar(){
        $perfil = new Model();
        $data = array('titulo' => 'Painel usuario',
                      'listar' => $perfil->set_model('Perfil_model')->listarTodos(),
                        'header' => 'Perfil',
                        'sub_header' => 'listar');
        $tmpl = new Template('templates/template.tpl','view/perfil/listar.php', $data);
        echo $tmpl->render();
    }
    
    public function editar(){
        $id = $_GET['id'];
        #$resultado = $perfil->procurar($id);
        $data = array('resultado' => $perfil->procurar($id));
        $tmpl = new Template('templates/template.tpl','view/perfil/editar.php', $data);
        echo $tmpl->render();
    }
    
    public function deletar(){
        $perfil = new Perfil_model();
        $uri = new Uri();
        $id = $uri->segment(4);
        if ($perfil->deletar($id)){ setcookie('msg',"Deletado!"); }
        redirect('perfil/listar');
    }
    
    public function novo(){
        $perfil = new Perfil_model();
        // resgata variáveis do formulário
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : ''; #Resgata variáveis do formulário
        if (empty($descricao)){ #Verifica se os campos estão preenchidos
            setcookie('msg','Dados em branco!'); #Se não tiver, armazena mensagem para mostrar.
            } else {
                    $descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                    $perfil->__set('descricao', $descricao);

                    if ($perfil->adicionar()){ #Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
                        setcookie('msg','Novo perfil cadastrado!'); #Deu bom
                    } else {
                        setcookie('msg','Ocorreu algum erro..'); #Deu ruim
                    }

            }
        setcookie('msg', $return);
        redirect('perfil');
    }
    
    public function atualizar(){
        $perfil = new Perfil_model(); #Cria novo objeto
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : ''; #Resgata variáveis do formulário
        $id = $_GET['id'];
        if (empty($descricao)){ #Verifica se os campos estão preenchidos
            setcookie('msg',"Dados em branco!"); #Se não tiver, armazena mensagem para mostrar.
            } else {
                    $descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                    $perfil->__set('descricao', $descricao); #Pega o que foi digitado e muda seu valor no objeto
                    $id = $_GET['id']; #Pega o ID para localizar no Banco de dados
                    if ($perfil->atualizar($id)){ #Aqui faz o insert e seta um cookie para mostrar depois, dependendo da situação (se deu certo ou não)
                        setcookie('msg','Dados atualizados!'); # Deu bom
                    } else {
                        setcookie('msg','Ocorreu algum erro..'); # Deu ruim
                    }

            }
        redirect('?pag=perfil&acao=editar&id=' . $_GET['id']);
    }
}


/*

Execução dos métodos


if (isset($_POST)) { #Quando algum $_POST for lançado, será verificado qual e executará a função um método (funções logo abaixo).
    switch (isset($_POST['acao'])){
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
$perfil = new Perfil(); #Cria novo objeto
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : ''; #Resgata variáveis do formulário
$id = $_GET['id'];
if (empty($descricao)){ #Verifica se os campos estão preenchidos
    return "Dados em branco!"; #Se não tiver, armazena mensagem para mostrar.
    } else {
            $descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
            $perfil->__set('descricao', $descricao); #Pega o que foi digitado e muda seu valor no objeto
            $id = $_GET['id']; #Pega o ID para localizar no Banco de dados
            if ($perfil->atualizar($id)){ #Aqui faz o insert e seta um cookie para mostrar depois, dependendo da situação (se deu certo ou não)
                return 'Dados atualizados!'; # Deu bom
            } else {
                return '"Ocorreu algum erro..'; # Deu ruim
            }

    }
   #redirect('index.php?pag=perfil&acao=editar&id='.$id);  #Tudo feito, redireciona de volta à página, evitando looping de requisições.
}


function adicionar(){
$perfil = new Perfil();
    // resgata variáveis do formulário
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : ''; #Resgata variáveis do formulário
    if (empty($descricao)){ #Verifica se os campos estão preenchidos
        return 'Dados em branco!'; #Se não tiver, armazena mensagem para mostrar.
        } else {
                $descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                $perfil->__set('descricao', $descricao);

                if ($perfil->adicionar()){ #Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
                    return 'Novo perfil cadastrado!'; #Deu bom
                } else {
                    return 'Ocorreu algum erro..'; #Deu ruim
                }

        }
        #redirect('index.php?pag=perfil'); #Tudo feito, redireciona de volta à página, evitando looping de requisições.
} ?>
