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
                        <input class="code" type="text" name="code" id="code">
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
                        <div class="group">
                            <label for="producto">PRODUCTO</label>
                            <select name="product" id="product">
                                <option value="">Seleccione un producto</option>
                                <?php foreach ($products as $product) : ?>
                                    <option 
                                        value="<?php echo htmlspecialchars($product['code']); ?>" 
                                        data-price="<?php echo htmlspecialchars($product['price']); ?>" 
                                        data-stock="<?php echo htmlspecialchars($product['stock']); ?>" 
                                        data-productId="<?php echo htmlspecialchars($product['product_id']); ?>"
                                    >
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
                    <button class="editar">Editar</button>
                    <button class="cancelar">Cancelar</button>
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
</body>
<script>
    //Autorellenar formulario Cliente
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
    //Autorellenar formulario Vendedor
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
    //Autorellenar formulario Producto
    document.addEventListener('DOMContentLoaded', function() {
        var productSelect = document.getElementById('product');
        if (productSelect) {
            productSelect.addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                if (this.value === "") {
                    // Si se selecciona la opción por defecto, limpia todos los campos
                    document.getElementById('quantity').value = '';
                    document.getElementById('price').value = '';
                    document.getElementById('stock').value = '';
                } else {
                    // Si se selecciona un producto, llena los campos con la información correspondiente
                    document.getElementById('quantity').value = '';
                    document.getElementById('stock').value = selectedOption.dataset.stock || '';
                    document.getElementById('price').value = selectedOption.dataset.price || '';
                }
            });
        }
    });

    let products = [];

    function addProduct() {
        const productSelect = document.getElementById('product');

        const quantity = document.getElementById('quantity').value;
        const price = document.getElementById('price').value;

        if (!productSelect.value || !quantity || !price) {
            alert('Por favor, complete todos los campos del producto');
            return;
        }

        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const product = {
            product_id: selectedOption.dataset.productid,
            code: productSelect.value,
            name: selectedOption.text,
            quantity: parseInt(quantity),
            stock: parseInt(selectedOption.dataset.stock),
            price: parseFloat(price),
            total: parseFloat(quantity) * parseFloat(price)
        };

        products.push(product);
        updateProductTable();
        calculateTotals();
        clearProductForm();
    }

    function updateProductTable() {
        const tbody = document.getElementById('productTableBody');
        tbody.innerHTML = '';

        products.forEach(product => {
            const row = tbody.insertRow();
            row.innerHTML = `
            <td>${product.code}</td>
            <td>${product.name}</td>
            <td>${product.quantity}</td>
            <td>${product.price.toFixed(2)}</td>
            <td>${product.total.toFixed(2)}</td>
        `;
        });
    }

    function calculateTotals() {
        const totalNeto = products.reduce((sum, product) => sum + product.total, 0);
        const igv = totalNeto * 0.18;
        const totalFinal = totalNeto + igv;

        document.getElementById('totalNeto').textContent = totalNeto.toFixed(2);
        document.getElementById('igv').textContent = igv.toFixed(2);
        document.getElementById('totalFinal').textContent = totalFinal.toFixed(2);
    }

    function clearProductForm() {
        document.getElementById('product').value = '';
        document.getElementById('quantity').value = '';
        document.getElementById('price').value = '';
        document.getElementById('stock').value = '';
    }

    function saveOrder() {
        // Recopilar datos del formulario principal
        const orderData = {
            code: document.getElementById('code').value,
            customer_id: document.getElementById('customer').value,
            employee_id: document.getElementById('employee').value,
            customer_dni: document.getElementById('dni').value,
            customer_address: document.getElementById('address').value,
            pay_method: document.getElementById('paymentType').value,
            currency: document.getElementById('currency').value,
            branch_office: document.getElementById('branch_office').value,
            date: document.getElementById('date').value,
            notes: document.getElementById('notes').value,
            totalNeto: document.getElementById('totalNeto').innerText,
            igv: document.getElementById('igv').innerText,
            final_price: document.getElementById('totalFinal').innerText,
            products: products // Array de productos que ya tienes
        };


        // path dinamico
        fetch('../../controllers/ventas/savesSalesOrder.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(orderData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Orden de venta guardada con éxito');
                    // Limpiar el formulario o redirigir a una nueva página
                } else {
                    alert('Error al guardar la orden de venta: ' + data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('Error al guardar la orden de venta');
            });
    }
</script>

</html>