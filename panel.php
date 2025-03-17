<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: pagina.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración Básico</title>
    <link href="panel.css" rel="stylesheet">
</head>
<body>

    <div class="sidebar">
        <h2>Admin</h2>
        <a href="#">Inicio</a>
        <a href="#">Usuarios</a>
        <a href="#">Ajustes</a>
        <a href="logout.php">Cerrar Sesión</a>
    </div>

    <div class="main">
        <h1>Bienvenido al Panel, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>

        <div class="box">
            <h3>Configuración</h3>
            <p>Desde aquí podrás cambiar la configuración de tu sitio.</p>
        </div>
    </div>

</body>
</html>
