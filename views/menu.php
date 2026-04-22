<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Alquiler de Vehículos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;1,400&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/style.css">
</head>
<body class="menu-page">

    <div class="split">

        <div class="split-left">
            <p class="split-eyebrow">Sistema de gestión</p>
            <h1 class="split-title">
                Alquiler
                <em>de Vehículos</em>
            </h1>
            <p class="split-year">&copy; <?= date('Y') ?></p>
        </div>

        <div class="split-right">
            <a href="vehiculos.php" class="split-item">
                <span class="si-num">01</span>
                <span class="si-name">Vehículos</span>
                <span class="si-desc">Gestionar flota</span>
                <span class="si-arrow">→</span>
            </a>
            <a href="clientes.php" class="split-item">
                <span class="si-num">02</span>
                <span class="si-name">Clientes</span>
                <span class="si-desc">Registrar y consultar</span>
                <span class="si-arrow">→</span>
            </a>
            <a href="reservas.php" class="split-item">
                <span class="si-num">03</span>
                <span class="si-name">Reservas</span>
                <span class="si-desc">Gestionar reservas</span>
                <span class="si-arrow">→</span>
            </a>
            <a href="historial.php" class="split-item">
                <span class="si-num">04</span>
                <span class="si-name">Historial</span>
                <span class="si-desc">Consultar alquileres</span>
                <span class="si-arrow">→</span>
            </a>
        </div>

    </div>

</body>
</html>