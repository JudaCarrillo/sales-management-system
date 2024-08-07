<!DOCTYPE html>
<html>
<head>
    <title>Lista de Órdenes de Ventas</title>
</head>
<body>
    <h1>Órdenes de Ventas</h1>
    <a href="sales_orders/create.php">Crear Nueva Orden</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Cliente</th>
                <th>Empleado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            require_once '../controllers/ventas/salesOrdersController.php';
            $controller = new SalesOrdersController();
            $columns = ['id', 'code', 'customer_id', 'employee_id'];
            $orders = $controller->index() ?? [];
            foreach ($orders as $order) {
                echo "<tr>";
                echo "<td>" . $order['sales_order_id'] . "</td>";
                echo "<td>" . $order['code'] . "</td>";
                echo "<td>" . $order['customer_id'] . "</td>";
                echo "<td>" . $order['employee_id'] . "</td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</body>
</html>