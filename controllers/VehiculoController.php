<?php
namespace app\controllers;
use app\models\queries\VehiculoQuery;
use app\models\entities\Vehiculo;
use app\models\queries\ReservaQuery;

class VehiculoController
{
    public function getLista()
    {
        return VehiculoQuery::getAll();
    }

    public function getDisponibles()
    {
        return VehiculoQuery::getDisponibles();
    }

    public function getVehiculo($id)
    {
        if (empty($id)) return null;
        return VehiculoQuery::find($id);
    }

    public function registrar($datos)
    {
        $vehiculo = new Vehiculo(
            0,
            $datos['marca'],
            $datos['modelo'],
            $datos['anio'],
            $datos['categoria'],
            $datos['estado']
        );
        return VehiculoQuery::create($vehiculo);
    }

    public function cambiarEstado($id, $estado)
    {
        return VehiculoQuery::updateEstado($id, $estado);
    }

    public function eliminar($id)
    {
        if (ReservaQuery::tieneReservasActivasPorVehiculo($id)) {
            return false;
        }
        return VehiculoQuery::delete($id);
    }
}