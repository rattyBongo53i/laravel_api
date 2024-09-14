<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon-light.png') }}" type="image/x-icon" sizes="180x180">
        <link rel="icon" href="{{ asset('assets/img/favicon-light.png') }}" type="image/x-icon" sizes="32x32">
        <link rel="icon" href="{{ asset('assets/img/favicon-light.png') }}" type="image/x-icon" sizes="16x16">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/material-dashboard.min.css') }}" rel="stylesheet">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
    
    
        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
        <script src="{{ asset('js/jquery-3.1.1.min.js') }}" ></script>
        <script src="{{ asset('js/popper.min.js') }}" ></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
        {{-- <script src="{{ asset('js/chartjs.min.js') }}" ></script>
        <script src="{{ asset('js/material-dashboard.js') }}" ></script> --}}
        
    </body>
</html>
