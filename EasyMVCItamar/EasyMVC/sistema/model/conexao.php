
<?php
class Conexao {
    private $server;
    private $banco;
    private $usuario;
    private $senha;
    function __construct() {
        $this->server = '[Informe aqui o servidor]';
        $this->banco = '[Informe aqui o seu Banco de dados]';
        $this->usuario = '[Informe aqui o usuário do banco de dados]';
        $this->senha = '[Informe aqui a senha do banco de dados]';
    }
    function conectar() {
        try {
            $conn = new PDO(
                "mysql:host=" . $this->server . ";dbname=" . $this->banco,$this->usuario,
                $this->senha
            );
            return $conn;
        } catch (Exception $e) {
            echo "Erro ao conectar com o Banco de dados: " . $e->getMessage();
        }
    }
}
?>