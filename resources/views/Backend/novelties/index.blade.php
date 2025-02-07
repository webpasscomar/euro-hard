@extends('layouts.adminlte')
@section('subtitle', 'Novedades')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Novedades')

@section('content_body')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{ route('admin.novelties.create') }}" class="btn btn-outline-secondary"><i
                    class="fas fa-file mr-2"></i>Nuevo</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="adminTable" class="table my-4 table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-left">Cod.</th>
                            <th class="text-left align-middle">Título</th>
                            <th class="text-left align-middle">Imágen</th>
                            <th class="text-left align-middle">Publicado</th>
                            <th class="text-left align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($novelties as $novelty)
                            <tr>
                                <td class="align-middle text-left">{{ $novelty->id }}</td>
                                <td class="align-middle text-left">{{ $novelty->title }}</td>
                                <td class="align-middle text-left">
                                    <img src="{{ isset($novelty->image) && file_exists(public_path('storage/novelties/' . $novelty->image)) ? asset('storage/novelties/' . $novelty->image) : asset('img/Imagen-no-disponible.png') }}"
                                        alt="{{ $novelty->title }}" class="img-fluid" width="40" height="40">
                                </td>
                                <td class="text-center align-middle">
                                    <livewire:components.toggle-button :model="$novelty" field="status"
                                        wire:key="{{ $novelty->id }}" />
                                </td>
                                <td class="text-right align-middle">
                                    <a href="{{ route('admin.novelties.edit', $novelty) }}"
                                        class="btn btn-sm btn-outline-secondary" title="Editar">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="{{ route('admin.novelties.destroy', $novelty) }}"
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
