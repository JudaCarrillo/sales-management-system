<?php
// src/controllers/ventas/getSalesOrderDetails.php
require_once __DIR__ . '/../../models/sales/SalesOrders.php';
require_once __DIR__ . '/../../models/sales/SalesDetails.php';

header('Content-Type: application/json');

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $salesOrders = new SalesOrders();
    $salesDetails = new SalesDetails();

    $order = $salesOrders->getOrderByCode($code);
    if ($order) {
        $details = $salesDetails->getBySalesOrderId($order['id']);
        echo json_encode([
            'success' => true,
            'order' => $order,
            'details' => $details
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No se encontró la Orden de Venta'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'No se proporcionó un código de Orden de Venta'
    ]);
}
