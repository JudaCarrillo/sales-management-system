<?php
// controllers/ClienteController.php
require_once '../../models/sales/SalesDetails.php.php';

class SalesDetailsController {

    public function index() {
        $salesOrder = new SalesDetails();
        $salesOrders = $salesOrder->getAll();
        require_once '../../api.php';
    }
    // Save a new sales order
    /* 
    sales_detail_id INT AUTO_INCREMENT,
    sales_order_id INT,
    product_id INT,
    quantity INT,
    product_sales_price DECIMAL(10, 2),
    total_price DECIMAL(10, 2),
    */
    public function save() {
        $salesOrder = new SalesDetails();
        $data = [
            'sales_detail_id' => $_POST['sales_detail_id'],
            'sales_order_id' => $_POST['sales_order_id'],
            'product_id' => $_POST['product_id'],
            'quantity' => $_POST['quantity'],
            'product_sales_price' => $_POST['product_sales_price'],
            'total_price' => $_POST['total_price']
        ];
        $salesOrder->save($data);
        header('Location: api.php');
    }

    // Otros métodos como create(), store(), edit(), update(), delete() pueden ser añadidos aquí
}
