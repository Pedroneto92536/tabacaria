<?php

session_start();
include("Connections/conexao.php");

$reg = $_GET['reg'];

$sql = "DELETE FROM tbclientes WHERE reg='$reg' and reg <> 99 ";

if($reg == 99){
    $_SESSION['erro_cad_cliente_excluir'] = "Não é permitido excluir o Cliente Padrão!";
    header('Location: consulta_cliente.php');
    exit;
}else{

if ($conexao->query($sql) === TRUE) {
    $_SESSION['cad_cliente_excluir'] = "Cliente excluído com Sucesso!";
} else {
    $_SESSION['erro_cad_cliente_excluir'] = "Não foi possível excluir esse cliente";
}



$conexao->close();

header('Location: consulta_cliente.php');
exit;

}

?>