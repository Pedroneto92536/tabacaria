<?php

session_start();
include("Connections/conexao.php");

$href = mysqli_real_escape_string($conexao, trim($_POST['href']));
$icone = mysqli_real_escape_string($conexao, trim($_POST['icone']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);


$sql = "INSERT INTO tbcadastro_menu (href, icon, nome, tipo) VALUES ('$href', '$icone', '$nome', '$tipo') ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = "Menu Cadastro com Sucesso!";
}else {
    $_SESSION['msg_erro'] = "Tente novamente!";
}

$conexao->close();

header('Location: cad_menu.php');
exit;
?>