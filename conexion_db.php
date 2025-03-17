<?php
$serverName="localhost";
$userName="eric";
$password="Eric123!";
$database="Agencia_db";

$conn = new mysqli($serverName, $userName, $password, $database);

if ($conn->connect_error) {
	die("Conexión fallida", $conn->connect_error);
} else {}
?>
