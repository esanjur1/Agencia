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
<head>
    <link rel="stylesheet" href="estiloactividades.css">
</head>
<body>
<h2>Editar Actividad</h2>
<form method="post">
    <input type="text" name="nombre" value="<?= $actividad['nombre'] ?>" required><br>
    <input type="text" name="ubicacion" value="<?= $actividad['ubicacion'] ?>" required><br>
    <input type="date" name="fecha" value="<?= $actividad['fecha'] ?>" required><br>
    <input type="number" step="0.01" name="precio" value="<?= $actividad['precio'] ?>" required><br>
    <textarea name="descripcion"><?= $actividad['descripcion'] ?></textarea><br>
    <input type="text" name="imagen" value="<?= $actividad['imagen'] ?>"><br>
    <button type="submit">Actualizar</button>
</form>
</body>
