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
}
