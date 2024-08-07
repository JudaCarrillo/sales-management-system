<?php
require_once __DIR__ . '/../../models/maintenance/Products.php';

class ProductsController
{
    private $db;

    public function __construct()
    {
        $this->db = new Products();
    }

    public function get($where = '', $columns = '*')
    {
        return $this->db->getAll($columns, $where);
        include '../../views/Maintenance/Producto_view.php';
    }
    public function save($product)
    {
        if ($this->db->codeExists($product['code'])) {
            echo "Error: El producto con el código " . $product['code'] . " ya existe.";
            return;
        }
        $statusValue =  !empty($product['status']) ? 1 : $product['status'];
        $product['status'] = $statusValue;
        $this->db->save($product);
        header('Location:/src/views/Maintenance/Producto_view.php');
        exit();
    }
    //actualizar
    public function update($product)
    {
        if (!$this->db->codeExists($product['code'])) {
            echo "Error: El producto con el código " . $product['code'] . " no existe.";
            return; 
        }

        $statusValue =  !empty($product['status']) ? 1 : $product['status'];
        $product['status'] = $statusValue;

        $this->db->update($product);
        header('Location:/src/views/Maintenance/Producto_view.php');
        exit();
        
    }
    //deshabilitar
    public function disable($code)
    {
        if (!$this->db->codeExists($code)) {
            echo "Error: El producto con el código " . $code . " no existe.";
            return;
        }
        $this->db->disable($code);
        header('Location:/src/views/Maintenance/Producto_view.php');
        exit();
    }
    //buscar registro por code
    public function getByCode($code)
    {
        return $this->db->getByCode($code);
    }
}

