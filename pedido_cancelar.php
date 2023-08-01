<?php

session_start();
include("Connections/conexao.php");

$idpedido = $_GET['idpedido'];

$sql = "UPDATE tbpedidos SET status='D' WHERE idpedido='$idpedido' ";

if ($conexao->query($sql) === TRUE) {
    $_SESSION['status_pedido'] = "Pedido Cancelado com Sucesso!";
} else {
    $_SESSION['msg_erro_pedido'] = "Pedido Não excluído update 1, Tente novamente!";
}

$sql2 = "UPDATE tbpedido_pagamento SET status = 'C' WHERE idpedido = '$idpedido' ";

if ($conexao->query($sql2) === TRUE) {

} else {

}

$conexao->close();

header('Location: home.php');
exit;
?>