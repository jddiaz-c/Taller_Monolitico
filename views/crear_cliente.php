<?php
require __DIR__ . '/../models/config/model_base.php';
require __DIR__ . '/../models/entities/Cliente.php';
require __DIR__ . '/../models/config/connection_db.php';
require __DIR__ . '/../models/queries/ClienteQuery.php';
require __DIR__ . '/../controllers/ClienteController.php';

use app\controllers\ClienteController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ClienteController();
    $controller->registrar($_POST);
    header('Location: clientes.php?msg=creado');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar Cliente</title>
    <link rel="stylesheet" href="../public/style.css">
</head>

<body class="inner-page">
    <div class="app-layout">
        <?php require __DIR__ . '/layout.php'; ?>
        <main class="content">
            <div class="page-header">
                <a href="clientes.php" class="btn-volver">Volver</a>
                <h1>Registrar Cliente</h1>
            </div>

            <form action="crear_cliente.php" method="POST" class="formulario">
                <label>Nombre
                    <input type="text" name="nombre" required>
                </label>
                <label>Teléfono
                    <input type="text" name="telefono">
                </label>
                <label>Correo
                    <input type="email" name="correo">
                </label>
                <label>Número de licencia
                    <input type="text" name="numero_licencia">
                </label>
                <button type="submit" class="btn">Registrar</button>
            </form>
        </main>
    </div>
</body>

</html>