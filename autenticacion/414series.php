<?php
session_start();

// Configuración de página
$page_title = "Ejercicio Login-Logout — Listado de Series";
$current_page = "autenticacion";
require_once __DIR__ . '/../config.php';
include BASE_PATH . '/includes/header.php';

// --- Comprobación de sesión ---
if (!isset($_SESSION['usuario'])) {
    $error = true;
} else {
    $error = false;
}
?>

<!-- Contenido principal -->
<main class="container my-5">
    <!-- Introducción -->
    <section class="mb-5">
        <div class="p-5 rounded-4 shadow-soft bg-light">
            <h1 class="text-center fw-bold mb-3">
                Ejercicio Login - Logout
            </h1>

            <p class="lead">
                Si el usuario <strong>está logeado</strong>, se muestra la <strong>lista de películas o series</strong> guardadas en sesión y una 
                <strong>barra de menú</strong> para navegar entre las dos páginas, así como también para cerrar sesión.
            </p>

            <p class="lead mt-3">
                Si el usuario <strong>no está logeado</strong>, se muestra un <strong>mensaje de error</strong> indicando que debe iniciar sesión 
                para poder ver el contenido de la página.
            </p>
        </div>
    </section>

    <?php if ($error): ?>
        <!-- Mensaje de error -->
        <section class="text-center p-5 rounded-4 bg-light shadow-soft">
            <h1 class="fw-bold text-danger mb-3">Acceso denegado</h1>
            <p class="lead mb-4 alert alert-danger">
                No estás identificado. Debes iniciar sesión para acceder al contenido de esta página.
            </p>
            <a href="410index.php" class="btn btn-mediumslateblue px-4">Iniciar sesión</a>
        </section>

    <?php else: ?>
        <!-- Contenido del listado -->
        <section class="mb-4">
            <nav class="navbar navbar-expand-lg bg-mediumslateblue rounded-4 shadow-sm mb-4">
                <div class="container-fluid justify-content-between text-white">
                    <ul class="navbar-nav d-flex flex-row gap-3">
                        <li class="nav-item"><a href="412peliculas.php" class="nav-link text-white fw-semibold">Películas</a></li>
                        <li class="nav-item"><a href="414series.php" class="nav-link text-white fw-semibold">Series</a></li>
                        <li class="nav-item"><a href="413logout.php" class="nav-link text-white fw-semibold">Cerrar sesión</a></li>
                    </ul>
                    <span class="fw-semibold">
                        Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?>
                    </span>
                </div>
            </nav>

            <div class="p-5 bg-light rounded-4 shadow-soft">
                <h1 class="fw-bold text-mediumslateblue mb-4 text-center">Listado de Series</h1>
                <ul class="list-group list-group-flush w-75 mx-auto">
                    <?php foreach ($_SESSION['series'] as $serie): ?>
                        <li class="list-group-item"><?= htmlspecialchars($serie) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    <?php endif; ?>

</main>

<?php include BASE_PATH . '/includes/footer.php'; ?>