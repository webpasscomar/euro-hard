@extends('layouts.app')

@section('content')
  <div class="main-container">
    <div class="container-hero">
      <div class="container-fluid">
        <div class="container-title-hero">
          <div class="content-icon-EH-hero">
            <img src="{{ asset('images/icono-EH.svg') }}" class="icon-EH-hero">
          </div>
          <h1 class="title-hero">Novedades</h1>
        </div>
      </div>
      <div class="img-hero">
        <div class="img-overlay"></div>
        <img src="{{ asset('img/headers/novedades.jpg') }}">
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <h5 class="title-category gris">
            Novedades - <span class="negro">Productos, ferias, institucional y más</span>
          </h5>
        </div>
      </div>
      <div class="row">
        @unless (count($novedades) > 0)
          <div class="row">
            <div class="col">
              <h1 class="my-5 text-center fs-5">No hay productos disponibles</h1>
            </div>
          </div>
        @endunless
        <div class="owl-carousel owl-theme">
          @foreach ($novedades as $novedad)
            <div class="item item1">
              <div class="row p-4">
                <div class="col-lg-6 col-md-6 p-3 content-product">
                  <div id="carouselNove1" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <!--<div class="carousel-indicators">
                                                                                                                                                      <button type="button" data-bs-target="#carouselNove1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                                                                                                                      <button type="button" data-bs-target="#carouselNove1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                                                                                                                  </div>-->
                    <div class="carousel-inner carrusel-product">
                      <div class="carousel-item active">
                        <img src="{{ $novedad->image_path }}" class="d-block w-100" alt="{{ $novedad->title }}">
                      </div>
                      {{-- <div class="carousel-item">
                                                <img src="{{ $novedad->image_path }}" class="d-block w-100"
                                                    alt="{{ $novedad->title }}">
                                            </div> --}}
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 p-3 content-product">
                  <div class="title-product">
                    {{ Str::ucfirst($novedad->title) }}
                  </div>
                  <div class="description-nove">
                    {{ Str::ucfirst(Str::limit($novedad->description, 200)) }}
                  </div>
                  {{-- <div class="content-btn-nove">
                                        <a class="btn-rojo" href="#">Ver más</a>
                                    </div> --}}
                </div>
              </div>
            </div>
          @endforeach

          {{-- <div class="item item2">
                        <div class="row p-4">
                            <div class="col-lg-6 col-md-6 p-3 content-product">
                                <div id="carouselNove2" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                    <!--<div class="carousel-indicators">
                                              <button type="button" data-bs-target="#carouselNove2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                              <button type="button" data-bs-target="#carouselNove2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                          </div>-->
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
                                    Lorem iosum dolor Sit amet. consecte. tuer adipiscing elit, sed diam nonummy non euismod
                                    tincidunt ut laoreel colore magna allquam erat volutoat Ut wisi enm ad mnm venam. aus
                                    nostuo exerci tauon ullamcomer sus cibit obortis nis ut aliquio ex ea com Ut WISI enIm
                                    ad minim veniam, quis nostrud exerci tation ullamcorper
                                </div>
                                <div class="content-btn-nove">
                                    <a class="btn-rojo" href="#">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div><!--[fin de Item 2]--> --}}

          {{-- <div class="item item3">
                        <div class="row p-4">
                            <div class="col-lg-6 col-md-6 p-3 content-product">
                                <div id="carouselNove3" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                    <!--<div class="carousel-indicators">
                                              <button type="button" data-bs-target="#carouselNove3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                              <button type="button" data-bs-target="#carouselNove3" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                          </div>-->
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
                                    Lorem iosum dolor Sit amet. consecte. tuer adipiscing elit, sed diam nonummy non euismod
                                    tincidunt ut laoreel colore magna allquam erat volutoat Ut wisi enm ad mnm venam. aus
                                    nostuo exerci tauon ullamcomer sus cibit obortis nis ut aliquio ex ea com Ut WISI enIm
                                    ad minim veniam, quis nostrud exerci tation ullamcorper
                                </div>
                                <div class="content-btn-nove">
                                    <a class="btn-rojo" href="#">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div><!--[fin de Item 3]--> --}}

          {{-- <div class="item item4">
                        <div class="row p-4">
                            <div class="col-lg-6 col-md-6 p-3 content-product">
                                <div id="carouselNove4" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                    <!--<div class="carousel-indicators">
                                              <button type="button" data-bs-target="#carouselNove4" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                              <button type="button" data-bs-target="#carouselNove4" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                          </div>-->
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
                                    Lorem iosum dolor Sit amet. consecte. tuer adipiscing elit, sed diam nonummy non euismod
                                    tincidunt ut laoreel colore magna allquam erat volutoat Ut wisi enm ad mnm venam. aus
                                    nostuo exerci tauon ullamcomer sus cibit obortis nis ut aliquio ex ea com Ut WISI enIm
                                    ad minim veniam, quis nostrud exerci tation ullamcorper
                                </div>
                                <div class="content-btn-nove">
                                    <a class="btn-rojo" href="#">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div><!--[fin de Item 4]--> --}}

        </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
  <script>
    $('.owl-carousel').owlCarousel({
      loop: false,
      margin: 20,
      nav: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 2
        }
      }
    });
  </script>
@endpush
