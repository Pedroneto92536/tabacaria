<?php
session_start();
include("Connections/conexao.php");

$query = "select max(idpedido)ultimo from tbpedidos c;";

$result2 = mysqli_query($conexao, $query);
$resultado = mysqli_fetch_array($result2);

$_SESSION['idpedido'] = $resultado['ultimo'];

$idpedido = $_SESSION['idpedido'];

$sql = "SELECT c.*, b.preco from tbproduto b, tbpedidos_item c where b.descricao = c.descricao and c.idpedido = '$idpedido' and b.habilitado='S' order by iditem ";
$result = mysqli_query($conexao, $sql);


?>
<!doctype html>
<html class="left-sidebar-panel" data-style-switcher-options="{'sidebarColor': 'dark'}">

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Nova Venda</title>
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
                                <a href="home.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li><span>Nova Venda</span></li>
                            <li><span>Criar Venda</span></li>
                        </ol>


                    </div>
                </header>

                <!-- start: page -->
                <div class="row">
                    <div class="col-md-12">
                        <section class="card card-danger">
                            <header class="card-header">
                                <h2 class="card-title">Novo Pedido de Venda</h2>
                            </header>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="center">
                                        <?php
                                        if (isset($_SESSION['msg_erro_venda_excluir'])) :
                                            ?>
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <strong>Atenção! <?php echo $_SESSION['msg_erro_venda_excluir'] ?></strong>
                                            </div>
                                        <?php
                                        endif;
                                        unset($_SESSION['msg_erro_venda_excluir']);
                                        ?>
                                    </div>
                                </div>
                                <form method="POST" action="venda_item_insert.php">
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Pedido</label>
                                                <input type="text" name="pedido" value="<?php echo $idpedido; ?>" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Tipo</label>
                                                <input type="text" name="tipo" value="Venda" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Categoria</label>
                                                <select name="categoria" id="categoria" class="form-control">
                                                    <option>Selecione a Categoria</option>
                                                    <?php
                                                    $sql = "SELECT * from tbcategorias order by idcategoria";
                                                    $result3 = mysqli_query($conexao, $sql);
                                                    while ($rows_rscat = mysqli_fetch_assoc($result3)) { ?>
                                                        <option value="<?php echo $rows_rscat['idcategoria'] ?>"><?php echo $rows_rscat['nome'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Produtos</label>
                                                <select name="produtos" id="produtos" class="form-control">

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- fim row-->

                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Referência</label>
                                                <input type="text" name="referencia" id="referencia" class="form-control text-weight-bold" maxlength="8" upper readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Preço</label>
                                                <input type="number" name="preco" id="preco" class="form-control text-weight-bold text-danger" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Qtde</label>
                                                <div data-plugin-spinner data-plugin-options='{ "value":1, "step": 1, "min": 0, "max": 200 }'>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-default spinner-up">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" name="qtde" class="spinner-input form-control" maxlength="3" readonly>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-default spinner-down">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Descrição</label>
                                                <input type="text" name="descricao" id="descricao" class="form-control text-weight-bold" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- fim row -->

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Incluir</label>
                                                <input id="Submit1" class="btn btn-dark btn-block" type="submit" value="Adicionar Produto" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <br />
                                            <div class="table-responsive">
                                                <table class="table table-responsive-md table-hover mb-0">
                                                    <div class="scrollable visible-slider colored-slider" data-plugin-scrollable">
                                                        <div class="scrollable-content">
                                                            <thead>

                                                                <tr>
                                                                    <th>Referência</th>
                                                                    <th>Descrição</th>
                                                                    <th class="text-center">Qtde</th>
                                                                    <th class="text-center">Preço Unit.</th>
                                                                    <th class="text-center">Preço Bruto</th>
                                                                    <th class="text-center">Opção</th>
                                                                </tr>

                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $resultado = 0;
                                                                $qtde = 0;
                                                                ?>
                                                                <?php while ($rows_rsitens = mysqli_fetch_array($result)) {                                                                     
                                                                    $bruto = 0;
                                                                    $bruto = $rows_rsitens['preco'] *  $rows_rsitens['quantidade'];  
                                                                    ?>
                                                                    <tr style="font-size:14px;">
                                                                        <td><?php echo $rows_rsitens['referencia'] ?></td>
                                                                        <td><?php echo $rows_rsitens['descricao'] ?></td>
                                                                        <td class="text-center"><?php echo $rows_rsitens['quantidade'] ?></td>
                                                                        <td class="text-center"><?php echo number_format($rows_rsitens['preco'], 2, ",", ".");?></td>
                                                                        <td class="text-center"><?php echo number_format($bruto, 2, ",", ".");?></td>
                                                                        <td class="actions-hover actions-fade text-center ">
                                                                            <a href="venda_itens_excluir.php?idpedido=<?php echo $rows_rsitens['idpedido'] ?>&iditem=<?php echo $rows_rsitens['iditem'] ?>" class="btn btn-danger text-white"><i class="far fa-trash-alt"></i></a>
                                                                        </td>
                                                                    </tr>


                                                                <?php

                                                                    $qtde = $qtde + $rows_rsitens['quantidade'];

                                                                    $multi = $rows_rsitens['preco'] * $rows_rsitens['quantidade'];

                                                                    $resultado = $resultado + $multi;
                                                                } ?>
                                                                <tr style="font-size:16px;">
                                                                    <td></td>
                                                                    <td class="text-right" style="color:red"><b>Total<b></td>
                                                                    <td class="text-center"><b><?php echo $qtde ?><b></td>
                                                                    <td class="text-center"><b><?php echo number_format($resultado, 2, ",", "."); ?><b></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <br>
                                                <a href="form_pagamento.php?idpedido=<?php echo $idpedido ?>" class="btn btn-danger btn-block">Formas de Pagamento</a><br>
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