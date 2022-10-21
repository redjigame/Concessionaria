<?php 
    $opcao          = isset($_POST['opcao']) ? $_POST['opcao'] : $_GET['opcao'];
    $id             = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
    $nome           = isset($_POST['nome']) ? $_POST['nome'] : '';
    
    //validaçao do campo
    if ($opcao == 'inserir' || $opcao == 'atualizar'){
        if ($nome == ''){
            echo 'O campo nome é obrigatório';
            exit;
        }

        if (strlen($nome) <= 3){
            echo 'Você precisa digitar mais que 3 caracteres no campo nome.';
            exit;
        }
    }

    //Connexao com BDD
    //PDO = PHP Database Object
    $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionar','root','');

    if ($opcao == 'inserir'){
        //Instruçao SQL de INSERCAO
        $sql = "INSERT INTO marca (nome) VALUES ('{$nome}');";
        echo "Salvo com sucesso!";
    }else if($opcao == 'atualizar'){
        //Instruçao SQL de ATUALIZACAO
        $sql = "UPDATE marca SET nome = '{$nome}' WHERE id = {$id};";
        echo "Atualisado com sucesso!";
    }else if ($opcao == 'excluir'){
        $sql        = "DELETE FROM marca WHERE id = {$id};";
        $mensagem   = 'Excluído com Sucesso';
    }else{
        echo 'Nenhuma opção selecionada';
        exit;
    }
    
    //Execute a instruçao no BDD.
    //Commando exec retorna true em caso de sucesso e retorna false em caso de fracasso.
    $query = $conexao->exec($sql);
    //test logico para verificar o sucesso da execuçao da instrucao.
    if ($query){
        echo 'Cadastro realizado com sucesso.';
    }else{
        echo 'Erro ao salvar.';
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="refresh" content="3, url=http://localhost/senac/concessionar/marca/list.php"/>
</head>
<body>
    
</body>
</html>


