<?php

session_start();
include("Connections/conexao.php");

$idcategoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$habilitado = mysqli_real_escape_string($conexao, $_POST['habilitado']);

    
$sql = "UPDATE tbcategorias SET nome='$nome', habilitado='$habilitado' WHERE idcategoria = '$idcategoria'";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro_categoria'] = "Categoria alterada com Sucesso!";
}else {
    $_SESSION['msg_erro_cad_categoria'] = "Não foi possível alterar. Tente novamente!";
}

$conexao->close();

header('Location: cad_categoria.php');
exit;

?>