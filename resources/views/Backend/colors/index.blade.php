@extends('layouts.adminlte')
@section('subtitle', 'Colores')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Colores')

@section('content_body')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{ route('admin.colors.create') }}" class="btn btn-outline-secondary" wire:navigate><i
                    class="fas fa-file mr-2"></i>Nuevo</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table id="adminTable" class="table my-4 table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-left">Cod.</th>
                            <th class="text-left align-middle">Color</th>
                            <th class="text-left align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $color)
                            <tr>
                                <td class="align-middle text-left">{{ $color->id }}</td>
                                <td class="align-middle text-left">
                                    <div class="w-8 h-8 rounded-full" style="background-color: {{ $color->color }}"></div>
                                </td>
                                <td class="text-right align-middle">
                                    <a href="{{ route('admin.colors.destroy', $color) }}"
                                        class="btn btn-sm btn-outline-danger" data-confirm-delete="true" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
