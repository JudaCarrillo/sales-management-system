<?php
require_once __DIR__ . '/src/controllers/maintenance/ProductsController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = [
        'code' => $_POST['code'],
        'name' => $_POST['name'],
        'source' => $_POST['source'],
        'brand' => $_POST['brand'],
        'unit' => $_POST['unit'],
        'category' => $_POST['category'],
        'price' => $_POST['price'],
        'stock' => $_POST['stock']
    ];

    $controller = new ProductsController();
    
    if ($controller->get('code = "' . $product['code'] . '"')) {
        $controller->update($product);
    } else {
        $controller->save($product);
    }
} else {
    echo "Error: Método no permitido.";
}
?>