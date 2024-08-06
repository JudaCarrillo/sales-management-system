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
    <div class="container">
        <section class="title">
            <h1>Mantenimiento de productos</h1>
        </section>
        <div class="dividor">
            <section class="form">
                <h1>DETALLES DE PRODUCTO</h1>
                <form action="" method="post">
                    <article class="Parte1">
                        <div class="group">
                            <label for="codigo">Codigo</label>
                            <input type="text" name="codigo" id="codigo">
                        </div>
                        <div class="group">
                            <label for="procedencia">Procedencia</label>
                            <select name="procedencia" id="procedencia">
                                <option value="">Seleccione procedencia</option>
                            </select>
                        </div>
                    </article>
                    <article class="Parte2">
                        <div class="group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre">
                        </div>
                        <div class="group">
                            <label for="unidad">Unidad</label>
                            <select name="unidad" id="unidad">
                                <option value="">Seleccione unidad</option>
                            </select>
                        </div>
                        <div class="group">
                            <label for="categoria">Categoría</label>
                            <select name="categoria" id="categoria">
                                <option value="">Seleccione categoría</option>
                            </select>
                        </div>
                        <div class="group">
                            <label for="marca">Marca</label>
                            <select name="marca" id="marca">
                                <option value="">Seleccione marca</option>
                            </select>
                        </div>
                        <div class="group">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" id="stock">
                        </div>
                        <div class="group">
                            <label for="precio">Precio</label>
                            <input type="number" name="precio" id="precio">
                        </div>
                        <div class="group">
                            <label for="status">Status</label>
                            <select name="status" id="status">
                                <option value="">Seleccione status</option>
                            </select>
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
                        <input type="text" name="search" id="search">

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