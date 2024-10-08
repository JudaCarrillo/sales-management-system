<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/reporteVentas-view.css">
    <title>Document</title>
</head>

<body>
    <?php include_once '../../../assets/component/navbar.php'; ?>

    <div class="container">
        <section class="title">
            <h1>REGISTRO DE VENTAS</h1>
        </section>
        <div class="dividor">
            <section class="form">
                <form action="../../../save_product.php" method="post">
                    <article class="Parte2">
                        <div class="group">
                            <label for="fechaInicio">Fecha de Inicio</label>
                            <input type="date" name="fechaInicio" id="fechaInicio">
                        </div>
                        <div class="group">
                            <label for="fechaFin">Fecha de Fin</label>
                            <input type="date" name="fechaFin" id="fechaFin">
                        </div>
                    </article>
                    <div class="button-actions">
                        <button class="consultar">Consultar</button>
                        <button class="imprimir">Imprimir</button>
                    </div>
                </form>
            </section>
            <section class="listado">
                <h1>Reportes de Ventas</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Marca</th>
                            <th>Stock</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                        </tr>
                        <tr>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                        </tr>
                        <tr>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>2</td>
                            <td>s</td>
                            <td>s</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>3</td>
                            <td>4</td>
                            <td>r</td>
                            <td>s</td>
                            <td>s</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>

</html>