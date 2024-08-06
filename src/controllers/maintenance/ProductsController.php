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
    }
    public function save($product)
    {
        if ($this->db->codeExists($product['code'])) {
            echo "Error: El producto con el código " . $product['code'] . " ya existe.";
            return;
        }
        $this->db->save($product);
    }
    //actualizar
    public function update($product)
    {
        if (!$this->db->codeExists($product['code'])) {
            echo "Error: El producto con el código " . $product['code'] . " no existe.";
            return;
        }
        $this->db->update($product);
    }
    //deshabilitar
    public function disable($code)
    {
        if (!$this->db->codeExists($code)) {
            echo "Error: El producto con el código " . $code . " no existe.";
            return;
        }
        $this->db->disable($code);
        echo "El estado del producto con el código " . $code . " ha sido cambiado a 2.";
    }
}
