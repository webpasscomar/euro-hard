@extends('layouts.app')

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
          src="{{ $subcategoria->image && file_exists(public_path('storage/product_categories/'.$subcategoria->banner)) ? asset('storage/product_categories/'.$subcategoria->banner) : asset('img/Imagen-no-disponible.png') }}">
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <h5 class="title-category gris">
            <a href="{{route('home')}}" class="link-breadcrumb">Categorías </a> - <a
              href="{{route('productos.categorias',$categoria->slug)}}"
              class="link-breadcrumb">{{ Str::title($categoria->name) }}</a>
            - <span class="negro">{{ Str::title($subcategoria->name)  }}</span>
          </h5>
        </div>
      </div>
      <div class="row">
        {{--        comienzo --}}
        @forelse($productos as $producto)
          <div class="col-lg-6 p-4">
            <div class="row">
              <div class="col-lg-6 col-md-6 p-3 content-product">
                @if($producto->is_new)
                  <div class="card-new">
                    NUEVO
                  </div>
                @endif
                <div id="carouselProduct{{$loop->index +1 }}" class="carousel slide">
                  @if( !empty($producto->image_1) || !empty($producto->image_2) || !empty($producto->image_3) || !empty($producto->image_4) || !empty($producto->image_5) || !empty($producto->image_6))
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselProduct{{$loop->index + 1 }}"
                              data-bs-slide-to="0"
                              class="active"
                              aria-current="true" aria-label="Slide 0">
                      </button>
                      @for($i=1; $i<=6; $i++)
                        @if( !empty($producto->{'image_'.$i}))
                          <button type="button" data-bs-target="#carouselProduct{{$loop->index + 1 }}"
                                  data-bs-slide-to="{{$i}}"
                                  aria-current="true" aria-label="Slide {{$i}}">
                          </button>
                        @endif
                      @endfor
                    </div>
                  @endif
                  <div class="carousel-inner carrusel-product">
                    <div class="carousel-item active">
                      <img
                        src="{{ $producto->image_main && file_exists(public_path('storage/products/'. $producto->image_main)) ? asset('storage/products/'.$producto->image_main) : asset('img/no_disponible.jpg') }}"
                        class="d-block w-100" alt="{{$producto->name}}">
                    </div>
                    @for($i=1; $i<=6; $i++)
                      @if(!empty($producto->{'image_'.$i}))
                        <div class="carousel-item">
                          <img src="{{asset('storage/products/'.$producto->{'image_'.$i})}}" class="d-block w-100"
                               alt="{{$producto->name}}">
                        </div>
                      @endif
                    @endfor
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 p-3 content-product">
                <div class="title-product">
                  {{ Str::ucfirst($producto->name)}}
                </div>
                <div class="description-product">
                  {{Str::ucfirst($producto->description)}}
                </div>
                <div class="content-btn-products">
                  <a class="btn-rojo" href="{{ asset('storage/products/'.$producto->datasheet_file)}}" target="_blank">Ficha
                    técnica</a>
                  @if($producto->video)
                    <button type="button" class="btn-gris" data-bs-toggle="modal"
                            data-bs-target="#modalVideo{{$producto->id}}">Video
                    </button>
                    <x-modal-youtube :id="$producto->id" :video-url="$producto->video"/>
                  @endif
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="row">
            <div class="col">
              <h1 class="my-5 text-center fs-5">No hay productos disponibles</h1>
            </div>
          </div>
        @endforelse

      </div>
    </div>
  </div>
@endsection
