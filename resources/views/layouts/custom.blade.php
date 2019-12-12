<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Bugando Parish
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  
<link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Essential javascripts for application to work-->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{asset('js/jquery-3.2.1.min.js')}}" defer></script>
        <script src="{{asset('js/popper.min.js')}}" defer></script>
        <script src="{{asset('js/main.js')}}" defer></script>
        <script src="{{asset('js/custom.js')}}" defer></script>
</head>
<body>
<div id="app">

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
