@extends('layouts.main')

<title>@yield('title', 'Opciones')</title>

<style>
    .header {
        background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url({{ Vite::asset('resources/images/comida-login.png')}});
    }
</style>

@section('content')

            <div class="modelo">
                <p class="modelo__nombre">Opciones</p>
            </div>
        </div>
    </header>


    <div class="pt-4">
        <section>
            <div class="container col-md-12" style="height: 5rem 0;">
                <div class="row">

                    @if($user)
                    <div class="col-md-4">
                        <a class="producto__enlace" href="{{ route('editusers.show', ['id' => $user->id]) }}">
                            <img src="{{ Vite::asset('resources/images/ajustes-perfil.jpg') }}" alt="" width="200px;"> <br>
                            <span class="producto__descripcion">Ajustes de Perfil</span>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a class="producto__enlace" href="{{ route('purchases',['UserId' => $user->id])  }}">
                            <img src="{{ Vite::asset('resources/images/bag.png') }}" alt="" width="200px;"> <br>
                            <span class="producto__descripcion">Historial de Compras</span>
                        </a> 
                    </div>
                    @endif
                    <!--<div class="col-md-3">
                        <a class="producto__enlace" href="#">
                            <img src="{{ Vite::asset('resources/images/calendar.png') }}" alt="" width="200px;"> <br>
                            <span class="producto__descripcion">Reservas</span>
                        </a> 
                    </div>-->

                    <div class="col-md-4">
                        <a class="producto__enlace" href="#">
                            <img src="{{ Vite::asset('resources/images/info.png') }}" alt="" width="200px;"> <br>
                            <span class="producto__descripcion">Información Adicional</span>
                        </a> 
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection 