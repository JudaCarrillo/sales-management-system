<?php
// controllers/salesDetailsController.php
require_once __DIR__ . '/../../models/sales/SalesDetails.php';

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
    /* 
    sales_detail_id INT AUTO_INCREMENT,
    sales_order_id INT,
    product_id INT,
    quantity INT,
    product_sales_price DECIMAL(10, 2),
    total_price DECIMAL(10, 2),
    */
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
