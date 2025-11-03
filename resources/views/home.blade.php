@extends('layouts.app')

@section('content')
    <div class="main-container">
        <div class="container-slider">
            <div id="carouselExampleAutoplaying" class="carousel slide mb-6" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @for ($i = 0; $i < count($sliders); $i++)
                        <button type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}" aria-current="true"
                            aria-label="Slide {{ $i }}">
                        </button>
                    @endfor
                    {{--          <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" --}}
                    {{--                  aria-label="Slide 2"></button> --}}
                    {{--          <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" --}}
                    {{--                  aria-label="Slide 3"></button> --}}
                    {{--          <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="3" --}}
                    {{--                  aria-label="Slide 4"></button> --}}
                </div>
                <div class="carousel-inner">
                    {{-- <div class="carousel-item active" data-bs-interval="5000">
            <div style="background: url(images/slider-home-1.jpg);" class="bd-placeholder-img"
              xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice"
              focusable="false">
              <div class="img-overlay"></div>
            </div>
            <div class="container-fluid">
              <div class="carousel-caption text-start carousel-content-info">
                <div class="content-icon-EH">
                  <img src="images/icono-EH.svg" class="icon-EH">
                </div>
                <h1 class="title-carrusel">Lanzamiento</h1>
              </div>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <div style="background: url(images/slider-home-2.jpg);" class="bd-placeholder-img"
              xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice"
              focusable="false">
              <div class="img-overlay"></div>
            </div>
            <div class="container">
              <div class="carousel-caption text-start carousel-content-info">
                <div class="content-icon-EH">
                  <img src="images/icono-EH.svg" class="icon-EH">
                </div>
                <h1 class="title-carrusel">Cocinas</h1>
              </div>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <div style="background: url(images/slider-home-3.jpg);" class="bd-placeholder-img"
              xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice"
              focusable="false">
              <div class="img-overlay"></div>
            </div>
            <div class="container">
              <div class="carousel-caption text-start carousel-content-info">
                <div class="content-icon-EH">
                  <img src="images/icono-EH.svg" class="icon-EH">
                </div>
                <h1 class="title-carrusel">Novedades</h1>
              </div>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <div style="background: url(images/slider-home-4.jpg);" class="bd-placeholder-img"
              xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice"
              focusable="false">
              <div class="img-overlay"></div>
            </div>
            <div class="container">
              <div class="carousel-caption text-start carousel-content-info">
                <div class="content-icon-EH">
                  <img src="images/icono-EH.svg" class="icon-EH">
                </div>
                <h1 class="title-carrusel">Living</h1>
              </div>
            </div>
          </div> --}}
                    @foreach ($sliders as $slider)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="5000">
                            <div style="background: url({{ $slider->image && file_exists(public_path('storage/galleries/' . $slider->image)) ? asset('storage/galleries/' . $slider->image) : asset('img/Imagen-no-disponible.png') }});"
                                class="bd-placeholder-img" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <div class="img-overlay"></div>
                            </div>
                            <div class="container">
                                <img src="{{ asset('storage/galleries/' . $slider->image) }}" alt="{{ $slider->title }}">
                                <div class="carousel-caption text-start carousel-content-info">
                                    <div class="content-icon-EH-hero">
                                        <img src="{{ asset('images/icono-EH.svg') }}" class="icon-EH-hero">
                                    </div>
                                    <h1 class="title-carrusel">{{ Str::title($slider->title) }}</h1>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                                                                                                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                                                                      <span class="visually-hidden">Previous</span>
                                                                                                                  </button>
                                                                                                                  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                                                                                                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                                                                      <span class="visually-hidden">Next</span>
                                                                                                                  </button>-->
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5 class="title-category gris">
                        Categorías
                    </h5>
                </div>
            </div>
            <div class="row">
                @foreach ($categoriasPadre as $categoria)
                    @php
                        $categoriaImage =
                            $categoria->image &&
                            file_exists(public_path('storage/product_categories/' . $categoria->image))
                                ? asset('storage/product_categories/' . $categoria->image)
                                : asset('img/no_disponible.jpg');
                    @endphp
                    <div class="col-lg-3 col-md-6 col-sm-12 p-3">
                        <div class="content-cat">
                            {{-- {{ route('noticia.show', [$noticia->categoria->slug, $noticia->slug]) }} --}}
                            @if ($categoria->slug == 'novedades')
                                <a href="{{ $categoria->slug }}" class="link-mas-info">
                                @else
                                    <a href="{{ route('productos.categorias', [$categoria->slug]) }}"
                                        class="link-mas-info">
                            @endif
                            {{-- <a href="{{ route('productos.categorias', [$categoria->slug]) }}" class="link-mas-info"> --}}
                            <div class="img-content-cat" style="background-image: url({{ $categoriaImage }})">
                                <div class="title-cat-column" style="background: {{ $categoria->color }}">
                                    {{ $categoria->name }}
                                </div>
                            </div>
                            <div class="footer-content-cat-home">
                                <div class="color-cat">
                                    @foreach ($categoria->children as $categoria)
                                        <div class="cat-color-line" style="background: {{ $categoria->color }}"></div>
                                    @endforeach
                                    {{-- <div class="cat-color-line-soporte"></div>
                                        <div class="cat-color-line-conexion"></div>
                                        <div class="cat-color-line-productividad"></div> --}}
                                </div>
                                <div class="btn-mas-info">
                                    + info
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-3 col-md-6 col-sm-12 p-3">
          <div class="content-cat">
            <a href="cocina&lavadero.php" class="link-mas-info">
              <div class="img-content-cat1">
                <div class="title-cat-column">
                  Cocina & Lavadero
                </div>
              </div>
              <div class="footer-content-cat-home">
                <div class="color-cat">
                  <div class="cat-color-line-soporte"></div>
                  <div class="cat-color-line-abertura"></div>
                  <div class="cat-color-line-seguridad"></div>
                  <div class="cat-color-line-simpleza"></div>
                  <div class="cat-color-line-conexion"></div>
                  <div class="cat-color-line-estilo"></div>
                </div>
                <div class="btn-mas-info">
                  + info
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 p-3">
          <div class="content-cat">
            <a href="/productos/categorias" class="link-mas-info">
              <div class="img-content-cat2">
                <div class="title-cat-column">
                  Living
                </div>
              </div>
              <div class="footer-content-cat-home">
                <div class="color-cat">
                  <div class="cat-color-line-soporte"></div>
                  <div class="cat-color-line-abertura"></div>
                  <div class="cat-color-line-estilo"></div>
                  <div class="cat-color-line-practicidad"></div>
                </div>
                <div class="btn-mas-info">
                  + info
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 p-3">
          <div class="content-cat">
            <a href="#" class="link-mas-info">
              <div class="img-content-cat3">
                <div class="title-cat-column">
                  Dormitorio
                </div>
              </div>
              <div class="footer-content-cat-home">
                <div class="color-cat">
                  <div class="cat-color-line-soporte"></div>
                  <div class="cat-color-line-orden"></div>
                  <div class="cat-color-line-adaptabilidad"></div>
                  <div class="cat-color-line-confianza"></div>
                </div>
                <div class="btn-mas-info">
                  + info
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 p-3">
          <div class="content-cat">
            <a href="#" class="link-mas-info">
              <div class="img-content-cat4">
                <div class="title-cat-column">
                  Novedades
                </div>
              </div>
              <div class="footer-content-cat-home">
                <div class="color-cat">
                  <div class="cat-color-line-soporte"></div>
                  <div class="cat-color-line-conexion"></div>
                  <div class="cat-color-line-productividad"></div>
                </div>
                <div class="btn-mas-info">
                  + info
                </div>
              </div>
            </a>
          </div>
        </div> --}}
            </div>
        </div>
    </div>
@endsection
