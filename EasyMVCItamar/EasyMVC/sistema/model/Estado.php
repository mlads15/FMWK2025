<?php
class Estado {
	private $id;
	private $nomeEstado;
	private $sigla;
	private $regiao;

	function getId(){
		return $this->id;
	}
	function setId($id){
		$this->id=$id;
	}
	function getNomeEstado(){
		return $this->nomeEstado;
	}
	function setNomeEstado($nomeEstado){
		$this->nomeEstado=$nomeEstado;
	}
	function getSigla(){
		return $this->sigla;
	}
	function setSigla($sigla){
		$this->sigla=$sigla;
	}
	function getRegiao(){
		return $this->regiao;
	}
	function setRegiao($regiao){
		$this->regiao=$regiao;
	}

}
?>