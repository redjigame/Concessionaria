<?php
    session_start();
    ob_start();

    if ((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'> Erro: E necessario realizar o login para acessar a pagina!";
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png" type="images/x-ico">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo <?php echo $_SESSION['usuario'];?>!</h1>
    <a href="http://localhost/senac/concessionar/marca/form.php">Marcas</a>
    <br><br>
    <a href="http://localhost/senac/concessionar/modelo/form.php">Modelos</a>
    <br><br>
    <a href="http://localhost/senac/concessionar/veiculo/form.php">Veiculos</a>
    <br><br>
    <a href="sair.php">Sair</a>
    
</body>
</html>