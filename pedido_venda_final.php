<?php
session_start();
include("Connections/conexao.php");

if (isset($_SESSION['idpedido'])) {
    $idpedido = $_SESSION['idpedido'];
} else {
    $idpedido = $_SESSION['idpedido'];
}


$sql = "SELECT a.nome,date_format(b.data_inc, '%d/%m/%Y %H:%i:%s') as data_pedido, date_format(b.data_inc, '%H:%i:%s') as hora, b.* FROM tbclientes a, tbpedidos b where a.reg = b.reg and idpedido = '$idpedido' ";
$rscli = mysqli_query($conexao, $sql);
$row_rscli = mysqli_fetch_array($rscli);

if (isset($_SESSION['idpedido'])) {

    ?>
    <!doctype html>
    <html class="left-sidebar-panel" data-style-switcher-options="{'sidebarColor': 'dark'}">

    <!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

    <head>

        <!-- Basic -->
        <meta charset="UTF-8">
        <title>Sill3nTz Games - Home</title>
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
                                    <a href="index-2.html">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li><span>Menu 1</span></li>
                                <li><span>Sub</span></li>
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="col-md-12">
                        <div class="row"><br />
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="widget-summary">
                                        <div class="widget-summary-col widget-summary-col-icon">
                                            <div class="summary-icon bg-success">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="widget-summary-col">
                                            <div class="summary">
                                                <h4 class="title"><b>Pedido: <?php echo $idpedido ?></b></h4>
                                                <h4 class="title">Cliente: <?php echo $row_rscli['nome'] ?></h4>
                                                <h4 class="title">Data: <?php echo $row_rscli['data_pedido'] ?></h4>
                                                <h4 class="title">Hora: <?php echo $row_rscli['hora'] ?></h4>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-body">
                                    <div class="widget-summary">
                                        <div class="widget-summary-col widget-summary-col-icon">
                                            <div class="summary-icon bg-secondary">
                                                <i class="fab fa-cc-amazon-pay"></i>
                                            </div>
                                        </div>
                                        <div class="widget-summary-col">
                                            <div class="summary">
                                                <h4 class="title"><b>Total da Venda</b></h4>
                                                <div class="info">
                                                    <strong class="amount"><?php echo $row_rscli['valor'] ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form name="form" id="form" method="post" action="pedido_forma_insert.php">
                        <div class="col-md-12"><br />
                            <div class="cold-md-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label text-dark text-weight-bold h5">Dinheiro - R$</label>
                                                <input id="element" name="dinheiro" onkeyup="SubstituiVirgulaPorPonto(this)" type="text" step="0.01" max="<?php echo $row_rscli['valor'] ?>" class="form-control text-weight-bold text-dark col-sm-10" value="0" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label text-dark text-weight-bold h5">Forma de Pagamento - Cartão de Crédito 1</label>
                                                <input id="element" name="cc1" type="text" step="0.01" max="<?php echo $row_rscli['valor'] ?>" class="form-control text-weight-bold text-dark col-sm-10" value="0" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label text-dark text-weight-bold h5">Forma de Pagamento - Cartão de Crédito 2</label>
                                                <input id="element" name="cc2" type="text" step="0.01" max="<?php echo $row_rscli['valor'] ?>" class="form-control text-weight-bold text-dark col-sm-10" value="0" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label text-dark text-weight-bold h5">Forma de Pagamento - Cartão de Débito 1</label>
                                                <input id="element" name="cd1" type="text" step="0.01" max="<?php echo $row_rscli['valor'] ?>" class="form-control text-weight-bold text-dark col-sm-10" value="0" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label text-dark text-weight-bold h5">Forma de Pagamento - Cartão de Débito 2</label>
                                                <input id="element" name="cd2" type="text" step="0.01" max="<?php echo $row_rscli['valor'] ?>" class="form-control text-weight-bold text-dark col-sm-10" value="0" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label text-dark text-weight-bold h5">Forma de Pagamento - Cartão de Débito 3</label>
                                                <input id="element" name="cd3" type="text" step="0.01" max="<?php echo $row_rscli['valor'] ?>" class="form-control text-weight-bold text-dark col-sm-10" value="0" required />
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label text-danger text-weight-bold h5">Diferença / Troco</label>
                                                <input id="diferenca" name="diferenca" type="text" class="form-control text-weight-bold text-danger h5" readonly value="0" max="0" title="Ainda falta valores para realizar o fechamento, por favor conferir as parcelas" />
                                                <label class="control-label text-info text-weight-bold">Quando a diferença é negativa, significa que é o valor do troco quando usado a forma de pagamento em dinheiro!</label>
                                                <label class="control-label text-danger text-weight-bold h5">Total</label>
                                                <input id="valor_total" name="valor_total" type="text" max="otv" class="form-control  text-weight-bold text-danger h5" readonly value="0" />
                                                <label class="control-label text-info text-weight-bold">O Total é a Soma dos Valores das Formas de Pagamentos</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-12"><br />
                                            <input id="enviar_parc" type="submit" value="Continuar p/ Parcelas" class="btn btn-dark btn-block btn-lg" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>
                <?php } else { ?>
                    <div class="col-md-12">
                        <br />
                        <div class="alert alert-danger">
                            <center>
                                <h1>Pedido não localizado, por favor iniciar novamente!</h1>
                            </center>
                        </div>
                    </div>
                <?php } ?>

                <!-- end: page -->
                </section>
            </div>
        </section>

        <!-- Vendor -->
        <script src="vendor/jquery/jquery.js"></script>
        <script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="vendor/jquery-cookie/jquery-cookie.js"></script>
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

        <script type="text/javascript" src="vendor/priceformat/jquery.priceformat.min.js"></script>
        <script>
            $('#element').priceFormat({
                prefix: '',
                allowNegative: true,
                thousandsSeparator: '',
                clearOnEmpty: true
            });
        </script>

        <script type="text/javascript">
            function SubstituiVirgulaPorPonto(campo) {
                campo.value = campo.value.replace(/,/gi, ".");
            }
        </script>
        
            </body>
                   </html>