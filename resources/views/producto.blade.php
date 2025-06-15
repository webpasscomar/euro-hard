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
                <img src="{{ $subcategoria->banner && file_exists(public_path('storage/product_categories/' . $subcategoria->banner)) ? asset('storage/product_categories/' . $subcategoria->banner) : asset('img/Imagen-no-disponible.png') }}"
                    class="w-100 h-100">
            </div>
        </div>

        <div class="container">

            {{-- Bradcumb --}}
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
                <div class="col-lg-12 p-4">
                    <div class="row">

                        {{-- Imagen y fichas --}}
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
                                        <div class="carousel-item">
                                            <img src="{{ $producto->{'image_' . $i} && file_exists(public_path('storage/products/' . $producto->{'image_' . $i})) ? asset('storage/products/' . $producto->{'image_' . $i}) : asset('img/no_disponible.jpg') }}"
                                                class="d-block w-100" alt="{{ $producto->name }}">
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        {{-- Detalle del producto --}}
                        <div class="col-lg-6 col-md-6 p-3 content-product">
                            <div>
                                <h5 class="soporte">{{ $producto->code }}</h5>
                            </div>
                            <div class="title-product">
                                {{ Str::ucfirst($producto->name) }}
                            </div>

                            <div class="description-product">
                                <p>
                                    {{ Str::ucfirst($producto->description) }}
                                </p>

                                <h6>Material</h6>
                                <p>{{ $producto->material }}</p>
                                <h6>Colores</h6>
                                <div class="d-flex align-items-center gap-2 flex-wrap my-3">
                                    @foreach ($producto->colors as $color)
                                        <div class="rounded-circle"
                                            style="width:30px; height:30px; background-color: {{ $color->color }}; border: 2px solid #000;">

                                        </div>
                                    @endforeach
                                </div>
                                {{-- <p>
                                    @foreach ($producto->colors as $color)
                                        {{ $color->name }}@if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </p> --}}
                            </div>

                            <div class="p-4 content-product-plano">
                                <div class="content-btn-detalle-products d-flex flex-lg-row flex-column">
                                    @unless ($producto->instruction_file == null)
                                        <a class="btn-rojo d-flex justify-content-center gap-1"
                                            href="{{ asset('storage/products/' . $producto->instruction_file) }}" download><i
                                                class="fas fa-download"></i>
                                            PDF</a>
                                        <a class="btn-gris"
                                            href="{{ asset('storage/products/' . $producto->instruction_file) }}"
                                            target="_blank">Instructivo</a>
                                    @endunless
                                    {{-- Mostrar boton de video solo si el producto tiene una url de video --}}
                                    @if ($producto->video)
                                        @if (Str::contains($producto->video, ['instagram']))
                                            <a href="{{ $producto->video }}" class="btn-rojo" target="_blank">Video</a>
                                        @else
                                            <a role="button" class="btn-rojo" data-bs-toggle="modal"
                                                data-bs-target="#modalVideo{{ $producto->id }}">Video
                                            </a>
                                            <x-modal-youtube :id="$producto->id" :video-url="$producto->video" />
                                        @endif
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 p-3 content-product">
                    @if ($producto->is_new)
                        <div class="card-new-line">
                            NUEVO
                        </div>
                    @endif

                    {!! $producto->information !!}

                </div>
            </div>


            {{-- Productos relacionados si los tiene --}}
            @if (count($producto->relatedProducts) > 0)
                <div>
                    <h5 class="fw-bold my-4">Productos Relacionados</h5>
                    <table class="table table-details table-hover table-bordered" style="border-collapse:collapse;">
                        <thead>
                            <tr>
                                <th class="text-start align-middle">Código</th>
                                <th class="text-start align-middle">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($producto->relatedProducts as $productoRelacionado)
                            <tr class="related-row">
                                <td class="align-middle">
                                    <a href="{{ route('productos.detalle', [$categoria, $subcategoria->slug, $productoRelacionado->slug]) }}" class="d-block w-100 text-decoration-none">
                                        <span class="soporte">{{ $productoRelacionado->code }}</span>
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('productos.detalle', [$categoria, $subcategoria->slug, $productoRelacionado->slug]) }}" class="d-block w-100 text-decoration-none text-black">
                                        <span>{{ $productoRelacionado->name }}</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>


@endsection
