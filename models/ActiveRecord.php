<?php

namespace Model;

class ActiveRecord
{

    // Base DE DATOS
    protected static $db;
    protected static $tabla = '';
    protected static $columna_id = 'id';
    protected static $columnasDB = [];

    // Alertas y Mensajes
    protected static $alertas = [];

    // Definir la conexión a la BD - includes/database.php
    public static function setDB($database)
    {
        self::$db = $database;
    }

    // Método para obtener la instancia de la conexión a la base de datos
    public static function getDB()
    {
        return self::$db;
    }

    public static function setAlerta($tipo, $mensaje)
    {
        static::$alertas[$tipo][] = $mensaje;
    }

    // Validación
    public static function getAlertas()
    {
        return static::$alertas;
    }

    public function validar()
    {
        static::$alertas = [];
        return static::$alertas;
    }

    // Consulta SQL para crear un objeto en Memoria
    public static function consultarSQL($query)
    {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // liberar la memoria
        $resultado->free();

        // retornar los resultados
        return $array;
    }

    // Crea el objeto en memoria que es igual al de la BD
    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Identificar y unir los atributos de la BD
    public function atributos()
    {
        $atributos = [];
        $id_col = static::$columna_id;

        foreach (static::$columnasDB as $columna) {

            if ($columna === $id_col) continue;

            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizar los datos antes de guardarlos en la BD
    // En ActiveRecord.php
    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            // COMENTA O ELIMINA ESTA LÍNEA: $value = $value ?? ''; 

            // Si el valor es null, lo dejamos pasar como null, 
            // de lo contrario lo escapamos normalmente.
            $sanitizado[$key] = is_null($value) ? null : self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Sincroniza BD con Objetos en memoria
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    // Registros - CRUD
    public function guardar()
    {
        $resultado = '';
        $id_col = static::$columna_id;
        if (!is_null($this->$id_col)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    // Todos los registros
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id)
    {
        $id_col = static::$columna_id;
        $query = "SELECT * FROM " . static::$tabla  . " WHERE {$id_col} = {$id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // Busca un registro por su id
    public static function where($columna, $valor)
    {
        $query = "SELECT * FROM " . static::$tabla  . " WHERE {$columna} = '{$valor}'";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // Obtener Registros con cierta cantidad
    public static function get($limite)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // crea un nuevo registro
    public function crear()
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Preparar los valores para la consulta
        $valores = [];
        foreach ($atributos as $value) {
            if (is_null($value)) {
                $valores[] = "NULL"; // Sin comillas si es nulo
            } else {
                $valores[] = "'$value'"; // Con comillas si es texto
            }
        }

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ( ";
        $query .= join(", ", $valores);
        $query .= " ) ";

        // Resultado de la consulta
        $resultado = self::$db->query($query);
        return [
            'resultado' =>  $resultado,
            'id' => self::$db->insert_id
        ];
    }

    // Actualizar el registro
    // En ActiveRecord.php
    public function actualizar()
    {
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            if (is_null($value)) {
                $valores[] = "{$key}=NULL"; // Sin comillas para valores NULL
            } else {
                $valores[] = "{$key}='{$value}'"; // Con comillas para strings
            }
        }

        $id_col = static::$columna_id;

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .=  join(', ', $valores);
        $query .= " WHERE {$id_col} = '" . self::$db->escape_string($this->$id_col) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);
        return $resultado;
    }

    // Eliminar un Registro por su ID
    public function eliminar()
    {
        $id_col = static::$columna_id;
        $query = "DELETE FROM "  . static::$tabla . " WHERE {$id_col} = " . self::$db->escape_string($this->$id_col) . " LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    // Obtener la suma total de puntaje para un cuestionario específico de un usuario
    public static function sumarPuntajeCuestionario($id_usuario, $id_cuestionario)
    {
        // Escapar datos para seguridad
        $id_usuario = self::$db->escape_string($id_usuario);
        $id_cuestionario = self::$db->escape_string($id_cuestionario);

        $query = "SELECT SUM(r.valor_final_puntaje) AS total ";
        $query .= "FROM encuestas_usuario e ";
        $query .= "JOIN respuestas r ON e.id_encuesta = r.id_encuesta ";
        $query .= "WHERE e.id_usuario = '{$id_usuario}' ";
        $query .= "AND e.id_cuestionario = '{$id_cuestionario}'";

        $resultado = self::$db->query($query);
        $registro = $resultado->fetch_assoc();

        // Retornar el total como entero, o 0 si no hay registros
        return (int) ($registro['total'] ?? 0);
    }
}
