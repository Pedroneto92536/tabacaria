<?php

session_start();
include("Connections/conexao.php");

$idpedido = mysqli_real_escape_string($conexao, trim($_POST['pedido']));
$iditem = mysqli_real_escape_string($conexao, trim($_POST['iditem']));
$referencia = mysqli_real_escape_string($conexao, trim($_POST['referencia']));
$preco = mysqli_real_escape_string($conexao, $_POST['preco']);
$qtde = mysqli_real_escape_string($conexao, $_POST['qtde']);
$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);


$_SESSION['idpedido'] = $idpedido;
$_SESSION['iditem'] = $iditem;

echo $multi = $preco * $qtde;

$resultado = 0;
echo $resultado = $resultado + $multi;

echo $resultado;

// SELECT QUE PEGA RESULTADO COMO VARIAVEL //
$sql = "select sum(valor*quantidade) as total from tbpedidos_item where idpedido = '$idpedido' ";
$rstotvenda = mysqli_query($conexao, $sql);
$result = mysqli_fetch_array($rstotvenda);
$totalvenda = $result['total'];

$total = $totalvenda + $resultado;

echo $total;

$sql = "UPDATE tbpedidos_item SET valor='$resultado' AND quantidade='$qtde' WHERE idpedido = '$idpedido' and iditem = '$iditem' ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_prod_alt'] = "Produto Alterado!";
}else {
    $_SESSION['msg_erro_prod_alt'] = "Verifique e Tente novamente!";
}


$sql2 = "UPDATE tbpedidos SET valor='$total' WHERE idpedido='$idpedido' ";

if ($conexao->query($sql2) === TRUE) {
    $_SESSION['status_prod_update'] = "Pedido Excluído com Sucesso!";
} else {
    $_SESSION['msg_erro_prod_update'] = "Pedido Não excluído, Tente novamente!";
}


$conexao->close();

exit;
?>