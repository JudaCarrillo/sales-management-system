<?php

require_once __DIR__ . '/src/controllers/auth/AuthController.php';
require_once __DIR__ . '/src/models/maintenance/Employees.php';

$errorMessage = '';

$controller = new AuthController();
$datahandler = new Employees();

$user = "admin";
$password = "hola";
$result = $controller->login($user, $password);
// $result = $datahandler->getAll();
// echo json_encode($result);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
  $password = isset($_POST['contraseña']) ? trim($_POST['contraseña']) : '';

  $controller = new AuthController();

  $loginResult = $controller->login($user, $password);

  if ($loginResult === true) {
    header('Location: /src/views/Maintenance/dashboard.php');
    exit();
  } else {
    $errorMessage = "Usuario o contraseña incorrectos";
  }
}
?>

<!-- <!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Página de Inicio de Sesión</title>
    <link rel="stylesheet" href="./assets/css/login.css" />
  </head>
  <body>
    <div class="contenedor">
      <div class="seccion-izquierda">
        <div class="logo">
          <h2 class="Frase">Sistema de Gestion de Ventas</h2>
          <img src="./assets/img/Logo.png" alt="Logo" />
        </div>
        <form action="" method="post">
          <div class="grupo-formulario">
            <input
              type="text"
              id="usuario"
              name="usuario"
              placeholder="Usuario"
              required
            />
          </div>
          <div class="grupo-formulario">
            <input
              type="password"
              id="contraseña"
              name="contraseña"
              placeholder="Contraseña"
              required
            />
          </div>
          <button class="boton-iniciar-sesion" type="submit">Iniciar Sesión</button>
        </form>
        <?php if ($errorMessage): ?>
        <p class="error"><?php echo htmlspecialchars($errorMessage); ?></p>
        <?php endif; ?>
      </div>
      <div class="seccion-derecha">
      </div>
    </div>
  </body>
</html> -->