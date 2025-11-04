<?php
session_start();
// credenciales del usuario
  $usr="alumne";
  $pass="php"; 

// Listado de películas
$peliculas = ["El Laberinto del Fauno", "Cómo Entrenar a tu Dragón", "Nimona"];

// Listado de séries
$series = ["Juego de Tronos", "El Cuento de la Criada", "Miércoles"];

// Comprobamos si ya se ha enviado el formulario
if (isset($_POST["login"])) {

    if ((filter_has_var(INPUT_POST, 'user')) && (filter_has_var(INPUT_POST, 'password'))) {
        
        // Limpiar parámetros
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS); 
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validar parámetros
        if ($user === false || $password === false || $user == null || $password == null ) { // Valores no introducidos
            // Redirección a la página de login con error guardado en cookies
            $_SESSION["error"] = "Debes introducir un usuario y contraseña.";
            header("Location: 410index.php");
            exit;

        } else {
            if ($user == $usr && $password == $pass) { // login correcto
                // almacenamos el usuario en la sesión
                session_start();
                $_SESSION['usuario'] = $user;
                $_SESSION['peliculas'] = $peliculas;
                $_SESSION['series'] = $series;
                // redirección a la página de la aplicación
                header("Location: 412peliculas.php");

            } else {
                // login incorrecto y redirección a la página de login con error guardado en cookies
                $_SESSION["error"] = "Usuario o contraseña no válidos.";
                header("Location: 410index.php");
                exit;
            }
        }
        
    } else {
        header("Location: 410index.php");
    }

}

?>
