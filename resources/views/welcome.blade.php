<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- color CSS -->
    <link href="{{ asset('css/colors/megna.css') }}" id="theme" rel="stylesheet">

    @stack('styles')

    <script type="text/javascript" src="{{ asset('js/utils.js') }}"></script>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Selamat Datang di Sistem Penjaminan Mutu Internal (SPMI)</h4>
            <p class="card-text">Sistem ini dirancang untuk membantu institusi pendidikan dalam mengelola dan meningkatkan mutu pendidikan secara internal. Dengan SPMI, Anda dapat melakukan evaluasi, perencanaan, dan pelaporan mutu pendidikan dengan lebih efisien dan efektif.</p>
            <a href="{{ route('login.create') }}" class="btn btn-primary">Login</a>
        </div>
    </div>
</body>
</html>