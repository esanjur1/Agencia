<?php
//Conexion a la base de datos
$host = "localhost";
$usuario = "eric";
$contrasena = "Eric123!";
$bd = "Agencia_db";

$conexion = new mysqli($host, $usuario, $contrasena, $bd);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

//Consulta a la tabla de usuarios
$sql_usuarios = "SELECT * FROM users";
$resultado_usuarios = $conexion->query($sql_usuarios);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link href="estilo.css" rel="stylesheet">
</head>
<body>

<div class="encabezado">
    <div class="nombre-agencia">Panel Admin</div>
</div>

<div class="seccion-usuarios">
    <h2>Usuarios Registrados</h2>
    <div class="grid-usuarios">
        <?php
        if ($resultado_usuarios->num_rows > 0) {
            while($usuario = $resultado_usuarios->fetch_assoc()) {
                echo "<div class='tarjeta-usuario'>";
                echo "<h3>" . htmlspecialchars($usuario["username"]) . "</h3>";
                echo "<p><strong>ID:</strong> " . htmlspecialchars($usuario["id_users"]) . "</p>";
                echo "<p><strong>Contraseña:</strong> " . htmlspecialchars($usuario["contrasenya"]) . "</p>";
                echo "<p><strong>Email:</strong> " . htmlspecialchars($usuario["email"]) . "</p>";
                echo "<p><strong>Teléfono:</strong> " . htmlspecialchars($usuario["telefono"]) . "</p>";
                echo "<p><strong>Fecha de registro:</strong> " . htmlspecialchars($usuario["fecha_registro"]) . "</p>";
		echo "<a class='boton-accion' href='editar_usuario.php?id=" . $usuario["id_users"] . "'>Editar</a>";
                echo "<a class='boton-accion' href='eliminar_usuarios.php?id=" . $usuario["id_users"] ."' onclick=\"return confirm('¿Seguro que quieres eliminar a este usuario?');\">Eliminar</a>";
                echo "</div>";
            }
        } else {
            echo "<p style='color: #fff;'>No hay usuarios registrados.</p>";
        }

        $conexion->close();
        ?>
    </div>
</div>

<div style="text-align: right; margin: 20px;">
    <a href="configActividadesViajes.php" class="boton-actividades">Panel de Actividades/Viajes</a>
</div>

</body>
</html>
