<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
        }

        .navbar {
            width: 20%;
            padding: 20px;
            height: 100vh;
            /* Ocupa toda la altura de la ventana */
            box-sizing: border-box;
            border: black solid;
        }

        .navbar a {
            display: block;
            color: black;
            text-decoration: none;
            padding: 10px 0;
        }

        .navbar a:hover {
            background-color: white;
        }

        .content {
            width: 80%;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .section {
            width: 70%;
        }

        .logo {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }
    </style> -->
</head>

<body>

    <div class="container">

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="./assets/img/logo.webp" width="50" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./views/venta/venta.php">Ventas</a>
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

        <div class="section d-flex flex-column align-items-center">

            <div class="row w-75 m-4 ">
                <h1 class="text-center">
                    
                    Nuestro proposito
                </h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis totam eos libero? Incidunt dolor earum, impedit qui temporibus, magnam, dicta quis ea atque odio optio fugiat rem alias cum veritatis!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis totam eos libero? Incidunt dolor earum, impedit qui temporibus, magnam, dicta quis ea atque odio optio fugiat rem alias cum veritatis!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis totam eos libero? Incidunt dolor earum, impedit qui temporibus, magnam, dicta quis ea atque odio optio fugiat rem alias cum veritatis!</p>

            </div>
            <div class="row w-75 m-4">
                <h1 class="text-center">Vision y Mision</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis totam eos libero? Incidunt dolor earum, impedit qui temporibus, magnam, dicta quis ea atque odio optio fugiat rem alias cum veritatis!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis totam eos libero? Incidunt dolor earum, impedit qui temporibus, magnam, dicta quis ea atque odio optio fugiat rem alias cum veritatis!</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi quam libero velit animi quos beatae, accusamus unde. Eius necessitatibus perspiciatis officiis vel consequuntur expedita, sapiente quam quis repellat eveniet quisquam!</p>
            </div>

        </div>


    </div>

    <!-- <div class="container">
        <div class="navbar">

            <div class="logo ">
                <img src="./assets/img/logo.webp" alt="" height="170" srcset="">
                <span>Guille Store</span>
            </div>

            <a href="#mision-vision">Inicio</a>
            <a href="#mision-vision">Venta</a>
            <a href="#mision-vision">Transacciones</a>
            <a href="#mision-vision">Producto</a>
            <a href="#mision-vision">Cliente</a>

        </div>
        <div class="content">


            <div id="proposito" class="section ">
                <h1 class="text-center">Nuestro Propósito</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis quibusdam sint ad modi, quae beatae tempora explicabo pariatur officia. Rerum dolor eligendi modi iure quidem voluptas excepturi nulla adipisci quas.</p>
            </div>
            <div id="mision-vision" class="section ">
                <h1 class="text-center">Misión y Visión</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate officiis totam suscipit, obcaecati nulla eius quasi possimus eum iste exercitationem id illo error maiores, tempora a vero iusto voluptatem dignissimos.</p>
            </div>
        </div>
    </div> -->
</body>

</html>