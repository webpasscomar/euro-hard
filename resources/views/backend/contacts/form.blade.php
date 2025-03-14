    {{-- Domicilio --}}
    <div class="form-group mb-3">
        <label for="address" class="form-label">Domicilio</label><span class="fs-4 text-danger">*</span>
        <input type="text" name="address" class="form-control" value="{{ old('address', $contact->address ?? '') }}">
        @error('address')
            <span class="ms-1 text-danger">{{ $message }}</span>
        @enderror
    </div>
    {{-- Teléfonos --}}
    <div class="form-group mb-3">
        <label for="phone" class="form-label">Teléfonos</label><span class="fs-4 text-danger">*</span>
        <input type="text" name="phone" id="phone" class="form-control"
            value="{{ old('phone', $contact->phone ?? '') }}">
        @error('phone')
            <span class="ms-1 text-danger">{{ $message }}</span>
        @enderror
    </div>
    {{-- Email --}}
    <div class="form-group mb-3">
        <label for="email" class="form-label">Email</label><span class="fs-4 text-danger">*</span>
        <input type="text" name="email" id="email" class="form-control"
            value="{{ old('email', $contact->email ?? '') }}">
        @error('email')
            <span class="ms-1 text-danger">{{ $message }}</span>
        @enderror
    </div>
    {{-- Facebook --}}
    <div class="form-group mb-3">
        <label for="facebook" class="form-label">Facebook</label>
        <input type="facebook" name="facebook" id="facebook" class="form-control"
            value="{{ old('facebook', $contact->facebook ?? '') }}">
        @error('facebook')
            <span class="ms-1 text-danger">{{ $message }}</span>
        @enderror
    </div>
    {{-- Instagram --}}
    <div class="form-group mb-3">
        <label for="instagram" class="form-label">Instagram</label>
        <input type="instagram" name="instagram" id="instagram" class="form-control"
            value="{{ old('instagram', $contact->instagram ?? '') }}">
        @error('instagram')
            <span class="ms-1 text-danger">{{ $message }}</span>
        @enderror
    </div>
    {{-- Youtube --}}
    <div class="form-group mb-3">
        <label for="youtube" class="form-label">Youtube</label>
        <input type="youtube" name="youtube" id="youtube" class="form-control"
            value="{{ old('youtube', $contact->youtube ?? '') }}">
        @error('youtube')
            <span class="ms-1 text-danger">{{ $message }}</span>
        @enderror
    </div>
    {{-- Whatsapp --}}
    <div class="form-group mb-3">
        <label for="whatsapp" class="form-label">Whatsapp</label>
        <input type="whatsapp" name="whatsapp" id="whatsapp" class="form-control"
            value="{{ old('whatsapp', $contact->whatsapp ?? '') }}">
        <small class="text-secondary d-block">Ejemplo: 5491123456789</small>
        @error('whatsapp')
            <span class="ms-1 text-danger">{{ $message }}</span>
        @enderror
    </div>
    {{-- Mapa --}}
    {{-- <div class="form-group mb-3">
        <label for="map" class="form-label">Mapa</label>
        <input type="map" name="map" id="map" class="form-control"
            value="{{ old('map', $contact->map ?? '') }}">
        @error('map')
            <span class="ms-1 text-danger">{{ $message }}</span>
        @enderror
    </div> --}}

    {{-- Campos requeridos --}}
    <p class="text-right"><span class="fs-4 text-danger">*</span><small> Campos requeridos</small></p>
