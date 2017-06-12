<?php

require_once './config/DB.php';

class Usuario {
	
	protected $table = 'tb_usuarios';
    protected $id = 'usuario_id';
    private $nome;
    private $email;
    private $cpf;
    private $avatar;

	public function setNome($nome){
		$this->nome = $nome;
	}
    
    public function getNome(){
        return $this->nome;
    }

    public function setEmail($email){
		 $this->email = $email;
	}
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setCpf($cpf){
		 $this->cpf = $cpf;
	}
    
    public function getCpf(){
        return $this->cpf;
    }
    
    public function setAvatar($avatar){
		 $this->avatar = $avatar;
	}
    
    public function getAvatar(){
        return $this->avatar;
    }

	public function adicionar(){

		$sql  = "INSERT INTO $this->table (nome,email,cpf,avatar) 
                                VALUES    (:nome, :email, :cpf, :avatar)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->getNome());
        $stmt->bindParam(':email', $this->getEmail());
        $stmt->bindParam(':cpf', $this->getCpf());
        $stmt->bindParam(':avatar', $this->getAvatar());
		return $stmt->execute(); 

	}

	public function atualizar($id){

		$sql  = "UPDATE $this->table SET HORA_INICIAL = :horainicio,
                                         HORA_FINAL = :horafim WHERE $this->id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':horainicio', $this->hora_inicial);
        $stmt->bindParam(':horafim', $this->hora_final);
		$stmt->bindParam(':id', $this->$id);
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