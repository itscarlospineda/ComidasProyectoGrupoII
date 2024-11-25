@extends('layouts.main')

<title>@yield('title', 'Menú de Comidas - Sabor Catracho')</title>

<style>
    /* Estilo para el fondo del header */
    .header {
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{ Vite::asset('resources/images/fondo-comida-2.jpg') }});
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
        font-size: 1.2rem;
        font-weight: bold;
        color: #EFF1F3;
    }
    .card-text {
        font-size: 1rem;
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
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="text-warning">Nuestro Menú</h2>
        <p class="text-muted">Descubre los mejores sabores tradicionales en SPS</p>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($dishes as $dish)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ Vite::asset('resources/images/carne-fondo2.png') }}" class="card-img-top" alt="Imagen del plato">

                <!-- Contenido de la tarjeta -->
                <div class="card-body">
                    <h5 class="card-titlee">{{ $dish->name }}</h5>
                    <p class="card-text">{{ $dish->desc }}</p>
                    <p class="fw-bold text-success">L{{ number_format($dish->price, 2) }}</p>
                    <a href="{{ route('viewproduct', ['dishId' => $dish->id]) }}" class="btn btn-warning">Ver Producto</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
