@extends('layouts.app')

@section('content')
  <div class="main-container">
    <div class="container-hero">
      <div class="container-fluid">
        <div class="container-title-hero">
          <div class="content-icon-EH-hero">
            <img src="images/icono-EH.svg" class="icon-EH-hero">
          </div>
          <h1 class="title-hero">Novedades</h1>
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
            Novedades - <span class="negro">Productos, Ferias, institucional y mas</span>
          </h5>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 p-4">
          <div class="row">
            <div class="col-lg-6 col-md-6 p-3 content-product">
              <div id="carouselNove1" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselNove1" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselNove1" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner carrusel-product">
                  <div class="carousel-item active">
                    <img src="images/nove-01.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/nove-03.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 p-3 content-product">
              <div class="title-product">
                Linea NEGRA de productos
              </div>
              <div class="description-nove">
                Lorem iosum dolor Sit amet. consecte. tuer adipiscing elit, sed diam nonummy non euismod tincidunt ut
                laoreel colore magna allquam erat volutoat Ut wisi enm ad mnm venam. aus nostuo exerci tauon ullamcomer
                sus cibit obortis nis ut aliquio ex ea com Ut WISI enIm ad minim veniam, quis nostrud exerci tation
                ullamcorper
              </div>
              <div class="content-btn-nove">
                <a class="btn-rojo" href="#">Ver más</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 p-4">
          <div class="row">
            <div class="col-lg-6 col-md-6 p-3 content-product">
              <div id="carouselNove2" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselNove2" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselNove2" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner carrusel-product">
                  <div class="carousel-item active">
                    <img src="images/nove-02.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/nove-04.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 p-3 content-product">
              <div class="title-product">
                Particinamos en Fitecma
              </div>
              <div class="description-nove">
                Lorem iosum dolor Sit amet. consecte. tuer adipiscing elit, sed diam nonummy non euismod tincidunt ut
                laoreel colore magna allquam erat volutoat Ut wisi enm ad mnm venam. aus nostuo exerci tauon ullamcomer
                sus cibit obortis nis ut aliquio ex ea com Ut WISI enIm ad minim veniam, quis nostrud exerci tation
                ullamcorper
              </div>
              <div class="content-btn-nove">
                <a class="btn-rojo" href="#">Ver más</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
