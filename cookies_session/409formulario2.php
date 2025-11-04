<?php
session_start();

// Comprobamos que el formulario se haya enviado por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Validamos y guardamos cada campo de forma segura

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
        if ($url === false){
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

$aficiones = [
    "leer"=> "Leer",
    "musica"=> "Escuchar música",
    "viajar"=> "Viajar",
    "deporte"=> "Practicar deporte",
    "cocinar"=> "Cocinar",
    "peliculas"=> "Ver películas o series",
    "videojuegos" => "Jugar a videojuegos",
    "dibujar" => "Dibujar o pintar",
    "senderismo" => "Hacer senderismo",
    "bailar"=> "Bailar",
];
$_SESSION["aficiones_dict"] = $aficiones;

$menus = [
    "pizza"=> "Pizza",
    "pasta" => "Pasta",
    "ensalada"=> "Ensalada",
    "hamburguesa"=> "Hamburguesa",
    "sushi" => "Sushi",
    "paella"=> "Paella",
    "tacos"=> "Tacos",
    "ramen"=> "Ramen",
    "curry" => "Curry",
    "helado"=> "Helado",
    "tortillapatatas" => "Tortilla de patatas"
];
$_SESSION["menus_dict"] = $menus;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario con sesión</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <h1>Formulario de información personal usando sesión</h1>

    <form action="409formulario3.php" method="POST">
        <fieldset>
            <legend>Número de convivientes en el domicilio</legend>
            <input type="number" name="convivientes" required min="0" value="0" />
        </fieldset>

        <fieldset>
            <legend>Aficiones (selecciona mínimo 4)</legend>
            <div class="alinear-izquierda">
                <?php foreach ($aficiones as $value => $displayName) :?>
                    <label><input type="checkbox" name="aficiones[]" value="<?= $value ?>"> <?= $displayName ?></label><br>
                <?php endforeach; ?>
                
            </div>
        </fieldset>

        <fieldset>
            <legend>Menú favorito </legend>
            
            <label for="menu">Selecciona tus platos favoritos: (mínimo 4)</label><br>
            <select name="menu[]" id="menu" multiple size="6">
                <?php foreach ($menus as $value => $displayName) :?>    
                    <option value="<?= $value ?>"><?= $displayName ?></option>
                <?php endforeach; ?>
            </select>

            <p><small>Pulsa Ctrl (Windows) o Cmd (Mac) para seleccionar varios.</small></p>
        </fieldset>
        <p>
            <input type="submit" value="Enviar">
            <input type="reset" value="Reset">
        </p>
    </form>
</body>
</html>