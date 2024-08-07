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
<header class="bg-custom text-white py-3">
        <?php include '../../../assets/component/navbar.php'; ?>
    </header>
    <div class="container">
        <section class="title">
            <h1>Mantenimiento de productos</h1>
        </section>
        <div class="dividor">
            <section class="form">
                <h1>DETALLES DE PRODUCTO</h1>
                <form action="../../../save_product.php"  method="post">
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
                    </form>

                
            </section>

            <section class="listado">
                <div class="caja">
                    <h1>LISTADO DE PRODUCTOS</h1>
                    <div class="group">
                        <label for="search" class="search_label" >Buscado por codigo</label>
                        <div class="search-img">
                            <input type="text" name="search" id="search">
                            <a href=""><img src="../../../assets/img/lupa.png" alt=""></a>
                        </div>
                    </div>
                    
                </div>
                
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