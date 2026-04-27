<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;
use Classes\Correo;

class LoginController
{

    public static function inicio(Router $router)
    {
        $router->render('inicio');
    }

    public static function login(Router $router)
    {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);

                if ($usuario) {
                    // 1. FILTRO GLOBAL DE EDAD
                    // Si el usuario es menor de edad, se redirige inmediatamente
                    if (!$usuario->validarEdad()) {
                        header('Location: /menorEdad');
                        return;
                    }

                    // 2. FILTRO PARA CANALIZADOS POR TRATAMIENTO (Estatus 6)
                    // Como ya pasó el filtro anterior, aquí ya es mayor de edad.
                    if ($usuario->id_estatus === '6') {
                        // Verificamos si ya pasaron los 4 meses de antigüedad (espera de tratamiento)
                        if ($usuario->verificarAntiguedad()) {
                            // Liberamos la cuenta borrando el registro previo
                            $usuario->eliminar();
                            Usuario::setAlerta('exito', 'Tu periodo de espera por tratamiento ha concluido y tu correo ha sido liberado. Por favor, crea una cuenta nueva para comenzar.');

                            // Recargamos login para mostrar el mensaje de éxito
                            $alertas = Usuario::getAlertas();
                            $router->render('auth/login', [
                                'alertas' => $alertas
                            ]);
                            return;
                        } else {
                            // Si aún no pasan los 4 meses, lo enviamos a la pantalla informativa
                            header('Location: /tipoTratamiento');
                            return;
                        }
                    }

                    // 3. LIMPIEZA DE REGISTROS DE MENORES (Estatus 5)
                    // Si su estatus es 5 y ya es mayor, borramos para que pueda registrarse con datos reales.
                    if ($usuario->id_estatus === '5') {
                        $usuario->eliminar();
                        Usuario::setAlerta('exito', 'Tu cuenta previa como menor ha sido liberada. Por favor, regístrate de nuevo con tus datos actuales para comenzar.');

                        // Recargamos la vista de login para mostrar la alerta de éxito
                        $alertas = Usuario::getAlertas();
                        $router->render('auth/login', [
                            'alertas' => $alertas
                        ]);
                        return;
                    }

                    // 4. AUTENTICACIÓN NORMAL (Estatus 1, 2, 3...)
                    if ($usuario->comprobarPasswordyConfirmado($auth->password)) {
                        session_start();
                        $_SESSION['id_usuario'] = $usuario->id_usuario;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido_paterno;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        
                        if ($usuario->id_estatus === '3' || $usuario->id_estatus === '4') {
                            header('Location: /panel-modulos');
                            return;
                        }

                        // Redirección para Usuarios en Evaluación Inicial (Estatus 1 y 2)
                        if ($usuario->id_estatus === '1' || $usuario->id_estatus === '2') {
                            $idPendiente = (int) $usuario->id_cuestionario_pendiente;

                            // Si ya terminó todos los cuestionarios (indicado por puntero 1 o 0)
                            if ($idPendiente === 1 || $idPendiente === 0) {
                                header('Location: /resultados-iniciales');
                                return;
                            }

                            $rutasCuestionarios = [
                                2  => '/c-sociodemografico',
                                3  => '/c-pss-10',
                                4  => '/c-mini',
                                5  => '/c-phq-9',
                                6  => '/c-gad-7',
                                7  => '/c-aaq-ii',
                                8  => '/c-who-5',
                                9  => '/c-scs',
                                10 => '/c-whoqol-bref',
                                11 => '/c-maas',
                                12 => '/c-apoi'
                            ];

                            if (array_key_exists($idPendiente, $rutasCuestionarios)) {
                                header('Location: ' . $rutasCuestionarios[$idPendiente]);
                                return;
                            } else {
                                // Por seguridad, si el ID no es válido pero no ha terminado, enviamos a resultados
                                header('Location: /resultados-iniciales');
                                return;
                            }
                        }
                    }
                } else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', [
            'alertas' => $alertas
        ]);
    }

    public static function logout()
    {
        session_start();

        $_SESSION = [];

        header('Location: /');

    }

    public static function olvide(Router $router)
    {

        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);
                if ($usuario && $usuario->confirmado === '1') {
                    // Generar un nuevo token
                    $usuario->crearToken();
                    $usuario->guardar();

                    // Enviar el email
                    $correo = new Correo($usuario->email, $usuario->nombre, $usuario->token, $usuario->email_alt);
                    $correo->enviarInstrucciones();

                    // Aviso de exito
                    Usuario::setAlerta('exito', 'Se han enviado las instrucciones a tu correo');
                } else {
                    Usuario::setAlerta('error', 'El usuario no existe o no está confirmado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/olvide', [
            'alertas' => $alertas
        ]);
    }

    public static function recuperar(Router $router)
    {
        $alertas = [];
        $error = false;

        // Obtener el token de la URL
        $token = s($_GET['token']);

        // Buscar usuario por su token
        $usuario = Usuario::where('token', $token);

        // 1. VALIDACIÓN INICIAL DEL TOKEN
        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token no válido');
            $error = true;
        }
        // 2. VALIDACIÓN DE CADUCIDAD (48 HORAS)
        else if ($usuario->tokenCaducado()) {
            // Por seguridad, si el token caducó lo eliminamos de la BD para que no pueda usarse más
            $usuario->token = null;
            $usuario->fecha_token = null;
            $usuario->guardar();

            Usuario::setAlerta('error', 'El enlace ha caducado. Por motivos de seguridad, los enlaces de recuperación solo duran 48 horas. Por favor, genera una nueva solicitud.');
            $error = true;
        }

        // 3. PROCESAMIENTO DEL CAMBIO DE CONTRASEÑA
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$error) {
            $password = new Usuario($_POST);
            $alertas = $password->validarPassword();

            if (empty($alertas)) {
                // Limpiamos y asignamos la nueva contraseña
                $usuario->password = $password->password;

                // Hashear la contraseña y limpiar campos temporales
                $usuario->hashPassword();

                // Limpiamos el token y su fecha para que no se pueda reutilizar el enlace
                $usuario->token = null;
                $usuario->fecha_token = null;

                $resultado = $usuario->guardar();

                if ($resultado) {
                    // Redirigir al login tras el éxito
                    header('Location: /login');
                    return;
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/recuperar', [
            'alertas' => $alertas,
            'error' => $error
        ]);
    }

    public static function crear(Router $router)
    {
        $usuario = new Usuario;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            if (empty($alertas)) {
                // existeUsuario() ahora elimina automáticamente registros con id_estatus 5 (si ya es mayor) 
                // y con id_estatus 6 (si ya pasaron 4 meses).
                $resultado = $usuario->existeUsuario();

                if ($resultado) {
                    // Si existe (y no era un registro canalizado liberado), recuperamos la alerta de error
                    $alertas = Usuario::getAlertas();
                } else {
                    // 1. PRIMER FILTRO: MAYORÍA DE EDAD
                    if ($usuario->validarEdad()) {

                        // 2. SEGUNDO FILTRO: CANALIZACIÓN POR TRATAMIENTO (id_tratamiento = 2)
                        if ($usuario->id_tratamiento === '2') {
                            // Conservamos su nombre y correo para seguimiento
                            $usuario->password_hash = 'CANALIZADO_TRATAMIENTO'; // Valor dummy no válido para login
                            $usuario->confirmado = '0';
                            $usuario->id_estatus = 6; // Canalizado tipo tratamiento

                            $resultadoGuardar = $usuario->guardar();
                            if ($resultadoGuardar) {
                                header('Location: /tipoTratamiento');
                                return;
                            }
                        } else {
                            // --- CASO: REGISTRO NORMAL ---
                            $usuario->hashPassword();
                            $usuario->crearToken();

                            $resultadoGuardar = $usuario->guardar();

                            if ($resultadoGuardar) {
                                $correo = new Correo($usuario->email, $usuario->nombre, $usuario->token, $usuario->email_alt);
                                $correo->enviarConfirmacion();
                                header('Location: /mensaje');
                                return;
                            }
                        }
                    } else {
                        // --- CASO: MENOR DE EDAD (Canalizado Estatus 5) ---
                        $usuario->nombre = null; // Limpieza de datos personales
                        $usuario->apellido_paterno = 'ANÓNIMO';
                        $usuario->id_estatus = 5;

                        $resultadoGuardar = $usuario->guardar();

                        if ($resultadoGuardar) {
                            header('Location: /menorEdad');
                            return;
                        }
                    }
                }
            }
        }

        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function mensaje(Router $router)
    {
        $router->render('auth/mensaje');
    }

    public static function menorEdad(Router $router)
    {
        $router->render('auth/menorEdad');
    }

    public static function tipoTratamiento(Router $router)
    {
        $router->render('auth/tipoTratamiento');
    }

    public static function canalizacion(Router $router)
    {
        $router->render('auth/canalizacion');
    }

    public static function confirmar(Router $router)
    {
        $alertas = [];
        $token = s($_GET['token']);
        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token no válido');
        } else {
            if ($usuario->tokenCaducado()) {
                $usuario->eliminar();
                Usuario::setAlerta('error', 'El plazo de 48 horas ha vencido. Tu registro ha sido eliminado.');
            } else {
                // PROCESO DE CONFIRMACIÓN
                $usuario->confirmado = "1";
                $usuario->token = null; // MySQL acepta NULL para limpiar el campo
                $usuario->fecha_token = null; // IMPORTANTE: Usar null, no ''
                $usuario->id_cuestionario_pendiente = 2;

                $usuario->guardar(); // Esto disparará la actualización sin errores
                Usuario::setAlerta('exito', 'Cuenta comprobada correctamente');
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/confirmar-cuenta', ['alertas' => $alertas]);
    }
}
