<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
</head>

<body>
    <h1>Producto</h1>
    <form action="save_product.php" method="post">
        <label for="code">Código:</label>
        <input type="text" id="code" name="code" required><br><br>

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="source">Fuente:</label>
        <input type="text" id="source" name="source" required><br><br>

        <label for="brand">Marca:</label>
        <input type="text" id="brand" name="brand" required><br><br>

        <label for="unit">Unidad:</label>
        <input type="text" id="unit" name="unit" required><br><br>

        <label for="category">Categoría:</label>
        <input type="text" id="category" name="category" required><br><br>

        <label for="price">Precio:</label>
        <input type="number" id="price" name="price" step="0.01" required><br><br>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required><br><br>

        <label for="stock">Estado:</label>
        <input type="checkbox" id="status" name="status" checked="true"><br><br>


        <input type="submit" name="action" value="Guardar Producto">
        <input type="submit" name="action" value="Editar Producto">
        <input type="submit" name="action" value="Deshabilitar Producto">
    </form>
</body>

</html>