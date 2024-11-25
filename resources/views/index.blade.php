@extends('layouts.main')

@php
    $backgroundImage = asset('storage/' . $randomDish->picture);
@endphp

<title>@yield('title', 'Inicio')</title>

<style>
    .header {
        background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url('{{ $backgroundImage }}');
    }
</style>

@section('content')
            @if($randomDish)
            <div class="modelo">
                
                <p class="modelo__nombre">{{$randomDish->name}}</p>
                <p class="modelo__descripcion">{{$randomDish->desc}}</p>
                <p class="modelo__precio">L{{$randomDish->price}}</p>
                <a class="modelo__enlace" href="{{route('viewproduct', ['dishId' => $randomDish->id] ) }}">Ver Producto</a>
            </div>
            @endif
        </div>

    </header >

    <main class="productos productos__contenedor">
        <h2 class="productos__heading">Nuestras Comidas</h2>

        <div class="productos__grid">

            @foreach ($dishes as $dish)
           
            <div class="producto">
                <img class="producto__imagen" src="{{ asset('storage/' . $dish->picture) }}" alt="imagen comida">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">{{$dish->name}}</h3>
                    <p class="producto__descripcion">{{$dish->desc}}</p>
                    <p class="producto__precio">L{{$dish->price}}</p>
                    <a class="producto__enlace" href="{{route('viewproduct', ['dishId' => $dish->id] ) }}">Ver Producto</a>
                </div>
            </div>
            @endforeach

        </div><!--./productos__grid-->

        <a class="producto__enlace" href="/foods" style="margin-top:60px; margin-bottom:-40px;">Ver Más Comidas</a>

    </main>

    @if($posts)
    <section class="cursos" id="blog">
        <div class="cursos__contenedor cursos__grid">
            <div class="cursos__contenido">
                <h2 class="cursos__heading">{{$posts->title}}</h2>
                <p class="cursos__texto">{{ \Illuminate\Support\Str::limit($posts->content, 100, $end = '...') }}</p>
                <a class="cursos__enlace" href="{{ route('posts.read',['id'=>$posts->id])}}">Más información</a>
            </div>
        </div>
    </section>
    @endif
    
    <section class="blog">
        <h2 class="blog__heading">Nuestro Blog</h2>
        <div class="blog__contenedor blog__grid">

            @foreach ($morePosts as $morePosts)
            <article class="entrada">
                
                @if ($morePosts->picture1 && Storage::exists($morePosts->picture1))
                    <img class="img-fluid" src="{{ asset('storage/' . $morePosts->picture1) }}" alt="Figura 1">
                @else
                    <img class="entrada__imagen" src="{{ Vite::asset('resources/images/shop1.png') }}" alt="imagen blog">   
                @endif

                <div class="entrada__contenido">
                    <h2 class="entrada__titulo">{{$morePosts->title}}</h2>
                    <p class="entrada__fecha">  {{ date('d/m/Y h:i A', strtotime($morePosts->upload_date)) }}</p>
                    <p class="entrada__texto">{{ \Illuminate\Support\Str::limit($morePosts->content, 80, $end = '...') }}</p>

                    <a class="entrada__enlace" href="{{ route('posts.read', ['id' => $morePosts]) }}">Leer Entrada</a>
                </div>
            </article>
            @endforeach
        </div>
    </section>
@endsection