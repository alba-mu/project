<?php
$page_title = "Cookies y Session";
$current_page = "cookies_session";
include '../includes/header.php';
?>

<main class="container">
    <section class="hero">
        <h1>Cookies y Session</h1>
        <h3>Bloque dedicado a la gestión de información persistente mediante cookies y variables de sesión. </h3>
        <p>En esta parte se profundizó en el uso de las variables de sesión y las cookies para 
            almacenar y mantener información entre distintas páginas.  
            Se aprendió a crear, recuperar y eliminar cookies, así como a iniciar y gestionar sesiones 
            con <code>session_start()</code>.  
            También se practicó cómo guardar los datos introducidos por el usuario en una sesión 
            para mostrarlos posteriormente en una tabla, manteniendo la información activa mientras 
            el usuario navegaba por el sitio.  
            Con estos ejercicios se comprendió la diferencia entre la persistencia temporal de las sesiones 
            y la persistencia más prolongada que ofrecen las cookies.</p>
    </section>
    <section>
        <h2>Enlace a los ficheros</h2>
        <div class="card">
            <h4>Ejercicios 406 - Contador de visitas</h4>
            <ul>
                <li><a href="./406contadorVisitas.php">406contadorVisitas.php</a></li>
            </ul>
        </div>
        <div class="card">
            <h4>Ejercicios 407 - Cambio del color de fondo (cookies)</h4>
            <ul>
                <li><a href="./407fondo.php">407fondo.php</a></li>
            </ul>
        </div>
        <div class="card">
            <h4>Ejercicios 408 - Cambio del color de fondo (session)</h4>
            <ul>
                <li><a href="./408fondoSesion1.php">408fondoSesion1.php</a></li>
                <li><a href="./408fondoSesion2.php">408fondoSesion2.php</a></li>
            </ul>
        </div>
        <div class="card">
            <h4>Ejercicios 409 - Formulario usando sesión</h4>
            <ul>
                <li><a href="./409formulario1.php">409formulario1.php</a></li>
                <li><a href="./409formulario2.php">409formulario2.php</a></li>
                <li><a href="./409formulario3.php">409formulario3.php</a></li>
            </ul>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>