@extends('layouts.app')

@section('content')
  <div class="main-container">
    <div class="container-hero">
      <div class="container-fluid">
        <div class="container-title-hero">
          <div class="content-icon-EH-hero">
            <img src="images/icono-EH-gris.svg" class="icon-EH-hero">
          </div>
          <h1 class="title-hero">Productos</h1>
        </div>
      </div>
      <div class="img-hero">
        <div class="img-overlay-contacto"></div>
        <img src="images/slider-home-6.jpg">
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
              <p>Si tiene alguna consulta sobre los productos EuroHard o de algún producto en particular, lo invitamos a
                completar el siguiente formulario así lo ponemos en contacto con la persona que lo ayudara a la brevedad.
              </p>
              <p>Trataremos sus datos de manera confidencial.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="content-colum-contact-der">
            <form class="row">
              <label class="label-forms">Nombre y apellido <span class="requerido">*</span></label>
              <input type="text" class="form-control contact-content" required>
              <label class="label-forms">Teléfono <span class="requerido">*</span></label>
              <input type="text" class="form-control contact-content" required>
              <label class="label-forms">Correo electrónico <span class="requerido">*</span></label>
              <input type="email" class="form-control contact-content" id="inputEmail4" required>
              <label class="label-forms">Provincia <span class="requerido">*</span></label>
              <select class="form-select contact-content" aria-label="Default select example" required>
                <option value="" selected>Seleccione la provincia</option>
                <option value="Buenos Aires">Buenos Aires</option>
                <option value="Ciudad Autónoma de Buenos Aires">Ciudad Autónoma de Buenos Aires</option>
                <option value="Catamarca">Catamarca</option>
                <option value="Chaco">Chaco</option>
                <option value="Chubut">Chubut</option>
                <option value="Córdoba">Córdoba</option>
                <option value="Corrientes">Corrientes</option>
                <option value="Entre Ríos">Entre Ríos</option>
                <option value="Formosa">Formosa</option>
                <option value="Jujuy">Jujuy</option>
                <option value="La Pampa">La Pampa</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Mendoza">Mendoza</option>
                <option value="Misiones">Misiones</option>
                <option value="Neuquén">Neuquén</option>
                <option value="Río Negro">Río Negro</option>
                <option value="Salta">Salta</option>
                <option value="San Juan">San Juan</option>
                <option value="San Luis">San Luis</option>
                <option value="Santa Cruz">Santa Cruz</option>
                <option value="Santa Fe">Santa Fe</option>
                <option value="Santiago del Estero">Santiago del Estero</option>
                <option value="Tierra del Fuego">Tierra del Fuego</option>
                <option value="Tucumán">Tucumán</option>
              </select>
              <label class="label-forms">Usuario <span class="requerido">*</span></label>
              <input type="text" class="form-control contact-content" required>
              <label class="label-forms">Razón de la consulta <span class="requerido">*</span></label>
              <select class="form-select contact-content" aria-label="Default select example" required>
                <option value="" selected>Seleccione uno opción</option>
                <option value="1">Consumidor final</option>
                <option value="2">Distribuidor</option>
                <option value="3">Otros</option>
              </select>
              <label class="label-forms">Código del producto a consultar <span class="requerido">*</span></label>
              <select class="form-select contact-content" aria-label="Default select example" required>
                <option value="" selected>Consultas sobre productos e instalaciones</option>
                <option value="2">Producto 1</option>
                <option value="2">Producto 2</option>
                <option value="3">Producto 3</option>
              </select>
              <label class="label-forms">Nombre del producto a consultar <span class="requerido">*</span></label>
              <input type="text" class="form-control contact-content" required>
              <label class="label-forms">Su consulta <span class="requerido">*</span></label>
              <textarea class="form-control contact-content" id="Consulta" rows="8" aria-label="Consulta:" required></textarea>
              <label class="label-forms">¿Desea adjuntar foto?</label>
              <input type="file" id="myfile" name="myfile" class="form-control contact-content">

              <button type="submit" class="btn btn-primary btn-form">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
