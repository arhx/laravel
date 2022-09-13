<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/sass/public.scss','resources/js/public.js'])

    <title>{{ config('app.name') }}</title>

    @stack('head')
</head>
<body>
@include('layouts.menu')
<div class="container py-2">
    @yield('content')
</div>

<div id="ajax-modal-container"></div>
@stack('scripts')

@include('includes.flash')
</body>
</html>
