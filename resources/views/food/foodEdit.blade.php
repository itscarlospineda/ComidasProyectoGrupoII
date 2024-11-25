@extends('layouts.main')

<title>@yield('title', 'Editar Plato - Sabor Catracho')</title>

<style>
    /* Estilo para el fondo del header */
    .header {
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{ Vite::asset('resources/images/blog-banner.jpg') }});
        background-size: cover;
        background-position: center;
        height: 200px;
    }

    /* Estilos del formulario */
    .form-section {
        position: relative;
        padding: 50px 30px;
        background-color: #dfdfdf;
        border-radius: 15px;
        color: #fff;
        max-width: 600px;
        margin: 40px auto;
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
    }

    .form-section h1 {
        font-size: 2rem;
        margin-bottom: 30px;
        color: #3498db;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #3498db;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: rgba(52, 152, 219, 0.1);
        color: #757575;
        font-size: 1rem;
    }

    .form-group input[type="file"] {
        padding: 8px;
        background-color: rgba(52, 152, 219, 0.1);
    }

    .form-group textarea {
        resize: none;
        height: 100px;
    }

    .form-actions {
        text-align: center;
        margin-top: 30px;
    }

    .form-actions button {
        padding: 12px 25px;
        font-size: 1.2rem;
        color: #fff;
        background-color: #3498db;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .form-actions button:hover {
        background-color: #2980b9;
        transform: scale(1.05);
    }

    .back-link {
        display: inline-block;
        margin-bottom: 20px;
        color: #3498db;
        text-decoration: none;
        font-size: 1.5rem;
        font-weight: bold;
        transition: color 0.3s;
    }

    .back-link:hover {
        color: #2980b9;
    }

    /* Media Queries para pantallas pequeñas */
    @media (max-width: 768px) {
        .form-section {
            padding: 30px 20px;
        }

        .form-actions button {
            font-size: 1rem;
            padding: 10px 20px;
        }
    }
</style>

@section('content')
    <div class="form-section">
        <a href="javascript:history.back()" class="back-link">← Regresar</a>
        <h1>Editar Plato</h1>
        <form action=" {{ route('foods.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre del Plato</label>
                <input type="text" id="name" name="name" value="{{ old('name', $dish->name) }}" required>
                @error('name')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="desc">Descripción</label>
                <textarea id="desc" name="desc" required>{{ old('desc', $dish->desc) }}</textarea>
                @error('desc')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" id="price" name="price" step="0.01" value="{{ old('price', $dish->price) }}" required>
                @error('price')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Categoría</label>
                <select id="category" name="category" required>
                    <option value="" disabled>Selecciona una categoría</option>
                    <option value="Entrante" {{ $dish->category == 'Entrante' ? 'selected' : '' }}>Entrante</option>
                    <option value="Plato Fuerte" {{ $dish->category == 'Plato Fuerte' ? 'selected' : '' }}>Plato Fuerte</option>

                </select>
                @error('category')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="picture">Actualizar Imagen del Plato</label>
                <input type="file" id="picture" name="picture" accept="image/*">
                @if($dish->picture)
                    <small>Imagen actual: {{ $dish->picture }}</small>
                @endif
                @error('picture')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-actions">
                <button type="submit">Actualizar Plato</button>
            </div>
        </form>
    </div>
@endsection
