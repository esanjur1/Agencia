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
