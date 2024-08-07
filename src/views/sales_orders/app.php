<?php
require_once __DIR__ . '/../../controllers/ventas/salesOrdersController.php';

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

$controller = new SalesOrdersController();
$saleOrder = [
    'code' => $_POST['code'],
    'customer_id' => $_POST['customer_id'],
    'employee_id' => $_POST['employee_id'],
    'customer_dni' => $_POST['customer_dni'],
    'customer_address' => $_POST['customer_address'],
    'pay_method' => $_POST['pay_method'],
    'currency' => $_POST['currency'],
    'branch_office' => $_POST['branch_office'],
    'date' => $_POST['date'],
    'notes' => $_POST['notes'],
    'gross_price' => $_POST['gross_price'],
    'discount' => $_POST['discount'],
    'net_price' => $_POST['net_price'],
    'igv' => $_POST['igv'],
    'final_price' => $_POST['final_price'],
    'created_at' => $_POST['created_at'],
    'updated_at' => $_POST['updated_at']
];

switch ($action) {
    case 'Guardar Producto':
        $controller->save2($saleOrder);
        break;

    case 'Editar Producto':
        if (!$controller->get('code = "' . $product['code'] . '"')) {
            echo "Error: Producto no encontrado";
            exit;
        }

        $controller->update2($product);
        break;

    default:
        echo "Acción no válida.";
        break;
}