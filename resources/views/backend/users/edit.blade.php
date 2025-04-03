@extends('adminlte::page')

@section('title', 'Editar Sector')

@section('content_header')
  <h1>Editar Usuario</h1>
@stop

@section('content')

  <div class="card">
    <div class="card-body">

      <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
          @error('name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Contraseña (dejar en blanco para no cambiar)</label>
          <input type="password" name="password" class="form-control">
          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirmar Contraseña</label>
          <input type="password" name="password_confirmation" class="form-control">
          @error('password_confirmation')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save"></i> Guardar
        </button>
        <button type="reset" class="btn btn-secondary">
          <i class="fas fa-undo"></i> Reset
        </button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">
          <i class="fas fa-arrow-left"></i> Volver al listado
        </a>
      </form>
    </div>
  </div>
@endsection
