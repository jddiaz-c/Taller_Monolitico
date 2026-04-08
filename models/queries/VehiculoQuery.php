<?php
namespace app\models\queries;
use app\models\config\ConnectionDB;
use app\models\entities\Vehiculo;

class VehiculoQuery
{
    static function getAll()
    {
        $sql    = "SELECT * FROM vehiculos";
        $connDb = new ConnectionDB();
        $result = $connDb->execute($sql);
        $list   = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = new Vehiculo(
                $row['id'], $row['marca'], $row['modelo'],
                $row['anio'], $row['categoria'], $row['estado']
            );
        }
        $connDb->close();
        return $list;
    }

    static function getDisponibles()
    {
        $sql    = "SELECT * FROM vehiculos WHERE estado = 'disponible'";
        $connDb = new ConnectionDB();
        $result = $connDb->execute($sql);
        $list   = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = new Vehiculo(
                $row['id'], $row['marca'], $row['modelo'],
                $row['anio'], $row['categoria'], $row['estado']
            );
        }
        $connDb->close();
        return $list;
    }

    static function find($id)
    {
        $sql    = "SELECT * FROM vehiculos WHERE id = $id";
        $connDb = new ConnectionDB();
        $result = $connDb->execute($sql);
        $vehiculo = null;
        if ($row = $result->fetch_assoc()) {
            $vehiculo = new Vehiculo(
                $row['id'], $row['marca'], $row['modelo'],
                $row['anio'], $row['categoria'], $row['estado']
            );
        }
        $connDb->close();
        return $vehiculo;
    }

    static function create($entity)
    {
        $sql    = "INSERT INTO vehiculos (marca, modelo, anio, categoria, estado) VALUES (?,?,?,?,?)";
        $connDb = new ConnectionDB();
        $result = $connDb->executeUpdateData($sql, [
            'type'  => 'ssiss',
            'datos' => [
                $entity->get('marca'), $entity->get('modelo'),
                $entity->get('anio'),  $entity->get('categoria'),
                $entity->get('estado')
            ]
        ]);
        $connDb->close();
        return $result;
    }

    static function updateEstado($id, $estado)
    {
        $sql    = "UPDATE vehiculos SET estado = ? WHERE id = ?";
        $connDb = new ConnectionDB();
        $result = $connDb->executeUpdateData($sql, [
            'type'  => 'si',
            'datos' => [$estado, $id]
        ]);
        $connDb->close();
        return $result;
    }

    static function delete($id)
    {
        $sql    = "DELETE FROM vehiculos WHERE id = ?";
        $connDb = new ConnectionDB();
        $result = $connDb->executeUpdateData($sql, [
            'type'  => 'i',
            'datos' => [$id]
        ]);
        $connDb->close();
        return $result;
    }
}