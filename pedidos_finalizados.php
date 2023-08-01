<?php
session_start();
include("Connections/conexao.php");

$quantidade = 10;
$pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;
$inicio = ($quantidade * $pagina) - $quantidade;

$sql = "SELECT a.*, c.nome,date_format(data_inc, '%H:%i') AS hora, date_format(data_inc, '%d/%m/%Y') AS data  FROM tbpedidos a,tbclientes c where c.reg = a.reg and a.status = 'F' order by a.idpedido desc LIMIT $inicio, $quantidade;";
$result = mysqli_query($conexao, $sql);
//--------------------------------------------------------------------
$sqlTotal    = " SELECT idpedido FROM tbpedidos c, tbclientes d where c.reg = d.reg and c.status = 'F';";
$qrTotal     = mysqli_query($conexao, $sqlTotal);
$numTotal    = mysqli_num_rows($qrTotal);
$totalPagina = ceil($numTotal / $quantidade);


?>
<!doctype html>
<html class="left-sidebar-panel" data-style-switcher-options="{'sidebarColor': 'dark'}">

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/ui-elements-cards.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:57:16 GMT -->

<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Pedidos Finalizados</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="vendor/animate/animate.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css" />
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="master/style-switcher/style.switcher.localstorage.js"></script>
</head>

<body>
    <section class="body">

        <?php include('header.php'); ?>

        <div class="inner-wrapper">

            <?php include('menu.php'); ?>

            <section role="main" class="content-body">
                <header class="page-header page-header-left-breadcrumb">
                    <div class="right-wrapper">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="home.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li><span>Dashboard</span></li>
                        </ol>

                    </div>

                    <h2>Pedidos Finalizados</h2>
                </header>

                <!-- start: page -->
                <div class="row">
                    <div class="col-xl-12 order-1 mb-4">
                        <section class="card">
                            <header class="card-header card-header-transparent">
                                <h2 class="card-title">Últimos Pedidos</h2>
                            </header>
                            <div class="card-body">
                                <table class="table table-responsive-md table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Pedido</th>
                                            <th>Comanda</th>
                                            <th>Nome</th>
                                            <th>Status</th>
                                            <th>Título</th>
                                            <th>Data</th>
                                            <th>Hora</th>
                                            <th>Valor</th>
                                            <th class="text-center">Ações?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($rows_rspedidos = mysqli_fetch_array($result)) { ?>
                                            <tr style="font-size:14px;">
                                                <td><?php echo $rows_rspedidos['idpedido']; ?></td>
                                                <td><?php echo $rows_rspedidos['comanda'] ?></td>
                                                <td><?php echo $rows_rspedidos['nome'] ?></td>
                                                <td>
                                                    <?php if ($rows_rspedidos['status'] == 'A') { ?>
                                                        <span class="badge badge-info">Aberto</span>
                                                    <?php } ?>
                                                    <?php if ($rows_rspedidos['status'] == 'F') { ?>
                                                        <span class="badge badge-success">Finalizado</span>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $rows_rspedidos['titulo'] ?></td>
                                                <td><?php echo $rows_rspedidos['data'] ?></td>
                                                <td><?php echo $rows_rspedidos['hora'] ?></td>
                                                <td>R$ <?php echo number_format($rows_rspedidos['valor'], 2, ",", "."); ?></td>
                                                <td class="actions-hover actions-fade text-center">
                                                    <a class="btn btn-dark text-white" title="Informações" href="pedido_itens.php?idpedido=<?php echo $rows_rspedidos['idpedido'] ?>"><i class="fas fa-file-alt"></i></a>
                                                    <a class="btn btn-danger text-white text-center" title="Cancelar" href="pedido_cancelar.php?idpedido=<?php echo $rows_rspedidos['idpedido'] ?>"><i class="fas fa-times-circle"></i></a>
                                                </td>
                                            </tr>
                                        <?php  }
                                        ?>
                                    </tbody>
                                </table>
                                <br>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item">
                                            <a class="page-link" href="?pagina=1">Primeira</a>
                                        </li>
                                        <?php
                                        for ($i = 1; $i <= $totalPagina; $i++) { ?>
                                            <li class="page-item"><a class="page-link" href="?pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
                                        <?php } ?>
                                        <a class="page-link" href="?pagina=<?php echo $totalPagina ?>">Última</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </section>
                    </div>
                </div>


                <!-- end: page -->
            </section>
        </div>


    </section>
</body>
<!-- Vendor -->
<script src="vendor/jquery/jquery.js"></script>
<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="vendor/jquery-cookie/jquery-cookie.js"></script>
<script src="master/style-switcher/style.switcher.js"></script>
<script src="vendor/popper/umd/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.js"></script>
<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="vendor/common/common.js"></script>
<script src="vendor/nanoscroller/nanoscroller.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="vendor/select2/js/select2.js"></script>
<script src="vendor/pnotify/pnotify.custom.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>
<!-- Analytics to Track Preview Website -->

<script src="js/examples/examples.modals.js"></script>

</body>
<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/ui-elements-cards.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:57:17 GMT -->

</html>