<?php
include("Connections/conexao.php");

function retorna($cpf, $conexao)
{
    $result_aluno = "SELECT * FROM tbclientes WHERE cpf = '$cpf' limit 1";
    $resultado_aluno = mysqli_query($conexao, $result_aluno);
    if ($resultado_aluno->num_rows) {
        $row_aluno = mysqli_fetch_assoc($resultado_aluno);
        $valores['nome_cli'] = $row_aluno['nome'];
        $valores['reg'] = $row_aluno['reg'];
    } else {
        $valores['nome_cli'] = 'Cliente não encontrado';
    }
    return json_encode($valores);
}

if (isset($_GET['cpf'])) {
    echo retorna($_GET['cpf'], $conexao);
}



?>