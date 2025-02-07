@extends('layouts.app')

@section('content')
  <div class="main-container">
    <div class="container-hero">
      <div class="container-fluid">
        <div class="container-title-hero">
          <div class="content-icon-EH-hero">
            <img src="images/icono-EH.svg" class="icon-EH-hero">
          </div>
          <h1 class="title-hero">Ubicación</h1>
        </div>
      </div>
      <div class="img-hero">
        <div class="img-overlay-contacto"></div>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3274.7017215509363!2d-58.40766033952137!3d-34.83859134914625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcd491284448c7%3A0xb78807c351c8daaf!2sPlacaSur%20S.A.!5e0!3m2!1ses!2sar!4v1737387616197!5m2!1ses!2sar"
          width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <h5 class="title-category gris">
            Contacto
          </h5>
        </div>
      </div>
      <form class="row">
        <div class="col-lg-6">
          <div class="content-colum-contact-izq">
            <input type="text" class="form-control contact-content" placeholder="Nombre:" aria-label="Nombre:">
            <input type="text" class="form-control contact-content" placeholder="Apellido:" aria-label="Apellido:">
            <select class="form-select contact-content" aria-label="Default select example">
              <option selected>Asunto:</option>
              <option value="1">Consulta</option>
              <option value="2">Presupuesto</option>
              <option value="3">Reclamo</option>
              <option value="3">Otros</option>
            </select>
            <input type="email" class="form-control contact-content" placeholder="Correo electrónico:"
              aria-label="Correo electrónico:" id="inputEmail4">
            <input type="text" class="form-control contact-content" placeholder="Teléfono de contacto:"
              aria-label="Teléfono de contacto:">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="content-colum-contact-der">
            <select class="form-select contact-content" aria-label="Default select example">
              <option selected>Empresa:</option>
              <option value="1">Distribuidor</option>
              <option value="2">Carpintero</option>
              <option value="3">Fabricante</option>
              <option value="3">Arquitecto</option>
              <option value="3">Consumidor final</option>
            </select>
            <textarea class="form-control contact-content" id="Mensaje" rows="8" placeholder="Mensaje:"
              aria-label="Mensaje:"></textarea>
            <button type="submit" class="btn btn-primary btn-contact">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
