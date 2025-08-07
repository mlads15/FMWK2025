<?php
require_once("../model/Cidade.php");
require_once("../dao/CidadeDao.php");
class CidadeControl {
    private $cidade;
    private $acao;
    private $dao;
    public function __construct(){
       $this->cidade=new Cidade();
      $this->dao=new CidadeDao();
      $this->acao=$_GET["a"];
      $this->verificaAcao(); 
    }
    function verificaAcao(){}
    function inserir(){}
    function excluir(){}
    function alterar(){}
    function buscarId(Cidade $cidade){}
    function buscaTodos(){}

}
new CidadeControl();
?>