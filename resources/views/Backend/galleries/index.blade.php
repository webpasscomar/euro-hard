@extends('layouts.adminlte')
@section('subtitle', 'Galerias')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Galerias')

@section('content_body')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{ route('admin.galleries.create') }}" class="btn btn-outline-secondary" wire:navigate><i
                    class="fas fa-file mr-2"></i>Nuevo</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table id="adminTable" class="table my-4 table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-left">Cod.</th>
                            <th class="text-left align-middle">Título</th>
                            {{-- <th class="text-left align-middle">Publicado</th> --}}
                            <th class="text-left align-middle">Orden</th>
                            <th class="text-left align-middle">Imágen</th>
                            <th class="text-left align-middle">Publicado</th>
                            <th class="text-left align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slides as $slide)
                            <tr>
                                <td class="align-middle text-left">{{ $slide->id }}</td>
                                <td class="align-middle text-left">{{ $slide->title }}</td>
                                {{-- <td class="align-middle text-left">
                                    <livewire:components.published wire:key="{{ $slide->id }}" :model="$slide"
                                        field="status" />
                                </td> --}}
                                <td class="align-middle text-left">{{ $slide->order }}</td>
                                <td class="align-middle text-left">
                                    <img src="{{ isset($slide->image) && file_exists(public_path('storage/galleries/' . $slide->image)) ? asset('storage/galleries/' . $slide->image) : asset('img/Imagen-no-disponible.png') }}"
                                        alt="{{ $slide->title }}" class="img-fluid" width="40" height="40">
                                </td>

                                <td class="text-center align-bottom">
                                    <livewire:components.toggle-button :model="$slide" field="status"
                                        wire:key="{{ $slide->id }}" />
                                </td>
                                <td class="text-right align-middle">
                                    <a href="{{ route('admin.galleries.edit', $slide) }}" wire:navigate
                                        class="btn btn-sm btn-outline-secondary" title="Editar">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="{{ route('admin.galleries.destroy', $slide) }}"
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
