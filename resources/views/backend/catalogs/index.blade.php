@extends('layouts.adminlte')
@section('subtitle', 'Catálogos')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Catálogos')

@section('content_body')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.catalogs.create') }}" class="btn btn-outline-secondary"><i class="fas fa-file mr-2"></i>Nuevo</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="adminTable" class="table my-4 table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Slug</th>
                        <th>Orden</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catalogs as $catalog)
                    <tr>
                        <td>{{ $catalog->id }}</td>

                        <td>
                            @if($catalog->image)
                            <img src="{{ asset('storage/'.$catalog->image) }}" width="80">
                            @endif
                        </td>

                        <td>{{ $catalog->title }}</td>
                        <td>{{ $catalog->slug }}</td>

                        <td>{{ $catalog->order }}</td>

                        <td class="text-center align-middle">
                  <livewire:components.toggle-button :model="$catalog" field="status" wire:key="{{ $catalog->id }}" />
                </td>

                        <td>
                            <a href="{{ route('admin.catalogs.edit',$catalog->id) }}" class="btn btn-sm btn-outline-secondary" title="Editar">
                            <i class="fas fa-pencil-alt"></i></a>
                        </td>

                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection