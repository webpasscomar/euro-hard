@extends('layouts.adminlte')
@section('subtitle', 'Catálogos')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Catálogos')

@section('content_body')
    <div class="card">
        {{-- <div class="card-header text-right">
            <a href="" class="btn btn-outline-secondary"><i class="fas fa-file mr-2"></i>Nuevo</a>
        </div> --}}

        <div class="card-body">
            <div class="table-responsive">
                <table id="adminTable" class="table my-4 table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-left">Nombre</th>
                            <th class="text-left">Archivo</th>
                            <th class="text-left align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $catalog->title }}</td>
                            <td>{{ $catalog->pdf }}</td>
                            <td class="text-right align-middle">
                                 <a href="{{ route('admin.catalogs.edit', $catalog) }}"
                                        class="btn btn-sm btn-outline-secondary" title="Editar">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
