<?php

require_once __DIR__ . '../../../controllers/reports/BillsReportController.php';

$controller = new BillsReportController();
$result = [];

if (isset($_POST['action'])) {

    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];

    switch ($_POST['action']) {
        case 'query':
            $result = $controller->getReportByDateRange($fechaInicio, $fechaFin);
            break;
        default:
            break;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/reportefactura-view.css">
    <title>Document</title>
</head>

<body>
    <?php include_once '../../../assets/component/navbar.php'; ?>

    <div class="container">
        <section class="title">
            <h1>REGISTRO DE FACTURAS</h1>
        </section>
        <div class="dividor">
            <section class="form">
                <form action="" method="post">
                    <article class="Parte2">
                        <div class="group">
                            <label for="fechaInicio">Fecha de Inicio</label>
                            <input type="date" name="fechaInicio" id="fechaInicio">
                        </div>
                        <div class="group">
                            <label for="fechaFin">Fecha de Fin</label>
                            <input type="date" name="fechaFin" id="fechaFin">
                        </div>
                    </article>
                    <div class="button-actions">
                        <button name="action" value="query" class="consultar">Consultar</button>
                        <button type="button" class="imprimir" onclick="generatePDFBills(
                                <?php echo htmlspecialchars(json_encode($result)); ?>, 
                                'Reporte de Facturas de Ventas'
                            )">
                            Imprimir
                        </button>
                    </div>
                </form>
            </section>
            <section class="listado">
                <h1>Reportes de Facturas</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Divisa</th>
                            <th>IGV</th>
                            <th>Importe Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['date_issue']) ?></td>
                                <td><?= htmlspecialchars($row['currency']) ?></td>
                                <td><?= htmlspecialchars($row['igv']) ?></td>
                                <td><?= htmlspecialchars($row['final_price']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>

    <!-- Incluir jsPDF desde CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="../../../assets/js/reportes/generatePDF.js"></script>

</body>

</html>