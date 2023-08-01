<?php

session_start();
include("Connections/conexao.php");

$idproduto = mysqli_real_escape_string($conexao, trim($_POST['id']));
$idcategoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
$referencia = mysqli_real_escape_string($conexao, trim($_POST['referencia']));
$preco = mysqli_real_escape_string($conexao, $_POST['preco']);
$habilitado = mysqli_real_escape_string($conexao, $_POST['habilitado']);

$preco = str_replace(",", ".", $preco);

echo $sql = "UPDATE tbproduto SET referencia='$referencia', idcategoria='$idcategoria', preco='$preco', descricao='$nome', habilitado='$habilitado', modificado=NOW() WHERE id='$idproduto' ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_alterar_produto'] = "Produto alterado com Sucesso!";
}else {
    $_SESSION['msg_erro_alterar_produto'] = "Não foi possível alterar o produto. Tente novamente!";
}

$conexao->close();

header('Location: cad_produtos_alterar.php?referencia='.$referencia.'&idproduto='.$idproduto.'');
exit;
?>