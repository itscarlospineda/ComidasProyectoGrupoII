<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Acceso Denegado</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #ece9e6, #ffffff);
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #333;
    }

    .container {
      background: #fff;
      padding: 2.5rem 3rem;
      border-radius: 1.5rem;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      text-align: center;
      max-width: 420px;
      animation: fadeIn 0.6s ease-out;
    }

    .icon {
      font-size: 4rem;
      color: #f87171;
      margin-bottom: 1rem;
    }

    .container h1 {
      font-size: 1.8rem;
      color: #dc2626;
      margin-bottom: 0.5rem;
    }

    .container p {
      font-size: 1rem;
      margin-bottom: 1.8rem;
      color: #555;
    }

    .container a {
      display: inline-block;
      padding: 0.7rem 1.4rem;
      background: #2563eb;
      color: #fff;
      text-decoration: none;
      border-radius: 0.6rem;
      font-weight: 600;
      transition: background 0.3s ease;
    }

    .container a:hover {
      background: #1e3a8a;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="icon">🚫</div>
    <h1>Acceso restringido</h1>
    <p>Lo sentimos, tu cuenta no tiene permisos para acceder a esta sección del sistema.</p>
    <a href="/">Volver al inicio</a>
  </div>
</body>
</html>
