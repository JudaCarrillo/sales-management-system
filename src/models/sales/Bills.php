<?php
// Bills model
require_once __DIR__ . '/../../../core/connection.php';
class Bills
{
    private $db;
    private $table = "bills";

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    // List all bills
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

    // Save a new bill
    public function save($data)
    {
        $sql = "INSERT INTO " . $this->table .
            " (sales_order_id, sales_order_details, customer_dni, customer_name, address, date_issue, igv, currency, created_at, updated_at)
        VALUES (
        '" . $data['sales_order_id'] . "',
        '" . $data['sales_order_details'] . "',
        '" . $data['customer_dni'] . "',
        '" . $data['customer_name'] . "',
        '" . $data['address'] . "',
        '" . $data['date_issue'] . "',
        '" . $data['igv'] . "',
        '" . $data['currency'] . "',
        '" . $data['created_at'] . "',
        '" . $data['updated_at'] . "'
        )";
        $this->db->query($sql);
        return $this->db->insert_id;
    }

    public function detailExists($sales_order_id)
    {
        $sql = "SELECT COUNT(*) AS count FROM " . $this->table . " WHERE 
        sales_order_id = '" . $sales_order_id . "'";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
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
        updated_at = '" . $data['updated_at'] . "'
        WHERE id = " . $data['id'];
        $this->db->query($sql);
        return $this->db->affected_rows;
    }

    // Delete a bill
    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE bills_id = " . $id;
        $this->db->query($sql);
        return $this->db->affected_rows;
    }

    // Get a bill by id
    public function getById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE bills_id = " . $id;
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }
}
