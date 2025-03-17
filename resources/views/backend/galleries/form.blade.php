<div class="row">
  {{-- Titulo --}}
  <div class="col-md-6">
    <div class="form-group mb-3">
      <label for="title" class="form-label">Título</label><span class="fs-4 text-danger">*</span>
      <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title ?? '') }}">
      @error('title')
      <span class="ms-1 text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  {{-- Orden --}}
  <div class="col-md-6">
    <div class="form-group mb-3">
      <label for="order" class="form-label">Orden</label><span class="fs-4 text-danger">*</span>
      <input type="number" name="order" class="form-control" min="0"
             value="{{ old('order', $gallery->order ?? '') }}">
      @error('order')
      <span class="ms-1 text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
</div>
{{-- Imágen --}}
<div class="form-group mb-3">
  <label for="image" class="form-label">Imágen</label><span class="fs-4 text-danger">*</span>
  <input type="file" name="image" class="form-control" accept=".png, .svg, .jpg, .jpeg" onchange="imagePreview(event)">
  <p class="ml-1"><small class="text-secondary">Recomendaciones: jpg , png ó svg de 1920px x 1080px - tamaño
      máximo
      de 1mb</small></p>
  @error('image')
  <span class="ms-1 text-danger">{{ $message }}</span>
  @enderror
</div>

<p class="text-right"><span class="fs-4 text-danger">*</span><small> Campos requeridos</small></p>
<div id="imgPreview">
  @isset($gallery)
    <h6 class="fw-bold">Imágen galeria</h6>
    <img
      src="{{ $gallery->image && file_exists(public_path('storage/galleries/' . $gallery->image)) ? asset('storage/galleries/' . $gallery->image) : asset('img/no_disponible.jpg') }}"
      alt="{{ $gallery->title }}" class="img-thumbnail img_view_edit">
  @endisset
</div>

@push('js')
  <script>
    // Vista previa de la imágen
    const imagePreview = (event) => {
      const containerPreview = document.querySelector('#imgPreview');
      containerPreview.innerHTML = '';
      const title = document.createElement('h6');
      title.style.fontWeight = 'bold';
      title.textContent = 'Vista Previa Imágen';
      containerPreview.appendChild(title);
      let reader = new FileReader();

      reader.onload = (event) => {
        const image = document.createElement('img');
        image.src = event.target.result;
        image.alt = 'vista previa imágen';
        image.className = 'img-thumbnail';
        image.setAttribute('style', `object-fit:cover; width:200px; max-width:200px; min-width:200px;height:120px; min-height:120px; max-height:120px;`);
        containerPreview.appendChild(image);
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
@endpush
