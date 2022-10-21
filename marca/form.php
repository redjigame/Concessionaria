<?php
    session_start();
    ob_start();

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $nome = '';
    $opcao = 'inserir';

    if($id != ''){
        $opcao = 'atualizar';
        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionar','root','');
        $sql = "SELECT * FROM marca WHERE id = {$id};";
        $dataset = $conexao->query($sql);
        $resultset  = $dataset->fetch();

        $nome       = $resultset['nome'];
    }

    if ((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'> Erro: E necessario realizar o login para acessar a pagina!";
        header("Location: index.php");
    }

    echo $opcao;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Marca</title>
</head>
<body>
    <h1></h1>
<form action="crud.php" method="POST">
        <fieldset>
            <legend>Cadastro de marca</legend>
            <input type="hidden" name="opcao" id="opcao" value="<?=$opcao?>"/>
            <div>
            <label for="id">Id</label>
                <br/>
                <input type="text" name="id" id="id" value="<?=$id?>" readonly/>
            </div>
            <div>
                <label for="nome">Descrição</label>
                <br/>
                <input type="text" name="nome" id="nome" value="<?=$nome?>"/>
            </div>
            <div>
                <input type="submit" value="Salvar" />
            </div>
        </fieldset>
        <a href="http://localhost/senac/concessionar/marca/list.php">Consultar list</a>
        <br><br><br>
        <a href="http://localhost/senac/concessionar/dashboard.php">Voltar para o Dashboard</a>

</body>
</html>