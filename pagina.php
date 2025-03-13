<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$servername = "localhost";
$db_username = "eric";
$db_password = "Eric123!";
$database = "Agencia_db";

$conn = new mysqli($servername, $db_username, $db_password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id_users, username, contrasenya FROM users WHERE username=? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['contrasenya'])) {
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
            exit();
        }
    }

    echo "Usuario o contraseña incorrectos.";
    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>

    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="#" method="post">
            <input type="text" placeholder="Usuario" required>
            <input type="password" placeholder="Contraseña" required>
            <input type="submit" value="Ingresar">
        </form>
    </div>

</body>
</html>
