<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - Admin</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/img/computer.svg') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/sweetalert2.min.css') }}">

    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
</head>
        <body class="app sidebar-mini rtl">
            @include('admin.partials.header')
            @include('admin.partials.sidebar')
            <main class="app-content">
                    
                @yield('content')
            </main> 
        </body>
        
<script src="{{ asset('backend/js/main.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
</html>