<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ mix('/css/public.css') }}">

    <title>{{ config('app.name') }}</title>

    @stack('head')
</head>
<body>
@include('layouts.menu')
<div class="container py-2">
    @yield('content')
</div>

<div id="ajax-modal-container"></div>
<script src="{{ mix('/js/public.js') }}"></script>
@stack('scripts')

@include('includes.flash')
</body>
</html>