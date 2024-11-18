@extends('layouts.main')

<title>@yield('title', 'Pedido de Plato')</title>

    <style>

        .header {
        background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url({{ Vite::asset('resources/images/carne-fondo2.png')}});
        }

        h1 {
            text-align: center;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /*max-width: 500px;*/
            margin: 0 auto;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .button-container 
        { 
        text-align: center;
        } 
        button[type="submit"] 
        { 
        background-color: #4CAF50; 
        color: white; 
        border: none; 
        padding: 12px 20px; 
        font-size: 16px; 
        border-radius: 4px; 
        cursor: pointer; 
        } 

        button[type="submit"]:hover 
        { 
        background-color: #45a049;
        }
        input[type="number"] { 
            width: 100%; 
            padding: 10px; 
            margin-bottom: 12px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
        }
        .form-content { 
            display: block; 
            margin-bottom: 12px
        };
        
        
    </style>

@section('content')
            <div class="modelo">
                <p class="modelo__nombre">Recompensa {{ $rewards->Name }}</p>
            </div>
        </div>
    </header>

    <h1>Detalles de Recompensa          Tus puntos: </h1>
    
    <div class="container">
    <span >Tus puntos: {{$points}}</span>
        <div class="row">
            <!--<div class="col-md-4">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ Vite::asset('resources/images/gringas.jpg') }}" alt="comida">
                </div>
            </div>-->
            <div class="d-flex justify-content-center align-items-center col-md-4 mx-auto" >
                <img class="img-fluid" src="{{ Vite::asset('resources/images/gringas.jpg') }}" alt="comida">
            </div>
            
            <div class="col-md-8" style="padding: 20px;">
                <form action="{{  route('savereward', 'rewardId => $rewards->id')   }}" method="post">
                    @csrf
                        <label class="form-content" for="name">Nombre del Plato:</label>
                        <input class="form-content" type="hidden" id=dish_id name=RewardId value ="{{ $rewards->id }}"> </input>
                        <input type="text" id="name" name="Name" value="{{ $rewards->Name }}" readonly>
                        <label class="form-content" for="description">Descripción:</label>
                        <textarea id="description" name="description" readonly>{{ $rewards->Description }}</textarea>
                        <label class="form-content" for="numero">Puntos Necesarios:</label> 
                        <input class="form-content" type="number" id="quantity"  value="{{$rewards->Points_needed}}" name="Points_needed"> 
                        <button type="submit">Ordena ya!!</button> 
                        </div>
                    </form>
            </div>
        </div>
    </div>

@endsection
