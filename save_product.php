<?php
require_once __DIR__ . '/src/controllers/maintenance/ProductsController.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Error: Método no permitido.";
    exit;
}

$action = $_POST['action'] ?? null;
$code = $_POST['code'] ?? null;

if (!$action || !$code) {
    echo "Error: Faltan datos requeridos.";
    exit;
}

$controller = new ProductsController();
$product = [
    'code' => $_POST['code'],
    'name' => $_POST['name'],
    'source' => $_POST['source'],
    'brand' => $_POST['brand'],
    'unit' => $_POST['unit'],
    'category' => $_POST['category'],
    'price' => $_POST['price'],
    'stock' => $_POST['stock'],
    'status' => $_POST['status'] ?? 0
];

switch ($action) {
    case 'Guardar Producto':
        $controller->save($product);
        break;

    case 'Deshabilitar Producto':
        $controller->disable($code);
        break;

    case 'Editar Producto':
        // Ensure the product exists before attempting to update
        if (!$controller->get('code = "' . $product['code'] . '"')) {
            echo "Error: Producto no encontrado";
            exit;
        }

        $controller->update($product);
        break;

    default:
        echo "Acción no válida.";
        break;
}
