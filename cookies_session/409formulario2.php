<?php
session_start();

// Configuración de página
$page_title = "Ejercicio 409 - Formulario usando sesión (parte 2)";
$current_page = "cookies_session";
require_once __DIR__ . '/../config.php';
include BASE_PATH . '/includes/header.php';

// Comprobamos que el formulario se haya enviado por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // --- Nombre ---
    if (filter_has_var(INPUT_POST, 'nom')) {
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($nom === false || $nom === null) {
            $_SESSION['error_nom'] = "Error - Nombre no válido";
        } else {
            $_SESSION['nom'] = $nom;
        }
    } else {
        $_SESSION['error_nom'] = "Error - Nombre no introducido";
    }

    // --- Apellidos ---
    if (filter_has_var(INPUT_POST, 'cognoms')) {
        $cognoms = filter_input(INPUT_POST, 'cognoms', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($cognoms === false || $cognoms === null) {
            $_SESSION['error_cognoms'] = "Error - Apellidos no válidos";
        } else {
            $_SESSION['cognoms'] = $cognoms;
        }
    } else {
        $_SESSION['error_cognoms'] = "Error - Apellidos no introducidos";
    }

    // --- Email ---
    if (filter_has_var(INPUT_POST, 'email')) {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($email === false || $email === null) {
            $_SESSION['error_email'] = "Error - Email no válido";
        } else {
            $_SESSION['email'] = $email;
        }
    } else {
        $_SESSION['error_email'] = "Error - Email no introducido";
    }

    // --- URL personal (opcional) ---
    if (filter_has_var(INPUT_POST, 'url')) {
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        if ($url === false) {
            $_SESSION['error_url'] = " - ";
        } else {
            $_SESSION['url'] = $url;
        }
    } else {
        $_SESSION['url'] = "";
    }

    // --- Sexo ---
    if (filter_has_var(INPUT_POST, 'sexo')) {
        $_SESSION['sexo'] = trim($_POST['sexo']);
    } else {
        $_SESSION['error_sexo'] = "Error - Sexo no seleccionado";
    }
}

// --- Diccionarios de selección ---
$aficiones = [
    "leer" => "Leer",
    "musica" => "Escuchar música",
    "viajar" => "Viajar",
    "deporte" => "Practicar deporte",
    "cocinar" => "Cocinar",
    "peliculas" => "Ver películas o series",
    "videojuegos" => "Jugar a videojuegos",
    "dibujar" => "Dibujar o pintar",
    "senderismo" => "Hacer senderismo",
    "bailar" => "Bailar",
];
$_SESSION["aficiones_dict"] = $aficiones;

$menus = [
    "pizza" => "Pizza",
    "pasta" => "Pasta",
    "ensalada" => "Ensalada",
    "hamburguesa" => "Hamburguesa",
    "sushi" => "Sushi",
    "paella" => "Paella",
    "tacos" => "Tacos",
    "ramen" => "Ramen",
    "curry" => "Curry",
    "helado" => "Helado",
    "tortillapatatas" => "Tortilla de patatas"
];
$_SESSION["menus_dict"] = $menus;
?>

<!-- Introducción -->
<section class="mb-5">
    <div class="p-5 rounded-4 shadow-soft bg-light">
        <h1 class="text-center fw-bold mb-3">
            Ejercicio 409 — Formulario usando sesión (parte 2)
        </h1>
        <p class="lead">
            En esta segunda parte del ejercicio, se recuperan los datos personales enviados desde 
            <code>409formulario1.php</code> y se guardan en la <strong>sesión</strong>.  
            A continuación, el usuario debe completar la información restante:  
            <strong>número de convivientes en el domicilio</strong>, <strong>aficiones</strong> y 
            <strong>platos favoritos del menú</strong>.  
            Una vez completado el formulario, los datos se enviarán a 
            <code>409formulario3.php</code>, donde se mostrarán todos los valores almacenados.
        </p>
    </div>
</section>

<!-- Formulario -->
<section class="card shadow-sm">
    <div class="card-body">
        <h2 class="fw-bold text-mediumslateblue mb-4 text-center">
            Formulario de información personal
        </h2>
        <form action="409formulario3.php" method="POST" class="mx-auto" style="max-width: 600px;">
            
            <!-- Número de convivientes -->
            <fieldset class="mb-4">
                <legend class="fw-semibold text-mediumslateblue">Número de convivientes en el domicilio</legend>
                <input type="number" name="convivientes" required min="0" value="0" class="form-control w-50" />
            </fieldset>

            <!-- Aficiones -->
            <fieldset class="mb-4">
                <legend class="fw-semibold text-mediumslateblue">Aficiones (selecciona mínimo 4)</legend>
                <div class="row">
                    <?php foreach ($aficiones as $value => $displayName) : ?>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="aficiones[]" value="<?= $value ?>" id="<?= $value ?>">
                                <label class="form-check-label" for="<?= $value ?>"><?= $displayName ?></label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </fieldset>

            <!-- Menú favorito -->
            <fieldset class="mb-4">
                <legend class="fw-semibold text-mediumslateblue">Menú favorito</legend>
                <label for="menu" class="form-label">Selecciona tus platos favoritos (mínimo 4):</label>
                <select name="menu[]" id="menu" multiple size="6" class="form-select">
                    <?php foreach ($menus as $value => $displayName) : ?>
                        <option value="<?= $value ?>"><?= $displayName ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="form-text">Pulsa <strong>Ctrl</strong> (Windows) o <strong>Cmd</strong> (Mac) para seleccionar varios.</p>
            </fieldset>

            <div class="d-flex justify-content-center gap-3">
                <button type="submit" class="btn btn-mediumslateblue px-4">Enviar</button>
                <button type="reset" class="btn btn-mediumslateblue px-4">Reset</button>
            </div>
        </form>
    </div>
</section>

<?php
include BASE_PATH . '/includes/footer.php';
?>