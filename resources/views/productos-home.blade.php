@extends('layouts.app')

@section('content')
  <div class="main-container">
    <div class="container-hero">
      <div class="container-fluid">
        <div class="container-title-hero">
          <div class="content-icon-EH-hero">
            <img src="{{ asset('img/icono-EH-gris.svg') }}" class="icon-EH-hero">
          </div>
          <h1 class="title-hero">Herrajes y accesorios</h1>
        </div>
      </div>
      <div class="img-hero">
        <div class="img-overlay"></div>
        <img src="{{ asset('img/headers/productos.jpg') }}">
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <h5 class="title-category gris">
            <span class="link-breadcrumb">Productos</span>
          </h5>
        </div>
      </div>
      {{-- Carousel categorias padre --}}
      <div class="row">
        <div class="owl-carousel owl-theme">
          @foreach ($categoriasPadre as $categoria)
            @php
              $imagePath =
                  $categoria->image && file_exists(public_path('storage/product_categories/' . $categoria->image))
                      ? asset('storage/product_categories/' . $categoria->image)
                      : asset('img/no_disponible.jpg');
            @endphp
            <div class="item item1">
              <div class="content-cat carrusel-size">
                <a href="{{ route('productos.categorias', [$categoria->slug]) }}" class="link-mas-info">
                  <div class="img-content-cat" style="background-image: url('{{ $imagePath }}')">
                    <div class="title-cat-column" style="background-color: {{ $categoria->color }}">
                      {{ $categoria->name }}
                    </div>
                  </div>
                  <div class="footer-content-cat-home">
                    <div class="cat-capitulo">
                      <span class="estilo">{{ $categoria->feature }}</span>
                      {{-- <span class="estilo">{{$categoria->unit}}</span> --}}
                    </div>
                    <div class="btn-mas-info">
                      + info
                    </div>
                  </div>
                </a>
              </div>
            </div>
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
          items: 2
        },
        1000: {
          items: 2
        }
      }
    });
  </script>
@endpush
