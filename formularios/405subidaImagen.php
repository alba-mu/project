<?php
//path where uploaded files should be copied.
define("PATH_TO_UPLOADED_FILES", "./img/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resultado de subida</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Resultado de subida</h1>
    <div class="contenedor-inline">
    <?php
    /* Retrieve data from the query */
    if (filter_has_var(INPUT_POST, 'submit_image')) {
        // Retrieve width and height from form
        if (filter_has_var(INPUT_POST, 'width') && filter_has_var(INPUT_POST, 'height')){
            $width = filter_input(INPUT_POST, 'width', FILTER_VALIDATE_INT);
            $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_INT);
        }
        
        //error container (string)
        $errors = "";
        //validations.
        if ($_FILES['filename']['error'] != 0) {
            $errors = $errors . "<li>Error uploading file</li>";
        }
        if ($width == false || $height == false) {
            $errors = $errors . "<li>Error determining width and height of picture</li>";
        }

        //show errors.
        if ($errors != "") {
            echo "<p>Errors:</p>";
            echo "<ul>", $errors, "</ul>";
            echo "<p>[<a href='./404subida.html'>Go back to the form</a>]</p>";
        } else {
            if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
                // get file name
                $fileName = $_FILES['filename']['name']; 
                // set up destination of the file
                if (is_dir(PATH_TO_UPLOADED_FILES)) {
                    $destination = PATH_TO_UPLOADED_FILES . basename($fileName);
                } else {
                    mkdir(PATH_TO_UPLOADED_FILES);
                    $destination = PATH_TO_UPLOADED_FILES . basename($fileName);
                }
                
                
                echo "<p>File $fileName uploaded successfully.</p>
                        <p>destination: $destination </p>";

                // Now you move/upload your file
                if (move_uploaded_file($_FILES['filename']['tmp_name'], $destination)) {
                    echo "<p>File $fileName successfully uploaded and moved</p>
                    <div><img src='$destination' height='$height' width='$width'/>";
                
                }
            } else {
                echo "<p>File $fileName NOT uploaded.</p>";
            }
            
            echo "<p>[<a href='./404subida.html'>Upload another file</a>]</p>";
        }
    } else {
        echo "<p>Form has not been sent</p>";
    }
    ?>
    </div>
</body>
</html>