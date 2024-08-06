<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guille Store</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <style>
        .hero-text {
            font-style: italic;
            color: #333;
            text-align: center;
        }

        .form-container {
            /* background-color: #f8f9fa; */
            border-radius: 10px;
            padding: 20px;
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
        }

        /* .logo-container img {
            max-width: 100%;
            height: auto;
        } */

        .logo-container p {
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-sm-8">
                <div class="row mt-5 text-center">
                    <h1 class="hero-text text-center">
                        TU MERCADO, TU ELECCIÓN
                    </h1>
                </div>
                <div class="row text-center d-flex align-items-center">
                    <img src="./assets/img/fondo.png" alt="Fondo" class=" w-75 d-none d-sm-block" width="100">
                </div>
            </div>

            <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center">
                <div class="form-container">
                    <div class="logo-container text-center mb-4">
                        <img src="./assets/img/logo.webp" alt="Logo" width="250">
                        <p>Guille Store</p>
                    </div>

                    <form class="d-flex flex-column">
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Usuario</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <a href="./home.php" class="text-black">
                                Iniciar sesión
                            </a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>