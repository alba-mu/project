<?php
// Configuración y cabecera
$page_title = "Subida de imagen";
$current_page = "formularios";
require_once __DIR__ . '/../config.php';
include BASE_PATH . '/includes/header.php';

// Ruta donde se guardarán las imágenes subidas
define("PATH_TO_UPLOADED_FILES", BASE_PATH . "/img/");
?>

<main class="container py-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="mb-4 text-center text-mediumslateblue fw-bold">Resultado de subida</h1>

            <?php
            // Comprobamos si se ha enviado el formulario
            if (filter_has_var(INPUT_POST, 'submit_image')) {

                // Recuperamos los datos de anchura y altura
                $width = filter_input(INPUT_POST, 'width', FILTER_VALIDATE_INT);
                $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_INT);

                $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);

                // Contenedor de errores
                $errors = "";

                // Validaciones
                if ($_FILES['filename']['error'] != 0) {
                    $errors .= "<li>Error al subir el archivo.</li>";
                }
                if ($width === false || $height === false) {
                    $errors .= "<li>Anchura o altura no válidas.</li>";
                }

                if (!in_array($mime_type = mime_content_type($_FILES['filename']['tmp_name']), $allowedTypes)) {
                    $errors .= "<li>El tipo del archivo subido no está permitido.</li>";
                }

                // Mostrar errores si existen
                if ($errors != "") {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo "<h5 class='fw-semibold'>Se han encontrado errores:</h5><ul>$errors</ul>";
                    echo '</div>';
                    echo '<p class="mt-3"><a href="' . BASE_URL . '/formularios/404subidaIndex.php" class="btn btn-mediumslateblue text-white">Volver al formulario</a></p>';
                } else {

                    // Procesar archivo subido
                    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
                        $fileName = $_FILES['filename']['name'];
                        $destination = PATH_TO_UPLOADED_FILES . basename($fileName);

                        // Crear directorio si no existe
                        if (!is_dir(PATH_TO_UPLOADED_FILES)) {
                            mkdir(PATH_TO_UPLOADED_FILES, 0777, true);
                        }

                        echo '<div class="alert alert-success" role="alert">';
                        echo "<p>El archivo <strong>$fileName</strong> se ha subido correctamente.</p>";
                        echo "<p>Destino: <code>$destination</code></p>";
                        echo '</div>';

                        // Mover el archivo al directorio de destino
                        if (move_uploaded_file($_FILES['filename']['tmp_name'], $destination)) {
                            echo "<p class='fw-semibold text-success'>El archivo se ha movido correctamente.</p>";
                            // Mostrar imagen redimensionada
                            $imageUrl = BASE_URL . "/img/" . basename($fileName);
                            echo "<div class='text-center mt-4'><img src='$imageUrl' height='$height' width='$width' class='img-fluid rounded border' alt='Imagen subida'></div>";
                        } else {
                            echo "<p class='text-danger'>Error al mover el archivo.</p>";
                        }

                    } else {
                        echo "<p class='text-danger'>No se ha podido subir el archivo.</p>";
                    }

                    echo '<p class="mt-4"><a href="' . BASE_URL . '/formularios/404subidaIndex.php" class="btn btn-mediumslateblue text-white">Subir otro archivo</a></p>';
                }
            } else {
                echo "<p>El formulario no ha sido enviado.</p>";
            }
            ?>
        </div>
    </div>
</main>

<?php
// Footer
include BASE_PATH . '/includes/footer.php';
?>