@extends('layouts.auth')

<title>@yield('title', 'Inicio de Sesión')</title>

@section('content')
<div class="container-fluid full-height">
    <div class="col-12 col-md-8 col-lg-6 mx-auto overlay-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="d-flex flex-column align-items-center">
                <a class="mb-4 text-center" style="text-decoration: none">
                    <span class="fw-bold" style="color: white; font-size:48px;"> Sabor</span>
                    <span class="fw-bold" style="color: rgb(43, 43, 175); font-size:48px;">Catracho</span>
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
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
