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
                        <input class="code" type="text" name="code" id="code">
                    </div>
                </div>
                <section class="form">
                    <h1>DATOS DE CLIENTE</h1>
                    <form action="../../../save_product.php" method="post">
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
                    <div class="group">
                        <label for="search" class="search_label">PRODUCTO</label>
                        <div class="search-img">
                            <select name="producto" id="">
                                <option value="s">s</option>
                                <option value="s">s</option>
                                <option value="s">s</option>
                            </select>
                            <button class="agregar">Agregar</button>
                        </div>
                    </div>
                    <div class="grupo-producto">
                        <div class="group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" name="quantity" id="quantity">
                        </div>
                        <div class="group">
                            <label for="p.unitario">P. Unitario</label>
                            <input type="number" name="price" id="price">
                        </div>
                        <div class="group">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" id="stock">
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <button class="nuevo">Nuevo</button>
                    <button class="editar">Editar</button>
                    <button class="cancelar">Cancelar</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Marca</th>
                            <th>Stock</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        ?>
                        <tr>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                        </tr>
                        <tr>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                        </tr>
                        <tr>
                            <td>s</td>
                            <td>s</td>
                            <td>s</td>
                            <td>2</td>
                            <td>s</td>
                            <td>s</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>3</td>
                            <td>4</td>
                            <td>r</td>
                            <td>s</td>
                            <td>s</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var customerSelect = document.getElementById('customer');
        if (customerSelect) {
            customerSelect.addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                if (this.value === "") {
                    // Si se selecciona la opción por defecto, limpia todos los campos
                    document.getElementById('address').value = '';
                    document.getElementById('dni').value = '';
                    document.getElementById('currency').value = '';
                    document.getElementById('paymentType').value = '';
                } else {
                    // Si se selecciona un cliente, llena los campos con la información correspondiente
                    document.getElementById('address').value = selectedOption.dataset.address || '';
                    document.getElementById('dni').value = selectedOption.dataset.dni || '';
                    document.getElementById('currency').value = 'PEN';
                    document.getElementById('paymentType').value = 'Efectivo';
                }
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var employeeSelect = document.getElementById('employee');
        if (employeeSelect) {
            employeeSelect.addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                if (this.value === "") {
                    // Si se selecciona la opción por defecto, limpia todos los campos
                    document.getElementById('branch_office').value = '';
                    document.getElementById('date').value = '';
                } else {
                    // Si se selecciona un empleado, llena los campos con la información correspondiente
                    document.getElementById('branch_office').value = 'Lima';
                    document.getElementById('date').value = new Date().toISOString().split('T')[0];
                }
            });
        }
    });
</script>

</html>