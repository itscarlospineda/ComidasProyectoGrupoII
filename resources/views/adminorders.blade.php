@extends('layouts.main')

<title>@yield('title', 'Ordenes Activas - Admin')</title>

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

    .btn-action {
        padding: 8px 15px;
        margin-right: 5px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
        font-size: 1rem;
        border: none;
    }

    .btn-action.entregar {
        background-color: #007bff;
        color: white;
    }

    .btn-action.entregar:hover {
        background-color: #0056b3;
    }

    .btn-action.cancelar {
        background-color: #dc3545;
        color: white;
    }
    .btn-action.cancelar:hover {
        background-color: #bd2130;
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


@section('content').

</header>
    <div class="container">

        <header>
            <h1>Órdenes Activas</h1>
            <a href="javascript:history.back()" class="back-link">← Regresar</a>
        </header>

        <table class="orders-table">
            <thead>
                <tr>
                    <th>ID Orden</th>
                    <th>Cliente</th>
                    <th>Plato</th>
                    <th>Detalles</th>
                    <th>Cantidad</th>

                    <!--<th>Fecha</th>-->
                    <th>Total</th>
                    <th>Nota</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if ($orders->isEmpty())
                    <tr>
                        <td colspan="9" style="text-align: center; padding: 20px; color: #888;">
                            <strong>SIN ÓRDENES ACTIVAS</strong>
                        </td>
                    </tr>
                @else
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->username }}</td>
                            <td>{{ $order->dish_name }}</td>
                            <td>{{ $order->espef}}</td>
                            <td>{{ $order->quantity }}</td>
                            <!--<td>{{ $order->Fecha_pedido }}</td>-->
                            <td>{{ $order->dish_total }}</td>
                            <td>{{ $order->comments ?? 'Sin nota' }}</td>
                            <td><span class="status {{ $order->status == 'Activo' ? 'active' : 'inactive' }}">{{ $order->status }}</span></td>
                            <td>
                                <form action="{{ route('okorder', ['orderId' => $order->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('POST') 
                                    <button type="submit" class="btn-action entregar">Entregar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection 