<?php
session_start();
session_unset();    // Elimina todas las variables almacenadas en $_SESSION
session_destroy();  // Destruye la sesión actual completamente

// Configuración de página
$page_title = "Ejercicio 409 - Formulario usando sesión (parte 1)";
$current_page = "cookies_session";
require_once __DIR__ . '/../config.php';
include BASE_PATH . '/includes/header.php';
?>

<main class="container py-5">
    <!-- Introducción -->
    <section class="mb-5">
        <div class="p-5 rounded-4 shadow-soft bg-light">
            <h1 class="text-center fw-bold mb-3">
                Ejercicio 409 — Formulario usando sesión (parte 1)
            </h1>
            <p class="lead">
                En este ejercicio se divide el formulario del ejercicio <code>402formulario.php</code> en tres pasos, 
                utilizando la <strong>sesión</strong> para guardar los datos entre páginas.  
                En esta primera parte (<code>409formulario1.php</code>), el usuario introduce su 
                <strong>nombre y apellidos</strong>, <strong>correo electrónico</strong>, 
                <strong>URL personal</strong> y <strong>sexo</strong>.  
                Los datos se enviarán a <code>409formulario2.php</code>, donde se almacenarán en la sesión 
                y se pedirá el resto de información.
            </p>
        </div>
    </section>

    <!-- Formulario principal -->
    <section class="card shadow-sm">
        <div class="card-body">
            <h2 class="fw-bold text-mediumslateblue mb-4 text-center">
                Formulario de información personal
            </h2>

            <form action="409formulario2.php" method="POST" class="mx-auto" style="max-width: 600px;">
                <fieldset class="mb-4">
                    <legend class="fw-semibold text-mediumslateblue">Nombre y apellidos</legend>
                    <div class="mb-3">
                        <input type="text" name="nom" class="form-control" placeholder="Ej. Alba" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="cognoms" class="form-control" placeholder="Ej. Fernández Pérez" required>
                    </div>
                </fieldset>

                <fieldset class="mb-4">
                    <legend class="fw-semibold text-mediumslateblue">Email</legend>
                    <input type="email" name="email" class="form-control" placeholder="Ej. example@gmail.com" required>
                </fieldset>

                <fieldset class="mb-4">
                    <legend class="fw-semibold text-mediumslateblue">URL personal</legend>
                    <input type="url" name="url" class="form-control" placeholder="Ej. http://ejemplo.com">
                </fieldset>

                <fieldset class="mb-4">
                    <legend class="fw-semibold text-mediumslateblue">Sexo</legend>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="hombre" name="sexo" value="Hombre" class="form-check-input">
                        <label for="hombre" class="form-check-label">Hombre</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="mujer" name="sexo" value="Mujer" class="form-check-input">
                        <label for="mujer" class="form-check-label">Mujer</label>
                    </div>
                </fieldset>

                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-mediumslateblue text-white px-4">
                        Enviar
                    </button>
                    <button type="reset" class="btn btn-mediumslateblue text-white px-4">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>

<?php
include BASE_PATH . '/includes/footer.php';
?>