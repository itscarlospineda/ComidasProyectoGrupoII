<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Plato</title>
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
        background-color: #4CAF50; color: white; border: none; padding: 12px 20px; 
        font-size: 16px; border-radius: 4px; cursor: pointer; 
        } 

        button[type="submit"]:hover 
        { 
        background-color: #45a049;
        }
        input[type="number"] { width: 100%; padding: 10px; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 4px; }
        label, input, span { display: block; margin-bottom: 12px};
        
    </style>
</head>
<body>


    <h1>Detalles del Plato</h1>
    <form action="{{  route('newOrder', 'dishId => $dish->id')   }}" method="post">
    @csrf
        <label for="name">Nombre del Plato:</label>
        <input type="hidden" id=dish_id name=dish_id value ="{{ $dish->id }}"> </input>
        <input type="text" id="name" name="dish_name" value="{{ $dish->name }}" readonly>

        <label for="description">Descripción:</label>
        <textarea id="description" name="description" readonly>{{ $dish->desc }}</textarea>

        <label for="price">Precio:</label>
        <input type="number" id="price" name="dish_price" value="{{ $dish->price }}"readonly>

        <label for="numero">Cantidad:</label> 
        <input type="number" id="quantity" MIN=1  name="quantity" oninput="UpdateTotalPrice()">
        <label for="comments">Comentarios opcionales:</label> 
        <textarea id="comments" name="comments" rows="4" placeholder="Ingrese sus comentarios aquí"></textarea>
        <label>Pago Total: $<span id="totalprice_label"></span></label>
        <input type="hidden" id="totalprice" name="dish_total">  </input>
        <script>
            function UpdateTotalPrice() {
                const price = document.getElementById("price").value;
                let quantity = document.getElementById("quantity").value;
                let dish_total = (price*quantity).toFixed(2);
                document.getElementById("totalprice_label").textContent = dish_total;
            }
            UpdateTotalPrice();
            
        </script>
        <div class="button-container"> 
            <button type="submit">Ordena ya!!</button> 
        </div>
    </form>
</body>
</html>
