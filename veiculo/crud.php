<?php 
    $opcao     = isset($_POST['opcao']) ? $_POST['opcao'] : $_GET['opcao'];
    $id        = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
    $motorizacao = isset($_POST['motorizacao']) ? $_POST['motorizacao'] : '';
    $ano = isset($_POST['ano']) ? $_POST['ano'] : '';
    $chassi = isset($_POST['chassi']) ? $_POST['chassi'] : '';
    $tipo_veiculo = isset($_POST['tipo_veiculo']) ? $_POST['tipo_veiculo'] : '';
    $combustivel = isset($_POST['combustivel']) ? $_POST['combustivel'] : '';
    $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
    //validaçao do campo
    if ($opcao == 'inserir' || $opcao == 'atualizar'){
        if ($motorizacao == ''){
            echo 'O campo nome é obrigatório';
            exit;
        }
    }

    //Connexao com BDD
    //PDO = PHP Database Object
    $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionar','root','');

    if ($opcao == 'inserir'){
        //Instruçao SQL de INSERCAO
        $sql = "INSERT INTO veiculo (motorizaco) VALUES ('{$motorizaco}');";
        echo "Salvo com sucesso!";
    }else if($opcao == 'atualizar'){
        //Instruçao SQL de ATUALIZACAO
        $sql = "UPDATE veiculo SET motorizaco = '{$motorizaco}' WHERE id = {$id};";
        echo "Atualisado com sucesso!";
    }else if ($opcao == 'excluir'){
        $sql        = "DELETE FROM veiculo WHERE id = {$id};";
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