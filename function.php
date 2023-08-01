<?php
include("Connections/conexao.php");

function retorna($referencia, $conexao)
{
    $result_aluno = "SELECT * FROM tbproduto WHERE referencia = '$referencia' limit 1";
    $resultado_aluno = mysqli_query($conexao, $result_aluno);
    if ($resultado_aluno->num_rows) {
        $row_aluno = mysqli_fetch_assoc($resultado_aluno);
        $valores['preco'] = $row_aluno['preco'];
        $valores['descricao'] = $row_aluno['descricao'];
    } else {
        $valores['descricao'] = 'Descrição não encontrada';
    }
    return json_encode($valores);
}

if (isset($_GET['referencia'])) {
    echo retorna($_GET['referencia'], $conexao);
}



?>