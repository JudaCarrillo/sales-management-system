<?php
require_once __DIR__ . '../../../../core/connection.php';

class Customers
{
    private $db;
    private $table = "customers";

    public function __construct()
    {
        $this->db = new Database();
    }

    // Traer todos los clientes
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

    // Crear un nuevo cliente
    public function save($customer)
    {
        $sql = "INSERT INTO " . $this->table . " (code, name, father_last_name, mother_last_name, business_name, client_type, ruc, dni, phone, address, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param(
            'isssssisssi',
            $customer['code'],
            $customer['name'],
            $customer['father_last_name'],
            $customer['mother_last_name'],
            $customer['business_name'],
            $customer['client_type'],
            $customer['ruc'],
            $customer['dni'],
            $customer['phone'],
            $customer['address'],
            $customer['status']
        );
        $stmt->execute();
    }

    // Verificar si el DNI o RUC existe
    public function dniOrRucExists($dni, $ruc)
    {
        $sql = "SELECT COUNT(*) AS count FROM " . $this->table . " WHERE dni = ? OR ruc = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param('ss', $dni, $ruc);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }

    // Cambiar el estado
    public function disable($dni)
    {
        $sql = "UPDATE " . $this->table . " SET status = '0' WHERE dni = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param('s', $dni);
        $stmt->execute();
    }
    // En Customers.php
    public function codeExists($code)
    {
        $sql = "SELECT COUNT(*) AS count FROM " . $this->table . " WHERE code = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param('i', $code);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }


    // Buscar por DNI
    public function getByDni($dni)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE dni = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param('s', $dni);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Buscar por RUC
    public function getByRuc($ruc)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE ruc = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param('s', $ruc);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Actualizar un cliente
    public function update($customer)
    {
        $sql = "UPDATE " . $this->table . " 
                SET name = ?, father_last_name = ?, mother_last_name = ?, business_name = ?, client_type = ?, ruc = ?, dni = ?, phone = ?, address = ?, status = ? 
                WHERE code = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param(
            'ssssssisssi',
            $customer['name'],
            $customer['father_last_name'],
            $customer['mother_last_name'],
            $customer['business_name'],
            $customer['client_type'],
            $customer['ruc'],
            $customer['dni'],
            $customer['phone'],
            $customer['address'],
            $customer['status'],
            $customer['code']
        );
        $stmt->execute();
    }
}
