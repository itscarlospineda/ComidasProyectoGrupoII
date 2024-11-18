@extends('layouts.main')

<title>@yield('title', 'Menú de Comidas - Sabor Catracho')</title>

<style>
    /* Estilo para el fondo del header */
    .header {
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{ Vite::asset('resources/images/fondo-comida-2.jpg') }});
        background-size: cover;
        background-position: center;
        height: 400px;
    }

    /* Estilos para la sección del menú */
    .menu-section {
        margin-top: 100px;
        position: relative;
        padding: 50px 0;
        background-color: rgba(0, 0, 0, 0.8);
        border-radius: 15px;
        color: #fff;
    }

    .menu-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1;
    }

    .menu-content {
        position: relative;
        z-index: 2;
    }

    /* Usamos grid para organizar los elementos en bloques */
    .section {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Dos columnas mínimas de 250px */
        gap: 20px; /* Espaciado entre las tarjetas */
        margin-bottom: 40px;
    }

    .section h2 {
        font-size: 2rem;
        margin-bottom: 15px;
        color: #e67e22;
        flex-basis: 100%;
        text-align: center;
    }

    /* Estilos para los elementos de menú (productos) */
    .menu-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        gap: 20px;
        padding: 15px;
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 0.1);
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.5);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .menu-item:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.3);
    }

    /* Estilos para las imágenes de los platos */
    .menu-item img {
        width: 100%;
        max-width: 250px;
        height: 200px;
        object-fit: cover;
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .menu-item img:hover {
        transform: scale(1.05);
    }

    /* Estilos para los detalles de los platos (nombre, descripción y precio) */
    .menu-item div {
        text-align: center;
        color: #fff;
    }

    .producto__nombre {
        font-size: 1.5rem;
        font-weight: bold;
        color: #e67e22;
        margin-bottom: 10px;
    }

    .producto__descripcion {
        font-size: 1rem;
        color: #fff;
        margin-bottom: 15px;
    }

    .producto__precio {
        font-size: 1.2rem;
        font-weight: bold;
        color: #27ae60;
        margin-bottom: 15px;
    }

    .producto__enlace {
        font-size: 1rem;
        color: #fff;
        text-decoration: none;
        background-color: #e67e22;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .producto__enlace:hover {
        background-color: #d35400;
    }

    /* Responsive Design: Mejorar el diseño para pantallas más pequeñas */
    @media (max-width: 768px) {
        .section {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Una columna más delgada en pantallas pequeñas */
        }
    }
</style>

@section('content')
    <div class="menu-section">
        <div class="menu-content">
            @foreach ($dishes as $dish)
                <div class="menu-item">
                    <img class="producto__imagen" src="{{ Vite::asset('resources/images/carne-fondo2.png') }}" alt="Imagen del plato">

                    <div class="producto__contenido">
                        <h3 class="producto__nombre">{{ $dish->name }}</h3>
                        <p class="producto__descripcion">{{ $dish->desc }}</p>
                        <p class="producto__precio">L{{ number_format($dish->price, 2) }}</p>
                        <a class="producto__enlace" href="{{ route('viewproduct', ['dishId' => $dish->id]) }}">Ver Producto</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
