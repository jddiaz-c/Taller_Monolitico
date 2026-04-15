<?php
require __DIR__ . '/../models/config/model_base.php';
require __DIR__ . '/../models/entities/Vehiculo.php';
require __DIR__ . '/../models/config/connection_db.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../controllers/VehiculoController.php';

use app\controllers\VehiculoController;

$controller = new VehiculoController();
$id         = $_GET['id'] ?? null;
$vehiculo   = $controller->getVehiculo($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->cambiarEstado($_POST['id'], $_POST['estado']);
    header('Location: vehiculos.php?msg=estado');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Estado</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>

    <div class="page-container">

        <div class="page-header">
            <a href="vehiculos.php" class="btn-volver">Volver</a>
            <h1>Cambiar Estado</h1>
        </div>

        <p><strong>Vehículo:</strong> <?= $vehiculo->get('marca') ?> <?= $vehiculo->get('modelo') ?></p>
        <p><strong>Estado actual:</strong> <?= ucfirst($vehiculo->get('estado')) ?></p>

        <form action="cambiar_estado_vehiculo.php" method="POST" class="formulario">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label>Nuevo estado
                <select name="estado">
                    <option value="disponible">Disponible</option>
                    <option value="alquilado">Alquilado</option>
                    <option value="mantenimiento">Mantenimiento</option>
                </select>
            </label>
            <button type="submit" class="btn">Guardar</button>
        </form>

    </div>

</body>
</html>