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
            Categorías - Cocina & Lavadero
          </h5>
        </div>
      </div>
      <div class="row">
        <div class="owl-carousel owl-theme">
          <div class="item item1">
            <div class="content-cat carrusel-size">
              <a href="#" class="link-mas-info">
                <div class="img-content-subcat1">
                  <div class="title-cat-column">
                    Tiradores y manijas
                  </div>
                </div>
                <div class="footer-content-cat-home">
                  <div class="cat-capitulo">
                    <span class="estilo">ESTILO</span> CAP 6
                  </div>
                  <div class="btn-mas-info">
                    + info
                  </div>
                </div>
              </a>
            </div>
          </div><!--[fin de Item 1]-->

          <div class="item item2">
            <div class="content-cat carrusel-size">
              <a href="#" class="link-mas-info">
                <div class="img-content-subcat2">
                  <div class="title-cat-column">
                    Bisagras
                  </div>
                </div>
                <div class="footer-content-cat-home">
                  <div class="cat-capitulo">
                    <span class="abertura">APERTURA</span> CAP 2
                  </div>
                  <div class="btn-mas-info">
                    + info
                  </div>
                </div>
              </a>
            </div>
          </div><!--[fin de Item 2]-->

          <div class="item item3">
            <div class="content-cat carrusel-size">
              <a href="#" class="link-mas-info">
                <div class="img-content-subcat3">
                  <div class="title-cat-column">
                    Canastería
                  </div>
                </div>
                <div class="footer-content-cat-home">
                  <div class="cat-capitulo">
                    <span class="orden">ORDEN</span> CAP 7
                  </div>
                  <div class="btn-mas-info">
                    + info
                  </div>
                </div>
              </a>
            </div>
          </div><!--[fin de Item 3]-->

          <div class="item item4">
            <div class="content-cat carrusel-size">
              <a href="#" class="link-mas-info">
                <div class="img-content-subcat4">
                  <div class="title-cat-column">
                    Cerraduras
                  </div>
                </div>
                <div class="footer-content-cat-home">
                  <div class="cat-capitulo">
                    <span class="seguridad">SEGURIDAD</span> CAP 4
                  </div>
                  <div class="btn-mas-info">
                    + info
                  </div>
                </div>
              </a>
            </div>
          </div><!--[fin de Item 4]-->

          <div class="item item5">
            <div class="content-cat carrusel-size">
              <a href="#" class="link-mas-info">
                <div class="img-content-subcat1">
                  <div class="title-cat-column">
                    5
                  </div>
                </div>
                <div class="footer-content-cat-home">
                  <div class="cat-capitulo">
                    <span class="abertura">APERTURA</span> CAP 4
                  </div>
                  <div class="btn-mas-info">
                    + info
                  </div>
                </div>
              </a>
            </div>
          </div><!--[fin de Item 5]-->

          <div class="item item6">
            <div class="content-cat carrusel-size">
              <a href="#" class="link-mas-info">
                <div class="img-content-subcat1">
                  <div class="title-cat-column">
                    6
                  </div>
                </div>
                <div class="footer-content-cat-home">
                  <div class="cat-capitulo">
                    <span class="estilo">ESTILO</span> CAP 6
                  </div>
                  <div class="btn-mas-info">
                    + info
                  </div>
                </div>
              </a>
            </div>
          </div><!--[fin de Item 6]-->

        </div>
      </div>
    </div>
  </div>
@endsection
