@extends('layouts.main')

<title>@yield('title', 'Blogs')</title>

<style>
    .header {
        background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url({{ Vite::asset('resources/images/carne-fondo2.png')}});
    }

   /* .subcontainer {
    width: 100%; 
    height: 100%;
    border: 2px solid green; 
    position: relative;
}

.subheader {
    background-color: blue; 
    color: white; 
    font-weight: bold;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}
*/
</style>

@section('content')

        <div class="modelo">
            <p class="modelo__nombre">Blogs</p>
        </div>
    </div>
</header>

<div class="container" style="margin-top:10vh;">
    <main class="row">
        <div class="col-md-7" style="border: 3px solid black; padding:40px; border-radius:10px; justify-items:center; text-align: justify;">
            
            <h1>{{ $posts->title}}</h1> 
            <p class="producto__modelo">{{ $posts->author}}</p> <br>
            <p class="entrada__fecha"> Fecha y Hora de Publicación:  {{ date('d/m/Y h:i A', strtotime($posts->upload_date . ' UTC')) }} </p> <br>
            <p class="producto_label"> {{ $posts->content}}</p> <br>
            <p class="producto_label"> {{ $posts->content2}}</p> <br>

        </div>

        <div class="d-flex justify-content-center align-items-center col-md-4 mx-auto" >
            <div class="row">
                @if ($posts->picture1)
                <img class="img-fluid" src="{{ asset('storage/' . $posts->picture1) }}" alt="Figura 1">
                @endif
                <br>
                @if ($posts->picture2)
                <img class="img-fluid" src="{{ asset('storage/' . $posts->picture2) }}" alt="Figura 2">
                @endif
            </div>

            
        </div>
    </main>

    <a href="/#blog" class="producto__agregar-carrito" style="margin-bottom: 80px;">Ver Más Posts</a>


</div>

@endsection