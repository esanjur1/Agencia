<?php
$servername = "localhost";
$username = "Eric";
$password = "Eric123!";
$database = "Agencia_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connexió fallida: " . $conn->connect_error);
} else {
    echo "Connexió a la base de dades correcta";
}

$conn->close();
?>
