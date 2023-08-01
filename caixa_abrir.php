<?php
session_start();
include("Connections/conexao.php");

$banco = $_GET['banco'];

$sql = "SELECT sum(c.valor+c.troco) as saldo FROM tbpedido_pagamento c where c.status='F'; ";
$rssaldo = mysqli_query($conexao, $sql);
$row_saldo = mysqli_fetch_array($rssaldo);
$saldo = $row_saldo['saldo'];

echo $sql = "UPDATE tbcaixa SET status='A', hora_abertura=NOW() ";

if ($conexao->query($sql) === TRUE) {
    $_SESSION['msg_caixa'] = "Caixa aberto com sucesso!";
} else {
    $_SESSION['erro_caixa'] = "Não foi possível abrir o caixa, tente novamente!";
}

$conexao->close();

header('Location: caixa.php');
exit;



?>