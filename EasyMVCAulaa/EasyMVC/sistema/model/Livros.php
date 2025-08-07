<?php
class Livros {
	private $id;
	private $titulo;
	private $genero;
	private $qtd_paginas;
	private $autor;

	function getId(){
		return $this->id;
	}
	function setId($id){
		$this->id=$id;
	}
	function getTitulo(){
		return $this->titulo;
	}
	function setTitulo($titulo){
		$this->titulo=$titulo;
	}
	function getGenero(){
		return $this->genero;
	}
	function setGenero($genero){
		$this->genero=$genero;
	}
	function getQtd_paginas(){
		return $this->qtd_paginas;
	}
	function setQtd_paginas($qtd_paginas){
		$this->qtd_paginas=$qtd_paginas;
	}
	function getAutor(){
		return $this->autor;
	}
	function setAutor($autor){
		$this->autor=$autor;
	}

}
?>