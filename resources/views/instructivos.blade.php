@extends('layouts.app')

@section('content')
  <div class="main-container">
    <div class="container-hero">
      <div class="container-fluid">
        <div class="container-title-hero">
          <div class="content-icon-EH-hero">
            <img src="{{ asset('images/icono-EH-gris.svg') }}" class="icon-EH-hero">
          </div>
          <h1 class="title-hero">Instructivos</h1>
        </div>
      </div>
      <div class="img-hero">
        <div class="img-overlay"></div>
        <img src="{{ asset('img/headers/instructivos.jpg') }}">
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <h5 class="title-category gris">
            Instructivos
          </h5>
        </div>
      </div>
      <div class="row">
        @forelse($products as $product)
          <div class="col-lg-6 p-4">
            <div class="row">
              <div class="col-lg-6 col-md-6 p-3 content-product">
                <div class="content-img-instructivo">
                  <img
                    src="{{ $product->image_main && file_exists(public_path('storage/products/' . $product->image_main)) ? asset('storage/products/' . $product->image_main) : asset('img/no_disponible.jpg') }}"
                    class="d-block w-100" alt="...">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 p-3 content-product">
                <div class="title-product">
                  {{-- {{ Str::title($product->name) }} --}}
                  {{ Str::ucfirst($product->name) }}
                </div>
                <div class="description-product">
                  {{ Str::ucfirst($product->description) }}
                </div>
                <div class="content-btn-products">
                  @unless ($product->instruction_file == null)
                    <a class="btn-rojo" href="{{ asset('storage/products/' . $product->instruction_file) }}" download><i
                        class="fas fa-download"></i> PDF</a>
                  @endunless
                  @unless ($product->video == null)
                    {{-- <button type="button" class="btn-gris" data-bs-toggle="modal"
                      data-bs-target="#modalVideo{{ $product->id }}">
                      Video
                    </button>
                    <x-modal-youtube :id="$product->id" :video-url="$product->video" /> --}}


                    @if (Str::contains($product->video, ['instagram']))
                      <a href="{{ $product->video }}" class="btn-rojo" target="_blank">Video</a>
                    @else
                      <a role="button" class="btn-rojo" data-bs-toggle="modal"
                        data-bs-target="#modalVideo{{ $product->id }}">Video
                      </a>
                      <x-modal-youtube :id="$product->id" :video-url="$product->video" />
                    @endif
                  @endunless
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="row">
            <div class="col">
              <h2 class="mt-3 fs-5 text-center">No hay productos disponibles</h2>
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </div>
@endsection
