<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .imagenSlider{
            height: 400px;
        }
    </style>
</head>
<body>
  <?php
    // require("./fragmentos/header.php");

    cargaScript();
    
    if(isset($_REQUEST['Crear'])){
        insertaScript();  
    }
  ?>

    <div id="carouselWithInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="2000">
            <img src="./imagenes/Banner1.jpeg" class="d-block w-100 imagenSlider" alt="Slide 1">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./imagenes/bannerStephenKing.jpg" class="d-block w-100 imagenSlider" alt="Slide 2">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./imagenes/bannerCancion.webp" class="d-block w-100 imagenSlider" alt="Slide 3">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselWithInterval" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselWithInterval" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>

      <?php
        if(compruebaBD() == "existe")
            LibroDAO::verLibros();
      ?>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
    // require("./fragmentos/footer.php");
  ?>
</html>