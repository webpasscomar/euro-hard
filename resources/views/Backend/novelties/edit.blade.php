@extends('layouts.adminlte')
@section('subtitle', 'Novedades')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Novedades')
@section('content_header_detail', 'Editar')


@section('content_body')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{ route('admin.novelties.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.novelties.update', $novelty) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Incluir formulario de creación / actualización --}}
                @include('backend.novelties.form')

                <div class="text-right my-4">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-save"></i> Actualizar
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
