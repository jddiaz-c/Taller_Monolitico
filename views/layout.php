<aside class="sidebar">
    <a href="../index.php" class="sb-home">Inicio</a>
    <nav class="sb-nav">
        <a href="vehiculos.php" class="sb-item <?= basename($_SERVER['PHP_SELF']) === 'vehiculos.php' ? 'active' : '' ?>">
            <span class="sb-num">01</span> Vehículos
        </a>
        <a href="clientes.php" class="sb-item <?= basename($_SERVER['PHP_SELF']) === 'clientes.php' ? 'active' : '' ?>">
            <span class="sb-num">02</span> Clientes
        </a>
        <a href="reservas.php" class="sb-item <?= basename($_SERVER['PHP_SELF']) === 'reservas.php' ? 'active' : '' ?>">
            <span class="sb-num">03</span> Reservas
        </a>
        <a href="historial.php" class="sb-item <?= basename($_SERVER['PHP_SELF']) === 'historial.php' ? 'active' : '' ?>">
            <span class="sb-num">04</span> Historial
        </a>
    </nav>
</aside>