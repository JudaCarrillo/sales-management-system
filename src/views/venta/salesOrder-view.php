<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/salesOrder-view.css">
    <title>Document</title>
</head>

<body>
    <?php include_once '../../../assets/component/navbar.php'; ?>

    <div class="container">
        <section class="title">
            <h1>ORDEN DE VENTAS</h1>
        </section>
        <div class="dividor">
            <div class="espacios">
                <div class="parteCode">
                    <div class="group">
                        <input class="code" type="text" name="code" id="code">
                    </div>
                </div>
                <section class="form">
                    <h1>DATOS DE CLIENTE</h1>
                    <form action="../../../save_product.php" method="post">
                        <article class="Parte2">
                            <div class="group">
                                <label for="cliente">Cliente</label>
                                <select name="client" id="client">
                                    <option value="s">s</option>
                                    <option value="s">s</option>
                                    <option value="s">s</option>
                                </select>
                            </div>
                            <div class="group">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="address" id="address">
                            </div>
                            <div class="group">
                                <label for="ruc">RUC/DNI</label>
                                <input type="text" name="ruc" id="ruc">
                            </div>
                            <div class="group">
                                <label for="moneda">Moneda de pago</label>
                                <input type="text" name="currency" id="currency">
                            </div>
                            <div class="group">
                                <label for="tipopago">Tipo de pago</label>
                                <input type="text" name="paymentType" id="paymentType">
                            </div>
                        </article>
                    </form>
                </section>
                <section class="form">
                    <h1>DATOS DEL VENDEDOR</h1>
                    <form action="#" method="post">
                        <article class="Parte2">
                            <div class="group">
                                <label for="vendedor">Vendedor</label>
                                <select name="" id="">
                                    <option value="s">s</option>
                                    <option value="s">s</option>
                                    <option value="s">s</option>
                                </select>
                            </div>
                            <div class="group">
                                <label for="sucursal">Sucursal</label>
                                <input type="text" name="" id="">
                            </div>
                            <div class="group">
                                <label for="fechapago">Fecha de pago</label>
                                <input type="text" name="" id="">
                            </div>


                        </article>
                        <div class="notas">
                            <div class="group">
                                <label for="nota">Nota</label>
                                <textarea name="note" id="note" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <section class="listado">
                <div class="caja">
                    <h1>DETALLES DE PRODUCTOS</h1>
                    <div class="group">
                        <label for="search" class="search_label">PRODUCTO</label>
                        <div class="search-img">
                            <select name="producto" id="">
                                <option value="s">s</option>
                                <option value="s">s</option>
                                <option value="s">s</option>
                            </select>
                            <button class="agregar">Agregar</button>
                        </div>
                    </div>
                    <div class="grupo-producto">
                        <div class="group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" name="quantity" id="quantity">
                        </div>
                        <div class="group">
                            <label for="p.unitario">P. Unitario</label>
                            <input type="number" name="price" id="price">
                        </div>
                        <div class="group">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" id="stock">
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <button class="nuevo">Nuevo</button>
                    <button class="editar">Editar</button>
                    <button class="cancelar">Cancelar</button>
                </div>
                <div class="table-content">
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
                </div>
            </section>
        </div>
    </div>
</body>

</html>