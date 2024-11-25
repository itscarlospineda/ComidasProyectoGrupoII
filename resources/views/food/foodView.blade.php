@extends('layouts.main')

<title>@yield('title', 'Lista de Platos - Sabor Catracho')</title>

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

        .dishes-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .dishes-table th,
        .dishes-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .dishes-table th {
            background-color: #f0f0f0;
            color: #333;
        }

        .dishes-table tr:hover {
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

        .btn-action.editar {
            background-color: #007bff;
            color: white;
        }

        .btn-action.editar:hover {
            background-color: #0056b3;
        }

        .btn-action.eliminar {
            background-color: #dc3545;
            color: white;
            pointer-events: none;

        }

        .dishes-table td:last-child {
            display: flex;
            gap: 10px;
        }

        .dish-image {
            max-width: 80px;
            height: 80px;
            border-radius: 5px;
            object-fit: cover;
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
            <h1>Platos Disponibles</h1>
            <a href="javascript:history.back()" class="back-link">← Regresar</a>
        </header>

        <table class="dishes-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <td>{{ $dish->id }}</td>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->desc }}</td>
                        <td>HNL {{ number_format($dish->price, 2) }}</td>
                        <td>{{ $dish->category ?? 'Sin categoría' }}</td>
                        <td>
                            @if($dish->picture)
                                <img src="{{ asset('storage/' . $dish->picture) }}" alt="{{ $dish->name }}" class="dish-image">
                            @else
                                <span>Sin imagen</span>
                            @endif
                        </td>
                        <td>

                                @csrf
                                <a href="{{ route('foods.edit', $dish->id) }}" class="btn-action editar" style="background-color: #007bff; color: white; text-decoration: none; padding: 8px 15px; border-radius: 5px;">Editar</a>
                            </form>

                            <form action="" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
