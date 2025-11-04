<?php
// Configuración de la página
$page_title = "Inicio";
$current_page = "inicio";

// Incluir configuración y cabecera
require_once __DIR__ . '/config.php';
include BASE_PATH . '/includes/header.php';
?>

<main class="container my-5">
    <!-- Sección principal de bienvenida -->
    <section class="text-center mb-5">
        <h1 class="display-5 fw-bold text-mediumslateblue">Bienvenido a Mi Sitio Web</h1>
        <p class="lead mt-3">
            Esta página recoge los ejercicios realizados en la asignatura de 
            <strong>Desarrollo Web en Entorno Servidor</strong>.
        </p>
    </section>

    <!-- Tarjetas de contenido -->
    <section class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-mediumslateblue">Formularios</h5>
                    <p class="card-text">
                        Ejercicios centrados en la creación, validación y envío de formularios en PHP, 
                        incluyendo la gestión de archivos y validaciones de tipo.
                    </p>
                    <a href="<?= BASE_URL ?>formularios/formularios.php" class="btn btn-mediumslateblue w-100">
                        Ver ejercicios
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-mediumslateblue">Cookies y Sesión</h5>
                    <p class="card-text">
                        Bloque dedicado al uso de <code>cookies</code> y variables de sesión 
                        para mantener información entre distintas páginas.
                    </p>
                    <a href="<?= BASE_URL ?>cookies_session/cookies_session.php" class="btn btn-mediumslateblue w-100">
                        Ver ejercicios
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-mediumslateblue">Autenticación</h5>
                    <p class="card-text">
                        Desarrollo de un sistema básico de inicio y cierre de sesión, 
                        con control de acceso y gestión de usuarios.
                    </p>
                    <a href="<?= BASE_URL ?>autenticacion/autenticacion.php" class="btn btn-mediumslateblue w-100">
                        Ver ejercicios
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include BASE_PATH . '/includes/footer.php'; ?>