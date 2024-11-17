@extends('layouts.main')

<title>@yield('title', 'Menú de Comidas - Sabor Catracho')</title>

<style>
    .header {
        background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url({{ Vite::asset('resources/images/fondo-comida-2.jpg') }});
    }

    .menu-section {
        margin-top: 100px;
        position: relative;
        padding: 40px 0;
        background-color: rgba(0, 0, 0, 0.8); /* Fondo oscuro con mayor opacidad */
        border-radius: 15px;
        color: #fff;
    }

    .menu-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7); /* Fondo oscuro con opacidad */
        z-index: 1;
    }

    .menu-content {
        position: relative;
        z-index: 2;
    }

    /* Estilo de las secciones */
    .section {
        margin-bottom: 30px;
        border: 2px solid #e67e22;
        border-radius: 10px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.1); /* Fondo oscuro pero más translúcido */
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .section h2 {
        font-size: 2rem;
        margin-bottom: 15px;
        color: #e67e22;
        flex-basis: 100%; /* Asegura que el título ocupe toda la fila */
    }

    .menu-item {
        display: flex;
        align-items: center;
        gap: 20px;
        flex: 1 1 45%;
    }

    .menu-item img {
        width: 100%;
        max-width: 200px;
        height: auto;
        border-radius: 15px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .menu-item img:hover {
        transform: scale(1.05);
    }

    .menu-item div {
        max-width: 60%;
    }

    .precio {
        font-size: 1.2rem;
        font-weight: bold;
        color: #27ae60;
        margin-top: 10px;
    }

    
</style>

@section('content')
    <div class="modelo">
        <p class="modelo__nombre">Menú de Comidas</p>
    </div>

    <!-- Sección Menú -->
    <section class="menu-section container">
        <div class="menu-content row">
            <!-- Sección Entradas -->
            <div class="section" id="entradas">
                <h2>Entradas</h2>
                <div class="menu-item">
                    <img src="{{ Vite::asset('resources/images/Baleada-Sencilla.jpg') }}" alt="Baleada Sencilla">
                    <div>
                        <h3>Baleada Sencilla</h3>
                        <p>Una Sabrosa Baleada Sencilla, contiene frijoles, queso y mantequilla.</p>
                        <p class="precio">L20.00</p>
                    </div>
                </div>
                
                <div class="menu-item">
                    <img src="{{ Vite::asset('resources/images/catrachitas.jpeg') }}" alt="Catrachitas">
                    <div>
                        <h3>Catrachitas</h3>
                        <p>Tradicional entrada que lleva con orgullo el pseudónimo de nuestro país. Incluye como ingrediente principal los frijoles con queso.</p>
                        <p class="precio">L15.50</p>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="{{ Vite::asset('resources/images/sopa-caracol.jpg') }}" alt="Sopa de Caracol">
                    <div>
                        <h3>Sopa de Caracol</h3>
                        <p>Una sopa hondureña que tiene como ingrediente la leche de coco y el caracol, que te transportará a una explosión de sabores a tu paladar.</p>
                        <p class="precio">L40.00</p>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="{{ Vite::asset('resources/images/nacatamal.jpg') }}" alt="Nacatamal">
                    <div>
                        <h3>Nacatamales hondureños</h3>
                        <p>Son un plato tipico que se prepara para grandes celebraciones como la navidad y año nuevo.</p>
                        <p class="precio">L25.00</p>
                    </div>
                </div>
            </div>

            <!-- Sección Platos Principales -->
            <div class="section" id="platos-principales">
                <h2>Platos Principales</h2>
                <div class="menu-item">
                    <img src="{{ Vite::asset('resources/images/pescado-frito.jpg') }}" alt="Pescado Frito">
                    <div>
                        <h3>Pescado Frito</h3>
                        <p>Un plato tradicional de las costumbres culinarias de centroamerica. Un plato de pescado frito con tajadas de platano y acompañantes deliciosos.</p>
                        <p class="precio">L95.00</p>
                    </div>
                </div>
                <div class="menu-item">
                    <img src="{{ Vite::asset('resources/images/pollo-chuco.jpeg') }}" alt="Pollo Chuco">
                    <div>
                        <h3>Pollo Chuco</h3>
                        <p>Plato tradicional hondureño que combina pollo frito con tajadas de plátano,chismol y aderezo.</p>
                        <p class="precio">L100.00</p>
                    </div>
                </div>
                <div class="menu-item">
                    <img src="{{ Vite::asset('resources/images/plato tipico hondureño.png') }}" alt="Plato Tipico Hondureño">
                    <div>
                        <h3>Plato Típico hondureño</h3>
                        <p>Un manjar con variedad de ingredientes que componen, un plato lleno de color, sabor y cultura.</p>
                        <p class="precio">L85.00</p>
                    </div>
                </div>
                <div class="menu-item">
                    <img src="{{ Vite::asset('resources/images/Yuca-chicharron.jpg') }}" alt="Yuca con Chicharrón">
                    <div>
                        <h3>Yuca con Chicharrón</h3>
                        <p>Comida de la región que despliega una diversidad de texturas y sabores que lo convierte en una delicia culinaria.</p>
                        <p class="precio">L70.00</p>
                    </div>
                </div>
            </div>

            <!-- Sección Postres -->
            <div class="section" id="postres">
                <h2>Postres</h2>
                <div class="menu-item">
                    <img src="{{ Vite::asset('resources/images/arroz-con-leche.png') }}" alt="Arroz con Leche">
                    <div>
                        <h3>Arroz con Leche</h3>
                        <p>Delicioso arroz cocido en diferente tipos de leche, ideal para servir como postre.</p>
                        <p class="precio">L50.00</p>
                    </div>
                </div>
                <div class="menu-item">
                    <img src="{{ Vite::asset('resources/images/hojuelas.jpg') }}" alt="Hojuelas">
                    <div>
                        <h3>Hojuelas</h3>
                        <p>Deliciosas hojuelas de maíz, se suelen servir en fiestas y reuniones..</p>
                        <p class="precio">L30.00</p>
                    </div>
                </div>
                <div class="menu-item">
                    <img src="{{ Vite::asset('resources/images/platano-miel.jpg') }}" alt="Plátano maduro en miel">
                    <div>
                        <h3>Plátano maduro en miel</h3>
                        <p>Plátano maduro combinado con miel que lo convierte en un manjar.</p>
                        <p class="precio">L30.00</p>
                    </div>
                </div>
                <div class="menu-item">
                    <img src="{{ Vite::asset('resources/images/tres-leches.jpg') }}" alt="Pastel Tres Leches">
                    <div>
                        <h3>Pastel Tres leches</h3>
                        <p>Saborea el sabor de nuestros postres para nuestros clientes fieles.</p>
                        <p class="precio">L60.00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

