<?php

require_once './config/DB.php';

class Perfil {
	
	protected $table = 'tb_perfil';
	protected $id = 'perfil_id';
	private $descricao;

	public function __set($atrib, $value){
		$this->atrib = $value;
	}
    
	public function __get($atrib){
		return $this->atrib;
	}
	
	public public __construct(){
		$this->descricao = "";
	}
	
	public public __construct($descricao){
		$this->descricao = $descricao;
	}

	public function adicionar(){
		$sql  = "INSERT INTO $this->table (descricao) 
					VALUES    (:descricao)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':descricao', $this->__get($descricao));
		return $stmt->execute(); 
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
