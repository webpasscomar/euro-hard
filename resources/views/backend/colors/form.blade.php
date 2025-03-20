<div class="row">

  <div class="col-md-3">
    <div class="form-group mb-3">
      <label for="color" class="form-label">Seleccione un color</label>
      <input type="color" id="color" name="color" class="form-control cursor-pointer" value="{{ old('color') }}">
      @error('color')
        <span class="ms-1 text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group mb-3">
      <label for="title" class="form-label">Nombre</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $color->name ?? '') }}">
      @error('name')
        <span class="ms-1 text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group mb-3">
      <label for="title" class="form-label">Característica</label>
      <input type="text" name="feature" class="form-control" value="{{ old('feature', $color->feature ?? '') }}">
      @error('feature')
        <span class="ms-1 text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

</div>
