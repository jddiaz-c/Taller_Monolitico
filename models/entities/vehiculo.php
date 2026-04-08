<?php
namespace app\models\entities;
use app\models\config\ModelBase;

class Vehiculo extends ModelBase
{
    protected $id       = 0;
    protected $marca    = null;
    protected $modelo   = null;
    protected $anio     = null;
    protected $categoria = null;
    protected $estado   = null;

    public function __construct($id, $marca, $modelo, $anio, $categoria, $estado)
    {
        $this->id        = $id;
        $this->marca     = $marca;
        $this->modelo    = $modelo;
        $this->anio      = $anio;
        $this->categoria = $categoria;
        $this->estado    = $estado;
    }
}