<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservas</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>

    <div class="page-container">

        <div class="page-header">
            <a href="../index.php" class="btn-volver">Volver al menu</a>
            <h1>Nueva Reserva</h1>
        </div>

        <form action="../controllers/ReservaController.php" method="POST" class="formulario">

            <!-- Selección de vehículo (lista reducida: solo disponibles) -->
            <fieldset>
                <legend>Vehículo</legend>
                <select name="id_vehiculo" required>
                    <option value="">-- Seleccionar vehículo --</option>
                    <?php
                    // Aquí irá el query: SELECT solo vehículos con estado = 'disponible'
                    $vehiculos_disponibles = [
                        ['id' => 1, 'marca' => 'Toyota', 'modelo' => 'Corolla', 'anio' => 2020],
                        ['id' => 3, 'marca' => 'Renault', 'modelo' => 'Logan',   'anio' => 2022],
                    ];
                    foreach ($vehiculos_disponibles as $v): ?>
                        <option value="<?= $v['id'] ?>">
                            <?= $v['marca'] ?> <?= $v['modelo'] ?> (<?= $v['anio'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </fieldset>

            <!-- Selección de cliente (lista reducida: nombre y documento) -->
            <fieldset>
                <legend>Cliente</legend>
                <select name="id_cliente" required>
                    <option value="">-- Seleccionar cliente --</option>
                    <?php
                    // Aquí irá el query: SELECT id, nombre, documento FROM clientes
                    $clientes = [
                        ['id' => 1, 'nombre' => 'Carlos Pérez', 'documento' => '1234567'],
                        ['id' => 2, 'nombre' => 'Ana Gómez',   'documento' => '7654321'],
                    ];
                    foreach ($clientes as $c): ?>
                        <option value="<?= $c['id'] ?>">
                            <?= $c['nombre'] ?> — <?= $c['documento'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </fieldset>

            <!-- Fechas -->
            <fieldset>
                <legend>Periodo</legend>
                <label>
                    Fecha de inicio
                    <input type="date" name="fecha_inicio" required>
                </label>
                <label>
                    Fecha de fin
                    <input type="date" name="fecha_fin" required>
                </label>
            </fieldset>

            <button type="submit" class="btn">Crear reserva</button>

        </form>

    </div>

</body>
</html>