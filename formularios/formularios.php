<?php
$page_title = "Formularios";
$current_page = "formularios";
include '../includes/header.php';
?>

<main class="container">
    <section class="hero">
        <h1>Formularios - UploadFile</h1>
        <h3>Ejercicios centrados en la creación y validación de formularios con PHP. </h3>
        <br />
        <p>En este bloque se trabajó con la gestión de ficheros en PHP, aprendiendo a crear formularios que 
            permiten adjuntar archivos y enviarlos al servidor mediante el método <code>POST</code> con el atributo 
            <code>enctype="multipart/form-data"</code>.
            Se practicó cómo validar el tipo y tamaño de los ficheros, restringiendo la subida a ciertos formatos 
            (por ejemplo, solo imágenes o documentos PDF) y controlando los posibles errores durante el proceso.
            También se aprendió a mover los archivos al servidor de forma segura con <code>move_uploaded_file()</code> 
            y a mostrar mensajes informativos o de error según el resultado de la carga.
            El objetivo fue comprender el flujo completo de subida, validación y almacenamiento de ficheros desde 
            un formulario PHP.</p>
    </section>
    <section>
        <h2>Enlace a los ficheros</h2>
        <div class="card">
            <h4>Ejercicios 404 y 405</h4>
            <ul>
                <li><a href="./404subida.html">404subida.html</a></li>
                <li><a href="./404subida.php">404subida.php</a></li>
                <li><a href="./405subidaImagen.php">405subidaImagen.php</a></li>
            </ul>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>