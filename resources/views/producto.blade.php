@extends('layouts.app')
@section('title', ' | ' . Str::ucfirst($producto->name))

@section('content')
    <div class="main-container">
        <div class="container-hero">
            <div class="container-fluid">
                <div class="container-title-hero">
                    <div class="content-icon-EH-hero">
                        <img src="{{ asset('images/icono-EH-gris.svg') }}" class="icon-EH-hero">
                    </div>
                    <h1 class="title-hero">{{ Str::title($subcategoria->name) }}</h1>
                </div>
            </div>
            <div class="img-hero">
                <div class="img-overlay"></div>
                <img
                    src="{{ $subcategoria->banner && file_exists(public_path('storage/product_categories/' . $subcategoria->banner)) ? asset('storage/product_categories/' . $subcategoria->banner) : asset('img/Imagen-no-disponible.png') }}">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5 class="title-category gris">
                        @if ($categoria !== 'categoria')
                            <a href="{{ route('home') }}" class="link-breadcrumb">Categorías </a> -
                            <a href="{{ route('productos.categorias', $categoria) }}"
                                class="link-breadcrumb">{{ Str::title($categoria) }}</a> - <a
                                href="{{ route('productos.list', [$categoria, $subcategoria->slug]) }}"
                                class="link-breadcrumb"><span
                                    class="negro">{{ Str::title($subcategoria->name) }}</span></a>
                        @else
                            <span class="negro">{{ Str::title($subcategoria->name) }}</span>
                        @endif
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 p-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 p-3 content-product">
                            @if ($producto->is_new)
                                <div class="card-new">
                                    NUEVO
                                </div>
                            @endif
                            <div id="carouselProduct1" class="carousel slide">
                                @unless (empty($producto->image_1))
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselProduct1" data-bs-slide-to="0"
                                            aria-current="true" aria-label="Slide 0" class="active">
                                        </button>
                                        @for ($i = 1; $i <= 6; $i++)
                                            @if (!empty($producto->{'image_' . $i}))
                                                <button type="button" data-bs-target="#carouselProduct1"
                                                    data-bs-slide-to="{{ $i }}" aria-current="true"
                                                    aria-label="Slide {{ $i }}">
                                                </button>
                                            @endif
                                        @endfor
                                    </div>
                                @endunless
                                <div class="carousel-inner carrusel-product">
                                    <div class="carousel-item active">
                                        <img src="{{ $producto->image_main && file_exists(public_path('storage/products/' . $producto->image_main)) ? asset('storage/products/' . $producto->image_main) : asset('img/no_disponible.jpg') }}"
                                            class="d-block w-100" alt="{{ $producto->name }}">
                                    </div>
                                    @for ($i = 1; $i <= 6; $i++)
                                        {{-- @if (!empty($producto->{'image_' . $i})) --}}
                                        <div class="carousel-item">
                                            <img src="{{ $producto->{'image_' . $i} && file_exists(public_path('storage/products/' . $producto->{'image_' . $i})) ? asset('storage/products/' . $producto->{'image_' . $i}) : asset('img/no_disponible.jpg') }}"
                                                class="d-block w-100" alt="{{ $producto->name }}">
                                        </div>
                                        {{-- @endif --}}
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 p-3 content-product">
                            <div class="title-product">
                                {{ Str::ucfirst($producto->name) }}
                            </div>
                            <div class="description-product">
                                {{ Str::ucfirst($producto->description) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-4 content-product-plano">
                    <div class="description-product">
                        Plano
                    </div>
                    <div class="content-img-plano-products">
                        <img src="{{ asset('images/img-plano.png') }}" class="img-plano-product">
                    </div>
                </div>
                <div class="col-lg-6 p-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 p-3 content-product">
                            @if ($producto->is_new)
                                <div class="card-new-line">
                                    NUEVO
                                </div>
                            @endif
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
                        {{-- Mostrar boton de video solo si el producto tiene una url de video --}}
                        @if ($producto->video)
                            <a role="button" class="btn-rojo" data-bs-toggle="modal"
                                data-bs-target="#modalVideo{{ $producto->id }}">Video
                            </a>
                            <x-modal-youtube :id="$producto->id" :video-url="$producto->video" />
                        @endif
                    </div>
                </div>
            </div>
            @if (count($producto->relatedProducts) > 0)
                <div class="p-3">
                    <h5 class="fw-bold my-4">Productos Relacionados</h5>
                    <table class="table table-details">
                        <thead>
                            <tr>
                                <th>Cod</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($producto->relatedProducts as $productoRelacionado)
                                <tr>
                                    <td>{{ $productoRelacionado->id }}</td>
                                    <td>{{ $productoRelacionado->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
