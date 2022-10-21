<?php
    session_start();
    ob_start();

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $motorizacao = '';
    $ano = '';
    $chassi = '';
    $tipo_veiculo = '';
    $combustivel = '';
    $modelo = '';
    $opcao = 'inserir';

    if($id != ''){
        $opcao = 'atualizar';
        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionar','root','');
        $sql = "SELECT * FROM veiculo WHERE id = {$id};";
        $dataset = $conexao->query($sql);
        $resultset  = $dataset->fetch();

        $motorizacao = $resultset['motorizacao'];
        $ano = $resultset['ano'];
        $chassi = $resultset['chassi'];
        $tipo_veiculo = $resultset['tipo_veiculo'];
        $combustivel = $resultset['combustivel'];
        $modelo = $resultset['modelo'];
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
    <title>Veiculos</title>
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
                <label for="motorizacao">motorizacao</label>
                <br/>
                <input type="text" name="motorizacao" id="motorizacao" value="<?=$motorizacao?>"/>
            </div>
            <div>
                <label for="ano">Ano</label>
                <br/>
                <input type="text" name="ano" id="ano" value="<?=$ano?>"/>
            </div>
            <div>
                <label for="chassi">chassi</label>
                <br/>
                <input type="text" name="chassi" id="chassi" value="<?=$chassi?>"/>
            </div>
            <div>
                <label for="tipo_veiculo">tipo_veiculo</label>
                <select name="tipo_veiculo" id="tipo_veiculo">
                    <?php
                        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionar','root','');
                        $sql        = "SELECT * FROM tipo_veiculo";
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();

                        foreach($resultset as $row){
                            echo '<option value="'.$row['id'].'">'.$row['descricao'].'</option>';
                        }
                    ?>
                </select>
            </div> 
            <div>
                <label for="combustivel">combustivel</label>
                <select name="combustivel" id="combustivel">
                    <?php
                        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionar','root','');
                        $sql        = "SELECT * FROM combustivel";
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();

                        foreach($resultset as $row){
                            echo '<option value="'.$row['id'].'">'.$row['descricao'].'</option>';
                        }
                    ?>
                </select>
            </div> 
            <div>
                <label for="modelo">modelo</label>
                <select name="modelo" id="modelo">
                    <?php
                        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionar','root','');
                        $sql        = "SELECT * FROM modelo";
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();

                        foreach($resultset as $row){
                            echo '<option value="'.$row['id'].'">'.$row['descricao'].'</option>';
                        }
                    ?>
                </select>
            </div> 
            <div>
                <input type="submit" value="Salvar" />
            </div>
        </fieldset>
        <a href="http://localhost/senac/concessionar/veiculo/list.php">Consultar list</a>
        <br><br><br>
        <a href="http://localhost/senac/concessionar/dashboard.php">Voltar para o Dashboard</a>
    </form>
</body>
</html>