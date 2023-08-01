<?php

session_start();
include("Connections/conexao.php");

$idcategoria = $_GET['idcategoria'];

$sql = "DELETE FROM tbcategorias WHERE idcategoria='$idcategoria' ";

if ($conexao->query($sql) === TRUE) {
    $_SESSION['cad_categoria_excluir'] = "Categoria Excluída com Sucesso!";
} else {
    $_SESSION['erro_cad_categoria_excluir'] = "Não foi possível excluir essa categoria";
}


$conexao->close();

header('Location: cad_categoria.php');
exit;
?>