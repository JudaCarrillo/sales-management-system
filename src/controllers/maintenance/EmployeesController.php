<?php
require_once __DIR__ . '/../../models/maintenance/Employees.php';

class EmployeesController
{
    private $db;

    public function __construct()
    {
        $this->db = new Employees();
    }

    // Obtener todos los empleados o filtrados
    public function get($where = '', $columns = '*')
    {
        return $this->db->getAll($columns, $where);
        // Incluye la vista que quieras mostrar, por ejemplo:
        include '../../views/Maintenance/employees_view.php';
    }

    // Crear un nuevo empleado
    public function save($employee)
    {
        if ($this->db->dniExists($employee['dni'])) {
            echo "Error: El empleado con el DNI " . $employee['dni'] . " ya existe.";
            return;
        }
        // Verifica si ya existe el código
        if (isset($employee['code']) && $this->db->codeExists($employee['code'])) {
            echo "Error: El empleado con el código " . $employee['code'] . " ya existe.";
            return;
        }
        // Asegúrate de que el campo status esté correctamente configurado
        $statusValue = !empty($employee['status']) ? '1' : '0';
        $employee['status'] = $statusValue;

        $this->db->save($employee);
        header('Location:/src/views/Maintenance/employees_view.php');
        exit();
    }

    // Actualizar un empleado existente
    public function update($employee)
    {
        if (!$this->db->dniExists($employee['dni'])) {
            echo "Error: El empleado con el DNI " . $employee['dni'] . " no existe.";
            return;
        }

        // Asegúrate de que el campo status esté correctamente configurado
        $statusValue = !empty($employee['status']) ? '1' : '0';
        $employee['status'] = $statusValue;

        $this->db->update($employee);
        header('Location:/src/views/Maintenance/employees_view.php');
        exit();
    }

    // Deshabilitar un empleado
    public function disable($dni)
    {
        if (!$this->db->dniExists($dni)) {
            echo "Error: El empleado con el DNI " . $dni . " no existe.";
            return;
        }
        $this->db->disable($dni);
        header('Location:/src/views/Maintenance/employees_view.php');
        exit();
    }

    // Obtener un empleado por DNI
    public function getByDni($dni)
    {
        return $this->db->getByDni($dni);
    }
}
