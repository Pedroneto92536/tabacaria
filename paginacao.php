<?php 
$quantidade = 5;
$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
$inicio = ($quantidade * $pagina) - $quantidade;

$sql = "SELECT *,date_format(data_cadastro, '%d/%m/%Y') AS data_cadastro FROM tbclientes order by nome asc LIMIT $inicio, $quantidade;";
$result = mysqli_query($conexao, $sql);
//--------------------------------------------------------------------
$sqlTotal    = " SELECT reg FROM tbclientes";
$qrTotal     = mysqli_query($conexao,$sqlTotal);
$numTotal    = mysqli_num_rows($qrTotal);
$totalPagina = ceil($numTotal/$quantidade);


?>




<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        <li class="page-item">
        <a class="page-link" href="?pagina=1" >Primeira</a>
        </li>
        <?php
        for($i = 1; $i <= $totalPagina; $i++) { ?>
            <li class="page-item"><a class="page-link" href="?pagina=<?php echo $i ?>"><?php echo $i ?></a></li>                                            
        <?php } ?>
        <a class="page-link" href="?pagina=<?php echo $totalPagina ?>">Última</a>
        </li>
    </ul>
</nav>