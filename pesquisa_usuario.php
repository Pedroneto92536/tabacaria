<?php
include("Connections/conexao.php");

if (isset($_POST["nome"])) {
	$busca = $_POST["nome"];
	$query = "SELECT c.*, a.permissao  FROM usuarios c, tbpermissao a where c.nome like '".$busca."%' and c.idpermissao = c.idpermissao order by c.nome asc;";
}
else {
	$query = "SELECT c.*, a.permissao FROM usuarios c, tbpermissao a where c.idpermissao = a.idpermissao order by c.nome limit 10";
}

$rscli = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($rscli);

if ($row > 0) {
	$data = '<br><div class="table-responsive">
                <table class="table table-responsive-md table-hover mb-0">
                    <tr>
                        <th>Nome</th>
                        <th>RG</th>
                        <th class="text-left">E-mail</th>
                        <th class="text-left">Função</th>
                        <th>Telefone</th>
                        <th class="text-center">Data de Nascimento</th>
                        <th>Ações</th>
                    </tr>
	';
	foreach($rscli as $row) {
		$data .= '
			<tr>
                <td>'.$row["nome"].'</td>
                <td>'.$row["rg"].'</td>
                <td class="text-left">'.$row["email"]. '</td>
                <td class="text-left">' . $row["permissao"] . '</td>
                <td>'.$row["telefone"]. '</td>
                <td class="text-center">'.$row["dt_nascimento"]. '</td>
                <td class="actions-hover actions-fade ">
                    <a class="btn btn-dark text-white" href="cad_usuario_alterar.php?id='.$row['id'].'"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger text-white" href="cad_usuario_excluir.php?id='.$row['id'].'" class="delete-row"><i class="far fa-trash-alt"></i></a>
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