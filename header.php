<?php
include("Connections/conexao.php");
include("valida.php");
?>
<!-- start: header -->
<header class="header">
        <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened"> <i class="fas fa-bars" aria-label="Toggle sidebar"></i> </div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">

        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="img/favicon-32x32.png" class="rounded-circle" data-lock-picture="img/user.jpg" />
                </figure>
                <div class="profile-info">
                    <span class="name"><?php echo $_SESSION['nome']; ?></span>
                    <span class="role"><?php echo $_SESSION['nomepermissao']; ?></span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled mb-2">
                    <li class="divider"></li>
                    <!--
                    <li>
                        <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fas fa-user"></i> Meu Perfil</a>
                    </li> -->
                    <li>
                        <a role="menuitem" tabindex="-1" href="sair.php"><i class="fas fa-power-off"></i> Deslogar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>
<!-- end: header -->