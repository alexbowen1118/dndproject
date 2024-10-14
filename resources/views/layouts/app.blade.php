<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('app.description', 'DND Project') }}">
    <meta name="author" content="Alex Bowen">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Scripts -->
    <script type="module" src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('extrajs')

    <!-- Fonts -->
    <link href="{{ asset('assets/css/webfonts.css') }}"  rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}"  rel="stylesheet">
    <link href="{{ asset('assets/css/app-sass.css') }}"  rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('extracss')

    @yield('extrahead')
</head>
<body>
    <div class="content">
        @yield('content')
    </div>

    <footer>
    </footer>

    @stack('scripts')
</body>
</html>
