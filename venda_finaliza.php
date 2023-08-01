<?php

session_start();
include("Connections/conexao.php");

if (isset($_GET['idpedido'])) {
    $idpedido = $_GET['idpedido'];
} else {
    $idpedido =  $_SESSION['idpedido'];
}

$usu_id = $_SESSION['usuario'];

// SELECT QUE PEGA RESULTADO COMO VARIAVEL //
$sql = "SELECT * from tbpedidos where idpedido = '$idpedido';";
$rspedidos = mysqli_query($conexao, $sql);
$result = mysqli_fetch_array($rspedidos);

echo $sql = "UPDATE tbpedidos SET status='F', data_finaliza=NOW(), usu_id='$usu_id' WHERE idpedido='$idpedido' ";

if ($conexao->query($sql) === TRUE) {
    $_SESSION['status_pedido'] = "Pedido ".$idpedido." Finalizado com Sucesso!";
} else {
    $_SESSION['msg_erro_pedido'] = "Pedido Não Finalizado, Tente novamente!";
}

echo $sql2 = "UPDATE tbpedido_pagamento SET status='F', data_pagamento=NOW() WHERE idpedido='$idpedido' ";

if ($conexao->query($sql2) === TRUE) {
    $_SESSION['status_pedido'] = "Pedido " . $idpedido . " Finalizado com Sucesso!";
} else {
    $_SESSION['msg_erro_pedido'] = "Pedido Não Finalizado, Tente novamente!";
}

$conexao->close();

header('Location: home.php');
exit;
?>