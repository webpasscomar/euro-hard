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
              class="link-breadcrumb">Cocina & Lavadero</a> - <a href="tiradoresymanijas.php"
              class="link-breadcrumb"><span class="negro">Tiradores y manijas</span></a>
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
                Espesor de pared lateral: 18 mm<br>
                Ancho mínimo de puerta: 420 mm<br>
                Capacidad de carga por bandeja: 15 Kg<br>
                Set: Estructura y 2 estantes<br>
                Material: Acero cromado y tableros
                melamínicos con terminación
                antideslizante
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 p-4 content-product-plano">
          <div class="description-product">
            Plano
          </div>
          <div class="content-img-plano-products">
            <img src="images/img-plano.png" class="img-plano-product">
          </div>
        </div>
        <div class="col-lg-6 p-4">
          <div class="row">
            <div class="col-lg-12 col-md-12 p-3 content-product">
              <div class="card-new-line">
                NUEVO
              </div>
              <div class="content-table">
                <table class="table table-details">
                  <thead>
                    <tr>
                      <th scope="col">Código EH Apertura derecha</th>
                      <th scope="col">Código EH Apertura derecha</th>
                      <th scope="col">Empaque</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="destacado">EHCNEM900DC</th>
                      <td class="destacado">EHCNEM900DC</td>
                      <td>1 set</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 p-4 content-product-plano">
          <div class="content-btn-detalle-products">
            <a class="btn-rojo" href="#"><i class="fas fa-download"></i> PDF</a>
            <a class="btn-gris" href="#">Instructivo</a>
            <a class="btn-rojo" href="#">Video</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
