<?php
session_start();
require_once __DIR__ . '../../../controllers/reports/SalesReportController.php';
require_once __DIR__ . '../../../controllers/maintenance/CustomersController.php';

$controller = new SalesReportController();
$CustomerHandler = new CustomersController();

$where = "";
$columns = ['customer_id', 'code', 'name', 'dni'];
$customers = $CustomerHandler->get($where, $columns);
$result = [];

if (isset($_POST['action'])) {

    if ($_POST['action'] !== 'query') {
        exit;
    }

    $customerId = $_POST['client'];
    $result = $controller->getReportByCustomer($customerId);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/reporteVentasCliente-view.css">
    <title>Document</title>
</head>

<body>
    <?php include_once '../../../assets/component/navbar.php'; ?>

    <div class="container">
        <section class="title">
            <h1>REPORTE DE VENTAS POR CLIENTE</h1>
        </section>
        <div class="dividor">
            <section class="form">
                <form action="" method="post">
                    <article class="Parte2">
                        <div class="group">
                            <label for="cliente">Cliente</label>
                            <select name="client" id="client">
                                <option value="">Seleccione un Cliente</option>
                                <?php foreach ($customers as $customer) : ?>
                                    <option value="<?php echo htmlspecialchars($customer['customer_id']); ?>">
                                        <?php echo htmlspecialchars($customer['dni'] . ' - ' . $customer['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                    </article>
                    <div class="button-actions">
                        <button name="action" value="query" class="consultar">Consultar</button>
                        <button type="button" class="imprimir" onclick="generatePDF(
                                <?php echo htmlspecialchars(json_encode($result)); ?>, 
                                'Reporte de Ventas por Cliente'
                            )">
                            Imprimir
                        </button>
                    </div>
                </form>
            </section>
            <section class="listado">
                <h1>Reportes de Ventas</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Divisa</th>
                            <th>Importe Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td><?= htmlspecialchars($row['code']) ?></td>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['date']) ?></td>
                                <td><?= htmlspecialchars($row['currency']) ?></td>
                                <td><?= htmlspecialchars($row['final_price']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="../../../assets/js/reportes/generatePDF.js"></script>

</body>

</html>