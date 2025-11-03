<header class="content-header container-fluid" id="myHeader">
  <div class="row nav-desktop">
    <div class="col-lg-4 col-md-8 col-8 content-logo-search">
      <a href="/"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none link-logo">
        <img src="{{ asset('images/logo-eurohard.svg') }}" alt="EuroHard" class="logo-header" />
      </a>
      <form action="{{ route('productos.buscar') }}" class="form-search mobile" role="search">
        <input type="search" class="form-control" name="buscar" placeholder="Buscar..." aria-label="Buscar">
      </form>
    </div>

    <div class="col-lg-8 col-md-4 col-4">
      <ul class="nav content-nav">
        <li class="nav-item"><a href="{{ route('empresa') }}"
            class="nav-link {{ request()->routeIS('empresa') ? 'active' : '' }}">Empresa</a></li>
        <li class="nav-item"><a href="{{ route('productos') }}"
            class="nav-link {{ request()->routeIS('productos*') ? 'active' : '' }}" aria-current="page">Productos</a>
        </li>
        <li class="nav-item"><a href="{{ route('catalogo') }}"
            class="nav-link {{ request()->routeIS('catalogo') ? 'active' : '' }}">Catálogo</a></li>
        <li class="nav-item"><a href="{{ route('instructivos') }}"
            class="nav-link {{ request()->routeIS('instructivos') ? 'active' : '' }}">Instructivos</a></li>
        <li class="nav-item"><a href="{{ route('novedades') }}"
            class="nav-link {{ request()->routeIS('novedades') ? 'active' : '' }}">Novedades</a></li>
        <!-- Dropdown para Formularios -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->routeIS('formularios') ? 'active' : '' }}" href="#"
            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Formularios
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('formularios.experiencia') }}">Experiencia</a></li>
            <li><a class="dropdown-item" href="{{ route('formularios.distribuidores') }}">Distribuidores</a></li>
            <li><a class="dropdown-item" href="{{ route('formularios.productos') }}">Productos</a></li>
          </ul>
        </li>
        <li class="nav-item"><a href="{{ route('contacto') }}"
            class="nav-link {{ request()->routeIS('contacto') ? 'active' : '' }}">Contacto</a></li>
        {{-- 
        <li class="nav-item"><a href="#" class="nav-link btn-icon-cart"><img
                            src="{{ asset('images/icon-cart.svg') }}" alt="Carrito de Compras" class="icon-cart" /></a>
        </li> 
        --}}
      </ul>
    </div>
  </div>
  <nav class="navbar bg-body-tertiary fixed-top nav-mobile">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><img src="{{ asset('images/logo-eurohard.svg') }}" alt="EuroHard"
          class="logo-header" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <a class="navbar-brand" href="/"><img src="{{ asset('images/logo-EH-menu-mobile.svg') }}"
              alt="EuroHard" class="logo-header-menu-mobile" /></a>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link" {{ request()->routeIS('empresa') ? 'active' : '' }}"
                href="{{ route('empresa') }}">Empresa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" {{ request()->routeIS('productos') ? 'active' : '' }}"
                href="{{ route('productos') }}">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIS('catalogo') ? 'active' : '' }}"
                href="{{ route('catalogo') }}">Catálogo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIS('instructivos') ? 'active' : '' }}"
                href="{{ route('instructivos') }}">Instructivos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIS('novedades') ? 'active' : '' }}"
                href="{{ route('novedades') }}">Novedades</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle {{ request()->routeIS('formularios') ? 'active' : '' }}"
                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-current="page">
                Formularios
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="{{ route('formularios.experiencia') }}">
                    Experiencia
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('formularios.distribuidores') }}">
                    Distribuidores
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('formularios.productos') }}">
                    Productos
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIS('contacto') ? 'active' : '' }}"
                href="{{ route('contacto') }}">Contacto</a>
            </li>
          </ul>
          <form action="{{ route('productos.buscar') }}" class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Buscar"
              name="buscar">
            <button class="btn btn-EH-primary" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </div>
  </nav>
</header>
