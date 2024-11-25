@extends('layouts.main')

<title>@yield('title', 'Registrar Post - Sabor Catracho')</title>

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
        <h1>Registrar Post</h1>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" id="title" name="title" placeholder="Ej..." required>
                @error('title')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Contenido Principal</label>
                <textarea id="content" name="content" placeholder="Escribe aquí el contenido principal del post..." required></textarea>
                @error('content')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="content2">Contenido Secundario</label>
                <textarea id="content2" name="content2" placeholder="Opcional: Escribe contenido adicional o complementario..."></textarea>
                @error('content2')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="author">Autor</label>
                <input type="text" id="author" name="author" placeholder="Ej. Juan Pérez" required>
                @error('author')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Categoría</label>
                <input type="text" id="category" name="category" placeholder="Ej.  etc." required>
                @error('category')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="picture1">Imagen Principal</label>
                <input type="file" id="picture1" name="picture1" accept="image/*">
                @error('picture1')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="picture2">Imagen Secundaria</label>
                <input type="file" id="picture2" name="picture2" accept="image/*">
                @error('picture2')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-actions">
                <button type="submit">Guardar Post</button>
            </div>
        </form>
    </div>
@endsection
