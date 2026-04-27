<?php

namespace Model;

class Respuesta extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'respuestas';
    protected static $columna_id = 'id_respuesta';
    protected static $columnasDB = ['id_respuesta', 'id_encuesta', 'id_pregunta', 'id_opcion_seleccionada', 'respuesta_texto', 'valor_final_puntaje'];

    public $id_respuesta;
    public $id_encuesta;
    public $id_pregunta;
    public $id_opcion_seleccionada;
    public $respuesta_texto;
    public $valor_final_puntaje;

    public function __construct($args = []) {
        $this->id_respuesta = $args['id_respuesta'] ?? null;
        $this->id_encuesta = $args['id_encuesta'] ?? null;
        $this->id_pregunta = $args['id_pregunta'] ?? null;
        $this->id_opcion_seleccionada = $args['id_opcion_seleccionada'] ?? null;
        $this->respuesta_texto = $args['respuesta_texto'] ?? null;
        $this->valor_final_puntaje = $args['valor_final_puntaje'] ?? 0;
    }
}