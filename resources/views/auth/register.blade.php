@extends('layouts.auth')

<title>@yield('title', 'Registro de Cuenta')</title>

@section('content')
<div class="container-fluid full-height">
    <div class="col-12 col-md-8 col-lg-6 mx-auto overlay-container">
        <a class="text-white" href="/" class="back-link">← Regresar a Inicio</a>

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <div class="d-flex flex-column align-items-center">
                <a class="d-flex align-items-center">
                    <img class="sm-logo" src="{{ Vite::asset('resources/images/logo5.PNG') }}" alt="Logo Sabor Catracho" width="300px">
                </a>


                <div class="row w-100 mb-4 px-3">

                    <div class="row mb-4">
                        <label for="username" class="col-md-4 form-label">{{ __('Nombre de Usuario') }}</label>
                        
                        <div class="col-md-8">
                            <input id="username" type="text" 
                                   class="form-control mb-4 producto__descripcion @error('username') is-invalid @enderror" 
                                   name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                   
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="fname" class="col-md-4 form-label">{{ __('Primer Nombre') }}</label>
                        
                        <div class="col-md-8">
                            <input id="fname" type="text" class="form-control mb-4 producto__descripcion" 
                            name="fname" required autocomplete="fname">   
                        </div>
                    </div>
                    

                    <div class="row mb-4">
                        <label for="lname" class="col-md-4 form-label">{{ __('Primer Apellido') }}</label>
                        
                        <div class="col-md-8">
                            <input id="lname" type="text" class="form-control mb-4 producto__descripcion" 
                            name="lname" required autocomplete="lname">   
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="email" class="col-md-4 form-label">{{ __('Correo Electrónico') }}</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control mb-4 producto__descripcion @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="phone_num" class="col-md-4 form-label">{{ __('Celular (####-####)') }}</label>
                        
                        <div class="col-md-8">
                            <input id="phone_num" type="text" 
                               class="form-control mb-4 producto__descripcion @error('phone_num') is-invalid @enderror" 
                               name="phone_num" value="{{ old('phone_num') }}" required autocomplete="phone_num">
                    
                            @error('phone_num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="row mb-4">
                        <label for="address" class="col-md-4 form-label">{{ __('Dirección') }}</label>
                        
                        <div class="col-md-8">
                            <input id="address" type="text" class="form-control mb-4 producto__descripcion" 
                            name="address" required autocomplete="address">
                        </div>                        
                    </div>
          

                    <div class="row mb-4">
                        <label for="password" class="col-md-4 form-label">{{ __('Contraseña') }}</label>
                        
                        <div class="col-md-8">
                            <input id="password" type="password" 
                            class="form-control mb-4 producto__descripcion @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="password-confirm" class="col-md-4 form-label">{{ __('Confirmar Contraseña') }}</label>
                        
                        <div class="col-md-8">
                            <input id="password-confirm" type="password" class="form-control mb-4 producto__descripcion" 
                            name="password_confirmation" required autocomplete="new-password">

                        </div>                        
                    </div>

                </div>

                <div class="w-25 mb-3">
                    <button type="submit" class="producto__enlace3 w-100">
                        {{ __('Register') }}
                    </button><br>
                </div>

                <a class="text-white" href="{{ route('login') }}">Ya tienes cuenta? Inicia sesión aquí.</a>

            </div>
        </form>
    </div>
</div>
@endsection