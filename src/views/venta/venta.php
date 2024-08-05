<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container">

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../../assets/img/logo.webp" width="50" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../../home.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ventas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Transacciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Producto</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cliente</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="section">
            <h1 class="text-center mt-2">Gestión de Ventas</h1>


            <div class="row mt-5 d-flex w-100 justify-content-between  ">

                <div class="col-md-6 offset-md-3">
                    <!-- Barra de búsqueda -->
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar">
                        <button class="btn btn-primary" type="button">Buscar</button>
                    </div>
                </div>

                <div class="col">
                    <button class="btn btn-primary">Agregar</button>
                </div>

            </div>

            <div class="row mt-5" >
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Cod</th>
                                <th scope="col">Cod Empleado</th>
                                <th scope="col">Cod Cliente</th>
                                <th scope="col">Fecha y Hora</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>ACC</td>
                                <td>1</td>
                                <td>27/08/24 12:31</td>
                                <td>150</td>
                                <td>@EDIT</td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>ABB</td>
                                <td>2</td>
                                <td>27/08/24 12:31</td>
                                <td>250</td>
                                <td>@EDIT</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                                <td>AAA</td>
                                <td>2</td>
                                <td>27/08/24 12:31</td>
                                <td>350</td>
                                <td>@EDIT</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>


    </div>
</body>

</html>