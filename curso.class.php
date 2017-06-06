<?php
class Curso {
	private $id_cur;
	private $nome_cur;
	public function __set($atrib, $value){
		$this->$atrib = $value;
	}
	public function __get($atrib){
		return $this->$atrib;
	}
}
