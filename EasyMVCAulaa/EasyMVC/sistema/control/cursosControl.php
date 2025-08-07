<?php
require_once("../model/Cursos.php");
require_once("../dao/CursosDao.php");
class CursosControl {
    private $cursos;
    private $acao;
    private $dao;
    public function __construct(){
       $this->cursos=new Cursos();
      $this->dao=new CursosDao();
      $this->acao=$_GET["a"];
      $this->verificaAcao(); 
    }
    function verificaAcao(){}
    function inserir(){}
    function excluir(){}
    function alterar(){}
    function buscarId(Cursos $cursos){}
    function buscaTodos(){}

}
new CursosControl();
?>