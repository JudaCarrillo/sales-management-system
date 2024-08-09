<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/facturacion-view.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <section class="title">
            <h1>FACTURACION</h1>
        </section>
        <div class="dividor">
            <div class="espacios">

                <div class="parteCode">
                    <div class="group">
                        <input class="code" type="text" name="code" id="code">
                    </div>
                </div>

                <section class="form">
                    <h1>DATOS DE VENTA</h1>
                    <form action="../../../save_product.php" method="post">
                        <article class="Parte2">
                            <div class="group">
                                <label for="orden">Orden de Venta</label>
                                <?php
                                //Obtener la lista de Ordenes de Venta
                                require_once __DIR__ . '/../../controllers/ventas/salesOrdersController.php';
                                $orderController = new SalesOrdersController();
                                $columns = ['sales_order_id', 'customer_dni', 'customer_address', 'branch_office', 'currency', 'pay_method', 'date', 'code'];
                                $where = "";
                                $orders = $orderController->get($where, $columns);
                                ?>
                                <select name="order" id="order">
                                    <option value="">Seleccione un cliente</option>

                                    <?php foreach ($orders as $order) : ?>
                                        <option value="<?php echo htmlspecialchars($order['sales_order_id']); ?>"
                                            data-customer-dni="<?php echo htmlspecialchars($order['customer_dni']); ?>"
                                            data-customer-address="<?php echo htmlspecialchars($order['customer_address']); ?>"
                                            data-branch-office="<?php echo htmlspecialchars($order['branch_office']); ?>"
                                            data-currency="<?php echo htmlspecialchars($order['currency']); ?>"
                                            data-pay-method="<?php echo htmlspecialchars($order['pay_method']); ?>"
                                            data-date="<?php echo htmlspecialchars($order['date']); ?>">
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
                                <input type="text" name="customer_dni" id="customer_dni">
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
                    <button class="nuevo">Nuevo</button>
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
        var customerSelect = document.getElementById('order');
        if (customerSelect) {
            customerSelect.addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                if (this.value === "") {
                    // Si se selecciona la opción por defecto, limpia todos los campos
                    document.getElementById('customer_dni').value = '';
                    document.getElementById('customer_address').value = '';
                    document.getElementById('date').value = '';
                    document.getElementById('currency').value = '';
                    document.getElementById('branch_office').value = '';
                    document.getElementById('pay_method').value = '';
                } else {
                    // Si se selecciona un cliente, llena los campos con la información correspondiente
                    document.getElementById('customer_dni').value = selectedOption.dataset.customerDni;
                    document.getElementById('customer_address').value = selectedOption.dataset.customerAddress;
                    // Date debe tener el formato YYYY-MM-DD
                    // Extraer la fecha y hora del dataset
                    let dateTime = selectedOption.dataset.date;

                    // Crear un objeto Date
                    let date = new Date(dateTime);

                    // Formatear la fecha a YYYY-MM-DD
                    let year = date.getFullYear();
                    let month = ('0' + (date.getMonth() + 1)).slice(-2); // Añadir cero si es necesario
                    let day = ('0' + date.getDate()).slice(-2); // Añadir cero si es necesario

                    let formattedDate = `${year}-${month}-${day}`;

                    // Asignar la fecha formateada al valor del elemento con id 'date'
                    document.getElementById('date').value = formattedDate;
                    document.getElementById('currency').value = selectedOption.dataset.currency;
                    document.getElementById('branch_office').value = selectedOption.dataset.branchOffice;
                    document.getElementById('pay_method').value = selectedOption.dataset.payMethod;
                }
            });
        }
    });

    //Mostrar los Detalles de Ventas
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