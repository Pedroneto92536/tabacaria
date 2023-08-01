<?php

session_start();
include("Connections/conexao.php");

$comanda = mysqli_real_escape_string($conexao, trim($_POST['comanda']));
$reg = mysqli_real_escape_string($conexao, trim($_POST['reg']));
$titulo = mysqli_real_escape_string($conexao, trim($_POST['tipo']));

$sql = "SELECT count(*) as total FROM tbpedidos where reg = '$reg' and status = 'A'; ";
$rscliexist = mysqli_query($conexao, $sql);
$result = mysqli_fetch_array($rscliexist);
$row = $result['total'];

if($row >= 1){
    $_SESSION['msg_erro_comanda'] = "Usuário com Comanda em Aberto!";
    header('Location: nova_comanda.php');
    exit;
}else{


$sql = "INSERT INTO tbpedidos (comanda, reg, tipo, titulo, data_inc) VALUES ('$comanda', '$reg', 'L','$titulo', NOW()) ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_comanda'] = "Novo Pedido Criado!";
}else {
    $_SESSION['msg_erro_comanda'] = "Tente novamente!";
}

$sql2 = "UPDATE tbcomanda SET status='U' WHERE idcomanda='$comanda' ";

if ($conexao->query($sql2) === TRUE) {
    $_SESSION['status_comanda'] = "Novo Pedido Criado!";
} else {
    $_SESSION['msg_erro_comanda'] = "Tente novamente!";
}

$conexao->close();

header('Location: nova_comanda.php');
exit;

}
?>