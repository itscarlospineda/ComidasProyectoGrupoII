@extends('layouts.main')

<title>@yield('title', 'Información del Usuario - Admin')</title>


<style>
        
        

    h1 {
        text-align: center;
        color: #333;
        margin-top: 20px;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 1200px;
        margin: 0 auto;
    }

    
    .user-profile {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-bottom: 30px;
    }

    .profile-item {
        display: flex;
        justify-content: space-between;
        font-size: 16px;
        color: #555;
    }

    .profile-item strong {
        color: #333;
    }

    .profile-item span {
        font-weight: 600;
        color: #2d87f0;
    }

   
    .section-title {
        text-align: center;
        color: #333;
        margin-top: 40px;
        font-size: 1.8em;
    }

    .container-history,
    .container-rewards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        padding: 20px;
        margin-top: 20px;
    }

    .history-item,
    .reward-item {
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .history-item:hover,
    .reward-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .history-item h2,
    .reward-item h2 {
        font-size: 1.5em;
        color: #333;
        margin: 0 0 10px;
    }

    .history-item p,
    .reward-item p {
        color: #555;
        line-height: 1.6;
    }

   
    .btn-back {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        font-size: 1rem;
        border-radius: 5px;
        display: inline-block;
        margin-top: 10px;
        transition: background-color 0.3s;
    }

    .btn-back:hover {
        background-color: #0056b3;
    }

  
    @media (max-width: 768px) {
        .container-history,
        .container-rewards {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }
    }

    @media (max-width: 480px) {
        .container-history,
        .container-rewards {
            grid-template-columns: 1fr;
        }
    }
</style>

@section('content')
</header>


<div class="container" style="margin-bottom: 80px;">
    <header>
        <h1>Usuario Registrado</h1>
        <a href="javascript:history.back()" class="back-link">← Regresar</a>
    </header>
    <div class="section-title">Información de {{$userdata->username}}</div>


    <div class="container-rewards">
        <div class="reward-item">
            <h2>Numero de registro:  {{ $userdata->id }}</h2>
            <p><strong>Primer nombre:</strong> {{ $userdata->fname }}</p>
            <p><strong>Segundo nombre:</strong> {{ $userdata->lname }}</p>
            <p><strong>Email:</strong> {{ $userdata->email }}</p>
            <p><strong>Numero de telefono:</strong> {{ $userdata->phone_num }}</p>
            <p><strong>Direccion:</strong> {{ $userdata->address }}</p>
            <p><strong>Puntos Actuales:</strong> {{ $userdata->points}}</p>
            <p><strong>Fecha de registro:</strong> {{ $userdata->created_at}}</p>
            <p><strong>Foto de perfil:</strong>
                <img src="{{ asset('storage/profile_pictures/' . ($userdata->profile_picture)) }}"  alt="Profile Picture" style="max-width: 150px; max-height: 150px;">
            </p>

        </div>
    </div>


    <div class="section-title">Historial de Compras</div>
    <div class="container-history">
        @foreach ($purchases as $purchase)
            <div class="history-item">
                <h2>Pedido #{{ $purchase->order_id }}</h2>
                <p><strong>Nombre del Producto:</strong> {{ $purchase->product_name }}</p>
                <p><strong>Cantidad:</strong> {{ $purchase->quantity }}</p>
                <p><strong>Precio Total:</strong> {{ $purchase->total_price }}</p>
                <p><strong>Fecha de Compra:</strong> {{ $purchase->purchase_date }}</p>
                <p><strong>Estado:</strong> {{ $purchase->status }}</p>
            </div>
        @endforeach
    </div>

    <div class="section-title">Recompensas Recogidas</div>
    <div class="container-rewards">
        @foreach ($rewards as $reward)
            <div class="reward-item">
                <h2>Regalia #{{ $reward->RewardClaimed_id }}</h2>
                <p><strong>Codigo de la Recompensa:</strong> {{ $reward->RewardId }}</p>
                <p><strong>Nombre de la Recompensa:</strong> {{ $reward->Name }}</p>
                <p><strong>Fecha de Recompensa:</strong> {{ $reward->DATE }}</p>
                <p><strong>Puntos Usados:</strong> {{ $reward->Points_needed }}</p>
                <p><strong>Estado de la Recompensa:</strong> {{ $reward->status }}</p>
            </div>
        @endforeach
    </div>
</div>

</body>

</html>

@endsection
