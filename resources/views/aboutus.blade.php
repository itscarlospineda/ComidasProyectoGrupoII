<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nosotros - Sabor Catracho</title>
    
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f3f3;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            font-size: 16px;
        }

           /* Header con imagen de fondo */
           header {
            background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url({{ Vite::asset('resources/images/fondo-nosotros.jpg')}});
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 60px 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4); /* Fondo oscuro semi-transparente */
            z-index: -1;
        }



        header .logo h1 {
            font-size: 3rem;
            margin-bottom: 10px;
            letter-spacing: 3px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        header .logo p {
            font-size: 1.3rem;
            margin-bottom: 20px;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 20px;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            padding: 10px 15px;
            border-radius: 30px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #fff;
            color: #e67e22;
            transform: scale(1.1);
        }

        /* Sección Nosotros */
        .about-us {
            display: flex;
            justify-content: space-between;
            padding: 60px 5%;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: -50px;
            z-index: 10;
        }

        .about-content {
            flex: 1;
            padding-right: 20px;
            font-size: 1.1rem;
            color: #555;
        }

        .about-content h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 600;
            color: #e99401;
            text-transform: uppercase;
        }

        .about-content p {
            line-height: 1.8;
            margin-bottom: 20px;
            color: #333;
        }

        .about-content p:last-child {
            margin-bottom: 0;
        }

        .about-image {
            flex: 1;
            text-align: center;
            position: relative;
            padding: 10px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .about-image img {
            width: 100%;
            max-width: 450px;
            border-radius: 15px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .about-image img:hover {
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 1rem;
            margin-top: 80px;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #e67e22;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Estilos para dispositivos móviles */
        @media screen and (max-width: 768px) {
            .about-us {
                flex-direction: column;
                padding: 40px 20px;
            }

            .about-content {
                padding-right: 0;
                margin-bottom: 30px;
            }

            .about-image {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="logo">
            
            <span class="fw-bold" style="color: white; font-size:65px;"> Sabor</span>
            <span class="fw-bold" style="color: rgb(43, 43, 175); font-size:65px;">Catracho </span>
         
            <p>El Sabor de los Hondureños</p>
        </div>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Nosotros</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Comidas</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li>
            </ul>
        </nav>
    </header>

    <!-- Sección Nosotros -->
    <section class="about-us">
        <div class="about-content">
            <h2>Sobre Sabor Catracho</h2>
            <p>En Sabor Catracho, nuestra misión es llevarte una auténtica experiencia hondureña, donde cada bocado te transporte a la calidez de nuestra tierra. Somos un restaurante comprometido con la tradición culinaria de Honduras, ofreciendo los sabores que han sido transmitidos de generación en generación.
            <p>Desde las inconfundibles baleadas hasta los deliciosos pollos chucos, en Sabor Catracho nos enorgullece preparar cada plato con ingredientes frescos, locales y llenos de historia. Nuestros chefs, originarios de diferentes regiones de Honduras, preparan con amor y dedicación recetas que han sido parte de la vida cotidiana en los hogares catrachos por siglos.</p>
            <p>Aquí, en Sabor Catracho, creemos que la comida es mucho más que solo nutrición; es una forma de compartir nuestra cultura, nuestras raíces y nuestra pasión por la gastronomía. Ven a disfrutar no solo de un almuerzo, sino de una experiencia llena de tradición, sabor y hospitalidad, porque en cada plato que servimos, hay un pedacito de Honduras esperando por ti.</p>
        </p>
        </div>
        <div class="about-image">
            <img src="{{ Vite::asset('resources/images/Logo-restaurante-tarea.PNG') }}" alt="Comida típica de Honduras">
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 SaborCatracho | Todos los derechos reservados</p>
        <p>Dirección: Avenida Circunvalación, San Pedro Sula, Honduras | Teléfono: +504 0000-0000</p>
    </footer>

</body>
</html>
