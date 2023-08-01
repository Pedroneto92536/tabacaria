<?php
session_start();
include("Connections/conexao.php");

if (isset($_GET['idpedido'])) {
    $idpedido = $_GET['idpedido'];
} else {
    $idpedido = $_SESSION['idpedido'];
}


$sql = "SELECT a.nome,b.* FROM tbclientes a, tbpedidos b where a.reg = b.reg and idpedido = '$idpedido' ";
$rscli = mysqli_query($conexao, $sql);
$row_rscli = mysqli_fetch_array($rscli);

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
<style>
    .oculto {
        display: none;
    }
</style>

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
                            <li><span>Pedido</span></li>
                            <li><span>Forma de Pagamento</span></li>
                        </ol>


                    </div>
                </header>

                <!-- start: page -->
                <div class="row">
                    <div class="col-xl-12 order-1 mb-4">
                        <section class="card card-danger">
                            <header class="card-header">
                                <h2 class="card-title">Formas de Pagamento</h2>
                            </header>
                            <div class="card-body" style="font-size:14px">
                                <form name="forma" method="post" action="formas_insert.php">
                                    <div class="col-md-12">
                                        <section class="card card-tertiary">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Pedido</label>
                                                            <input type="text" name="pedido" class="form-control text-weight-bold text-dark" readonly value="<?php echo $idpedido ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="form-group">
                                                            <label class="control-label">REG</label>
                                                            <input type="text" name="reg" class="form-control text-weight-bold text-dark" readonly value="<?php echo $row_rscli['reg'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Valor Consumido</label>
                                                            <input type="text" name="preco" class="form-control text-weight-bold text-danger text-right" readonly value="R$ <?php echo number_format($row_rscli['valor'], 2, ",", ".") ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Tipo</label>
                                                            <input type="url" name="tipo" class="form-control text-weight-bold text-dark text-right" readonly value="<?php echo  strtoupper($row_rscli['titulo']) ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <label class="control-label">Cliente</label>
                                                            <input type="text" name="nome" class="form-control text-weight-bold text-dark" readonly value="<?php echo $row_rscli['nome'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <?php if ($row_rscli['status'] == "A") { ?>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Formas</label>
                                                                <select id="forma" name="forma" onchange="mudaTipo()" class="form-control">
                                                                    <option value="">------------------------</option>
                                                                    <?php
                                                                    $sql = "SELECT * from tbformas_pagamento";
                                                                    $rsforma = mysqli_query($conexao, $sql);
                                                                    while ($rows_rsforma = mysqli_fetch_assoc($rsforma)) { ?>
                                                                        <option value="<?php echo $rows_rsforma['idforma_pagamento'] ?>"><?php echo $rows_rsforma['forma_descricao'] ?></option>
                                                                    <?php } ?>
                                                                </select><br>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Valor Pago</label>
                                                                            <input type="text" name="valor" id="valor" inputmode="numeric" onkeyup="valorreais(this);" min="0" max="<?php echo $row_rscli['valor'] ?>" class="form-control text-weight-bold text-danger col-sm-12" value="0"><br>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6" id="valorRecebido">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Valor Recebido R$</label>
                                                                            <input type="text" name="valorrecebido" inputmode="numeric" id="valorrecebido" onkeyup="valorreais(this);" min="0" class="form-control text-weight-bold text-dark col-sm-12" value="0">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <input id="Submit1" type="submit" value="Adicionar Forma de Pagamento" class="btn btn-dark btn-block  text-white" />
                                                                <br>
                                                                <div class="col-lg-12">
                                                                    <div class="center">
                                                                        <?php
                                                                        if (isset($_SESSION['status_forma'])) :
                                                                        ?>
                                                                            <div class="alert alert-success">
                                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                                                <strong><?php echo $_SESSION['status_forma'] ?> </strong><br>
                                                                            </div>
                                                                        <?php
                                                                        endif;
                                                                        unset($_SESSION['status_forma']);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            <?php } else {
                                                        } ?>
                                                            <div class="col-lg-12">
                                                                <div class="center">
                                                                    <?php
                                                                    if (isset($_SESSION['msg_erro_forma'])) :
                                                                    ?>
                                                                        <div class="alert alert-danger">
                                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> ×</button>
                                                                            <strong><?php echo $_SESSION['msg_erro_forma'] ?></strong>
                                                                        </div>
                                                                    <?php
                                                                    endif;
                                                                    unset($_SESSION['msg_erro_forma']);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group"><br>
                                                                <table class="table table-responsive-md table-hover mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Sigla</th>
                                                                            <th>Forma Pagamento</th>
                                                                            <th>Valor</th>
                                                                            <th>Troco</th>
                                                                            <?php if ($row_rscli['status'] == "F") {
                                                                            } else { ?>
                                                                                <th class="text-center">Ações</th>
                                                                            <?php  } ?>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                        <?php
                                                                        $total = 0;
                                                                        $sql = "SELECT * FROM tbpedido_pagamento c,tbformas_pagamento b where c.idpedido = '$idpedido' and c.forma = b.idforma_pagamento; ";
                                                                        $rsforma = mysqli_query($conexao, $sql); ?>
                                                                        <?php while ($rows_rsforma = mysqli_fetch_array($rsforma)) { ?>
                                                                            <tr style="font-size:14px;">
                                                                                <td><?php echo $rows_rsforma['idforma_pagamento'] ?></td>
                                                                                <td><?php echo $rows_rsforma['forma_descricao'] ?></td>
                                                                                <td>R$ <?php echo number_format($rows_rsforma['valor'], 2, ",", ".") ?></td>
                                                                                <?php if ($rows_rsforma['troco'] < 0) { ?>
                                                                                    <td>R$ <?php echo number_format($rows_rsforma['troco'], 2, ",", ".") ?></td>
                                                                                <?php } else { ?>
                                                                                    <td></td>
                                                                                <?php } ?>
                                                                                <?php if ($row_rscli['status'] == "F") {
                                                                                } else { ?>
                                                                                    <td class="actions-hover actions-fade text-center">
                                                                                        <a href="form_pagamento_excluir.php?idpedido=<?php echo $rows_rsforma['idpedido'] ?>&idforma=<?php echo $rows_rsforma['idforma'] ?>" class="delete-row"><i class="far fa-trash-alt"></i></a>
                                                                                    </td>
                                                                                <?php  } ?>
                                                                            </tr>
                                                                        <?php  } ?>

                                                                        <?php
                                                                        // SELECT QUE PEGA RESULTADO COMO VARIAVEL //
                                                                        $sql = "select sum(valor) as total from tbpedido_pagamento where idpedido = '$idpedido' ";
                                                                        $rstotformas = mysqli_query($conexao, $sql);
                                                                        $result = mysqli_fetch_array($rstotformas);
                                                                        $totalformas = $result['total'];


                                                                        $total = $totalformas;

                                                                        $diferenca = $row_rscli['valor'] - $total;

                                                                        ?>

                                                                    </tbody>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td class="text-right" style="font-size:14px;"><b>Total<b></td>
                                                                        <td class="text-left" style="font-size:14px;"><b>R$ <?php echo number_format($total, 2, ",", ".") ?><b></td>
                                                                        <td></td>
                                                                        <?php if ($row_rscli['status'] == "F") {
                                                                        } else { ?>
                                                                            <td></td>
                                                                        <?php  } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php if ($row_rscli['status'] == "F") {
                                                                        } else { ?>
                                                                            <td></td>

                                                                            <td class="text-right" style="font-size:14px;color:red"><b>Faltam<b></td>
                                                                            <td class="text-left" style="font-size:14px;"><b>R$ <?php echo  number_format($diferenca, 2, ",", ".") ?><b></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        <?php  } ?>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <br>
                                            <?php
                                            if (($total == $row_rscli['valor']) and ($row_rscli['status'] == "A")) { ?>

                                                <?php if ($row_rscli['tipo'] == "V") { ?>
                                                    <div class="card-footer">
                                                        <br>
                                                        <a href="venda_finaliza.php?idpedido=<?php echo $row_rscli['idpedido'] ?>" class="btn btn-success btn-block text-weight-bold text-white" style="border:none;">Encerrar Venda <i class="fas fa-check-circle"></i></a>
                                                        <br>
                                                    </div>
                                                <?php   } else { ?>
                                                    <div class="card-footer">
                                                        <br>
                                                        <a href="comanda_finaliza.php?idpedido=<?php echo $row_rscli['idpedido'] ?>" class="btn btn-success btn-block text-weight-bold text-white" style="border:none;">Encerrar Comanda <i class="fas fa-check-circle"></i></a>
                                                        <br>
                                                    </div>
                                                <?php } ?>

                                            <?php } else {
                                            } ?>

                                        </section>
                                    </div>
                                </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>
    <!-- Analytics to Track Preview Website -->

    <script src="js/examples/examples.advanced.form.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type="text"]').each(function() {
                var val = $(this).val().replace(',', '.');
                $(this).val(val);
            });
        });
    </script>

    <script type="text/javascript">
        function SubstituiVirgulaPorPonto(campo) {
            campo.value = campo.value.replace(/,/gi, ".");
        }
    </script>

    <script type="text/javascript">
        function valorreais(i) {
            var v = i.value.replace(/\D/g, '');
            v = (v / 100).toFixed(2) + '';
            v = v.replace(".", ",");
            i.value = v;
        }

        mudaTipo();
        function mudaTipo() {
            var exibe = document.getElementById('forma').value;
            if (exibe == 'R$') {
                document.getElementById('valorRecebido').classList.remove('oculto');
            } else {
                // document.getElementById('user-pass').classList.remove('oculto');
                document.getElementById('valorRecebido').classList.add('oculto');
            }
        }
    </script>

    <script type="text/javascript" src="vendor/priceformat/jquery.priceformat.min.js"></script>

</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

</html>