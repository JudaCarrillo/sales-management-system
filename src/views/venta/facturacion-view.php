<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/facturacion-view.css">
    <title>Document</title>
</head>

<body>
    <?php include_once '../../../assets/component/navbar.php'; ?>

    <div class="container">
        <section class="title">
            <h1>FACTURACION</h1>
        </section>
        <div class="dividor">
            <div class="espacios">
                <div class="parteCode">
                    <div class="group">
                        <input class="code" type="text" name="code" id="code">
                    </div>
                </div>
                <section class="form">
                    <h1>DATOS DE VENTA</h1>
                    <form action="../../../save_product.php" method="post">
                        <article class="Parte2">
                            <div class="group">
                                <label for="orden">Orden de Venta</label>
                                <select name="order" id="order">
                                    <option value="s">s</option>
                                    <option value="s">s</option>
                                    <option value="s">s</option>
                                </select>
                            </div>
                            <div class="group">
                                <label for="almacen">Almacen</label>
                                <input type="text" name="store" id="store">
                            </div>
                            <div class="group">
                                <label for="ruc">RUC/DNI</label>
                                <input type="text" name="ruc" id="ruc">
                            </div>
                            <div class="group">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="address" id="address">
                            </div>
                            <div class="group">
                                <label for="cliente">Cliente</label>
                                <input type="text" name="client" id="client">
                            </div>
                            <div class="group">
                                <label for="fecha">Fecha de Emision</label>
                                <input type="text" name="fecha" id="fecha">
                            </div>
                            <div class="group">
                                <label for="sucursal">Sucursal</label>
                                <input type="text" name="sucursal" id="sucursal">
                            </div>
                            <div class="group">
                                <label for="moneda">Moneda</label>
                                <input type="text" name="money" id="money">
                            </div>
                        </article>
                    </form>
                </section>

            </div>
            <section class="listado">

                <div class="actions">
                    <button class="nuevo">Nuevo</button>
                    <button class="editar">Editar</button>
                    <button class="cancelar">Cancelar</button>
                </div>
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