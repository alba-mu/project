<?php
// Configuración y cabecera
$page_title = "406subida.php";       
$current_page = "formularios";             
require_once __DIR__ . '/../config.php';   
include BASE_PATH . '/includes/header.php';

// Directorio donde se guardarán los archivos subidos (ruta absoluta del servidor)
define("PATH_TO_UPLOADED_FILES", BASE_PATH . '/formularios/files/');

// URL pública de la carpeta de archivos subidos (para mostrar enlaces o imágenes)
define("URL_TO_UPLOADED_FILES", BASE_URL . '/formularios/files/');
?>

<main class="container">
    <h1>Resultado de subida</h1>
    <div class="contenedor-inline">

    <?php
    /* Retrieve data from the query */
    if (filter_has_var(INPUT_POST, 'submit_file')) {
        // Error container (string)
        $errors = "";

        // Validations
        if ($_FILES['filename']['error'] != 0) {
            $errors .= "<li>Error uploading file</li>";
        }

        // Show errors
        if ($errors != "") {
            echo "<p>Errors:</p>";
            echo "<ul>$errors</ul>";
            // Enlace dinámico de vuelta al formulario
            echo "<p>[<a href='" . BASE_URL . "/formularios/404subidaIndex.php'>Volver al formulario</a>]</p>";
        } else {
            if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
                // Get file name
                $fileName = $_FILES['filename']['name']; 
                // Get mime type
                $mime_type = mime_content_type($_FILES['filename']['tmp_name']); 
                // Set up destination of the file
                $destination = PATH_TO_UPLOADED_FILES . basename($fileName);
                
                echo "<p>Archivo <strong>$fileName</strong> subido correctamente.</p>";
                echo "<p>Tipo MIME: $mime_type </p>";
                echo "<p>Destino: $destination </p>";

                // Crear directorio de destino si no existe
                if (!is_dir(PATH_TO_UPLOADED_FILES)) {
                    mkdir(PATH_TO_UPLOADED_FILES);
                }
                // Move/upload the file
                if (move_uploaded_file($_FILES['filename']['tmp_name'], $destination)) {
                    echo "<p>El archivo <strong>$fileName</strong> se ha movido correctamente.</p>";
                    // Mostrar enlace directo al archivo subido
                    echo "<p><a href='" . URL_TO_UPLOADED_FILES . rawurlencode($fileName) . "' target='_blank'>Ver archivo</a></p>";
                }
            } else {
                echo "<p>No se ha podido subir el archivo.</p>";
            }

            // Enlace de vuelta al formulario
            echo "<p>[<a href='" . BASE_URL . "/formularios/404subidaIndex.php'>Subir otro archivo</a>]</p>";
        }
    } else {
        echo "<p>El formulario no ha sido enviado.</p>";
    }
    ?>
    </div>
</main>

<?php
// Footer
include BASE_PATH . '/includes/footer.php';
?>