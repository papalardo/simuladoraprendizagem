<?php
public class comp_curc {
	private $id_ccr;
	private $nome_ccr;
	private $cargaHoraria_ccr;
	
	public function __construct(){
		$this->id_ccr = 0;
		$this->nome_ccr = "";
		$this->cargaHoraria_ccr = 0;
	}
	
	public function __construct($id_ccr, $nome_ccr, $cargaHoraria_ccr){
		$this->id_cur = $id_cur;
		$this->nome_cur = $nome_cur;
		$this->cargaHoraria_ccr = $cargaHoraria_ccr;
	}
	
	public function __construct($id_ccr){
		$this->id_ccr = $id_ccr;
	}
	
	public function __set($atrib, $value){
		$this->$atrib = $value;
	}
	
	public function __get($atrib){
		return $this->$atrib;
	}
	
}
