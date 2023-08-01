<?php
session_start();
include("Connections/conexao.php");

if(isset($_GET['idpedido'])){
    $idpedido = $_GET['idpedido'];
}else{
    $idpedido = $_SESSION['idpedido'];
}

if(isset($_GET['iditem'])){
    $iditem = $_GET['iditem'];
}else{
    $iditem = $_SESSION['iditem'];
}

$sql = "SELECT c.* from tbproduto b, tbpedidos_item c where b.descricao = c.descricao and c.idpedido = '$idpedido' and c.iditem = '$iditem' order by iditem  ";
$result = mysqli_query($conexao, $sql);
$row_rsprod = mysqli_fetch_array($result);


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
    <script src="master/style-switcher/style.switcher.localstorage.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

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
                            <li><span>Editar</span></li>
                            <li><span>Alterar Pedido</span></li>
                        </ol>


                    </div>
                </header>

                <!-- start: page -->
                <div class="row">
                    <div class="col">
                        <section class="card card-primary">
                            <header class="card-header">
                                <h2 class="card-title">Alteração de Produtos / Pedido - <?php echo $idpedido ?></h2>
                            </header>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="center">
                                        <?php
                                        if (isset($_SESSION['msg_erro_prod_alt'])) :
                                            ?>
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <strong>Atenção! <?php echo $_SESSION['msg_erro_prod_alt'] ?></strong>
                                            </div>
                                        <?php
                                        endif;
                                        unset($_SESSION['msg_erro_prod_alt']);
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="center">
                                        <?php
                                        if (isset($_SESSION['status_prod_alt'])) :
                                            ?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <strong><?php echo $_SESSION['status_prod_alt'] ?></strong>
                                            </div>
                                        <?php
                                        endif;
                                        unset($_SESSION['status_prod_alt']);
                                        ?>
                                    </div>
                                </div>
                                <form method="POST" action="pedido_itens_update.php">
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Pedido</label>
                                                <input type="text" name="pedido" value="<?php echo $idpedido; ?>" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Cod Item</label>
                                                <input type="text" name="iditem" value="<?php echo $iditem; ?>" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Referência</label>
                                                <input type="text" name="referencia" value="<?php echo $row_rsprod['referencia'] ?>" class="form-control" maxlength="8" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Descrição</label>
                                                <input type="text" name="descricao" id="descricao" value="<?php echo $row_rsprod['descricao'] ?>" class="form-control text-weight-bold" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Preço</label>
                                                <input type="number" name="preco" id="preco" value="<?php echo $row_rsprod['valor'] ?>" class="form-control text-weight-bold text-danger" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Qtde</label>
                                                <input type="number" name="qtde" class="form-control text-weight-bold text-danger" value="<?php echo $row_rsprod['quantidade'] ?>">
                                            </div>
                                        </div>


                                    </div>


                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Incluir</label>
                                                <input id="Submit1" class="btn btn-danger btn-block" type="submit" value="Alterar Produto" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                            <footer class="card-footer">
                            </footer>
                        </section>
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
        function myFunction() {
            var x = document.getElementById("referencia");
            x.value = x.value.toUpperCase();
        }
    </script>

    <script type='text/javascript'>
        $(document).ready(function() {
            $("input[name='referencia']").blur(function() {
                var $preco = $("input[name='preco']");
                var $descricao = $("input[name='descricao']");
                $.getJSON('function.php', {
                    referencia: $(this).val()
                }, function(json) {
                    $preco.val(json.preco);
                    $descricao.val(json.descricao);
                });
            });
        });
    </script>

<script>
        $('#produtos').change(function() {
            var produtos = $('#produtos').val();
            //alert('Chamei');
            $.ajax({

                type: "GET",
                data: {
                    referencia: produtos,
                },

                url: "pega_prod.php",
                dataType: "json",
                success: function(result) {
                    //var dados = $.parseJSON(result);
                    var referencia = result["referencia"];
                    var preco = result["preco"];
                    var descricao = result["descricao"];

                    $("#referencia").val(referencia);
                    $("#preco").val(preco);
                    $("#descricao").val(descricao);
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#categoria').change(function() {
                $('#produtos').load('pega_prod2.php?idcategoria=' + $('#categoria').val());
            });
        });
    </script>

   
</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

</html>