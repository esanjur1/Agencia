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

  <section class="seccion-viajes">
    <h2>Actividades</h2>
    <div class="galeria-experiencias">
      <div class="tarjeta-viaje">
        <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/18/57/1d/67/caption.jpg?w=1200&h=-1&s=1" alt="Pirámides">
        <h3>Tour por las pirámides</h3>
        <p>Visita guiada por las pirámides de Giza</p>
        <span class="costo">Precio: 120€</span>
        <a href="#" class="boton-aplicacion">Aplicar</a>
      </div>

      <div class="tarjeta-viaje">
        <img src="https://media-cdn.tripadvisor.com/media/attractions-splice-spp-674x446/13/4c/6a/1b.jpg" alt="Torre Eiffel">
        <h3>Tour por la Torre Eiffel</h3>
        <p>Visita a la Torre Eiffel y paseo por el río Sena</p>
        <span class="costo">Precio: 90€</span>
        <a href="#" class="boton-aplicacion">Aplicar</a>
      </div>

      <div class="tarjeta-viaje">
        <img src="https://www.hola.com/horizon/original_aspect_ratio/7d30aeb026fa-madikwe-rn3bkp-a.jpg" alt="Safari">
        <h3>Safari en Sudáfrica</h3>
        <p>Safari para observar la fauna africana</p>
        <span class="costo">Precio: 500€</span>
        <a href="#" class="boton-aplicacion">Aplicar</a>
      </div>

      <div class="tarjeta-viaje">
        <img src="https://image-tc.galaxy.tf/wijpeg-7ellqz2uqv2l9plk30futx9jr/experiencias-machu-picchu_wide.jpg?crop=0%2C63%2C1200%2C675" alt="Machu Picchu">
        <h3>Machu Picchu</h3>
        <p>Caminata hasta la ciudadela de Machu Picchu</p>
        <span class="costo">Precio: 150€</span>
        <a href="#" class="boton-aplicacion">Aplicar</a>
      </div>

      <div class="tarjeta-viaje">
        <img src="https://img.static-kl.com/images/media/E5F5918C-9435-4CE6-9775780B48F3C39D" alt="Gran Muralla China">
        <h3>Gran Muralla China</h3>
        <p>Explora la Gran Muralla China en un recorrido guiado</p>
        <span class="costo">Precio: 80€</span>
        <a href="#" class="boton-aplicacion">Aplicar</a>
      </div>
    </div>
  </section>

  <footer class="pie-pagina">
    <p>&copy; 2025 MundoAventura. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
