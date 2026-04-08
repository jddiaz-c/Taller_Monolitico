<?php
namespace app\models\queries;
use app\models\config\ConnectionDB;
use app\models\entities\Reserva;

class ReservaQuery
{
    static function getAll()
    {
        $sql = "SELECT r.*, c.nombre AS cliente_nombre, 
                       v.marca, v.modelo
                FROM reservas r
                JOIN clientes c ON r.cliente_id = c.id
                JOIN vehiculos v ON r.vehiculo_id = v.id";
        $connDb = new ConnectionDB();
        $result = $connDb->execute($sql);
        $list   = [];
        while ($row = $result->fetch_assoc()) {
            $reserva = new Reserva(
                $row['id'], $row['cliente_id'], $row['vehiculo_id'],
                $row['fecha_inicio'], $row['fecha_fin'], $row['estado']
            );
            $reserva->set('cliente_nombre', $row['cliente_nombre']);
            $reserva->set('vehiculo_info',  $row['marca'] . ' ' . $row['modelo']);
            $list[] = $reserva;
        }
        $connDb->close();
        return $list;
    }

    static function create($entity)
    {
        $sql    = "INSERT INTO reservas (cliente_id, vehiculo_id, fecha_inicio, fecha_fin, estado) VALUES (?,?,?,?,?)";
        $connDb = new ConnectionDB();
        $result = $connDb->executeUpdateData($sql, [
            'type'  => 'iisss',
            'datos' => [
                $entity->get('cliente_id'),   $entity->get('vehiculo_id'),
                $entity->get('fecha_inicio'), $entity->get('fecha_fin'),
                $entity->get('estado')
            ]
        ]);
        $connDb->close();
        return $result;
    }

    static function updateEstado($id, $estado)
    {
        $sql    = "UPDATE reservas SET estado = ? WHERE id = ?";
        $connDb = new ConnectionDB();
        $result = $connDb->executeUpdateData($sql, [
            'type'  => 'si',
            'datos' => [$estado, $id]
        ]);
        $connDb->close();
        return $result;
    }
    static function tieneReservasActivasPorVehiculo($vehiculo_id)
    {
        $sql    = "SELECT COUNT(*) as total FROM reservas 
                WHERE vehiculo_id = ? AND estado = 'activa'";
        $connDb = new ConnectionDB();
        $result = $connDb->executeQuery($sql, [
            'type'  => 'i',
            'datos' => [$vehiculo_id]
        ]);
        $row = $result->fetch_assoc();
        $connDb->close();
        return $row['total'] > 0;
    }

    static function tieneReservasActivasPorCliente($cliente_id)
    {
        $sql    = "SELECT COUNT(*) as total FROM reservas 
                WHERE cliente_id = ? AND estado = 'activa'";
        $connDb = new ConnectionDB();
        $result = $connDb->executeQuery($sql, [
            'type'  => 'i',
            'datos' => [$cliente_id]
        ]);
        $row = $result->fetch_assoc();
        $connDb->close();
        return $row['total'] > 0;
    }
}