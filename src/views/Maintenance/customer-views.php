<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/customer-view.css">
    <title>Document</title>
</head>
<body>
<body>
    <div class="container">
        <section class="title">
            <h1>Mantenimiento de Clientes</h1>
        </section>
        <div class="dividor">
            <section class="form">
                <h1>DETALLES DE CLIENTES</h1>
                <form action="../../../save_product.php"  method="post">
                        <article class="Parte2">
                            <div class="group">
                                <label for="codigo">Codigo</label>
                                <input type="text" name="code" id="code">
                            </div>
                            <div class="group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="group">
                                <label for="ApellidoMaterno">Apellido Materno</label>
                                <input type="text" name="" id="">
                            </div>
                            <div class="group">
                                <label for="ApellidoPaterno">Apellido Paterno</label>
                                <input type="text" name="" id="">
                            </div>
                            <div class="group">
                                <label for="razonSocial">Razon social</label>
                                <input type="text" name="" id="">
                            </div>
                            <div class="group">
                                <label for="dni">DNI</label>
                                <input type="number" name="dni" id="d">
                            </div>
                            <div class="group">
                                <label for="ruc">RUC</label>
                                <input type="number" name="price" id="price">
                            </div>
                            <div class="group">
                                <label for="telefono">Telefono</label>
                                <input type="number" name="price" id="price">
                            </div>
                            <div class="group">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="price" id="price">
                            </div>
                            <div class="group">
                                <label for="TipoCliente">Tipo de cliente</label>
                                <input type="text" name="price" id="price">
                            </div>
                            <div class="group">
                            <label for="estatus">Estado:</label>
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
                    <h1>LISTADO DE CLIENTES</h1>
                    <div class="group">
                        <label for="search" class="search_label" >Buscado por RUC / DNI</label>
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