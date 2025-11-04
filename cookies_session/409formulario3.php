<?php
session_start();

// Configuración de página
$page_title = "Ejercicio 409 - Formulario usando sesión (parte 3)";
$current_page = "cookies_session";
require_once __DIR__ . '/../config.php';
include BASE_PATH . '/includes/header.php';

// --- Procesamiento del formulario ---
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // --- Convivientes ---
    if (filter_has_var(INPUT_POST, 'convivientes')) {
        $convivientes = filter_input(INPUT_POST, 'convivientes', FILTER_VALIDATE_INT);
        if ($convivientes === false || $convivientes === null) {
            $_SESSION['error_convivientes'] = "Error - Número de convivientes no válido";
        } else {
            $_SESSION['convivientes'] = $convivientes;
        }  
    } else {
        $_SESSION['error_convivientes'] = "Error - Campo no introducido";
    }

    // --- Aficiones ---
    $aficiones_dict = $_SESSION["aficiones_dict"] ?? [];

    if (filter_has_var(INPUT_POST, 'aficiones')) {
        $aficiones = filter_input(INPUT_POST, 'aficiones', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];
        if (count($aficiones) < 4) {
            $_SESSION['error_aficiones'] = "Error - Menos de 4 aficiones seleccionadas";
        } else {
            $aficiones_display = [];
            foreach ($aficiones as $value) {
                $aficiones_display[] = $aficiones_dict[$value] ?? $value;
            }
            $_SESSION['aficiones'] = $aficiones_display;
        }  
    } else {
        $_SESSION['error_aficiones'] = "Error - Aficiones no seleccionadas";
    }

    // --- Menú favorito ---
    $menu_dict = $_SESSION["menus_dict"] ?? [];

    if (filter_has_var(INPUT_POST, 'menu')) {
        $menu = filter_input(INPUT_POST, 'menu', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];
        if (count($menu) < 4) {
            $_SESSION['error_menu'] = "Error - Menos de 4 menús seleccionados";
        } else {
            $menu_display = [];
            foreach ($menu as $value) {
                $menu_display[] = $menu_dict[$value] ?? $value;
            }
            $_SESSION['menu'] = $menu_display;
        }  
    } else {
        $_SESSION['error_menu'] = "Error - Menús favoritos no seleccionados";
    }
}

// --- Recopilación de datos para mostrar ---
$form_content = [
    "Nombre" => $_SESSION["nom"] ?? $_SESSION["error_nom"] ?? "",
    "Apellidos" => $_SESSION["cognoms"] ?? $_SESSION["error_cognoms"] ?? "",
    "Email" => $_SESSION["email"] ?? $_SESSION["error_email"] ?? "",
    "URL personal" => $_SESSION["url"] ?? $_SESSION["error_url"] ?? "",
    "Sexo" => $_SESSION["sexo"] ?? $_SESSION["error_sexo"] ?? "",
    "Convivientes" => $_SESSION["convivientes"] ?? $_SESSION["error_convivientes"] ?? "",
    "Aficiones" => $_SESSION["aficiones"] ?? $_SESSION["error_aficiones"] ?? "",
    "Menú favorito" => $_SESSION["menu"] ?? $_SESSION["error_menu"] ?? "",
];
?>

<!-- Introducción -->
<section class="mb-5">
    <div class="p-5 rounded-4 shadow-soft bg-light">
        <h1 class="text-center fw-bold mb-3">
            Ejercicio 409 — Formulario usando sesión (parte 3)
        </h1>
        <p class="lead">
            En esta última parte del ejercicio se muestran los datos recopilados en las páginas 
            <code>409formulario1.php</code> y <code>409formulario2.php</code>.  
            Todos los valores han sido almacenados en la <strong>sesión</strong> y se presentan a continuación 
            en una tabla resumen. Si algún campo contiene errores, estos se muestran en color rojo.
        </p>
    </div>
</section>
<!-- Tabla de resultados -->
<section class="card shadow-sm mb-4">
    <div class="card-body">
        <h2 class="fw-bold text-mediumslateblue mb-4 text-center">
            Datos almacenados en la sesión
        </h2>
        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0">
                <tbody>
                    <?php foreach ($form_content as $heading => $content) : ?>
                        <tr>
                            <th class="bg-light text-end w-25"><?= htmlspecialchars($heading) ?></th>
                            <td>
                                <?php
                                    if (is_array($content)) {
                                        // Si el contenido es un array (aficiones o menú), lo mostramos en líneas separadas
                                        foreach ($content as $value) {
                                            echo htmlspecialchars($value) . "<br>";
                                        }
                                    } else {
                                        // Si empieza por "Error", lo mostramos en rojo
                                        $es_error = stripos($content, 'error') !== false;
                                        $clase = $es_error ? 'text-danger fw-semibold' : '';
                                        echo "<span class='$clase'>" . htmlspecialchars($content) . "</span>";
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Enlace de retorno -->
    <div class="text-center mb-5">
        <a href="409formulario1.php" class="btn btn-mediumslateblue px-4">
            Volver a rellenar el formulario
        </a>
    </div>
</section>
   


<?php
    include BASE_PATH . '/includes/footer.php';
?>