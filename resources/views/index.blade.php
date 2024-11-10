@extends('layouts.main')

<title>@yield('title', 'Inicio')</title>

<style>
    .header {
        background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url({{ Vite::asset('resources/images/mexican-food-2462.jpg')}});
    }
</style>
@section('content')

            <div class="modelo">
                <h1 class="modelo__nombre">Tacos Fritos</h1>
                <p class="modelo__descripcion">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae, dolorum voluptatem fuga illum nisi saepe, repellat laudantium accusantium doloremque harum.</p>
                <p class="modelo__precio">$3.99 c/u</p>
                <a class="modelo__enlace" href="producto.html">Ver Producto</a>
            </div>
        </div>

    </header>

    <main class="productos productos__contenedor">
        <h2 class="productos__heading">Nuestras Comidas</h2>

        <div class="productos__grid">

            @foreach ($dishes as $dish)
            <div class="producto">
                <img class="producto__imagen" src="{{ Vite::asset('resources/images/carne-fondo2.png') }}" alt="imagen guitarra">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">{{$dish->name}}</h3>
                    <p class="producto__descripcion">{{$dish->desc}}</p>
                    <p class="producto__precio">${{$dish->price}}</p>
                    <a class="producto__enlace" href="/product">Ver Producto</a>
                </div>
            </div>
            @endforeach
           


        </div><!--./productos__grid-->
    </main>

    <section class="cursos" id="blog">
        <div class="cursos__contenedor cursos__grid">
            <div class="cursos__contenido">
                <h2 class="cursos__heading">{{$posts->title}}</h2>
                <p class="cursos__texto">{{ \Illuminate\Support\Str::limit($posts->content, 100, $end = '...') }}</p>
                <a class="cursos__enlace" href="{{ route('posts.read',['id'=>$posts->id])}}">Más información</a>
            </div>
        </div>
    </section>

    <section class="blog">
        <h2 class="blog__heading">Nuestro Blog</h2>
        <div class="blog__contenedor blog__grid">

            @foreach ($morePosts as $morePosts)
            <article class="entrada">
                <img class="entrada__imagen" src="{{ Vite::asset('resources/images/shop1.png') }}" alt="imagen blog">

                <div class="entrada__contenido">
                    <h2 class="entrada__titulo">{{$morePosts->title}}</h2>
                    <p class="entrada__fecha">{{$morePosts->upload_date}}</p>
                    <p class="entrada__texto">{{ \Illuminate\Support\Str::limit($posts->content, 80, $end = '...') }}</p>

                    <a class="entrada__enlace" href="{{ route('posts.read', ['id' => $morePosts]) }}">Leer Entrada</a>
                </div>
            </article>
            @endforeach
        </div>
    </section>
@endsection