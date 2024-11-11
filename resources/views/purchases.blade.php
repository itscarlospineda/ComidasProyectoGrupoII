@extends('layouts.main')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
</head>

<body>

    <h1>Historial de pagos</h1>

    <div class="container">
    @foreach ($users as $user)
        <div class="article">
            <h2>Detalles del Pedido #{{ $user->order_id }}</h2>
            <p><strong>Nombre de Usuario:</strong> {{ $user->username }}</p>
            <p><strong>Nombre del Plato:</strong> {{ $user->dish_name }}</p>
            <p><strong>Precio del Plato:</strong> {{ $user->dish_price }}</p>
            <p><strong>Cantidad:</strong> {{ $user->quantity }}</p>
            <p><strong>Total del Plato:</strong> {{ $user->dish_total }}</p>
            <p><strong>Comentarios:</strong> {{ $user->comments }}</p>
            <p><strong>Fecha de Pedido:</strong> {{ $user->Fecha_pedido }}</p>
            <p><strong>Estado del Pedido:</strong> {{ $user->status }}</p>
        </div>
    @endforeach
</div>

</body>

</html>




@endsection