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

<div class="container col-md-12" style="margin-top:10vh;">
    <main class="row mb-4">
        <div class="col-md-3" style="border: 3px solid black; padding:40px; border-radius:10px; margin-right:10vh;">
                <div class="subheader">
                    <span class="fw-bold text-white"> POSTS ANTERIORES</span>
                </div>
        </div>   
        <div class="col-md-8" style="border: 3px solid black; padding:40px; border-radius:10px; justify-items:center; text-align: justify;">
            
            <p class="producto__precio" style="color: black;">{{ $posts->title}}</p> <br>
            <h1>{{ $posts->author}}</h1> <br>
            <h2> {{ $posts->content}}</h2>
                    <!--<p class="producto__precio">$399</p>
    
                <form class="producto__formulario">
                    <label class="producto__label">Cantidad:</label>
                    <select class="producto__cantidad">
                        <option value="">-- Seleccione --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
    
                    <input
                        type="submit"
                        class="producto__agregar-carrito"
                        value="Agregar al Carrito"
                    >
                </form>-->

        </div>
    
    </main>

</div>

@endsection