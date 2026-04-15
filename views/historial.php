<?php
require __DIR__ . '/../models/config/model_base.php';
require __DIR__ . '/../models/entities/Vehiculo.php';
require __DIR__ . '/../models/entities/Cliente.php';
require __DIR__ . '/../models/entities/Reserva.php';
require __DIR__ . '/../models/config/connection_db.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../models/queries/ClienteQuery.php';
require __DIR__ . '/../models/queries/ReservaQuery.php';
require __DIR__ . '/../controllers/VehiculoController.php';
require __DIR__ . '/../controllers/ClienteController.php';
require __DIR__ . '/../controllers/ReservaController.php';

use app\controllers\VehiculoController;
use app\controllers\ClienteController;
use app\controllers\ReservaController;

$vehiculoController = new VehiculoController();
$clienteController  = new ClienteController();
$reservaController  = new ReservaController();

$lista_vehiculos = $vehiculoController->getLista();
$lista_clientes  = $clienteController->getLista();

$filtro_vehiculo = $_GET['vehiculo_id'] ?? null;
$filtro_cliente  = $_GET['cliente_id']  ?? null;

$historial = $reservaController->getHistorial($filtro_vehiculo, $filtro_cliente);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>

    <div class="page-container">

        <div class="page-header">
            <a href="../index.php" class="btn-volver">Volver al menu</a>
            <h1>Historial de alquileres</h1>
        </div>

        <form action="historial.php" method="GET" class="formulario-filtro">
            <label>Vehículo
                <select name="vehiculo_id">
                    <option value="">Todos</option>
                    <?php foreach ($lista_vehiculos as $v): ?>
                        <option value="<?= $v->get('id') ?>"
                            <?= $filtro_vehiculo == $v->get('id') ? 'selected' : '' ?>>
                            <?= $v->get('marca') ?> <?= $v->get('modelo') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>

            <label>Cliente
                <select name="cliente_id">
                    <option value="">Todos</option>
                    <?php foreach ($lista_clientes as $c): ?>
                        <option value="<?= $c->get('id') ?>"
                            <?= $filtro_cliente == $c->get('id') ? 'selected' : '' ?>>
                            <?= $c->get('nombre') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>

            <button type="submit" class="btn">Filtrar</button>
            <a href="historial.php" class="btn-volver">Limpiar filtro</a>
        </form>

        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Vehículo</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($historial)): ?>
                    <tr>
                        <td colspan="6">No hay registros.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($historial as $r): ?>
                    <tr>
                        <td><?= $r->get('id') ?></td>
                        <td><?= $r->get('cliente_nombre') ?></td>
                        <td><?= $r->get('vehiculo_info') ?></td>
                        <td><?= $r->get('fecha_inicio') ?></td>
                        <td><?= $r->get('fecha_fin') ?></td>
                        <td>
                            <span class="badge badge-<?= $r->get('estado') ?>">
                                <?= ucfirst($r->get('estado')) ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

</body>
</html>