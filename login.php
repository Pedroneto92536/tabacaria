<?php
session_start();
include('Connections/conexao.php');

if (empty($_POST['email']) || empty($_POST['senha'])){
    $_SESSION['nao_autenticado'] = "Os campos devem ser preenchidos!";
    header('Location: index.php');
    exit();
}


$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$senha = mysqli_real_escape_string($conexao, md5($senha));

$query = " SELECT a.*,c.permissao FROM usuarios a, tbpermissao c WHERE a.email = '$email' and a.senha = '$senha' and a.idpermissao = c.idpermissao limit 1";

$result = mysqli_query($conexao, $query);

$resultado = mysqli_fetch_assoc($result);

$row = mysqli_num_rows($result);

if ($resultado['habilitado'] == 'N') {
    $_SESSION['nao_autenticado'] = "E-mail de acesso Bloqueado!";
    header('Location: index.php');
    exit();
}elseif ($row == 1) {
    $_SESSION['logado'] = md5('@wew67434$%#@@947@@#$@@!#54798#11a23@@dsa@!');
    $_SESSION['email'] = $email;
    $_SESSION['nome'] = $resultado['nome'];
    $_SESSION['funcao'] = $resultado['funcao'];
    $_SESSION['usuario'] = $resultado['id'];
    $_SESSION['last_time'] = time();
    $_SESSION['permissao'] = $resultado['idpermissao'];
    $_SESSION['nomepermissao'] = $resultado['permissao'];
    
    header('Location: home.php');
    exit();
}else {
    $_SESSION['nao_autenticado'] = "E-mail ou Senha incorretos! Tente novamente.";
    header('Location: index.php');
    exit();
}



?>