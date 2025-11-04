<?php 
if (!defined('BASE_PATH')) {
    require_once __DIR__ . '/../config.php';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title : 'Mi Sitio Web'; ?></title>

    <<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos globales -->
    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <?php include BASE_PATH . '/includes/navbar.php'; ?>

    <!-- Header principal -->
    <header class="py-5 bg-gradient text-white" style="background-color: mediumslateblue">
        <div class="container text-center">
            <h1 class="display-5 fw-bold">Ejercicios PHP</h1>
            <p class="lead mb-0">Form-UploadFile · Cookies · Sesión · Autenticación</p>
        </div>
    </header>

    <!-- Inicio del contenido principal -->
    <main class="flex-grow-1 py-4">
        <div class="container">