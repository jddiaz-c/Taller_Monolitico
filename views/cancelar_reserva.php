<?php
require __DIR__ . '/../models/config/model_base.php';
require __DIR__ . '/../models/entities/Vehiculo.php';
require __DIR__ . '/../models/entities/Reserva.php';
require __DIR__ . '/../models/config/connection_db.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../models/queries/ReservaQuery.php';
require __DIR__ . '/../controllers/VehiculoController.php';
require __DIR__ . '/../controllers/ReservaController.php';

use app\controllers\ReservaController;

$id          = $_GET['id']          ?? null;
$vehiculo_id = $_GET['vehiculo_id'] ?? null;

if (!empty($id) && !empty($vehiculo_id)) {
    $controller = new ReservaController();
    $controller->cancelar($id, $vehiculo_id);
}

header('Location: reservas.php');
exit;