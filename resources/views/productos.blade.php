@extends('layouts.app')

@section('content')
  <div class="main-container">
    <div class="container-hero">
      <div class="container-fluid">
        <div class="container-title-hero">
          <div class="content-icon-EH-hero">
            <img src="images/icono-EH-gris.svg" class="icon-EH-hero">
          </div>
          <h1 class="title-hero">Cocina & Lavadero</h1>
        </div>
      </div>
      <div class="img-hero">
        <div class="img-overlay"></div>
        <img src="images/slider-home-3.jpg">
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <h5 class="title-category gris">
            <a href="productos.php" class="link-breadcrumb">Categorías </a> - <a href="cocina&lavadero.php"
              class="link-breadcrumb">Cocina & Lavadero</a> - <span class="negro">Tiradores y manijas</span>
          </h5>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 p-4">
          <div class="row">
            <div class="col-lg-6 col-md-6 p-3 content-product">
              <div class="card-new">
                NUEVO
              </div>
              <div id="carouselProduct1" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselProduct1" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselProduct1" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner carrusel-product">
                  <div class="carousel-item active">
                    <img src="images/product-01.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/product-02.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 p-3 content-product">
              <div class="title-product">
                Tirador de aluminio 006
              </div>
              <div class="description-product">
                Rosca 5/32¨.<br>
                Incluye tornillos de fijación.<br>
                Material: aluminio anodizado mate
                / aluminio negro mate.
              </div>
              <div class="content-btn-products">
                <a class="btn-rojo" href="producto-001.php">Ficha técnica</a>
                <a class="btn-gris" href="#">Video</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 p-4">
          <div class="row">
            <div class="col-lg-6 col-md-6 p-3 content-product">
              <div class="card-new">
                NUEVO
              </div>
              <div id="carouselProduct2" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselProduct2" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselProduct2" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner carrusel-product">
                  <div class="carousel-item active">
                    <img src="images/product-02.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/product-03.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 p-3 content-product">
              <div class="title-product">
                Tirador de aluminio 007
              </div>
              <div class="description-product">
                Rosca 5/32¨.<br>
                Incluye tornillos de fijación.<br>
                Material: aluminio anodizado mate
                / aluminio negro mate.
              </div>
              <div class="content-btn-products">
                <a class="btn-rojo" href="#">Ficha técnica</a>
                <a class="btn-gris" href="#">Video</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 p-4">
          <div class="row">
            <div class="col-lg-6 col-md-6 p-3 content-product">
              <div class="card-new">
                NUEVO
              </div>
              <div id="carouselProduct3" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselProduct3" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselProduct3" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner carrusel-product">
                  <div class="carousel-item active">
                    <img src="images/product-03.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/product-02.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 p-3 content-product">
              <div class="title-product">
                Tirador de aluminio 008
              </div>
              <div class="description-product">
                Rosca 5/32¨.<br>
                Incluye tornillos de fijación.<br>
                Material: aluminio anodizado mate
                / aluminio negro mate.
              </div>
              <div class="content-btn-products">
                <a class="btn-rojo" href="#">Ficha técnica</a>
                <a class="btn-gris" href="#">Video</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 p-4">
          <div class="row">
            <div class="col-lg-6 col-md-6 p-3 content-product">
              <div class="card-new">
                NUEVO
              </div>
              <div id="carouselProduct4" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselProduct4" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselProduct4" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner carrusel-product">
                  <div class="carousel-item active">
                    <img src="images/product-04.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/product-03.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 p-3 content-product">
              <div class="title-product">
                Tirador de aluminio 010
              </div>
              <div class="description-product">
                Rosca 5/32¨.<br>
                Incluye tornillos de fijación.<br>
                Material: aluminio anodizado mate
                / aluminio negro mate.
              </div>
              <div class="content-btn-products">
                <a class="btn-rojo" href="#">Ficha técnica</a>
                <a class="btn-gris" href="#">Video</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
