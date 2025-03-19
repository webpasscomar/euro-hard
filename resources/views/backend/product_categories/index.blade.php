@extends('layouts.adminlte')
@section('subtitle', 'Categoria Productos')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Categoria Productos')

@section('content_body')
  <div class="card">
    <div class="card-header text-right">
      <a href="{{ route('admin.productCategory.create') }}" class="btn btn-outline-secondary"><i
          class="fas fa-file mr-2"></i>Nuevo</a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="adminTable" class="table my-4 table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-left">Cod.</th>
              <th class="text-left align-middle">Nombre</th>
              <th class="text-left align-middle">Color</th>
              <th class="text-left align-middle">Imágen</th>
              <th class="text-left align-middle">Banner</th>
              <th class="text-left align-middle">Publicado</th>
              <th class="text-left align-middle">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productCategories as $productCategory)
              <tr>
                <td class="align-middle text-left">{{ $productCategory->id }}</td>
                <td class="align-middle text-left">{{ $productCategory->name }}</td>
                <td class="align-middle text-left">
                  <div class="w-8 h-8 rounded-full" style="background-color: {{ $productCategory->color }}"></div>
                </td>
                <td class="align-middle text-left">
                  <img
                    src="{{ isset($productCategory->image) && file_exists(public_path('storage/product_categories/' . $productCategory->image)) ? asset('storage/product_categories/' . $productCategory->image) : asset('img/Imagen-no-disponible.png') }}"
                    alt="{{ $productCategory->title }}" class="img-fluid" width="40" height="40">
                </td>
                <td class="align-middle text-left">
                  <img
                    src="{{ isset($productCategory->banner) && file_exists(public_path('storage/product_categories/' . $productCategory->banner)) ? asset('storage/product_categories/' . $productCategory->banner) : asset('img/Imagen-no-disponible.png') }}"
                    alt="{{ $productCategory->title }}" class="img-fluid" width="40" height="40">
                </td>
                <td class="text-center align-middle">
                  <livewire:components.toggle-button :model="$productCategory" field="status"
                    wire:key="{{ $productCategory->id }}" />
                </td>
                <td class="text-right align-middle">
                  <a href="{{ route('admin.productCategory.edit', $productCategory) }}"
                    class="btn btn-sm btn-outline-secondary" title="Editar">
                    <i class="fas fa-pencil-alt"></i>
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
