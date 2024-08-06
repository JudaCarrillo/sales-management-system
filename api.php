<?php
// api.php
// Se crea este archivo como punto de ruta para las pruebas de la API
require_once 'core/connection.php';
require_once 'src/controllers/ventas/salesOrdersController.php';

$salesOrder = new SalesOrdersController();

// The index function is
/*
public function index() {
        $salesOrder = new SalesOrders();
        $salesOrders = $salesOrder->getAll();
        header('Location: http://sales-management-system.test:85/api/index.php');
    }
*/

$salesOrder->index();