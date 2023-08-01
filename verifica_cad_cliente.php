<?php

session_start();
include("Connections/conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$rg = mysqli_real_escape_string($conexao, trim($_POST['rg']));
$dtnascimento = mysqli_real_escape_string($conexao, $_POST['dtnascimento']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);

$sql = "select count(*) as total from tbclientes where rg = '$rg'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuario_existe'] = "O Cliente já existe em nosso sistema!";
    header('Location: cad_cliente.php');
    exit;
}

$sql = "INSERT INTO tbclientes (nome, rg, telefone, dt_nascimento, data_cadastro) VALUES ('$nome', '$rg', '$telefone', '$dtnascimento', NOW()) ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro_cliente'] = "Cliente Cadastrado com Sucesso!";
}

$conexao->close();

header('Location: cad_cliente.php');
exit;
?>