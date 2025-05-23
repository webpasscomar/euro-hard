<div class="row">
    {{-- Nombre --}}
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre</label><span class="fs-4 text-danger">*</span>
            <input type="text" id="name" name="name" class="form-control"
                value="{{ old('name', $productCategory->name ?? '') }}"
                @unless ($edit)
                onkeyup="autocompleteSlug()"
                @endunless>
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
                value="{{ old('slug', $productCategory->slug ?? '') }}">
            @error('slug')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

{{-- Caracteristica - Feature --}}
<div class="row">

    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="feature" class="form-label">Característica</label><span class="fs-4 text-danger"></span>
            <input type="text" id="feature" name="feature" class="form-control"
                value="{{ old('feature', $productCategory->feature ?? '') }}">
        </div>
    </div>


    {{-- Color --}}
    <div class="col-md-2">
        <div class="form-group mb-3">
            <label for="image" class="form-label d-flex align-items-center mb-1">Color <span
                    class="fs-4 text-danger flex-1">*</span>

                <div id="previewColor"
                    @isset($productCategory)
                        style="width:25px; border-radius:50% ;height:25px; border:1px solid black; background-color:{{ old('color', $productCategory->color ?? '') }}" @endisset>
                </div>
            </label>
            <div class="dropdown">
                <button
                    class="d-flex align-items-center justify-content-between btn btn-outline-secondary border-1 border-gray-300 dropdown-toggle w-100"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Seleccione un color
                </button>
                <ul class="dropdown-menu w-100 p-2">
                    @forelse ($colors as $color)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="color"
                                id="{{ 'color' . $color->id }}" value="{{ $color->color }}"
                                onclick="previewColor(event)" @checked(old('color', $productCategory->color ?? '') == $color->color)>
                            <div
                                style="border:1px solid; border-radius: 5px; black; background-color: {{ $color->color }}">
                                <label class="form-check-label w-100" for="{{ 'color' . $color->id }}"
                                    style="opacity: 0;" onclick="previewColor(event)">
                                    color
                                </label>
                            </div>
                        </div>
                    @empty
                        <p>colores no disponibles</p>
                    @endforelse
                </ul>
            </div>
            @error('color')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    {{-- categoria/s padre (Ambientes) --}}
    <div class="col-md-6 mt-2">
        <div class="form-group mb-3">
            <label for="categoryParent" class="form-label">Ambientes</label><small class="text-secondary"> - (
                seleccione uno ó varios )</small>
            <select name="categories[]" id="categoryParent" class="categories form-select" multiple>
                @forelse ($productCategories as $category)
                    <option value="{{ $category->id }}" @selected(in_array($category->id, old('categories', isset($productCategory) ? $productCategory->parents->pluck('id')->toArray() : [])))>{{ $category->name }}</option>
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


{{-- Imágen / Banner --}}
<div class="row">
    {{-- Imágen --}}
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="image" class="form-label">Imágen</label><span class="fs-4 text-danger">*</span>
            <input type="file" name="image" id="image" class="form-control" accept=".png, .jpeg, .jpg, .svg"
                onchange="imageCategoryPreview(event)">
            <p class="ml-1">
                <small class="text-secondary">Recomendaciones: jpg , png ó svg de 512px x 512px - tamaño máximo de 1mb
                </small>
            </p>
            @error('image')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    {{-- Banner --}}
    <div class="col-md-6 mt-2">
        <div class="form-group mb-3">
            <label for="banner" class="form-label">Banner</label><span class="fs-4 text-danger">*</span>
            <input type="file" id="banner" name="banner" class="form-control" accept=".png, .jpeg, .jpg, .svg"
                onchange="imageBannerPreview(event)">
            <p class="ml-1">
                <small class="text-secondary">Recomendaciones: jpg , png ó svg de 1600px x 900px - tamaño máximo de 1mb
                </small>
            </p>
            @error('banner')
                <span class="ms-1 text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>



<p class="text-right"><span class="fs-4 text-danger">*</span><small> Campos requeridos</small></p>
<div class="d-sm-flex gap-3">
    <div id="imgCategoriesPreview">
        @isset($productCategory->image)
            @if ($edit)
                <h6 class="fw-bold">Imágen</h6>
                <img src="{{ $productCategory->image && file_exists(public_path('storage/product_categories/' . $productCategory->image)) ? asset('storage/product_categories/' . $productCategory->image) : asset('img/no_disponible.jpg') }}"
                    alt="{{ $productCategory->name }}" class="img-thumbnail img_view_edit">
            @endif
        @endisset
    </div>
    <div id="imgBannerPreview" class="mt-3 mt-sm-0">
        @isset($productCategory->banner)
            @if ($edit && $productCategory->banner)
                <h6 class="fw-bold">Banner</h6>
                <img src="{{ $productCategory->banner && file_exists(public_path('storage/product_categories/' . $productCategory->banner)) ? asset('storage/product_categories/' . $productCategory->banner) : asset('img/no_disponible.jpg') }}"
                    alt="{{ $productCategory->name }}" class="img-thumbnail img_view_edit">
            @endif
        @endisset
    </div>
</div>

@push('js')
    <script>
        // Mostrar el color elegido al seleccionar
        const previewColor = (event) => {
            event.stopPropagation();
            const previewColor = document.querySelector('#previewColor');
            previewColor.setAttribute('style',
                `width:25px; height:25px ;border-radius:50%; border:1px solid black; background-color: ${event.target.value}`
            );
        };
        //  Vista previa de la imágen
        const imageCategoryPreview = (event) => {
            const containerPreview = document.querySelector('#imgCategoriesPreview');
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
                image.setAttribute('style',
                    `object-fit:cover; width:200px; max-width:200px; min-width:200px;height:120px; min-height:120px; max-height:120px;`
                );
                containerPreview.appendChild(image);
            }
            reader.readAsDataURL(event.target.files[0]);
        };
        // //  Vista previa imágen banner
        const imageBannerPreview = (event) => {
            const containerBannerPreview = document.querySelector('#imgBannerPreview');
            containerBannerPreview.innerHTML = '';
            const title = document.createElement('h6');
            title.style.fontWeight = 'bold';
            title.textContent = 'Vista Previa Banner';
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

        const generateSlug = (name) => {
            // Convierte a minúsculas
            let slug = name.toLowerCase().trim();

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
