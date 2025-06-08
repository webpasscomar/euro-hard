@extends('layouts.adminlte')
@section('subtitle', 'Catálogos')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Catálogos')
@section('content_header_detail', 'Editar')


@section('content_body')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{ route('admin.catalogs.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
        <div class="card-body">
           <livewire:backend.catalog-form />
        </div>
    </div>
@endsection
