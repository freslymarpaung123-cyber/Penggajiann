<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Informasi Penggajian</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body style="background:#f4f6f9;">

@include('layouts.navigation')

<div class="container py-4">

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @yield('content')

</div>

</body>

</html>