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
  <!-- Styles -->
  {{-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> --}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


  <link rel="shortcut icon" href="%PUBLIC_URL%/favicon.ico">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/layouts.css') }}" rel="stylesheet">
  <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
  {{-- tasks.css for flash messages --}}
  <link href="{{ asset('css/tasks.css') }}" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body>

  <div id="app" {{-- class="wrapper" --}}>

{{--             <div class="success" id="flash-message" >
                {{ session('message') }} <h1>holastyd</h1>
            </div> --}}
{{--          @if (session('message'))
          <h1>tiene mensajge!!!! {{ session('message') }}</h1>
        @endif --}}
        @if (session('message'))
            <div class="success" id="flash-message" >
                {{ session('message') }}{{-- {{ $flash }} --}}
            </div>
        @endif
        @if (session('error'))
            <div class="alert" id="flash-message" role="alert">
                {{ session('error') }}{{-- {{ $flash }} --}}
            </div>
        @endif
    {{-- <div class="wrapper"> --}}
    @include('layouts.header')
    <main>

      @yield('content')
    </main>
    @include('layouts.footer')
    <img src="https://2no.co/1BhM67" alt="iplogger.org - IP Logging Service" border="0">

    </div>
  {{-- </div> --}}
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
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121460299-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121460299-1');
</script>

</body>

</html>
