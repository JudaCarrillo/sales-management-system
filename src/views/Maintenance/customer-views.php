<?php
require_once __DIR__ . '../../../controllers/maintenance/CustomersController.php';

// Procesar la solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;
    $dni = $_POST['dni'] ?? null;
    $search_dni = $_POST['search_dni'] ?? null;

    $controller = new CustomersController();

    if ($action === 'Buscar Cliente') {
        if (!$search_dni) {
            $error = "Error: Falta el DNI para buscar.";
        } else {
            $customer = $controller->getByDni($search_dni);
            if (!$customer) {
                $error = "Error: Cliente no encontrado.";
            } else {
                $_POST = $customer;
            }
        }
    } else {
        if (!$action || !$dni) {
            $error = "Error: Faltan datos requeridos.";
        } else {
            $customer = [
                'code' => $_POST['code'] ?? '',
                'name' => $_POST['name'] ?? '',
                'father_last_name' => $_POST['father_last_name'] ?? '',
                'mother_last_name' => $_POST['mother_last_name'] ?? '',
                'business_name' => $_POST['business_name'] ?? '',
                'client_type' => $_POST['client_type'] ?? '',
                'ruc' => $_POST['ruc'] ?? '',
                'dni' => $_POST['dni'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'address' => $_POST['address'] ?? '',
                'status' => isset($_POST['status']) ? '1' : '0'
            ];

            switch ($action) {
                case 'Guardar Cliente':
                    $controller->save($customer);
                    $success = "Cliente guardado exitosamente.";
                    break;

                case 'Deshabilitar Cliente':
                    $controller->disable($dni);
                    $success = "Cliente deshabilitado exitosamente.";
                    break;

                case 'Editar Cliente':
                    $controller->update($customer);
                    $success = "Cliente actualizado exitosamente.";
                    break;

                default:
                    $error = "Acción no válida.";
                    break;
            }
        }
    }
}

// Obtener la lista de clientes
$controller = new CustomersController();
$columns = ['code', 'name', 'father_last_name', 'mother_last_name', 'dni', 'address'];
$where = '';
$customers = $controller->get($where, $columns);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/customer-view.css">
    <title>Mantenimiento de Clientes</title>
</head>

<body>
    <?php include_once '../../../assets/component/navbar.php'; ?>

    <div class="container">
        <form action="" method="post">
            <section class="title">
                <h1>Mantenimiento de Clientes</h1>
            </section>

            <?php if (isset($success)) : ?>
                <div class="success-message"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <?php if (isset($error)) : ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <div class="dividor">
                <section class="form">
                    <h1>DETALLES DE CLIENTE</h1>
                    <article class="Parte2">
                        <div class="group">
                            <label for="code">Código</label>
                            <input type="text" name="code" id="code" value="<?= htmlspecialchars($_POST['code'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="father_last_name">Apellido Paterno</label>
                            <input type="text" name="father_last_name" id="father_last_name" value="<?= htmlspecialchars($_POST['father_last_name'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="mother_last_name">Apellido Materno</label>
                            <input type="text" name="mother_last_name" id="mother_last_name" value="<?= htmlspecialchars($_POST['mother_last_name'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="business_name">Razón Social</label>
                            <input type="text" name="business_name" id="business_name" value="<?= htmlspecialchars($_POST['business_name'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="client_type">Tipo de Cliente</label>
                            <input type="text" name="client_type" id="client_type" value="<?= htmlspecialchars($_POST['client_type'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="ruc">RUC</label>
                            <input type="text" name="ruc" id="ruc" value="<?= htmlspecialchars($_POST['ruc'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="dni">DNI</label>
                            <input type="text" name="dni" id="dni" value="<?= htmlspecialchars($_POST['dni'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="phone">Teléfono</label>
                            <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" id="address" value="<?= htmlspecialchars($_POST['address'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="status">Estado:</label>
                            <input type="checkbox" id="status" name="status" <?= isset($_POST['status']) && $_POST['status'] == '1' ? 'checked' : '' ?>>
                        </div>
                    </article>
                </section>
                <section class="listado">
                    <div class="caja">
                        <h1>LISTADO DE CLIENTES</h1>
                        <div class="group">
                            <label for="search_dni" class="search_label">Buscado por DNI</label>
                            <div class="search-img">
                                <input type="text" name="search_dni" id="search_dni" value="<?= htmlspecialchars($search_dni ?? '') ?>">
                                <button name="action" value="Buscar Cliente" style="border:none;background-color:transparent">
                                    <img src="../../../assets/img/lupa.png" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="nuevo" name="action" value="Guardar Cliente">Nuevo</button>

                        <button class="editar" name="action" value="Editar Cliente">Editar</button>
                        <button class="cancelar" name="action" value="Deshabilitar Cliente">Deshabilitar</button>
                    </div>
                    <div class="table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>DNI</th>
                                    <th>Dirección</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($customers as $customer) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($customer['code']) ?></td>
                                        <td><?= htmlspecialchars($customer['name']) ?></td>
                                        <td><?= htmlspecialchars($customer['father_last_name']) ?></td>
                                        <td><?= htmlspecialchars($customer['dni']) ?></td>
                                        <td><?= htmlspecialchars($customer['address']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </form>
    </div>
</body>

</html>