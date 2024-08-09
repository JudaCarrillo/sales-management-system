<?php
// src/controllers/ventas/getSalesDetails.php
require_once __DIR__ . '/../../models/sales/SalesDetails.php';

header('Content-Type: application/json');

if (isset($_GET['sales_order_id'])) {
    $salesOrderId = $_GET['sales_order_id'];
    $salesDetails = new SalesDetails();
    $details = $salesDetails->getBySalesOrderId($salesOrderId);

    // Aquí podrías necesitar obtener los nombres de los productos
    // si no están incluidos en la tabla sales_details
    
    echo json_encode([
        'success' => true,
        'details' => $details
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'No se proporcionó un ID de orden de venta'
    ]);
}
