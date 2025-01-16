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
                        <h3>0</h3>
                        <h5>Usuarios</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            {{--      Datos Contacto --}}
            <div class="col-md-3 col-12">
                <div class="small-box bg-red-500 text-white">
                    <div class="inner">
                        <h3>0</h3>
                        <h5>Datos Contacto</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            {{--      Empresa --}}
            <div class="col-md-3 col-12">
                <div class="small-box bg-green-500 text-white">
                    <div class="inner">
                        <h3>0</h3>
                        <h5>Empresa</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            {{--  Galería / Slide --}}
            <div class="col-md-3 col-12">
                <div class="small-box bg-purple-500 text-white">
                    <div class="inner">
                        <h3>0</h3>
                        <h5>Galería / Slide</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('admin.galleries.index') }}" wire:navigate class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        {{--    SHOWROOM --}}
        <div class="row mb-4">
            <h4 class="mb-3">Showroom</h4>
            {{--      Colores --}}
            <div class="col-md-3 col-12">
                <div class="small-box bg-cyan-500 text-white">
                    <div class="inner">
                        <h3>0</h3>
                        <h5>Colores</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('admin.colors.index') }}" wire:navigate class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            {{--      categorias --}}
            <div class="col-md-3 col-12">
                <div class="small-box bg-pink-500 text-white">
                    <div class="inner">
                        <h3>0</h3>
                        <h5>Categorías</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('admin.productCategory.index') }}" wire:navigate class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            {{--      productos --}}
            <div class="col-md-3 col-12">
                <div class="small-box bg-gray-500 text-white">
                    <div class="inner">
                        <h3>0</h3>
                        <h5>Productos</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        {{--    DIFUSION --}}
        <div class="row mb-4">
            <h4 class="mb-3">Difusión</h4>
            {{--      Cátalogo --}}
            <div class="col-md-3 col-12">
                <div class="small-box bg-orange-500 text-white">
                    <div class="inner">
                        <h3>0</h3>
                        <h5>Cátalogo</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            {{--      Categoria Novedades --}}
            <div class="col-md-3 col-12">
                <div class="small-box bg-indigo-500 text-white">
                    <div class="inner">
                        <h3>0</h3>
                        <h5>Categoría Novedades</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            {{--      Novedades --}}
            <div class="col-md-3 col-12">
                <div class="small-box bg-fuchsia-500 text-white">
                    <div class="inner">
                        <h3>0</h3>
                        <h5>Novedades</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            {{--      Suscriptores --}}
            <div class="col-md-3 col-12">
                <div class="small-box bg-teal-500 text-white">
                    <div class="inner">
                        <h3>0</h3>
                        <h5>Suscriptores</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
