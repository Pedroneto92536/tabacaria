<?php
session_start();
include("Connections/conexao.php");

if ($_SESSION['logado'] == md5('@wew67434$%#@@947@@#$@@!#54798#11a23@@dsa@!')) {

    $sql = "select * from tbcaixa ";
    $rscaixa = mysqli_query($conexao, $sql);
    $row_caixa = mysqli_fetch_array($rscaixa);

?>
    <!doctype html>
    <html class="left-sidebar-panel" data-style-switcher-options="{'sidebarColor': 'dark'}">

    <!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/ui-elements-cards.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:57:16 GMT -->

    <head>
        
        <!-- Basic -->
        <meta charset="UTF-8">

        <title>Home</title>
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
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
                                    <a href="#">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li><span>Dashboard</span></li>
                            </ol>
                        </div>

                        <h2>Painel Geral</h2>
                    </header>

                    <div class="text-left">
                        <?php if ($row_caixa['status'] == "A") {  ?>
                                <!-- <?php if ($_SESSION['permissao'] == 1  or $_SESSION['permissao'] == 4 or $_SESSION['permissao'] == 3) { ?>
                                <a class="btn btn-dark text-white" href="escolhe_venda.php" style="border:none;"><i class="fas fa-plus"></i> Novo Pedido</a>
                                <a class="btn btn-danger text-white" href="pedidos_finalizados.php" style="border:none;"><i class="fas fa-check-circle"></i> Pedidos Finalizados</a>
                            <?php } ?> -->
                            <?php } else { ?>
                            <div class="alert alert-danger">
                                <strong>
                                    <h2>O Caixa está Fechado <i class="fas fa-lock"></i>. Abra o Caixa para iniciar uma Nova Venda. </h2>
                                </strong><br>
                            </div>
                        <?php } ?>
                    </div>
                    
                    <!-- start: page -->

                    <?php

                    if ($_SESSION['permissao'] == 1 or $_SESSION['permissao'] == 2 or $_SESSION['permissao'] == 4) { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <section class="card card-featured-left card-featured-tertiary mb-3">
                                            <div class="card-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-tertiary">
                                                            <a href="pedidos.php">
                                                                <i class="fas fa-cash-register"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <?php
                                                            $sql = "SELECT ifnull(count(*),0) as total FROM tbpedidos c WHERE c.status = 'A';";
                                                            $rsvendaab = mysqli_query($conexao, $sql);
                                                            $result = mysqli_fetch_array($rsvendaab);
                                                            $rsvendasaberta = $result['total'];

                                                            $sql = "SELECT ifnull(count(*),0) as total FROM tbpedidos c WHERE DAY(c.data_inc) = Day(now());";
                                                            $rsvendahj = mysqli_query($conexao, $sql);
                                                            $result = mysqli_fetch_array($rsvendahj);
                                                            $rsvendashoje = $result['total'];
                                                            ?>
                                                            <h4 class="title">Vendas Abertas</h4>
                                                            <div class="info">
                                                                <strong class="amount"><?php echo $rsvendasaberta ?></strong>
                                                            </div><br>
                                                            <h4 class="title">Vendas de Hoje</h4>
                                                            <div class="info">
                                                                <strong class="amount"><?php echo $rsvendashoje ?></strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <section class="card card-featured-left card-featured-quaternary">
                                            <div class="card-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-quaternary">
                                                        <a href="consulta_cliente.php">
                                                            <i class="fas fa-user"></i>
                                                        </a>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <?php
                                                            $sql = "SELECT ifnull(count(*),0) as total FROM tbclientes a WHERE MONTH(a.data_cadastro) = Month(now());";
                                                            $rsclimes = mysqli_query($conexao, $sql);
                                                            $result = mysqli_fetch_array($rsclimes);
                                                            $rstotclimes = $result['total'];
                                                            ?>
                                                            <h4 class="title">Cadastros no Mês</h4>
                                                            
                                                            <div class="info">
                                                                <strong class="amount"><?php echo $rstotclimes ?></strong>
                                                            </div><br>

                                                            <?php
                                                            $sql = "SELECT ifnull(count(*),0) as total FROM tbclientes ";
                                                            $rsclitot = mysqli_query($conexao, $sql);
                                                            $result = mysqli_fetch_array($rsclitot);
                                                            $rstotcli = $result['total'];
                                                            ?>
                                                            <h4 class="title">Total Clientes Cadastrados</h4>
                                                            <div class="info">
                                                                <strong class="amount"><?php echo $rstotcli ?></strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-xl-6">
                                        <section class="card card-featured-left card-featured-danger mb-3">
                                            <div class="card-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-danger">
                                                            <i class="fas fa-life-ring"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <?php
                                                            $sql = " SELECT ifnull(sum(c.valor+c.troco),0) as total from tbpedido_pagamento c WHERE MONTH(c.data_pagamento) = MONTH(now()) and c.status = 'F';";
                                                            $rstotal = mysqli_query($conexao, $sql);
                                                            $result = mysqli_fetch_array($rstotal);
                                                            $totalgeral = $result['total'];

                                                            $sql2 = " SELECT ifnull(count(*),0) as vendames FROM tbpedidos c WHERE MONTH(c.data_finaliza) = MONTH(now()) and c.status = 'F';";
                                                            $rsvendames = mysqli_query($conexao, $sql2);
                                                            $result2 = mysqli_fetch_array($rsvendames);
                                                            $totalmes = $result2['vendames'];
                                                            ?>
                                                            <h4 class="title">Total Vendido no Mês</h4>
                                                            <div class="info">
                                                                <strong class="amount">R$ <?php echo $totalgeral ?></strong>
                                                            </div><br>
                                                            <h4 class="title">Vendas no Mês</h4>
                                                            <div class="info">
                                                                <strong class="amount"><?php echo $totalmes ?></strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </section>
                                    </div>
                                    <div class="col-xl-6">
                                        <section class="card card-featured-left card-featured-success">
                                            <div class="card-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-success">
                                                            <i class="fas fa-dollar-sign"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <?php
                                                            $sql = " SELECT ifnull(sum(c.valor),0) as total, ifnull(sum(c.troco),0) as troco from tbpedido_pagamento c WHERE DAY(c.data_pagamento) = DAY(now()) and c.status = 'F';";
                                                            $rstotal = mysqli_query($conexao, $sql);
                                                            $result = mysqli_fetch_array($rstotal);
                                                            $totalvendas = $result['total'];
                                                            $totaltroco = $result['troco'];
                                                            ?>
                                                            <h4 class="title">Total Recebido no Dia</h4>
                                                            <div class="info">
                                                                <strong class="amount">R$ <?php echo $totalvendas ?></strong>
                                                            </div><br>
                                                            <h4 class="title">Saídas / Troco no Dia</h4>
                                                            <div class="info">
                                                                <strong class="amount">R$ <?php echo $totaltroco ?></strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </section>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php } ?>
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
    <script src="js/examples/examples.datatables.editable.js"></script>

    </body>
    <!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/ui-elements-cards.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:57:17 GMT -->

    </html>
<?php
} else {
    header("Location: index.php");
}


?>