
<div id="carouselWithInterval" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="2000">
          <img src="<?php echo IMG.'Banner1.jpeg' ?>" class="d-block w-100 imagenSlider" alt="Slide 1">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="<?php echo IMG.'bannerCancion.webp' ?>" class="d-block w-100 imagenSlider" alt="Slide 2">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="<?php echo IMG.'bannerStephenKing.jpg' ?>" class="d-block w-100 imagenSlider" alt="Slide 3">
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

if(!empty($mensaje)){
  echo "<h1>".$mensaje."</h1>";
}


  if(isset($_REQUEST['isbn']) && sesioniniciada())
    $_SESSION['usuario']->carrito = $_REQUEST['isbn'];
  else if(isset($_REQUEST['vaciar']))
    $_SESSION['usuario']['carrito'] = "";

  if(empty($_SESSION['usuario'])){
    echo '<div class="container mt-5 text-center">';
    echo '<h1 class="mb-4">Debes iniciar sesión para comprar</h1></div>';
  }else if(!empty($_SESSION['usuario']->carrito)){
    muestraCarrito();
  }else{
    echo '<div class="container mt-5 text-center">';
    echo '<h1 class="mb-4">Tu carrito está vacío</h1></div>';
  }

    ?>