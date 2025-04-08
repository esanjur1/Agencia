<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: pagina.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Agencia de Viajes - MundoAventura</title>
  <link rel="stylesheet" href="principal.css" />
</head>
<body>
  <header class="encabezado">
    <div class="nombre-agencia">🌍 Mundo Aventura</div>
  </header>

  <section class="seccion-viajes">
    <h2>Viajes</h2>
    <div class="galeria-experiencias">
      <div class="tarjeta-viaje">
        <img src="PiramidesViajes.webp" alt="Egipto">
        <h3>El Cairo, Egipto</h3>
        <p>Viaje de 1 semana hacia el Cairo con la compañía Iberia</p>
        <span class="costo">Precio: 750€</span>
        <a href="#" class="boton-aplicacion">Aplicar</a>
      </div>

      <div class="tarjeta-viaje">
        <img src="ParisTorre.avif" alt="Francia">
        <h3>París, Francia</h3>
        <p>Viaje de 4 días hacia París con la compañía Ryanair</p>
        <span class="costo">Precio: 120€</span>
        <a href="#" class="boton-aplicacion">Aplicar</a>
      </div>

      <div class="tarjeta-viaje">
        <img src="JohannesburgoSud.webp" alt="Sudáfrica">
        <h3>Johannesburgo, Sudáfrica</h3>
        <p>Viaje de 5 días hacia Johannesburgo con la compañía Vueling</p>
        <span class="costo">Precio: 1300€</span>
        <a href="#" class="boton-aplicacion">Aplicar</a>
      </div>

      <div class="tarjeta-viaje">
        <img src="CuscoPeru.webp" alt="Perú">
        <h3>Cusco, Perú</h3>
        <p>Viaje de 10 días hacia Cusco con la compañía Level</p>
        <span class="costo">Precio: 889€</span>
        <a href="#" class="boton-aplicacion">Aplicar</a>
      </div>

      <div class="tarjeta-viaje">
        <img src="Beijing.webp" alt="China">
        <h3>Beijing, China</h3>
        <p>Viaje de 14 días hacia Beijing con la compañía Qatar Airways</p>
        <span class="costo">Precio: 1300€</span>
        <a href="#" class="boton-aplicacion">Aplicar</a>
      </div>
    </div>
  </section>
