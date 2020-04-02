<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '1Tech Portal') }}</title>

    <!-- Scripts -->
    <script src="/admin/js/app.js" defer></script>
    <script src="/admin/js/core.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/icons@1.0.1/css/all.min.css">

    <!-- Styles -->
    <link href="/admin/css/app.css" rel="stylesheet">
    <link href="/admin/css/core.css" rel="stylesheet">

</head>
<body class="c-app flex-row align-items-center">

<img src="/admin/img/background.jpg" class="bg">

<div class="container">
    <div class="row justify-content-center">
        @yield('auth')
    </div>
</div>

<script src="/admin/js/app.js"></script>

</body>
