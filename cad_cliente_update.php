<?php

session_start();
include("Connections/conexao.php");

$reg = mysqli_real_escape_string($conexao, trim($_POST['reg']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$dtnascimento = mysqli_real_escape_string($conexao, $_POST['dtnascimento']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$habilitado = mysqli_real_escape_string($conexao, $_POST['habilitado']);

$_SESSION['reg'] = $reg;

$usuid = $_SESSION['usuario'];

$sql = "UPDATE tbclientes SET nome='$nome', cpf='$cpf', dt_nascimento='$dtnascimento', telefone='$telefone', modificado=NOW(), usuid='$usuid', habilitado='$habilitado' WHERE reg = '$reg' ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['cad_cliente_alterar'] = "Informações alteradas com Sucesso!";
}

$conexao->close();

header('Location: cad_cliente_alterar.php?reg='.$reg.' ');
exit;

?>