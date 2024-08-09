<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/facturacion-view.css">
    <title>Document</title>
</head>

<body>
    <?php include_once '../../../assets/component/navbar.php'; ?>

    <div class="container">
        <section class="title">
            <h1>FACTURACION</h1>
        </section>
        <div class="dividor">
            <div class="espacios">
                <?php
                //Obtener la lista de Ordenes de Venta
                require_once __DIR__ . '/../../controllers/ventas/salesOrdersController.php';
                require_once __DIR__ . '/../../controllers/maintenance/CustomersController.php';

                $customerController = new CustomersController();
                $orderController = new SalesOrdersController();

                $orders = $orderController->getItemWithCustomerName();
                ?>
                <div class="parteCode">
                    <div class="group">
                        <input class="code" type="text" name="code" id="code">
                    </div>
                </div>

                <section class="form">
                    <h1>DATOS DE VENTA</h1>
                    <form action="" method="post">
                        <article class="Parte2">
                            <div class="group">
                                <label for="orden">Orden de Venta</label>
                                <select name="order" id="order">
                                    <option value="">Seleccione un cliente</option>

                                    <?php foreach ($orders as $order) : ?>
                                        <option
                                            value="<?php echo htmlspecialchars($order['sales_order_id']); ?>"

                                            data-customer-dni="<?php echo htmlspecialchars($order['customer_dni']); ?>"
                                            data-customer-address="<?php echo htmlspecialchars($order['customer_address']); ?>"
                                            data-branch-office="<?php echo htmlspecialchars($order['branch_office']); ?>"

                                            data-currency="<?php echo htmlspecialchars($order['currency']); ?>"
                                            data-pay-method="<?php echo htmlspecialchars($order['pay_method']); ?>"
                                            data-date="<?php echo htmlspecialchars($order['date']); ?>"
                                            data-code="<?php echo htmlspecialchars($order['code']); ?>"
                                            data-customername="<?php echo htmlspecialchars($order['name']); ?>"

                                            data-gross_price="<?php echo htmlspecialchars($order['gross_price']) ?>"
                                            data-igv="<?php echo htmlspecialchars($order['igv']) ?>"
                                            data-final_price="<?php echo htmlspecialchars($order['final_price']) ?>">

                                            <?php echo htmlspecialchars($order['code'] . ' - ' . $order['customer_dni']); ?>

                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="group">
                                <label for="ruc">RUC/DNI</label>
                                <input type="text" name="customer_dni" id="customer_dni">
                            </div>
                            <div class="group">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="customer_address" id="customer_address">
                            </div>
                            <div class="group">
                                <label for="cliente">Cliente</label>
                                <input type="text" name="customer_name" id="customer_name">
                            </div>
                            <div class="group">
                                <label for="fecha">Fecha de Emision</label>
                                <input type="date" name="date" id="date">
                            </div>
                            <div class="group">
                                <label for="sucursal">Sucursal</label>
                                <input type="text" name="branch_office" id="branch_office">
                            </div>
                            <div class="group">
                                <label for="moneda">Moneda</label>
                                <input type="text" name="currency" id="currency">
                            </div>
                            <div class="group">
                                <label for="moneda">Tipo de Pago</label>
                                <input type="text" name="pay_method" id="pay_method">
                            </div>
                        </article>
                    </form>
                </section>

            </div>
            <section class="listado">
                <div class="actions">
                    <button class="nuevo" onclick="saveOrder()">Nuevo</button>
                    <button class="cancelar" onclick="resetForm()">Cancelar</button>
                </div>

                <table id="productTable">
                    <tbody id="productTableBody">
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">Total Bruto</td>
                            <td id="totalBruto">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="4">IGV (18%)</td>
                            <td id="igv">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="4">Total Final</td>
                            <td id="totalFinal">0.00</td>
                        </tr>
                    </tfoot>
                </table>

            </section>
        </div>
    </div>
    <script src="../../../assets/js/ventas/facturacion.js"></script>
</body>


</html>./