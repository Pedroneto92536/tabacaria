<?php

session_start();
include("Connections/conexao.php");

if (isset($_GET['idpedido'])) {
    $idpedido = $_GET['idpedido'];
} else {
    $idpedido =  $_GET['idpedido'];
}

// SELECT QUE PEGA RESULTADO COMO VARIAVEL //
$sql = "SELECT * from tbpedidos where idpedido = '$idpedido';";
$rspedidos = mysqli_query($conexao, $sql);
$result = mysqli_fetch_array($rspedidos);

$idcomanda = $result['comanda'];

$usu_id = $_SESSION['usuario'];

$sql2 = "UPDATE tbcomanda SET status='A' WHERE idcomanda='$idcomanda' ";

if ($conexao->query($sql2) === TRUE) {
    $_SESSION['status_pedido'] = "Comanda " . $idcomanda . " Finalizada com Sucesso!";
} else {
    $_SESSION['msg_erro_pedido'] = "Pedido Não excluído, Tente novamente!";
}

$sql3 = "UPDATE tbpedidos SET status='F', data_finaliza=NOW(), usu_id='$usu_id' WHERE idpedido='$idpedido' ";

if ($conexao->query($sql3) === TRUE) {
    $_SESSION['status_pedido'] = "Comanda ".$idcomanda." Finalizada com Sucesso!";
} else {
    $_SESSION['msg_erro_pedido'] = "Pedido Não excluído, Tente novamente!";
}

$sql4 = "UPDATE tbpedido_pagamento SET status='F', data_pagamento=NOW() WHERE idpedido='$idpedido' ";

if ($conexao->query($sql4) === TRUE) {
    $_SESSION['status_pedido'] = "Comanda " . $idcomanda . " Finalizada com Sucesso!";
} else {
    $_SESSION['msg_erro_pedido'] = "Pedido Não excluído, Tente novamente!";
}

$conexao->close();

header('Location: home.php');
exit;
?>