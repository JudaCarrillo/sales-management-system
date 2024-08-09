<?php
require_once __DIR__ . '../../../controllers/maintenance/EmployeesController.php';

// Procesar la solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;
    $code = $_POST['code'] ?? null;
    $search_code = $_POST['search_code'] ?? null;

    if ($action === 'Buscar Empleado') {
        if (!$search_code) {
            $error = "Error: Falta el código para buscar.";
        } else {
            $controller = new EmployeesController();
            $employee = $controller->getByDni($search_code);
            if (!$employee) {
                $error = "Error: Empleado no encontrado";
            } else {
                $_POST = $employee;
            }
        }
    } else {
        if (!$action || !$code) {
            $error = "Error: Faltan datos requeridos.";
        } else {
            $controller = new EmployeesController();
            $employee = [
                'code' => $_POST['code'],
                'name' => $_POST['name'] ?? '',
                'father_last_name' => $_POST['father_last_name'] ?? '',
                'mother_last_name' => $_POST['mother_last_name'] ?? '',
                'dni' => $_POST['dni'] ?? '',
                'address' => $_POST['address'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'user' => $_POST['user'] ?? '',
                'password' => $_POST['password'] ?? '',
                'status' => isset($_POST['status']) ? '1' : '0'
            ];

            switch ($action) {
                case 'Guardar Empleado':
                    $controller->save($employee);
                    $success = "Empleado guardado exitosamente.";
                    break;

                case 'Deshabilitar Empleado':
                    $controller->disable($code);
                    $success = "Empleado deshabilitado exitosamente.";
                    break;

                case 'Editar Empleado':
                    if (!$controller->getByDni($employee['dni'])) {
                        $error = "Error: Empleado no encontrado";
                    } else {
                        $controller->update($employee);
                        $success = "Empleado actualizado exitosamente.";
                    }
                    break;

                default:
                    $error = "Acción no válida.";
                    break;
            }
        }
    }
}

// Obtener la lista de empleados
$controller = new EmployeesController();
$columns = ['code', 'name', 'father_last_name', 'dni', 'status'];
$where = '';
$employees = $controller->get($where, $columns);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/employees-view.css">
    <title>Mantenimiento de Empleados</title>
</head>

<body>
    <?php include_once '../../../assets/component/navbar.php'; ?>


    <div class="container">
        <form action="" method="post">

            <section class="title">
                <h1>Mantenimiento de Empleados</h1>
            </section>

            <?php if (isset($success)) : ?>
                <div class="success-message"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <?php if (isset($error)) : ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <div class="dividor">

                <section class="form">
                    <h1>DETALLES DE EMPLEADO</h1>
                    <article class="Parte2">
                        <div class="group">
                            <label for="codigo">Código</label>
                            <input type="text" name="code" id="code" value="<?= htmlspecialchars($_POST['code'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="name" id="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="apellido_paterno">Apellido Paterno</label>
                            <input type="text" name="father_last_name" id="father_last_name" value="<?= htmlspecialchars($_POST['father_last_name'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="apellido_materno">Apellido Materno</label>
                            <input type="text" name="mother_last_name" id="mother_last_name" value="<?= htmlspecialchars($_POST['mother_last_name'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="address" id="address" value="<?= htmlspecialchars($_POST['address'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="dni">DNI</label>
                            <input type="number" name="dni" id="dni" value="<?= htmlspecialchars($_POST['dni'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="telefono">Teléfono</label>
                            <input type="number" name="phone" id="phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="user" id="user" value="<?= htmlspecialchars($_POST['user'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="contrasena">Contraseña</label>
                            <input type="password" name="password" id="password" value="<?= htmlspecialchars($_POST['password'] ?? '') ?>">
                        </div>
                        <div class="group">
                            <label for="estatus">Estado:</label>
                            <input type="checkbox" id="status" name="status" <?= $_POST['status'] == 1 ? 'checked' : '' ?>>
                        </div>
                    </article>
                </section>
                <section class="listado">
                    <div class="caja">
                        <h1>LISTADO DE EMPLEADOS</h1>
                        <div class="group">
                            <label for="search" class="search_label">Buscado por DNI</label>
                            <div class="search-img">
                                <input type="text" name="search_code" id="search_code">
                                <button name="action" value="Buscar Empleado" style="border:none;background-color:transparent"><img src="../../../assets/img/lupa.png" alt=""></button>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="nuevo" name="action" value="Guardar Empleado">Nuevo</button>
                        <button class="editar" name="action" value="Editar Empleado">Editar</button>
                        <button class="cancelar" name="action" value="Deshabilitar Empleado">Deshabilitar</button>
                    </div>
                    <div class="table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>DNI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($employees as $employee) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($employee['code']) ?></td>
                                        <td><?= htmlspecialchars($employee['name']) ?></td>
                                        <td><?= htmlspecialchars($employee['father_last_name']) ?></td>
                                        <td><?= htmlspecialchars($employee['dni']) ?></td>
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