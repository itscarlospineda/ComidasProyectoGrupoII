@extends('layouts.main')

<title>@yield('title', 'Menú de Comidas - Sabor Catracho')</title>

<style>

    /* Estilo para el fondo del header */
    .header {
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{ Vite::asset('resources/images/tacos-bg.jpg') }});
        background-size: cover;
        background-position: center;
        height: 200px;
    }

    /* Estilo de las tarjetas */
    .card {
        overflow: hidden; 
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    /* Imagenenes */
    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 0; 
        transition: transform 0.3s ease;
    }

    .card img:hover {
        transform: scale(1.05); 
    }

    /* Contenido tarjeta */
    .card-body {
        background-color: #333; 
        color: #fff;
        text-align: center;
        padding: 20px;
    }

    /* Tarjeta*/
    .card-titlee {
        font-size: 2rem;
        font-weight: bold;
        color: #EFF1F3;
    }
    .card-text {
        font-size: 1.5rem;
        color: #ccc; 
    }

    
    /* Precio */
    .fw-bold.text-success {
        font-size: 1.5rem;
        margin-top: 10px;
    }


    /* Mejorar el diseno para paginas pequenas */
    @media (max-width: 768px) {
        .section {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }
    }
</style>

   

@section('content')
        <div class="modelo">
        </div>
    </div>
</header>

        <div class="container my-5" style="margin-bottom: 80px;">
            <div class="text-center mb-5">
                <h2 class="modelo__nombre text-black">Nuestras Recompensas</h2>
                <p class="text-muted">Canjea tus puntos acumulados por complementos adicionales aquí.</p>
                <h2 class="productos__heading">Tus puntos: {{$points}}</h2>
            </div>
            <!--<h2 class="productos__heading">Recompensas</h2>
        <h2 class="productos__heading">Tus puntos: {{$points}}</h2>
        <div class="productos__grid">-->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($rewards as $reward)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0"> 
                        @if($reward->id == 1)
                            <img class="producto__imagen" src="{{ asset('storage/foods/tajadas.png') }}" alt="imagen comida">       
                        @elseif($reward->id == 2)
                            <img class="producto__imagen" src="{{ asset('storage/foods/tres-leches.jpg') }}" alt="imagen comida">       
                        @elseif($reward->id == 3)
                            <img class="producto__imagen" src="{{ asset('storage/foods/pollo-chuco.jpeg') }}" alt="imagen comida">       
                        @elseif($reward->id == 4)
                            <img class="producto__imagen" src="{{ asset('storage/foods/pollo-chuco.jpeg') }}" alt="imagen comida">       
                        @elseif($reward->id > 4)
                            <img class="producto__imagen" alt="imagen comida">       
                        @endif

                        <!-- Contenido de la tarjeta -->
                        <div class="card-body">
                                <h5 class="card-titlee">{{$reward->Name}}</h3>
                                <p class="card-text">{{$reward->Description}}</p>
                                <p class="producto__precio">{{$reward->Points_needed}}</p>
                                @if($points >= $reward->Points_needed)
                                    <a class="btn btn-warning text-white" href="{{route('claimreward', ['rewardId' => $reward->id] )}}">Reclamar Ahora</a>
                                @else
                                <p class="text-white">Puntos Insuficientes</p>
                                @endif       
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


@endsection