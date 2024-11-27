@extends('layouts.main')

<title>@yield('title', 'Lista Usuarios Registrados - Admin')</title>

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

    .user-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .user-table th,
    .user-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    .user-table th {
        background-color: #f0f0f0;
        color: #333;
    }

    .user-table tr:hover {
        background-color: #f9f9f9;
    }



    .user-table td:last-child {
        display: flex;
        gap: 10px;
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

    <div class="container" style="margin-bottom: 80px;">
        <header>
                <h1>Usuarios Registrados</h1>
                <a href="javascript:history.back()" class="back-link">← Regresar</a>
        </header>

            <table class="user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Usuario</th>
                        <th>Email</th>
                        <th>Puntos</th>
                        <th>   </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->points }}</td>
                            <td class="d-flex justify-content-center align-items-center"> <a class="producto__enlace " href="{{route('AdminUsersProfile',['UserId'=>$user->id])}}">Ver perfil</a> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
