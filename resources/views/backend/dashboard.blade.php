@extends('layouts.adminlte')
@section('subtitle', 'Dashboard')

@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Dashboard')

@section('content_body')
  <div class="container-fluid mt-4">
    {{--    ADMINISTRACION --}}
    <div class="row mb-4">
      <h4 class="mb-3">Administración</h4>

      {{--      Usuario --}}
      <div class="col-md-3 col-12">
        <div class="small-box bg-blue-500 text-white">
          <div class="inner">
            <h3>{{ $contadores['users'] }}</h3>
            <h5>Usuarios</h5>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.users.index') }}" class="small-box-footer">Más info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      {{--      Datos Contacto --}}
      {{-- <div class="col-md-3 col-12">
        <div class="small-box bg-red-500 text-white">
          <div class="inner">
            <h3>0</h3>
            <h5>Datos Contacto</h5>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.contacts.index') }}" class="small-box-footer">Más info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> --}}

      {{--      Empresa --}}
      {{-- <div class="col-md-3 col-12">
        <div class="small-box bg-purple-500 text-white">
          <div class="inner">
            <h3>0</h3>
            <h5>Empresa</h5>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.company.index') }}" class="small-box-footer">Más info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> --}}

      {{--  Galería / Slide --}}
      <div class="col-md-3 col-12">
        <div class="small-box bg-green-500 text-white">
          <div class="inner">
            <h3>{{ $contadores['sliders'] }}</h3>
            <h5>Galería / Slide</h5>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.galleries.index') }}" class="small-box-footer">Más info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      {{--      Novedades --}}
      <div class="col-md-3 col-12">
        <div class="small-box bg-fuchsia-500 text-white">
          <div class="inner">
            <h3>{{ $contadores['novelties'] }}</h3>
            <h5>Novedades</h5>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.novelties.index') }}" class="small-box-footer">Más info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>
    {{--    SHOWROOM --}}
    <div class="row mb-4">
      <h4 class="mb-3">Showroom & Difusión</h4>

      {{--      Colores --}}
      <div class="col-md-3 col-12">
        <div class="small-box bg-cyan-500 text-white">
          <div class="inner">
            <h3>{{ $contadores['colors'] }}</h3>
            <h5>Colores</h5>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.colors.index') }}" class="small-box-footer">Más info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      {{--  categorias - ( Ambientes y Capítulos ) --}}
      <div class="col-md-3 col-12">
        <div class="small-box bg-pink-500 text-white">
          <div class="inner">
            <h3>{{ $contadores['categories'] }}</h3>
            <h5>Ambientes & Capítulos</h5>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.productCategory.index') }}" class="small-box-footer">Más info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      {{--      productos --}}
      <div class="col-md-3 col-12">
        <div class="small-box bg-orange-500 text-white">
          <div class="inner">
            <h3>{{ $contadores['products'] }}</h3>
            <h5>Productos</h5>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.products.index') }}" class="small-box-footer">Más info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>



    </div>

    {{--    DIFUSION --}}
    <div class="row mb-4">
      {{-- <h4 class="mb-3">Difusión</h4> --}}

      {{--      Cátalogo --}}
      {{-- <div class="col-md-3 col-12">
        <div class="small-box bg-orange-500 text-white">
          <div class="inner">
            <h3>0</h3>
            <h5>Cátalogo</h5>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.catalogs.index') }}" class="small-box-footer">Más info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> --}}



      {{--      Suscriptores --}}
      {{-- <div class="col-md-3 col-12">
        <div class="small-box bg-teal-500 text-white">
          <div class="inner">
            <h3>0</h3>
            <h5>Suscriptores</h5>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.subscribers.index') }}" class="small-box-footer">Más info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> --}}

    </div>
  </div>
@endsection
