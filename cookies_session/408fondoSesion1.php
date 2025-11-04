<?php
session_start();

// Lista de colores disponibles
$colores = [
    ["name" => "palegreen", "displayName" => "Pale Green"],
    ["name" => "salmon", "displayName" => "Salmon"],
    ["name" => "paleturquoise", "displayName" => "Pale Turquoise"]
];

// Variable que guardará el color actual
$color = "";

// Si el usuario ha enviado el formulario...
if (filter_has_var(INPUT_POST, 'color')) {
    $color = $_POST['color'] ?? '';
    // Guardamos el color en la sesión
    $_SESSION['color'] = $color;
}
// Si no se ha enviado el formulario pero ya hay un color en sesión
elseif (isset($_SESSION['color'])) {
    $color = $_SESSION['color'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Color de la página (Sesión)</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Determinar el color de la página</h1>

    <form method="POST">
        <fieldset>
            <legend>Color de fondo</legend>
            <p>Selecciona el color de fondo que quieres usar</p>
            <select name="color" id="color">
                <option value="">-- Selecciona --</option>
                <?php foreach ($colores as $c): ?>
                    <option value="<?= $c["name"] ?>" 
                        <?= ($c["name"] === $color) ? 'selected' : '' ?>>
                        <?= $c["displayName"] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </fieldset>
        <p>
            <input type="submit" value="Guardar color">
        </p>
    </form>

    <a href="408fondoSesion2.php">Mostrar color</a>
</body>
</html>