<?php
$conexion = new mysqli("localhost", "eric", "Eric123!", "Agencia_db");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = $_POST["origen"];
    $destino = $_POST["destino"];
    $fecha_ida = $_POST["fecha_ida"];
    $fecha_vuelta = $_POST["fecha_vuelta"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $imagen = $_POST["imagen"];

    // Hacemos la consulta con UPDATE para actualizar los datos de viajes
    $sql = "UPDATE viajes SET 
            origen='$origen', 
            destino='$destino', 
            fecha_ida='$fecha_ida', 
            fecha_vuelta='$fecha_vuelta', 
            precio='$precio', 
            descripcion='$descripcion', 
            Imagen='$imagen' 
            WHERE id_viaje=$id";

    // Ejecutamos la consulta y se ve el mensaje según el resultado
    if ($conexion->query($sql) === TRUE) {
        echo "Viaje actualizado correctamente. <a href='configActividadesViajes.php'>Volver</a>";
        exit;
    } else {
        echo "Error: " . $conexion->error;
    }
}

$sql = "SELECT * FROM viajes WHERE id_viaje=$id";
$resultado = $conexion->query($sql);
$viaje = $resultado->fetch_assoc();
?>
<head>
    <link rel="stylesheet" href="estiloviajes.css">
</head>
<body>
    <h2>Editar Viaje</h2>
    <form method="post">
        <input type="text" name="origen" value="<?= $viaje['origen'] ?>" required><br>
        <input type="text" name="destino" value="<?= $viaje['destino'] ?>" required><br>
        <input type="date" name="fecha_ida" value="<?= $viaje['fecha_ida'] ?>" required><br>
        <input type="date" name="fecha_vuelta" value="<?= $viaje['fecha_vuelta'] ?>" required><br>
        <input type="number" step="0.01" name="precio" value="<?= $viaje['precio'] ?>" required><br>
        <textarea name="descripcion"><?= $viaje['descripcion'] ?></textarea><br>
        <input type="text" name="imagen" value="<?= $viaje['Imagen'] ?>"><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
