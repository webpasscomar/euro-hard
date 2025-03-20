<div class="row">
    {{-- Nombre --}}
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre</label><span class="fs-4 text-danger">*</span>
            <input type="text" id="name" name="name" class="form-control"
                value="{{ old('name', $product->name ?? '') }}" onkeyup="autocompleteSlug()">
            @error('name')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    {{-- Slug --}}
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="slug" class="form-label">Slug</label><span class="fs-4 text-danger">*</span>
            <input type="text" id="slug" name="slug" class="form-control"
                value="{{ old('slug', $product->slug ?? '') }}">
            @error('slug')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
{{-- Descripción --}}
<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="description" class="form-label">Descripción</label><span class="fs-4 text-danger">*</span>
            <textarea name="description" id="description" class="form-control" rows="2">{{ old('description', $product->description ?? '') }}</textarea>
            @error('description')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
{{-- Imágen principal --}}
<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="image_main" class="form-label">Imágen principal</label><span class="fs-4 text-danger">*</span>
            <input type="file" id="image_main" name="image_main" class="form-control"
                accept=".jpg, .jpeg, .png, .svg" onchange="imageMainPreview(event)">
            <small class="text-secondary d-block"><sup>*</sup> Imágenes jpg , png ó svg de 512px x
                512px - máximo:1mb
            </small>
            @error('image_main')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
{{-- Categoría/s --}}
<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-4">
            <label for="productCategory_id" class="form-label">Categoria/s</label><span
                class="fs-4 text-danger">*</span><small class="text-secondary"> - ( seleccione una ó varias )</small>
            <select name="categories[]" id="categories" class="categories form-select" multiple>
                @forelse ($productCategories as $category)
                    <option value="{{ $category->id }}" @selected(in_array($category->id, old('categories', isset($product) ? $product->categories->pluck('id')->toArray() : [])))>{{ $category->name }}</option>
                @empty
                    <option class="text-sm text-secondary">No hay ninguna categoria. Ingrese una</option>
                @endforelse
            </select>
            @error('categories')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
{{-- Código - Colores - Nuevo producto --}}
<div class="row">
    {{-- Código del producto --}}
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="code" class="form-label">Código</label>
            <input class="form-control" type="text" id="code" name="code"
                value="{{ old('code', $product->code ?? '') }}">
            @error('code')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    {{-- Colores  --}}
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="image" class="form-label d-flex align-items-center">Colores</label>
            <div class="dropdown">
                <button
                    class="d-flex align-items-center justify-content-between btn btn-outline-secondary dropdown-toggle w-100 border-1 border-gray-300"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Seleccione un color
                </button>
                <ul class="dropdown-menu w-100 p-2">
                    @forelse ($colors as $color)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="colors[]"
                                id="{{ 'color' . $color->id }}" value="{{ $color->id }}"
                                style="border:1px solid grey;" onclick="event.stopPropagation()"
                                @checked(in_array($color->id, old('colors', isset($product) ? $product->colors->pluck('id')->toArray() : [])))>
                            <div style="border:1px solid grey; background-color: {{ $color->color }}">
                                <label class="form-check-label w-100" for="{{ 'color' . $color->id }}"
                                    style="opacity: 0;" onclick="event.stopPropagation()">
                                    {{ $color->color }}
                                </label>
                            </div>
                        </div>
                    @empty
                        <span>colores no disponibles</span>
                    @endforelse
                </ul>
            </div>
            @error('color')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    {{--  Producto nuevo --}}
    <div class="col-md-4">
        <div class="form-group mb-3 text-center mt-3">
            <label for="product_id" class="form-label">Producto nuevo</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="is_new" name="is_new"
                    @checked(old('is_new', $product->is_new ?? ''))>
                <label class="form-check-label" for="is_new">Si / No </label>
            </div>
            @error('is_new')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
{{-- Video (URL) --}}
<div class="row">
    <div class="col-md-12">
        <div class="form-group mt-2 mb-3">
            <label for="video" class="form-label">Video (URL)</label>
            <input type="text" id="video" name="video" class="form-control"
                value="{{ old('video', $product->video ?? '') }}">
            @error('video')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
{{-- Información --}}
<div class="row">
    <div class="col-md-12">
        <div class="form-group mt-2 mb-3">
            <label for="editor" class="form-label">Información</label>
            <textarea name="information" id="editor" class="form-control" rows="3">{{ old('information', isset($product) ? $product->information : '') }}</textarea>
            @error('information')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
{{-- Galerías de imágenes 1,2,3,4,5,6 --}}
<div class="row">
    <label class="mt-3 mb-4 fs-5">Galeria de imágenes <small class="fs-6 text-secondary">( Se deben cargar en el orden
            correspondiente )</small></label>
    {{--  Imágen 1   --}}
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="image_1" class="form-label">Imágen 1</label>
            <input type="file" id="image_1" name="image_1" class="form-control"
                accept=".jpg, .jpeg, .png, .svg" onchange="imageGalleryPreview(event,1)">
            <small class="text-secondary d-block"><sup>*</sup> Imágenes jpg , png ó svg de 512px x
                512px - máximo:1mb
            </small>
            @error('image_1')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    {{--  Imágen 2   --}}
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="image_2" class="form-label">Imágen 2</label>
            <input type="file" id="image_2" name="image_2" class="form-control"
                accept=".jpg, .jpeg, .png, .svg" onchange="imageGalleryPreview(event,2)">
            <small class="text-secondary d-block"><sup>*</sup> Imágenes jpg , png ó svg de 512px x
                512px - máximo:1mb
            </small>
            @error('image_2')
                <span class=" ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    {{--  Imágen 3   --}}
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="image_3" class="form-label">Imágen 3</label>
            <input type="file" id="image_3" name="image_3" class="form-control"
                accept=".jpg, .jpeg, .png, .svg" onchange="imageGalleryPreview(event,3)">
            <small class="text-secondary d-block"><sup>*</sup> Imágenes jpg , png ó svg de 512px x
                512px - máximo:1mb
            </small>
            @error('image_3')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row mt-3">
    {{--  Imágen 4   --}}
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="image_4" class="form-label">Imágen 4</label>
            <input type="file" id="image_4" name="image_4" class="form-control"
                accept=".jpg, .jpeg, .png, .svg" onchange="imageGalleryPreview(event,4)">
            <small class="text-secondary d-block"><sup>*</sup> Imágenes jpg , png ó svg de 512px x
                512px - máximo:1mb
            </small>
            @error('image_4')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    {{--  Imágen 5   --}}
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="image_5" class="form-label">Imágen 5</label>
            <input type="file" id="image_5" name="image_5" class="form-control"
                accept=".jpg, .jpeg, .png, .svg" onchange="imageGalleryPreview(event,5)">
            <small class="text-secondary d-block"><sup>*</sup> Imágenes jpg , png ó svg de 512px x
                512px - máximo:1mb
            </small>
            @error('image_5')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    {{--  Imágen 6   --}}
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="image_6" class="form-label">Imágen 6</label>
            <input type="file" id="image_6" name="image_6" class="form-control"
                accept=".jpg, .jpeg, .png, .svg" onchange="imageGalleryPreview(event,6)">
            <small class="text-secondary d-block"><sup>*</sup> Imágenes jpg , png ó svg de 512px x
                512px - máximo:1mb
            </small>
            @error('image_6')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
{{-- Ficha - Instructivo --}}
<div class="row">
    <label class="mt-3 mb-4 fs-5">Otros archivos</label>
    {{--  Ficha --}}
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="datasheet_file" class="form-label">Ficha</label>
            <input type="file" id="datasheet_file" name="datasheet_file" class="form-control"
                accept="application/pdf, .pdf">
            <small class="text-secondary d-block"><sup>*</sup> Archivos pdf - máximo:2mb</small>
            @error('datasheet_file')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    {{-- Instructivo --}}
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="datasheet_file" class="form-label">Instructivo</label>
            <input type="file" id="instruction_file" name="instruction_file" class="form-control"
                accept="application/pdf, .pdf">
            <small class="text-secondary d-block"><sup>*</sup> Archivos pdf - máximo:2mb</small>
            @error('instruction_file')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    {{--  Subir a botón instructivo  --}}
    <div class="col-md-4 align-self-center">
        <div class="form-group mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="instruction_button"
                    name="instruction_button" @checked(old('instruction_button', $product->instruction_button ?? ''))>
                <label class="form-check-label fw-semibold" for="instruction_button">subir a botón instructivo</label>
            </div>
            @error('instruction_button')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
{{-- Productos Relacionados --}}
<div class="row my-3">
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="image" class="form-label d-flex align-items-center mb-3">Productos Relacionados
                (código)</label>
            <div class="dropdown">
                <button
                    class="d-flex align-items-center justify-content-between btn btn-outline-secondary dropdown-toggle w-100"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Seleccione los productos
                </button>
                <ul class="dropdown-menu w-100 p-2">
                    @forelse ($products as $relatedProduct)
                        <div class="form-check mb-2 d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" name="products[]"
                                id="{{ 'product' . $relatedProduct->id }}" value="{{ $relatedProduct->id }}"
                                style="border:1px solid grey;" @checked(in_array(
                                        $relatedProduct->id,
                                        old('products', isset($product) ? $product->relatedProducts->pluck('id')->toArray() : [])))>
                            <label class="form-check-label w-100 bg-slate-200 fw-bold px-2 py-1"
                                for="{{ 'product' . $relatedProduct->id }}" onclick="event.stopPropagation()">
                                {{ 'COD - ' . $relatedProduct->id }}
                            </label>
                        </div>
                    @empty
                        <span>productos no disponibles</span>
                    @endforelse
                </ul>
            </div>
            @error('products')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
{{-- SEO - keywords --}}
<div class="row mb-3">
    <label class="mb-4 fs-5">SEO</label>
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="keywordsSEO" class="form-label">Keywords</label>
            <input type="text" id="keywordsSEO" name="keywordsSEO" class="form-control"
                value="{{ old('keywordsSEO', $edit ? $product->keywordsSEO : '') }}">
            @error('keywordsSEO')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
{{-- SEO - Description --}}
<div class="row mb-3">
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="descriptionSEO" class="form-label">Description</label>
            <textarea name="descriptionSEO" id="descriptionSEO" class="form-control" rows="2">{{ old('descriptionSEO', $edit ? $product->descriptionSEO : '') }}</textarea>
            @error('descriptionSEO')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
{{-- Campos obligatorios --}}
<p class="text-right"><span class="fs-4 text-danger">*</span><small> Campos requeridos</small></p>

{{-- Mostrar archivos subidos - PDF  --}}
@if ($edit && (isset($product->datasheet_file) || isset($product->instruction_file)))
    <div class="my-5">
        <h6 class="fw-bold fs-5 mb-3">Archivos Cargados</h6>
        @isset($product->datasheet_file)
            <p class="fs-6">Ficha: <strong>{{ $product->datasheet_file }}</strong></p>
        @endisset
        @isset($product->instruction_file)
            <p class="fs-6">Instructivo: <strong>{{ $product->instruction_file }}</strong></p>
        @endisset
    </div>
@endif

{{-- Imágenes - Mostrar la vista previa y en el modo editar --}}
@if ($edit)
    <h6 class="fw-bold fs-5 mb-4">Imágenes</h6>
@endif
<div class="d-sm-flex flex-wrap gap-y-5">
    {{--  Vista previa imágen principal --}}
    <div id="imgMainPreview">
        @if ($edit)
            @isset($product->image_main)
                <h6 class="fw-bold">Imágen principal</h6>
                <img src="{{ file_exists(public_path('storage/products/' . $product->image_main)) ? asset('storage/products/' . $product->image_main) : asset('img/no_disponible.jpg') }}"
                    alt="{{ $product->name }}" class="img-thumbnail img_view_edit">
            @endisset
        @endif
    </div>
    {{--  Vista previa imágen  1 --}}
    <div id="img1Preview" class="mt-3 mt-sm-0">
        @if ($edit)
            @isset($product->image_1)
                <h6 class="fw-bold">Imágen 1</h6>
                <img src="{{ file_exists(public_path('storage/products/' . $product->image_1)) ? asset('storage/products/' . $product->image_1) : asset('img/no_disponible.jpg') }}"
                    alt="{{ $product->name }}" class="img-thumbnail img_view_edit">
            @endisset
        @endif
    </div>
    {{--  Vista previa imágen  2 --}}
    <div id="img2Preview" class="mt-3 mt-sm-0">
        @if ($edit)
            @isset($product->image_2)
                <h6 class="fw-bold">Imágen 2</h6>
                <img src="{{ file_exists(public_path('storage/products/' . $product->image_2)) ? asset('storage/products/' . $product->image_2) : asset('img/no_disponible.jpg') }}"
                    alt="{{ $product->name }}" class="img-thumbnail img_view_edit">
            @endisset
        @endif
    </div>
    {{--  Vista previa imágen  3 --}}
    <div id="img3Preview" class="mt-3 mt-sm-0">
        @if ($edit)
            @isset($product->image_3)
                <h6 class="fw-bold">Imágen 3</h6>
                <img src="{{ file_exists(public_path('storage/products/' . $product->image_3)) ? asset('storage/products/' . $product->image_3) : asset('img/no_disponible.jpg') }}"
                    alt="{{ $product->name }}" class="img-thumbnail img_view_edit">
            @endisset
        @endif
    </div>
    {{--  Vista previa imágen  4 --}}
    <div id="img4Preview" class="mt-3 mt-sm-0">
        @if ($edit)
            @isset($product->image_4)
                <h6 class="fw-bold">Imágen 4</h6>
                <img src="{{ file_exists(public_path('storage/products/' . $product->image_4)) ? asset('storage/products/' . $product->image_4) : asset('img/no_disponible.jpg') }}"
                    alt="{{ $product->name }}" class="img-thumbnail img_view_edit">
            @endisset
        @endif
    </div>
    {{--  Vista previa imágen  5 --}}
    <div id="img5Preview" class="mt-3 mt-sm-0">
        @if ($edit)
            @isset($product->image_5)
                <h6 class="fw-bold">Imágen 5</h6>
                <img src="{{ file_exists(public_path('storage/products/' . $product->image_5)) ? asset('storage/products/' . $product->image_5) : asset('img/no_disponible.jpg') }}"
                    alt="{{ $product->name }}" class="img-thumbnail img_view_edit">
            @endisset
        @endif
    </div>
    {{--  Vista previa imágen  6 --}}
    <div id="img6Preview" class="mt-3 mt-sm-0">
        @if ($edit)
            @isset($product->image_6)
                <h6 class="fw-bold">Imágen 6</h6>
                <img src="{{ file_exists(public_path('storage/products/' . $product->image_6)) ? asset('storage/products/' . $product->image_6) : asset('img/no_disponible.jpg') }}"
                    alt="{{ $product->name }}" class="img-thumbnail img_view_edit">
            @endisset
        @endif
    </div>
</div>

{{-- Imágenes previas - muetra de colores previos --}}
@push('js')
    <script>
        //  Vista previa de la imágen
        const imageMainPreview = (event) => {
            const containerPreview = document.querySelector('#imgMainPreview');
            containerPreview.innerHTML = '';
            const title = document.createElement('h6');
            title.style.fontWeight = 'bold';
            title.textContent = 'Vista Previa Imágen Principal';
            containerPreview.appendChild(title);
            let reader = new FileReader();

            reader.onload = (event) => {
                const image = document.createElement('img');
                image.src = event.target.result;
                image.alt = 'vista previa imágen principal';
                image.className = 'img-thumbnail';
                image.setAttribute('style',
                    `object-fit:cover; width:200px; max-width:200px; min-width:200px;height:120px; min-height:120px; max-height:120px;`
                );
                containerPreview.appendChild(image);
            }
            reader.readAsDataURL(event.target.files[0]);
        };
        // //  Vista previa imágen banner
        const imageGalleryPreview = (event, number) => {
            const containerBannerPreview = document.querySelector(`#img${number}Preview`);
            containerBannerPreview.innerHTML = '';
            const title = document.createElement('h6');
            title.style.fontWeight = 'bold';
            title.textContent = 'Vista Previa Imágen ' + number;
            containerBannerPreview.appendChild(title);
            let reader = new FileReader();

            reader.onload = (event) => {
                const imageBanner = document.createElement('img');
                imageBanner.src = event.target.result;
                imageBanner.alt = 'vista previa banner';
                imageBanner.className = 'img-thumbnail';
                imageBanner.setAttribute('style',
                    `object-fit:cover; width:200px; max-width:200px; min-width:200px;height:120px; min-height:120px; max-height:120px;`
                );
                containerBannerPreview.appendChild(imageBanner);
            }
            reader.readAsDataURL(event.target.files[0]);
        };
        // Generar slug desde el nombre
        const generateSlug = (name) => {
            // Convierte a minúsculas
            let slug = name.toLowerCase();

            // Elimina caracteres especiales y espacios
            slug = slug.replace(/[^a-z0-9\s-]/g, '');
            slug = slug.replace(/\s+/g, '-');

            // Ajusta la longitud máxima (opcional)
            slug = slug.substring(0, 100);

            return slug;
        }
        // Escribir el slug automáticamente
        function autocompleteSlug() {
            const name = document.querySelector('#name');
            const slug = document.querySelector('#slug');
            slug.value = generateSlug(name.value);
        }

        // Implementación de select multiple con Select2 para elegir las categorias
        $(document).ready(function() {
            $('.categories').select2({
                theme: "classic",
            });
        });
    </script>
@endpush
