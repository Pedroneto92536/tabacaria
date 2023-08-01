<?php

session_start();
include("Connections/conexao.php");

$idpedido = mysqli_real_escape_string($conexao, trim($_POST['pedido']));
$referencia = mysqli_real_escape_string($conexao, trim($_POST['referencia']));
$preco = mysqli_real_escape_string($conexao, $_POST['preco']);
$qtde = mysqli_real_escape_string($conexao, $_POST['qtde']);
$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

if($qtde <= 0){
    $_SESSION['msg_erro_prod_add'] = "Verifique a Quantidade do Produto!";
    header('Location: pedido_itens_adiciona.php');
    exit;
}else{

$_SESSION['idpedido'] = $idpedido;

// $multi = $preco * $qtde;

// $resultado = $resultado + $multi;

// // SELECT QUE PEGA RESULTADO COMO VARIAVEL //
// $sql = "select sum(valor*quantidade) as total from tbpedidos_item where idpedido = '$idpedido' ";
// $rstotvenda = mysqli_query($conexao, $sql);
// $result = mysqli_fetch_array($rstotvenda);
// $totalvenda = $result['total'];


// $total = $totalvenda + $resultado;

$sql = "SELECT c.iditem,c.quantidade, count(*) as existe FROM tbpedidos_item c where idpedido = '$idpedido' and referencia = '$referencia';";
$rstotvenda = mysqli_query($conexao, $sql);
$row = mysqli_fetch_array($rstotvenda);

if ($row['existe'] >= 1) {
    $qtde = $row['quantidade'] + $qtde;
    $valor = $qtde * $preco;
    $iditem = $row['iditem'];
    $sql = "UPDATE tbpedidos_item SET referencia = '$referencia', descricao = '$descricao', quantidade = '$qtde', valor = '$valor' WHERE idpedido = '$idpedido' and iditem= '$iditem' ";
} else {
    $sql = "INSERT INTO tbpedidos_item (idpedido, referencia, descricao, quantidade, valor) VALUES ('$idpedido', '$referencia', '$descricao', '$qtde', '$preco')";
}

// $sql = "INSERT INTO tbpedidos_item (idpedido, referencia, descricao, quantidade, valor) VALUES ('$idpedido', '$referencia', '$descricao', '$qtde', '$preco')";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_prod_add'] = "Produto adicionado!";
}else {
    $_SESSION['msg_erro_prod_add'] = "Produto sem preço ou sem estoque!";
}


//$sql2 = "UPDATE tbpedidos SET valor='$total' WHERE idpedido='$idpedido' ";

//if ($conexao->query($sql2) === TRUE) {
    //$_SESSION['status_prod_update'] = "Pedido Excluído com Sucesso!";
//} else {
   // $_SESSION['msg_erro_prod_update'] = "Pedido Não excluído, Tente novamente!";
//}


$conexao->close();

header('Location: pedido_itens_adiciona.php');
exit;

}
?>