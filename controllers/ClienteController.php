<?php
namespace app\controllers;
use app\models\queries\ClienteQuery;
use app\models\entities\Cliente;
use app\models\queries\ReservaQuery;
class ClienteController
{
    public function getLista()
    {
        return ClienteQuery::getAll();
    }

    public function getCliente($id)
    {
        if (empty($id)) return null;
        return ClienteQuery::find($id);
    }

    public function registrar($datos)
    {
        $cliente = new Cliente(
            0,
            $datos['nombre'],
            $datos['telefono'],
            $datos['correo'],
            $datos['numero_licencia']
        );
        return ClienteQuery::create($cliente);
    }

    public function eliminar($id)
    {
        if (ReservaQuery::tieneReservasActivasPorCliente($id)) {
            return false;
        }
        return ClienteQuery::delete($id);
    }
}