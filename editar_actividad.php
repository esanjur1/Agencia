<?php
$conexion = new mysqli("localhost", "eric", "Eric123!", "Agencia_db");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $ubicacion = $_POST["ubicacion"];
    $fecha = $_POST["fecha"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $imagen = $_POST["imagen"];

    // Hacemos la consulta con UPDATE para actualizar los datos de la actividad
    $sql = "UPDATE actividades SET 
            nombre='$nombre', 
            ubicacion='$ubicacion', 
            fecha='$fecha', 
            precio='$precio', 
            descripcion='$descripcion', 
            imagen='$imagen' 
            WHERE id=$id";

    // Ejecutamos la consulta y se ve el mensaje según el resultado
    if ($conexion->query($sql) === TRUE) {
        echo "Actividad actualizada correctamente. <a href='configActividadesViajes.php'>Volver</a>";
        exit;
    } else {
        echo "Error: " . $conexion->error;
    }
}
// Realizamos un select de dicha tabla
$sql = "SELECT * FROM actividades WHERE id=$id";
$resultado = $conexion->query($sql);
$actividad = $resultado->fetch_assoc();
?>
