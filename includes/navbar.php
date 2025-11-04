<?php 
if (!defined('BASE_PATH')) {
    require_once __DIR__ . '/../config.php';
}
?>

<!-- Navbar Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="<?= BASE_URL ?>index.php">
            <img src="<?= BASE_URL ?>logo_provenzana.jpg" alt="Logo Provenzana" width="60" class="me-2 rounded">
            <span class="fw-bold">Ejercicios PHP</span>
        </a>

        <!-- Botón hamburguesa para móvil -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" 
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Enlaces del menú -->
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>index.php" 
                       class="nav-link <?= ($current_page == 'inicio') ? 'active' : ''; ?>">
                        Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>formularios/formularios.php" 
                       class="nav-link <?= ($current_page == 'formularios') ? 'active' : ''; ?>">
                        Formularios
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>cookies_session/cookies_session.php" 
                       class="nav-link <?= ($current_page == 'cookies_session') ? 'active' : ''; ?>">
                        Cookies y Sesión
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>autenticacion/autenticacion.php" 
                       class="nav-link <?= ($current_page == 'autenticacion') ? 'active' : ''; ?>">
                        Autenticación
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>