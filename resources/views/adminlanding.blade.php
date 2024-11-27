@extends('layouts.main')

<title>@yield('title', 'Landing Admin')</title>

<style>
    .header {
        background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url({{ Vite::asset('resources/images/fondo-nosotros.jpg')}});
    }

    h5 {
        font-size: 20px;
    }
    .no-deco{
        text-decoration: none;
        color: white;
    }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-white">Control de Pedidos y Recompensas</h1> <br>
            
            <div class="col-md-4">
                <div class="card bg-success mb-3">
                    <div class="card-body">
                        <a href="/admin/orders" class="button no-deco">
                            <h5>Pedidos Activos </h5> <br> 
                            <h2>{{$actOrders}} &nbsp;<i class="bi bi-person-vcard-fill"></i> </h2>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-danger mb-3">
                    <div class="card-body">
                        <a href="/admin/record" class="button no-deco">
                            <h5>Historial de Pedidos </h5> <br> 
                            <h2>{{$compOrders}} &nbsp;<i class="bi bi-person-vcard-fill"></i> </h2>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-dark mb-3">
                    <div class="card-body">
                        <a href="{{ route('foods.create') }}" class="button no-deco">
                            <h5>Creación de Comidas </h5> <br> <br>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body" style="background-color:rgb(209, 144, 22);">
                        <a href="{{ route('foods.view') }}" class="button no-deco">
                            <h5>Vista de Todas las Comidas </h5> <br> 
                            <h2>{{$numDishes}} &nbsp;<i class="bi bi-person-vcard-fill"></i> </h2>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-3 bg-secondary ">
                    <div class="card-body">
                        <a href="{{ route('rewards.create') }}" class="button no-deco">
                            <h5>Creación de Rewards </h5> <br> <br>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body" style="background-color:rgb(19, 161, 161);">
                        <a href="{{ route('rewards.view') }}" class="button no-deco">
                            <h5>Vista de Todas las Rewards </h5> <br>
                            <h2>{{$numRewards}} &nbsp;<i class="bi bi-person-vcard-fill"></i> </h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <h1 class="text-white">Control de Posts</h1> <br>


            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3 options">
                    <div class="card-body">
                        <a href="{{ route('posts.create') }}" class="button no-deco">
                            <h5>Crear Post</h5> <br> <br>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-danger mb-3">
                    <div class="card-body" style="background-color:rgb(218, 11, 125);">
                        <a href="{{ route('posts.view') }}" class="button no-deco">
                            <h5>Ver Todos los Posts</h5> <br> 
                            <h2>{{$numPosts}} &nbsp;<i class="bi bi-person-vcard-fill"></i> </h2>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body" style="background-color:rgb(106, 23, 184);">
                        <a href="{{route('adminusers')}}" class="button no-deco">
                        <h5>Vista de Usuarios</h5> <br> 
                        <h2>{{$numUsers}} &nbsp;<i class="bi bi-person-vcard-fill"></i> </h2>
                    </a>
                    </div>
                </div>
            </div>

        
        </div>
    </div>
</header>
@endsection