<?php 
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
    // Guardamos el color en una cookie que dura 24 horas
    setcookie('color', $color, time() + 60 * 60 * 24);
}
// Si NO ha enviado el formulario, pero ya existe una cookie, la usamos
elseif (isset($_COOKIE['color'])) {
    $color = $_COOKIE['color'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Color de la página</title>
    <style>
        body {
            background: <?= htmlspecialchars($color ?: 'white') ?>;
        }
    </style>
</head>
<body>
    <h1>Determinar el color de la página</h1>

    <form method="POST">
        <fieldset>
            <legend>Color de fondo</legend>
            <p>Selecciona el color de fondo que quieres usar para esta página</p>
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
</body>
</html>