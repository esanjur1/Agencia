<?php
// Primero hay que hacer una cónexion a la BD.
$conexion = new mysqli("localhost", "pau", "Pau123!", "Agencia_db");

// Esta parte verifica si se ha conectado correctamente y si no es asi, salta el mensaje de error.
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Aqui se obtiene el ID del que se esta editando.
$id = $_GET['id'];

// SI el formulario se ha enviado con POST, se actualizaran los datos del usuario.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $contrasenya = $_POST["contrasenya"];

//Este código ejecuta el comando SQL para que actualice los datos de los usuarios seleccionados. 
    $sql = "UPDATE users SET 
            username='$username', 
            email='$email', 
            telefono='$telefono', 
            contrasenya='$contrasenya' 
            WHERE id_users=$id";

// Si la consulta SQL sale bien mostrara un mensaje de que se ha completado o que no se ha podido actualizar.
    if ($conexion->query($sql) === TRUE) {
        echo "Usuario actualizado correctamente. <a href='panel1.php'>Volver</a>";
        exit;
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
}

$sql = "SELECT * FROM users WHERE id_users=$id";
$resultado = $conexion->query($sql);
$usuario = $resultado->fetch_assoc();
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estiloactividades.css">
</head>
<body>
// Se ha añadido un formulario para poder editar los campos del usuario y poder actualizar la base de datos.
<h2>Editar Usuario</h2>
<form method="post">
    <input type="text" value="<?= $usuario['id_users'] ?>" disabled><br><br>
    <input type="text" name="username" value="<?= $usuario['username'] ?>" required><br><br>
    <input type="text" name="contrasenya" value="<?= $usuario['contrasenya'] ?>" required><br><br>
    <input type="email" name="email" value="<?= $usuario['email'] ?>" required><br><br>
    <input type="text" name="telefono" value="<?= $usuario['telefono'] ?>" required><br><br>
    <input type="text" value="<?= $usuario['fecha_registro'] ?>" disabled><br><br>
// Y con este boton lo que hara es enviar los cambios y aplicarlos tanto en la página web como en la BD.
    <button type="submit">Actualizar</button>
</form>
</body>
