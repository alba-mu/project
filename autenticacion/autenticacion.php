<?php
// Configuración de la página
$page_title = "Autenticación";
$current_page = "autenticacion";

// Incluir configuración y cabecera
require_once __DIR__ . '/../config.php';
include BASE_PATH . '/includes/header.php';
?>

<main class="container my-1">

    <!-- Hero Section -->
    <section class="mb-5">
        <div class="p-5 shadow-soft">
            <h1 class="text-center fw-bold mb-3">Autenticación</h1>
            <h3 class="fw-normal mb-4">
                Bloque dedicado al desarrollo de un sistema de autenticación sencillo con inicio y cierre de sesión.
            </h3>

            <p class="lead">
                Este bloque consiste en crear un formulario de <strong>login</strong> que permite el acceso solo 
                a los usuarios con credenciales válidas. Una vez validado el inicio de sesión, los datos del usuario, 
                junto con los listados de películas y series, se almacenaban en la <strong>sesión</strong> 
                para poder mostrarlos en diferentes páginas.
            </p>

            <p class="lead">
                También se implementa un sistema de <strong>control de acceso</strong> que impide entrar directamente 
                en las vistas privadas sin haber iniciado sesión previamente, asegurando así la protección del contenido. 
                Además, se añade una funcionalidad de <strong>logout</strong> que destruye la sesión activa y 
                redirige al formulario de inicio.
            </p>

            <p class="lead">
                Este ejercicio permite aplicar los conocimientos sobre el manejo de sesiones en un 
                <strong>caso práctico de autenticación básica</strong>, combinando validación de formularios, 
                persistencia de datos y control de flujo entre páginas.
            </p>
        </div>
    </section>

    <!-- Enlaces a ejercicios -->
    <section>
        <div class="card shadow-soft border-0 mb-4">
            <div class="card-header bg-mediumslateblue text-white">
                <h2 class="h4 mb-0">Enlace a los ejercicios</h2>
            </div>
            <div class="card-body">

                <div class="mb-4">
                    <h5 class="card-title text-mediumslateblue fw-semibold mb-3">
                        Sistema de login y logout (Ejercicios 410–415)
                    </h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="<?= BASE_URL ?>autenticacion/410index.php" 
                               class="text-decoration-none text-dark fw-semibold">
                                410index.php
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= BASE_URL ?>autenticacion/411login.php" 
                               class="text-decoration-none text-dark fw-semibold">
                                411login.php (controlador - no tiene html)
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= BASE_URL ?>autenticacion/412peliculas.php" 
                               class="text-decoration-none text-dark fw-semibold">
                                412peliculas.php
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= BASE_URL ?>autenticacion/413logout.php" 
                               class="text-decoration-none text-dark fw-semibold">
                                413logout.php (controlador - no tiene html)
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= BASE_URL ?>autenticacion/414series.php" 
                               class="text-decoration-none text-dark fw-semibold">
                                414series.php
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

</main>

<?php include BASE_PATH . '/includes/footer.php'; ?>