<?php
//Obtener la lista de Clientes
require_once '../../controllers/maintenance/CustomersController.php';
$customersController = new CustomersController();
$where = "";
$columns = ['code', 'business_name', 'address', 'dni'];
$customers = $customersController->get($where, $columns);

//Obtener la lista de Vendedores
require_once '../../controllers/maintenance/EmployeesController.php';
$employeesController = new EmployeesController();
$where = "";
$columns = ['code', 'name', 'father_last_name', 'mother_last_name'];
$employees = $employeesController->get($where, $columns);

//Obtener la lista de Productos
require_once '../../controllers/maintenance/ProductsController.php';
$productsController = new ProductsController();
$where = "";
$columns = ['product_id', 'code', 'name', 'price', 'stock'];
$products = $productsController->get($where, $columns);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/salesOrder-view.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <section class="title">
            <h1>ORDEN DE VENTAS</h1>
        </section>
        <div class="dividor">
            <div class="espacios">
                <div class="parteCode">
                    <div class="group">
                        <input class="code" type="text" name="code" id="code" onblur="fetchOrderDetails()">
                    </div>
                </div>
                <section class="form">
                    <h1>DATOS DE CLIENTE</h1>
                    <form action="#" method="post">
                        <article class="Parte2">
                            <div class="group">
                                <label for="cliente">Cliente</label>
                                <select name="customer" id="customer">
                                    <option value="">Seleccione un cliente</option>
                                    <?php foreach ($customers as $customer) : ?>
                                        <option value="<?php echo htmlspecialchars($customer['code']); ?>" data-address="<?php echo htmlspecialchars($customer['address']); ?>" data-dni="<?php echo htmlspecialchars($customer['dni']); ?>">
                                            <?php echo htmlspecialchars($customer['code'] . ' - ' . $customer['business_name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="group">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="address" id="address">
                            </div>
                            <div class="group">
                                <label for="dni">RUC/DNI</label>
                                <input type="text" name="dni" id="dni">
                            </div>
                            <div class="group">
                                <label for="moneda">Moneda de pago</label>
                                <input type="text" name="currency" id="currency">
                            </div>
                            <div class="group">
                                <label for="tipopago">Tipo de pago</label>
                                <input type="text" name="paymentType" id="paymentType">
                            </div>
                        </article>
                    </form>
                </section>
                <section class="form">
                    <h1>DATOS DEL VENDEDOR</h1>
                    <form action="#" method="post">
                        <article class="Parte2">
                            <div class="group">
                                <label for="vendedor">Vendedor</label>
                                <select name="employee" id="employee">
                                    <option value="">Seleccione un empleado</option>
                                    <?php foreach ($employees as $employee) : ?>
                                        <option value="<?php echo htmlspecialchars($employee['code']); ?>">
                                            <?php echo htmlspecialchars($employee['code'] . ' - ' . $employee['name'] . ' ' . $employee['father_last_name'] . ' ' . $employee['mother_last_name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="group">
                                <label for="sucursal">Sucursal</label>
                                <input type="text" name="branch_office" id="branch_office">
                            </div>
                            <div class="group">
                                <label for="fechapago">Fecha de pago</label>
                                <input type="date" name="date" id="date">
                            </div>
                        </article>
                        <div class="notas">
                            <div class="group">
                                <label for="nota">Nota</label>
                                <textarea name="notes" id="notes" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <section class="listado">
                <div class="caja">
                    <h1>DETALLES DE PRODUCTOS</h1>
                    <form id="productForm" onsubmit="return false;">
                        <div class="product">
                            <label for="producto">PRODUCTO</label>
                            <select name="product" id="product">
                                <option value="">Seleccione un producto</option>
                                <?php foreach ($products as $product) : ?>
                                    <option
                                        value="<?php echo htmlspecialchars($product['code']); ?>"
                                        data-price="<?php echo htmlspecialchars($product['price']); ?>"
                                        data-stock="<?php echo htmlspecialchars($product['stock']); ?>"
                                        data-productId="<?php echo htmlspecialchars($product['product_id']); ?>">
                                        <?php echo htmlspecialchars($product['code'] . ' - ' . $product['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="button" class="agregar" onclick="addProduct()">Agregar</button>
                        </div>
                        <div class="grupo-producto">
                            <div class="group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="quantity" id="quantity" required>
                            </div>
                            <div class="group">
                                <label for="price">P. Unitario</label>
                                <input type="number" name="price" id="price" required>
                            </div>
                            <div class="group">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" id="stock">
                            </div>
                    </form>
                </div>

                <div class="actions">
                    <button class="nuevo" onclick="saveOrder()">Nuevo</button>
                    <button class="cancelar" onclick="resetForm()">Cancelar</button>
                </div>

                <table id="productTable">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="productTableBody">
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">Total Neto</td>
                            <td id="totalNeto">0.00</td>
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

    <script src="../../../assets/js/ventas/ordenVenta.js"></script>
</body>


</html>