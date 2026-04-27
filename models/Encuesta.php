<?php

namespace Model;

class Encuesta extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'encuestas_usuario';
    protected static $columna_id = 'id_encuesta';
    protected static $columnasDB = ['id_encuesta', 'id_usuario', 'id_cuestionario', 'id_tipo', 'fecha_encuesta'];

    public $id_encuesta;
    public $id_usuario;
    public $id_cuestionario;
    public $id_tipo;
    public $fecha_encuesta;

    public function __construct( $args = [] ) {
        $this->id_encuesta = $args['id_encuesta'] ?? null;
        $this->id_usuario = $args['id_usuario'] ?? null;
        $this->id_cuestionario = $args['id_cuestionario'] ?? null;
        $this->id_tipo = $args['id_tipo'] ?? null;
        $this->fecha_encuesta = $args['fecha_encuesta'] ?? date('Y-m-d H:i:s');
    }

}