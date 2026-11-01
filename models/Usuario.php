<?php

namespace Model;

use DateTime;

class Usuario extends ActiveRecord
{
    // Base de datos
    protected static $tabla =  'usuarios';
    protected static $columna_id = 'id_usuario';
    protected static $columnasDB = ['id_usuario', 'nombre', 'apellido_paterno', 'email', 'email_alt', 'password_hash', 'id_sexo', 'fecha_nac', 'confirmado', 'condicion_cronica', 'id_tratamiento', 'supervision_medica', 'id_cuestionario_pendiente', 'id_estatus', 'fecha_creacion', 'token', 'fecha_token'];

    public $id_usuario;
    public $nombre;
    public $apellido_paterno;
    public $email;
    public $email_alt;
    public $password;
    public $password_confirm;
    public $password_hash;
    public $id_sexo;
    public $fecha_nac;
    public $confirmado;
    public $condicion_cronica;
    public $id_tratamiento;
    public $supervision_medica;
    public $id_cuestionario_pendiente;
    public $id_estatus;
    public $fecha_creacion;
    public $token;
    public $fecha_token;
    public $terminos;

    public function __construct($args = [])
    {
        $this->id_usuario = $args['id_usuario'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
        $this->apellido_paterno = $args['apellido_paterno'] ?? null;
        $this->email = $args['email'] ?? null;
        $this->email_alt = $args['email_alt'] ?? null;
        $this->password = $args['password'] ?? null;
        $this->password_confirm = $args['password_confirm'] ?? null;
        $this->password_hash = $args['password_hash'] ?? null;
        $this->id_sexo = $args['id_sexo'] ?? null;
        $this->fecha_nac = $args['fecha_nac'] ?? null;
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->condicion_cronica = $args['condicion_cronica'] ?? null;
        $this->id_tratamiento = $args['id_tratamiento'] ?? null;
        $this->supervision_medica = $args['supervision_medica'] ?? null;
        $this->id_cuestionario_pendiente = $args['id_cuestionario_pendiente'] ?? 1;
        $this->id_estatus = $args['id_estatus'] ?? 1;
        $this->fecha_creacion = $args['fecha_creacion'] ?? date('Y-m-d H:i:s');
        $this->token = $args['token'] ?? null;
        $this->fecha_token = $args['fecha_token'] ?? null;
        $this->terminos = $args['terminos'] ?? null;
    }

    public function validarNuevaCuenta()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if (!$this->apellido_paterno) {
            self::$alertas['error'][] = 'El apellido paterno es obligatorio';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'El correo principal es obligatorio';
        } else {
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                self::$alertas['error'][] = 'El formato del correo principal no es válido';
            }
        }
        if (!$this->email_alt) {
            self::$alertas['error'][] = 'El correo alternativo es obligatorio';
        } else {
            if (!filter_var($this->email_alt, FILTER_VALIDATE_EMAIL)) {
                self::$alertas['error'][] = 'El formato del correo alternativo no es válido';
            }
            if ($this->email_alt === $this->email) {
                self::$alertas['error'][] = 'El correo alternativo no puede ser igual al correo principal';
            }
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        } else {
            // Validar longitud mínima de la clave
            if (strlen($this->password) < 8) {
                self::$alertas['error'][] = 'La contraseña debe tener al menos 8 caracteres';
            }
            // Debe contener al menos una mayúscula
            if (!preg_match('/[A-Z]/', $this->password)) {
                self::$alertas['error'][] = 'La contraseña debe contener al menos una letra mayúscula';
            }
            // Debe contener al menos una minúscula
            if (!preg_match('/[a-z]/', $this->password)) {
                self::$alertas['error'][] = 'La contraseña debe contener al menos una letra minúscula';
            }
            // Debe contener al menos un número
            if (!preg_match('/[0-9]/', $this->password)) {
                self::$alertas['error'][] = 'La contraseña debe contener al menos un número';
            }
            // Debe contener al menos un carácter especial
            if (!preg_match('/[\W_]/', $this->password)) {
                self::$alertas['error'][] = 'La contraseña debe contener al menos un carácter especial (por ejemplo: !@#$%^&*)';
            }
        }

        if (!$this->password_confirm) {
            self::$alertas['error'][] = 'La confirmación de la contraseña es obligatoria';
        } else {
            if ($this->password !== $this->password_confirm) {
                self::$alertas['error'][] = 'Las contraseñas no coinciden';
            }
        }

        if ($this->id_sexo === '') {
            self::$alertas['error'][] = 'Debe especificar su sexo';
        }

        if (!$this->fecha_nac) {
            self::$alertas['error'][] = 'La fecha de nacimiento es obligatoria';
        }

        if ($this->condicion_cronica === null) {
            self::$alertas['error'][] = 'Debe especificar si padece alguna condición crónica';
        } elseif ($this->condicion_cronica === '0') {
            // FORZAR: Si no padece condición crónica, el tratamiento es 4
            $this->id_tratamiento = 4;
        }

        // Ahora evaluamos id_tratamiento. Si forzamos el 4 arriba, pasará esta prueba sin problema.
        if ($this->id_tratamiento === null || $this->id_tratamiento === '') {
            self::$alertas['error'][] = 'Debe especificar el tipo de tratamiento que recibe';
        }

        if ($this->supervision_medica === null) {
            self::$alertas['error'][] = 'Debe especificar si se encuentra bajo supervisión médica';
        }

        if (!isset($_POST['terminos'])) {
            self::$alertas['error'][] = 'Debes leer y aceptar el Consentimiento Informado y el Aviso de Privacidad para continuar';
        }

        return self::$alertas;
    }

    public function validarEdad()
    {
        $fechaNacimiento = new DateTime($this->fecha_nac);
        $hoy = new DateTime();
        $diferencia = $fechaNacimiento->diff($hoy);
        $edad = $diferencia->y;
        if ($edad < 18) {
            return false;
        } else {
            return true;
        }
    }

    public function validarLogin()
    {
        if (!$this->email) {
            self::$alertas['error'][] = 'El correo es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }
        return self::$alertas;
    }

    public function validarEmail()
    {
        if (!$this->email) {
            self::$alertas['error'][] = 'El correo es obligatorio';
        } else {
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                self::$alertas['error'][] = 'El formato del correo electrónico no es válido';
            }
        }
        return self::$alertas;
    }

    public function validarPassword()
    {

        if (!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        } else {
            // Validar longitud mínima de la clave
            if (strlen($this->password) < 8) {
                self::$alertas['error'][] = 'La contraseña debe tener al menos 8 caracteres';
            }
            // Debe contener al menos una mayúscula
            if (!preg_match('/[A-Z]/', $this->password)) {
                self::$alertas['error'][] = 'La contraseña debe contener al menos una letra mayúscula';
            }
            // Debe contener al menos una minúscula
            if (!preg_match('/[a-z]/', $this->password)) {
                self::$alertas['error'][] = 'La contraseña debe contener al menos una letra minúscula';
            }
            // Debe contener al menos un número
            if (!preg_match('/[0-9]/', $this->password)) {
                self::$alertas['error'][] = 'La contraseña debe contener al menos un número';
            }
            // Debe contener al menos un carácter especial
            if (!preg_match('/[\W_]/', $this->password)) {
                self::$alertas['error'][] = 'La contraseña debe contener al menos un carácter especial (por ejemplo: !@#$%^&*)';
            }
        }

        if (!$this->password_confirm) {
            self::$alertas['error'][] = 'La confirmación de la contraseña es obligatoria';
        } else {
            if ($this->password !== $this->password_confirm) {
                self::$alertas['error'][] = 'Las contraseñas no coinciden';
            }
        }

        return self::$alertas;
    }

    public function existeUsuario()
    {
        // Buscamos al usuario por email
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            $usuario = $resultado->fetch_object();

            // Lógica para Estatus 5 (Menor de edad canalizado)
            if ($usuario->id_estatus === '5') {

                // Verificamos la edad con la fecha que acaba de ingresar en el formulario
                if ($this->validarEdad()) {
                    // Si ya es mayor de edad, borramos el registro viejo para liberar el correo
                    $queryEliminar = "DELETE FROM " . self::$tabla . " WHERE id_usuario = " . $usuario->id_usuario;
                    self::$db->query($queryEliminar);

                    // Retornamos false para que el flujo de crear() proceda como registro nuevo
                    return false;
                } else {
                    // Si sigue siendo menor de edad, lo mandamos a la vista de "No Apto"
                    header('Location: /menorEdad');
                    exit; // Detenemos la ejecución para asegurar la redirección
                }
            }

            // LÓGICA ESTATUS 6 (CANALIZADO POR TRATAMIENTO)
            if ($usuario->id_estatus === '6') {
                // Creamos una instancia temporal para usar el método de antigüedad
                $tempUser = new self(['fecha_creacion' => $usuario->fecha_creacion]);

                if ($tempUser->verificarAntiguedad()) {
                    // Si ya pasaron 4 meses, liberamos la cuenta (borramos)
                    $queryEliminar = "DELETE FROM " . self::$tabla . " WHERE id_usuario = " . $usuario->id_usuario;
                    self::$db->query($queryEliminar);
                    return false;
                } else {
                    // Si no han pasado 4 meses, lo mandamos a la pantalla informativa
                    header('Location: /tipoTratamiento');
                    exit;
                }
            }

            // Si existe y NO es estatus 5 (es un usuario ya registrado anteriormente)
            self::$alertas['error'][] = 'El usuario ya está registrado';
            return $resultado;
        }

        return false;
    }

    public function hashPassword()
    {
        $this->password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $this->password = null;
        $this->password_confirm = null;
    }

    public function crearToken()
    {
        $this->token = uniqid();
        $this->fecha_token = date('Y-m-d H:i:s');
    }

    public function tokenCaducado()
    {
        if (!$this->fecha_token) return true;

        $fechaToken = new DateTime($this->fecha_token);
        $hoy = new DateTime();
        $diferencia = $fechaToken->diff($hoy);

        // Calculamos el total de horas
        $horas = ($diferencia->days * 24) + $diferencia->h;

        return $horas >= 48;
    }

    public function comprobarPasswordyConfirmado($password)
    {
        $resultado = password_verify($password, $this->password_hash);
        if (!$resultado || !$this->confirmado) {
            self::$alertas['error'][] = 'Contraseña es incorrecta o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }
    }

    public function verificarAntiguedad()
    {
        if (!$this->fecha_creacion) return false;

        $fecha_registro = new DateTime($this->fecha_creacion);
        $hoy = new DateTime();
        $diferencia = $hoy->diff($fecha_registro);

        // Calculamos el total de meses
        $meses = ($diferencia->y * 12) + $diferencia->m;

        return $meses >= 4;
    }

    // SQL para consultar usuarios
    public static function obtenerReporteCompleto()
    {
        $query = "SELECT 
            u.id_usuario,
            sx.nombre_sexo AS sexo,
            u.fecha_nac,
            u.condicion_cronica,
            u.id_tratamiento,
            u.id_estatus,
            u.fecha_creacion,

            -- =========================================================
            -- SOCIODEMOGRÁFICO (ID 2 | Solo Inicial)
            -- =========================================================
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=101 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_101,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=102 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_102,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=103 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_103,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=104 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_104,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=105 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_105,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=106 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_106,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=107 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_107,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=108 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_108,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=109 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_109,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=110 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_110,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=111 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_111,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=112 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_112,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=113 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_113,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=114 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_114,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=115 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_115,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=116 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_116,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=117 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_117,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=118 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_118,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=119 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_119,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=120 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_120,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=121 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_121,
            MAX(CASE WHEN eu.id_cuestionario=2 AND r.id_pregunta=122 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SOC_I_122,

            -- =========================================================
            -- PSS-10 (ID 3 | Inicial y Final)
            -- =========================================================
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=1 AND r.id_pregunta=201 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_I_201,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=1 AND r.id_pregunta=202 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_I_202,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=1 AND r.id_pregunta=203 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_I_203,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=1 AND r.id_pregunta=204 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_I_204,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=1 AND r.id_pregunta=205 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_I_205,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=1 AND r.id_pregunta=206 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_I_206,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=1 AND r.id_pregunta=207 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_I_207,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=1 AND r.id_pregunta=208 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_I_208,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=1 AND r.id_pregunta=209 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_I_209,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=1 AND r.id_pregunta=210 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_I_210,
            
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=3 AND r.id_pregunta=201 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_F_201,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=3 AND r.id_pregunta=202 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_F_202,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=3 AND r.id_pregunta=203 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_F_203,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=3 AND r.id_pregunta=204 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_F_204,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=3 AND r.id_pregunta=205 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_F_205,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=3 AND r.id_pregunta=206 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_F_206,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=3 AND r.id_pregunta=207 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_F_207,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=3 AND r.id_pregunta=208 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_F_208,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=3 AND r.id_pregunta=209 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_F_209,
            MAX(CASE WHEN eu.id_cuestionario=3 AND eu.id_tipo=3 AND r.id_pregunta=210 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PSS_F_210,

            -- =========================================================
            -- MINI (ID 4 | Inicial y Final)
            -- =========================================================
            MAX(CASE WHEN eu.id_cuestionario=4 AND eu.id_tipo=1 AND r.id_pregunta=301 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MIN_I_301,
            MAX(CASE WHEN eu.id_cuestionario=4 AND eu.id_tipo=1 AND r.id_pregunta=302 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MIN_I_302,
            MAX(CASE WHEN eu.id_cuestionario=4 AND eu.id_tipo=1 AND r.id_pregunta=303 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MIN_I_303,
            MAX(CASE WHEN eu.id_cuestionario=4 AND eu.id_tipo=1 AND r.id_pregunta=304 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MIN_I_304,
            MAX(CASE WHEN eu.id_cuestionario=4 AND eu.id_tipo=1 AND r.id_pregunta=305 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MIN_I_305,
            MAX(CASE WHEN eu.id_cuestionario=4 AND eu.id_tipo=1 AND r.id_pregunta=306 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MIN_I_306,

            MAX(CASE WHEN eu.id_cuestionario=4 AND eu.id_tipo=3 AND r.id_pregunta=301 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MIN_F_301,
            MAX(CASE WHEN eu.id_cuestionario=4 AND eu.id_tipo=3 AND r.id_pregunta=302 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MIN_F_302,
            MAX(CASE WHEN eu.id_cuestionario=4 AND eu.id_tipo=3 AND r.id_pregunta=303 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MIN_F_303,
            MAX(CASE WHEN eu.id_cuestionario=4 AND eu.id_tipo=3 AND r.id_pregunta=304 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MIN_F_304,
            MAX(CASE WHEN eu.id_cuestionario=4 AND eu.id_tipo=3 AND r.id_pregunta=305 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MIN_F_305,
            MAX(CASE WHEN eu.id_cuestionario=4 AND eu.id_tipo=3 AND r.id_pregunta=306 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MIN_F_306,

            -- =========================================================
            -- PHQ-9 (ID 5 | Inicial y Final)
            -- =========================================================
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=1 AND r.id_pregunta=401 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_I_401,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=1 AND r.id_pregunta=402 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_I_402,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=1 AND r.id_pregunta=403 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_I_403,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=1 AND r.id_pregunta=404 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_I_404,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=1 AND r.id_pregunta=405 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_I_405,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=1 AND r.id_pregunta=406 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_I_406,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=1 AND r.id_pregunta=407 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_I_407,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=1 AND r.id_pregunta=408 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_I_408,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=1 AND r.id_pregunta=409 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_I_409,

            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=3 AND r.id_pregunta=401 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_F_401,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=3 AND r.id_pregunta=402 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_F_402,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=3 AND r.id_pregunta=403 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_F_403,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=3 AND r.id_pregunta=404 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_F_404,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=3 AND r.id_pregunta=405 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_F_405,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=3 AND r.id_pregunta=406 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_F_406,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=3 AND r.id_pregunta=407 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_F_407,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=3 AND r.id_pregunta=408 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_F_408,
            MAX(CASE WHEN eu.id_cuestionario=5 AND eu.id_tipo=3 AND r.id_pregunta=409 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS PHQ_F_409,

            -- =========================================================
            -- GAD-7 (ID 6 | Inicial y Final)
            -- =========================================================
            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=1 AND r.id_pregunta=501 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_I_501,
            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=1 AND r.id_pregunta=502 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_I_502,
            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=1 AND r.id_pregunta=503 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_I_503,
            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=1 AND r.id_pregunta=504 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_I_504,
            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=1 AND r.id_pregunta=505 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_I_505,
            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=1 AND r.id_pregunta=506 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_I_506,
            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=1 AND r.id_pregunta=507 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_I_507,

            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=3 AND r.id_pregunta=501 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_F_501,
            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=3 AND r.id_pregunta=502 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_F_502,
            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=3 AND r.id_pregunta=503 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_F_503,
            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=3 AND r.id_pregunta=504 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_F_504,
            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=3 AND r.id_pregunta=505 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_F_505,
            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=3 AND r.id_pregunta=506 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_F_506,
            MAX(CASE WHEN eu.id_cuestionario=6 AND eu.id_tipo=3 AND r.id_pregunta=507 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS GAD_F_507,

            -- =========================================================
            -- AAQ-II (ID 7 | Inicial y Final)
            -- =========================================================
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=1 AND r.id_pregunta=601 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_I_601,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=1 AND r.id_pregunta=602 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_I_602,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=1 AND r.id_pregunta=603 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_I_603,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=1 AND r.id_pregunta=604 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_I_604,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=1 AND r.id_pregunta=605 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_I_605,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=1 AND r.id_pregunta=606 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_I_606,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=1 AND r.id_pregunta=607 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_I_607,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=1 AND r.id_pregunta=608 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_I_608,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=1 AND r.id_pregunta=609 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_I_609,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=1 AND r.id_pregunta=610 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_I_610,

            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=3 AND r.id_pregunta=601 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_F_601,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=3 AND r.id_pregunta=602 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_F_602,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=3 AND r.id_pregunta=603 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_F_603,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=3 AND r.id_pregunta=604 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_F_604,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=3 AND r.id_pregunta=605 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_F_605,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=3 AND r.id_pregunta=606 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_F_606,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=3 AND r.id_pregunta=607 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_F_607,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=3 AND r.id_pregunta=608 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_F_608,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=3 AND r.id_pregunta=609 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_F_609,
            MAX(CASE WHEN eu.id_cuestionario=7 AND eu.id_tipo=3 AND r.id_pregunta=610 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS AAQ_F_610,

            -- =========================================================
            -- WHO-5 (ID 8 | Inicial y Final)
            -- =========================================================
            MAX(CASE WHEN eu.id_cuestionario=8 AND eu.id_tipo=1 AND r.id_pregunta=701 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHO_I_701,
            MAX(CASE WHEN eu.id_cuestionario=8 AND eu.id_tipo=1 AND r.id_pregunta=702 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHO_I_702,
            MAX(CASE WHEN eu.id_cuestionario=8 AND eu.id_tipo=1 AND r.id_pregunta=703 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHO_I_703,
            MAX(CASE WHEN eu.id_cuestionario=8 AND eu.id_tipo=1 AND r.id_pregunta=704 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHO_I_704,
            MAX(CASE WHEN eu.id_cuestionario=8 AND eu.id_tipo=1 AND r.id_pregunta=705 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHO_I_705,

            MAX(CASE WHEN eu.id_cuestionario=8 AND eu.id_tipo=3 AND r.id_pregunta=701 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHO_F_701,
            MAX(CASE WHEN eu.id_cuestionario=8 AND eu.id_tipo=3 AND r.id_pregunta=702 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHO_F_702,
            MAX(CASE WHEN eu.id_cuestionario=8 AND eu.id_tipo=3 AND r.id_pregunta=703 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHO_F_703,
            MAX(CASE WHEN eu.id_cuestionario=8 AND eu.id_tipo=3 AND r.id_pregunta=704 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHO_F_704,
            MAX(CASE WHEN eu.id_cuestionario=8 AND eu.id_tipo=3 AND r.id_pregunta=705 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHO_F_705,

            -- =========================================================
            -- SCS (ID 9 | Inicial y Final)
            -- =========================================================
            MAX(CASE WHEN eu.id_cuestionario=9 AND eu.id_tipo=1 AND r.id_pregunta=801 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SCS_I_801,
            MAX(CASE WHEN eu.id_cuestionario=9 AND eu.id_tipo=1 AND r.id_pregunta=802 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SCS_I_802,
            MAX(CASE WHEN eu.id_cuestionario=9 AND eu.id_tipo=1 AND r.id_pregunta=803 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SCS_I_803,

            MAX(CASE WHEN eu.id_cuestionario=9 AND eu.id_tipo=3 AND r.id_pregunta=801 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SCS_F_801,
            MAX(CASE WHEN eu.id_cuestionario=9 AND eu.id_tipo=3 AND r.id_pregunta=802 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SCS_F_802,
            MAX(CASE WHEN eu.id_cuestionario=9 AND eu.id_tipo=3 AND r.id_pregunta=803 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS SCS_F_803,
            -- =========================================================
            -- WHOQOL-BREF (ID 10 | Inicial y Final) - 26 ítems (901 a 926)
            -- =========================================================
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=901 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_901,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=902 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_902,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=903 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_903,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=904 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_904,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=905 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_905,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=906 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_906,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=907 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_907,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=908 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_908,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=909 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_909,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=910 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_910,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=911 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_911,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=912 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_912,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=913 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_913,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=914 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_914,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=915 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_915,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=916 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_916,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=917 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_917,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=918 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_918,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=919 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_919,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=920 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_920,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=921 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_921,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=922 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_922,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=923 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_923,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=924 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_924,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=925 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_925,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=1 AND r.id_pregunta=926 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_I_926,

            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=901 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_901,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=902 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_902,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=903 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_903,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=904 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_904,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=905 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_905,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=906 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_906,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=907 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_907,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=908 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_908,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=909 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_909,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=910 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_910,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=911 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_911,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=912 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_912,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=913 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_913,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=914 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_914,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=915 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_915,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=916 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_916,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=917 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_917,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=918 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_918,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=919 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_919,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=920 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_920,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=921 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_921,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=922 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_922,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=923 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_923,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=924 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_924,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=925 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_925,
            MAX(CASE WHEN eu.id_cuestionario=10 AND eu.id_tipo=3 AND r.id_pregunta=926 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS WHOQ_F_926,

            -- =========================================================
            -- APOI (ID 12 | Inicial y Final) - 7 ítems (1001 a 1007)
            -- =========================================================
            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=1 AND r.id_pregunta=1001 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_I_1001,
            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=1 AND r.id_pregunta=1002 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_I_1002,
            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=1 AND r.id_pregunta=1003 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_I_1003,
            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=1 AND r.id_pregunta=1004 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_I_1004,
            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=1 AND r.id_pregunta=1005 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_I_1005,
            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=1 AND r.id_pregunta=1006 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_I_1006,
            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=1 AND r.id_pregunta=1007 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_I_1007,

            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=3 AND r.id_pregunta=1001 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_F_1001,
            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=3 AND r.id_pregunta=1002 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_F_1002,
            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=3 AND r.id_pregunta=1003 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_F_1003,
            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=3 AND r.id_pregunta=1004 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_F_1004,
            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=3 AND r.id_pregunta=1005 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_F_1005,
            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=3 AND r.id_pregunta=1006 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_F_1006,
            MAX(CASE WHEN eu.id_cuestionario=12 AND eu.id_tipo=3 AND r.id_pregunta=1007 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS APOI_F_1007,

            -- =========================================================
            -- MAAS (ID 11 | Inicial y Final) - 15 ítems (1101 a 1115)
            -- =========================================================
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1101 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1101,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1102 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1102,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1103 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1103,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1104 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1104,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1105 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1105,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1106 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1106,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1107 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1107,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1108 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1108,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1109 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1109,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1110 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1110,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1111 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1111,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1112 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1112,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1113 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1113,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1114 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1114,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=1 AND r.id_pregunta=1115 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_I_1115,

            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1101 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1101,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1102 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1102,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1103 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1103,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1104 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1104,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1105 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1105,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1106 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1106,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1107 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1107,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1108 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1108,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1109 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1109,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1110 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1110,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1111 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1111,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1112 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1112,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1113 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1113,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1114 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1114,
            MAX(CASE WHEN eu.id_cuestionario=11 AND eu.id_tipo=3 AND r.id_pregunta=1115 THEN COALESCE(r.id_opcion_seleccionada%100, r.respuesta_texto) END) AS MAAS_F_1115

        FROM usuarios u
        LEFT JOIN cat_sexos sx ON u.id_sexo = sx.id_sexo    
        LEFT JOIN encuestas_usuario eu ON u.id_usuario = eu.id_usuario
        LEFT JOIN respuestas r ON eu.id_encuesta = r.id_encuesta
        
        -- CAMBIO 1: Expandimos el GROUP BY con todas las columnas seleccionadas
        GROUP BY 
            u.id_usuario,
            u.nombre,
            u.apellido_paterno,
            u.email,
            sx.nombre_sexo,
            u.fecha_nac,
            u.condicion_cronica,
            u.id_tratamiento,
            u.id_estatus,
            u.fecha_creacion";

        // CAMBIO 2: Atrapamos el error para que PHP nos diga qué columna está fallando
        try {
            $resultado = self::$db->query($query);

            $datos = [];
            while ($fila = $resultado->fetch_assoc()) {
                $datos[] = $fila;
            }

            return $datos;
        } catch (\Exception $e) {
            // Si la consulta explota, detenemos todo y mostramos el error de MySQL en pantalla
            echo "<div style='background: #f8d7da; color: #721c24; padding: 20px; margin: 20px; border-radius: 5px; font-family: sans-serif;'>";
            echo "<h3>Error en la Base de Datos</h3>";
            echo "<p>MySQL rechazó la consulta. Revisa si alguna de estas columnas está mal escrita en tu BD:</p>";
            echo "<strong>Detalle del error:</strong> " . $e->getMessage();
            echo "</div>";
            exit;
        }
    }

    public static function obtenerReporteObservaciones()
    {
        $query = "SELECT 
            u.id_usuario,

            -- =========================================================
            -- MÓDULO 1 (Solo Final)
            -- =========================================================
            MAX(CASE WHEN ra.id_pregunta_act = '154' THEN ra.respuesta END) AS M1_1_F,
            MAX(CASE WHEN ra.id_pregunta_act = '155' THEN ra.respuesta END) AS M1_2_F,
            MAX(CASE WHEN ra.id_pregunta_act = '156' THEN ra.respuesta END) AS M1_3_F,

            -- =========================================================
            -- MÓDULO 2
            -- =========================================================
            MAX(CASE WHEN ra.id_pregunta_act = '201' THEN ra.respuesta END) AS M2_1_I,
            MAX(CASE WHEN ra.id_pregunta_act = '202' THEN ra.respuesta END) AS M2_2_I,
            MAX(CASE WHEN ra.id_pregunta_act = '203' THEN ra.respuesta END) AS M2_3_I,
            MAX(CASE WHEN ra.id_pregunta_act = '281' THEN ra.respuesta END) AS M2_1_F,
            MAX(CASE WHEN ra.id_pregunta_act = '282' THEN ra.respuesta END) AS M2_2_F,
            MAX(CASE WHEN ra.id_pregunta_act = '283' THEN ra.respuesta END) AS M2_3_F,

            -- =========================================================
            -- MÓDULO 3
            -- =========================================================
            MAX(CASE WHEN ra.id_pregunta_act = '301' THEN ra.respuesta END) AS M3_1_I,
            MAX(CASE WHEN ra.id_pregunta_act = '302' THEN ra.respuesta END) AS M3_2_I,
            MAX(CASE WHEN ra.id_pregunta_act = '303' THEN ra.respuesta END) AS M3_3_I,
            MAX(CASE WHEN ra.id_pregunta_act = '391' THEN ra.respuesta END) AS M3_1_F,
            MAX(CASE WHEN ra.id_pregunta_act = '392' THEN ra.respuesta END) AS M3_2_F,
            MAX(CASE WHEN ra.id_pregunta_act = '393' THEN ra.respuesta END) AS M3_3_F,

            -- =========================================================
            -- MÓDULO 4
            -- =========================================================
            MAX(CASE WHEN ra.id_pregunta_act = '401' THEN ra.respuesta END) AS M4_1_I,
            MAX(CASE WHEN ra.id_pregunta_act = '402' THEN ra.respuesta END) AS M4_2_I,
            MAX(CASE WHEN ra.id_pregunta_act = '403' THEN ra.respuesta END) AS M4_3_I,
            MAX(CASE WHEN ra.id_pregunta_act = '491' THEN ra.respuesta END) AS M4_1_F,
            MAX(CASE WHEN ra.id_pregunta_act = '492' THEN ra.respuesta END) AS M4_2_F,
            MAX(CASE WHEN ra.id_pregunta_act = '493' THEN ra.respuesta END) AS M4_3_F,

            -- =========================================================
            -- MÓDULO 5
            -- =========================================================
            MAX(CASE WHEN ra.id_pregunta_act = '501' THEN ra.respuesta END) AS M5_1_I,
            MAX(CASE WHEN ra.id_pregunta_act = '502' THEN ra.respuesta END) AS M5_2_I,
            MAX(CASE WHEN ra.id_pregunta_act = '503' THEN ra.respuesta END) AS M5_3_I,
            MAX(CASE WHEN ra.id_pregunta_act = '541' THEN ra.respuesta END) AS M5_1_F,
            MAX(CASE WHEN ra.id_pregunta_act = '542' THEN ra.respuesta END) AS M5_2_F,
            MAX(CASE WHEN ra.id_pregunta_act = '543' THEN ra.respuesta END) AS M5_3_F,

            -- =========================================================
            -- MÓDULO 6
            -- =========================================================
            MAX(CASE WHEN ra.id_pregunta_act = '601' THEN ra.respuesta END) AS M6_1_I,
            MAX(CASE WHEN ra.id_pregunta_act = '602' THEN ra.respuesta END) AS M6_2_I,
            MAX(CASE WHEN ra.id_pregunta_act = '603' THEN ra.respuesta END) AS M6_3_I,
            MAX(CASE WHEN ra.id_pregunta_act = '611' THEN ra.respuesta END) AS M6_1_F,
            MAX(CASE WHEN ra.id_pregunta_act = '612' THEN ra.respuesta END) AS M6_2_F,
            MAX(CASE WHEN ra.id_pregunta_act = '613' THEN ra.respuesta END) AS M6_3_F,

            -- =========================================================
            -- MÓDULO 7
            -- =========================================================
            MAX(CASE WHEN ra.id_pregunta_act = '701' THEN ra.respuesta END) AS M7_1_I,
            MAX(CASE WHEN ra.id_pregunta_act = '702' THEN ra.respuesta END) AS M7_2_I,
            MAX(CASE WHEN ra.id_pregunta_act = '703' THEN ra.respuesta END) AS M7_3_I,
            MAX(CASE WHEN ra.id_pregunta_act = '765' THEN ra.respuesta END) AS M7_1_F,
            MAX(CASE WHEN ra.id_pregunta_act = '766' THEN ra.respuesta END) AS M7_2_F,
            MAX(CASE WHEN ra.id_pregunta_act = '767' THEN ra.respuesta END) AS M7_3_F

        FROM usuarios u
        LEFT JOIN respuestas_actividades ra ON u.id_usuario = ra.id_usuario
        GROUP BY u.id_usuario";

        try {
            $resultado = self::$db->query($query);
            $datos = [];
            while ($fila = $resultado->fetch_assoc()) {
                $datos[] = $fila;
            }
            return $datos;
        } catch (\Exception $e) {
            echo "<div style='background: #f8d7da; color: #721c24; padding: 20px; margin: 20px; border-radius: 5px; font-family: sans-serif;'>";
            echo "<h3>Error en la Base de Datos</h3>";
            echo "<strong>Detalle del error:</strong> " . $e->getMessage();
            echo "</div>";
            exit;
        }
    }

    // OBTENER MÉTRICAS PARA EL DASHBOARD
    public static function obtenerMetricasDashboard()
    {
        $db = self::$db;
        $metricas = [
            'total_usuarios' => 0,
            'total_canalizados' => 0,
            'canalizados_menores' => 0,
            'canalizados_tratamiento' => 0,
            'canalizados_resultados' => 0
        ];

        // 1. Obtener el Total de Usuarios
        $resTotal = $db->query("SELECT COUNT(*) as total FROM " . self::$tabla);
        if ($resTotal) {
            $metricas['total_usuarios'] = $resTotal->fetch_assoc()['total'];
        }

        // 2. Obtener los Canalizados agrupados por su estatus
        // 2 = Resultados, 5 = Menores, 6 = Tratamiento
        $queryCanalizados = "SELECT id_estatus, COUNT(*) as total FROM " . self::$tabla . " WHERE id_estatus IN (2, 5, 6) GROUP BY id_estatus";
        $resCanalizados = $db->query($queryCanalizados);

        if ($resCanalizados) {
            while ($row = $resCanalizados->fetch_assoc()) {
                // Sumamos al total de canalizados
                $metricas['total_canalizados'] += $row['total'];

                // Asignamos a la categoría específica
                if ($row['id_estatus'] == '5') {
                    $metricas['canalizados_menores'] = $row['total'];
                }
                if ($row['id_estatus'] == '6') {
                    $metricas['canalizados_tratamiento'] = $row['total'];
                }
                if ($row['id_estatus'] == '2') {
                    $metricas['canalizados_resultados'] = $row['total'];
                }
            }
        }

        return $metricas;
    }

    // OBTENER LISTA DE USUARIOS Y SU RECORRIDO PARA EL PANEL DE CONTROL
    public static function obtenerListaUsuariosControl()
    {
        // 1. Obtenemos los datos base cruzando con los catálogos
        $query = "SELECT 
                    u.id_usuario, 
                    u.nombre, 
                    u.apellido_paterno, 
                    u.email, 
                    u.email_alt, 
                    sx.nombre_sexo as sexo, 
                    TIMESTAMPDIFF(YEAR, u.fecha_nac, CURDATE()) as edad,
                    IF(u.condicion_cronica = 1, 'Sí', 'No') as condicion_cronica,
                    ct.nombre_tratamiento as tratamiento,
                    u.supervision_medica,
                    u.fecha_creacion
                  FROM usuarios u
                  LEFT JOIN cat_sexos sx ON u.id_sexo = sx.id_sexo
                  LEFT JOIN cat_tipos_tratamiento ct ON u.id_tratamiento = ct.id_tratamiento
                  ORDER BY u.id_usuario DESC";

        try {
            $resultado = self::$db->query($query);
            $usuarios = [];
            $ids = [];

            // Guardamos a los usuarios y recolectamos sus IDs
            while ($fila = $resultado->fetch_assoc()) {
                $fila['modulos'] = []; // Array vacío por defecto
                $usuarios[$fila['id_usuario']] = $fila;
                $ids[] = $fila['id_usuario'];
            }

            // 2. Si hay usuarios, buscamos sus progresos en una sola consulta
            if (!empty($ids)) {
                $ids_str = implode(',', $ids);

                // ORDEN MAGISTRAL: 
                // Primero los que tienen fecha de desbloqueo (cronológicamente), 
                // luego los nulos (bloqueados) ordenados por número de módulo.
                $qProgreso = "SELECT id_usuario, id_modulo, fecha_desbloqueo, estatus 
                              FROM progreso_modulos 
                              WHERE id_usuario IN ($ids_str) 
                              ORDER BY fecha_desbloqueo IS NULL, fecha_desbloqueo ASC, id_modulo ASC";

                $resProgreso = self::$db->query($qProgreso);

                while ($p = $resProgreso->fetch_assoc()) {
                    // Le asignamos su módulo al usuario correspondiente
                    $usuarios[$p['id_usuario']]['modulos'][] = $p;
                }
            }

            return array_values($usuarios); // Reindexamos el array

        } catch (\Exception $e) {
            // En caso de que la tabla cat_tipos_tratamiento tenga un nombre de columna distinto
            return [];
        }
    }
}
