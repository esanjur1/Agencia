<?php
$host = "localhost";
$usuario = "eric";
$contrasena = "Eric123!";
$bd = "Agencia_db";

$conexion = new mysqli($host, $usuario, $contrasena, $bd);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// SELECT para obtener todas las actividades y todos los v>
$sql_actividades = "SELECT * FROM actividades";
$sql_viajes = "SELECT * FROM viajes";

// Se ejecutan las consultas
$resultado_actividades = $conexion->query($sql_actividades>
$resultado_viajes = $conexion->query($sql_viajes);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Actividades y Viajes</title>
    <link href="myestilo.css" rel="stylesheet">
</head>
<body>

<div class="encabezado">
    <div class="nombre-agencia">Panel de Actividades y Viajes</div>
</div>

<div class="seccion">
    <h2>Actividades</h2>
    <div class="grid-usuarios">
        <?php
        // Si hay actividades en la base de datos se muestran
        if ($resultado_actividades->num_rows > 0) {
            while($actividad = $resultado_actividades->fetch_assoc()) {
                echo "<div class='tarjeta-usuario'>";
                echo "<h3>" . htmlspecialchars($actividad["nombre"]) . "</h3>";
                echo "<p><strong>ID:</strong> " . htmlspecialchars($actividad["id"]) . "</p>";
                echo "<p><strong>Ubicación:</strong> " . htmlspecialchars($actividad["ubicacion"]) . "</p>";
                echo "<p><strong>Fecha:</strong> " . htmlspecialchars($actividad["fecha"]) . "</p>";
                echo "<p><strong>Precio:</strong> " . htmlspecialchars($actividad["precio"]) . " €</p>";
                echo "<p><strong>Descripción:</strong> " . htmlspecialchars($actividad["descripcion"]) . "</p>";
                // Botones para editar y eliminar la actividad
                echo "<a class='boton-accion' href='editar_actividad.php?id=" . $actividad["id"] . "'>Editar</a>";
                echo "<a class='boton-accion eliminar' href='eliminar_actividad.php?id=" . $actividad["id"] . "' onclick=\"return confirm('Se eliminará la actividad, ¿estás seguro?');\">Eliminar</a>";
                echo "</div>";
            }
        } else {
            echo "<p style='color: #fff;'>No hay más actividades.</p>";
        }
        ?>
    </div>
</div>
<div class="seccion">
    <h2>Viajes</h2>
    <div class="grid-usuarios">
        <?php
        // Si hay viajes en la base de datos se muestran
        if ($resultado_viajes->num_rows > 0) {
            while($viaje = $resultado_viajes->fetch_assoc()) {
                echo "<div class='tarjeta-usuario'>";
                echo "<h3>De " . htmlspecialchars($viaje["origen"]) . " a " . htmlspecialchars($viaje["destino"]) . "</h3>";
                echo "<p><strong>ID:</strong> " . htmlspecialchars($viaje["id_viaje"]) . "</p>";
                echo "<p><strong>Fecha Ida:</strong> " . htmlspecialchars($viaje["fecha_ida"]) . "</p>";
                echo "<p><strong>Fecha Vuelta:</strong> " . htmlspecialchars($viaje["fecha_vuelta"]) . "</p>";
                echo "<p><strong>Precio:</strong> " . htmlspecialchars($viaje["precio"]) . " €</p>";
                echo "<p><strong>Descripción:</strong> " . htmlspecialchars($viaje["descripcion"]) . "</p>";
                // Botones para editar y eliminar el viaje
                echo "<a class='boton-accion' href='editar_viajes.php?id=" . $viaje["id_viaje"] . "'>Editar</a>";
                echo "<a class='boton-accion eliminar' href='eliminar_viaje.php?id=" . $viaje["id_viaje"] . "' onclick=\"return confirm('¿Estás seguro de que deseas eliminar este viaje?');\">Eliminar</a>";
                echo "</div>";
            }
        } else {
            echo "<p style='color: #fff;'>No hay viajes registrados.</p>";
        }

        $conexion->close();
        ?>
    </div>
</div>

<div style="text-align: right; margin: 20px;">
    <a href="panel.php" class="boton-actividades">Volver al Panel Principal</a>
</div>
</body>
</html>
