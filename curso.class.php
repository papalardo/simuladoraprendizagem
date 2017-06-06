<?php
public class Curso {
	private $id_cur;
	private $nome_cur;
	
	public function __construct(){
		$this->id_cur = 0;
		$this->nome_cur = "";
	}
	
	public function __construct($id_cur, $nome_cur){
		$this->id_cur = $id_cur;
		$this->nome_cur = $nome_cur;
	}
	
	public function __construct($id_cur){
		$this->id_cur = $id_cur;
	}
	
	public function __set($atrib, $value){
		$this->$atrib = $value;
	}
	
	public function __get($atrib){
		return $this->$atrib;
	}
}
