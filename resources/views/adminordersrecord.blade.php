@extends('layouts.main')

<title>@yield('title', 'Historial de Ordenes - Admin')</title>

<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        .header {
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{ Vite::asset('resources/images/fondo-comida-2.jpg') }});
            background-size: cover;
            background-position: center;
            height: 200px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 2rem;
            color: #333;
        }

        .btn-back {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .orders-table th,
        .orders-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .orders-table th {
            background-color: #f0f0f0;
            color: #333;
        }

        .orders-table tr:hover {
            background-color: #f9f9f9;
        }
        .orders-table td:last-child {
            display: flex;
            gap: 10px;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #e67e22;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
            transition: color 0.3s;
        }
        .back-link:hover {
            color: #d35400;
        }
    </style>

@section('content')
</header>


    <div class="container">
        <header>
            <h1>Historial de Compras</h1>

            <a href="javascript:history.back()" class="back-link">← Regresar</a>
        </header>

        <table class="orders-table">
            <thead>
                <tr>
                    <th>ID Orden</th>
                    <th>Cliente</th>
                    <th>Plato</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Nota</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->username }}</td>
                        <td>{{ $order->dish_name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->Fecha_pedido }}</td>
                        <td>{{ $order->dish_total }}</td>
                        <td>{{ $order->comments ?? 'Sin nota' }}</td>
                        <td><span class="status {{ $order->status == 'Activo' ? 'active' : 'inactive' }}">{{ $order->status }}</span></td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection

