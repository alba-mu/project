<?php
    session_start();
    session_unset();    // Elimina todas las variables almacenadas en $_SESSION
    session_destroy();  // Destruye la sesión actual completamente
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

    <form action="409formulario2.php" method="POST">
        <fieldset>
            <legend>Nombre i apellidos</legend>
            <input type="text" name="nom" required placeholder="Ej. Alba" />
            <input type="text" name="cognoms" required placeholder="Ej. Fernandez Pérez" />
        </fieldset>
        <fieldset>
            <legend>Email</legend>
            <input type="email" name="email" required placeholder="Ej. example@gmail.com" />
        </fieldset>
        <fieldset>
            <legend>URL personal</legend>
            <input type="url" name="url" placeholder="Ej. http://ejemplo.com" />
        </fieldset>
        <fieldset>
            <legend>Sexo</legend>
            <input type="radio" id="hombre" name="sexo" value="Hombre">
            <label for="hombre">Hombre</label>
            <input type="radio" id="mujer" name="sexo" value="Mujer">
            <label for="mujer">Mujer</label><br>
        </fieldset>
        
        <p>
            <input type="submit" value="Enviar">
            <input type="reset" value="Reset">
        </p>
    </form>
</body>
</html>