<?php
require_once __DIR__ . '/../../models/mantenimiento/Customers.php';
require_once __DIR__ . '/../../../core/connection.php';


class CustomersController {
    private $db;
    private $table = "customers";

    public function __construct() {
        $this->db = new Database();
    }

    public function get() {
        $producto = new Products();
        $productos = $producto->getAll();
    }

    public function create() {
        $producto = new Products();
        require_once __DIR__ . '/../../views/maintenance/products/create.php';
    }
}
