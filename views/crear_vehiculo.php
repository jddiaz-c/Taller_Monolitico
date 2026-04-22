<?php
require __DIR__ . '/../models/config/model_base.php';
require __DIR__ . '/../models/entities/Vehiculo.php';
require __DIR__ . '/../models/config/connection_db.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../controllers/VehiculoController.php';

use app\controllers\VehiculoController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST['estado'] = 'disponible';
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;1,400&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/style.css">
</head>
<body class="inner-page">

    <div class="app-layout">

        <?php require __DIR__ . '/layout.php'; ?>

        <main class="content">

            <div class="content-header">
                <h1 class="content-title">Registrar Vehículo</h1>
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
                <div class="form-actions">
                    <button type="submit" class="btn">Registrar</button>
                    <a href="vehiculos.php" class="btn-cancelar">Cancelar</a>
                </div>
            </form>

        </main>
    </div>

</body>
</html>