<?php

session_start();
include("Connections/conexao.php");

$idcategoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
$referencia = mysqli_real_escape_string($conexao, trim($_POST['referencia']));
$preco = mysqli_real_escape_string($conexao, $_POST['preco']);
$habilitado = mysqli_real_escape_string($conexao, $_POST['habilitado']);

$preco = str_replace(",", ".", $preco);

$query = "select * from tbproduto where referencia = '$referencia'";
$result = mysqli_query($conexao, $query);
$resultado = mysqli_fetch_assoc($result);
$row = mysqli_num_rows($result);

if ($resultado['referencia'] >= 1) {
    $_SESSION['msg_erro_cad_produto'] = "Essa Referencia já existe!";
    header('Location: cad_produtos.php');
    exit();
}else {
    
$sql = "INSERT INTO tbproduto (referencia, idcategoria, preco, descricao, habilitado) VALUES ('$referencia', '$idcategoria', '$preco', '$nome' ,'$habilitado') ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro_produto'] = "Produto cadastrado com Sucesso!";
}else {
    $_SESSION['msg_erro_cad_produto'] = "Não foi possível cadastrar. Tente novamente!";
}

$conexao->close();

header('Location: cad_produtos.php');
exit;
}
?>