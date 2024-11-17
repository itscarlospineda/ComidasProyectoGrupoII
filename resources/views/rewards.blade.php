@extends('layouts.main')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recompensas</title>
    
    <style>
        /* Estilos generales */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Encabezado */
.productos__heading {
    text-align: center;
    margin: 20px 0;
    font-size: 2em;
}

/* Contenedor de productos */
.productos__contenedor {
    padding: 20px;
    background-color: #f9f9f9;
}

/* Grid de productos */
.productos__grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 20px;
}

/* Estilos para cada producto */
.producto {
    background-color: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    max-width: 300px;
    text-align: center;
}

.producto__imagen {
    width: 100%;
    height: auto;
}

.producto__contenido {
    padding: 15px;
}

.producto__nombre {
    font-size: 1.2em;
    margin: 10px 0;
}

.producto__descripcion {
    font-size: 0.9em;
    color: #666;
    margin: 10px 0;
}

.producto__precio {
    font-size: 1.1em;
    color: #b12704;
    margin: 10px 0;
}

    </style>

<main class="productos productos__contenedor">
        <h2 class="productos__heading">Recompensas</h2>
        
        
        <h2 class="productos__heading">Tus puntos: {{$points}}</h2>

        <div class="productos__grid">
            
            
             @foreach ($rewards as $reward)
           
            <div class="producto">
                <img class="producto__imagen" src="{{ Vite::asset('resources/images/carne-fondo2.png') }}" alt="imagen guitarra">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">{{$reward->Name}}</h3>
                    <p class="producto__descripcion">{{$reward->Description}}</p>
                    <p class="producto__precio">{{$reward->Points_needed}}</p>
                    <a class="producto__enlace" href="{{route('claimreward', ['rewardId' => $reward->id] )}}">Reclamar Ahora</a>
                </div>
            </div>
            @endforeach
        </div><!--./productos__grid-->
    </main>
    </html>
@endsection