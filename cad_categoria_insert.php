<?php

session_start();
include("Connections/conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$habilitado = mysqli_real_escape_string($conexao, $_POST['habilitado']);

$sql = "select count(*) as total from tbcategorias where nome='$nome'  ";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] >= 1) {
    $_SESSION['msg_erro_cad_categoria'] = "Esta categoria já existe!";
    header('Location: cad_categoria.php');
    exit;
}else {
    
$sql = "INSERT INTO tbcategorias (nome, habilitado) VALUES ('$nome', '$habilitado') ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro_categoria'] = "Categoria cadastrada com Sucesso!";
}else {
    $_SESSION['msg_erro_cad_categoria'] = "Não foi possível cadastrar. Tente novamente!";
}

$conexao->close();

header('Location: cad_categoria.php');
exit;
}

?>