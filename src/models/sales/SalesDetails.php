<?php
// SalesDetails model
require_once __DIR__ . '/../../../core/connection.php';
class SalesDetails
{
    private $db;
    private $table = "sales_details";

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    // List all sales details
    public function getAll($columns = '*', $where = '')
    {
        $selectScript = $this->buildSelect($columns);
        $whereScript = $this->buildWhere($where);
        $sql = $selectScript . " FROM " . $this->table . $whereScript;
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    private function buildSelect($columns)
    {
        if (is_array($columns) && !empty($columns)) {
            return "SELECT " . implode(", ", $columns);
        }
        return "SELECT *";
    }

    private function buildWhere($where)
    {
        if (!empty($where)) {
            return " WHERE " . $where;
        }
        return "";
    }

    // Save a new sales detail
    public function save($data)
    {
        $sql = "INSERT INTO " . $this->table .
            " (sales_order_id, product_id, quantity, product_sales_price, total_price) 
        VALUES (
        '" . $data['sales_order_id'] . "', 
        '" . $data['product_id'] . "', 
        '" . $data['quantity'] . "', 
        '" . $data['product_sales_price'] . "', 
        '" . $data['total_price'] . "'
        )";
        $this->db->query($sql);
        return $this->db->insert_id;
    }

    // Check if a sales detail code exists
    public function detailExists($salesOrderId, $product_id)
    {
        $sql = "SELECT COUNT(*) AS count FROM " . $this->table . " WHERE 
        sales_order_id = '" . $salesOrderId . "' AND 
        product_id = '" . $product_id . "'";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }

    // Update a sales detail
    public function update($data)
    {
        $sql = "UPDATE " . $this->table . " SET 
        sales_order_id = '" . $data['sales_order_id'] . "',
        product_id = '" . $data['product_id'] . "',
        quantity = '" . $data['quantity'] . "',
        product_sales_price = '" . $data['product_sales_price'] . "',
        total_price = '" . $data['total_price'] . "'
        WHERE sales_detail_id = " . $data['sales_detail_id'];
        $this->db->query($sql);
        return $this->db->affected_rows;
    }

    // Delete a sales detail
    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE sales_detail_id = " . $id;
        $this->db->query($sql);
        return $this->db->affected_rows;
    }

    // Get sales details by sales order id
    public function getBySalesOrderId($salesOrderId)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE sales_order_id = " . $salesOrderId;
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    // Get a sales detail by id
    public function getById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE sales_detail_id = " . $id;
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }
}
