<?php

session_start();
include("Connections/conexao.php");

$caixa = mysqli_real_escape_string($conexao, trim($_POST['caixa']));
$valor = mysqli_real_escape_string($conexao, trim($_POST['valor']));
$beneficiario = mysqli_real_escape_string($conexao, $_POST['beneficiario']);
$historico = mysqli_real_escape_string($conexao, $_POST['historico']);

$valor = str_replace(",", ".", $valor*-1);



$sql = "INSERT INTO tbpedido_pagamento (idpedido, forma, valor, tipo, data_pagamento, status, beneficiario, historico) VALUES ('0', 'R$', '$valor', 'DES', NOW(), 'F', '$beneficiario', '$historico') ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_despesa'] = "Despesa lançada com Sucesso!";
}else {
    $_SESSION['status_despesa_error'] = "Erro ao concluir a Despesa!";
}

$conexao->close();

header('Location: despesa.php');
exit;
?>