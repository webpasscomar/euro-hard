<footer class="footer-site">
  <div class="container-lg">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-12 p-3">
        <div class="subtitle1 blanco bold">
          CONTACTO
        </div>
        <div class="txt-information">
          {{-- Av. H. Yrigoyen 15750 (1852)<br>
                    Burzaco, Buenos Aires, Argentina --}}
          {{ $contact->address }}
        </div>
        <div class="txt-phone content-phone">
          {{-- (5411) 4002-4400 | <br>
                    2206-4000 --}}
          <br>
          {{ $contact->phone }}
        </div>
        <div class="subtitle1 blanco bold">
          HORARIOS
        </div>
        <div class="txt-information">
          Lun a Vie 9 a 12 y de 14 a 17:30
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 p-3">
        <div class="subtitle1 blanco bold">
          SECCIONES
        </div>
        <div class="content-menu-footer">
          <ul class="content-list-menu-footer">
            <li class="nav-item-menu-footer"><a href="{{ route('empresa') }}"
                class="nav-link-menu-footer {{ request()->routeIS('empresa') ? 'active-menu-footer' : '' }}">Empresa</a>
            </li>
            <li class="nav-item-menu-footer"><a href="{{ route('productos') }}"
                class="nav-link-menu-footer {{ request()->routeIS('productos') ? 'active-menu-footer' : '' }}"
                aria-current="page">Productos</a></li>
            <li class="nav-item-menu-footer"><a href="{{ route('catalogo') }}"
                class="nav-link-menu-footer {{ request()->routeIS('catalogo') ? 'active-menu-footer' : '' }}">Catálogo</a>
            </li>
            <li class="nav-item-menu-footer"><a href="{{ route('instructivos') }}"
                class="nav-link-menu-footer {{ request()->routeIS('instructivos') ? 'active-menu-footer' : '' }}">Instructivos</a>
            </li>
            <li class="nav-item-menu-footer"><a href="{{ route('novedades') }}"
                class="nav-link-menu-footer {{ request()->routeIS('novedades') ? 'active-menu-footer' : '' }}">Novedades</a>
            </li>
            {{-- <li class="nav-item-menu-footer"><a href="{{ route('formularios') }}"
                                class="nav-link-menu-footer {{ request()->routeIS('formularios') ? 'active-menu-footer' : '' }}">Formularios</a>
                        </li> --}}
            <li class="nav-item-menu-footer"><a href="{{ route('contacto') }}"
                class="nav-link-menu-footer {{ request()->routeIS('contacto') ? 'active-menu-footer' : '' }}">Contacto</a>
            </li>
          </ul>

        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 p-3">
        <div class="subtitle1 blanco bold">
          DATA FISCAL
        </div>
        <img src="{{ asset('images/datafiscal-qr.png') }}" alt="">
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 p-3">
        <div class="subtitle1 blanco bold">
          NUESTRAS REDES
        </div>
        <div class="content-rrss">
          <a href="{{ $contact->youtube }}" class="icon-rrss-link" target="_blank">
            <i class="fab fa-youtube"></i>
          </a>
          <a href="{{ $contact->instagram }}" class="icon-rrss-link" target="_blank">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="content-float-icon-WA">
    <div class="icon-WA">
      <a href="https://wa.me/{{ $contact->whatsapp }}" class="icon-wa-link" target="_blank">
        <i class="fab fa-whatsapp"></i>
      </a>
    </div>
    <div class="icon-IG">
      <a href="{{ $contact->instagram }}" class="icon-wa-link" target="_blank">
        <i class="fab fa-instagram"></i>
      </a>
    </div>
    <div class="icon-YT">
      <a href="{{ $contact->youtube }}" class="icon-wa-link" target="_blank">
        <i class="fab fa-youtube"></i>
      </a>
    </div>
  </div>
</footer>


<script>
  window.onscroll = function() {
    myFunction()
  };

  var header = document.getElementById("myHeader");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
</script>
