<?php
    session_start();
    $error = $_SESSION["error"] ?? "";
    unset($_SESSION["error"]); // eliminar para que no se repita
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>login</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="./styles.css"/>
    </head>
    <body>
        <div class="login-wrapper">
            <div class="login-container">
                <h1>login</h1>
                
                <form id="form" action="411login.php" method="post">        
                    <fieldset>
                        <!-- error (si hay) -->
                        <?php if ($error): ?>
                            <div><span class="error"><?= $error ?></span></div>
                        <?php endif; ?>
                        <!-- campos del login -->
                        <p>
                            <label for="user">Usuario:</label>
                            <input type="text" id="user" name="user" value=""/>
                        </p>
                        <p>
                            <label for="id_password">Contraseña:</label>
                            <input type="password" id="password" name="password" value=""/>
                        </p>
                    </fieldset>

                        <input type="submit" id="login" name="login" value="LOGIN"/>
                        <input type="reset" id="reset" name="reset" value="RESET"/>

                </form>
            </div>
        </div>
    </body>
</html>