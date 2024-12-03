@extends('layouts.main')

<title>@yield('title', 'Pedido de Plato')</title>

    <style>

        .header {
        background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url({{ Vite::asset('resources/images/tacos-bg.jpg')}});
        }

        .alert-danger {
        color: red;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: 10px;
        border-radius: 5px;
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
                <p class="modelo__nombre">Pedido de {{ $dish->name }}</p>
            </div>
        </div>
    </header>

    <h1>Detalles del Plato</h1>
    <div class="container">
        <div class="row">
            <!--<div class="col-md-4">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ Vite::asset('resources/images/gringas.jpg') }}" alt="comida">
                </div>
            </div>-->
            <div class="d-flex justify-content-center align-items-center col-md-4 mx-auto" >
                <img class="img-fluid" src="{{ asset('storage/' . $dish->picture) }}" alt="comida">
            </div>
            
            <div class="col-md-8" style="padding: 20px;">

                <form action="{{  route('payment', ['dishId' => $dish->id])   }}" method="post">
                    @csrf
                        <label class="form-content" for="name">Nombre del Plato:</label>
                        <input class="form-content" type="hidden" id=dish_id name=dish_id value ="{{ $dish->id }}"> </input>
                        <!--<span class="form-content producto__nombre" type="text" id="name" name="dish_name" value ="{{ $dish->name }}"> style="font-size:40px;">
                            {{ $dish->name }}
                        </span>-->
                        <input type="text" id="name" name="dish_name" value="{{ $dish->name }}" readonly>

                        <label class="form-content" for="description">Descripción:</label>
                        <!--<p class="form-content"  id="description" name="description" readonly>{{ $dish->desc }}</p>-->
                        <textarea id="description" name="description" style="resize: none;" readonly>{{ $dish->desc }}</textarea>
                        
                        <label class="form-content" for="price">Precio:</label>
                        <input class="form-content producto__precio" type="number" id="price" name="dish_price" value="{{ $dish->price }}" readonly>   
                       
                       
                        @if ($dish->extras)
                        <label class="form-content" for="price">Seleccione una opcion </label>
                        @foreach($dish->extras as $extra)
                        <label class="form-content" for="extra_{{ $loop->index }}">
                        <input type="radio" id="extra_{{ $loop->index }}" name="extra" oninput="UpdatePrice()"value="{{ json_encode($extra) }}">
                        {{ $extra['name'] }}  L.{{ $extra['price'] }}
                        </label>
                        @endforeach
                        @endif
                        <label class="form-content" for="numero">Cantidad:</label> 
                        <input class="form-content" type="number" id="quantity" MIN=1 value=1 name="quantity" oninput="UpdateTotalPrice()">
                        <label class="form-content" for="comments">Comentarios opcionales:</label> 
                        <textarea  class="form-content" id="comments" name="comments" rows="4" placeholder="Ingrese sus comentarios aquí"></textarea>
                        <label class="form-content">Pago Total: L
                            <span class="form-content" id="totalprice_label"></span>
                        </label>
                        <input class="form-content" type="hidden" id="totalprice" name="dish_total">  </input>
                        
                        <script>
                            function UpdateTotalPrice() {
                                const price = document.getElementById("price").value;
                                let quantity = document.getElementById("quantity").value;
                                let dish_total = (price*quantity).toFixed(2);
                                document.getElementById("totalprice_label").textContent = dish_total;
                            }
                            UpdateTotalPrice();
                            
                        </script>

                <script>
                    function UpdatePrice() {
                    let newPrice = 0;
                    const extras = document.getElementsByName("extra");
                        for (let i = 0; i < extras.length; i++) {
                            if (extras[i].checked) {
                                const extra = JSON.parse(extras[i].value);  
                                 newPrice = parseFloat(extra.price);     
                                break;  
                            }
                        }
                    let price = parseFloat(document.getElementById("price").value);
                    document.getElementById("price").value = newPrice.toFixed(2);  // Show it with 2 decimals
                    }
                    UpdateTotal();
                </script>
                @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
                @endif
                        <div class="button-container">
                            @if(Auth::User()) 
                            <button type="submit">Ordena ya</button>
                            @else
                            <a href="{{ route('login') }}">Inicia Sesión para Realizar tu Pedido</a> 
                            @endif
                        </div>
                    </form>
            </div>
        </div>
    </div>

@endsection
