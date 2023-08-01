<?php
include("Connections/conexao.php");

if (isset($_POST["nome"])) {
	$busca = $_POST["nome"];
	$query = "SELECT *,date_format(data_cadastro, '%d/%m/%Y') AS data_cadastro FROM tbclientes where nome like '".$busca."%' order by nome asc;";
}elseif (isset($_POST["rg"])) {
	$buscarg = $_POST["rg"];
	$query = "SELECT *,date_format(data_cadastro, '%d/%m/%Y') AS data_cadastro FROM tbclientes where rg like '".$buscarg."%' order by nome asc;";
}else {
	$query = "select * from tbclientes order by nome limit 10";
}

$rscli = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($rscli);

if ($row > 0) {
	$data = '<br><div class="table-responsive">
                <table class="table table-responsive-md table-hover mb-0" ">
                    <tr>
                        <th>Nome</th>
                        <th>RG</th>
                        <th class="d-none d-sm-table-cell">Telefone</th>
                        <th class="text-left">Data de Nascimento</th>
                        <th>Ações</th>
                    </tr>
	';
	foreach($rscli as $row) {
		$data .= '
			<tr>
                <td>'.$row["nome"].'</td>
                <td>'.$row["rg"]. '</td>
                <td class="d-none d-sm-table-cell">'.$row["telefone"].'</td>
                <td class="text-left">'.$row["dt_nascimento"]. '</td>
                <td class="actions-hover actions-fade">
                    <a class="btn btn-dark text-white" href="cad_cliente_alterar.php?reg='.$row["reg"]. '"><i class="fas fa-pencil-alt"></i></a>
                    <a href="cad_cliente_excluir.php?reg=' . $row["reg"] . '" class="btn btn-danger text-white"><i class="far fa-trash-alt"></i></a>
                </td>
			</tr>
		';
	}
	$data .= '</table></div>';
}
else {
	$data = "Nenhum registro localizado.";
}
echo $data;


