<?php
require_once("../model/Alunos.php");
require_once("../dao/AlunosDao.php");
class AlunosControl {
    private $alunos;
    private $acao;
    private $dao;
    public function __construct(){
       $this->alunos=new Alunos();
      $this->dao=new AlunosDao();
      $this->acao=$_GET["a"];
      $this->verificaAcao(); 
    }
    function verificaAcao(){}
    function inserir(){}
    function excluir(){}
    function alterar(){}
    function buscarId(Alunos $alunos){}
    function buscaTodos(){}

}
new AlunosControl();
?>