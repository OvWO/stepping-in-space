<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <!-- Styles -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/layouts.css') }}" rel="stylesheet">
  <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tasks.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">

  <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>

<body>

  <div id="app">


        @if ($flash = session('message'))
            <div class="alert alert-success" id="flash-message" role="alert">
                {{ session('message') }}{{-- {{ $flash }} --}}
            </div>
        @endif

    @include('layouts.navbar')
    <main>
      @yield('content')
    </main>
    @include('layouts.footer')
    </div>
  <script type="text/javascript">
  //Menu toggle-button

  $(document).ready(function() {
    $(".menu-icon").on("click", function() {
      $("nav ul").toggleClass("showing");
    });
  });

  //Scrolling Effect
  $(window).on("scroll", function() {
    if ($(window).scrollTop()) {
      $('nav').addClass('black');
    } else {
      $('nav').removeClass('black');
    }
  })

  </script>
</body>

</html>
