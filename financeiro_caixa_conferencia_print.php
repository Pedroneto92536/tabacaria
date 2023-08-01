<?php
session_start();
include("Connections/conexao.php");

$banco = $_GET['banco'];
$descricao = $_GET['descricao'];
$dataescolhi = $_GET['data'];
$data = $_GET['data'];

$data = implode("-", array_reverse(explode("/", $data)));

$sql2 = "select date_format(c.hora_abertura, '%H:%i') as hora,c.* from tbcaixa c where c.banco='$banco' ";
$rscaixa = mysqli_query($conexao, $sql2);
$row_caixa = mysqli_fetch_array($rscaixa);

$sqlmov = "SELECT b.nome,
       b.reg,
       c.idpedido,
       c.forma,
       a.valor as valor_total,
       c.valor,
       c.troco,
       a.status,
       a.titulo,
       date_format(c.data_pagamento, '%d/%m/%Y %H:%i:%s') as data,
       date_format(c.data_pagamento, '%H:%i') as hora
  FROM tbpedido_pagamento c, tbpedidos a, tbclientes b
 WHERE a.idpedido = c.idpedido
   and a.status = 'F'
   and a.reg = b.reg
   and DATE(c.data_pagamento) = '$data'
 order by hora; ";

$rsmov = mysqli_query($conexao, $sqlmov);

$sqlsaldo = "SELECT sum(c.valor+c.troco) as saldo FROM tbpedido_pagamento c where c.status='F'";
$rssaldo = mysqli_query($conexao, $sqlsaldo);
$row_saldo = mysqli_fetch_array($rssaldo);

$sqltroco = "SELECT sum(c.troco) as troco FROM tbpedido_pagamento c where c.status='F' and DATE(c.data_pagamento) ='$data'; ";
$rstroco = mysqli_query($conexao, $sqltroco);
$row_troco = mysqli_fetch_array($rstroco);

$sqlrecebido = "SELECT sum(c.valor) as recebido FROM tbpedido_pagamento c where c.status='F' and DATE(c.data_pagamento) ='$data'; ";
$rsrecebido = mysqli_query($conexao, $sqlrecebido);
$row_recebido = mysqli_fetch_array($rsrecebido);

$sqltotaldia = "SELECT sum(c.valor+c.troco) as total FROM tbpedido_pagamento c where c.status='F' and DATE(c.data_pagamento) ='$data'; ";
$rstot = mysqli_query($conexao, $sqltotaldia);
$row_totaldia = mysqli_fetch_array($rstot);

?>
<!doctype html>
<html class="left-sidebar-panel" data-style-switcher-options="{'sidebarColor': 'dark'}">

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Financeiro Conferência Caixa Impressão</title>
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

            <section role="main" class="content-body">

                <!-- start: page -->
                <div class="col-md-12">
                    <section class="card">
                        <div class="card-body">
                            <div class="invoice">
                                <header class="clearfix">
                                    <div class="row">
                                        <div class="col-sm-6 mt-3">
                                            <h2 class="h2 mt-0 mb-1 text-dark font-weight-bold">CONFERÊNCIA CAIXA</h2>
                                            <h4 class="h3 m-0 text-dark font-weight-bold"><?php echo $banco ?> - <?php echo $descricao ?></h4>
                                        </div>
                                        <div class="col-sm-6 text-right mt-3 mb-3">
                                            <h2 class="h2 mt-0 mb-1 text-dark font-weight-bold"><?php echo $dataescolhi ?></h2>
                                            <div class="ib">
                                                <?php echo $_SESSION['email']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </header>
                                <!-- Verificar se o Caixa está aberto ou se possui algum movimento -->
                                <?php if (empty($rsmov) or $row_caixa['status'] == "F") { ?>
                                    <div class="bill-info">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="bill-to">
                                                    <div class="text-center mr-12 ">
                                                        <p class="h2 mb-12 text-danger font-weight-semibold">O Caixa não foi aberto nesta data.</p>
                                                    </div>
                                                </div>
                                                <div class="bill-to">
                                                    <div class="text-center mr-12">
                                                        <p class="h4 mb-12 text-dark font-weight-semibold">ou Não há movimento de Caixa.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="bill-to text-right">
                                                    <p class="mb-0">
                                                        <p class="h4 mb-12 text-dark font-weight-semibold"><b>Saldo Atual: <?php echo $row_caixa['saldo_inicial'] ?><b></p>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="bill-to">
                                                <div class="text-left mr-1">
                                                    <a href="caixa_conferencia_data.php?banco=<?php echo $banco ?>" class="btn btn-dark ml-3"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php  } else { ?>
                                    <div class="bill-info">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="bill-to">
                                                    <!-- <p class="h5 mb-1 text-dark font-weight-semibold">Banco:</p> -->
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="bill-to text-right">
                                                    <p class="mb-0">
                                                        <p class="h3 mb-1 text-dark font-weight-semibold">Saldo Inicial: <?php echo number_format($row_caixa['saldo_inicial'],2,",", ".") ?></p>
                                                        <p class="h5 mb-1 text-dark font-weight-semibold">Horário de Abertura: <?php echo $row_caixa['hora'] ?></p>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <table class="table table-responsive-md invoice-items">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th class="font-weight-semibold">Pedido</th>
                                                    <th class="font-weight-semibold text-left">Nome</th>
                                                    <th class="font-weight-semibold text-center">Hora</th>
                                                    <th class="font-weight-semibold text-center">Tipo</th>
                                                    <th class="font-weight-semibold text-center">Valor</th>
                                                    <th class="font-weight-semibold text-center">Forma</th>
                                                    <th class="font-weight-semibold text-right">Entrada</th>
                                                    <th class="font-weight-semibold text-right">Saída</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($rows_rsmovimento = mysqli_fetch_array($rsmov)) { ?>
                                                    <tr style="font-size:14px;">
                                                        <td class="text-left text-danger"><b><?php echo $rows_rsmovimento['idpedido'] ?></b></td>
                                                        <td class="text-left"><?php echo $rows_rsmovimento['nome'] ?></td>
                                                        <td class="text-center"><?php echo $rows_rsmovimento['hora'] ?></td>
                                                        <td class="text-center"><b><?php echo $rows_rsmovimento['titulo'] ?></b></td>
                                                        <td class="text-center text-primary"><b><?php echo number_format($rows_rsmovimento['valor_total'],2,",", ".") ?></b></td>
                                                        <td class="text-center"><b><?php echo $rows_rsmovimento['forma'] ?></b></td>
                                                        <td class="text-right text-success"><b><?php echo number_format($rows_rsmovimento['valor'],2,",", ".") ?></b></td>
                                                        <td class="text-right text-danger"><b><?php echo number_format($rows_rsmovimento['troco'],2,",", ".") ?></b></td>
                                                    </tr>
                                                <?php
                                                    $totalcaixa = 0;
                                                    $totalcaixa = $row_caixa['saldo_inicial'] + $row_totaldia['total'];
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="invoice-summary">
                                        <div class="row justify-content-end">
                                            <div class="col-sm-6">
                                                <table class="table h6 text-dark">
                                                    <tbody>
                                                        <tr class="b-top-0">
                                                            <td colspan="2"><b>Saldo Inicial</b></td>
                                                            <td class="text-right h5 text-dark font-weight-semibold"><?php echo number_format($row_caixa['saldo_inicial'],2,",", ".") ?></td>
                                                        </tr>
                                                        <tr class="b-top-0">
                                                            <td colspan="2"><b>Troco</b></td>
                                                            <td class="text-right h5 text-dark font-weight-semibold"><?php echo number_format($row_troco['troco'],2,",", ".") ?></td>
                                                        </tr>
                                                        <tr class="b-top-0">
                                                            <td colspan="2"><b>Recebimento<b></td>
                                                            <td class="text-right h5 text-dark font-weight-semibold"><?php echo number_format($row_recebido['recebido'],2,",", ".") ?> </td>
                                                        </tr>
                                                        <tr class="b-top-0">
                                                            <td colspan="2"><b>Total do Dia<b></td>
                                                            <td class="text-right h5 text-dark font-weight-semibold"><?php echo number_format($row_totaldia['total'],2,",", ".") ?> </td>
                                                        </tr>
                                                        <tr class="h4">
                                                            <td colspan="2"><b>Saldo do Dia</b></td>
                                                            <?php if (isset($totalcaixa)) { ?>
                                                                <td class="text-right"><b class="h2 text-dark font-weight-semibold"><?php echo number_format($totalcaixa, 2, ",", "."); ?></b></td>
                                                            <?php } else { ?>
                                                                <td class="text-right"><b class="h2 text-dark font-weight-semibold"></b></td>
                                                            <?php }  ?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </section>
                <?php } ?>
                <!-- end: page -->
                </div>
            </section>
    </section>
    </div>
    </div>
    </form>

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
    <script>
        $(function(){
        window.print();
        });
    </script>
</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

</html>