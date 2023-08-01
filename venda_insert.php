<?php

session_start();
include("Connections/conexao.php");

$sql = "INSERT INTO tbpedidos (reg, tipo, titulo, data_inc) VALUES ('99','V','Venda', NOW()) ";


if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = "Novo Pedido Criado!";
}else {
    $_SESSION['msg_erro'] = "Produto sem preço ou sem estoque!";
}


$query = "select max(idpedido)ultimo from tbpedidos c;";

$result2 = mysqli_query($conexao, $query);
$resultado = mysqli_fetch_array($result2);

$conexao->close();

header('Location: nova_venda.php');
exit;
?>