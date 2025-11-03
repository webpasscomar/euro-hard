@extends('layouts.adminlte')
@section('subtitle', 'Contacto')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Contacto')

@section('content_body')
  <div class="card">
    <div class="card-header text-right">
      {{-- <a href="{{ route('admin.contacts.create') }}" class="btn btn-outline-secondary"><i
                    class="fas fa-file mr-2"></i>Nuevo</a> --}}
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="adminTable" class="table my-4 table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-left">Cod.</th>
              <th class="text-left align-middle">Email</th>
              <th class="text-left align-middle">Teléfonos</th>
              <th class="text-left align-middle">Whatsapp</th>
              {{-- <th class="text-left align-middle">Publicado</th> --}}
              <th class="text-left align-middle">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($contacts as $contact)
              <tr>
                <td class="align-middle text-left">{{ $contact->id }}</td>
                <td class="align-middle text-left">{{ $contact->email }}</td>
                <td class="align-middle text-left">{{ $contact->phone }}</td>
                <td class="align-middle text-left">{{ $contact->whatsapp }}</td>
                {{-- <td class="text-center align-middle">
                  <livewire:components.toggle-button :model="$contact" field="status" wire:key="{{ $contact->id }}" />
                </td> --}}
                <td class="text-right align-middle">
                  <a href="{{ route('admin.contacts.edit', $contact) }}" class="btn btn-sm btn-outline-secondary"
                    title="Editar">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  {{-- <a href="{{ route('admin.contacts.destroy', $contact) }}" class="btn btn-sm btn-outline-danger"
                    data-confirm-delete="true" title="Eliminar">
                    <i class="fas fa-trash"></i>
                  </a> --}}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
