<?php
  session_start();

  if (isset($_SESSION['usuario'])) { // usuario loggeado
    // Eliminar todas las variables de la sesión
    session_unset();

    // Destruir la sesión
    session_destroy();

    header("Location: 410index.php");              
}
else { //user no loggeado todavia
    // TODO            
}
