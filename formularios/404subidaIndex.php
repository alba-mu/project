<?php
// Configuración y cabecera
$page_title = "Formulario ejercicios 404 y 405";       
$current_page = "formularios";             
require_once __DIR__ . '/../config.php';   
include BASE_PATH . '/includes/header.php';
?>

<main class="container">
    <h1>Ejercicio 404</h1>
    <p class="enunciat">
        Crea un formulario que permita subir un archivo al servidor. 
        Además del fichero, debe pedir en el mismo formulario dos campos numéricos que soliciten la anchura y la altura. 
        Comprueba que tanto el fichero como los datos llegan correctamente.
    </p>

    <div class="contenedor-inline">
        
        <!-- Formulario 1: subida de cualquier tipo de archivo -->
        <form name="form_data" 
              action="<?= BASE_URL ?>/formularios/404subida.php" 
              method="POST" 
              enctype="multipart/form-data">
            <fieldset>
                <legend>Data (any type)</legend>
                <input type="file" name="filename" />
            </fieldset>
            <p>
                <input type="submit" value="upload" name="submit_file">
                <input type="reset" value="reset" name="reset_file">
            </p>
        </form>

        <!-- Formulario 2: subida de imágenes con validación de tamaño -->
        <form name="form_image" 
              action="<?= BASE_URL ?>/formularios/405subidaImagen.php" 
              method="POST" 
              enctype="multipart/form-data">
            <fieldset>
                <legend>Image</legend>
                <input type="file" name="filename" accept="image/png, image/jpeg"/>
            </fieldset>
            <fieldset>
                <legend>Width and Height</legend>
                <input type="number" name="width" min="0" max="900" value="450"/>
                <input type="number" name="height" min="0" max="650" value="325"/>
            </fieldset>
            <p>
                <input type="submit" value="upload" name="submit_image">
                <input type="reset" value="reset" name="reset_image">
            </p>
        </form>
    </div>
</main>

<?php
// Footer
include BASE_PATH . '/includes/footer.php';
?>