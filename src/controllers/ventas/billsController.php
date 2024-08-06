<?php
// controllers/billsController.php
require_once '../../models/sales/Bills.php';

class BillsController {

    // index
    public function index() {
        $bill = new Bills();
        $bills = $bill->getAll();
        require_once '../../api.php';
        header('Location: http://sales-management-system.test:85/api/index.php');
    }

    // Save a new bill
    public function save() {
        $bill = new Bills();
        $data = [
            'sales_order_id' => $_POST['sales_order_id'],
            'sales_order_details' => $_POST['sales_order_details'],
            'customer_dni' => $_POST['customer_dni'],
            'customer_name' => $_POST['customer_name'],
            'address' => $_POST['address'],
            'date_issue' => $_POST['date_issue'],
            'igv' => $_POST['igv'],
            'currency' => $_POST['currency'],
            'created_at' => $_POST['created_at'],
            'updated_at' => $_POST['updated_at']
        ];
        $bill->save($data);
        header('Location: api.php');
    }
}