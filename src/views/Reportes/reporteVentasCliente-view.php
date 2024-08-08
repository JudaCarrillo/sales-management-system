<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/reporteVentasCliente-view.css">
    <title>Document</title>
</head>

<body>
    <?php include_once '../../../assets/component/navbar.php'; ?>

    <div class="container">
        <section class="title">
            <h1>REPORTE DE VENTAS POR CLIENTE</h1>
        </section>
        <div class="dividor">
            <section class="form">
                <form action="../../../save_product.php" method="post">
                    <article class="Parte2">
                        <div class="group">
                            <label for="cliente">Cliente</label>
                            <select name="client" id="client">
                                <option value="s">s</option>
                                <option value="s">s</option>
                            </select>
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