<?php
    session_start();
    ob_start();

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $descricao = '';
    $anno = '';
    $opcao = 'inserir';

    if($id != ''){
        $opcao = 'atualizar';
        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionar','root','');
        $sql = "SELECT * FROM modelo WHERE id = {$id};";
        $dataset = $conexao->query($sql);
        $resultset  = $dataset->fetch();

        $descricao = $resultset['descricao'];
        $anno = $resultset['anno'];
    }

    if ((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'> Erro: E necessario realizar o login para acessar a pagina!";
        header("Location: index.php");
    }

    echo $opcao;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1></h1>
    <form action="crud.php" method="POST">
    <legend>Cadastro de modelo</legend>
            <input type="hidden" name="opcao" id="opcao" value="<?=$opcao?>"/>
            <div>
            <label for="id">Id</label>
                <br/>
                <input type="text" name="id" id="id" value="<?=$id?>" readonly/>
            </div>
            <div>
                <label for="descricao">Descrição</label>
                <br/>
                <input type="text" name="descricao" id="descricao" value="<?=$descricao?>"/>
            </div>
            <div>
                <label for="anno">Anno</label>
                <br/>
                <input type="text" name="anno" id="anno" value="<?=$anno?>"/>
            </div>
            <div>
                <label for="marca">Marca</label>
                <select name="marca" id="marca">
                    <?php
                        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionar','root','');
                        $sql        = "SELECT * FROM marca";
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();

                        foreach($resultset as $row){
                            echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                        }
                    ?>
                </select>
            </div> 
            <div>
                <input type="submit" value="Salvar" />
            </div>
        </fieldset>
        <a href="http://localhost/senac/concessionar/modelo/list.php">Consultar list</a>
        <br><br><br>
        <a href="http://localhost/senac/concessionar/dashboard.php">Voltar para o Dashboard</a>
    </form>
    
</body>
</html>