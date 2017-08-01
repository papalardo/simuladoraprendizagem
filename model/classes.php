<?php

// Classe Usuario
// Autor: Pablo (modificada pelo professor glauco)
// A classe Usuario é o modelo a ser seguido para construir as outras classes
class  usuario_model {
	protected $table = 'tb_usuario'; // nome da tabela do banco de dados
	protected $id = 'id_usu'; // atributo chave primária da tabela do banco de dados

	// atributos da classe de acordo com a tabela, não precisa usar os mesmos nomes da tabela.
	private $nome;
    private $sobrenome;
	private $email;
	private $username;
	private $senha;
	private $cpf;
	private $sexo;
	private $perfil;
	private $avatar;

	// métodos gets e sets
	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}
	public function __get($atrib) {
		return $this->$atrib;
	}

	// métodos dos cruds
	public function adicionar() {
		$sql = "INSERT INTO $this->table (nome_usu,sobrenome_usu,email_usu,cpf_usu,sexo_usu, TB_PERFIL_id_per, senha_usu,username_usu )
                                VALUES    (:nome, :sobrenome, :email,:cpf,:sexo,:perfil,:senha,:username)";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':nome', $this->nome);
		$stmt->bindParam ( ':sobrenome', $this->sobrenome);
		$stmt->bindParam ( ':email', $this->email );
		$stmt->bindParam ( ':username', $this->username);
		$stmt->bindParam ( ':senha', $this->senha);
		$stmt->bindParam ( ':cpf', $this->cpf );
		$stmt->bindParam ( ':sexo', $this->sexo);
		$stmt->bindParam ( ':perfil', $this->perfil);
		#$stmt->bindParam ( ':avatar', $this->avatar );
		return $stmt->execute();
	}
	public function atualizar($id) {
		$sql = "UPDATE $this->table SET  nome_usu = :nome,
			                             sobrenome_usu = :sobrenome,
                                         email_usu = :email,
                                         username_usu = :username,
                                         senha_usu = :senha,
                                         cpf_usu = :cpf,
                                         sexo_usu = :sexo,
                                         TB_PERFIL_id_per = :perfil
                                         WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':nome', $this->nome);
		$stmt->bindParam ( ':sobrenome', $this->sobrenome);
		$stmt->bindParam ( ':email', $this->email );
		$stmt->bindParam ( ':username', $this->username);
		$stmt->bindParam ( ':senha', $this->senha);
		$stmt->bindParam ( ':cpf', $this->cpf );
		$stmt->bindParam ( ':sexo', $this->sexo);
		$stmt->bindParam ( ':perfil', $this->perfil);
		$stmt->bindParam ( ':id', $id);
        #$stmt->bindParam ( ':avatar', $avatar );
		return $stmt->execute ();
	}

    /*

    Metodo procurar($id) é utilizado para usar o ID, neste caso, procurar na coluna $this->id

    */
    
    
	public function procurar($id) {
		$sql = "SELECT * FROM $this->table INNER JOIN tb_perfil ON ( $this->table.TB_PERFIL_id_per = tb_perfil.id_per) WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		$stmt->execute();
        return $stmt->fetch();
	}

    /*

    Metodo procurarEm( $coluna, $dado ) e utilizado para escolher a coluna ao qual deseja procurar o dado.

    */

    public function procurarEm($coluna, $dado){
        $sql = "SELECT * FROM $this->table
                INNER JOIN tb_perfil ON ( $this->table.TB_PERFIL_id_per = tb_perfil.id_per)
                WHERE $coluna = :dado";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':dado', $dado );
		$stmt->execute();
        return $stmt->fetch();

    }

	public function listarTodos() {
		$sql = "SELECT * FROM $this->table INNER JOIN tb_perfil ON ( $this->table .TB_PERFIL_id_per = tb_perfil.id_per)";
		$stmt = DB::prepare ( $sql );
		$stmt->execute ();
		return $stmt->fetchAll ();
	}
	public function deletar($id) {
		$sql = "DELETE FROM $this->table WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		return $stmt->execute ();
	}

    public function procurarPorUsername() {
        $username = $this->__get('username');
		$sql = "SELECT * FROM $this->table WHERE username_usu = :username";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':username', $username);
		$stmt->execute();
		return $stmt->fetch();
	}
}


// Classe Atividades do simulador
// Autor:
class Atividade {
	private $id_asm;
	private $nome_asm;
	private $tempo_asm;
	private $pontuacao_asm;
	private $imagem_asm;

	function __construct($nome_asm, $tempo_asm, $pontuacao_asm, $imagem_asm) {
		$this->nome_asm = $nome_asm;
		$this->tempo_asm = $tempo_asm;
		$this->pontuacao_asm = $pontuacao_asm;
		$this->imagem_asm = $imagem_asm;
	}

	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}
	public function __get($atrib) {
		return $this->$atrib;
	}

}



// classe Componente curricular
// Autor:
class ComponenteCurricular {
	private $id_ccr;
	private $nome_ccr;
	private $cargaHoraria_ccr;

	/*public function __construct() {
		$this->id_ccr = 0;
		$this->nome_ccr = "";
		$this->cargaHoraria_ccr = 0;
	}*/

	public function __construct($id_ccr, $nome_ccr, $cargaHoraria_ccr) {
		$this->id_cur = $id_cur;
		$this->nome_cur = $nome_cur;
		$this->cargaHoraria_ccr = $cargaHoraria_ccr;
	}

	/*public function __construct($id_ccr) {
		$this->id_ccr = $id_ccr;
	}*/

	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}

	public function __get($atrib) {
		return $this->$atrib;
	}
}


// Classe Competências Norteadoras
// Autor:
class CompetenciaNorteadora {
	private $idCnr;
	private $nomeCnr;
	public function getIdCnr() {
		return $this->idCnr;
	}
	public function getNomeCnr() {
		return $this->nomeCnr;
	}
	public function setIdCnr() {
		return $this->idCnr;
	}
	public function setNomeCnr() {
		return $this->nomeCnr;
	}
}


// Classe Curso
// Autor:
class Curso {
	private $id_cur;
	private $nome_cur;
	/*public function __construct() {
		$this->id_cur = 0;
		$this->nome_cur = "";
	} */
	public function __construct($id_cur, $nome_cur) {
		$this->id_cur = $id_cur;
		$this->nome_cur = $nome_cur;
	}
	/*public function __construct($id_cur) {
		$this->id_cur = $id_cur;
	}*/
	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}
	public function __get($atrib) {
		return $this->$atrib;
	}
}



// Classe Item
// Autor:
class Item {
	private $Atividade;
	private $nome_ias;
	private $seguencia_ias;
	function __construct($Atividade, $nome_ias, $seguencia_ias) {
		$this->Atividade = $Atividade;
		$this->nome_ias = $nome_ias;
		$this->seguencia_ias = $seguencia_ias;
	}
	function getAtividade() {
		return $this->Atividade;
	}
	function getNome_ias() {
		return $this->nome_ias;
	}
	function getSeguencia_ias() {
		return $this->seguencia_ias;
	}
	function setAtividade($Atividade) {
		$this->Atividade = $Atividade;
	}
	function setNome_ias($nome_ias) {
		$this->nome_ias = $nome_ias;
	}
	function setSeguencia_ias($seguencia_ias) {
		$this->seguencia_ias = $seguencia_ias;
	}
}


// Classe Perfil
class Perfil {

		private $table = 'tb_perfil';
		private $id = 'id_per';
		private $descricao;

		public function __set($atrib, $value){
			$this->atrib = $value;
		}

		public function __get($atrib){
			return $this->atrib;
		}

		/*public function __construct(){
			$this->descricao = "";
		}*/

		/*public function  __construct($descricao){
			$this->descricao = $descricao;
		}*/

		public function adicionar() {
	           $sql = "INSERT INTO $this->table (desc_per) VALUES (:descricao)";
	          $stmt = DB::prepare ($sql);
	          $stmt->bindParam (':descricao', $this->__get('descricao'));
	           return $stmt->execute();
        }

		public function atualizar($id){
			$sql  = "UPDATE $this->table SET desc_per = :descricao WHERE $this->id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':descricao', $this->__get($descricao));
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute();
		}

		public function procurar($id){
			$sql  = "SELECT * FROM $this->table WHERE $this->id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}

		public function listarTodos(){
			$sql  = "SELECT * FROM $this->table";
			$stmt = DB::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public function deletar($id){
			$sql  = "DELETE FROM $this->table WHERE $this->id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute();
		}
	}


// Classe Realizar Ciclo
// Autor
class RealizarCiclo {
		private $idRcc;
		private $pontuacaoAlcancadaRcc;

		public function getIdRcc(){
			return $this->idRcc;
		}

		public function getPontuacaoAlcancadaRcc(){
			return $this->pontuacaoAlcancadaRcc;
		}


		public function setIdRcc(){
			return $this->idRcc;
		}

		public function setPontuacaoAlcancadaRcc(){
			return $this->pontuacaoAlcancadaRcc;
		}
}

/*

Classe para templates - em TESTE

*/

class Template {
    protected $template, $view, $data;

    public function __construct($template, $view = '', $data = array()) {
        $this->view = $view;
        $this->template = $template;
        $this->data = $data;
    }

    public function getView(){
        if(file_exists($this->view)){
            return $this->view;
        }
            return 'View nao encontrada';
    }

    public function render() {
        if(file_exists($this->template)){
            //Extracts vars to current view scope
            $this->data['conteudo'] = $this->getView();
            extract($this->data);

            //Starts output buffering
            ob_start();

            //Includes contents
            include $this->template;
            $buffer = ob_get_contents();
            @ob_end_clean();

            //Returns output buffer
            return $buffer;
        } else {
            //Throws exception
            echo 'OPS! Template não encontrado';
        }
    }
}


class Uri {
    public function segment($nr){
        $partes_url = explode('/', $_SERVER['REQUEST_URI'] );
        return $partes_url[$nr];    
        }
    }
?>
