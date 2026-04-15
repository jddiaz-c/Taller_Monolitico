<?php
namespace app\models\queries;
use app\models\config\ConnectionDB;
use app\models\entities\Cliente;

class ClienteQuery
{
    static function getAll()
    {
        $sql    = "SELECT * FROM clientes";
        $connDb = new ConnectionDB();
        $result = $connDb->execute($sql);
        $list   = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = new Cliente(
                $row['id'], $row['nombre'], $row['telefono'],
                $row['correo'], $row['numero_licencia']
            );
        }
        $connDb->close();
        return $list;
    }

    static function find($id)
    {
        $sql    = "SELECT * FROM clientes WHERE id = $id";
        $connDb = new ConnectionDB();
        $result = $connDb->execute($sql);
        $cliente = null;
        if ($row = $result->fetch_assoc()) {
            $cliente = new Cliente(
                $row['id'], $row['nombre'], $row['telefono'],
                $row['correo'], $row['numero_licencia']
            );
        }
        $connDb->close();
        return $cliente;
    }

    static function create($entity)
    {
        $sql    = "INSERT INTO clientes (nombre, telefono, correo, numero_licencia) VALUES (?,?,?,?)";
        $connDb = new ConnectionDB();
        $result = $connDb->executeUpdateData($sql, [
            'type'  => 'ssss',
            'datos' => [
                $entity->get('nombre'),   $entity->get('telefono'),
                $entity->get('correo'),   $entity->get('numero_licencia')
            ]
        ]);
        $connDb->close();
        return $result;
    }

    static function delete($id)
    {
        $sql    = "DELETE FROM clientes WHERE id = ?";
        $connDb = new ConnectionDB();
        $result = $connDb->executeUpdateData($sql, [
            'type'  => 'i',
            'datos' => [$id]
        ]);
        $connDb->close();
        return $result;
    }
}