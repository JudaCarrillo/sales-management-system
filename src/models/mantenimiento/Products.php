<?php 
require_once __DIR__ . '../../../../core/connection.php';

class Products {
    private $db;
    private $table = "products";

    public function __construct() {
        $this->db = new Database();
    }
    //traer todos los productos
    public function getAll() {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->connect()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    //crear un nuevo producto
    public function save($product) {
        $sql = "INSERT INTO " . $this->table . " (name, description, price, stock) VALUES ('" . $product['name'] . "', '" . $product['description'] . "', '" . $product['price'] . "', '" . $product['stock'] . "')";
        $this->db->connect()->query($sql);
        return $this->db->connect()->insert_id;
    }
    //traer un producto por id
    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $id;
        $result = $this->db->connect()->query($sql);
        return $result->fetch_assoc();
    }
    //actualizar un producto
    public function update($product) {
        $sql = "UPDATE " . $this->table . " SET name = '" . $product['name'] . "', description = '" . $product['description'] . "', price = '" . $product['price'] . "', stock = '" . $product['stock'] . "' WHERE id = " . $product['id'];
        $this->db->connect()->query($sql);
    }
    //eliminar un producto
    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id = " . $id;
        $this->db->connect()->query($sql);
    }
    
    
}