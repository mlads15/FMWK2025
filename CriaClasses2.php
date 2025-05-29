<?php
include "conexao.php";

class CriaClasses1 {
    private $tbBanco = "Tables_in_enderecos";
    private $con;

    function __construct() {
        $this->con = (new Conexao())->conectar();
    }

    function ClassesModel() {

        if (!file_exists("sistema")) {

            mkdir("sistema");

        } if (!file_exists("sistema/model")) {

            mkdir("sistema/model");

        }

        $sql = "SHOW TABLES";
        $query = $this->con->query($sql);
        $tabelas = $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($tabelas as $tabela) {
            $nomeTabela = ucfirst(array_values((array)$tabela)[0]);

            $sql = "show columns from " . $nomeTabela;
            $atributos = $this->con->query($sql)->fetchAll(PDO::FETCH_OBJ);
            $nomeAtrubutos = "";

            foreach ($atributos as $atributo) {

                $nomeAtrubutos.="private \$($atributo->Field);\n";

            }

            $nomeTabela = ucfirst($nomeTabela);

            $conteudo = <<<EOT
class {$nomeTabela} {
}
EOT;

            file_put_contents("sistema/model/($nomeTabela).php", $conteudo);

            // echo "conteudo:<br><pre>$conteudo</pre><br><br>";
        }
    }
}

(new CriaClasses1())->ClassesModel();