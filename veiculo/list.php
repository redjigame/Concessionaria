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
                <th>motorizaçao</th>
                <th>Anno</th>
                <th>Chassi</th>
                <th>Tipo Veiculo</th>
                <th>Combustivel</th>
                <th>Modelo</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        <thead>
        <tbody>
            <?php
                $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionar','root','');
                $sql        = "SELECT *,
                (SELECT mc.nome FROM marca mc WHERE m.marca = mc.id) 'mc',
                (SELECT t.descricao FROM tipo_veiculo t WHERE t.id = v.tipo_veiculo) 'tipo_veiculo',
                m.descricao 'modelo',
                c.descricao 'combustivel',
                v.id 'cod'
                FROM veiculo v
                INNER JOIN modelo m ON m.id = v.modelo
                INNER JOIN combustivel c ON c.id = v.combustivel";

                $dataset    = $conexao->query($sql);
                $resultset  = $dataset->fetchAll();

                foreach($resultset as $row){
                    echo '
                        <tr>
                            <td class=text-center>'.$row['id'].'</td>
                            <td class=text-center>'.$row['motorizacao'].'</td>
                            <td class=text-center>'.$row['ano'].'</td>
                            <td class=text-center>'.$row['chassi'].'</td>
                            <td class=text-center>'.$row['tipo_veiculo'].'</td>
                            <td class=text-center>'.$row['combustivel'].'</td>
                            <td class=text-center>'.$row['modelo'].'</td>
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
    <a href="http://localhost/senac/concessionar/veiculo/form.php">Voltar</a>
</body>
</html>