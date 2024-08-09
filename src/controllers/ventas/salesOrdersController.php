<?php
// controllers/salesOrdersController.php
require_once __DIR__ . '/../../models/sales/SalesOrders.php';

class SalesOrdersController
{

    private $db;
    private $model;
    public function __construct()
    {
        $this->model = new SalesOrders();
        $this->db = $this->model; // Usa el modelo como la propiedad db
    }

    public function index()
    {
        $orders = $this->model->getAll();
        return $orders;
    }

    public function get($where = '', $columns = '*')
    {
        return $this->model->getAll($columns, $where);
    }

    public function getItemWithCustomerName() {
        return $this->model->getItemWithCustomerName();
    }


    public function show($id)
    {
        $order = $this->model->getOrderById($id);
        include 'views/sales_orders/show.php';
    }
    // Save a new sales order
    public function save()
    {
        $salesOrder = new SalesOrders();
        $data = [
            'code' => $_POST['code'],
            'customer_id' => $_POST['customer_id'],
            'employee_id' => $_POST['employee_id'],
            'customer_dni' => $_POST['customer_dni'],
            'customer_address' => $_POST['customer_address'],
            'pay_method' => $_POST['pay_method'],
            'currency' => $_POST['currency'],
            'branch_office' => $_POST['branch_office'],
            'date' => $_POST['date'],
            'notes' => $_POST['notes'],
            'gross_price' => $_POST['gross_price'],
            'discount' => $_POST['discount'],
            'net_price' => $_POST['net_price'],
            'igv' => $_POST['igv'],
            'final_price' => $_POST['final_price'],
            'created_at' => $_POST['created_at'],
            'updated_at' => $_POST['updated_at']
        ];
        $salesOrder->save($data);
    }
    // Save a new sales order 2
    public function save2($product)
    {
        if ($this->db->codeExists($product['code'])) {
            echo "Error: La Orden de Venta con el código " . $product['code'] . " ya existe.";
            return;
        }
        $this->db->save($product);
        header('Location:/src/views/formSalesOrder.php');
        exit();
    }

    // Update a sales order
    public function update()
    {
        $salesOrder = new SalesOrders();
        $data = [
            'code' => $_POST['code'],
            'customer_id' => $_POST['customer_id'],
            'employee_id' => $_POST['employee_id'],
            'customer_dni' => $_POST['customer_dni'],
            'customer_address' => $_POST['customer_address'],
            'pay_method' => $_POST['pay_method'],
            'currency' => $_POST['currency'],
            'branch_office' => $_POST['branch_office'],
            'date' => $_POST['date'],
            'notes' => $_POST['notes'],
            'gross_price' => $_POST['gross_price'],
            'discount' => $_POST['discount'],
            'net_price' => $_POST['net_price'],
            'igv' => $_POST['igv'],
            'final_price' => $_POST['final_price'],
            'created_at' => $_POST['created_at'],
            'updated_at' => $_POST['updated_at']
        ];
        $salesOrder->update($data);
    }

    // Update 2
    public function update2($product)
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

    // Otros métodos como create(), store(), edit(), update(), delete() pueden ser añadidos aquí
}
