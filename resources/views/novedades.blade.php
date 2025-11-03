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
          <div class="item">
              <div class="row p-4">
                <div class="col-lg-6 col-md-6 p-3 content-product">
                  <div id="carouselNove1" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner carrusel-product">
                      <div class="carousel-item active">
                        <img src="{{ $novedad->image_path }}" class="d-block w-100" alt="{{ $novedad->title }}">
                      </div>
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
                  <div class="content-btn-nove">
                      <a class="btn-gris2" data-bs-toggle="modal" data-bs-target="#modalNovedades{{ $novedad->id }}">Ver más</a>
                  </div>
                </div>
              </div>

            </div>
          @endforeach
        </div>
        
        {{-- Utilizar el componente modal para mostrar el detalle de las novedades según sea necesario --}}
        @foreach ($novedades as $novedad)
          <x-modal-novedades  id="{{$novedad->id}}" title="{{ $novedad->title }}" description="{{ $novedad->description }}" image="{{ $novedad->image_path }}"/>
        @endforeach


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
