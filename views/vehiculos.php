<?php
require __DIR__ . '/../models/config/model_base.php';
require __DIR__ . '/../models/entities/Vehiculo.php';
require __DIR__ . '/../models/config/connection_db.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../controllers/VehiculoController.php';

use app\controllers\VehiculoController;

$controller = new VehiculoController();
$lista      = $controller->getLista();
$mensaje    = $_GET['msg'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vehículos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;1,400&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/style.css">
</head>
<body class="inner-page">

    <div class="app-layout">

        <?php require __DIR__ . '/layout.php'; ?>

        <main class="content">

            <div class="content-header">
                <h1 class="content-title">Vehículos</h1>
                <a href="crear_vehiculo.php" class="btn">+ Registrar</a>
            </div>

            <?php if ($mensaje === 'creado'): ?>
                <p class="msg-exito">Vehículo registrado correctamente.</p>
            <?php elseif ($mensaje === 'eliminado'): ?>
                <p class="msg-exito">Vehículo eliminado correctamente.</p>
            <?php elseif ($mensaje === 'error_reservas'): ?>
                <p class="msg-error">No se puede eliminar: el vehículo tiene reservas activas.</p>
            <?php endif; ?>

            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Categoría</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $v): ?>
                    <tr>
                        <td><?= str_pad($v->get('id'), 3, '0', STR_PAD_LEFT) ?></td>
                        <td class="td-primary"><?= $v->get('marca') ?></td>
                        <td><?= $v->get('modelo') ?></td>
                        <td><?= $v->get('anio') ?></td>
                        <td><?= $v->get('categoria') ?></td>
                        <td>
                            <span class="badge badge-<?= $v->get('estado') ?>">
                                <?= ucfirst($v->get('estado')) ?>
                            </span>
                        </td>
                        <td class="td-acciones">
                            <a href="eliminar_vehiculo.php?id=<?= $v->get('id') ?>"
                               onclick="return confirm('¿Eliminar este vehículo?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </main>
    </div>

</body>
</html>