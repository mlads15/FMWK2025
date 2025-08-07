<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Conexão</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="container">

<form action="creator.php" method="POST">
    <?php
    include 'mensagens.php';
    if (isset($_GET['msg']) ){
        $msg=$_GET['msg'];
        $classe=$msg==2?'mensagem':'mensagem_erro';
        echo "<div class=\"$classe\">"  . ($mensagens[$msg] ?? "Erro desconhecido") . "</div>";
    }

?>
    <h1>EasyMVC</h1><h2>Configuração</h2>

    <label for="servidor">Servidor:</label>
    <input type="text" id="servidor" name="servidor" required>

    <label for="banco">Banco de Dados:</label>
    <select name="banco" id="banco">

        <?php

        try {

            $conexao = new PDO("mysql:host=localhost", "root", "1234");
            $stmt = $conexao->query("SHOW DATABASES");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $dbname = $row['Database'];
                echo "<option value=\"$dbname\">$dbname</option>";

            }

        } catch (PDOException $e) {

            echo "<option disabled>Erro ao listar bancos: " . $e->getMessage() . "</option>";

        }

        ?>

    </select>

    <label for="usuario">Usuário:</label>
    <input type="text" id="usuario" name="usuario" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha">

    <button type="submit">Enviar</button>
</form>
</div>
</body>
</html>
