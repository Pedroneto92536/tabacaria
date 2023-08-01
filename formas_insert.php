<?php
session_start();
include("Connections/conexao.php");

$idpedido = mysqli_real_escape_string($conexao, $_POST['pedido']);
$reg = mysqli_real_escape_string($conexao, $_POST['reg']);
$preco = mysqli_real_escape_string($conexao, $_POST['preco']);
$tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$forma = mysqli_real_escape_string($conexao, $_POST['forma']);
$valor = mysqli_real_escape_string($conexao, $_POST['valor']);
$valorrecebido = mysqli_real_escape_string($conexao, $_POST['valorrecebido']);

$valor=str_replace(",",".",$valor);
$valorrecebido=str_replace(",",".",$valorrecebido);

$_SESSION['idpedido'] = $idpedido;

$troco = $valor - $valorrecebido;

$troco=str_replace(",",".",$troco);

$sql = "select * from tbpedido_pagamento where forma = '$forma' AND idpedido = '$idpedido'; ";
$rsforma_verifica = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($rsforma_verifica);

$sql2 = "select sum(valor) as total from tbpedido_pagamento where idpedido = '$idpedido' ";
$rstotformas = mysqli_query($conexao, $sql2);
$result = mysqli_fetch_array($rstotformas);
$totalformas = $result['total'];

$total = $totalformas;

$sql3 = "SELECT a.nome,b.* FROM tbclientes a, tbpedidos b where a.reg = b.reg and idpedido = '$idpedido' ";
$rscli = mysqli_query($conexao, $sql3);
$row_rscli = mysqli_fetch_array($rscli);

$diferenca = $row_rscli['valor'] - $total;

if(($valor == "0") or ($forma == "")) {
    $_SESSION['msg_erro_forma'] = "Insira um Valor ou Forma de Pagamento em Branco!";
    header('Location: form_pagamento.php');
    exit;
}else if((int) $valor > (int)$diferenca){

    $_SESSION['msg_erro_forma'] = "Valor inserido é maior que o valor que falta!";
    header('Location: form_pagamento.php');
    exit;
}else{

    if($forma == "R$"){

        if ($valorrecebido < $valor) {
            $_SESSION['msg_erro_forma'] = "Valor Recebido não pode ser menor que o Valor à pagar!";
            header('Location: form_pagamento.php');
            exit;
        }

        $sql = "INSERT INTO tbpedido_pagamento (idpedido, forma, valor, troco, tipo) VALUES ('$idpedido', '$forma', '$valor', '$troco', '$tipo') ";

        if($conexao->query($sql) === TRUE) {
            $_SESSION['status_forma'] = "Forma de Pagamento adicionada!";
        }else {
            $_SESSION['msg_erro_forma'] = "Tente novamente!";
        }

        $conexao->close();

        header('Location: form_pagamento.php');
        exit;

    }else{


$sql = "INSERT INTO tbpedido_pagamento (idpedido, forma, valor, troco, tipo) VALUES ('$idpedido', '$forma', '$valor', '0', '$tipo') ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_forma'] = "Forma de Pagamento adicionada!";
}else {
    $_SESSION['msg_erro_forma'] = "Tente novamente!";
}

$conexao->close();

header('Location: form_pagamento.php');
exit;

    }

}

?>