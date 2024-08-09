<?php
// SalesOrders model
require_once __DIR__ . '/../../../core/connection.php';
class SalesOrders
{
    public $db;
    private $table = "sales_orders";

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    // List all sales orders
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
    // List a new sales order 2
    public function getAllOrders()
    {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->query($sql);
        $salesOrders = [];
        while ($row = $result->fetch_assoc()) {
            $salesOrders[] = $row;
        }
        return $salesOrders;
    }

    // Save a new sales order
    public function save($data)
    {
        $sql = "INSERT INTO " . $this->table . " 
        (code, customer_id, employee_id, customer_dni, customer_address, pay_method, currency, branch_office, date, notes, gross_price, igv, final_price, created_at, updated_at) 
        VALUES (
        '" . $data['code'] . "',
        '" . $data['customer_id'] . "',
        '" . $data['employee_id'] . "',
        '" . $data['customer_dni'] . "',
        '" . $data['customer_address'] . "',
        '" . $data['pay_method'] . "',
        '" . $data['currency'] . "',
        '" . $data['branch_office'] . "',
        '" . $data['date'] . "',
        '" . $data['notes'] . "',
        '" . $data['gross_price'] . "',
        '" . $data['igv'] . "',
        '" . $data['final_price'] . "',
        '" . $data['created_at'] . "',
        '" . $data['updated_at'] . "'
        )";
        $this->db->query($sql);
        return $this->db->insert_id;
    }

    // Check if a code exists
    public function codeExists($code)
    {
        $sql = "SELECT COUNT(*) AS count FROM " . $this->table . " WHERE code = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $code);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }

    // Update a sales order
    public function update($data)
    {
        $sql = "UPDATE " . $this->table . " SET 
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
        igv = '" . $data['igv'] . "', 
        final_price = '" . $data['final_price'] . "', 
        created_at = '" . $data['created_at'] . "', 
        updated_at = '" . $data['updated_at'] . "' 
        WHERE code = " . $data['code'];
        $this->db->query($sql);
        return $this->db->affected_rows;
    }

    // Delete a sales order
    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = " . $id;
        $this->db->query($sql);
        return $this->db->affected_rows;
    }

    // Get a sales order by id
    public function getOrderById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $id;
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    // Get a sales order by code
    public function getOrderByCode($code)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE code = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $code);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }


    public function getItemWithCustomerName()
    {

        $sql = "SELECT so.sales_order_id, so.gross_price, so.igv, so.final_price , so.customer_dni, so.customer_address, so.branch_office, so.currency, so.pay_method, so.date, so.code, c.name FROM  " . $this->table . " so " .
            " INNER JOIN customers c ON so.customer_id = c.customer_id" ;

        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
