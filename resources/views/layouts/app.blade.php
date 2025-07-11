<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="author" content="">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('metaTitle', 'EuroHard')</title>
  <meta name="description" content="@yield('metaDescription', 'EuroHard | Herrajes y accesorios')">

  <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon-96x96.png') }}" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon/favicon-96x96.png') }}" />
  <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}" />
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}" />
  <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}" />

  <!-- Bootstrap core CSS -->
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

  <!-- Custom styles for this template -->
  <!-- <link href="./public/css/album.css" rel="stylesheet"> -->
  <!-- <link href="./public/css/table.css" rel="stylesheet"> -->
  {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}

  <!-- Google fonts Libre Franklin -->
  {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&display=swap"
  rel="stylesheet"> --}}

  <!-- FontAwesome Icons -->
  {{-- <script src="https://kit.fontawesome.com/0d72066054.js" crossorigin="anonymous"></script> --}}

  <!-- Google fonts Libre Franklin -->
  {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&display=swap"
  rel="stylesheet"> --}}



  {{-- < src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script> --}}
  {{-- <link rel="stylesheet" href="{{ asset('vendor/owlCarousel/dist/assets/owl.carousel.min.css') }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('vendor/owlCarousel/dist/assets/owl.theme.default.min.css') }}"> --}}
  <!-- Script carrusel -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
  </script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" crossorigin="anonymous"> --}}
  </script>
  <!-- Scripts -->
  @stack('head')
  @vite(['resources/css/style.css', 'resources/js/app.js'])

</head>

<body>

  @include('layouts.partials.header')


  <div id="app">

    <main>
      @yield('content')
      @include('sweetalert::alert')
    </main>

  </div>


  @include('layouts.partials.footer')
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/owlCarousel/dist/owl.carousel.min.js') }}"></script>
  <script src={{ 'https://www.google.com/recaptcha/api.js?render=' . config('services.recaptcha.site_key') }}></script>
  <script>
    document.addEventListener('submit', (e) => {
      e.preventDefault();
      grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
          action: 'submit'
        }).then(function(token) {
          let form = e.target;
          let input = document.createElement('input');
          input.type = "hidden";
          input.name = "g-recaptcha-response";
          input.value = token;

          form.appendChild(input);
          form.submit();
        });
      });
    });
  </script>


  @stack('js')
</body>

</html>
