@extends('layouts.main')

<title>@yield('title', 'Página de Confirmación')</title>

    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

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
    <p class="modelo__nombre text-black">Página de Confirmación</p>
</div>
</div>
</header>
    <center>
        <div class="thank-you-container">
            <h1>¡Gracias por tu pedido, <span id="username">{{ $claimreward->username }}</span>!</h1>
            <p>Tu número de Regalia es: (Especifica que es una regalia) <span id="order-number">{{ $claimreward->id }}</span></p>
            <p>Apreciamos tu fidelidad y esperamos que disfrutes tu compra.</p>
            <a href="/" class="btn">Ir a Inicio</a>
        </div>
    </center>
@endsection