<?php

namespace Controllers;

use MVC\Router;
use Model\PersonalCrece;
use Model\Usuario;

class AdminController
{

    public static function login(Router $router)
    {
        $alertas = [];
        // Instanciamos vacío para poder pasar la variable a la vista y no perder lo escrito en el formulario si hay error
        $auth = new PersonalCrece();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new PersonalCrece($_POST);
            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                // 1. Comprobar que el usuario exista
                $usuario = PersonalCrece::where('usuario', $auth->usuario);

                if ($usuario) {
                    // 2. Comprobar contraseña y que la cuenta esté activa
                    if ($usuario->comprobarPasswordAndActivo($auth->password)) {

                        // 3. ¡Autenticado! Iniciamos la sesión especial
                        session_start();

                        // Estas son las variables de sesión que blindan la ruta
                        $_SESSION['admin_login'] = true;
                        $_SESSION['id_personal'] = $usuario->id_personal;
                        $_SESSION['usuario'] = $usuario->usuario;
                        $_SESSION['nombre_completo'] = $usuario->nombre_completo;
                        $_SESSION['id_rol'] = $usuario->id_rol;

                        header('Location: /panel-control');
                        return;
                    } else {
                        // Rescatamos las alertas generadas por comprobarPasswordAndActivo
                        $alertas = PersonalCrece::getAlertas();
                    }
                } else {
                    PersonalCrece::setAlerta('error', 'El usuario no fue encontrado');
                    $alertas = PersonalCrece::getAlertas();
                }
            }
        }

        $router->render('admin/login', [
            'alertas' => $alertas,
            'auth' => $auth // Pasamos $auth para que puedas rellenar el value del input 'usuario'
        ]);
    }

    public static function panel(Router $router)
    {
        session_start();

        if (!isset($_SESSION['admin_login']) || !$_SESSION['admin_login']) {
            header('Location: /acceso-personal');
            return;
        }

        // Métricas de pacientes (Para todos)
        $metricas_usuarios = Usuario::obtenerMetricasDashboard();

        // Métricas de personal (SOLO PARA ADMIN)
        $metricas_personal = [];
        if ($_SESSION['id_rol'] == 1) {
            $metricas_personal = PersonalCrece::obtenerMetricasPersonal();
        }

        $router->render('admin/panel', [
            'titulo' => 'Panel de Control',
            'nombre' => $_SESSION['nombre_completo'],
            'rol' => $_SESSION['id_rol'],
            'metricas' => $metricas_usuarios,            // Datos de los pacientes
            'metricas_personal' => $metricas_personal    // Datos del personal
        ]);
    }

    public static function indexPersonal(Router $router)
    {
        session_start();
        if (!isset($_SESSION['admin_login'])) {
            header('Location: /acceso-personal');
            return;
        }

        // Solo el Admin Maestro (Rol 1) debería poder gestionar al personal
        if ($_SESSION['id_rol'] != 1) {
            header('Location: /panel-control');
            return;
        }

        // Obtenemos a todo el personal registrado
        $personal = PersonalCrece::all();

        $router->render('admin/personal/index', [
            'titulo' => 'Gestión de Personal',
            'personal' => $personal
        ]);
    }

    // CREAR (Create)
    public static function crearPersonal(Router $router)
    {
        session_start();
        if (!isset($_SESSION['admin_login']) || $_SESSION['id_rol'] != 1) {
            header('Location: /acceso-personal');
            return;
        }

        $personal = new PersonalCrece();
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $personal->sincronizar($_POST);
            $alertas = $personal->validarNuevaCuenta();

            if (empty($alertas)) {
                $resultado = $personal->existeUsuario();

                if ($resultado->num_rows) {
                    $alertas = PersonalCrece::getAlertas();
                } else {
                    $personal->hashPassword();

                    $personal->activo = 1;

                    $resultado = $personal->guardar();

                    if ($resultado) {
                        // CAMBIO AQUÍ: Redirigir a la ruta correcta que definiste en tu index
                        header('Location: /control-personal?mensaje=creado');
                    }
                }
            }
        }

        $router->render('admin/personal/crear', [
            'titulo' => 'Nuevo Psicólogo / Administrador',
            'personal' => $personal,
            'alertas' => $alertas
        ]);
    }

    // CAMBIAR ESTADO (Activar / Desactivar)
    public static function estadoPersonal(Router $router)
    {
        session_start();

        // 1. Validar que sea el Admin
        if (!isset($_SESSION['admin_login']) || $_SESSION['id_rol'] != 1) {
            header('Location: /acceso-personal');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 2. Validar que el ID enviado sea un número entero válido
            $id = filter_var($_POST['id_personal'], FILTER_VALIDATE_INT);

            if ($id) {
                // 3. Buscar al usuario en la base de datos
                $personal = PersonalCrece::find($id);

                if ($personal) {
                    // SEGURO: Evitar que el administrador se desactive a sí mismo
                    if ($personal->id_personal === $_SESSION['id_personal']) {
                        header('Location: /control-personal?mensaje=error_propio');
                        return;
                    }

                    // 4. Invertir el estado (Si es 1 pasa a 0, si es 0 pasa a 1)
                    $personal->activo = ($personal->activo === '1' || $personal->activo === 1) ? 0 : 1;

                    // 5. Guardar el cambio en la BD
                    $resultado = $personal->guardar();

                    if ($resultado) {
                        header('Location: /control-personal?mensaje=estado_actualizado');
                        return;
                    }
                }
            }

            // Si el ID no es válido o no encuentra al usuario, lo regresamos sin hacer nada
            header('Location: /control-personal');
        }
    }

    // ACTUALIZAR (Update)
    public static function actualizarPersonal(Router $router)
    {
        session_start();
        if (!isset($_SESSION['admin_login']) || $_SESSION['id_rol'] != 1) {
            header('Location: /acceso-personal');
            return;
        }

        // 1. Obtener y validar el ID de la URL
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /control-personal');
            return;
        }

        // 2. Buscar al usuario en la BD
        $personal = PersonalCrece::find($id);
        if (!$personal) {
            header('Location: /control-personal');
            return;
        }

        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sincronizar los nuevos datos del formulario
            $personal->sincronizar($_POST);
            $alertas = $personal->validarActualizarCuenta();

            if (empty($alertas)) {
                // Verificar que el nuevo usuario no pertenezca a otra persona
                $resultado = $personal->existeUsuarioActualizar($id);

                if ($resultado->num_rows) {
                    $alertas = PersonalCrece::getAlertas();
                } else {
                    // Si el administrador escribió una nueva contraseña, la ciframos
                    // Si no escribió nada, se conserva el password_hash que ya traía de la BD
                    if ($personal->password) {
                        $personal->hashPassword();
                    }

                    // Guardar los cambios (ActiveRecord detectará que tiene ID y hará UPDATE)
                    $resultado = $personal->guardar();

                    if ($resultado) {
                        header('Location: /control-personal?mensaje=actualizado');
                    }
                }
            }
        }

        $router->render('admin/personal/actualizar', [
            'titulo' => 'Actualizar Personal',
            'personal' => $personal,
            'alertas' => $alertas
        ]);
    }

    // Método para descargar el csv
    public static function exportarUsuariosCSV()
    {
        session_start();
        if (!isset($_SESSION['admin_login'])) {
            header('Location: /acceso-personal');
            return;
        }

        // 1. Obtener los datos masivos de la BD
        $datos = Usuario::obtenerReporteCompleto(); // Asegúrate de importar el modelo Usuario

        // 2. Configurar las cabeceras para forzar la descarga del CSV
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="reporte_pacientes_crece_' . date('Ymd_His') . '.csv"');

        // 3. Abrir el flujo de salida directamente al navegador (sin crear archivos físicos en el servidor)
        $salida = fopen('php://output', 'w');

        // 4. (Opcional pero RECOMENDADO) Agregar el BOM de UTF-8 para que Excel lea bien los acentos (ñ, á, é)
        fputs($salida, "\xEF\xBB\xBF");

        if (!empty($datos)) {
            // 5. Imprimir la primera fila (los encabezados de las columnas)
            // Extraemos las llaves del primer registro (id_usuario, nombre, SOC_I_101, etc.)
            fputcsv($salida, array_keys($datos[0]));

            // 6. Recorrer los datos e imprimir cada fila de paciente
            foreach ($datos as $fila) {
                fputcsv($salida, $fila);
            }
        } else {
            // Si la tabla está vacía
            fputcsv($salida, ['No hay datos registrados aún']);
        }

        // 7. Cerrar el archivo
        fclose($salida);
    }

    // MOSTRAR PANTALLA DE CONTROL DE USUARIOS
    public static function controlUsuarios(Router $router)
    {
        session_start();
        if (!isset($_SESSION['admin_login'])) {
            header('Location: /acceso-personal');
            return;
        }

        // Obtener todos los usuarios con su progreso
        $usuarios = Usuario::obtenerListaUsuariosControl();

        $router->render('admin/usuarios/index', [
            'titulo' => 'Control de Usuarios',
            'usuarios' => $usuarios // <-- Pasamos la variable a la vista
        ]);
    }

    // Método para descargar el csv de Observaciones de Módulos
    public static function exportarObservacionesCSV()
    {
        session_start();
        if (!isset($_SESSION['admin_login'])) {
            header('Location: /acceso-personal');
            return;
        }

        // Obtener los datos usando el nuevo método
        $datos = Usuario::obtenerReporteObservaciones();

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="reporte_observaciones_crece_' . date('Ymd_His') . '.csv"');

        $salida = fopen('php://output', 'w');
        fputs($salida, "\xEF\xBB\xBF");

        if (!empty($datos)) {
            fputcsv($salida, array_keys($datos[0]));
            foreach ($datos as $fila) {
                fputcsv($salida, $fila);
            }
        } else {
            fputcsv($salida, ['No hay datos registrados aún']);
        }

        fclose($salida);
    }
}
