<?php
require __DIR__ . '/../models/config/model_base.php';
require __DIR__ . '/../models/entities/Cliente.php';
require __DIR__ . '/../models/entities/Reserva.php';
require __DIR__ . '/../models/config/connection_db.php';
require __DIR__ . '/../models/queries/ClienteQuery.php';
require __DIR__ . '/../models/queries/ReservaQuery.php';
require __DIR__ . '/../controllers/ClienteController.php';

use app\controllers\ClienteController;

$id = $_GET['id'] ?? null;

if (!empty($id)) {
    $controller = new ClienteController();
    $resultado  = $controller->eliminar($id);

    if ($resultado) {
        header('Location: clientes.php?msg=eliminado');
    } else {
        header('Location: clientes.php?msg=error_reservas');
    }
} else {
    header('Location: clientes.php');
}
exit;