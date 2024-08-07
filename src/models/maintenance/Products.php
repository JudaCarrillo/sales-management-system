<?php

require_once __DIR__ . '../../../../core/connection.php';

class Products
{
    private $db;
    private $table = "products";

    public function __construct()
    {
        $this->db = new Database();
    }
    // Traer todos los productos
    public function getAll($columns = '*', $where = '')
    {
        $selectScript = $this->buildSelect($columns);
        $whereScript = $this->buildWhere($where);
        $sql = $selectScript . " FROM " . $this->table . $whereScript;
        $result = $this->db->connect()->query($sql);
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

    //crear un nuevo producto   
    public function save($product)
{
    $sql = "INSERT INTO " . $this->table . " (code, name, source, brand, unit, category, price, stock, status) 
            VALUES ('" . $product['code'] . "', 
                    '" . $product['name'] . "', 
                    '" . $product['source'] . "', 
                    '" . $product['brand'] . "', 
                    '" . $product['unit'] . "', 
                    '" . $product['category'] . "', 
                    '" . $product['price'] . "', 
                    '" . $product['stock'] . "', 
                    '" . $product['status'] . "')";
    $this->db->connect()->query($sql);
}


    public function codeExists($code)
    {
        $sql = "SELECT COUNT(*) AS count FROM " . $this->table . " WHERE code = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param('s', $code);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }
    //actualizar un producto
    public function update($product)
    {
        $sql = "UPDATE " . $this->table . " SET name = '" . $product['name'] . "', source = '" . $product['source'] . "', brand = '" . $product['brand'] . "', unit = '" . $product['unit'] . "', category = '" . $product['category'] . "', price = '" . $product['price'] . "', stock = '" . $product['stock']. "', status =  '". $product['status'] . "' WHERE code = '" . $product['code'] . "'";
        $this->db->connect()->query($sql);
    }
    // Cambiar de estado
    public function disable($code)
    {
        $sql = "UPDATE " . $this->table . " SET status = 0 WHERE code = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param('s', $code);
        $stmt->execute();
    }
    //buscar por code
    public function getByCode($code)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE code = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param('s', $code);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
