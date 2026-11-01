<?php

namespace Model;

class PersonalCrece extends ActiveRecord
{
    protected static $tabla = 'personal_crece';
    protected static $columna_id = 'id_personal';
    protected static $columnasDB = ['id_personal', 'usuario', 'password_hash', 'id_rol', 'nombre_completo', 'activo', 'fecha_creacion'];

    public $id_personal;
    public $usuario;
    public $password;
    public $password_hash;
    public $id_rol;
    public $nombre_completo;
    public $activo;
    public $fecha_creacion;
    public $password_confirm;

    public function __construct($args = [])
    {
        $this->id_personal = $args['id_personal'] ?? null;
        $this->usuario = $args['usuario'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password_confirm = $args['password_confirm'] ?? '';
        $this->password_hash = $args['password_hash'] ?? '';
        $this->id_rol = $args['id_rol'] ?? null;
        $this->nombre_completo = $args['nombre_completo'] ?? '';
        $this->activo = $args['activo'] ?? 1;
        $this->fecha_creacion = $args['fecha_creacion'] ?? date('Y-m-d H:i:s');
    }

    public function validarLogin()
    {
        if (!$this->usuario) {
            self::$alertas['error'][] = 'El usuario es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }
        return self::$alertas;
    }

    public function comprobarPasswordAndActivo($password_plana)
    {
        // 1. Verificamos que la contraseña coincida con el hash de la BD
        $resultado = password_verify($password_plana, $this->password_hash);

        if (!$resultado) {
            self::$alertas['error'][] = 'La contraseña es incorrecta';
            return false;
        }

        // 2. Verificamos que la cuenta no haya sido desactivada
        if ($this->activo != 1) {
            self::$alertas['error'][] = 'Esta cuenta ha sido desactivada. Contacta al administrador.';
            return false;
        }

        return true;
    }

    // Valida los campos al crear un nuevo psicólogo/admin
    public function validarNuevaCuenta()
    {
        if (!$this->nombre_completo) {
            self::$alertas['error'][] = 'El Nombre Completo es obligatorio';
        }
        if (!$this->usuario) {
            self::$alertas['error'][] = 'El Nombre de Usuario es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'La Contraseña es obligatoria';
        }
        // Validamos que tenga al menos 8 caracteres (Opcional, pero muy recomendado)
        if ($this->password && strlen($this->password) < 8) {
            self::$alertas['error'][] = 'La Contraseña debe contener al menos 8 caracteres';
        }
        // Verificamos que ambas contraseñas coincidan
        if ($this->password !== $this->password_confirm) {
            self::$alertas['error'][] = 'Las contraseñas no coinciden';
        }
        if (!$this->id_rol) {
            self::$alertas['error'][] = 'Debes seleccionar un Rol';
        }
        return self::$alertas;
    }

    public function existeUsuario()
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE usuario = '" . $this->usuario . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El Nombre de Usuario ya está registrado';
        }
        return $resultado;
    }

    public function hashPassword()
    {
        $this->password_hash = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Valida los campos al actualizar (La contraseña es opcional)
    public function validarActualizarCuenta()
    {
        if (!$this->nombre_completo) {
            self::$alertas['error'][] = 'El Nombre Completo es obligatorio';
        }
        if (!$this->usuario) {
            self::$alertas['error'][] = 'El Nombre de Usuario es obligatorio';
        }
        if (!$this->id_rol) {
            self::$alertas['error'][] = 'Debes seleccionar un Rol';
        }

        // Solo validamos la contraseña si el administrador escribió algo
        if ($this->password) {
            if (strlen($this->password) < 8) {
                self::$alertas['error'][] = 'La Contraseña debe contener al menos 8 caracteres';
            }
            if ($this->password !== $this->password_confirm) {
                self::$alertas['error'][] = 'Las contraseñas no coinciden';
            }
        }
        return self::$alertas;
    }

    // Verifica que el usuario no exista, EXCLUYENDO al usuario actual
    public function existeUsuarioActualizar($id_actual)
    {
        $id_col = static::$columna_id; // Usamos tu variable dinámica

        $query = "SELECT * FROM " . self::$tabla . " WHERE usuario = '" . $this->usuario . "' AND {$id_col} != {$id_actual} LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'Ese Nombre de Usuario ya está en uso por otra persona';
        }
        return $resultado;
    }

    // OBTENER MÉTRICAS DE PERSONAL (Solo Admin)
    public static function obtenerMetricasPersonal()
    {
        $db = self::$db;
        $metricas = [
            'total_personal' => 0,
            'activos' => 0,
            'inactivos' => 0
        ];

        // Agrupamos por la columna 'activo' (1 = activo, 0 = inactivo)
        $query = "SELECT activo, COUNT(*) as total FROM " . self::$tabla . " GROUP BY activo";
        $resultado = $db->query($query);

        if ($resultado) {
            while ($row = $resultado->fetch_assoc()) {
                // Sumamos al total general
                $metricas['total_personal'] += $row['total'];

                // Separamos entre activos e inactivos
                if ($row['activo'] === '1' || $row['activo'] === 1) {
                    $metricas['activos'] = $row['total'];
                } else {
                    $metricas['inactivos'] = $row['total'];
                }
            }
        }

        return $metricas;
    }
}
