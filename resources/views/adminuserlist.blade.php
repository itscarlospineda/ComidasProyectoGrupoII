@extends('layouts.main')
@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios Registrados</title>
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            width: 100%;
            max-width: 1200px;
            margin: 20px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        /* Estilos de la lista de usuarios */
        .usuario {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .usuario__contenido {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .usuario__id, .usuario__username, .usuario__email, .usuario__points {
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .usuario__id {
            font-weight: bold;
            color: #4CAF50;
        }

        .usuario__username {
            font-weight: bold;
        }

        .usuario__email, .usuario__points {
            color: #777;
        }

        .producto__enlace {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .producto__enlace:hover {
            background-color: #45a049;
        }

        /* Estilos de responsividad */
        @media screen and (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .usuario {
                flex-direction: column;
                align-items: flex-start;
            }

            .usuario__contenido {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Usuarios Registrados</h1>
        <div class="usuarios-lista">
            @foreach ($users as $user)
                <div class="usuario">
                    <div class="usuario__contenido">
                        <h3 class="usuario__id">ID: {{$user->id}}</h3>
                        <p class="usuario__username">Username: {{$user->username}}</p>
                        <p class="usuario__email">Email: {{$user->email}}</p>
                        <p class="usuario__points">Puntos: {{$user->points}}</p>
                        <a class="producto__enlace" href="">Ver perfil</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>

@endsection
