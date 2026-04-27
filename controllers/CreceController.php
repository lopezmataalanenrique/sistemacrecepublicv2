<?php

namespace Controllers;

use MVC\Router;
use Model\ProgresoModulo;
use Model\ActiveRecord;
use Model\RespuestaActividad;

class CreceController
{
    public static function panel(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = \Model\Usuario::find($id_usuario);
        $db = ActiveRecord::getDB();

        // --- NUEVO: Manejo del formulario de observación (Sección B) ---
        // Si el usuario da clic en "Guardar observación", entramos aquí
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['obs1'])) {
            $observaciones = [
                'obs1' => $_POST['obs1'] ?? '',
                'obs2' => $_POST['obs2'] ?? '',
                'obs3' => $_POST['obs3'] ?? ''
            ];

            foreach ($observaciones as $id_preg => $respuesta) {
                if ($respuesta !== '') {
                    $respuesta_esc = $db->escape_string($respuesta);
                    
                    // Lo guardamos en el Módulo 7, pero con Actividad 99 para diferenciarlo
                    // de las actividades normales y no alterar el progreso
                    $query = "INSERT INTO respuestas_actividades (id_usuario, id_modulo, id_actividad, id_pregunta_act, respuesta) ";
                    $query .= "VALUES ({$id_usuario}, 7, 99, '{$id_preg}', '{$respuesta_esc}') ";
                    $query .= "ON DUPLICATE KEY UPDATE respuesta = VALUES(respuesta)";
                    
                    $db->query($query);
                }
            }
            // Recargamos la página anclando a la sección B para que no se pierda el usuario
            header('Location: /panel-modulos#seccion-b');
            return;
        }

        // --- NUEVO: Recuperar las observaciones guardadas ---
        $queryObs = "SELECT id_pregunta_act, respuesta FROM respuestas_actividades ";
        $queryObs .= "WHERE id_usuario = {$id_usuario} AND id_modulo = 7 AND id_actividad = 99";
        $resultadoObs = $db->query($queryObs);
        
        $observaciones_guardadas = [];
        if ($resultadoObs) {
            while ($row = $resultadoObs->fetch_assoc()) {
                $observaciones_guardadas[$row['id_pregunta_act']] = $row['respuesta'];
            }
        }
        // ----------------------------------------------------------------

        $query = "SELECT m.id_modulo, m.nombre_modulo, m.descripcion, p.estatus, p.actividad_actual ";
        $query .= "FROM cat_modulos m ";
        $query .= "LEFT JOIN progreso_modulos p ON m.id_modulo = p.id_modulo ";
        $query .= "WHERE p.id_usuario = {$id_usuario} ";
        $query .= "ORDER BY m.id_modulo ASC";

        $modulos = $db->query($query);

        $progresos = [];
        while ($row = $modulos->fetch_assoc()) {
            $progresos[] = $row;
        }

        $router->render('crece/panel-modulos', [
            'titulo' => 'Panel de Módulos',
            'progresos' => $progresos,
            'usuario' => $usuario,
            'observaciones' => $observaciones_guardadas // <-- Pasamos las respuestas a la vista
        ]);
    }

    public static function modulo1(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id_usuario = $_SESSION['id_usuario'];

        // CORRECCIÓN: Consulta manual con AND para asegurar que sea el Módulo 1
        $queryProgreso = "SELECT * FROM progreso_modulos WHERE id_usuario = {$id_usuario} AND id_modulo = 1 LIMIT 1";
        $resultadoProgreso = ProgresoModulo::consultarSQL($queryProgreso);
        $progreso = array_shift($resultadoProgreso);

        // Las respuestas ya estaban bien porque usaban SQL manual
        $query = "SELECT id_pregunta_act, respuesta FROM respuestas_actividades ";
        $query .= "WHERE id_usuario = {$id_usuario} AND id_modulo = 1";
        $resultados = RespuestaActividad::consultarSQL($query);

        $respuestas_guardadas = [];
        foreach ($resultados as $res) {
            $respuestas_guardadas[$res->id_pregunta_act] = $res->respuesta;
        }

        $router->render("modulos/modulo1", [
            'titulo' => 'Módulo 1 | CRECE',
            'progreso' => $progreso,
            'respuestas' => $respuestas_guardadas
        ]);
    }

    public static function modulo2(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // Protección básica: Si no hay sesión, podrías redirigir al login
        $id_usuario = $_SESSION['id_usuario'] ?? null;
        if (!$id_usuario) {
            header('Location: /');
            return;
        }

        // 1. Buscamos el progreso específicamente para el Módulo 2
        $queryProgreso = "SELECT * FROM progreso_modulos WHERE id_usuario = {$id_usuario} AND id_modulo = 2 LIMIT 1";
        $resultadoProgreso = ProgresoModulo::consultarSQL($queryProgreso);
        $progreso = array_shift($resultadoProgreso);

        // Validación de seguridad por si no existe el registro
        if (!$progreso) {
            header('Location: /panel-modulos');
            return;
        }

        // 2. Consultamos las respuestas guardadas del Módulo 2
        // Usamos el id_modulo = 2 en el WHERE para no mezclar con el Módulo 1
        $query = "SELECT id_pregunta_act, respuesta FROM respuestas_actividades ";
        $query .= "WHERE id_usuario = {$id_usuario} AND id_modulo = 2";
        $resultados = RespuestaActividad::consultarSQL($query);

        // 3. Mapeamos las respuestas para pasarlas a la vista
        $respuestas_guardadas = [];
        foreach ($resultados as $res) {
            $respuestas_guardadas[$res->id_pregunta_act] = $res->respuesta;
        }

        // 4. Renderizamos la nueva vista del módulo 2
        $router->render("modulos/modulo2", [
            'titulo' => 'Módulo 2 | CRECE',
            'progreso' => $progreso,
            'respuestas' => $respuestas_guardadas
        ]);
    }

    public static function modulo3(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // Protección básica: Si no hay sesión, podrías redirigir al login
        $id_usuario = $_SESSION['id_usuario'] ?? null;
        if (!$id_usuario) {
            header('Location: /');
            return;
        }

        // 1. Buscamos el progreso específicamente para el Módulo 2
        $queryProgreso = "SELECT * FROM progreso_modulos WHERE id_usuario = {$id_usuario} AND id_modulo = 3 LIMIT 1";
        $resultadoProgreso = ProgresoModulo::consultarSQL($queryProgreso);
        $progreso = array_shift($resultadoProgreso);

        // Validación de seguridad por si no existe el registro
        if (!$progreso) {
            header('Location: /panel-modulos');
            return;
        }

        // 2. Consultamos las respuestas guardadas del Módulo 2
        // Usamos el id_modulo = 2 en el WHERE para no mezclar con el Módulo 1
        $query = "SELECT id_pregunta_act, respuesta FROM respuestas_actividades ";
        $query .= "WHERE id_usuario = {$id_usuario} AND id_modulo = 3";
        $resultados = RespuestaActividad::consultarSQL($query);

        // 3. Mapeamos las respuestas para pasarlas a la vista
        $respuestas_guardadas = [];
        foreach ($resultados as $res) {
            $respuestas_guardadas[$res->id_pregunta_act] = $res->respuesta;
        }

        // 4. Renderizamos la nueva vista del módulo 2
        $router->render("modulos/modulo3", [
            'titulo' => 'Módulo 3 | CRECE',
            'progreso' => $progreso,
            'respuestas' => $respuestas_guardadas
        ]);
    }

    public static function modulo4(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // Protección básica: Si no hay sesión, podrías redirigir al login
        $id_usuario = $_SESSION['id_usuario'] ?? null;
        if (!$id_usuario) {
            header('Location: /');
            return;
        }

        // 1. Buscamos el progreso específicamente para el Módulo 2
        $queryProgreso = "SELECT * FROM progreso_modulos WHERE id_usuario = {$id_usuario} AND id_modulo = 4 LIMIT 1";
        $resultadoProgreso = ProgresoModulo::consultarSQL($queryProgreso);
        $progreso = array_shift($resultadoProgreso);

        // Validación de seguridad por si no existe el registro
        if (!$progreso) {
            header('Location: /panel-modulos');
            return;
        }

        // 2. Consultamos las respuestas guardadas del Módulo 2
        // Usamos el id_modulo = 2 en el WHERE para no mezclar con el Módulo 1
        $query = "SELECT id_pregunta_act, respuesta FROM respuestas_actividades ";
        $query .= "WHERE id_usuario = {$id_usuario} AND id_modulo = 4";
        $resultados = RespuestaActividad::consultarSQL($query);

        // 3. Mapeamos las respuestas para pasarlas a la vista
        $respuestas_guardadas = [];
        foreach ($resultados as $res) {
            $respuestas_guardadas[$res->id_pregunta_act] = $res->respuesta;
        }

        // 4. Renderizamos la nueva vista del módulo 2
        $router->render("modulos/modulo4", [
            'titulo' => 'Módulo 4 | CRECE',
            'progreso' => $progreso,
            'respuestas' => $respuestas_guardadas
        ]);
    }

    public static function modulo5(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // Protección básica: Si no hay sesión, podrías redirigir al login
        $id_usuario = $_SESSION['id_usuario'] ?? null;
        if (!$id_usuario) {
            header('Location: /');
            return;
        }

        // 1. Buscamos el progreso específicamente para el Módulo 2
        $queryProgreso = "SELECT * FROM progreso_modulos WHERE id_usuario = {$id_usuario} AND id_modulo = 5 LIMIT 1";
        $resultadoProgreso = ProgresoModulo::consultarSQL($queryProgreso);
        $progreso = array_shift($resultadoProgreso);

        // Validación de seguridad por si no existe el registro
        if (!$progreso) {
            header('Location: /panel-modulos');
            return;
        }

        // 2. Consultamos las respuestas guardadas del Módulo 2
        // Usamos el id_modulo = 2 en el WHERE para no mezclar con el Módulo 1
        $query = "SELECT id_pregunta_act, respuesta FROM respuestas_actividades ";
        $query .= "WHERE id_usuario = {$id_usuario} AND id_modulo = 5";
        $resultados = RespuestaActividad::consultarSQL($query);

        // 3. Mapeamos las respuestas para pasarlas a la vista
        $respuestas_guardadas = [];
        foreach ($resultados as $res) {
            $respuestas_guardadas[$res->id_pregunta_act] = $res->respuesta;
        }

        // 4. Renderizamos la nueva vista del módulo 2
        $router->render("modulos/modulo5", [
            'titulo' => 'Módulo 5 | CRECE',
            'progreso' => $progreso,
            'respuestas' => $respuestas_guardadas
        ]);
    }

    public static function modulo6(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // Protección básica: Si no hay sesión, podrías redirigir al login
        $id_usuario = $_SESSION['id_usuario'] ?? null;
        if (!$id_usuario) {
            header('Location: /');
            return;
        }

        // 1. Buscamos el progreso específicamente para el Módulo 2
        $queryProgreso = "SELECT * FROM progreso_modulos WHERE id_usuario = {$id_usuario} AND id_modulo = 6 LIMIT 1";
        $resultadoProgreso = ProgresoModulo::consultarSQL($queryProgreso);
        $progreso = array_shift($resultadoProgreso);

        // Validación de seguridad por si no existe el registro
        if (!$progreso) {
            header('Location: /panel-modulos');
            return;
        }

        // 2. Consultamos las respuestas guardadas del Módulo 2
        // Usamos el id_modulo = 2 en el WHERE para no mezclar con el Módulo 1
        $query = "SELECT id_pregunta_act, respuesta FROM respuestas_actividades ";
        $query .= "WHERE id_usuario = {$id_usuario} AND id_modulo = 6";
        $resultados = RespuestaActividad::consultarSQL($query);

        // 3. Mapeamos las respuestas para pasarlas a la vista
        $respuestas_guardadas = [];
        foreach ($resultados as $res) {
            $respuestas_guardadas[$res->id_pregunta_act] = $res->respuesta;
        }

        // 4. Renderizamos la nueva vista del módulo 2
        $router->render("modulos/modulo6", [
            'titulo' => 'Módulo 6 | CRECE',
            'progreso' => $progreso,
            'respuestas' => $respuestas_guardadas
        ]);
    }

    public static function modulo7(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // Protección básica: Si no hay sesión, podrías redirigir al login
        $id_usuario = $_SESSION['id_usuario'] ?? null;
        if (!$id_usuario) {
            header('Location: /');
            return;
        }

        // 1. Buscamos el progreso específicamente para el Módulo 2
        $queryProgreso = "SELECT * FROM progreso_modulos WHERE id_usuario = {$id_usuario} AND id_modulo = 7 LIMIT 1";
        $resultadoProgreso = ProgresoModulo::consultarSQL($queryProgreso);
        $progreso = array_shift($resultadoProgreso);

        // Validación de seguridad por si no existe el registro
        if (!$progreso) {
            header('Location: /panel-modulos');
            return;
        }

        // 2. Consultamos las respuestas guardadas del Módulo 2
        // Usamos el id_modulo = 2 en el WHERE para no mezclar con el Módulo 1
        $query = "SELECT id_pregunta_act, respuesta FROM respuestas_actividades ";
        $query .= "WHERE id_usuario = {$id_usuario} AND id_modulo = 7";
        $resultados = RespuestaActividad::consultarSQL($query);

        // 3. Mapeamos las respuestas para pasarlas a la vista
        $respuestas_guardadas = [];
        foreach ($resultados as $res) {
            $respuestas_guardadas[$res->id_pregunta_act] = $res->respuesta;
        }

        // 4. Renderizamos la nueva vista del módulo 2
        $router->render("modulos/modulo7", [
            'titulo' => 'Módulo 7 | CRECE',
            'progreso' => $progreso,
            'respuestas' => $respuestas_guardadas
        ]);
    }

    public static function guardarActividad()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION)) {
                session_start();
            }

            $id_usuario = $_SESSION['id_usuario'];
            $id_modulo = (int)$_POST['id_modulo'];
            $act_id = (int)$_POST['actividad_id'];

            $db = ActiveRecord::getDB();

            // 1. Guardar o actualizar respuestas (Optimizado)
            foreach ($_POST as $key => $value) {
                if (in_array($key, ['id_modulo', 'actividad_id'])) continue;

                $id_pregunta = $db->escape_string($key);
                $respuesta_val = $db->escape_string($value);

                $query = "INSERT INTO respuestas_actividades (id_usuario, id_modulo, id_actividad, id_pregunta_act, respuesta) ";
                $query .= "VALUES ({$id_usuario}, {$id_modulo}, {$act_id}, '{$id_pregunta}', '{$respuesta_val}') ";
                $query .= "ON DUPLICATE KEY UPDATE respuesta = VALUES(respuesta)";

                $db->query($query);
            }

            // 2. Obtener el progreso actual del módulo
            $queryProgreso = "SELECT * FROM progreso_modulos WHERE id_usuario = {$id_usuario} AND id_modulo = {$id_modulo} LIMIT 1";
            $resultadoProgreso = ProgresoModulo::consultarSQL($queryProgreso);
            $progreso = !empty($resultadoProgreso) ? array_shift($resultadoProgreso) : null;

            // 3. Lógica de avance de actividades y finalización de módulo
            if ($progreso && $act_id === (int)$progreso->actividad_actual) {
                $progreso->actividad_actual += 1;

                // Definición de límites por módulo
                $limites_actividades = [
                    1 => 5,
                    2 => 5,
                    3 => 5,
                    4 => 5,
                    5 => 5,
                    6 => 5,
                    7 => 5
                ];
                $limite = $limites_actividades[$id_modulo] ?? 5;

                if ($act_id >= $limite) {
                    $progreso->estatus = 'completado';
                    // SOLUCIÓN 1: Actualizar fecha_finalizacion
                    $progreso->fecha_finalizacion = date('Y-m-d H:i:s');
                }

                $progreso->guardar();

                // Evaluar desbloqueos de siguientes módulos
                if ($progreso->estatus === 'completado') {
                    self::evaluarDesbloqueos($id_usuario);

                    // SOLUCIÓN 2: Verificar si terminó TODO el programa
                    self::verificarFinalizacionGlobal($id_usuario);
                }
            }

            header("Location: /modulo" . $id_modulo);
            exit;
        }
    }

    // En CreceController.php
    private static function verificarFinalizacionGlobal($id_usuario)
    {
        $query = "SELECT COUNT(*) as total FROM progreso_modulos WHERE id_usuario = {$id_usuario} AND estatus = 'completado'";
        $db = ActiveRecord::getDB();
        $resultado = $db->query($query);
        $fila = $resultado->fetch_assoc();

        if ((int)$fila['total'] === 7) {
            // Estatus 4 (Completado) y Cuestionario Pendiente 3 (Inicia Postest en PSS-10)
            $queryUser = "UPDATE usuarios SET id_estatus = '4', id_cuestionario_pendiente = '3' WHERE id_usuario = {$id_usuario}";
            $db->query($queryUser);
        }
    }

    public static function evaluarDesbloqueos($id_usuario)
    {
        $query = "SELECT * FROM progreso_modulos WHERE id_usuario = {$id_usuario}";
        $resultados = ProgresoModulo::consultarSQL($query);

        $estados = [];
        $modelos = [];
        foreach ($resultados as $res) {
            $estados[$res->id_modulo] = $res->estatus;
            $modelos[$res->id_modulo] = $res;
        }

        // TIER 1: Módulos 2, 3, 4 (Se activan si el 1 está completado)
        if (isset($estados[1]) && $estados[1] === 'completado') {
            $tier1 = [2, 3, 4];
            $completados_t1 = 0;
            $hay_disponible_t1 = false;

            foreach ($tier1 as $m) {
                if ($estados[$m] === 'completado') $completados_t1++;
                if ($estados[$m] === 'disponible') $hay_disponible_t1 = true;
            }

            // Si NO hay ninguno "en curso" (disponible) y NO han terminado todos los de este nivel
            if (!$hay_disponible_t1 && $completados_t1 < 3) {
                foreach ($tier1 as $m) {
                    if ($estados[$m] === 'bloqueado') {
                        $modelos[$m]->estatus = 'seleccionable';
                        $modelos[$m]->guardar();
                    }
                }
            }

            // TIER 2: Módulos 5, 6, 7 (Se activan si TODO el Tier 1 está completado)
            if ($completados_t1 === 3) {
                $tier2 = [5, 6, 7];
                $completados_t2 = 0;
                $hay_disponible_t2 = false;

                foreach ($tier2 as $m) {
                    if ($estados[$m] === 'completado') $completados_t2++;
                    if ($estados[$m] === 'disponible') $hay_disponible_t2 = true;
                }

                if (!$hay_disponible_t2 && $completados_t2 < 3) {
                    foreach ($tier2 as $m) {
                        if ($estados[$m] === 'bloqueado') {
                            $modelos[$m]->estatus = 'seleccionable';
                            $modelos[$m]->guardar();
                        }
                    }
                }
            }
        }
    }

    public static function elegirModulo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION)) session_start();

            $id_usuario = $_SESSION['id_usuario'];
            $id_modulo = (int)$_POST['id_modulo_elegido'];

            // Obtenemos el módulo que quieren desbloquear
            $query = "SELECT * FROM progreso_modulos WHERE id_usuario = {$id_usuario} AND id_modulo = {$id_modulo} LIMIT 1";
            $res = ProgresoModulo::consultarSQL($query);
            $modulo_elegido = !empty($res) ? array_shift($res) : null;

            // Si es un módulo legítimamente seleccionable
            if ($modulo_elegido && $modulo_elegido->estatus === 'seleccionable') {

                // 1. Lo hacemos disponible y le ponemos su fecha de inicio
                $modulo_elegido->estatus = 'disponible';
                $modulo_elegido->fecha_desbloqueo = date('Y-m-d H:i:s');
                $modulo_elegido->guardar();

                // 2. Regresamos a sus "hermanos" seleccionables al estado de bloqueado temporal
                $queryOtros = "SELECT * FROM progreso_modulos WHERE id_usuario = {$id_usuario} AND estatus = 'seleccionable'";
                $otros = ProgresoModulo::consultarSQL($queryOtros);
                foreach ($otros as $otro) {
                    $otro->estatus = 'bloqueado';
                    $otro->guardar();
                }

                // 3. Redirigimos al usuario para que comience de inmediato
                header("Location: /modulo" . $id_modulo);
                exit;
            }

            header("Location: /panel-modulos");
            exit;
        }
    }

    // En CreceController.php

public static function diploma(Router $router) {
    if (!isset($_SESSION)) {
        session_start();
    }

    // 1. Protección de la ruta
    if (!isset($_SESSION['login']) || !$_SESSION['login']) {
        header('Location: /');
        return;
    }

    $id_usuario = $_SESSION['id_usuario'];
    $usuario = \Model\Usuario::find($id_usuario);

    // 2. Solo permitir si ya terminó (id_cuestionario_pendiente == 14)
    if ($usuario->id_cuestionario_pendiente != 14) {
        header('Location: /panel-modulos');
        return;
    }

    // 3. Preparar la fecha actual en formato texto
    $meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
    $fecha = date('d') . " de " . $meses[date('n')-1] . " de " . date('Y');

    // 4. Renderizar la vista (asumiendo que diploma.php está en views/crece/diploma.php)
    $router->render('crece/diploma', [
        'titulo' => 'Mi Reconocimiento | CRECE',
        'usuario' => $usuario,
        'fecha' => $fecha
    ]);
}
}
