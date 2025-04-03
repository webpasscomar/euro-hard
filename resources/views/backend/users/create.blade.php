@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
  <h1>Crear Usuario</h1>
@stop

@section('content')

  <div class="card">
    <div class="card-body">

      <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" name="name" class="form-control" required>
          @error('name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" required>
          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" name="password" class="form-control" required>
          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirmar Contraseña</label>
          <input type="password" name="password_confirmation" class="form-control" required>
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
