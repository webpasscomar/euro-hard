@extends('layouts.app')

@section('content')
  <div class="main-container">
    <div class="container-hero">
      <div class="container-fluid">
        <div class="container-title-hero">
          <div class="content-icon-EH-hero">
            <img src="images/icono-EH-gris.svg" class="icon-EH-hero">
          </div>
          <h1 class="title-hero">Herrajes y accesorios</h1>
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
            <span class="link-breadcrumb">Productos</span>
          </h5>
        </div>
      </div>
      {{-- Carousel subcategorias --}}
      <div class="row">
        <div class="owl-carousel owl-theme">
          @foreach ($subcategorias as $subcategoria)
            @php
              $imagePath =
                  $subcategoria->image && file_exists(public_path('storage/product_categories/' . $subcategoria->image))
                      ? asset('storage/product_categories/' . $subcategoria->image)
                      : asset('img/no_disponible.jpg');
            @endphp
            <div class="item item1">
              <div class="content-cat carrusel-size">
                <a href="{{ route('productos.subcategoria', [$subcategoria->slug]) }}" class="link-mas-info">
                  <div class="img-content-subcat" style="background-image: url({{ $imagePath }})">
                    <div class="title-cat-column" style="background-color: {{ $subcategoria->color }}">
                      {{ $subcategoria->name }}
                    </div>
                  </div>
                  <div class="footer-content-cat-home">
                    <div class="cat-capitulo">
                      <span class="estilo">{{ $subcategoria->feature }}</span>
                      {{-- <span class="estilo">{{$subcategoria->unit}}</span> --}}
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
          items: 4
        }
      }
    });
  </script>
@endpush
