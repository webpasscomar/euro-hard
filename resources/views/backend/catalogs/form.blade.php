<div class="row">

    <!-- TÍTULO -->
    <div class="col-md-6 mb-3">
        <label class="form-label">
            Título <span class="text-danger">*</span>
        </label>
        <input 
            type="text" 
            id="title"
            name="title" 
            class="form-control"
            value="{{ old('title', $catalog->title ?? '') }}"
            onkeyup="autocompleteCatalogSlug()"
            required
        >
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- SLUG -->
    <div class="col-md-6 mb-3">
        <label class="form-label">
            Slug <span class="text-danger">*</span>
        </label>
        <input 
            type="text" 
            id="slug"
            name="slug" 
            class="form-control"
            value="{{ old('slug', $catalog->slug ?? '') }}"
            required
        >
        @error('slug')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- ORDEN -->
    <div class="col-md-3 mb-3">
        <label class="form-label">
            Orden <span class="text-danger">*</span>
        </label>
        <input 
            type="number" 
            name="order"
            class="form-control"
            value="{{ old('order', $catalog->order ?? 1) }}"
            required
        >
        @error('order')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- ESTADO -->
    <div class="col-md-3 mb-3">
        <label class="form-label">
            Estado <span class="text-danger">*</span>
        </label>
        <select name="status" class="form-control" required>
            <option value="1" {{ old('status', $catalog->status ?? 1) == 1 ? 'selected' : '' }}>
                Activo
            </option>
            <option value="0" {{ old('status', $catalog->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactivo
            </option>
        </select>
        @error('status')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- PDF -->
    <div class="col-md-6 mb-3">
        <label class="form-label">
            PDF del catálogo 
            @if(!isset($catalog->id)) <span class="text-danger">*</span> @endif
        </label>
        <input 
            type="file"
            name="pdf"
            class="form-control"
            accept="application/pdf"
            @if(!isset($catalog->id)) required @endif
        >

        <!-- Mostrar PDF actual al editar -->
        @if(isset($catalog->pdf) && $catalog->pdf)
            <small class="text-muted d-block mt-1">
                PDF actual: <a href="{{ asset('storage/'.$catalog->pdf) }}" target="_blank">Ver PDF</a>
            </small>
        @endif

        @error('pdf')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- IMAGEN -->
    <div class="col-md-6 mb-3">
        <label class="form-label">
            Imagen de portada
            @if(!isset($catalog->id)) <span class="text-danger">*</span> @endif
        </label>
        <input 
            type="file"
            name="image"
            class="form-control"
            accept="image/*"
            @if(!isset($catalog->id)) required @endif
        >

        <!-- Mostrar imagen actual al editar -->
        @if(isset($catalog->image) && $catalog->image)
            <div class="mt-2">
                <img src="{{ asset('storage/'.$catalog->image) }}" width="120">
            </div>
        @endif

        @error('image')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

</div>

<script>
function autocompleteCatalogSlug() {
    let title = document.getElementById('title').value;

    let slug = title
        .toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/[^a-z0-9\s-]/g, "")
        .trim()
        .replace(/\s+/g, "-");

    document.getElementById('slug').value = slug;
}
</script>