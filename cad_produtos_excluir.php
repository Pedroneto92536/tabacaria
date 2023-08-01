<?php

session_start();
include("Connections/conexao.php");

$referencia = $_GET['referencia'];

echo $sql = "DELETE FROM tbproduto WHERE referencia='$referencia' ";

if($conexao->query($sql) === TRUE){
	$_SESSION['excluir_produto_sucesso'] = "Produto Excluído com Sucesso!";
}else {
        $_SESSION['erro_produto_excluir'] = "Não foi possível excluir o Produto!";
}

$conexao->close();

header('Location: consulta_produtos.php');
exit;

?>