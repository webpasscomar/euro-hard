@extends('layouts.app')

@section('content')
<div class="main-container">
  <div class="container-hero">
    <div class="container-fluid">
      <div class="container-title-hero">
        <div class="content-icon-EH-hero">
          <img src="{{ asset('images/icono-EH.svg') }}" class="icon-EH-hero">
        </div>
        <h1 class="title-hero">Catálogos</h1>
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
          Catálogo - <span class="negro">Mueble, Obra y Completo</span>
        </h5>
      </div>
    </div>
    <div class="row g-4">
      @php
      $total = $catalogos->count();
      $col = $total % 2 == 0 ? 6 : 4; // 2 columnas si es par, 3 si es impar
      @endphp
      @forelse ($catalogos as $catalogo)

      <div class="col-md-{{ $col }} mb-4">

        <div class="catalogo-card">
          <div class="catalogo-img-wrapper">

            <img src="{{ asset('storage/' . $catalogo->image) }}"
              alt="{{ $catalogo->title }}"
              class="img-fluid catalogo-img">
            <div class="catalogo-overlay">
              <a href="{{ route('catalogos.show', $catalogo->slug) }}"
                  class="btn btn-light">
                  Ver catálogo
              </a>
            </div>
          </div>
        </div>
      </div>

      @empty

      <div class="col-12 text-center">
        <h5 class="my-5">No hay catálogos disponibles</h5>
      </div>

      @endforelse

    </div>

  </div>
</div>
@endsection
