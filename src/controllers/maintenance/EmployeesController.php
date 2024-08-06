<?php
require_once __DIR__ . '/../../models/mantenimiento/Employees.php';

class EmployeesController {
    private $db;
    private $table = "products";

    public function __construct() {
        $this->db = new Products();
    }

    public function get() {
        $producto = new Products();
        $productos = $producto->getAll();
        require_once __DIR__ . '/../../views/maintenance/products/index.php';
    }

    public function create() {
        $producto = new Products();
        require_once __DIR__ . '/../../views/maintenance/products/create.php';
    }
}
