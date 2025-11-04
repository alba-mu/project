<?php
        // Nombre de la cookie
        $cookieName = 'visitas';
        
        // --- Manejo del reset (si el usuario pulsa "Reiniciar") ---
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_counter'])) {
            // Borrar cookie: establecer con expiración pasada
            setcookie($cookieName, '', time() - 3600, $cookiePath);
            // También borrar la variable $_COOKIE en memoria para reflejar el cambio ahora mismo
            unset($_COOKIE[$cookieName]);

            // Redirigimos con GET para evitar reenvío del formulario al refrescar
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        // --- Manejo de la cookie de visitas ---
        if (!isset($_COOKIE[$cookieName])) {
            // Primera visita -> crear cookie con valor 1
            $visitas = 1;
            setcookie($cookieName, $visitas);
            $firstVisit = true;
        } else {
            // Cookie existe -> incrementamos
            $visitas = intval($_COOKIE[$cookieName]) + 1;
            // Actualizamos cookie con el nuevo valor
            setcookie($cookieName, $visitas);
            $firstVisit = false;
        }


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contador de visitas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Contador de visitas</h1>
    <div class="card">
        <?php if ($firstVisit): ?>
            <p class="info">¡Bienvenido! Esta es tu <strong>primera visita</strong>.</p>
        <?php else: ?>
            <p class="info">Has visitado esta página <strong><?php echo htmlspecialchars($visitas); ?></strong> veces (según la cookie).</p>
        <?php endif; ?>

        <form method="post">
            <input type="hidden" name="reset_counter" value="1">
            <button type="submit" class="btn btn-reset">Reiniciar contador</button>
        </form>

</body>
</html>