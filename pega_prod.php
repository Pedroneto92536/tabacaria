<?php
session_start();
include("Connections/conexao.php");

$referencia=$_GET['referencia'];

  $sql="SELECT c.referencia,c.descricao,c.preco,c.habilitado FROM tbproduto c where c.referencia = '$referencia' and c.habilitado = 'S'";
  $qr = mysqli_query($conexao, $sql);
  $row = mysqli_fetch_array($qr);

  $preco = $row['preco'];
  $descricao = $row['descricao'];
  
  $ar = array('referencia'=>$referencia,
              'preco'=>$preco,
              'descricao'=>$descricao

);  
  
  echo json_encode($ar);  
?>