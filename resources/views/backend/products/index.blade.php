@extends('layouts.adminlte')
@section('subtitle', 'Productos')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Productos')

@section('content_body')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{ route('admin.products.create') }}" class="btn btn-outline-secondary"><i
                    class="fas fa-file mr-2"></i>Nuevo</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="adminTable" class="table my-4 table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-left">Cod.</th>
                            <th class="text-left align-middle">Producto</th>
                            <th class="text-left align-middle">Categoría/s</th>
                            <th class="text-left align-middle">Imágen</th>
                            <th class="text-left align-middle">Publicado</th>
                            <th class="text-left align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="align-middle text-left">{{ $product->id }}</td>
                                <td class="align-middle text-left">{{ $product->name }}</td>
                                <td class="align-middle text-left">
                                    @foreach ($product->categories->pluck('name')->toArray() as $category)
                                        <span>{{ $loop->last ? Str::title($category) : Str::title($category) . ' | ' }}</span>
                                    @endforeach
                                </td>
                                <td class="align-middle text-left">
                                    <img src="{{ isset($product->image_main) && file_exists(public_path('storage/products/' . $product->image_main)) ? asset('storage/products/' . $product->image_main) : asset('img/Imagen-no-disponible.png') }}"
                                        alt="{{ $product->name }}" class="img-fluid" width="40" height="40">
                                </td>
                                <td class="text-center align-middle">
                                    <livewire:components.toggle-button :model="$product" field="status"
                                        wire:key="{{ $product->id }}" />
                                </td>
                                <td class="text-right align-middle">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                        class="btn btn-sm btn-outline-secondary" title="Editar">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="{{ route('admin.products.destroy', $product) }}"
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
