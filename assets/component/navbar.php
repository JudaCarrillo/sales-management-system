<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/navbar.css"><!-- Enlace al archivo CSS externo -->
    <title>Ejemplo de Navbar</title>
</head>
<body>
    <nav class="navbar"><!-- Contenedor del Navbar -->
        <div class="logo-container"><!-- Contenedor del logo -->
            <img src="./assets/img/logo_white_small.png" alt="Logo" class="logo"><!-- Imagen del logo -->
        </div>
        <div class="menu-items"><!-- Contenedor de los elementos del menú -->
            <div class="dropdown">
                <a href="#" class="menu-link">Ventas ▼</a><!-- Ventas con flecha para dropdown -->
                <div class="dropdown-content"><!-- Contenido del dropdown -->
                    <a href="#">Subopción 1</a>
                    <a href="#">Subopción 2</a>
                    <a href="#">Subopción 3</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="menu-link">Mantenimiento ▼</a><!-- Mantenimiento con flecha para dropdown -->
                <div class="dropdown-content"><!-- Contenido del dropdown -->
                    <a href="#">Subopción 1</a>
                    <a href="#">Subopción 2</a>
                    <a href="#">Subopción 3</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="menu-link">Reportes ▼</a><!-- Reportes con flecha para dropdown -->
                <div class="dropdown-content"><!-- Contenido del dropdown -->
                    <a href="#">Subopción 1</a>
                    <a href="#">Subopción 2</a>
                    <a href="#">Subopción 3</a>
                </div>
            </div>
        </div>
        <div class="user-info"><!-- Contenedor de la información del usuario -->
            <span class="username">$usuario</span><!-- Nombre del usuario -->
            <img src="user-image.png" alt="Imagen del usuario" class="user-image"><!-- Imagen del usuario -->
        </div>
    </nav>
    <script src="./assets/js/navbar/navbar.js"></script><!-- Enlace al archivo JavaScript externo -->
</body>
</html>
