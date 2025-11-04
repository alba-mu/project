<?php
$page_title = "Inicio";
$current_page = "inicio";
include __DIR__ .'/includes/header.php';
?>

<main class="container">
    <section class="hero">
        <h1>Bienvenido a Mi Sitio Web</h1>
        <p>Esta página recoge los ejercicios hechos en clase de la 
            asignatura de Desarrollo Web en Entorno Servidor</p>
    </section>
    <section class="content">
        <div class="card">
            <h2>Formularios</h2>
            <p>Ejercicios centrados en la creación y validación de formularios con PHP. </p>
        </div>
        <div class="card">
            <h2>Cookies y Session</h2>
            <p>Bloque dedicado a la gestión de información persistente mediante cookies 
            y variables de sesión. </p>
        </div>
        <div class="card">
            <h2>Autenticación</h2>
            <p>Desarrollo de un sistema básico de inicio y cierre de sesión. </p>
        </div>
    </section>
</main>

<?php include __DIR__ .'/includes/footer.php'; ?>