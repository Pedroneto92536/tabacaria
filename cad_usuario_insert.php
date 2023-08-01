<?php

session_start();
include("Connections/conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
$senha_confirma = mysqli_real_escape_string($conexao, trim(md5($_POST['senha_confirma'])));
$rg = mysqli_real_escape_string($conexao, trim($_POST['rg']));
$dtnascimento = mysqli_real_escape_string($conexao, $_POST['dtnascimento']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$permissao = mysqli_real_escape_string($conexao, $_POST['permissao']);

$sql = "select count(*) as total from usuarios where rg = '$rg' or email = '$email' ";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] >= 1) {
    $_SESSION['msg_erro'] = "O Usuário já existe em nosso sistema!";
    header('Location: cad_usuario.php');
    exit;
}elseif ($senha != $senha_confirma){ 
        $_SESSION['msg_erro'] = "As senhas não são iguais!";
        header('Location: cad_usuario.php ');
        exit;
}elseif (empty($senha)){
        $_SESSION['msg_erro'] = "Campo Senha em Branco!";
        header('Location: cad_usuario.php ');
        exit;
}elseif (empty($senha_confirma)){
        $_SESSION['msg_erro'] = "Campo Confirmar Senha em Branco!";
        header('Location: cad_usuario.php ');
}else{


$sql = "INSERT INTO usuarios (nome, email, senha, senha_confirma, rg, telefone, dt_nascimento, criado, idpermissao) values ('$nome', '$email', '$senha', '$senha_confirma', '$rg', '$telefone', '$dtnascimento', NOW(), '$permissao')";

if($conexao->query($sql) === TRUE){
	$_SESSION['status_cad_usuario'] = "Cadastro Realizado com Sucesso!";
}else {
        $_SESSION['erro_cad_usuario'] = "Erro ao Cadastrar o usuário!";
}

$conexao->close();

header('Location: cad_usuario.php');
exit;
}

?>