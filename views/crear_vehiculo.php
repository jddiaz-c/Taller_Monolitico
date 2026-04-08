<?php
require __DIR__ . '/../models/config/model_base.php';
require __DIR__ . '/../models/entities/Vehiculo.php';
require __DIR__ . '/../models/config/connection_db.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../controllers/VehiculoController.php';

use app\controllers\VehiculoController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new VehiculoController();
    $controller->registrar($_POST);
    header('Location: vehiculos.php?msg=creado');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Vehículo</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>

    <div class="page-container">

        <div class="page-header">
            <a href="vehiculos.php" class="btn-volver">Volver</a>
            <h1>Registrar Vehículo</h1>
        </div>

        <form action="crear_vehiculo.php" method="POST" class="formulario">
            <label>Marca
                <input type="text" name="marca" required>
            </label>
            <label>Modelo
                <input type="text" name="modelo" required>
            </label>
            <label>Año
                <input type="number" name="anio" min="1990" max="2030" required>
            </label>
            <label>Categoría
                <input type="text" name="categoria">
            </label>
            <label>Estado
                <select name="estado">
                    <option value="disponible">Disponible</option>
                    <option value="mantenimiento">Mantenimiento</option>
                </select>
            </label>
            <button type="submit" class="btn">Registrar</button>
        </form>

    </div>

</body>
</html>