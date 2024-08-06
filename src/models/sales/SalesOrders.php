<?php
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
    public function update($data) {
        $sql = "UPDATE " . $this->table . " SET customer_id = '" . $data['customer_id'] . "', order_date = '" . $data['order_date'] . "', total = '" . $data['total'] . "' WHERE id = " . $data['id'];
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
