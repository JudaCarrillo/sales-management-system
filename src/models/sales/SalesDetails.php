<?php
// SalesDetails model
class SalesDetails {
    private $db;
    private $table = "sales_details";

    public function __construct() {
        $this->db = Database::connect();
    }

    // List all sales details
    public function getAll() {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->query($sql);
        $salesDetails = [];
        while ($row = $result->fetch_assoc()) {
            $salesDetails[] = $row;
        }
        return $salesDetails;
    }

    // Save a new sales detail
    public function save($data) {
        $sql = "INSERT INTO " . $this->table . " (sales_order_id, product_id, quantity, price, total) VALUES ('" . $data['sales_order_id'] . "', '" . $data['product_id'] . "', '" . $data['quantity'] . "', '" . $data['price'] . "', '" . $data['total'] . "')";
        $this->db->query($sql);
        return $this->db->insert_id;
    }

    // Update a sales detail
    /*
    sales_detail_id INT AUTO_INCREMENT,
    sales_order_id INT,
    product_id INT,
    quantity INT,
    product_sales_price DECIMAL(10, 2),
    total_price DECIMAL(10, 2),
    */
    public function update($data) {
        $sql = "UPDATE " . $this->table . " SET 
        sales_detail_id = '" . $data['sales_order_id'] . "',
        sales_order_id = '" . $data['sales_order_id'] . "',
        product_id = '" . $data['product_id'] . "',
        quantity = '" . $data['quantity'] . "',
        product_sales_price = '" . $data['product_sales_price'] . "',
        total_price = '" . $data['total_price'] . "'
        WHERE id = " . $data['id'];
        $this->db->query($sql);
        return $this->db->affected_rows;
    }

    // Delete a sales detail
    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id = " . $id;
        $this->db->query($sql);
        return $this->db->affected_rows;
    }

    // Get sales details by sales order id
    public function getBySalesOrderId($salesOrderId) {
        $sql = "SELECT * FROM " . $this->table . " WHERE 
        sales_order_id = " . $salesOrderId;
        $result = $this->db->query($sql);
        $salesDetails = [];
        while ($row = $result->fetch_assoc()) {
            $salesDetails[] = $row;
        }
        return $salesDetails;
    }
}