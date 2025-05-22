<?php
// Primero, añadimos los datos para que pueda hacer una conexion a la BD y que cuando nosotros eliminemos un usuarios desde la web, también se elimine en la BD.
$host = "localhost";
$usuario = "pau";
$contrasena = "Pau123!";
$bd = "Agencia_db";
// Hacemos la conexión utilizando mysqli
$conexion = new mysqli($host, $usuario, $contrasena, $bd);
// Y verificamos con una alerta si hay un error al hacer la conexión.
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Esta parte verifica si se ha recibido la ID al hacer GET.
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

// Aqui creamos la consulta para que se elimine el usuario con la ID que hay seleccionada.
    $stmt = $conexion->prepare("DELETE FROM users WHERE id_users = ?");
    $stmt->bind_param("i", $id);
// Se ejecuta la consulta anterior.
    $stmt->execute();
// Se cierra
    $stmt->close();
}

// Por último cerramos la conexion a la BD.
$conexion->close();
// Y hacemos que nos redirija a la página de admin, la cual es "panel1.php".
header("Location: panel1.php");
exit;
