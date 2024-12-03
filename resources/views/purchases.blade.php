@extends('layouts.main')

<title>@yield('title', 'Compras Realizadas')</title>

<style>

    .header {
        background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url({{ Vite::asset('resources/images/comida-login.png')}});
    }

    h1 {
        text-align: center;
        color: #333;
        margin-top: 20px;
    }

    .container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .article {
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .article:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .article h2 {
        font-size: 1.5em;
        color: #333;
        margin: 0 0 10px;
    }

    .article p {
        color: #555;
        line-height: 1.6;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .container {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }
    }

    @media (max-width: 480px) {
        .container {
            grid-template-columns: 1fr;
        }
    }
</style>

@section('content')

        <div class="modelo">
            <p class="modelo__nombre">Historial de Pagos</p>
        </div>
    </div>
</header>

    <div class="container">
    @if ($users->isEmpty())
        <p><strong style="color: var(--primary)">SIN PAGOS REALIZADOS</strong></p>

    @else    
    @foreach ($users as $user)
        <div class="article">
            <h2 class="text-black">Detalles del Pedido #{{ $user->order_id }}</h2>
            <p><strong style="color: var(--primary)">Nombre de Usuario:</strong> {{ $user->username }}</p>
            <p><strong style="color: var(--primary)">Nombre del Plato:</strong> {{ $user->dish_name }}</p>
            <p><strong style="color: var(--primary)">Detalles del plato:</strong> {{ $user->espef }}</p>
            <p><strong style="color: var(--primary)">Precio del Plato:</strong> L{{ $user->dish_price }}</p>
            <p><strong style="color: var(--primary)">Cantidad:</strong> {{ $user->quantity }}</p>
            <p><strong style="color: var(--primary)">Total del Plato:</strong> {{ $user->dish_total }}</p>
            <p><strong style="color: var(--primary)">Comentarios:</strong> {{ $user->comments }}</p>
            <p><strong style="color: var(--primary)">Fecha de Pedido:</strong> {{ date('d/m/Y h:i A', strtotime($user->Fecha_pedido)) }}</p>
            <p><strong style="color: var(--primary)">Estado del Pedido:</strong> {{ $user->status }}</p>
        </div>
    @endforeach
    @endif
    </div>

@endsection