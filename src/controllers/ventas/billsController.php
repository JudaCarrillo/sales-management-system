<?php
// controllers/billsController.php
require_once __DIR__ . '/../../models/sales/Bills.php';

class BillsController
{

    // index
    private $db;
    private $model;
    public function __construct()
    {
        $this->model = new SalesOrders();
    }
    public function index()
    {
        $orders = $this->model->getAll();
        return $orders;
    }

    public function get($where = '', $columns = '*')
    {
        return $this->db->getAll($columns, $where);
    }

    // Save a new bill
    public function save($detail)
    {
        if ($this->db->detailExists($detail['sales_order_id'])) {
            echo "Error: Ya se registró la factura de la Orden de Venta con el código " . $detail['sales_order_id'];
            return;
        }
        $this->db->save($detail);
    }
}
