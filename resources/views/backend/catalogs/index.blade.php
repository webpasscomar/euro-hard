@extends('layouts.adminlte')
@section('subtitle', 'Catálogos')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Catálogos')

@section('content_body')
    <div class="card">
        <div class="card-header text-right">
            <a href="" class="btn btn-outline-secondary"><i class="fas fa-file mr-2"></i>Nuevo</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="adminTable" class="table my-4 table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-left">Nombre</th>
                            <th class="text-left align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
