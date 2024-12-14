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
        background-color: #0070ba; 
        color: white; 
        border: none; 
        padding: 12px 20px; 
        font-size: 16px; 
        border-radius: 4px; 
        cursor: pointer; 
        } 

        button[type="submit"]:hover 
        { 
        background-color:#005ea6;
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

            <form action="{{ route('paymentPayPal', ['dishId' => $dish->id]) }}" method="post">
    @csrf
    <label class="form-content" for="name">Nombre del Plato:</label>
    <input class="form-content" type="hidden" id="dish_id" name="dish_id" value="{{ $dish->id }}">
    <input type="text" id="name" name="dish_name" value="{{ $dish->name }}" readonly>

    <label class="form-content" for="description">Descripción:</label>
    <textarea id="description" name="description" style="resize: none;" readonly>{{ $dish->desc }}</textarea>
    
    <label class="form-content" for="price">Precio:</label>
    @if($min)
    <input class="form-content producto__precio" type="number" id="price" name="dish_price" value="{{ $min }}" readonly>
    <label class="form-content" for="price">Seleccione una opción</label>
    @foreach ($price as $item) 
    <div>
    <input type="radio" id="price_{{$loop->index}}" name="Radioprice" value="{{$item->price}}" oninput="UpdatePrice()">    
    <label for="price_{{$loop->index}}"> {{$item->name}} - Lps. {{$item->price}} </label>
        </div> 
        @endforeach
    @else
    <input class="form-content producto__precio" type="number" id="price" name="dish_price" value="{{ $price }}" readonly>
    @endif
    <label class="form-content" for="numero">Cantidad:</label> 
    <input class="form-content" type="number" id="quantity" min="1" value="1" name="quantity" oninput="UpdateTotalPrice()">

    <label class="form-content" for="comments">Comentarios opcionales:</label> 
    <textarea class="form-content" id="comments" name="comments" rows="4" placeholder="Ingrese sus comentarios aquí"></textarea>

    <label class="form-content">Pago Total: L
        <span class="form-content" id="totalprice_label"></span>
    </label>
    <input class="form-content" type="hidden" id="totalprice" name="dish_total">

    <script>
        function UpdateTotalPrice() {
            const price = parseFloat(document.getElementById("price").value);
            const quantity = parseInt(document.getElementById("quantity").value);
            const dish_total = (price * quantity).toFixed(2);
            document.getElementById("totalprice_label").textContent = dish_total;
            document.getElementById("totalprice").value = dish_total;
        }

        function UpdatePrice() {
    let newPrice = 0;
    const extras = document.getElementsByName("Radioprice");
    for (let i = 0; i < extras.length; i++) {
        if (extras[i].checked) {
            newPrice = parseFloat(extras[i].value);     
            break;  
        }
    }
    let price = parseFloat(document.getElementById("price").value);
    const quantity = parseInt(document.getElementById("quantity").value);
    const totalPrice = (newPrice * quantity).toFixed(2);

    document.getElementById("price").value = newPrice.toFixed(2);  // Mostrar con 2 decimales
    document.getElementById("totalprice_label").textContent = totalPrice;
    document.getElementById("totalprice").value = totalPrice;
}

UpdateTotalPrice();

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
        <button type="submit">Pago con PayPal</button>
        
        @else
        <a href="{{ route('login') }}">Inicia Sesión para Realizar tu Pedido</a> 
        @endif
    </div>
</form>

            </div>
        </div>
    </div>

@endsection
