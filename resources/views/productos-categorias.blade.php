@extends('layouts.app')

@section('content')
    <div class="main-container">

        {{-- Imagen de encabezado --}}
        <div class="container-hero" style="height: 480px;">
            <div class="container-fluid">
                <div class="container-title-hero">
                    <div class="content-icon-EH-hero">
                        <img src="{{ asset('images/icono-EH-gris.svg') }}" class="icon-EH-hero">
                    </div>
                    <h1 class="title-hero">{{ Str::title($categoria->name) }}</h1>
                </div>
            </div>
            <div class="img-hero">
                <div class="img-overlay"></div>
                <img src="{{ $categoria->banner && file_exists(public_path('storage/product_categories/' . $categoria->banner)) ? asset('storage/product_categories/' . $categoria->banner) : asset('img/no_disponible.jpg') }}"
                    class="w-100 h-100">
            </div>
        </div>


        <div class="container">

            <div class="row">
                <div class="col">
                    <h5 class="title-category gris">
                        <a href="{{ route('home') }}" class="link-breadcrumb">Categorias</a> - <span
                            class="negro">{{ Str::title($categoria->name) }}</span>
                    </h5>
                </div>
            </div>

            @if ($subcategorias->count() > 0)
                <div class="row mb-5">
                    <div class="owl-carousel owl-theme">
                        @foreach ($subcategorias as $subcategoria)
                            @php
                                $imagePath =
                                    $subcategoria->image &&
                                    file_exists(public_path('storage/product_categories/' . $subcategoria->image))
                                        ? asset('storage/product_categories/' . $subcategoria->image)
                                        : asset('img/no_disponible.jpg');
                            @endphp
                            <div class="item item1">
                                <div class="content-cat carrusel-size">
                                    <a href="{{ route('productos.list', [$categoria->slug, $subcategoria->slug]) }}"
                                        class="link-mas-info">
                                        <div class="img-content-subcat" style="background-image: url({{ $imagePath }})">
                                            <div class="title-cat-column"
                                                style="background-color: {{ $subcategoria->color }}">
                                                {{ $subcategoria->name }}
                                            </div>
                                        </div>
                                        <div class="footer-content-cat-home">
                                            <div class="cat-capitulo">
                                                <span class="estilo">{{ Str::ucfirst($subcategoria->feature) }}</span>
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
            @endif

            @if ($productos->count() > 0)
                <div class="row">
                    @foreach ($productos as $producto)
                        <div class="col-lg-6 p-4">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 p-3 content-product">
                                    @if ($producto->is_new)
                                        <div class="card-new">
                                            NUEVO
                                        </div>
                                    @endif
                                    <div id="carouselProduct{{ $loop->index }}" class="carousel slide">
                                        @if (
                                            !empty($producto->image_1) ||
                                                !empty($producto->image_2) ||
                                                !empty($producto->image_3) ||
                                                !empty($producto->image_4) ||
                                                !empty($producto->image_5) ||
                                                !empty($producto->image_6))
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselProduct{{ $loop->index }}"
                                                    data-bs-slide-to="0" class="active" aria-current="true"
                                                    aria-label="Slide 0">
                                                </button>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    @if (!empty($producto->{'image_' . $i}))
                                                        <button type="button"
                                                            data-bs-target="#carouselProduct{{ $loop->index }}"
                                                            data-bs-slide-to="{{ $i }}" aria-current="true"
                                                            aria-label="Slide {{ $i }}">
                                                        </button>
                                                    @endif
                                                @endfor
                                            </div>
                                        @endif
                                        <div class="carousel-inner carrusel-product">
                                            <div class="carousel-item active">
                                                <img src="{{ $producto->image_main && file_exists(public_path('storage/products/' . $producto->image_main)) ? asset('storage/products/' . $producto->image_main) : asset('img/no_disponible.jpg') }}"
                                                    class="d-block w-100" alt="{{ $producto->name }}">
                                            </div>
                                            @for ($i = 1; $i <= 6; $i++)
                                                <div class="carousel-item">
                                                    <img src="{{ $producto->{'image_' . $i} && file_exists(public_path('storage/products/' . $producto->{'image_' . $i})) ? asset('storage/products/' . $producto->{'image_' . $i}) : asset('img/no_disponible.jpg') }}"
                                                        class="d-block w-100" alt="{{ $producto->name }}">
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 p-3 content-product">
                                    <div class="title-product">
                                        {{ Str::ucfirst($producto->name) }}
                                    </div>
                                    <div class="description-product">
                                        {{ Str::ucfirst(Str::limit($producto->description, 125)) }}
                                    </div>
                                    <div class="content-btn-products">
                                        <a class="btn-gris2"
                                            href="{{ route('productos.detalle', [$categoria->slug, $producto->categories()->where('categories.id', '!=', $categoria->id)->first()?->slug ?? $categoria->slug, $producto->slug]) }}">Ficha
                                            técnica</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if ($subcategorias->count() == 0 && $productos->count() == 0)
                <div class="row">
                    <div class="col text-center my-5">
                        <h1 class="fs-5">No hay contenido disponible</h1>
                    </div>
                </div>
            @endif
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
