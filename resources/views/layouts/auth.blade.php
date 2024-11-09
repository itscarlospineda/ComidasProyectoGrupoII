<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SaborCatracho - Login') }}</title>

    <!-- Bootstrap Dependency -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/js/app.js','resources/css/normalize.css', 'resources/css/app.css','resources/css/fonts.css'])

    <style>
        body {
            margin: 0;
            padding: 0;
            background-attachment: fixed;
            background-size: cover;
            background-repeat: no-repeat;
            z-index: 1;
            font-size:2rem;

            background-image: url({{ Vite::asset('resources/images/fondo-login.jpg')}});
        }

        .overlay-container {
        background: rgba(255, 255, 255, 0.05); 
        padding: 20px;
        margin-top: 30px; 
        margin-bottom: 30px; 
        border-radius: 15px;
        border: 2px solid white;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
    }

    .full-height {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .producto__enlace {
        color: white !important;
        background: rgba(255,255,255,0.01);
    }

    .producto__enlace::hover {
        background-color: var(--primary);
    }
    </style>
</head>
<body>            
    @yield('content')
</body>
</html>
