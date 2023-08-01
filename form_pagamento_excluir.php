<?php

session_start();
include("Connections/conexao.php");

$idforma = $_GET['idforma'];
$idpedido = $_GET['idpedido'];

$sql2 = "DELETE FROM tbpedido_pagamento WHERE idpedido='$idpedido' and idforma='$idforma' ";

if ($conexao->query($sql2) === TRUE) {
    $_SESSION['status_forma'] = "Forma de Pagamento Excluída!";
} else {
    $_SESSION['msg_erro_forma'] = "Pedido Não excluído, Tente novamente!";
}

$conexao->close();

header('Location: form_pagamento.php');
exit;
?>