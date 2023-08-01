<?php
session_start();
include("Connections/conexao.php");

$idcategoria = $_GET['idcategoria'];

$sql = "SELECT * from tbproduto where idcategoria = '$idcategoria' and habilitado = 'S' ";
$result = mysqli_query($conexao, $sql);

?>
    <option value="">Selecione o produto</option> 

<?php while ($rows_rsprodutos = mysqli_fetch_array($result)) { ?>
    
    <option value="<?php echo $rows_rsprodutos['referencia'] ?>"><?php echo $rows_rsprodutos['descricao'] ?></option>
<?php } ?>