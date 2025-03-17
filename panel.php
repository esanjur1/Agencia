<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $servername = "localhost";
    $dbname = "Agencia_db";
    $dbuser = "eric";
    $dbpass = "Eric123!";
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

    include 'Agencia_db1.php';

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT id_admin, username, contrasenya FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['contrasenya'])) {
            $_SESSION['user_id'] = $row['id_admin'];
            $_SESSION['username'] = $row['username'];

            echo "Redirigiendo a panel1.php...";
            header("Location: panel1.php");
            exit();
        } else {
            $error = "Contraseña incorrecta";
            echo $error;
        }
    } else {
        $error = "Usuario no encontrado";
        echo $error;
    }

    $conn->close();
}
<?

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración Básico</title>
    <link href="panel.css" rel="stylesheet">
</head>
<body>

    <div class="sidebar">
        <h2>Admin</h2>
        <a href="#">Inicio</a>
        <a href="#">Usuarios</a>
        <a href="#">Ajustes</a>
        <a href="logout.php">Cerrar Sesión</a>
    </div>

    <div class="main">
        <h1>Bienvenido al Panel</h1>

        <div class="box">
            <h3>Configuración</h3>
            <p>Desde aquí podrás cambiar la configuración de tu sitio.</p>
        </div>
    </div>

</body>
</html>
