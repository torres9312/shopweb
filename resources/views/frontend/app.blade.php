<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ShopWeb') }}</title>
    
    <!-- Scripts -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon-32x32.png') }}" />
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/custom.css') }}" />

</head>
<body>
    @include('frontend.components.navbar');
    
    <main class="py-4">
            @yield('content')
    </main>
    
</body>


<!-- <script src="{{ asset('backend/js/main.js') }}"></script> -->
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
</html>
