<?php
require_once("../model/Estado.php");
require_once("../dao/EstadoDao.php");
class EstadoControl {
    private $estado;
    private $acao;
    private $dao;
    public function __construct(){
       $this->estado=new Estado();
      $this->dao=new EstadoDao();
      $this->acao=$_GET["a"];
      $this->verificaAcao(); 
    }
    function verificaAcao(){}
    function inserir(){}
    function excluir(){}
    function alterar(){}
    function buscarId(Estado $estado){}
    function buscaTodos(){}

}
new EstadoControl();
?>