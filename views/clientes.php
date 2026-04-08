<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>

    <div class="page-container">

        <div class="page-header">
            <a href="../index.php" class="btn-volver">Volver al menu</a>
            <h1>Clientes</h1>
        </div>

        <div class="acciones">
            <a href="clientes/crear.php" class="btn">Registrar cliente</a>
        </div>

        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>Licencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Aquí irá el query que trae los clientes de la BD
                $clientes = [
                    ['id' => 1, 'nombre' => 'Carlos Pérez', 'documento' => '1234567', 'telefono' => '3001234567', 'licencia' => 'B1'],
                    ['id' => 2, 'nombre' => 'Ana Gómez',   'documento' => '7654321', 'telefono' => '3109876543', 'licencia' => 'B2'],
                ];

                foreach ($clientes as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><?= $c['nombre'] ?></td>
                    <td><?= $c['documento'] ?></td>
                    <td><?= $c['telefono'] ?></td>
                    <td><?= $c['licencia'] ?></td>
                    <td>
                        <a href="clientes/detalle.php?id=<?= $c['id'] ?>">Ver detalle</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</body>
</html>