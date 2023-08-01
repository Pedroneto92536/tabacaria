<?php

session_start();
include("Connections/conexao.php");

$id = $_GET['id'];

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
$senha_confirma = mysqli_real_escape_string($conexao, trim(md5($_POST['senha_confirma'])));
$rg = mysqli_real_escape_string($conexao, trim($_POST['rg']));
$dtnascimento = mysqli_real_escape_string($conexao, $_POST['dtnascimento']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$permissao = mysqli_real_escape_string($conexao, $_POST['permissao']);
$habilitado = mysqli_real_escape_string($conexao, $_POST['habilitado']);
$usuid = $_SESSION['usuario'];

if ($senha != $senha_confirma){ 
        $_SESSION['erro_alterar_usuario'] = "As senhas não são iguais!";
        header('Location: cad_usuario_alterar.php?id=' . $id . ' ');
        exit;
}elseif (empty($senha)){
        $_SESSION['erro_alterar_usuario'] = "Campo Senha em Branco!";
        header('Location: cad_usuario_alterar.php?id=' . $id . ' ');
        exit;
}elseif (empty($senha_confirma)){
        $_SESSION['erro_alterar_usuario'] = "Campo Confirmar Senha em Branco!";
        header('Location: cad_usuario_alterar.php?id=' . $id . ' ');
}else{


echo $sql = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha', senha_confirma='$senha_confirma', rg='$rg', telefone='$telefone', dt_nascimento='$dtnascimento', Modificado=NOW(), habilitado='$habilitado', usuid='$usuid', idpermissao='$permissao' WHERE id='$id' ";

if($conexao->query($sql) === TRUE){
	$_SESSION['alterar_usuarios_sucesso'] = "Usuário alterado com Sucesso!";
}else {
        $_SESSION['erro_alterar_usuario'] = "Não foi possível alterar o Usuário!";
}

$conexao->close();

header('Location: cad_usuario_alterar.php?id='.$id.' ');
exit;
}

?>