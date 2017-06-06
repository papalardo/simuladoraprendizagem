<?php

require_once './config/DB.php';

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
