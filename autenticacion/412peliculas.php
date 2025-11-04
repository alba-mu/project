<?php
    // Recuperamos la información de la sesión
    if(!isset($_SESSION)) {
        session_start();
    }

    // Y comprobamos que el usuario se haya autentificado
    if (!isset($_SESSION['usuario'])) {
        $error = "  <p class='error'>Error - No estás identificado.</p>
                    <p>Debes identificarte para poder acceder al contenido de la página.</p>
                    <p class='boton'><a href='410index.php'>Iniciar Sesión</a></p>";
    } else {
        $error = null;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de películas</title>
    <link rel="stylesheet" href="./styles.css"/>
</head>
<body>
    <?php if (!isset($error)) : ?>
        <div class="layout">
            <nav class="menu">
                <ul>
                    <li><a href="412peliculas.php">Películas</a></li>
                    <li><a href="414series.php">Series</a></li>
                    <li><a href="413logout.php">Cerrar sesión</a></li>
                </ul>
                <span class="usuario">Bienvenido, <?= $_SESSION['usuario']?></span>
            </nav>

            <main>
                <h1>Listado de Películas</h1>
                <ul class="alinear-izquierda">
                    <?php foreach ($_SESSION['peliculas'] as $pelicula) :?>
                        <li><?= $pelicula ?></li>
                    <?php endforeach;?>
                </ul>
            </main>
        </div>
    <?php else : ?>
        <div class="error-wrapper">
            <div class="container-error">
                <span><?= $error ?></span>
            </div>
        </div>
    <?php endif; ?>
    
</body>
</html>