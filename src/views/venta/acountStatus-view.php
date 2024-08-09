<?php
require_once __DIR__ . '../../../controllers/ventas/AccountStatusController.php';

$controller = new AccountStatusController();

$result = [];
$totalSum = 0;

if (isset($_POST['action']) && $_POST['action'] === 'query') {
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];

    $result = $controller->getReportByDateRange($fechaInicio, $fechaFin);
    $totalSum = $controller->getSumByDateRange($fechaInicio, $fechaFin);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/acountStatus-view.css">
    <title>Estado de Cuenta</title>
</head>

<body>
    <?php include_once '../../../assets/component/navbar.php'; ?>

    <div class="container">
        <section class="title">
            <h1>ESTADO DE CUENTA</h1>
        </section>
        <div class="dividor">
            <div class="espacios">
                <section class="form">
                    <h1>SELECCIONAR DOCUMENTOS</h1>
                    <form action="" method="post">
                        <article class="Parte2">
                            <div class="group">
                                <label for="fechaInicio">Fecha de Inicio</label>
                                <input type="date" name="fechaInicio" id="fechaInicio" required>
                            </div>
                            <div class="group">
                                <label for="fechaFin">Fecha de Fin</label>
                                <input type="date" name="fechaFin" id="fechaFin" required>
                            </div>
                        </article>
                        <div class="button-actions">
                            <button name="action" value="query" class="consultar">Consultar</button>
                            <button type="button" class="imprimir" onclick="generatePDF(
                                    <?php echo htmlspecialchars(json_encode($result), ENT_QUOTES, 'UTF-8'); ?>, 
                                    'Estado de Cuenta'
                                )">
                                Imprimir
                            </button>
                        </div>
                    </form>
                </section>
                <section class="form">
                    <h1>DETALLE DE ESTADO DE CUENTA</h1>
                    <div class="total-sum">
                    <h2>Suma Total: <?= htmlspecialchars(number_format($totalSum ?? 0, 2), ENT_QUOTES, 'UTF-8')  ?></h2>
                </div>
                </section>
            </div>
            <section class="listado">
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Moneda</th>
                            <th>Precio Final</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($result)) : ?>
                            <?php foreach ($result as $row) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['code'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($row['currency'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($row['final_price'], ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">No se encontraron resultados.</td>
                            </tr>
                        <?php endif; ?>
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
