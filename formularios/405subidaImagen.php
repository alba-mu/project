<?php
// Configuración y cabecera
$page_title = "405subidaImagen.php";       
$current_page = "formularios";             
require_once __DIR__ . '/../config.php';   
include BASE_PATH . '/includes/header.php';

// Ruta donde se guardarán las imágenes subidas
define("PATH_TO_UPLOADED_FILES", BASE_PATH . "/img/");
?>

<main class="container">
    <h1>Resultado de subida</h1>
    <div class="contenedor-inline">
    <?php
    // Comprobamos si se ha enviado el formulario
    if (filter_has_var(INPUT_POST, 'submit_image')) {

        // Recuperamos los datos de anchura y altura
        $width = filter_input(INPUT_POST, 'width', FILTER_VALIDATE_INT);
        $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_INT);

        // Contenedor de errores
        $errors = "";

        // Validaciones
        if ($_FILES['filename']['error'] != 0) {
            $errors .= "<li>Error uploading file</li>";
        }
        if ($width === false || $height === false) {
            $errors .= "<li>Error determining width and height of picture</li>";
        }

        // Mostrar errores si existen
        if ($errors != "") {
            echo "<p>Errors:</p>";
            echo "<ul>$errors</ul>";
            echo "<p>[<a href='" . BASE_URL . "/formularios/404subidaIndex.php'>Go back to the form</a>]</p>";
        } else {

            // Procesar archivo subido
            if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
                $fileName = $_FILES['filename']['name'];
                $destination = PATH_TO_UPLOADED_FILES . basename($fileName);

                // Crear directorio si no existe
                if (!is_dir(PATH_TO_UPLOADED_FILES)) {
                    mkdir(PATH_TO_UPLOADED_FILES, 0777, true);
                }

                echo "<p>File <strong>$fileName</strong> uploaded successfully.</p>";
                echo "<p>Destination: <code>$destination</code></p>";

                // Mover el archivo al directorio de destino
                if (move_uploaded_file($_FILES['filename']['tmp_name'], $destination)) {
                    echo "<p>File moved successfully.</p>";
                    // Mostrar imagen redimensionada
                    $imageUrl = BASE_URL . "/img/" . basename($fileName);
                    echo "<div><img src='$imageUrl' height='$height' width='$width' alt='Uploaded image'></div>";
                } else {
                    echo "<p>Error moving file.</p>";
                }

            } else {
                echo "<p>File not uploaded.</p>";
            }

            echo "<p>[<a href='" . BASE_URL . "/formularios/404subidaIndex.php'>Upload another file</a>]</p>";
        }
    } else {
        echo "<p>Form has not been sent.</p>";
    }
    ?>
    </div>
</main>

<?php
// Footer
include BASE_PATH . '/includes/footer.php';
?>