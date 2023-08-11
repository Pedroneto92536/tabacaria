<?php
//Inicia Sessão

session_start();

?>
<!doctype html>
<html class="fixed" data-style-switcher-options="{'layoutStyle': 'boxed'}">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">
    <link rel="icon" href="img/favicon-16x16.png" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon-16x16.png" type="image/x-icon">

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

    <style>
        body {
            background-image: url('img/login4.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>


</head>

<body>
    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">


            <div class="panel card-sign">
                
                <div class="card-title-sign mt-3 text-right">
                    <h2 class="title text-uppercase font-weight-bold m-0">
                    <img src="img/favicon-16x16.png" alt="Ícone" class="icon-img mr-1">
                        <i class="fas fa-user mr-1"></i>

                        OM Lounge.</h2>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['nao_autenticado'])) :
                    ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>ERRO!</strong> <?php echo $_SESSION['nao_autenticado'] ?>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    <form action="login.php" method="post">
                        <div class="form-group mb-3">
                            <label>E-mail</label>
                            <div class="input-group">
                                <input name="email" type="text" class="form-control form-control-lg" />
                                <span class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="clearfix">
                                <label class="float-left">Senha</label>
                                <a href="esqueci_minha_senha.asp" class="float-right">Esqueceu a Senha?</a>
                            </div>
                            <div class="input-group">
                                <input name="senha" type="password" class="form-control form-control-lg" />
                                <span class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="RememberMe" name="rememberme" type="checkbox" />
                                    <label for="RememberMe">Lembrar Me?</label>
                                </div>

                            </div>

                            <div class="col-sm-12 text-right">
                                <!--
                                    <a href="cadastrar.php" class="mb-1 mt-1 mr-1 btn btn-dark">Cadastrar-se</a>
                                -->
                                <button type="submit" name="btnEntrar" class="mb-1 mt-1 mr-1 btn btn-danger"><i class="fas fa-unlock-alt"></i> Acessar</button>
                            </div>

                        </div>
                        <hr>
                        <p class="text-center"><i class="fas fa-laptop"></i> Desenvolvido por: Pedro Neto </p>
                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-3 mb-3 text-danger">&copy; PNT | Copyright 2023. All Rights Reserved.</p>
        </div>
    </section>
    <!-- end: page -->

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

    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>

</body>

</html>