@extends('layouts.app')

@section('content')
  <div class="main-container">
    <div class="container-hero" style="height: 320px !important;">
      <div class="container-fluid">
        <div class="container-title-hero">
          <div class="content-icon-EH-hero">
            <img src="images/icono-EH.svg" class="icon-EH-hero">
          </div>
          <h1 class="title-hero">Innovación y Evolución en Herrajes</h1>
        </div>
      </div>
      <div class="img-hero">
        <div class="img-overlay"></div>
        <img src="{{ asset('img/empresa.jpg') }}" alt="Empresa" class="img-fluid">
      </div>
    </div>

    <div class="container">
      <div class="row">

        <h5 class="title-category gris">
          Conocénos
        </h5>
        <div class="col-md-6">
          <p>Con más de 15 años construyendo calidad Argentina, EUROHARD se ha consolidado como una de las tres marcas líderes de herrajes y accesorios para el mueble en todo el país, siendo la más joven entre ellas y la de mayor proyección de crecimiento.</p>
          
          <p>En EUROHARD no solo fabricamos herrajes, impulsamos el desarrollo de una industria en constante evolución y
            seguimos apostando al crecimiento, con una visión centrada en la calidad, la innovación tecnológica y la
            mejora
            continua.</p>

          <p>Nos destacamos por ofrecer una combinación de competitividad, variedad y disponibilidad, con un catálogo que
            supera los 2.000 productos en stock.</p>

          <p>Con el objetivo de acompañar el crecimiento del sector y elevar los estándares de servicio, durante 2023 y
            2024
            hemos impulsado dos grandes transformaciones:</p>

          <p>
          <ul>
            <li>
              Transformación Digital, implementando SAP B1 y PRODUMEX (WMS) para optimizar nuestra gestión sobre una
              plataforma de primera línea a nivel mundial, con el objetivo de desarrollar nuevos y mejores servicios para
              nuestros clientes.</li>
          </ul>
          </p>


        </div>
        <div class="col-md-6">
          <p>
          <ul>
            <li>
              <b>Reingeniería Logística</b>, hemos completado la remodelación de nuestros depósitos y estamos incorporando equipamiento de última generación para la optimización de los procesos de recepción, almacenamiento y despacho de productos. Algunos de los principales logros que podemos destacar son el incremento de un 95% en la capacidad de almacenamiento, la reducción en un 50% del tiempo promedio de preparación de pedidos, entre otros.
            </li>
          </ul>
          </p>

          <p>
            En EUROHARD estamos en constante análisis de los avances de la industria y de las últimas tendencias en el sector global, para así estar en la vanguardia del diseño de herrajes para muebles y construcción.</p>

          <p>Gracias a este trabajo, en 2025 lanzamos cinco nuevas líneas de productos que ampliarán nuestra presencia en la industria nacional y nos abrirán camino a más alianzas estratégicas.</p>

          <p>EUROHARD es innovación, compromiso y evolución constante.</p>

          <p><b>Una empresa Argentina, hecha por argentinos</b></p>
        </div>

      </div>
      <div class="row">

      </div>
    </div>
  @endsection
