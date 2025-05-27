@extends('layouts.app')

@section('content')
  <div class="main-container">
    <div class="container-hero">
      <div class="container-fluid">
        <div class="container-title-hero">
          <div class="content-icon-EH-hero">
            <img src="{{ asset('images/icono-EH-gris.svg') }}" class="icon-EH-hero">
          </div>
          <h1 class="title-hero">Productos</h1>
        </div>
      </div>
      <div class="img-hero">
        <div class="img-overlay-contacto"></div>
        <img src="{{ asset('img/headers/form-productos.jpg') }}" alt="Productos">
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <h5 class="title-category gris">
            Formulario - <span class="negro">Productos</span>
          </h5>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="content-colum-form-izq">
            <div class="description-nove">
              <p>Si tiene alguna consulta sobre los productos EuroHard o de algún producto en particular, lo
                invitamos a
                completar el siguiente formulario así lo ponemos en contacto con la persona que lo ayudara a
                la brevedad.
              </p>
              <p>Trataremos sus datos de manera confidencial.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="content-colum-contact-der">
            <form action="{{ route('formularios.envio.productos') }}" method="POST" class="row"
              enctype="multipart/form-data">
              @csrf
              <label class="label-forms">Nombre y apellido <span class="requerido">*</span></label>
              <input type="text" class="form-control contact-content @error('fullName') is-invalid @enderror"
                name="fullName" value="{{ old('fullName') }}">
              @error('fullName')
                <p class="text-danger p-0">{{ $message }}</p>
              @enderror
              <label class="label-forms">Teléfono <span class="requerido">*</span></label>
              <input type="text" class="form-control contact-content @error('phone') is-invalid @enderror"
                name="phone" value="{{ old('phone') }}">
              @error('phone')
                <p class="text-danger p-0">{{ $message }}</p>
              @enderror
              <label class="label-forms">Correo electrónico <span class="requerido">*</span></label>
              <input type="email" class="form-control contact-content @error('email') is-invalid @enderror"
                id="inputEmail4" name="email" value="{{ old('email') }}">
              @error('email')
                <p class="text-danger p-0">{{ $message }}</p>
              @enderror
              <label class="label-forms">Provincia <span class="requerido">*</span></label>
              <select class="form-select contact-content @error('province') is-invalid @enderror"
                aria-label="Default select example" name="province">
                <option value="">Seleccione la provincia</option>
                @foreach ($provincias as $provincia)
                  <option value="{{ $provincia->name }}" @selected(old('province') == $provincia->name)>
                    {{ Str::title($provincia->name) }}</option>
                @endforeach
              </select>
              @error('province')
                <p class="text-danger p-0">{{ $message }}</p>
              @enderror
              <label class="label-forms">Usuario <span class="requerido">*</span></label>
              <input type="text" class="form-control contact-content @error('user') is-invalid @enderror"
                name="user" value="{{ old('user') }}">
              @error('user')
                <p class="text-danger p-0">{{ $message }}</p>
              @enderror
              <label class="label-forms">Razón de la consulta <span class="requerido">*</span></label>
              <select class="form-select contact-content @error('client') is-invalid @enderror"
                aria-label="Default select example" name="client">
                <option value="">Seleccione uno opción</option>
                <option value="consumidor final" @selected(old('client') == 'consumidor final')>Consumidor final</option>
                <option value="distribuidor" @selected(old('client') == 'distribuidor')>Distribuidor</option>
                <option value="otros" @selected(old('client') == 'otros')>Otros</option>
              </select>
              @error('client')
                <p class="text-danger p-0">{{ $message }}</p>
              @enderror
              <label class="label-forms">Código del producto a consultar <span class="requerido">*</span></label>
              <select class="form-select contact-content @error('cod_product') is-invalid @enderror"
                aria-label="Default select example" name="cod_product">
                <option value="">Consultas sobre productos e instalaciones</option>
                <option value="producto 1" @selected(old('cod_product') == 'producto 1')>Producto 1</option>
              </select>
              @error('cod_product')
                <p class="text-danger p-0">{{ $message }}</p>
              @enderror
              <label class="label-forms">Nombre del producto a consultar <span class="requerido">*</span></label>
              <input type="text" class="form-control contact-content @error('name_product') is-invalid @enderror"
                name="name_product" value="{{ old('name_product') }}">
              @error('name_product')
                <p class="text-danger p-0">{{ $message }}</p>
              @enderror
              <label class="label-forms">Su consulta <span class="requerido">*</span></label>
              <textarea class="form-control contact-content @error('consultation') is-invalid @enderror" name="consultation"
                id="Consulta" rows="8" aria-label="Consulta:">{{ old('consultation') }}</textarea>
              @error('consultation')
                <p class="text-danger p-0">{{ $message }}</p>
              @enderror
              <label class="label-forms">¿Desea adjuntar foto?</label>
              <input type="file" id="myfile" name="image" accept=".jpg,.jpeg,.png"
                class="form-control contact-content @error('image') is-invalid @enderror">
              @error('image')
                <p class="text-danger p-0">{{ $message }}</p>
              @enderror
              {{-- captcha --}}
              <div class="mt-2 mb-4">
                @error('g-recaptcha-response')
                  <p class="text-danger p-0">{{ $message }}</p>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary btn-form">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
