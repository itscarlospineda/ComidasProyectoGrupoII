@extends('layouts.main')

<title>@yield('title', 'Nosotros - Sabor Catracho')</title>

<style>

    .header {
            background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url({{ Vite::asset('resources/images/fondo-nosotros.jpg')}});
        }

        .about-us {
            margin-top: 100px;
        }
        
        .about-image img {
            width: 100%;
            max-width: 350px;
            border-radius: 15px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .about-image img:hover {
            transform: scale(1.05);
        }

</style>

@section('content')
        <div class="modelo">
            <p class="modelo__nombre">Acerca de Nosotros</p>
        </div>
    </div>
</header>

<!-- Sección Nosotros -->
<section class="about-us container" style="margin-bottom: 80px;">
    <div class="row">
        <div class="col-md-7">
            <h2 class="producto__nombre">Sobre Sabor Catracho</h2>
            <p style="text-align: justify;">En Sabor Catracho, nuestra misión es llevarte una auténtica experiencia hondureña, donde cada bocado te transporte a la calidez de nuestra tierra. Somos un restaurante comprometido con la tradición culinaria de Honduras, ofreciendo los sabores que han sido transmitidos de generación en generación.</p>
            <p style="text-align: justify;">Desde las inconfundibles baleadas hasta los deliciosos pollos chucos, en Sabor Catracho nos enorgullece preparar cada plato con ingredientes frescos, locales y llenos de historia. Nuestros chefs, originarios de diferentes regiones de Honduras, preparan con amor y dedicación recetas que han sido parte de la vida cotidiana en los hogares catrachos por siglos.</p>
            <p style="text-align: justify;">Aquí, en Sabor Catracho, creemos que la comida es mucho más que solo nutrición; es una forma de compartir nuestra cultura, nuestras raíces y nuestra pasión por la gastronomía. Ven a disfrutar no solo de un almuerzo, sino de una experiencia llena de tradición, sabor y hospitalidad, porque en cada plato que servimos, hay un pedacito de Honduras esperando por ti.</p>
        </div>
        <div class="about-image d-flex justify-content-center align-items-center col-md-5 mx-auto">
            <img src="{{ Vite::asset('resources/images/logo5.png') }}" alt="Comida típica de Honduras">
        </div>
    </div>
</section>
@endsection
