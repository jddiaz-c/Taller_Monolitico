<?php
namespace app\models\entities;
use app\models\config\ModelBase;

class Cliente extends ModelBase
{
    protected $id              = 0;
    protected $nombre          = null;
    protected $telefono        = null;
    protected $correo          = null;
    protected $numero_licencia = null;

    public function __construct($id, $nombre, $telefono, $correo, $numero_licencia)
    {
        $this->id              = $id;
        $this->nombre          = $nombre;
        $this->telefono        = $telefono;
        $this->correo          = $correo;
        $this->numero_licencia = $numero_licencia;
    }
}