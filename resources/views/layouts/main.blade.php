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


       /* .bar {
            background-color: rgb(247, 247, 247);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }*/

        .minimenu{
            /*width: 35vh;*/
            width: 270px;
            height: 450px;
            /*height: 65vh;*/
            font-size: 20px;
            text-align: center;
        }

        .minimenu a {
            text-decoration: none;
        }

        .minimenu a:hover {
            color: black;
        }

        /*.header {
        background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url({{ Vite::asset('resources/images/carne-fondo2.png')}});
        }*/
        

        footer {
            /*background-color: #333;*/
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-top: 80px;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
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
        }
    </style>
</head>
<body>
        <main>
            <header class="header">
                <div class="header__contenedor">
                    <div class="header__barra">
                        <a>
                            <img src="{{ Vite::asset('resources/images/logo5.PNG') }}" alt="Logo Sabor Catracho" width="250px">
                            <!--<span class="fw-bold" style="color: white; font-size:65px;"> Sabor</span>
                            <span class="fw-bold" style="color: rgb(43, 43, 175); font-size:65px;">Catracho </span>-->
                        </a>
            
                        <nav class="navegacion">
                            <a class="navegacion__enlace" href="/">Inicio</a>
                            <a class="navegacion__enlace" href="/aboutus">Nosotros</a>
                            <a class="navegacion__enlace" href="/#blog">Blog</a>
                            <a class="navegacion__enlace" href="{{ route('foods')}}">Comidas</a>
                            @guest
                            @if (Route::has('login'))
                                <a class="nav-item">
                                    <a class="navegacion__enlace" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </a>
                            @endif
            
                            @if (Route::has('register'))
                                <a class="nav-item">
                                    <a class="navegacion__enlace" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </a>
                            @endif
                        @else
                            <a class="nav-item dropdown">
                                <a id="navbarDropdown" class="navegacion__enlace dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="bi bi-people"></i>&nbsp;
                                    {{ Auth::user()->username }}
                                </a>
            
                                <div class="dropdown-menu dropdown-menu-end" style="border-radius: 15px; padding: 5px;" aria-labelledby="navbarDropdown">
                                    
                                    <div class="dropdown-item minimenu">
                                        <div>
                                            @if (Auth::user()->profile_picture ==  'profile_pictures/default-profile.png')
                                            <img src="{{ asset('storage/profile_pictures/default-profile.png') }}"  alt="Profile Picture" style="max-width: 150px; max-height: 150px;">
                                            @else
                                            <img src="{{ asset('storage/profile_pictures/' . (Auth::user()->profile_picture)) }}"  alt="Profile Picture" style="max-width: 150px; max-height: 150px;">
                                            @endif 
            
                                            <br>
                                            <span href="" style="color:black;">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</span> <br>
                                            <span href="" style="color:#e99401;">{{ Auth::user()->username }}</span> <br>
                                            <span href="" style="color: black;">
                                                <img src="{{ Vite::asset('resources/images/star2.png') }}" height="15%" alt="*">
                                                <span href="" class="fw-bold" style="color:#e99401;">{{ Auth::user()->points }}</span> Puntos
                                            </span> <br> <br>
                                        </div>
                                        <a href="/">Inicio</a> <br>
                                        <a href="/settings">Opciones</a> <br>
                                        <a href="{{ route ('rewards')}}">Recompensas</a> <br>
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
                        </nav>
                    </div>
            @yield('content')
            <footer>
                <p>&copy; 2024 SaborCatracho | Todos los derechos reservados</p>
                <p>Dirección: Avenida Circunvalación, San Pedro Sula, Honduras | Teléfono: +504 0000-0000</p>
            </footer>
        </main>
</body>
</html>
