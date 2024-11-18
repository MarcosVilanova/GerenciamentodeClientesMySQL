<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css.css">
    <title>InfoClient</title>
    <style>
         h1{
         font-size: 36px;
         text-align: center;
         color: #9dbac9;
    }
    </style>
</head>
<body>
           
    <div class="container">
      <form method="POST">
            <h1>Adicionar Clientes</h1>

            <div class="input-container">
                <input type="text" placeholder="Nome do Cliente" name="nome" required>
            </div>

            <div class="input-container">
                <input placeholder="CPF do Cliente" name="cpf" required>
            </div>

            <div>
                <button type="submit" class="button">Adicionar</button>
            </div>
         </form>

    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "usbw";
    $dbname = "clientes_db";      

    $conexao = new mysqli($servername, $username, $password, $dbname);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome']) && isset($_POST['cpf'])) {
        $senha = $_POST['senha'];
        $cpf = $_POST['cpf'];

        $sql = "SELECT * FROM cliente WHERE cpf = '$cpf' OR senha = '$senha'";
        
        if ($conexao->query($sql) === TRUE) {
            echo "<p class='w3-text-white w3-center'></p>";
        } else {
            echo "<p class='w3-text-white w3-center'>Erro ao salvar: " . $conexao->error . "</p>";
        }
    }
    ?>
    
    
</body>
</html>
