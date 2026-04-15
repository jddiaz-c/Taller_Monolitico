<?php
require __DIR__ . '/../models/config/model_base.php';
require __DIR__ . '/../models/entities/Cliente.php';
require __DIR__ . '/../models/config/connection_db.php';
require __DIR__ . '/../models/queries/ClienteQuery.php';
require __DIR__ . '/../controllers/ClienteController.php';

use app\controllers\ClienteController;

$controller = new ClienteController();
$lista      = $controller->getLista();

$mensaje = $_GET['msg'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>

    <div class="page-container">

        <div class="page-header">
            <a href="../index.php" class="btn-volver">Volver al menu</a>
            <h1>Clientes</h1>
        </div>

        <?php if ($mensaje === 'creado'): ?>
            <p class="msg-exito">Cliente registrado correctamente.</p>
        <?php elseif ($mensaje === 'eliminado'): ?>
            <p class="msg-exito">Cliente eliminado correctamente.</p>
        <?php elseif ($mensaje === 'error_reservas'): ?>
        <p class="msg-error">No se puede eliminar: el cliente tiene reservas activas.</p>
        <?php endif; ?>

        <div class="acciones">
            <a href="crear_cliente.php" class="btn">Registrar cliente</a>
        </div>

        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Licencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $c): ?>
                <tr>
                    <td><?= $c->get('id') ?></td>
                    <td><?= $c->get('nombre') ?></td>
                    <td><?= $c->get('telefono') ?></td>
                    <td><?= $c->get('correo') ?></td>
                    <td><?= $c->get('numero_licencia') ?></td>
                    <td class="td-acciones">
                        <a href="eliminar_cliente.php?id=<?= $c->get('id') ?>"
                           onclick="return confirm('¿Eliminar este cliente?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</body>
</html>