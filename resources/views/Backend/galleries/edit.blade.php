@extends('layouts.adminlte')
@section('subtitle', 'Galerias')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Galeria')
@section('content_header_detail', 'Editar')


@section('content_body')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary" wire:navigate>
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Incluir formulario de creación / actualización --}}
                @include('backend.galleries.form')

                <div class="text-right my-4">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-save"></i> Actualizar
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
