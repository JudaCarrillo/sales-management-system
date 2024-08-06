<!DOCTYPE html>
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
        <form action="procesar_login.php" method="post">
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
      </div>
      <div class="seccion-derecha">
      </div>
    </div>
  </body>
</html>
