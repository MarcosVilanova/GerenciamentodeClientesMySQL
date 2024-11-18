<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "usbw";
    $dbname = "clientes_db";      

    $conexao = new mysqli($servername, $username, $password, $dbname);  
    ?>


<div class="w3-container container_buscar">
   <form method="POST">

        <h1>Buscar Clientes</h1>

        <div class="input_buscar">         
            <input class="" name="cpf" placeholder="Digite o CPF" type="text"> 
        </div>

        <div>
            <button type="submit" class="btn_buscar">Buscar</button>
        </div> 



        <table border="2" width="500px">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
            </tr>

            <?php
            if (isset($_POST['cpf']) && $_POST['cpf'] != '') { 
                $pesquisa = $conexao->real_escape_string($_POST['cpf']);
                $sql_code = "SELECT * FROM cliente WHERE cpf LIKE '$pesquisa'";
                $sql_query = $conexao->query($sql_code) or die("Erro: " . $conexao->error); 

                if($sql_query->num_rows == 0) {
                    echo "<tr><td colspan='3'>Nenhum cliente encontrado.</td></tr>";
                } else {
                    while ($dados = $sql_query->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $dados['id'] . "</td>
                                <td>" . $dados['nome'] . "</td>
                                <td>" . $dados['cpf'] . "</td>
                              </tr>";
                    }
                }
            }
            ?>
        </table>  

    </form>
  
    </div>  
</body>
</html>
