@extends('layouts.adminlte')
@section('subtitle', 'Productos')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Productos')
@section('content_header_detail', 'Nuevo')

@section('content_body')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Incluir formulario de creación / actualización --}}
                @include('Backend.products.form')

                <div class="text-right my-4">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
