<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;900&display=swap" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/logo5.PNG') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GuitarLA') }}</title>

    <!-- Bootstrap Dependency -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/js/app.js','resources/css/normalize.css', 'resources/css/app.css'])

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .minimenu{
            width: 35vh;
            /*width: 270px;
            height: 450px;*/
            height: 58vh;
            font-size: 20px;
            text-align: center;
        }

        .minimenu a {
            text-decoration: none;
        }

        .minimenu a:hover {
            color: black;
        }

        footer {
            /*background-color: #333;*/
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 20px;
            /*margin-top: 80px;*/
            /*box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);*/
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #e67e22;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Responsive Navbar */
        @media (max-width: 768px) {
            .navegacion {
                flex-direction: column;
                align-items: center;
                padding: 10px;
            }

            .navegacion__enlace {
                margin-bottom: 10px;
            }

            .sm-logo {
                width: 75px;
            }

            .modelo__nombre {
                font-size: 6rem;
            }


        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
            padding: 50px;
            background-color: #000000;
        }

        .nav_links {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0 10px;
            gap: 20px;
        }

        .nav_links li {
            display: flex;
            align-items: center;
        }

    </style>
</head>
<body>
        <main>
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container-fluid">
                    <a class="d-flex align-items-center">
                        <img class="sm-logo" src="{{ Vite::asset('resources/images/logo5.PNG') }}" alt="Logo Sabor Catracho" width="100px">
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                  <div class="collapse navbar-collapse" id="navbarTogglerDemo02" style="background-color: black;">
                    <ul class="navbar-nav align-items-center ms-auto nav-links px-2" style="padding-left:30px;padding-right:30px;">
                       
                        @if(Auth::check() && Auth::user()->role == 'admin')
                        <a class="navegacion__enlace mx-2" href="/admin/dashboard">Inicio</a>                        
                        @else
                        <a class="navegacion__enlace mx-2" href="/">Inicio</a>
                        <a class="navegacion__enlace mx-2" href="/aboutus">Nosotros</a>
                        <a class="navegacion__enlace mx-2" href="/#blog">Blog</a>
                        <a class="navegacion__enlace mx-2" href="{{ route('foods')}}">Comidas</a>
                        @endif

                        @guest
                        @if (Route::has('login'))
                                <a class="navegacion__enlace mx-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif
                        @if (Route::has('register'))
                                <a class="navegacion__enlace mx-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a class="nav-item dropdown">
                            <a id="navbarDropdown" class="navegacion__enlace mx-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="bi bi-people"></i>&nbsp;
                                {{ Auth::user()->username }}
                            </a>
        
                            <div class="dropdown-menu dropdown-menu-end" style="border-radius: 15px; padding: 5px;" aria-labelledby="navbarDropdown">
                                
                                <div class="dropdown-item minimenu">
                                    <div>
                                        @if (Auth::user()->profile_picture ==  'profile_pictures/default-profile.png')
                                        <img src="{{ asset('storage/profile_pictures/perrochill.png') }}"  alt="Profile Picture" style="max-width: 150px; max-height: 150px;">
                                        @else
                                        <img src="{{ asset('storage/profile_pictures/' . (Auth::user()->profile_picture)) }}"  alt="Profile Picture" style="max-width: 150px; max-height: 150px;">
                                        @endif
        
                                        <br>
                                        <span href="" style="color:black;">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</span> <br>
                                        <span href="" style="color:#e99401;">{{ Auth::user()->username }}</span> <br>

                                    @if(Auth::user()->role !== 'admin')
                                        <span href="" style="color: black;">
                                            <img src="{{ Vite::asset('resources/images/star2.png') }}" height="15%" alt="*">
                                            <span href="" class="fw-bold" style="color:#e99401;">{{ Auth::user()->points }}</span> Puntos
                                        </span> <br>
                                    </div>
                                    
                                        <a href="/">Inicio</a> <br>
                                        <a href="/settings">Opciones</a> <br>
                                    @endif
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         {{ __('Cerrar Sesión') }}</a>
                                
                                </div>
        
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </a>
                    @endguest
                    </ul>
                  </div>
                </div>
              </nav>
                       
    
            <header class="header" style="margin-top:50px;">
                <div class="header__contenedor">
                    <div class="header__barra">
                        <a>
                            <img src="{{ Vite::asset('resources/images/logo5.PNG') }}" alt="Logo Sabor Catracho" width="230px">
                        </a>
                    </div>
                    
            @yield('content')
            <footer>
                <p>&copy; 2024 SaborCatracho | Todos los derechos reservados</p>
                <p>Dirección: Avenida Circunvalación, San Pedro Sula, Honduras | Teléfono: +504 0000-0000</p>
            </footer>
        </main>
</body>
</html>
