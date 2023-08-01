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

                    <!-- start: page -->
                    <div class="row">
                        <div class="col-xl-12 order-1 mb-4">
                            <section class="card">
                                <div class="text-left">
                                    <?php if ($row_caixa['status'] == "A") {  ?>
                                        <?php if ($_SESSION['permissao'] == 1  or $_SESSION['permissao'] == 4 or $_SESSION['permissao'] == 3) { ?>
                                            <a class="btn btn-dark text-white" href="escolhe_venda.php" style="border:none;"><i class="fas fa-plus"></i> Novo Pedido</a>
                                            <a class="btn btn-danger text-white" href="pedidos_finalizados.php" style="border:none;"><i class="fas fa-check-circle"></i> Pedidos Finalizados</a>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <div class="alert alert-danger">
                                            <strong>
                                                <h2>O Caixa está Fechado <i class="fas fa-lock"></i>. Abra o Caixa para iniciar uma Nova Venda. </h2>
                                            </strong><br>
                                        </div>
                                    <?php } ?>
                                </div>
                                <header class="card-header card-header-transparent">
                                    <h2 class="card-title">Últimos Pedidos</h2>
                                </header>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="center">
                                            <?php
                                            if (isset($_SESSION['status_pedido'])) :
                                            ?>
                                                <div class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong>Sucesso! <?php echo $_SESSION['status_pedido'] ?> </strong><br>
                                                </div>
                                            <?php
                                            endif;
                                            unset($_SESSION['status_pedido']);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="center">
                                            <?php
                                            if (isset($_SESSION['msg_erro_pedido'])) :
                                            ?>
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong>Atenção! <?php echo $_SESSION['msg_erro_pedido'] ?></strong>
                                                </div>
                                            <?php
                                            endif;
                                            unset($_SESSION['msg_erro_pedido']);
                                            ?>
                                        </div>
                                    </div>
                                    <table class="table table-responsive-md table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-left d-none d-sm-table-cell">Pedido</th>
                                                <th>Comanda</th>
                                                <th>Nome</th>
                                                <th>Status</th>
                                                <th class="d-none d-sm-table-cell">Título</th>
                                                <th>Hora</th>
                                                <th>Valor</th>
                                                <th class="">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT a.*, c.nome,date_format(data_inc, '%H:%i') AS hora FROM tbpedidos a,tbclientes c where c.reg = a.reg and a.status = 'A' order by a.idpedido desc; ";
                                            $result = mysqli_query($conexao, $sql);
                                            ?>

                                            <?php while ($rows_rspedidos = mysqli_fetch_array($result)) { ?>
                                                <tr style="font-size:14px;">
                                                    <td class="d-none d-sm-table-cell"><?php echo $rows_rspedidos['idpedido']; ?></td>
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
                                            
                                                    <td class="d-none d-sm-table-cell"><?php echo $rows_rspedidos['titulo'] ?></td>
                                                    <td><?php echo $rows_rspedidos['hora'] ?></td>
                                                    <td>R$ <?php echo number_format($rows_rspedidos['valor'], 2, ",", "."); ?></td>
                                                    <td class="actions-hover actions-fade btn-group ">
                                                        <a class="btn btn-default text-center" title="Adicionar Produtos" href="pedido_itens_adiciona.php?idpedido=<?php echo $rows_rspedidos['idpedido'] ?>"><i class="fas fa-plus"></i></a>
                                                        <a class="btn btn-dark text-white text-center" title="Verificar Pedido" href="pedido_itens.php?idpedido=<?php echo $rows_rspedidos['idpedido'] ?>"><i class="fas fa-pencil-alt"></i></a>
                                                        <?php if ($rows_rspedidos['valor'] > 0 ) {
                                                            

                                                        }else{  ?>
                                                             
                                                        <a class="btn btn-danger text-white text-center" title="Excluir Pedido" href="pedido_excluir.php?idpedido=<?php echo $rows_rspedidos['idpedido'] ?>&idcomanda=<?php echo $rows_rspedidos['comanda'] ?>"><i class="far fa-trash-alt"></i></a>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            <?php  }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>

                    <?php

                    if ($_SESSION['permissao'] == 1 or $_SESSION['permissao'] == 2 or $_SESSION['permissao'] == 4) { ?>
                        <div class="row">
                            <div class="col-md-12">
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
                                <div class="row">
                                    <div class="col-xl-6">
                                        <section class="card card-featured-left card-featured-tertiary mb-3">
                                            <div class="card-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-tertiary">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <?php
                                                            $sql = "SELECT ifnull(count(*),0) as total FROM tbpedidos c WHERE DAY(c.data_finaliza) = Day(now()) and c.status = 'F';";
                                                            $rsvendahj = mysqli_query($conexao, $sql);
                                                            $result = mysqli_fetch_array($rsvendahj);
                                                            $rsvendashoje = $result['total'];
                                                            ?>
                                                            <h4 class="title">Vendas de Hoje</h4>
                                                            <div class="info">
                                                                <strong class="amount"><?php echo $rsvendashoje ?></strong>
                                                            </div>
                                                        </div><br><br>
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
                                                            <i class="fas fa-user"></i>
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