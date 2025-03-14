<div class="row">
    {{-- Color --}}
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label for="color" class="form-label">Seleccione un color</label>
            <input type="color" id="color" name="color" class="form-control cursor-pointer"
                value="{{ old('color') }}">
            @error('color')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
