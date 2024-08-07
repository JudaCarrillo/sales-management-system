<?php
require_once __DIR__ . '/../../models/maintenance/Customers.php';

class CustomersController
{
    private $db;

    public function __construct()
    {
        $this->db = new Customers();
    }

    // Obtener todos los clientes o filtrados
    public function get($where = '', $columns = '*')
    {
        return $this->db->getAll($columns, $where);
        // Incluye la vista que quieras mostrar, por ejemplo:
        include '../../views/Maintenance/customer-views.php';
    }

    // Crear un nuevo clientex
    public function save($customer)
    {
        // Verifica si ya existe el DNI o RUC
        if ($this->db->dniOrRucExists($customer['dni'], $customer['ruc'])) {
            echo "Error: El cliente con el DNI " . $customer['dni'] . " o RUC " . $customer['ruc'] . " ya existe.";
            return;
        }

        // Verifica si ya existe el código
        if (isset($customer['code']) && $this->db->codeExists($customer['code'])) {
            echo "Error: El cliente con el código " . $customer['code'] . " ya existe.";
            return;
        }

        // Asegúrate de que el campo status esté correctamente configurado
        $statusValue = !empty($customer['status']) ? '1' : '0';
        $customer['status'] = $statusValue;

        $this->db->save($customer);
        header('Location:/src/views/Maintenance/customer-views.php');
        exit();
    }


    // Actualizar un cliente existente
    // Actualizar un cliente existente
    public function update($customer)
    {
        if (empty($customer['code'])) {
            echo "Error: El campo code es obligatorio para actualizar.";
            return;
        }

        // Verifica si el cliente existe por el código
        $existingCustomer = $this->db->getByDni($customer['dni']);
        if (!$existingCustomer) {
            echo "Error: El cliente con el código " . $customer['code'] . " no existe.";
            return;
        }

        // Asegúrate de que el campo status esté correctamente configurado
        $statusValue = !empty($customer['status']) ? '1' : '0';
        $customer['status'] = $statusValue;

        $this->db->update($customer);
        header('Location: /src/views/Maintenance/customer-views.php');
        exit();
    }

    // Deshabilitar un cliente
    public function disable($dni)
    {
        if (!$this->db->dniOrRucExists($dni, null)) {
            echo "Error: El cliente con el DNI " . $dni . " no existe.";
            return;
        }
        $this->db->disable($dni);
        header('Location:/src/views/Maintenance/customer-views.php');
        exit();
    }

    // Obtener un cliente por DNI
    public function getByDni($dni)
    {
        return $this->db->getByDni($dni);
    }

    // Obtener un cliente por RUC
    public function getByRuc($ruc)
    {
        return $this->db->getByRuc($ruc);
    }
}
