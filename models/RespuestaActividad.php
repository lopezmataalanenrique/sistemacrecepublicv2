<?php

namespace Model;

class RespuestaActividad extends ActiveRecord {
    protected static $tabla = 'respuestas_actividades';
    
    // ELIMINA 'fecha_registro' de esta lista
    protected static $columnasDB = ['id_res_act', 'id_usuario', 'id_modulo', 'id_actividad', 'id_pregunta_act', 'respuesta'];

    public $id_res_act;
    public $id_usuario;
    public $id_modulo;
    public $id_actividad;
    public $id_pregunta_act;
    public $respuesta;
    // Puedes mantener la propiedad pública si quieres leerla, 
    // pero no debe estar en $columnasDB para que no se intente guardar.
    public $fecha_registro; 

    public function __construct($args = []) {
        $this->id_res_act = $args['id_res_act'] ?? null;
        $this->id_usuario = $args['id_usuario'] ?? '';
        $this->id_modulo = $args['id_modulo'] ?? '';
        $this->id_actividad = $args['id_actividad'] ?? '';
        $this->id_pregunta_act = $args['id_pregunta_act'] ?? '';
        $this->respuesta = $args['respuesta'] ?? '';
    }
}   