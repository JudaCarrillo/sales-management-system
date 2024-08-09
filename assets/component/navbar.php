<?php
session_start();


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/navbar.css"><!-- Enlace al archivo CSS externo -->
    <link rel="stylesheet" href="/assets/css/drop-down.css">
    <title>Ejemplo de Navbar</title>
</head>

<body>
    <nav class="navbar"><!-- Contenedor del Navbar -->
        <div class="logo-container"><!-- Contenedor del logo -->
            <a href="/home.php">
                <img src="/assets/img/logo_white_small.png" alt="Logo" class="logo"><!-- Imagen del logo -->
            </a>
        </div>
        <div class="menu-items"><!-- Contenedor de los elementos del menú -->
            <div class="dropdown">
                <a href="#" class="menu-link">Ventas ▼</a>
                <div class="dropdown-content">
                    <a href="/src/views/venta/salesOrder-view.php">Orden de Venta</a>
                    <a href="/src/views/venta/facturacion-view.php">Factura</a>
                    <a href="/src/views/venta/acountStatus-view.php">Estado de Cuenta</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="menu-link">Mantenimiento ▼</a><!-- Mantenimiento con flecha para dropdown -->
                <div class="dropdown-content"><!-- Contenido del dropdown -->
                    <a href="/src/views/Maintenance/Producto_view.php">Productos</a>
                    <a href="/src/views/Maintenance/customer-views.php">Clientes</a>
                    <a href="/src/views/Maintenance/employees_view.php">Empleados</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="menu-link">Reportes ▼</a>
                <div class="dropdown-content">
                    <a href="/src/views/Reportes/RegistroFacturas-view.php">Registro de Facturas</a>
                    <a href="/src/views/Reportes/reporteVentasFecha-view.php">Ventas por Fecha</a>
                    <a href="/src/views/Reportes/reporteVentasCliente-view.php">Ventas por Cliente</a>
                    <a href="/src/views/Reportes/reporteVentasProducto-view.php">Ventas por Producto</a>
                </div>
            </div>
        </div>
        <div class="user-info">
            <?php if (isset($_SESSION['user_name'])) : ?>
                <span class="username"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
            <?php else : ?>
                <span class="username">Invitado</span>
            <?php endif; ?>
            <img src="/assets/img/user-image.png" alt="Imagen del usuario" class="user-image" id="userImage">
            <div class="dropdown-menu" id="dropdownMenu">
                <a href="/src/controllers/auth/LogOut.php">Cerrar sesión</a>

            </div>
        </div>
    </nav>
    <script src="/assets/js/navbar/navbar.js"></script><!-- Enlace al archivo JavaScript externo -->
</body>

</html>