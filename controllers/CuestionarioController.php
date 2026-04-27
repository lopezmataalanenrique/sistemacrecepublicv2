<?php

namespace Controllers;

use Model\Usuario;
use Model\Encuesta;
use Model\Respuesta;
use Model\RespuestaActividad;
use MVC\Router;

class CuestionarioController
{
    public static function sociodemografico(Router $router)
    {
        session_start();

        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = Usuario::find($id_usuario);

        if ($usuario->id_cuestionario_pendiente != 2) {
            header('Location: /');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas_enviadas = $_POST['respuestas'] ?? [];
            $textos_enviados = $_POST['respuestas_texto'] ?? [];
            $alertas = [];
            $p101 = $_POST['respuestas'][101] ?? null;

            if (!$p101) {
                // Al restar 100, la alerta dirá "Pregunta 1"
                Usuario::setAlerta('error', 'La pregunta 1 (Estado civil) es obligatoria');
            }

            $p102 = $_POST['respuestas'][102] ?? null;

            if (!$p102) {
                Usuario::setAlerta('error', 'La pregunta 2 (Nivel de estudios) es obligatoria');
            }

            $p103 = $_POST['respuestas'][103] ?? null;

            if (!$p103) {
                Usuario::setAlerta('error', 'La pregunta 3 (Ocupación) es obligatoria');
            }

            // Validación Pregunta 4 (Lugar de residencia)
            $p104 = $_POST['respuestas'][104] ?? null;
            if (!$p104) {
                Usuario::setAlerta('error', 'La pregunta 4 (Lugar de residencia) es obligatoria');
            }

            // Validación Pregunta 5 (Personas con las que vive)
            $p105 = $_POST['respuestas'][105] ?? null;
            if (!$p105) {
                Usuario::setAlerta('error', 'La pregunta 5 (Personas con las que vive) es obligatoria');
            }
            // Validación Pregunta 6 (Red de apoyo)
            $p106 = $_POST['respuestas'][106] ?? null;
            if (!$p106) {
                Usuario::setAlerta('error', 'La pregunta 6 (Red de apoyo) es obligatoria');
            }

            // Validación Pregunta 7 (Integrantes de red de apoyo)
            $p107 = $_POST['respuestas'][107] ?? null;
            if (!$p107) {
                Usuario::setAlerta('error', 'La pregunta 7 (Integrantes de red de apoyo) es obligatoria');
            }

            // Validación Pregunta 8 (Condición física crónica)
            $p108 = $_POST['respuestas'][108] ?? null;
            if (!$p108) {
                Usuario::setAlerta('error', 'La pregunta 8 (Condición física crónica) es obligatoria');
            }

            // Validación Pregunta 9 (Tiempo de diagnóstico)
            $p109 = $_POST['respuestas'][109] ?? null;
            if (!$p109) {
                Usuario::setAlerta('error', 'La pregunta 9 (Tiempo de diagnóstico) es obligatoria');
            }

            // Validación Pregunta 10 (Dolor en condición crónica)
            $p110 = $_POST['respuestas'][110] ?? null;
            if (!$p110) {
                Usuario::setAlerta('error', 'La pregunta 10 (Dolor en condición crónica) es obligatoria');
            }

            // Validación Pregunta 11 (Escala de dolor)
            $p111 = $_POST['respuestas'][111] ?? null;
            if (!$p111) {
                Usuario::setAlerta('error', 'La pregunta 11 (Escala de intensidad del dolor) es obligatoria');
            }

            // Validación Pregunta 12 (Servicio médico)
            $p112 = $_POST['respuestas'][112] ?? null;
            if (!$p112) {
                Usuario::setAlerta('error', 'La pregunta 12 (Servicio médico) es obligatoria');
            }

            // Validación Pregunta 13 (Tipo de atención médica)
            $p113 = $_POST['respuestas'][113] ?? null;
            if (!$p113) {
                Usuario::setAlerta('error', 'La pregunta 13 (Tipo de atención médica) es obligatoria');
            }

            // Validación Pregunta 14 (Frecuencia de visitas médicas)
            $p114 = $_POST['respuestas'][114] ?? null;
            if (!$p114) {
                Usuario::setAlerta('error', 'La pregunta 14 (Frecuencia de visitas médicas) es obligatoria');
            }

            // Validación Pregunta 15 (Comprensión de la condición)
            $p115 = $_POST['respuestas'][115] ?? null;
            if (!$p115) {
                Usuario::setAlerta('error', 'La pregunta 15 (Comprensión de la condición) es obligatoria');
            }

            // Validación Pregunta 16 (Adherencia al tratamiento)
            $p116 = $_POST['respuestas'][116] ?? null;
            if (!$p116) {
                Usuario::setAlerta('error', 'La pregunta 16 (Adherencia al tratamiento) es obligatoria');
            }

            // Validación Pregunta 17 (Medicamentos salud mental)
            $p117 = $_POST['respuestas'][117] ?? null;
            if (!$p117) {
                Usuario::setAlerta('error', 'La pregunta 17 (Medicamentos salud mental) es obligatoria');
            }

            // Validación Pregunta 18 (Interferencia en actividades)
            $p118 = $_POST['respuestas'][118] ?? null;
            if (!$p118) {
                Usuario::setAlerta('error', 'La pregunta 18 (Interferencia en actividades) es obligatoria');
            }

            // Validación Pregunta 19 (Requerimiento de cuidador)
            $p119 = $_POST['respuestas'][119] ?? null;
            if (!$p119) {
                Usuario::setAlerta('error', 'La pregunta 19 (Requerimiento de cuidador) es obligatoria');
            }

            // Validación Pregunta 20 (Habilidad digital)
            $p120 = $_POST['respuestas'][120] ?? null;
            if (!$p120) {
                Usuario::setAlerta('error', 'La pregunta 20 (Habilidad digital) es obligatoria');
            }

            // Validación Pregunta 21 (Dispositivo de uso)
            $p121 = $_POST['respuestas'][121] ?? null;
            if (!$p121) {
                Usuario::setAlerta('error', 'La pregunta 21 (Dispositivo de uso) es obligatoria');
            }

            // Validación Pregunta 22 (Tipo de conexión)
            $p122 = $_POST['respuestas'][122] ?? null;
            if (!$p122) {
                Usuario::setAlerta('error', 'La pregunta 22 (Tipo de conexión) es obligatoria');
            }

            $alertas = Usuario::getAlertas();

            // Si paso la validación (no hay alertas)
            if (empty($alertas)) {
                $db = Usuario::getDB();
                $db->begin_transaction();

                try {
                    $id_tipo = ($usuario->id_estatus == '1' || $usuario->id_estatus == '2') ? 1 : 3;

                    $encuesta = new Encuesta([
                        'id_usuario' => $id_usuario,
                        'id_cuestionario' => 2,
                        'id_tipo' => $id_tipo,
                        'fecha_encuesta' => date('Y-m-d H:i:s')
                    ]);

                    $resultado = $encuesta->guardar();
                    if (!$resultado) throw new \Exception("Error al crear la encuesta");

                    $id_encuesta_generada = $resultado['id'];

                    foreach ($_POST['respuestas'] as $id_pregunta => $id_opcion) {
                        $texto = $_POST['respuestas_texto'][$id_pregunta] ?? null;

                        $respuesta = new Respuesta([
                            'id_encuesta' => $id_encuesta_generada, // ID que viene del $resultado['id']
                            'id_pregunta' => $id_pregunta,
                            'id_opcion_seleccionada' => $id_opcion,
                            'respuesta_texto' => $texto,
                            'valor_final_puntaje' => 0
                        ]);

                        // Si esto devuelve false, es que algo en el modelo o la BD falló
                        if (!$respuesta->guardar()) {
                            throw new \Exception("Error guardando pregunta $id_pregunta");
                        }
                    }

                    // Solo avanzamos al PSS-10 si ya terminaste de implementar/probar todo
                    $usuario->id_cuestionario_pendiente = 3;
                    $usuario->guardar();

                    $db->commit();
                    header('Location: /c-pss-10');
                    return;
                } catch (\Exception $e) {
                    $db->rollback();
                    Usuario::setAlerta('error', 'Error: ' . $e->getMessage());
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('cuestionarios/c-sociodemografico', [
            'titulo' => 'Sociodemográfico',
            'alertas' => $alertas,
            'respuestas' => $respuestas_enviadas ?? [],
            'respuestas_texto' => $textos_enviados ?? []
        ]);
    }

    public static function pss10(Router $router)
    {
        session_start();

        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = Usuario::find($id_usuario);

        // Verificamos que sea el turno del PSS-10 (ID 3)
        if ($usuario->id_cuestionario_pendiente != 3) {
            header('Location: /');
            return;
        }

        $respuestas_enviadas = [];
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas_enviadas = $_POST['respuestas'] ?? [];

            // --- VALIDACIÓN PREGUNTA A PREGUNTA (Exactamente como sociodemográfico) ---
            $preguntas_info = [
                201 => '1',
                202 => '2',
                203 => '3',
                204 => '6',
                205 => '7',
                206 => '8',
                207 => '9',
                208 => '10',
                209 => '11',
                210 => '14'
            ];

            foreach ($preguntas_info as $id => $num) {
                if (!isset($respuestas_enviadas[$id])) {
                    Usuario::setAlerta('error', "La pregunta {$num} es obligatoria");
                }
            }

            $alertas = Usuario::getAlertas();

            if (empty($alertas)) {
                $db = Usuario::getDB();
                $db->begin_transaction();

                try {
                    $id_tipo = ($usuario->id_estatus == '4') ? 3 : 1;

                    $encuesta = new Encuesta([
                        'id_usuario' => $id_usuario,
                        'id_cuestionario' => 3, // PSS-10
                        'id_tipo' => $id_tipo,
                        'fecha_encuesta' => date('Y-m-d H:i:s')
                    ]);

                    $resultado_encuesta = $encuesta->guardar();
                    if (!$resultado_encuesta) throw new \Exception("Error al crear la encuesta PSS-10");

                    $id_encuesta_generada = $resultado_encuesta['id'];

                    // Reactivos que se invierten (0=4, 1=3, 2=2, 3=1, 4=0)
                    $inversos = [204, 205, 207, 208];

                    foreach ($respuestas_enviadas as $id_pregunta => $id_opcion) {
                        // El valor nominal es el último dígito del ID de opción (0-4)
                        $valor_nominal = intval(substr($id_opcion, -1));

                        // Lógica de inversión
                        $valor_final = in_array($id_pregunta, $inversos) ? (4 - $valor_nominal) : $valor_nominal;

                        $respuesta = new Respuesta([
                            'id_encuesta' => $id_encuesta_generada,
                            'id_pregunta' => $id_pregunta,
                            'id_opcion_seleccionada' => $id_opcion,
                            'respuesta_texto' => null,
                            'valor_final_puntaje' => $valor_final // AQUÍ GUARDAMOS EL VALOR REAL
                        ]);

                        if (!$respuesta->guardar()) {
                            throw new \Exception("Error guardando pregunta PSS $id_pregunta");
                        }
                    }

                    // --- EN CuestionarioController.php -> pss10() ---
                    // Avanzamos al siguiente cuestionario dependiendo del estatus
                    if ($usuario->id_estatus == '4') {
                        $usuario->id_cuestionario_pendiente = 5; // SALTA EL MINI Y VA AL PHQ-9
                        $usuario->guardar();
                        $db->commit();
                        header('Location: /c-phq-9');
                    } else {
                        $usuario->id_cuestionario_pendiente = 4; // VA AL MINI NORMALMENTE
                        $usuario->guardar();
                        $db->commit();
                        header('Location: /c-mini');
                    }
                    return;
                } catch (\Exception $e) {
                    $db->rollback();
                    Usuario::setAlerta('error', 'Error: ' . $e->getMessage());
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('cuestionarios/c-pss-10', [
            'titulo' => 'Escala de Estrés Percibido (PSS-10)',
            'alertas' => $alertas,
            'respuestas' => $respuestas_enviadas
        ]);
    }

    public static function mini(Router $router)
    {
        session_start();

        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = Usuario::find($id_usuario);

        if ($usuario->id_cuestionario_pendiente != 4) {
            header('Location: /');
            return;
        }

        $respuestas_enviadas = [];
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas_enviadas = $_POST['respuestas'] ?? [];

            // Validación obligatoria pregunta a pregunta
            $preguntas_mini = [301, 302, 303, 304, 305, 306];
            foreach ($preguntas_mini as $id) {
                if (!isset($respuestas_enviadas[$id])) {
                    $num_visual = $id - 300;
                    Usuario::setAlerta('error', "La pregunta {$num_visual} es obligatoria");
                }
            }

            $alertas = Usuario::getAlertas();

            if (empty($alertas)) {
                $db = Usuario::getDB();
                $db->begin_transaction();

                try {
                    // 1. Crear la cabecera de la encuesta
                    $id_tipo = ($usuario->id_estatus == '1' || $usuario->id_estatus == '2') ? 1 : 3;
                    $encuesta = new Encuesta([
                        'id_usuario' => $id_usuario,
                        'id_cuestionario' => 4,
                        'id_tipo' => $id_tipo,
                        'fecha_encuesta' => date('Y-m-d H:i:s')
                    ]);

                    $resultado_encuesta = $encuesta->guardar();
                    $id_encuesta_generada = $resultado_encuesta['id'];

                    // 2. Guardar respuestas y extraer valores para la lógica de riesgo
                    // Recordatorio: SÍ termina en '02', NO termina en '01'
                    $eval = [];
                    foreach ($respuestas_enviadas as $id_pregunta => $id_opcion) {
                        $es_si = (substr($id_opcion, -1) === '2');
                        $eval[$id_pregunta] = $es_si;

                        $respuesta = new Respuesta([
                            'id_encuesta' => $id_encuesta_generada,
                            'id_pregunta' => $id_pregunta,
                            'id_opcion_seleccionada' => $id_opcion,
                            'valor_final_puntaje' => $es_si ? 1 : 0
                        ]);
                        $respuesta->guardar();
                    }

                    // --- LÓGICA DE CANALIZACIÓN SOLICITADA ---
                    // Moderado: 3 o (2 + 6)
                    $riesgo_moderado = $eval[303] || ($eval[302] && $eval[306]);

                    // Severo: 4 o 5 o (3 + 6)
                    $riesgo_severo = $eval[304] || $eval[305] || ($eval[303] && $eval[306]);

                    if ($riesgo_moderado || $riesgo_severo) {
                        $usuario->id_estatus = 2; // Actualizar a Riesgo suicida
                    }

                    // 3. Avanzar flujo (Cuestionario 5)
                    $usuario->id_cuestionario_pendiente = 5;
                    $usuario->guardar();

                    $db->commit();
                    header('Location: /c-phq-9'); // El flujo NO se interrumpe
                    return;
                } catch (\Exception $e) {
                    $db->rollback();
                    Usuario::setAlerta('error', 'Error en el sistema: ' . $e->getMessage());
                }
            }
        }

        $router->render('cuestionarios/c-mini', [
            'titulo' => 'Cuestionario MINI',
            'alertas' => Usuario::getAlertas(),
            'respuestas' => $respuestas_enviadas
        ]);
    }

    public static function phq9(Router $router)
    {
        session_start();

        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = Usuario::find($id_usuario);

        if ($usuario->id_cuestionario_pendiente != 5) {
            header('Location: /');
            return;
        }

        $respuestas_enviadas = [];
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas_enviadas = $_POST['respuestas'] ?? [];

            // --- VALIDACIÓN PREGUNTA A PREGUNTA ---
            for ($i = 401; $i <= 409; $i++) {
                if (!isset($respuestas_enviadas[$i])) {
                    $num_visual = $i - 400;
                    Usuario::setAlerta('error', "La pregunta {$num_visual} es obligatoria");
                }
            }

            $alertas = Usuario::getAlertas();

            if (empty($alertas)) {
                $db = Usuario::getDB();
                $db->begin_transaction();

                try {
                    $id_tipo = ($usuario->id_estatus == '4') ? 3 : 1;

                    $encuesta = new Encuesta([
                        'id_usuario' => $id_usuario,
                        'id_cuestionario' => 5,
                        'id_tipo' => $id_tipo,
                        'fecha_encuesta' => date('Y-m-d H:i:s')
                    ]);

                    $resultado_encuesta = $encuesta->guardar();
                    $id_encuesta_generada = $resultado_encuesta['id'];

                    $puntaje_total_phq9 = 0; // Acumulador para la severidad

                    foreach ($respuestas_enviadas as $id_pregunta => $id_opcion) {
                        $valor_puntaje = intval(substr($id_opcion, -1));
                        $puntaje_total_phq9 += $valor_puntaje; // Sumamos cada respuesta

                        // --- LÓGICA DE RIESGO ÍTEM 9 ---
                        if ($id_pregunta == 409 && $valor_puntaje === 3) {
                            $usuario->id_estatus = 2;
                        }

                        $respuesta = new Respuesta([
                            'id_encuesta' => $id_encuesta_generada,
                            'id_pregunta' => $id_pregunta,
                            'id_opcion_seleccionada' => $id_opcion,
                            'valor_final_puntaje' => $valor_puntaje
                        ]);

                        if (!$respuesta->guardar()) {
                            throw new \Exception("Error guardando pregunta PHQ-9 $id_pregunta");
                        }
                    }

                    // --- LÓGICA DE RIESGO POR PUNTUACIÓN TOTAL ---
                    // Si la suma de los 9 ítems es >= 20 (Depresión Grave)
                    if ($puntaje_total_phq9 >= 20) {
                        $usuario->id_estatus = 2;
                    }

                    // Avanzar al GAD-7 (ID 6)
                    $usuario->id_cuestionario_pendiente = 6;
                    $usuario->guardar();

                    $db->commit();
                    header('Location: /c-gad-7');
                    return;
                } catch (\Exception $e) {
                    $db->rollback();
                    Usuario::setAlerta('error', 'Error en el sistema: ' . $e->getMessage());
                }
            }
        }

        $router->render('cuestionarios/c-phq-9', [
            'titulo' => 'Cuestionario sobre la Salud del Paciente (PHQ-9)',
            'alertas' => $alertas,
            'respuestas' => $respuestas_enviadas
        ]);
    }

    public static function gad7(Router $router)
    {
        session_start();

        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = Usuario::find($id_usuario);

        // Verificamos que sea el turno del GAD-7 (ID 6)
        if ($usuario->id_cuestionario_pendiente != 6) {
            header('Location: /');
            return;
        }

        $respuestas_enviadas = [];
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas_enviadas = $_POST['respuestas'] ?? [];

            // --- VALIDACIÓN PREGUNTA A PREGUNTA ---
            for ($i = 501; $i <= 507; $i++) {
                if (!isset($respuestas_enviadas[$i])) {
                    $num_visual = $i - 500;
                    Usuario::setAlerta('error', "La pregunta {$num_visual} es obligatoria");
                }
            }

            $alertas = Usuario::getAlertas();

            if (empty($alertas)) {
                $db = Usuario::getDB();
                $db->begin_transaction();

                try {
                    $id_tipo = ($usuario->id_estatus == '4') ? 3 : 1;

                    $encuesta = new Encuesta([
                        'id_usuario' => $id_usuario,
                        'id_cuestionario' => 6, // GAD-7
                        'id_tipo' => $id_tipo,
                        'fecha_encuesta' => date('Y-m-d H:i:s')
                    ]);

                    $resultado_encuesta = $encuesta->guardar();
                    $id_encuesta_generada = $resultado_encuesta['id'];

                    $puntaje_total_gad = 0;

                    foreach ($respuestas_enviadas as $id_pregunta => $id_opcion) {
                        // El valor es el último dígito del ID (0, 1, 2, 3)
                        $valor_puntaje = intval(substr($id_opcion, -1));
                        $puntaje_total_gad += $valor_puntaje;

                        $respuesta = new Respuesta([
                            'id_encuesta' => $id_encuesta_generada,
                            'id_pregunta' => $id_pregunta,
                            'id_opcion_seleccionada' => $id_opcion,
                            'valor_final_puntaje' => $valor_puntaje
                        ]);

                        if (!$respuesta->guardar()) {
                            throw new \Exception("Error guardando pregunta GAD-7 $id_pregunta");
                        }
                    }

                    // --- LÓGICA DE CANALIZACIÓN ---
                    // Si el puntaje es >= 15, se marca para canalización (id_estatus = 2)
                    if ($puntaje_total_gad >= 15) {
                        $usuario->id_estatus = 2;
                    }

                    // Avanzar al AAQ-II (ID 7)
                    $usuario->id_cuestionario_pendiente = 7;
                    $usuario->guardar();

                    $db->commit();
                    header('Location: /c-aaq-ii');
                    return;
                } catch (\Exception $e) {
                    $db->rollback();
                    Usuario::setAlerta('error', 'Error en el sistema: ' . $e->getMessage());
                }
            }
        }

        $router->render('cuestionarios/c-gad-7', [
            'titulo' => 'Cuestionario de Ansiedad Generalizada (GAD-7)',
            'alertas' => $alertas,
            'respuestas' => $respuestas_enviadas
        ]);
    }

    public static function aaqii(Router $router)
    {
        session_start();

        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = Usuario::find($id_usuario);

        // Verificamos que sea el turno del AAQ-II (ID 7)
        if ($usuario->id_cuestionario_pendiente != 7) {
            header('Location: /');
            return;
        }

        $respuestas_enviadas = [];
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas_enviadas = $_POST['respuestas'] ?? [];

            // --- VALIDACIÓN PREGUNTA A PREGUNTA ---
            for ($i = 601; $i <= 610; $i++) {
                if (!isset($respuestas_enviadas[$i])) {
                    $num_visual = $i - 600;
                    Usuario::setAlerta('error', "La pregunta {$num_visual} es obligatoria");
                }
            }

            $alertas = Usuario::getAlertas();

            if (empty($alertas)) {
                $db = Usuario::getDB();
                $db->begin_transaction();

                try {
                    $id_tipo = ($usuario->id_estatus == '4') ? 3 : 1;

                    $encuesta = new Encuesta([
                        'id_usuario' => $id_usuario,
                        'id_cuestionario' => 7, // AAQ-II
                        'id_tipo' => $id_tipo,
                        'fecha_encuesta' => date('Y-m-d H:i:s')
                    ]);

                    $resultado_encuesta = $encuesta->guardar();
                    $id_encuesta_generada = $resultado_encuesta['id'];

                    // Reactivos inversos según tu instrucción: 1, 6 y 10
                    $inversos = [601, 606, 610];

                    foreach ($respuestas_enviadas as $id_pregunta => $id_opcion) {
                        // El valor nominal es el último dígito del ID (1 al 7)
                        $valor_nominal = intval(substr($id_opcion, -1));

                        // Lógica de inversión: 7=1, 6=2, 5=3, 4=4, 3=5, 2=6, 1=7
                        // Fórmula: 8 - valor_nominal
                        $valor_final = in_array($id_pregunta, $inversos) ? (8 - $valor_nominal) : $valor_nominal;

                        $respuesta = new Respuesta([
                            'id_encuesta' => $id_encuesta_generada,
                            'id_pregunta' => $id_pregunta,
                            'id_opcion_seleccionada' => $id_opcion,
                            'valor_final_puntaje' => $valor_final
                        ]);

                        if (!$respuesta->guardar()) {
                            throw new \Exception("Error guardando pregunta AAQ-II $id_pregunta");
                        }
                    }

                    // Avanzar al WHO-5 (ID 8)
                    $usuario->id_cuestionario_pendiente = 8;
                    $usuario->guardar();

                    $db->commit();
                    header('Location: /c-who-5');
                    return;
                } catch (\Exception $e) {
                    $db->rollback();
                    Usuario::setAlerta('error', 'Error en el sistema: ' . $e->getMessage());
                }
            }
        }

        $router->render('cuestionarios/c-aaq-ii', [
            'titulo' => 'Cuestionario de Aceptación y Acción (AAQ-II)',
            'alertas' => $alertas,
            'respuestas' => $respuestas_enviadas
        ]);
    }

    public static function who5(Router $router)
    {
        session_start();

        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = Usuario::find($id_usuario);

        // Verificamos que sea el turno del WHO-5 (ID 8)
        if ($usuario->id_cuestionario_pendiente != 8) {
            header('Location: /');
            return;
        }

        $respuestas_enviadas = [];
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas_enviadas = $_POST['respuestas'] ?? [];

            // --- VALIDACIÓN PREGUNTA A PREGUNTA (701 a 705) ---
            for ($i = 701; $i <= 705; $i++) {
                if (!isset($respuestas_enviadas[$i])) {
                    $num_visual = $i - 700;
                    Usuario::setAlerta('error', "La pregunta {$num_visual} es obligatoria");
                }
            }

            $alertas = Usuario::getAlertas();

            if (empty($alertas)) {
                $db = Usuario::getDB();
                $db->begin_transaction();

                try {
                    $id_tipo = ($usuario->id_estatus == '4') ? 3 : 1;

                    $encuesta = new Encuesta([
                        'id_usuario' => $id_usuario,
                        'id_cuestionario' => 8,
                        'id_tipo' => $id_tipo,
                        'fecha_encuesta' => date('Y-m-d H:i:s')
                    ]);

                    $resultado_encuesta = $encuesta->guardar();
                    $id_encuesta_generada = $resultado_encuesta['id'];

                    foreach ($respuestas_enviadas as $id_pregunta => $id_opcion) {
                        // El valor es el último dígito del ID (0, 1, 2, 3, 4, 5)
                        $valor_puntaje = intval(substr($id_opcion, -1));

                        $respuesta = new Respuesta([
                            'id_encuesta' => $id_encuesta_generada,
                            'id_pregunta' => $id_pregunta,
                            'id_opcion_seleccionada' => $id_opcion,
                            'valor_final_puntaje' => $valor_puntaje
                        ]);

                        if (!$respuesta->guardar()) {
                            throw new \Exception("Error guardando pregunta WHO-5 $id_pregunta");
                        }
                    }

                    // Avanzar al SCS (Escala de Autocompasión - ID 9)
                    $usuario->id_cuestionario_pendiente = 9;
                    $usuario->guardar();

                    $db->commit();
                    header('Location: /c-scs');
                    return;
                } catch (\Exception $e) {
                    $db->rollback();
                    Usuario::setAlerta('error', 'Error en el sistema: ' . $e->getMessage());
                }
            }
        }

        $router->render('cuestionarios/c-who-5', [
            'titulo' => 'Índice de Bienestar (WHO-5)',
            'alertas' => $alertas,
            'respuestas' => $respuestas_enviadas
        ]);
    }

    public static function scs(Router $router)
    {
        session_start();

        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = Usuario::find($id_usuario);

        // Verificamos que sea el turno del SCS (ID 9)
        if ($usuario->id_cuestionario_pendiente != 9) {
            header('Location: /');
            return;
        }

        $preguntas = [
            801 => '1. Me desapruebo y me juzgo por mis defectos y limitaciones.',
            802 => '2. Cuando me siento desanimado tiendo a obsesionarme y fijarme en todo lo que está mal.',
            803 => '3. Cuando las cosas van mal para mí, veo las dificultades como una parte de la vida por la que todos pasan.',
            804 => '4. Cuando pienso en mis limitaciones tiendo a sentirme más separado y aislado del resto del mundo.',
            805 => '5. Intento ser cariñoso/a conmigo mismo/a cuando siento dolor emocional.',
            806 => '6. Cuando fallo en algo importante para mí, me consumen los sentimientos de insuficiencia.',
            807 => '7. Cuando me siento desanimado y triste, me recuerdo a mí mismo que hay muchas otras personas en el mundo que se sienten como yo.',
            808 => '8. Cuando atravieso épocas muy difíciles, tiendo a ser duro/a conmigo mismo/a.',
            809 => '9. Cuando algo me molesta, trato de mantener mis emociones en equilibrio.',
            810 => '10. Cuando me siento incapaz de alguna manera, trato de recordarme que esos sentimientos de incapacidad son compartidos por la mayoría de las personas.',
            811 => '11. Soy intolerante e impaciente con aquellos aspectos de mi personalidad que no me gustan.',
            812 => '12. Cuando atravieso una situación muy difícil, yo mismo/a me proporciono el cuidado y cariño que necesito.',
            813 => '13. Cuando me siento desanimado/a, tiendo a sentir que probablemente la mayoría de las personas son más felices que yo.',
            814 => '14. Cuando sucede algo doloroso, trato de tener una visión equilibrada de la situación.',
            815 => '15. Intento ver mis fallas como parte de la condición humana.',
            816 => '16. Cuando veo aspectos de mí mismo/a que no me gustan, me deprimo.',
            817 => '17. Cuando me equivoco en algo importante para mí, trato de ver las cosas con perspectiva.',
            818 => '18. Cuando realmente estoy en problemas, tiendo a sentir que a otras personas les debe resultar más fácil.',
            819 => '19. Soy amable conmigo mismo/a cuando estoy experimentando sufrimiento.',
            820 => '20. Cuando algo me molesta me dejo llevar por mis sentimientos.',
            821 => '21. Puedo ser un poco insensible hacia mí mismo/a cuando experimento sufrimiento.',
            822 => '22. Cuando me siento deprimido/a trato de observar mis sentimientos con curiosidad y mente abierta.',
            823 => '23. Soy intolerante con mis propios defectos y limitaciones.',
            824 => '24. Cuando sucede algo doloroso tiendo a exagerar la gravedad del incidente.',
            825 => '25. Cuando fallo en algo que es importante para mí, tiendo a sentirme solo en mi fracaso.',
            826 => '26. Intento ser comprensivo y paciente con aquellos aspectos de mi personalidad que no me gustan.'
        ];

        $respuestas_enviadas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas_enviadas = $_POST['respuestas'] ?? [];

            // Validación: asegurar que las 26 preguntas estén presentes
            foreach ($preguntas as $id => $texto) {
                if (!isset($respuestas_enviadas[$id]) || empty($respuestas_enviadas[$id])) {
                    Usuario::setAlerta('error', "La pregunta " . ($id - 800) . " es obligatoria");
                }
            }

            $alertas = Usuario::getAlertas();

            if (empty($alertas)) {
                $db = Usuario::getDB();
                $db->begin_transaction();
                try {
                    $id_tipo = ($usuario->id_estatus == 4) ? 3 : 1;
                    $encuesta = new Encuesta([
                        'id_usuario' => $id_usuario,
                        'id_cuestionario' => 9,
                        'id_tipo' => $id_tipo,
                        'fecha_encuesta' => date('Y-m-d H:i:s')
                    ]);

                    $resultado = $encuesta->guardar();
                    if (!$resultado) throw new \Exception("Error al crear cabecera de encuesta");

                    $id_encuesta = $resultado['id'];
                    $inversos = [801, 802, 804, 806, 808, 811, 813, 816, 818, 820, 821, 824, 825];

                    foreach ($respuestas_enviadas as $id_pregunta => $id_opcion) {
                        $valor_nominal = intval(substr($id_opcion, -1));
                        $valor_final = in_array($id_pregunta, $inversos) ? (6 - $valor_nominal) : $valor_nominal;

                        $respuesta = new Respuesta([
                            'id_encuesta' => $id_encuesta,
                            'id_pregunta' => $id_pregunta,
                            'id_opcion_seleccionada' => $id_opcion,
                            'valor_final_puntaje' => $valor_final
                        ]);

                        if (!$respuesta->guardar()) throw new \Exception("Error al guardar respuesta $id_pregunta");
                    }

                    // ACTUALIZACIÓN CRÍTICA
                    $usuario->id_cuestionario_pendiente = 10;
                    if (!$usuario->guardar()) throw new \Exception("Error al actualizar el avance del usuario");

                    $db->commit();

                    // Redirigir al siguiente cuestionario
                    header('Location: /c-whoqol-bref');
                    return;
                } catch (\Exception $e) {
                    $db->rollback();
                    Usuario::setAlerta('error', "Hubo un problema: " . $e->getMessage());
                }
            }
        }

        $router->render('cuestionarios/c-scs', [
            'titulo' => 'Escala de Autocompasión (SCS)',
            'alertas' => Usuario::getAlertas(),
            'preguntas' => $preguntas,
            'respuestas' => $respuestas_enviadas
        ]);
    }

    public static function whoqolbref(Router $router)
    {
        session_start();

        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = Usuario::find($id_usuario);

        // Turno del WHOQOL-BREF (ID 10)
        if ($usuario->id_cuestionario_pendiente != 10) {
            header('Location: /');
            return;
        }

        $respuestas_enviadas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas_enviadas = $_POST['respuestas'] ?? [];

            // Validación 901 a 926
            for ($i = 901; $i <= 926; $i++) {
                if (!isset($respuestas_enviadas[$i])) {
                    Usuario::setAlerta('error', "La pregunta " . ($i - 900) . " es obligatoria");
                }
            }

            if (empty(Usuario::getAlertas())) {
                $db = Usuario::getDB();
                $db->begin_transaction();

                try {
                    $encuesta = new Encuesta([
                        'id_usuario' => $id_usuario,
                        'id_cuestionario' => 10,
                        'id_tipo' => ($usuario->id_estatus == 4) ? 3 : 1,
                        'fecha_encuesta' => date('Y-m-d H:i:s')
                    ]);
                    $res = $encuesta->guardar();
                    $id_encuesta = $res['id'];

                    // Reactivos inversos (3 y 4). La 26 ya viene codificada del front (5=Nunca).
                    $inversos = [903, 904];
                    $valores_finales = [];

                    foreach ($respuestas_enviadas as $id_p => $id_o) {
                        $valor_nominal = intval(substr($id_o, -1));
                        $valor_final = in_array($id_p, $inversos) ? (6 - $valor_nominal) : $valor_nominal;

                        $valores_finales[$id_p] = $valor_final;

                        $respuesta = new Respuesta([
                            'id_encuesta' => $id_encuesta,
                            'id_pregunta' => $id_p,
                            'id_opcion_seleccionada' => $id_o,
                            'valor_final_puntaje' => $valor_final
                        ]);
                        $respuesta->guardar();
                    }

                    // --- CÁLCULO DE DOMINIOS (0-100) ---
                    $f_trans = function ($indices) use ($valores_finales) {
                        $suma = 0;
                        foreach ($indices as $i) $suma += $valores_finales[900 + $i];
                        $promedio = $suma / count($indices);
                        // [(Promedio * 4) - 4] * (100 / 16)
                        return (($promedio * 4) - 4) * (6.25);
                    };

                    // Guardaríamos dominios si fuera necesario, o simplemente avanzamos
                    $usuario->id_cuestionario_pendiente = 11;
                    $usuario->guardar();

                    $db->commit();
                    header('Location: /c-maas');
                    return;
                } catch (\Exception $e) {
                    $db->rollback();
                    Usuario::setAlerta('error', "Error: " . $e->getMessage());
                }
            }
        }

        $router->render('cuestionarios/c-whoqol-bref', [
            'titulo' => 'Calidad de Vida (WHOQOL-BREF)',
            'alertas' => Usuario::getAlertas(),
            'respuestas' => $respuestas_enviadas
        ]);
    }

    public static function maas(Router $router)
    {
        session_start();

        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = Usuario::find($id_usuario);

        // Verificamos que sea el turno del MAAS (ID 11 según el nuevo orden)
        if ($usuario->id_cuestionario_pendiente != 11) {
            header('Location: /');
            return;
        }

        $respuestas_enviadas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas_enviadas = $_POST['respuestas'] ?? [];

            // Validación 1101 a 1115
            for ($i = 1101; $i <= 1115; $i++) {
                if (!isset($respuestas_enviadas[$i])) {
                    Usuario::setAlerta('error', "La pregunta " . ($i - 1100) . " es obligatoria");
                }
            }

            if (empty(Usuario::getAlertas())) {
                $db = Usuario::getDB();
                $db->begin_transaction();
                try {
                    $encuesta = new Encuesta([
                        'id_usuario' => $id_usuario,
                        'id_cuestionario' => 11,
                        'id_tipo' => ($usuario->id_estatus == 4) ? 3 : 1,
                        'fecha_encuesta' => date('Y-m-d H:i:s')
                    ]);
                    $res = $encuesta->guardar();
                    $id_encuesta = $res['id'];

                    foreach ($respuestas_enviadas as $id_p => $id_o) {
                        $partes = explode('_', $id_o);
                        $valor_final = isset($partes[1]) ? intval($partes[1]) : intval(substr($id_o, -1));

                        $respuesta = new Respuesta([
                            'id_encuesta' => $id_encuesta,
                            'id_pregunta' => $id_p,
                            'id_opcion_seleccionada' => $id_o,
                            'valor_final_puntaje' => $valor_final
                        ]);
                        $respuesta->guardar();
                    }

                    // Actualizar puntero al siguiente cuestionario: AP-OI (ID 12)
                    $usuario->id_cuestionario_pendiente = 12;
                    if (!$usuario->guardar()) throw new \Exception("Error al actualizar avance");

                    $db->commit();
                    header('Location: /c-apoi');
                    return;
                } catch (\Exception $e) {
                    $db->rollback();
                    Usuario::setAlerta('error', "Hubo un problema: " . $e->getMessage());
                }
            }
        }

        $router->render('cuestionarios/c-maas', [
            'titulo' => 'Escala de Atención Plena (MAAS)',
            'alertas' => Usuario::getAlertas(),
            'respuestas' => $respuestas_enviadas
        ]);
    }

    public static function apoi(Router $router)
    {
        session_start();

        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = Usuario::find($id_usuario);

        // Turno del AP-OI (ID 12 en la secuencia actual)
        if ($usuario->id_cuestionario_pendiente != 12) {
            header('Location: /');
            return;
        }

        $respuestas_enviadas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas_enviadas = $_POST['respuestas'] ?? [];

            // Validación: ítems del 1001 al 1007
            for ($i = 1001; $i <= 1007; $i++) {
                if (!isset($respuestas_enviadas[$i])) {
                    Usuario::setAlerta('error', "La pregunta " . ($i - 1000) . " es obligatoria");
                }
            }

            if (empty(Usuario::getAlertas())) {
                $db = Usuario::getDB();
                $db->begin_transaction();

                try {
                    $encuesta = new Encuesta([
                        'id_usuario' => $id_usuario,
                        'id_cuestionario' => 12,
                        'id_tipo' => ($usuario->id_estatus == 4) ? 3 : 1,
                        'fecha_encuesta' => date('Y-m-d H:i:s')
                    ]);
                    $res = $encuesta->guardar();
                    $id_encuesta = $res['id'];

                    foreach ($respuestas_enviadas as $id_p => $id_o) {
                        $valor_final = intval(substr($id_o, -1));

                        $respuesta = new Respuesta([
                            'id_encuesta' => $id_encuesta,
                            'id_pregunta' => $id_p,
                            'id_opcion_seleccionada' => $id_o,
                            'valor_final_puntaje' => $valor_final
                        ]);
                        $respuesta->guardar();
                    }

                    // --- EN CuestionarioController.php -> apoi() ---
                    if ($usuario->id_estatus == '4') {
                        $usuario->id_cuestionario_pendiente = 13; // VA AL NUEVO CUESTIONARIO DE SALIDA
                        $usuario->guardar();
                        $db->commit();
                        header('Location: /c-salida');
                    } else {
                        $usuario->id_cuestionario_pendiente = 1; // TERMINA PRETEST
                        $usuario->guardar();
                        $db->commit();
                        header('Location: /resultados-iniciales');
                    }
                    return;
                } catch (\Exception $e) {
                    $db->rollback();
                    Usuario::setAlerta('error', "Error al guardar: " . $e->getMessage());
                }
            }
        }

        $router->render('cuestionarios/c-apoi', [
            'titulo' => 'Actitudes hacia Intervenciones Psicológicas Online (AP-OI)',
            'alertas' => Usuario::getAlertas(),
            'respuestas' => $respuestas_enviadas
        ]);
    }

    public static function salida(Router $router)
    {
        // Así evitamos el aviso de sesión duplicada
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = Usuario::find($id_usuario);

        if ($usuario->id_cuestionario_pendiente != 13 || $usuario->id_estatus != '4') {
            header('Location: /panel-modulos');
            return;
        }

        $respuestas_visibles = [];
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas_post = $_POST['respuestas'] ?? [];
            $textos_post = $_POST['respuestas_texto'] ?? [];

            // Persistencia Temporal: Mantiene las respuestas en pantalla si hay un error de validación
            foreach ($respuestas_post as $id => $val) {
                $respuestas_visibles[$id] = $val;
            }
            if (isset($textos_post['1319'])) {
                $respuestas_visibles['1319_texto'] = $textos_post['1319'];
            }

            // Validar que respondieron exactamente las enviadas por el formulario
            $preguntas_esperadas = [1301, 1302, 1303, 1304, 1305, 1306, 1307, 1308, 1309, 1310, 1311, 1312, 1313, 1314, 1315, 1319];
            $faltan_respuestas = false;

            foreach ($preguntas_esperadas as $id_req) {
                if (!isset($respuestas_post[$id_req]) || $respuestas_post[$id_req] === '') {
                    $faltan_respuestas = true;
                    break;
                }
            }

            if ($faltan_respuestas) {
                Usuario::setAlerta('error', 'Por favor, responde todas las preguntas obligatorias.');
            }

            $alertas = Usuario::getAlertas();

            // Si pasa la validación...
            if (empty($alertas)) {
                $db = Usuario::getDB();
                $db->begin_transaction();

                try {
                    // 1. Crear la Encuesta oficial (Cuestionario 13, Tipo 3 = Postest)
                    $encuesta = new Encuesta([
                        'id_usuario' => $id_usuario,
                        'id_cuestionario' => 13,
                        'id_tipo' => 3,
                        'fecha_encuesta' => date('Y-m-d H:i:s')
                    ]);
                    $res = $encuesta->guardar();
                    if (!$res) throw new \Exception("Error al crear la cabecera de la encuesta.");

                    $id_encuesta = $res['id'];

                    // 2. Guardar cada Respuesta individual
                    foreach ($respuestas_post as $id_p => $id_o) {
                        // Mágia matemática: Como los IDs de pregunta tienen 4 dígitos (1301 a 1319)
                        // cortar a partir del índice 4 nos da el valor exacto seleccionado.
                        // Ej: "131210" -> "10", "13011" -> "1"
                        $valor_final = intval(substr($id_o, 4));

                        $texto = $textos_post[$id_p] ?? null;

                        $respuesta = new Respuesta([
                            'id_encuesta' => $id_encuesta,
                            'id_pregunta' => $id_p,
                            'id_opcion_seleccionada' => $id_o,
                            'respuesta_texto' => $texto,
                            'valor_final_puntaje' => $valor_final
                        ]);

                        if (!$respuesta->guardar()) {
                            throw new \Exception("Error guardando la respuesta a la pregunta $id_p");
                        }
                    }

                    // 3. Finalizar el proceso del usuario (Cuestionario pendiente a 0)
                    // 3. Finalizar el proceso del usuario
                    $usuario->id_cuestionario_pendiente = 14;
                    if (!$usuario->guardar()) throw new \Exception("Error al actualizar tu avance.");

                    // Si todo sale bien, confirmamos y enviamos al diploma
                    $db->commit();
                    header('Location: /panel-modulos#seccion-b');
                    return;
                } catch (\Exception $e) {
                    $db->rollback();
                    Usuario::setAlerta('error', "Hubo un problema al guardar: " . $e->getMessage());
                }
            }
        }

        $router->render('cuestionarios/c-salida', [
            'titulo' => 'Instrumentos de Salida',
            'alertas' => Usuario::getAlertas(),
            'respuestas' => $respuestas_visibles
        ]);
    }
}
