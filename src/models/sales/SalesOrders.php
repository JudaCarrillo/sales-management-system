<?php
// SalesOrders model
require_once '../../core/connection.php';
class SalesOrders
{
    private $db;
    private $table = "sales_orders";

    public function __construct()
    {
        $this->db = new Database();
    }

    // List all sales orders
    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->connect()->query($sql);
        $salesOrders = [];
        while ($row = $result->fetch_assoc()) {
            $salesOrders[] = $row;
        }
        return $salesOrders;
    }

    // Save a new sales order
    public function save($data)
    {
        $sql = "INSERT INTO " . $this->table . " (
            code, customer_id, employee_id, customer_dni, customer_address, pay_method, currency, branch_office, date, notes, gross_price, discount, net_price, igv, final_price, created_at, updated_at) VALUES (
            '" . $data['code'] . "', '" . $data['customer_id'] . "', '" . $data['employee_id'] . "', '" . $data['customer_dni'] . "', '" . $data['customer_address'] . "', '" . $data['pay_method'] . "', '" . $data['currency'] . "', '" . $data['branch_office'] . "', '" . $data['date'] . "', '" . $data['notes'] . "', '" . $data['gross_price'] . "', '" . $data['discount'] . "', '" . $data['net_price'] . "', '" . $data['igv'] . "', '" . $data['final_price'] . "', '" . $data['created_at'] . "', '" . $data['updated_at'] . "'
        )";
        $this->db->connect()->query($sql);
        return $this->db->connect()->insert_id;
    }

    // Update a sales order
    public function update($data)
    {
        $sql = "UPDATE " . $this->table . " SET 
        code = '" . $data['code'] . "',
        customer_id = '" . $data['customer_id'] . "',
        employee_id = '" . $data['employee_id'] . "',
        customer_dni = '" . $data['customer_dni'] . "',
        customer_address = '" . $data['customer_address'] . "',
        pay_method = '" . $data['pay_method'] . "',
        currency = '" . $data['currency'] . "',
        branch_office = '" . $data['branch_office'] . "',
        date = '" . $data['date'] . "',
        notes = '" . $data['notes'] . "',
        gross_price = '" . $data['gross_price'] . "',
        discount = '" . $data['discount'] . "',
        net_price = '" . $data['net_price'] . "',
        igv = '" . $data['igv'] . "',
        final_price = '" . $data['final_price'] . "',
        created_at = '" . $data['created_at'] . "',
        updated_at = '" . $data['updated_at'] . "'
        WHERE id = " . $data['id'];
        $this->db->connect()->query($sql);
        return $this->db->connect()->affected_rows;
    }

    // Eliminar una orden de venta
    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = " . $id;
        $this->db->connect()->query($sql);
        return $this->db->connect()->affected_rows;
    }

    // Get a sales order by id
    public function getById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $id;
        $result = $this->db->connect()->query($sql);
        return $result->fetch_assoc();
    }
}
