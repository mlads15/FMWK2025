<?php
class Cidade {
	private $id;
	private $nomeCidade;
	private $idEstado;
	private $habitantes;

	function getId(){
		return $this->id;
	}
	function setId($id){
		$this->id=$id;
	}
	function getNomeCidade(){
		return $this->nomeCidade;
	}
	function setNomeCidade($nomeCidade){
		$this->nomeCidade=$nomeCidade;
	}
	function getIdEstado(){
		return $this->idEstado;
	}
	function setIdEstado($idEstado){
		$this->idEstado=$idEstado;
	}
	function getHabitantes(){
		return $this->habitantes;
	}
	function setHabitantes($habitantes){
		$this->habitantes=$habitantes;
	}

}
?>