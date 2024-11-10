@extends('layouts.main')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Compra de Combo de Comida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        h1 {
            text-align: center;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="email"], select, textarea, input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
@section('content')
<body>

    <h1>Compra tu Combo de Comida</h1>
    
    <form action="/procesar-compra" method="POST">
        <!-- Nombre del cliente -->
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre" required placeholder="Escribe tu nombre">

        <!-- Correo electrónico -->
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required placeholder="tucorreo@example.com">

        <!-- Selección del combo -->
        <label for="combo">Selecciona tu Combo:</label>
        <select id="combo" name="combo" required>
            <option value="">-- Elige un combo --</option>
            <option value="combo1">Combo 1: Hamburguesa + Papas + Refresco</option>
            <option value="combo2">Combo 2: Pizza + Ensalada + Jugos</option>
            <option value="combo3">Combo 3: Sushi + Sopa + Té Verde</option>
            <option value="combo4">Combo 4: Baleadas con Mondongo (2)</option>
        </select>

        <!-- Cantidad -->
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" min="1" value="1" required>

        <!-- Comentarios (opcional) -->
        <label for="comentarios">Comentarios (opcional):</label>
        <textarea id="comentarios" name="comentarios" rows="4" placeholder="¿Algún detalle o solicitud especial?"></textarea>

        <!-- Botón de enviar -->
        <input type="submit" value="Comprar Combo">
    </form>

</body>
</html>
@endsection