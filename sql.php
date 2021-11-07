<?php

session_start();

include 'conexao.php';

$data = $_POST['data'];

$dados = json_decode($data, true);

$id = isset($dados['id']) ? $dados['id'] : 0;

$opcao = $dados['opcao'];

$nome = $dados['nome'];

$nascimento = (!empty($dados['nascimento'])) ? $dados['nascimento'] : "0001-01-01";

$telefone = $dados['telefone'];

if($opcao == "create")
{
    $sql = "INSERT INTO `cadastro`(`nome`,`nascimento`,`telefone`) VALUES ( '{$nome}', '{$nascimento}', '{$telefone}')";

    mysqli_query($conexao, $sql);
}

if($opcao == "read")
{

    $and_nome = (!empty($nome)) ? "AND nome LIKE ('%{$nome}%')" : "";
    $and_nascimento = ($nascimento != "0001-01-01") ? "AND nascimento IN '{$nascimento}'" : "";
    $and_telefone = (!empty($telefone)) ? "AND telefone LIKE '%{$telefone}%'" : "";

    $sql = "SELECT * 
            FROM `cadastro` 
            WHERE 1=1
            {$and_nome}
            {$and_nascimento}
            {$and_telefone}
            LIMIT 10";

    $consulta = mysqli_fetch_assoc(mysqli_query($conexao, $sql));

    $dados['nome'] = $consulta['nome'];

    $dados['nascimento'] = $consulta['nascimento'];

    $dados['telefone'] = $consulta['telefone'];

    $dados['id'] = $consulta['id'];
}

if($opcao == "update")
{
    $sql = "UPDATE `cadastro` 
    SET `nome` = '{$nome}', `nascimento` = '{$nascimento}', `telefone` = '{$telefone}'
    WHERE id = '{$id}'";
    mysqli_query($conexao, $sql);

}

if($opcao == "delete")
{
    $sql = "DELETE FROM `crud`.`cadastro` WHERE (`id` = '{$id}')";
    mysqli_query($conexao, $sql);
}

echo json_encode($dados);

?>