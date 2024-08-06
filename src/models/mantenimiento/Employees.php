<?php 
class Employees {
    private $db;
    private $table = "employees";

    public function __construct() {
        $this->db = new Database();
    }
    //traer todos los empleados
    public function getAll() {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->connect()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    //crear un nuevo empleado
    public function save($employee) {
        $sql = "INSERT INTO " . $this->table . " (name, lastname, email, phone) VALUES ('" . $employee['name'] . "', '" . $employee['lastname'] . "', '" . $employee['email'] . "', '" . $employee['phone'] . "')";
        $this->db->connect()->query($sql);
        return $this->db->connect()->insert_id;
    }
    //traer un empleado por id
    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $id;
        $result = $this->db->connect()->query($sql);
        return $result->fetch_assoc();
    }
    //actualizar un empleado
    public function update($employee) {
        $sql = "UPDATE " . $this->table . " SET name = '" . $employee['name'] . "', lastname = '" . $employee['lastname'] . "', email = '" . $employee['email'] . "', phone = '" . $employee['phone'] . "' WHERE id = " . $employee['id'];
        $this->db->connect()->query($sql);
    }
    //eliminar un empleado
    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id = " . $id;
        $this->db->connect()->query($sql);
    }
    
}