<?php
// SalesOrders model
class SalesOrders {
    private $db;
    private $table = "sales_orders";

    public function __construct() {
        $this->db = Database::connect();
    }

    // List all sales orders
    public function getAll() {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->query($sql);
        $salesOrders = [];
        while ($row = $result->fetch_assoc()) {
            $salesOrders[] = $row;
        }
        return $salesOrders;
    }

    // Save a new sales order
    public function save($data) {
        $sql = "INSERT INTO " . $this->table . " (customer_id, order_date, total) VALUES ('" . $data['customer_id'] . "', '" . $data['order_date'] . "', '" . $data['total'] . "')";
        $this->db->query($sql);
        return $this->db->insert_id;
    }

    // Update a sales order
    /*
    sales_order_id INT PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(50),
    customer_id INT,
    employee_id INT,
    customer_dni VARCHAR(20),
    customer_address VARCHAR(255),
    pay_method VARCHAR(50),
    currency VARCHAR(10),
    branch_office VARCHAR(100),
    date DATETIME,
    notes TEXT,
    gross_price DECIMAL(10, 2),
    discount DECIMAL(10, 2),
    net_price DECIMAL(10, 2),
    igv DECIMAL(10, 2),
    final_price DECIMAL(10, 2),
    created_at DATETIME,
    updated_at DATETIME
    */
    public function update($data) {
        $sql = "UPDATE " . $this->table . " SET 
        sales_order_id = '" . $data['sales_order_id'] . "',
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
        $this->db->query($sql);
        return $this->db->affected_rows;
    }

    // Eliminar una orden de venta
    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id = " . $id;
        $this->db->query($sql);
        return $this->db->affected_rows;
    }
}
