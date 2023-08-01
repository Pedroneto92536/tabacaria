<?php
include("Connections/conexao.php");

if (isset($_POST["nome"])) {
	$busca = $_POST["nome"];
	$query = "SELECT *,date_format(data_cadastro, '%d/%m/%Y') AS data_cadastro FROM tbclientes where nome like '%".$busca."%' order by nome asc;";
}
else {
	$query = "select * from tbclientes order by nome";
}

$rscli = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($rscli);

if ($row > 0) {
	$data = '<br><div class="table-responsive">
		<table class="table table-responsive-md table-hover mb-0">
		<tr>
            <th>Nome</th>
            <th>RG</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
		</tr>
	';
	foreach($rscli as $row) {
		$data .= '
			<tr>
				<td>'.$row["nome"].'</td>
                <td>'.$row["rg"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["telefone"].'</td>
                <td>'.$row["dt_nascimento"].'</td>
                <td class="actions-hover actions-fade">
                    <a href="#"><i class="fas fa-pencil-alt"></i></a>
                    <a href="#" class="delete-row"><i class="far fa-trash-alt"></i></a>
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