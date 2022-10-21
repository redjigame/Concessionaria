<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .text-center{
            text-align:center;
        }

        table{
            width:100%;
        }

        h1{
            text-align:center;
        }

        .titulo{
            margin-bottom:-10px;
        }

        table thead tr th{
            border-bottom:2px solid #000;
        }
        .div-button button{
            float: right;
            margin: 15px;
            width:75px;
            border:0;
            background-color: #ccc;
            padding:5px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<h1 class="titulo">Lista de Modelos</h1>
    <hr/>
    <div class="div-button">
        <button>Novo</button>
    </div>
    <table cellspacing="0">
        <thead>
            <tr>
                <th>ID</td>
                <th>Nome</th>
                <th>Anno</th>
                <th>Marca</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        <thead>
        <tbody>
            <?php
                $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionar','root','');
                $sql        = "SELECT * FROM modelo m INNER JOIN marca mc ON mc.id = m.marca;";
                $dataset    = $conexao->query($sql);
                $resultset  = $dataset->fetchAll();

                foreach($resultset as $row){
                    echo '
                        <tr>
                            <td class=text-center>'.$row['id'].'</td>
                            <td class=text-center>'.$row['descricao'].'</td>
                            <td class=text-center>'.$row['anno'].'</td>
                            <td class=text-center>'.$row['marca'].'</td>
                            <td class=text-center>
                                <a href="form.php?id='.$row['id'].'">Editar</a>
                            </td>
                            <td align="center">
                                <a href="crud.php?opcao=excluir&id='.$row['id'].'">Excluir</a>
                            </td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
    <br/>
    <a href="http://localhost/senac/concessionar/modelo/form.php">Voltar</a>

</body>
</html>