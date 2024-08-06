<?php
// controllers/salesOrdersController.php
require_once '../../models/sales/SalesOrders.php';

class SalesOrdersController {

    public function index() {
        $salesOrder = new SalesOrders();
        $salesOrders = $salesOrder->getAll();
        require_once '../../api.php';
        header('Location: http://sales-management-system.test:85/api/index.php');
    }
    // Save a new sales order
    /* 
    `code` string,
    `customer_id` integer,
    `employee_id` string,
    `customer_dni` string,
    `customer_address` string,
    `pay_method` string,
    `currency` string,
    `branch_office` string,
    `date` datetime,
    `notes` string,
    `gross_price` string,
    `discount` string,
    `net_price` string,
    `igv` string,
    `final_price` string,
    `created_at` datetime,
    `updated_at` datetime
    */
    public function save() {
        $salesOrder = new SalesOrders();
        $data = [
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
        $salesOrder->save($data);
        header('Location: api.php');
    }

    // Otros métodos como create(), store(), edit(), update(), delete() pueden ser añadidos aquí
}
