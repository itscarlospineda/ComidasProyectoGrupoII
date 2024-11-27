@extends('layouts.auth')

<title>@yield('title', 'Inicio de Sesión')</title>

@section('content')
<div class="container-fluid full-height">
    <div class="col-12 col-md-8 col-lg-6 mx-auto overlay-container">
        <a class="text-white" href="/" class="back-link">← Regresar a Inicio</a>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="d-flex flex-column align-items-center">
                <a class="d-flex align-items-center">
                    <img class="sm-logo" src="{{ Vite::asset('resources/images/logo5.PNG') }}" alt="Logo Sabor Catracho" width="300px">
                </a>

                <div class="row w-100 mb-4 px-3">
                    <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                    <input id="email" type="text" class="form-control mb-4 producto__descripcion @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" class="form-control mb-4 producto__descripcion @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Recuérdame') }}
                    </label>
                </div>

                <!--<div class="w-25 mb-3">
                    <button type="submit" class="producto__enlace w-100">
                        {{ __('Login') }}
                    </button>
                </div>-->
                <div class="w-25 mb-3">
                    <button type="submit" class="producto__enlace3 w-100">
                        {{ __('Iniciar') }}
                    </button> <br>

                </div>

                <a class="text-white" href="{{ route('register') }}">No tienes cuenta? Registrate aquí.</a>

            </div>

        </form>
    </div>
</div>

@endsection
