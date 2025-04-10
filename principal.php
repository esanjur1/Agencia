<?php
$host = "localhost";
$usuario = "eric";
$contrasena = "Eric123!";
$bd = "Agencia_db";

$conexion = new mysqli($host, $usuario, $contrasena, $bd);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql_viajes = "SELECT * FROM viajes";
$resultado_viajes = $conexion->query($sql_viajes);

$sql_actividades = "SELECT * FROM actividades";
$resultado_actividades = $conexion->query($sql_actividades);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mundo Aventura</title>
    <link rel="stylesheet" href="principal.css">
</head>

<body>
    <header class="encabezado">
        <div class="nombre-agencia">🌍 Mundo Aventura</div>
    </header>
    <section class="seccion-viajes">
        <h2>Viajes Disponibles</h2>
        <div class="galeria-experiencias">
            <?php if ($resultado_viajes->num_rows > 0) : ?>
                <?php while ($viaje = $resultado_viajes->fetch_assoc()) : ?>
                    <div class='tarjeta-viaje'>
                        <img src="<?= $viaje["Imagen"] ?>" alt="Imagen de <?= $viaje["destino"] ?>">
                        <h3>De <?= $viaje["origen"] ?> a <?= $viaje["destino"] ?></h3>
                        <p><strong>Salida:</strong> <?= $viaje["fecha_ida"] ?></p>
                        <p><strong>Regreso:</strong> <?= $viaje["fecha_vuelta"] ?></p>
                        <p><?= $viaje["descripcion"] ?></p>
                        <span class='costo'>Precio: <?= $viaje["precio"] ?>€</span>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>No hay viajes disponibles.</p>
            <?php endif; ?>
        </div>
