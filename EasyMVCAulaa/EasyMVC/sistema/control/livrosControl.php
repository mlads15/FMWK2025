<?php
require_once("../model/Livros.php");
require_once("../dao/LivrosDao.php");
class LivrosControl {
    private $livros;
    private $acao;
    private $dao;
    public function __construct(){
       $this->livros=new Livros();
      $this->dao=new LivrosDao();
      $this->acao=$_GET["a"];
      $this->verificaAcao(); 
    }
    function verificaAcao(){}
    function inserir(){}
    function excluir(){}
    function alterar(){}
    function buscarId(Livros $livros){}
    function buscaTodos(){}

}
new LivrosControl();
?>