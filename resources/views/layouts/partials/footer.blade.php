<footer class="footer-site">
  <div class="container-lg">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-12 p-3">
        <div class="subtitle1 blanco bold">
          CONTACTO
        </div>
        <div class="txt-information content-domicilio">
          Av. H. Yrigoyen 15750 (1852)<br>
          Burzaco, Buenos Aires, Argentina
        </div>
        <div class="txt-phone content-phone">
          (5411) 4002-4400 | <br>
          2206-4000
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
          CATEGORÍA<br> DE PRODUCTOS
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
            <li class="nav-item-menu-footer"><a href="{{ route('formularios') }}"
                class="nav-link-menu-footer {{ request()->routeIS('formularios') ? 'active-menu-footer' : '' }}">Formularios</a>
            </li>
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
          <a href="#youtube" class="icon-rrss-link">
            <i class="fab fa-youtube"></i>
          </a>
          <a href="#instagram" class="icon-rrss-link">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="content-float-icon-WA">
    <div class="icon-WA">
      <a href="#wa" class="icon-wa-link">
        <i class="fab fa-whatsapp"></i>
      </a>
    </div>
    <div class="icon-IG">
      <a href="#instagram" class="icon-wa-link">
        <i class="fab fa-instagram"></i>
      </a>
    </div>
    <div class="icon-YT">
      <a href="#youtube" class="icon-wa-link">
        <i class="fab fa-youtube"></i>
      </a>
    </div>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" crossorigin="anonymous">
</script>

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

<script>
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 4
      }
    }
  });
</script>
