<?php
require_once __DIR__ . '../../../controllers/maintenance/ProductsController.php';

// Procesar la solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;
    $code = $_POST['code'] ?? null;
    $search_code = $_POST['search_code'] ?? null;

    if ($action === 'Buscar Producto') {
        if (!$search_code) {
            $error = "Error: Falta el código para buscar.";
        } else {
            $controller = new ProductsController();
            $product = $controller->getByCode($search_code);
            if (!$product) {
                $error = "Error: Producto no encontrado";
            } else {
                $_POST = $product;
            }
        }
    } else {
        if (!$action || !$code) {
            $error = "Error: Faltan datos requeridos.";
        } else {
            $controller = new ProductsController();
            $product = [
                'code' => $_POST['code'],
                'name' => $_POST['name'] ?? '',
                'source' => $_POST['source'] ?? '',
                'brand' => $_POST['brand'] ?? '',
                'unit' => $_POST['unit'] ?? '',
                'category' => $_POST['category'] ?? '',
                'price' => $_POST['price'] ?? 0,
                'stock' => $_POST['stock'] ?? 0,
                'status' => $_POST['status'] ?? 0
            ];

            switch ($action) {
                case 'Guardar Producto':
                    $controller->save($product);
                    $success = "Producto guardado exitosamente.";
                    break;

                case 'Deshabilitar Producto':
                    $controller->disable($code);
                    $success = "Producto deshabilitado exitosamente.";
                    break;

                case 'Editar Producto':
                    if (!$controller->get('code = "' . $product['code'] . '"')) {
                        $error = "Error: Producto no encontrado";
                    } else {
                        $controller->update($product);
                        $success = "Producto actualizado exitosamente.";
                    }
                    break;

                default:
                    $error = "Acción no válida.";
                    break;
            }
        }
    }
}

// Obtener la lista de productos
$controller = new ProductsController();
$columns = ['code', 'name', 'category', 'brand', 'stock', 'price'];
$where = '';
$products = $controller->get($where, $columns);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/productos-view.css">
    <title>Mantenimiento de Productos</title>
</head>

<body>

    <?php include_once '../../../assets/component/navbar.php'; ?>

    <div class="container">
        <form action="" method="post">
            <section class="title">
                <h1>Mantenimiento de productos</h1>
            </section>
            <?php if (isset($success)) : ?>
                <div class="success-message"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <?php if (isset($error)) : ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <div class="dividor">
                <section class="form">
                    <h1>DETALLES DE PRODUCTO</h1>
                    <article class="Parte1">
                        <div class="group">
                            <label for="codigo">Codigo</label>
                            <input type="text" name="code" id="code" value="<?= htmlspecialchars($_POST['code'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="procedencia">Procedencia</label>
                            <input type="text" name="source" id="source" value="<?= htmlspecialchars($_POST['source'] ?? '') ?>">
                        </div>
                    </article>
                    <article class="Parte2">
                        <div class="group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="name" id="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="unidad">Unidad</label>
                            <input type="text" name="unit" id="unit" value="<?= htmlspecialchars($_POST['unit'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="categoria">Categoría</label>
                            <input type="text" name="category" id="category" value="<?= htmlspecialchars($_POST['category'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="marca">Marca</label>
                            <input type="text" name="brand" id="brand" value="<?= htmlspecialchars($_POST['brand'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" id="stock" value="<?= htmlspecialchars($_POST['stock'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="precio">Precio</label>
                            <input type="number" name="price" id="price" value="<?= htmlspecialchars($_POST['price'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="status">Estado:</label>
                            <input type="checkbox" id="status" name="status" <?= isset($_POST['status']) ? 'checked' : '' ?>>
                        </div>
                    </article>
                </section>
                <section class="listado">
                    <div class="caja">
                        <h1>LISTADO DE PRODUCTOS</h1>
                        <div class="group">
                            <label for="search" class="search_label">Buscado por codigo</label>
                            <div class="search-img">
                                <input type="text" name="search_code" id="search_code">
                                <button name="action" value="Buscar Producto" style="border:none;background-color:transparent"> <a href=""><img src="../../../assets/img/lupa.png" alt=""></a></button>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="nuevo" name="action" value="Guardar Producto">Nuevo</button>
                        <button class="editar" name="action" value="Editar Producto">Editar</button>
                        <button class="cancelar" name="action" value="Deshabilitar Producto">Deshabilitar</button>
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
                                <?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($product['code']) ?></td>
                                        <td><?= htmlspecialchars($product['name']) ?></td>
                                        <td><?= htmlspecialchars($product['category']) ?></td>
                                        <td><?= htmlspecialchars($product['brand']) ?></td>
                                        <td><?= htmlspecialchars($product['stock']) ?></td>
                                        <td><?= htmlspecialchars($product['price']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </form>
    </div>

</body>

</html>