<?php
// Configuración de la página
$page_title = "Formularios";
$current_page = "formularios";

// Incluir configuración y cabecera
require_once __DIR__ . '/../config.php';
include BASE_PATH . '/includes/header.php';
?>

<main class="container">
    <section class="hero">
        <h1>Formularios - UploadFile</h1>
        <h3>Ejercicios centrados en la creación y validación de formularios con PHP.</h3>
        <br />
        <p>
            En este bloque se trabajó con la <strong>gestión de ficheros en PHP</strong>, aprendiendo a crear formularios que 
            permiten <strong>adjuntar archivos</strong> y enviarlos al servidor mediante el método 
            <code>POST</code> con el atributo <code>enctype="multipart/form-data"</code>.
            Se practicó cómo <strong>validar el tipo y tamaño</strong> de los ficheros, restringiendo la subida a ciertos formatos 
            (por ejemplo, solo imágenes o documentos PDF) y controlando los posibles errores durante el proceso.
            También se aprendió a <strong>mover los archivos al servidor</strong> de forma segura con <code>move_uploaded_file()</code> 
            y a mostrar mensajes informativos o de error según el resultado de la carga.
            El objetivo fue comprender el flujo completo de subida, validación y almacenamiento de ficheros desde 
            un formulario PHP.
        </p>
    </section>

    <section>
        <h2>Enlace a los ejercicios</h2>
        <div class="card">
            <h4>Ejercicios 404 y 405</h4>
            <ul>
                <li><a href="<?= BASE_URL ?>formularios/404subidaIndex.php">404subidaIndex.php</a></li>
                <li><a href="<?= BASE_URL ?>formularios/404subida.php">404subida.php</a></li>
                <li><a href="<?= BASE_URL ?>formularios/405subidaImagen.php">405subidaImagen.php</a></li>
            </ul>
        </div>
    </section>
</main>

<?php include BASE_PATH . '/includes/footer.php'; ?>