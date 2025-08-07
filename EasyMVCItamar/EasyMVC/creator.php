<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
class Creator {
    private $con;
    private $servidor ;
    private $banco;
    private $usuario;
    private $senha;
    private $tabelas;

    function __construct() {

        $this->criaDiretorios();
        $this->conectar();
        $this->buscaTabelas();
        $this->ClassesModel();
        $this->ClasseConexao();
        $this->ClassesControl();
        $this->classesView();
        $this->criarCSS();
        $this->compactar();
        header("Location:index.php?msg=2");

    }

    function criaDiretorios() {

        $dirs = [
            "sistema",
            "sistema/model",
            "sistema/control",
            "sistema/view",
            "sistema/dao",
            "sistema/css"
        ];

        foreach ($dirs as $dir) {

            if (!file_exists($dir)) {

                if (!mkdir($dir, 0777, true)) {
                    header("Location:index.php?msg=0");
                }
            }

            if (!file_exists("sistema/css")) {

                mkdir("sistema/css", 0777, true) or die("Falhou ao criar sistema/css");

            }
        }
    }

    function conectar() {

        $this->servidor=$_POST["servidor"];
        $this->banco=$_POST["banco"];
        $this->usuario=$_POST["usuario"];
        $this->senha=$_POST["senha"];
        try {
            $this->con = new PDO(
                "mysql:host=" . $this->servidor . ";dbname=" . $this->banco,
                $this->usuario,
                $this->senha
            );
        } catch (Exception $e) {
            header("Location:index.php?msg=1");
        }
    }

    function buscaTabelas(){
        
       try {
           $sql = "SHOW TABLES";
           $query = $this->con->query($sql);
           $this->tabelas = $query->fetchAll(PDO::FETCH_ASSOC);
       }
       catch (Exception $e) {
           header("Location:index.php?msg=3");
       }
    }
    function buscaAtributos($nomeTabela){
        $sql="show columns from ".$nomeTabela;
        $atributos = $this->con->query($sql)->fetchAll(PDO::FETCH_OBJ);
        return $atributos;
    }
    function ClassesModel() {
        foreach ($this->tabelas as $tabela) {
            $nomeTabela = array_values((array) $tabela)[0];
            $atributos=$this->buscaAtributos($nomeTabela);
            $nomeAtributos="";
            $geters_seters="";
            foreach ($atributos as $atributo) {
                $atributo=$atributo->Field;
                $nomeAtributos.="\tprivate \${$atributo};\n";
                $metodo=ucfirst($atributo);
                $geters_seters.="\tfunction get".$metodo."(){\n";
                $geters_seters.="\t\treturn \$this->{$atributo};\n\t}\n";
                $geters_seters.="\tfunction set".$metodo."(\${$atributo}){\n";
                $geters_seters.="\t\t\$this->{$atributo}=\${$atributo};\n\t}\n";
            }
            $nomeTabela=ucfirst($nomeTabela);
            $conteudo = <<<EOT
<?php
class {$nomeTabela} {
{$nomeAtributos}
{$geters_seters}
}
?>
EOT;
            file_put_contents("sistema/model/{$nomeTabela}.php", $conteudo);

        }
    }

    function classesView() {

        foreach ($this->tabelas as $tabela) {
            $nomeTabela = array_values((array) $tabela)[0];
            $atributos=$this->buscaAtributos($nomeTabela);
            $formCampos = "";
            
            foreach ($atributos as $atributo) {
                $atributo=$atributo->Field;

                if($atributo == "id" || $atributo == "habitantes") {

                    $formCampos .= "<label for='campo_{$atributo}'>{$atributo}</label>\n";
                    $formCampos .= "<input type='number' name='campo_{$atributo}'><br>\n";

                } else {

                    $formCampos .= "<label for='campo_{$atributo}'>{$atributo}</label>\n";
                    $formCampos .= "<input type='text' name='campo_{$atributo}'><br>\n";

                }

            }

            $conteudo = <<<HTML
<html>
    <head>
        <title>Cadastro de {$nomeTabela}</title>
        <link rel='stylesheet' href='../css/style.css'>
    </head>
    <body>
        <form>
            {$formCampos}
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>
HTML;
  file_put_contents("sistema/view/{$nomeTabela}.php", $conteudo); // Exemplo salvando como arquivo
        }
    }

    function criarCSS() {
    $cssConteudo = <<<CSS
@import url('https://fonts.googleapis.com/css2?family=Coral+Pixels&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Shizuru&display=swap');

body {

    margin: 0;
    padding: 0;
    background-color: #000;
    color: #f7f7f7;
    font-family: 'Poppins', sans-serif;

}

form {

    text-align: center;
    margin-top: 20%;

}

label {

    margin-right: 15px;
    font-weight: 600;
    margin-bottom: 5px;
    display: block;

}

label[for="campo_id"] {

    display: none;
    
}

[name="campo_id"] {

    display: none;

}

input {

    border-radius: 10px;
    margin-bottom: 15px;

}

input[type="text"] {

    width: 15%;
    padding: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 10px;

}

button {

    background-color: #f7f7f7;
    width: 15%;
    padding: 5px;
    margin-bottom: 15px;
    margin-top: 10px;
    border-radius: 10px;

}
CSS;

    file_put_contents("sistema/css/style.css", $cssConteudo);
}


    function ClasseConexao(){
        $conteudo = <<<EOT

<?php
class Conexao {
    private \$server;
    private \$banco;
    private \$usuario;
    private \$senha;
    function __construct() {
        \$this->server = '[Informe aqui o servidor]';
        \$this->banco = '[Informe aqui o seu Banco de dados]';
        \$this->usuario = '[Informe aqui o usuário do banco de dados]';
        \$this->senha = '[Informe aqui a senha do banco de dados]';
    }
    function conectar() {
        try {
            \$conn = new PDO(
                "mysql:host=" . \$this->server . ";dbname=" . \$this->banco,\$this->usuario,
                \$this->senha
            );
            return \$conn;
        } catch (Exception \$e) {
            echo "Erro ao conectar com o Banco de dados: " . \$e->getMessage();
        }
    }
}
?>
EOT;
        file_put_contents("sistema/model/conexao.php", $conteudo);
    }

    function ClassesControl(){
        foreach ($this->tabelas as $tabela) {
            $nomeTabela = array_values((array)$tabela)[0];
            $nomeClasse=ucfirst($nomeTabela);
            $conteudo = <<<EOT
<?php
require_once("../model/{$nomeClasse}.php");
require_once("../dao/{$nomeClasse}Dao.php");
class {$nomeClasse}Control {
    private \${$nomeTabela};
    private \$acao;
    private \$dao;
    public function __construct(){
       \$this->{$nomeTabela}=new {$nomeClasse}();
      \$this->dao=new {$nomeClasse}Dao();
      \$this->acao=\$_GET["a"];
      \$this->verificaAcao(); 
    }
    function verificaAcao(){}
    function inserir(){}
    function excluir(){}
    function alterar(){}
    function buscarId({$nomeClasse} \${$nomeTabela}){}
    function buscaTodos(){}

}
new {$nomeClasse}Control();
?>
EOT;
            file_put_contents("sistema/control/{$nomeTabela}Control.php", $conteudo);
        }

    }
    function compactar() {
        $folderToZip = 'sistema';
        $outputZip = 'sistema.zip';
        $zip = new ZipArchive();
        if ($zip->open($outputZip, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
            return false;
        }
        $folderPath = realpath($folderToZip);  // Corrigido aqui
        if (!is_dir($folderPath)) {
            return false;
        }
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($folderPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );
        foreach ($files as $name => $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($folderPath) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }

        return $zip->close();
    }

}

new Creator();