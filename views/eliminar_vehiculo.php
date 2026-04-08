<?php
require __DIR__ . '/../models/config/model_base.php';
require __DIR__ . '/../models/entities/Vehiculo.php';
require __DIR__ . '/../models/entities/Reserva.php';
require __DIR__ . '/../models/config/connection_db.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../models/queries/ReservaQuery.php';
require __DIR__ . '/../controllers/VehiculoController.php';

use app\controllers\VehiculoController;

$id = $_GET['id'] ?? null;

if (!empty($id)) {
    $controller = new VehiculoController();
    $resultado  = $controller->eliminar($id);

    if ($resultado) {
        header('Location: vehiculos.php?msg=eliminado');
    } else {
        header('Location: vehiculos.php?msg=error_reservas');
    }
} else {
    header('Location: vehiculos.php');
}
exit;