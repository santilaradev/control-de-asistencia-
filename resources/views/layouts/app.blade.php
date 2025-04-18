Archivo: resources/views/layouts/app.blade.php 


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #ffffff; /* Fondo blanco */
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #0d6efd; /* Azul */
        }
        .navbar-brand, .nav-link, .text-light {
            color: #fff !important;
        }
        .form-control:focus {
            border-color: #dc3545; /* Rojo */
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
        .btn-primary {
            background-color: #dc3545; /* Botón rojo */
            border-color: #dc3545;
        }
        .btn-primary:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .alert {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Sistema de Registro</a>
    </div>
</nav>

<div class="container mt-5">
    @yield('content')
</div>

<!-- Bootstrap JS (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>