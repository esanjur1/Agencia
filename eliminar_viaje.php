<?php
$host = "localhost";
$usuario = "eric";
$contrasena = "Eric123!";
$bd = "Agencia_db";

$conexion = new mysqli($host, $usuario, $contrasena, $bd);
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
// Preparamos una consulta DELETE FROM para eliminar el viaje con ese id
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conexion->prepare("DELETE FROM viajes WHERE id_viaje = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
// Cuando se elimina vamos de vuelta a la página de configuración de actividades y viajes
$conexion->close();
header("Location: configActividadesViajes.php");
exit;
?>
