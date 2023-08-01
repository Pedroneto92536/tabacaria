<?php
include("Connections/conexao.php");

if (isset($_POST["nome"])) {
	$busca = $_POST["nome"];
	$query = "SELECT c.nome,a.* FROM tbproduto a, tbcategorias c where descricao like '%".$busca."%' and a.idcategoria = c.idcategoria order by a.referencia;";
}elseif (isset($_POST["ref"])) {
	$buscaref = $_POST["ref"];
	$query = "SELECT c.nome,a.* FROM tbproduto a, tbcategorias c where referencia like '".$buscaref."%' and a.idcategoria = c.idcategoria order by a.referencia;";
}else {
	$query = "SELECT c.nome,a.* FROM tbproduto a, tbcategorias c where a.idcategoria = c.idcategoria order by a.referencia;";
}


$rscli = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($rscli);

if ($row > 0) {
	$data = '<br><div class="table-responsive">
                <table class="table table-responsive-md table-hover mb-0">
                    <tr>
                        <th>ID</th>
                        <th>Categoria</th>
                        <th>Referência</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th class="text-center">Habilitado</th>
                        <th>Ações</th>
                    </tr>
	';
	foreach($rscli as $row) {
		$data .= '
            <tr>
                <td>'.$row["id"].'</td>
                <td>'.$row["nome"].'</td>
                <td>'.$row["referencia"].'</td>
                <td>'.$row["descricao"].'</td>
                <td>'.number_format($row["preco"],2, ",", ".").'</td>
                <td class="text-center">'.$row["habilitado"]. '</td>
                <td class="actions-hover actions-fade">
                    <a href="cad_produtos_alterar.php?referencia='.$row["referencia"]. '&idproduto='.$row["id"].'" class="btn btn-dark text-white"><i class="fas fa-pencil-alt"></i></a>
                    <a href="cad_produtos_excluir.php?referencia='.$row["referencia"].'" class="btn btn-danger text-white"><i class="far fa-trash-alt"></i></a>
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