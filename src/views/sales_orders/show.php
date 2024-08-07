<!DOCTYPE html>
<html>
<head>
    <title>Detalle de Orden de Venta</title>
</head>
<body>
    <h1>Detalle de Orden de Venta</h1>
    <p>ID: <?php echo $order['id']; ?></p>
    <p>Código: <?php echo $order['code']; ?></p>
    <p>Cliente: <?php echo $order['customer_id']; ?></p>
    <p>Empleado: <?php echo $order['employee_id']; ?></p>
    <p>Dirección del Cliente: <?php echo $order['customer_address']; ?></p>
    <p>Método de Pago: <?php echo $order['pay_method']; ?></p>
    <p>Moneda: <?php echo $order['currency']; ?></p>
    <p>Sucursal: <?php echo $order['branch_office']; ?></p>
    <p>Fecha: <?php echo $order['date']; ?></p>
    <p>Notas: <?php echo $order['notes']; ?></p>
    <p
