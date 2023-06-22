<!DOCTYPE html>
<html>
<head>
    <title>Formulário PHP</title>
</head>
<body>
    <h2>Formulário de Cadastro</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nome: <input type="text" name="nome"><br><br>
        E-mail: <input type="text" name="email"><br><br>
        <input type="submit" name="submit" value="Enviar">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $nome = $_POST["nome"];
        $email = $_POST["email"];

       
        $servername = "localhost";
        $username = "sa";
        $password = "root";
        $dbname = "banco";

       
        $conn = new mysqli($servername, $username, $password, $dbname);

      
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

        if ($conn->query($sql) === true) {
            echo "Dados cadastrados com sucesso!";
        } else {
            echo "Erro ao cadastrar os dados: " . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>