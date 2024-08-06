<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/productos-view.css">
    <title>Document</title>
</head>

<body>

    <body>
        <form action="../../../save_product.php" method="post">

            <div class="container">
                <section class="title">
                    <h1>Mantenimiento de productos</h1>
                </section>
                <div class="dividor">
                    <section class="form">
                        <h1>DETALLES DE PRODUCTO</h1>
                        <article class="Parte1">
                            <div class="group">
                                <label for="codigo">Codigo</label>
                                <input type="text" name="code" id="code">
                            </div>
                            <div class="group">
                                <label for="procedencia">Procedencia</label>
                                <input type="text" name="source" id="source">
                            </div>
                        </article>
                        <article class="Parte2">
                            <div class="group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="group">
                                <label for="unidad">Unidad</label>
                                <input type="text" name="unit" id="unit">
                            </div>
                            <div class="group">
                                <label for="categoria">Categoría</label>
                                <input type="text" name="category" id="category">
                            </div>
                            <div class="group">
                                <label for="marca">Marca</label>
                                <input type="text" name="brand" id="brand">
                            </div>
                            <div class="group">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" id="stock">
                            </div>
                            <div class="group">
                                <label for="precio">Precio</label>
                                <input type="number" name="price" id="price">
                            </div>
                            <div class="group">
                                <label for="stock">Estado:</label>
                                <input type="checkbox" id="status" name="status" checked="true">
                            </div>

                        </article>
                        <div class="separado">
                            <div class="group">
                                <label for="fecha_creacion">Fecha de Creación</label>
                                <input type="date" name="fecha_creacion" id="fecha_creacion">
                            </div>
                            <div class="group">
                                <label for="fecha_actualizacion">Fecha de Actualización</label>
                                <input type="date" name="fecha_actualizacion" id="fecha_actualizacion">
                            </div>
                        </div>


                    </section>

                    <section class="listado">
                        <div class="caja">
                            <h1>LISTADO DE PRODUCTOS</h1>
                            <div class="group">
                                <label for="search" class="search_label">Buscado por codigo</label>
                                <input type="text" name="search" id="search">

                            </div>

                        </div>
                        <div class="actions">
                            <button class="nuevo" name="action" value="Guardar Producto">Nuevo</button>
                            <button class="editar" name="action" value="Editar Producto">Editar</button>
                            <button class="cancelar" name="action" value="Deshabilitar Producto">Cancelar</button>
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
                            <?php 
                                require_once __DIR__ . '../../../controllers/maintenance/ProductsController.php';
                                $controller = new ProductsController();
                                $columns = ['code', 'name', 'category', 'brand', 'stock', 'price'];
                                $where = 'status = 1';
                                $products = $controller->get($where, $columns);
                                foreach ($products as $product) {
                                    echo "<tr>";
                                    echo "<td>" . $product['code'] . "</td>";
                                    echo "<td>" . $product['name'] . "</td>";
                                    echo "<td>" . $product['category'] . "</td>";
                                    echo "<td>" . $product['brand'] . "</td>";
                                    echo "<td>" . $product['stock'] . "</td>";
                                    echo "<td>" . $product['price'] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </form>

    </body>

</html>