<?php

session_start();
include("Connections/conexao.php");

$idcomanda = $_GET['idcomanda'];
$idpedido = $_GET['idpedido'];

$sql = "UPDATE tbpedidos SET status='D' WHERE idpedido='$idpedido' ";

if ($conexao->query($sql) === TRUE) {
    $_SESSION['status_pedido'] = "Pedido Excluído com Sucesso!";
} else {
    $_SESSION['msg_erro_pedido'] = "Pedido Não excluído update 1, Tente novamente!";
}

$sql2 = "UPDATE tbcomanda SET status='A' WHERE idcomanda='$idcomanda' ";

if ($conexao->query($sql2) === TRUE) {
    $_SESSION['status_pedido'] = "Pedido Excluído com Sucesso!";
} else {
    $_SESSION['msg_erro_pedido'] = "Pedido Não excluído, Tente novamente!";
}

echo $sql2 = "DELETE FROM tbpedido_pagamento WHERE idpedido ='$idpedido' ";

if ($conexao->query($sql2) === TRUE) {
    $_SESSION['status_pedido'] = "Pedido Excluído com Sucesso!";
} else {
    $_SESSION['msg_erro_pedido'] = "Pedido Não excluído, Tente novamente!";
}

$conexao->close();

header('Location: home.php');
exit;
?>