<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Mi Sitio Web'; ?></title>
    <link rel="stylesheet" href="/project/css/style.css">
</head>
<body>
    <?php include __DIR__.'/navbar.php'; ?>
    
    <header class="site-header">
        <div class="container">
            <h1>Ejercicios PHP</h1>
            <p>Form-UploadFile, Cookies, Sesión, Autenticación</p>
        </div>
    </header>