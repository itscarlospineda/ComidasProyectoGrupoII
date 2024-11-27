@extends('layouts.main')

<title>@yield('title', 'Página de Confirmación de Recompensas')</title>

    <style>
        .thank-you-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .thank-you-container h1 {
            font-size: 24px;
            color: #4CAF50;
        }

        .thank-you-container p {
            font-size: 18px;
            color: #333333;
        }

        .thank-you-container span {
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
    


@section('content')
        <div class="modelo">
            <p class="modelo__nombre text-black">Página de Confirmación de Recompensas</p>
        </div>
    </div>
</header>

    <center>
        <div class="thank-you-container" style="margin-bottom: 80px;">
            <h1>¡Gracias por tu pedido, <span id="username">{{ $claimreward->username }}</span>!</h1>
            <p>Tu número de regalía es: (Especifica que es una regalía) <span id="order-number">{{ $claimreward->id }}</span></p>
            <p>Apreciamos tu confianza y esperamos que disfrutes tu compra.</p>
            <a href="/" class="btn btn-danger" style="font-size: 20px;">Ir a Inicio</a>
        </div>
    </center>
@endsection