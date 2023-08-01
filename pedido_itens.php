<?php
session_start();
include("Connections/conexao.php");

if (isset($_GET['idpedido'])) {
    $idpedido = $_GET['idpedido'];
} else {
    $idpedido = $_SESSION['idpedido'];
}


$sql = "SELECT c.* from tbproduto b, tbpedidos_item c where b.descricao = c.descricao AND idpedido = '$idpedido';";
$result = mysqli_query($conexao, $sql);

$sql2 = "SELECT * from tbpedidos where idpedido = '$idpedido';";
$result2 = mysqli_query($conexao, $sql2);
$row_status = mysqli_fetch_array($result2);

?>
<!doctype html>
<html class="left-sidebar-panel" data-style-switcher-options="{'sidebarColor': 'dark'}">

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Informações da Comanda</title>
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

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
    <link rel="stylesheet" href="vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="vendor/dropzone/basic.css" />
    <link rel="stylesheet" href="vendor/dropzone/dropzone.css" />
    <link rel="stylesheet" href="vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
    <link rel="stylesheet" href="vendor/summernote/summernote-bs4.css" />
    <link rel="stylesheet" href="vendor/codemirror/lib/codemirror.css" />
    <link rel="stylesheet" href="vendor/codemirror/theme/monokai.css" />

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

        <!-- start: header -->
        <?php include('header.php'); ?>

        <div class="inner-wrapper">
            <!-- start: sidebar -->

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
                            <li><span>Comanda de Pedidos</span></li>
                            <li><span>Itens</span></li>
                        </ol>


                    </div>
                </header>

                <!-- start: page -->
                <div class="row">
                    <div class="col-xl-12 order-1 mb-4">
                        <section class="card card-danger">
                            <header class="card-header">
                                <h2 class="card-title">Comanda - <?php echo $row_status['comanda'] ?></h2>
                            </header>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="center">
                                        <?php
                                        if (isset($_SESSION['status_pedido_itens_excluido'])) :
                                        ?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <strong>Sucesso! <?php echo $_SESSION['status_pedido_itens_excluido'] ?> </strong><br>
                                            </div>
                                        <?php
                                        endif;
                                        unset($_SESSION['status_pedido_itens_excluido']);
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="center">
                                        <?php
                                        if (isset($_SESSION['msg_erro_pedido_itens_excluir'])) :
                                        ?>
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <strong>Atenção! <?php echo $_SESSION['msg_erro_pedido_itens_excluir'] ?></strong>
                                            </div>
                                        <?php
                                        endif;
                                        unset($_SESSION['msg_erro_pedido_itens_excluir']);
                                        ?>
                                    </div>
                                </div>
                                <form method="POST" id="form-pesquisa" action="">
                                    <table class="table table-responsive-md table-hover mb-0">
                                        <thead>
                                            <tr style="font-size:14px;">
                                                <th>Produto</th>
                                                <th>Quantidade</th>
                                                <th>Valor</th>
                                                <?php if ($row_status['status'] == "F" ) { } else {?>
                                                <th>Ações</th>
                                                <?php } ?>
                                            </tr>

                                        </thead>

                                        <tbody>
                                            <?php
                                            $resultado = 0;
                                            $qtde = 0;
                                            ?>
                                            <?php while ($rows_rsitens = mysqli_fetch_array($result)) { ?>
                                                <tr style="font-size:14px;">
                                                    <td><?php echo $rows_rsitens['descricao'] ?></td>
                                                    <td><?php echo $rows_rsitens['quantidade'] ?></td>
                                                    <td><?php echo number_format($rows_rsitens['valor'],2,",", ".") ?></td>
                                                    <?php if ($row_status['status'] == "F" ) { } else {?>
                                                    <td class="actions-hover actions-fade">
                                                        <a href="pedido_itens_excluir.php?idpedido=<?php echo $idpedido ?>&iditem=<?php echo $rows_rsitens['iditem'] ?>" class="btn btn-danger text-white"><i class="far fa-trash-alt"></i></a>
                                                    </td>
                                                    <?php } ?>
                                                </tr>


                                            <?php

                                                $qtde = $qtde + $rows_rsitens['quantidade'];

                                                $multi = $rows_rsitens['valor'] * $rows_rsitens['quantidade'];

                                                $resultado = $resultado + $multi;
                                            } ?>


                                            <tr style="font-size:16px;">
                                                <td class="text-center" style="color:red"><b>Total<b></td>
                                                <td><b><?php echo $qtde ?><b></td>
                                                <td><b><?php echo number_format($resultado,2,",", ".") ?><b></td>
                                                <?php if ($row_status['status'] == "F" ) { } else {?>
                                                <td></td>
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <?php if ($resultado == 0) {
                                } else { 
                                    
                                    if ($_SESSION['permissao'] == 1  or $_SESSION['permissao'] == 4 or $_SESSION['permissao'] == 2) { ?>

                                    <div class="col-sm-12">
                                        <div class="form-group text-right">
                                            <br>
                                            <a href="form_pagamento.php?idpedido=<?php echo $idpedido ?>" class=" btn btn-dark"><i class="fas fa-hand-holding-usd"></i> Formas de Pagamento</a><br>
                                        </div>
                                    </div>
                                <?php } } ?>

                            </div>
                        </section>


                    </div>
                </div>



                <!-- end: page -->
            </section>
        </div>


    </section>

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
    <script src="vendor/jquery-ui/jquery-ui.js"></script>
    <script src="vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
    <script src="vendor/select2/js/select2.js"></script>
    <script src="vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
    <script src="vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
    <script src="vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.js"></script>
    <script src="vendor/fuelux/js/spinner.js"></script>
    <script src="vendor/dropzone/dropzone.js"></script>
    <script src="vendor/bootstrap-markdown/js/markdown.js"></script>
    <script src="vendor/bootstrap-markdown/js/to-markdown.js"></script>
    <script src="vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
    <script src="vendor/codemirror/lib/codemirror.js"></script>
    <script src="vendor/codemirror/addon/selection/active-line.js"></script>
    <script src="vendor/codemirror/addon/edit/matchbrackets.js"></script>
    <script src="vendor/codemirror/mode/javascript/javascript.js"></script>
    <script src="vendor/codemirror/mode/xml/xml.js"></script>
    <script src="vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script src="vendor/codemirror/mode/css/css.js"></script>
    <script src="vendor/summernote/summernote-bs4.js"></script>
    <script src="vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
    <script src="vendor/ios7-switch/ios7-switch.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>
    <!-- Analytics to Track Preview Website -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-42715764-8', 'auto');
        ga('send', 'pageview');
    </script>
</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

</html>