<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TOP CARS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @auth()
      <div class="wrapper">
         @include('layouts.navbars.sidebar')
         <div class="main-panel">
            @include('layouts.navbars.navbar-admin')
            <div class="content">
               @yield('content')
            </div>
         </div>
      </div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
      </form>
      @else
      @include('layouts.navbars.navbar-admin')
      <div class="wrapper wrapper-full-page"  style="background-image: url('{{ asset('assets/img/bg-login.jpg') }}'); background-size: cover; background-position: top center;align-items: center;">
         <div class="full-page {{ $contentClass ?? '' }}"  style="background-image: url('{{ asset('assets/img/bg-login.jpg') }}'); background-size: cover; background-position: top center;align-items: center;  ">
            <div class="content">
               <div class="container">
                  @yield('content')
               </div>
            </div>
         </div>
      </div>
      @endauth
    </div>
</body>
</html>
