<?php 
require_once __DIR__ . '../../../../core/connection.php';
class Customers {
    private $db;
    private $table = "customers";

    public function __construct() {
        $this->db = new Database();
    }
    //traer todos los clientes
    public function getAll() {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->connect()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    //crear un nuevo cliente
    public function save($customer) {
        $sql = "INSERT INTO " . $this->table . " (name, lastname, email, phone) VALUES ('" . $customer['name'] . "', '" . $customer['lastname'] . "', '" . $customer['email'] . "', '" . $customer['phone'] . "')";
        $this->db->connect()->query($sql);
        return $this->db->connect()->insert_id;
    }
    //traer un cliente por id
    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $id;
        $result = $this->db->connect()->query($sql);
        return $result->fetch_assoc();
    }
    //actualizar un cliente
    public function update($customer) {
        $sql = "UPDATE " . $this->table . " SET name = '" . $customer['name'] . "', lastname = '" . $customer['lastname'] . "', email = '" . $customer['email'] . "', phone = '" . $customer['phone'] . "' WHERE id = " . $customer['id'];
        $this->db->connect()->query($sql);
    }
    //eliminar un cliente
    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id = " . $id;
        $this->db->connect()->query($sql);
    }


}