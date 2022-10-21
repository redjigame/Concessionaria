<?php
    //Connexao com BDD
    //PDO = PHP Database Object
    try{
        $conexao = new PDO('mysql:local=localhost;port=3308;dbname=concessionar','root','');
    }
    catch(PDOException $err){
        echo "conexao nao";
    }

    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png" type="images/x-ico">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($dados['SendLogin'])){
            //var_dump($dados);
            $query_usuario = "SELECT id, usuario, senha 
                                FROM usuarios 
                                WHERE usuario = :usuario  
                                LIMIT 1 ";

            $result_usuario = $conexao->prepare($query_usuario);
            $result_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR); 
            $result_usuario->execute();

            //$row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
                $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                if(($dados['senha'] == $row_usuario['senha'])){
                    $_SESSION['id'] = $row_usuario['id'];
                    $_SESSION['usuario'] = $row_usuario['usuario'];
                    header("Location: dashboard.php");
                }
                else{
                    $_SESSION['msg'] = "<p style='color: #ff0000'> Erro: Senha invalida!";
                }
            }else{
                $_SESSION['msg'] = "<p style='color: #ff0000'> Erro: Usuario ou senha invalida!";
            }
        }

        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }
        
    ?>

    <form method="POST" action="">
        <label>Usuario</label>
        <br>
        <input type="text" name="usuario" placeholder="Digite o usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'];}?>">
        <br> <br>
        <label>Senha</label>
        <br>
        <input type="password" name="senha" placeholder="Digite a senha" value="<?php if(isset($dados['senha'])){echo $dados['senha'];}?>">
        <br> <br>
        <input type="submit" value="Acessar" name="SendLogin">
    </form>
</body>
</html>