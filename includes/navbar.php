<nav class="navbar">
    <div class="container">
        <div class="logo">
            <a href="/project/index.php"><img src="/project/img/logo_provenzana.jpg" width="100" /></a>
        </div>
        <ul class="nav-menu">
            <li><a href="/project/index.php" class="<?php echo ($current_page == 'inicio') ? 'active' : ''; ?>">Inicio</a></li>
            <li><a href="/project/formularios/formularios.php" class="<?php echo ($current_page == 'formularios') ? 'active' : ''; ?>">Formularios</a></li>
            <li><a href="/project/cookies_session/cookies_session.php" class="<?php echo ($current_page == 'cookies_session') ? 'active' : ''; ?>">Cookies y Sessión</a></li>
            <li><a href="/project/autenticacion/autenticacion.php" class="<?php echo ($current_page == 'autenticacion') ? 'active' : ''; ?>">Autenticación</a></li>
        </ul>
    </div>
</nav>