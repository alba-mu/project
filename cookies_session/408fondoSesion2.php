<?php
session_start();

// Variable que guardará el color actual
$color = "";

// Si hay un color guardado en la sesión
if (isset($_SESSION['color'])) {
    $color = $_SESSION['color'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Color de la página (Sesión)</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: <?= htmlspecialchars($color ?: 'white') ?>;
        }
    </style>
</head>
<body>
    <h1>Mostrar el color seleccionado</h1>

    <p>Color actual: <strong><?= htmlspecialchars($color ?: 'ninguno') ?></strong></p>

    <a href="408fondoSesion1.php">Volver al formulario de selección</a><br>
    <a href="408vaciarSesion.php">Borrar sesión y volver</a>
</body>
</html>