<?php
// controllers/salesDetailsController.php
require_once __DIR__ . '/../../models/sales/SalesOrders.php';
require_once __DIR__ . '/../../models/sales/SalesDetails.php';
require_once __DIR__ . '/../../models/maintenance/Products.php';

class SalesDetailsController {

    private $db;
    private $model;
    public function __construct() {
        $this->model = new SalesOrders();
    }
    public function index() {
        $orders = $this->model->getAll();
        return $orders;
    }

    public function get($where = '', $columns = '*')
    {
        return $this->db->getAll($columns, $where);
    }
    // Save a new sales detail
    public function save($detail)
    {
        if ($this->db->detailExists($detail['salesOrderId'], $detail['productId'])) {
            echo "Error: Ya registró el producto al Detalle de Venta con el código " . $detail['salesOrderId'];
            return;

        }
        $this->db->save($detail);
    }
    // Otros métodos como create(), store(), edit(), update(), delete() pueden ser añadidos aquí
}