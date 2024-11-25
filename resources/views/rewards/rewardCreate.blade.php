@extends('layouts.main')

<title>@yield('title', 'Registrar Recompensa - Sabor Catracho')</title>

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
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: rgba(52, 152, 219, 0.1);
        color: #757575;
        font-size: 1rem;
    }

    .form-group textarea {
        resize: none;
        height: 100px;
    }

    .form-group input[type="number"] {
        -moz-appearance: textfield;
    }

    .form-group input[type="number"]::-webkit-outer-spin-button,
    .form-group input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
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
</header>

    <div class="form-section">
        <a href="javascript:history.back()" class="back-link">← Regresar</a>
        <h1>Registrar Recompensa</h1>
        <form action="{{ route('rewards.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Name">Nombre de la Recompensa</label>
                <input type="text" id="Name" name="Name" placeholder="Ej. Pollo entero" required>
                @error('Name')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="Description">Descripción</label>
                <textarea id="Description" name="Description" placeholder="Describe los detalles de la recompensa..." required></textarea>
                @error('Description')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="Points_needed">Puntos Necesarios</label>
                <input type="number" id="Points_needed" name="Points_needed" placeholder="Ej. 100" min="0" required>
                @error('Points_needed')
                    <small style="color: #e74c3c;">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-actions">
                <button type="submit">Guardar Recompensa</button>
            </div>
        </form>
    </div>
@endsection