<?php
require_once __DIR__ . '/../../models/sales/Bills.php';

header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);


$BillsDataHandler = new Bills();

try {

    // Guardar la orden principal
    $orderId = $BillsDataHandler->save([
        'sales_order_id' => $input['sales_order_id'],
        'customer_dni' => $input['customer_dni'],
        'customer_name' => $input['customer_name'],
        'address' => $input['address'],
        'date_issue' => $input['date_issue'],
        'igv' => $input['igv'],
        'final_price' => $input['final_price'],
        'currency' => $input['currency'],
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ]);

    echo json_encode(['success' => true, 'message' => 'Orden guardada con éxito']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}


