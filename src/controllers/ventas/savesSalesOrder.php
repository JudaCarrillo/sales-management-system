<?php
require_once __DIR__ . '/../../models/sales/SalesOrders.php';
require_once __DIR__ . '/../../models/sales/SalesDetails.php';
require_once __DIR__ . '/../../models/maintenance/Products.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$salesOrderModel = new SalesOrders();
$salesDetailsModel = new SalesDetails();
$productModels = new Products();

try {

    // Guardar la orden principal
    $orderId = $salesOrderModel->save([
        'code' => $input['code'],
        'customer_id' => $input['customer_id'],
        'employee_id' => $input['employee_id'],
        'customer_dni' => $input['customer_dni'],
        'customer_address' => $input['customer_address'],
        'pay_method' => $input['pay_method'],
        'currency' => $input['currency'],
        'branch_office' => $input['branch_office'],
        'date' => $input['date'],
        'notes' => $input['notes'],
        'gross_price' => $input['totalNeto'],
        'igv' => $input['igv'],
        'final_price' => $input['final_price'],
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ]);


    // Guardar los detalles de la orden
    foreach ($input['products'] as $product) {
        $salesDetailsModel->save([
            'sales_order_id' => $orderId,
            'product_id' => $product['product_id'],
            'quantity' => $product['quantity'],
            'product_sales_price' => $product['price'],
            'total_price' => $product['total']
        ]);

        $stock = $product['stock'];
        $quantity = $product['quantity'];

        $currentStock = $stock - $quantity;
        $productModels->updateStock($product['product_id'], $currentStock);
    }

    echo json_encode(['success' => true, 'message' => 'Orden guardada con éxito']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
