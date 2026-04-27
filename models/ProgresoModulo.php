<?php

namespace Model;

class ProgresoModulo extends ActiveRecord {
    // Configuración de la tabla
    protected static $tabla = 'progreso_modulos';
    protected static $columna_id = 'id_progreso';
    protected static $columnasDB = [
        'id_progreso', 
        'id_usuario', 
        'id_modulo', 
        'estatus', 
        'actividad_actual', 
        'fecha_desbloqueo', 
        'fecha_finalizacion'
    ];

    // Propiedades
    public $id_progreso;
    public $id_usuario;
    public $id_modulo;
    public $estatus;
    public $actividad_actual;
    public $fecha_desbloqueo;
    public $fecha_finalizacion;

    public function __construct($args = [])
    {
        $this->id_progreso = $args['id_progreso'] ?? null;
        $this->id_usuario = $args['id_usuario'] ?? null;
        $this->id_modulo = $args['id_modulo'] ?? null;
        $this->estatus = $args['estatus'] ?? 'bloqueado';
        $this->actividad_actual = $args['actividad_actual'] ?? 1;
        $this->fecha_desbloqueo = $args['fecha_desbloqueo'] ?? null;
        $this->fecha_finalizacion = $args['fecha_finalizacion'] ?? null;
    }

    /**
     * Obtiene el progreso de un usuario específico para todos los módulos
     * incluyendo el nombre del módulo mediante un JOIN manual si es necesario
     */
    public static function obtenerProgresoPorUsuario($id_usuario) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id_usuario = '" . self::$db->escape_string($id_usuario) . "' ORDER BY id_modulo ASC";
        return self::consultarSQL($query);
    }

    /**
     * Busca el registro específico de un módulo para un usuario
     */
    public static function buscarProgreso($id_usuario, $id_modulo) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id_usuario = '" . self::$db->escape_string($id_usuario) . "' ";
        $query .= " AND id_modulo = '" . self::$db->escape_string($id_modulo) . "' LIMIT 1";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }
}