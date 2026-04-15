<?php
namespace app\controllers;
use app\models\queries\ReservaQuery;
use app\models\queries\VehiculoQuery;
use app\models\entities\Reserva;

class ReservaController
{
    public function getLista()
    {
        return ReservaQuery::getAll();
    }

    public function registrar($datos)
    {
        $reserva = new Reserva(
            0,
            $datos['cliente_id'],
            $datos['vehiculo_id'],
            $datos['fecha_inicio'],
            $datos['fecha_fin'],
            'activa'
        );
        $resultado = ReservaQuery::create($reserva);

        if ($resultado) {
            VehiculoQuery::updateEstado($datos['vehiculo_id'], 'alquilado');
        }
        return $resultado;
    }

    public function completar($id, $vehiculo_id)
    {
        $resultado = ReservaQuery::updateEstado($id, 'completada');

        if ($resultado) {
            VehiculoQuery::updateEstado($vehiculo_id, 'disponible');
        }

        return $resultado;
    }

    public function cancelar($id, $vehiculo_id)
    {
        $resultado = ReservaQuery::updateEstado($id, 'cancelada');

        if ($resultado) {
            VehiculoQuery::updateEstado($vehiculo_id, 'disponible');
        }

        return $resultado;
    }
    public function getActivas()
    {
        return ReservaQuery::getActivas();
    }

    public function getHistorial($vehiculo_id = null, $cliente_id = null)
    {
        return ReservaQuery::getHistorial($vehiculo_id, $cliente_id);
    }
}