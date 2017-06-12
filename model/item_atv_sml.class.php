<?php
/**
 * Description of Item
 *
 * @author MARCELO
 */
class Item {
   private $Atividade;
    private $nome_ias;
    private $seguencia_ias;
    
    function __construct($Atividade, $nome_ias, $seguencia_ias){
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
