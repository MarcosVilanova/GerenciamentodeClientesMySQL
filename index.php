<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css.css">
    <title>InfoClient</title>
</head>
<style>
    h1{
         font-size: 36px;
         text-align: center;
         color: #9dbac9;
    }
</style>
<body>

<div class="container"><!-- Formulario de Entrada -->

    <form method="POST">

      <h1>Login</h1>

      <div class="input-container">
        <input placeholder="CPF" name="cpf_acesso" required>
        <img width="23" height="23" src="https://img.icons8.com/ios/50/user--v1.png" alt="user--v1" />
      </div>
        
      <div class="input-container">
        <input placeholder="Senha" type="password" name="senha_acesso" required>
        <img width="23" height="23" src="https://img.icons8.com/ios/50/lock--v1.png" alt="lock--v1" />
      </div>

      <button type="submit" class="button">Entrar</button> 

      <div class="sobre">
        <p><a href="Sobre.php">Sobre</a></p>
      </div>

    </form>

</div><!--Fim-->

<?php 
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "clientes_db";   

$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cpf_acesso']) && isset($_POST['senha_acesso'])) {
    $cpf = $_POST['cpf_acesso'];
    $senha = $_POST['senha_acesso'];

    // Usar prepared statements para evitar SQL Injection
    $stmt = $conexao->prepare("SELECT * FROM acesso WHERE cpf = ? AND senha = ?");
    $stmt->bind_param("ss", $cpf, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verifica se algum registro foi encontrado
    if ($resultado->num_rows > 0) {
        // Acesso permitido
        header("Location: escolha.php");
        exit;
    } else {
        // Acesso negado
        echo "<p class='w3-text-red w3-center'>CPF ou senha incorretos!</p>";
    }

    $stmt->close();
}

$conexao->close();
?>


</body>
</html>





 