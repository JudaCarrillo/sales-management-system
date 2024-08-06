<?php
require_once '../../core/connection.php';
// Bills model
class Bills
{
    private $db;
    private $table = "sales_orders";

    public function __construct()
    {
        $this->db = new Database();
    }

    // List all bills
    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->connect()->query($sql);
        $bills = [];
        while ($row = $result->fetch_assoc()) {
            $bills[] = $row;
        }
        return $bills;
    }

    // Save a new bill
    /*
    `id` integer PRIMARY KEY,
    `sales_order_id` string UNIQUE,
    `sales_order_details` json,
    `customer_dni` string,
    `customer_name` string,
    `address` string,
    `date_issue` datetime,
    `igv` bool,
    `currency` string,
    `created_at` datetime,
    `updated_at` datetime
    */
    public function save($data)
    {
        $sql = "INSERT INTO " . $this->table .
            " (sales_order_id, sales_order_details, customer_dni, customer_name, address, date_issue, igv, currency, created_at, updated_at) 
        VALUES ('" . $data['sales_order_id'] . "', '" . $data['sales_order_details'] . "', '" . $data['customer_dni'] . "', '" . $data['customer_name'] . "', '" . $data['address'] . "', '" . $data['date_issue'] . "', '" . $data['igv'] . "', '" . $data['currency'] . "', '" . $data['created_at'] . "', '" . $data['updated_at'] . "')";
        $this->db->connect()->query($sql);
        return $this->db->connect()->insert_id;
    }

    // Update a bill
    public function update($data)
    {
        $sql = "UPDATE " . $this->table . " SET 
        sales_order_id = '" . $data['sales_order_id'] . "',
        sales_order_details = '" . $data['sales_order_details'] . "',
        customer_dni = '" . $data['customer_dni'] . "',
        customer_name = '" . $data['customer_name'] . "',
        address = '" . $data['address'] . "',
        date_issue = '" . $data['date_issue'] . "',
        igv = '" . $data['igv'] . "',
        currency = '" . $data['currency'] . "',
        created_at = '" . $data['created_at'] . "',
        updated_at = '" . $data['updated_at'] . "'
        WHERE id = " . $data['id'];
        $this->db->connect()->query($sql);
        return $this->db->connect()->affected_rows;
    }

    // Delete a bill
    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = " . $id;
        $result = $this->db->connect()->query($sql);
        return $this->db->connect()->insert_id;
    }

    // Get a bill by id
    public function getById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $id;
        $result = $this->db->connect()->query($sql);
        return $result->fetch_assoc();
    }
}
