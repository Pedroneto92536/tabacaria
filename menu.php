<?php
include("Connections/conexao.php");
include("valida.php");
?>
<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">

                <ul class="nav nav-main ">

                    <li>
                        <a class="nav-link" href="home.php">
                            <i class="fas fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-parent nav-expanded ">
                        <a href="#">
                            <i class="fas fa-store"></i>
                            <span>Pedidos</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="pedidos.php">
                                    <i class="fas fa-receipt"></i>
                                    Vendas
                                </a>
                            </li>

                            <!-- adicionar mais -->
                        </ul>
                    </li>
                    <!-- Fim menu Pedidos -->

                    <li class="nav-parent nav-expanded ">
                        <a href="#">
                            <i class="fas fa-user-alt "></i>
                            <span>Cadastros</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="cad_cliente.php">
                                    <i class="fas fa-user-plus"></i>
                                    Clientes
                                </a>
                            </li>
                            <?php if ($_SESSION['permissao'] == 1  or $_SESSION['permissao'] == 4) { ?>
                                <li>
                                    <a href="cad_usuario.php">
                                        <i class="fas fa-users"></i>
                                        Usuários
                                    </a>
                                </li>
                                <li>
                                    <a href="cad_produtos.php">
                                        <i class="fas fa-box-open"></i>
                                        Produtos
                                    </a>
                                </li>
                                <li>
                                    <a href="cad_categoria.php">
                                        <i class="fas fa-boxes"></i>
                                        Categoria
                                    </a>
                                </li>
                            <?php } ?>
                            <!-- adicionar mais -->
                        </ul>
                    </li>
                    <!-- Fim menu Cadastros -->

                    <li class="nav-parent nav-expanded ">
                        <a href="#">
                            <i class="fas fa-user-alt "></i>
                            <span>Consultas</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="consulta_cliente.php">
                                    <i class="fas fa-user-edit"></i>
                                    Consultar Clientes
                                </a>
                            </li>
                            <?php if ($_SESSION['permissao'] == 1  or $_SESSION['permissao'] == 4) { ?>
                                <li>
                                    <a href="consulta_usuario.php">
                                        <i class="fas fa-users"></i>
                                        Consultar Usuários
                                    </a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="consulta_produtos.php">
                                    <i class="fas fa-clipboard-list"></i>
                                    Consultar Produtos
                                </a>
                            </li>

                            <!-- adicionar mais -->
                        </ul>
                    </li>
                    <!-- Fim menu Consultas -->
                    
                    <!-- Fim menu Estoque -->
                    <?php if ($_SESSION['permissao'] == 1 or $_SESSION['permissao'] == 2 or $_SESSION['permissao'] == 4) { ?>
                        <li class="nav-parent nav-expanded">
                            <a href="#">
                                <i class="fas fa-dollar-sign"></i>
                                <span>Financeiro</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a href="caixa.php">
                                        <i class="fas fa-hand-holding-usd"></i>
                                        Caixa
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                        Relatórios
                                    </a>
                                </li>
                                <!-- adicionar mais -->
                            </ul>
                        </li>
                     <?php } ?>
                
            </nav> 

            <hr class="separator" />


        </div>

        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>


    </div>

</aside>
<!-- end: sidebar -->