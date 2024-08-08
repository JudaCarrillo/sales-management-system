<?php
// SalesDetails model
require_once '../../../core/connection.php';
class SalesDetails
{
    private $db;
    private $table = "sales_details";

    public function __construct()
    {
        $this->db = new Database();
    }

    // List all sales details
    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->connect()->query($sql);
        $salesDetails = [];
        while ($row = $result->fetch_assoc()) {
            $salesDetails[] = $row;
        }
        return $salesDetails;
    }

    // Save a new sales detail
    public function save($data)
    {
        $sql = "INSERT INTO " . $this->table .
            " (sales_order_id, product_id, quantity, product_sales_price, total_price) 
        VALUES ('" . $data['sales_order_id'] . "', '" . $data['product_id'] . "', '" . $data['quantity'] . "', '" . $data['product_sales_price'] . "', '" . $data['total_price'] . "')";
        $this->db->connect()->query($sql);
        return $this->db->connect()->insert_id;
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
        $this->db->connect()->query($sql);
        return $this->db->connect()->affected_rows;
    }

    // Delete a sales detail
    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = " . $id;
        $result = $this->db->connect()->query($sql);
        return $this->db->connect()->insert_id;
    }

    // Get sales details by sales order id
    public function getBySalesOrderId($salesOrderId)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE 
        sales_order_id = " . $salesOrderId;
        $result = $this->db->connect()->query($sql);
        $salesDetails = [];
        while ($row = $result->fetch_assoc()) {
            $salesDetails[] = $row;
        }
        return $salesDetails;
    }

    // Get a sales detail by id
    public function getById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $id;
        $result = $this->db->connect()->query($sql);
        return $result->fetch_assoc();
    }
}
