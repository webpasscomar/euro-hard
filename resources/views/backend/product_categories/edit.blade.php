@extends('layouts.adminlte')
@section('subtitle', 'Ambientes & Capítulos')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Ambientes & Capítulos')
@section('content_header_detail', 'Editar')


@section('content_body')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{ route('admin.productCategory.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.productCategory.update', $productCategory) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Incluir formulario de creación / actualización --}}
                @include('backend.product_categories.form')

                <div class="text-right my-4">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-save"></i> Actualizar
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
