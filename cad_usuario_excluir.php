<?php

session_start();
include("Connections/conexao.php");

$id = $_GET['id'];

echo $sql = "DELETE FROM usuarios WHERE id='$id' ";

if($id == 1){
        $_SESSION['erro_usuarios_excluir'] = "Não é possível excluir o usuário Administrador!";
        header('Location: consulta_usuario.php');
        exit;
}


if($conexao->query($sql) === TRUE){
	$_SESSION['excluir_usuarios_sucesso'] = "Usuário Excluído com Sucesso!";
}else {
        $_SESSION['erro_usuarios_excluir'] = "Não foi possível excluir o Usuário!";
}

$conexao->close();

header('Location: consulta_usuario.php');
exit;

?>