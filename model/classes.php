<?php

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
	function getId_asm() {
		return $this->id_asm;
	}
	function getNome_asm() {
		return $this->nome_asm;
	}
	function getTempo_asm() {
		return $this->tempo_asm;
	}
	function getPontuacao_asm() {
		return $this->pontuacao_asm;
	}
	function getImagem_asm() {
		return $this->imagem_asm;
	}
	function setId_asm($id_asm) {
		$this->id_asm = $id_asm;
	}
	function setNome_asm($nome_asm) {
		$this->nome_asm = $nome_asm;
	}
	function setTempo_asm($tempo_asm) {
		$this->tempo_asm = $tempo_asm;
	}
	function setPontuacao_asm($pontuacao_asm) {
		$this->pontuacao_asm = $pontuacao_asm;
	}
	function setImagem_asm($imagem_asm) {
		$this->imagem_asm = $imagem_asm;
	}
}

// classe Componente curricular
// Autor: 
class comp_curc {
	private $id_ccr;
	private $nome_ccr;
	private $cargaHoraria_ccr;
	public function __construct() {
		$this->id_ccr = 0;
		$this->nome_ccr = "";
		$this->cargaHoraria_ccr = 0;
	}
	public function __construct($id_ccr, $nome_ccr, $cargaHoraria_ccr) {
		$this->id_cur = $id_cur;
		$this->nome_cur = $nome_cur;
		$this->cargaHoraria_ccr = $cargaHoraria_ccr;
	}
	public function __construct($id_ccr) {
		$this->id_ccr = $id_ccr;
	}
	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}
	public function __get($atrib) {
		return $this->$atrib;
	}
}

// Classe Competências Norteadoras
// Autor:
class Comp_Nort {
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

// Classe Cursos
// Autor: 
class Curso {
	private $id_cur;
	private $nome_cur;
	public function __construct() {
		$this->id_cur = 0;
		$this->nome_cur = "";
	}
	public function __construct($id_cur, $nome_cur) {
		$this->id_cur = $id_cur;
		$this->nome_cur = $nome_cur;
	}
	public function __construct($id_cur) {
		$this->id_cur = $id_cur;
	}
	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}
	public function __get($atrib) {
		return $this->$atrib;
	}
}

// Classe Usuario
// Autor: 
class Usuario {
	protected $table = 'tb_usuarios';
	protected $id = 'usuario_id';
	private $nome;
	private $email;
	private $cpf;
	private $avatar;
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getNome() {
		return $this->nome;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
	public function getCpf() {
		return $this->cpf;
	}
	public function setAvatar($avatar) {
		$this->avatar = $avatar;
	}
	public function getAvatar() {
		return $this->avatar;
	}
	public function adicionar() {
		$sql = "INSERT INTO $this->table (nome,email,cpf,avatar)
			VALUES    (:nome, :email, :cpf, :avatar)";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':nome', $this->getNome () );
		$stmt->bindParam ( ':email', $this->getEmail () );
		$stmt->bindParam ( ':cpf', $this->getCpf () );
		$stmt->bindParam ( ':avatar', $this->getAvatar () );
		return $stmt->execute ();
	}
	public function atualizar($id) {
		$sql = "UPDATE $this->table SET HORA_INICIAL = :horainicio,
			HORA_FINAL = :horafim WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':horainicio', $this->hora_inicial );
		$stmt->bindParam ( ':horafim', $this->hora_final );
		$stmt->bindParam ( ':id', $this->$id );
		return $stmt->execute ();
	}
	public function procurar($id) {
		$sql = "SELECT * FROM $this->table WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		$stmt->execute ();
		return $stmt->fetch ();
	}
	public function listarTodos() {
		$sql = "SELECT * FROM $this->table";
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
		private $id = 'perfil_id';
		private $descricao;
	
		public function __set($atrib, $value){
			$this->atrib = $value;
		}
	
		public function __get($atrib){
			return $this->atrib;
		}
	
		public function __construct(){
			$this->descricao = "";
		}
	
		public function  __construct($descricao){
			$this->descricao = $descricao;
		}
	
		public function adicionar() {
	          $sql = "INSERT INTO $this->table (descricao)
			VALUES    (:descricao)";
	          $stmt = DB::prepare ( $sql );
	          $stmt->bindParam ( ':descricao', $this->__get ( $descricao ) );
	          return $stmt->execute ();
        }
	
		public function atualizar($id){
			$sql  = "UPDATE $this->table SET descricao = :descricao WHERE $this->id = :id";
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
class Relz_Cicl {
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

// Classe Usuario
// Autor: 
class Usuario {
		
			protected $table = 'tb_usuarios';
			protected $id = 'usuario_id';
			private $nome;
			private $email;
			private $cpf;
			private $avatar;
		
			public function __set($atrib, $value){
				$this->$atrib = $value;
			}
		
			public function __get($atrib){
				return $this->$atrib;
			}
		
			public function __construct($nome, $email, $cpf, $avatar){
				$this->nome = $nome;
				$this->email = $email;
				$this->cpf = $cpf;
				$this->avatar = $avatar;
			}
			 
			public function adicionar(){
				$sql  = "INSERT INTO $this->table (nome,email,cpf,avatar)
				VALUES    (:nome, :email, :cpf, :avatar)";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':nome', $this->__get($nome));
				$stmt->bindParam(':email', $this->__get($mail));
				$stmt->bindParam(':cpf', $this->__get($cpf));
				$stmt->bindParam(':avatar', $this->__get($avatar));
				return $stmt->execute();
		
			}
		
			public function atualizar($id){
				$sql  = "UPDATE $this->table SET nome = :nome,
				email = :email
				cpf = :cpf
				avatar = :avatar
				WHERE $this->id = :id";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':nome', $this->__get($nome));
				$stmt->bindParam(':email', $this->__get($mail));
				$stmt->bindParam(':cpf', $this->__get($cpf));
				$stmt->bindParam(':avatar', $this->__get($avatar));
				$stmt->bindParam(':id', $id);
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