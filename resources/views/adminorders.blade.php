<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Órdenes Activas - Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
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

        .status {
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        .status.active {
            background-color: #28a745;
            color: white;
        }

        .status.cancelled {
            background-color: #dc3545;
            color: white;
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
            background-color: #28a745;
            color: white;
        }

        .btn-action.entregar:hover {
            background-color: #218838;
        }

        .btn-action.cancelar {
            background-color: #dc3545;
            color: white;
        }

        .btn-action.cancelar:hover {
            background-color: #c82333;
        }

        .orders-table td:last-child {
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Órdenes Activas</h1>
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
                    <th>Acciones</th>
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
                        <td>
                        <form action="{{ route('okorder', ['orderId' => $order->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('POST') 
                        <button type="submit" class="btn-action entregar">Entregar</button>
                        </form>
                        <form action="{{ route('cancelorder', ['orderId' => $order->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('POST') 
                        <button type="submit" class="btn-action cancelar">Cancelar</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
