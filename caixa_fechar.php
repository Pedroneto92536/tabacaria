<?php
session_start();
include("Connections/conexao.php");

$banco = $_GET['banco'];


$sql = "UPDATE tbcaixa SET status='F', hora_fechamento=NOW() where banco='$banco' ";

if ($conexao->query($sql) === TRUE) {
    $_SESSION['msg_caixa'] = "Caixa Fechado com sucesso!";
} else {
    $_SESSION['erro_caixa'] = "Não foi possível fechar o caixa, tente novamente!";
}

$conexao->close();

header('Location: caixa.php');
exit;



?>