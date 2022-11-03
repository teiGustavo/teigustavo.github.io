<?php
    include "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/main.css">
        <title>Consultar Relatórios</title>
    </head>
    <body onload="pagConsulta()"> 
        <?php include "navbar.php"; ?>   

        <div class="main-login" id="main-login">
            <div class="left-login">
                <img src="styles/img/curious-animate.svg" class="left-login-image" alt="Astronauta animação">
            </div>

            <form method="POST" action="resultado.php" target="_blank">
                <div class="right-login">
                    <div class="card-login">
                        <h1>CONSULTAR</h1>
                        <div class="textfield">
                            <label for="mes">Selecione o mês:</label>
                            <select name="mes" id="mes">
                                <option>Selecione o mês</option>
                                <?php
                                    mysqli_query($conexao, 'SET lc_time_names=pt_BR');

                                    $sql = "SELECT DISTINCT DATE_FORMAT(data, '%M') as Mes FROM relatorio ORDER BY data";
                                    $resultado = mysqli_query($conexao, $sql);

                                    while($linha=mysqli_fetch_array($resultado)){
                                        echo "<option value=".$linha['Mes'].">".$linha['Mes']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn-login" name="btn">Consultar</button>
                        <a href="index.php">Cadastar lançamentos aqui!</a>
                    </div>
                </div>
            </form>

        </div>
        
    </body>

    <script src="JS/jquery-3.6.0.min.js"></script>
    <script src="JS/funcoes.js"></script>

</html>