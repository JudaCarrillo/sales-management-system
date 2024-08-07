<?php
require_once __DIR__ . '../../../../core/connection.php';

class Employees
{
    private $db;
    private $table = "employees";

    public function __construct()
    {
        $this->db = new Database();
    }

    // Traer todos los empleados
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

    // Crear un nuevo empleado
    public function save($employee)
    {
        $hashedPassword = password_hash($employee['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO " . $this->table . " (code, name, father_last_name, mother_last_name, dni, address, phone, user, password, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param(
            'ssssssssss',
            $employee['code'],
            $employee['name'],
            $employee['father_last_name'],
            $employee['mother_last_name'],
            $employee['dni'],
            $employee['address'],
            $employee['phone'],
            $employee['user'],
            $hashedPassword,
            $employee['status']
        );
        $stmt->execute();
    }
    // En Employees.php
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

    // Verificar si el DNI existe
    public function dniExists($dni)
    {
        $sql = "SELECT COUNT(*) AS count FROM " . $this->table . " WHERE dni = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param('s', $dni);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }

    // Actualizar un empleado
    public function update($employee)
    {
        $hashedPassword = password_hash($employee['password'], PASSWORD_DEFAULT);

        $sql = "UPDATE " . $this->table . " SET name = ?, father_last_name = ?, mother_last_name = ?, address = ?, phone = ?, user = ?, password = ?, status = ? WHERE dni = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param(
            'sssssssss',
            $employee['name'],
            $employee['father_last_name'],
            $employee['mother_last_name'],
            $employee['address'],
            $employee['phone'],
            $employee['user'],
            $hashedPassword,
            $employee['status'],
            $employee['dni']
        );
        $stmt->execute();
    }

    // Cambiar el estado
    public function disable($dni)
    {
        $sql = "UPDATE " . $this->table . " SET status = '0' WHERE dni = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param('s', $dni);
        $stmt->execute();
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
}
