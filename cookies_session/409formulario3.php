<?php
session_start();

// Comprobamos que el formulario se haya enviado por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Validamos y guardamos cada campo de forma segura

    // --- Convivientes ---
    if (filter_has_var(INPUT_POST, 'convivientes')) {
        $convivientes = filter_input(INPUT_POST, 'convivientes', FILTER_VALIDATE_INT);
        if ($convivientes === false || $convivientes === null) {
            $_SESSION['error_convivientes'] = "Error - Número de convivientes no válido";
        } else {
            $_SESSION['convivientes'] = $convivientes;
        }  
    } else {
        $_SESSION['error_convivientes'] = " - ";
    }


    // --- Aficiones ---
    $aficiones_dict = $_SESSION["aficiones_dict"];

    if (filter_has_var(INPUT_POST, 'aficiones')) {
        $aficiones = filter_input(INPUT_POST, 'aficiones', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];
        if (count($aficiones) < 4) {
            $_SESSION['error_aficiones'] = "Error - Menos de 4 aficiones seleccionadas";
        } else {
            $aficiones_display = [];
            foreach ($aficiones as $value) {
                $aficiones_display[] = $aficiones_dict[$value];
            }
            $_SESSION['aficiones'] = $aficiones_display;
        }  
    } else {
        $_SESSION['error_aficiones'] = "Error - Aficiones no seleccionadas";
    }

    // --- Menú favorito ---
    $menu_dict = $_SESSION["menus_dict"];

    if (filter_has_var(INPUT_POST, 'menu')) {
        $menu = filter_input(INPUT_POST, 'menu', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];
        if (count($menu) < 4) {
            $_SESSION['error_menu'] = "Error - Menos de 4 menús seleccionados";
        } else {
            $menu_display = [];
            foreach ($menu as $value) {
                $menu_display[] = $menu_dict[$value];
            }
            $_SESSION['menu'] = $menu_display;
        }  
    } else {
        $_SESSION['error_menu'] = "Error - Menús favoritos no seleccionados";
    }

}

// Recopilamos el contenido del formulario en un array asociativo
$form_content = [
    "Nombre" => $_SESSION["nom"] ?? $_SESSION["error_nom"],
    "Apellidos" => $_SESSION["cognoms"] ?? $_SESSION["error_cognoms"],
    "Email"=> $_SESSION["email"] ?? $_SESSION["error_email"],
    "URL personal"=> $_SESSION["url"] ?? $_SESSION["error_url"],
    "Sexo"=> $_SESSION["sexo"] ?? $_SESSION["error_sexo"],
    "Convivientes"=> $_SESSION["convivientes"] ?? $_SESSION["error_convivientes"],
    "Aficiones"=> $_SESSION["aficiones"] ?? $_SESSION["error_aficiones"],
    "Menú favorito"=> $_SESSION["menu"] ?? $_SESSION["error_menu"],
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario con sesión</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <h1>Mostrar datos del formualario guardados en sesión</h1>
    <!-- Generar tabla con valores en sesión -->
     <table class="tabla-datos">
        <tbody>
            <?php foreach($form_content as $heading => $content) : ?>
                <tr>
                    <th><?= htmlspecialchars($heading) ?></th>
                    <td>
                        <?php
                            // Si el contenido es un array (aficiones o menú), lo mostramos en líneas separadas
                            if (is_array($content)) {
                                foreach ($content as $value) {
                                    echo htmlspecialchars($value) . "<br>";
                                }
                            } else {
                                // Si empieza por "Error", lo mostramos en rojo
                                $clase = (stripos($content, 'error') !== false) ? 'error' : '';
                                echo "<span class='$clase'>" . htmlspecialchars($content) . "</span>";
                            }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p>
        <a href="409formulario1.php" class="boton">Volver a rellenar el formulario</a>
    </p>
    
</body>
</html>