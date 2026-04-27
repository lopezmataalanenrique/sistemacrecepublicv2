<?php

namespace Controllers;

use MVC\Router;
use Model\ActiveRecord;
use Model\Usuario;
use Model\ProgresoModulo;

class ResultadosController
{
    public static function resultadosIniciales(Router $router)
    {
        // Evitar el error de session_start() duplicado
        if (!isset($_SESSION)) {
            session_start();
        }

        // Protección de ruta: Si no hay login, redirigir al inicio
        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /');
            return;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $usuario = Usuario::find($id_usuario);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($usuario->id_estatus === '2') {
                // Si el estatus es 2 (Canalizado), va a la vista de canalización
                header('Location: /canalizacion');
                return;
            } else {
                // Cambiar el estatus del usuario a 3 (Activo)
                $usuario->id_estatus = '3';
                $usuario->guardar();

                // VALIDACIÓN: Verificar si ya existen registros de progreso para este usuario
                // Usamos el método 'where' que ya tienes definido en ActiveRecord
                $progresoExistente = ProgresoModulo::where('id_usuario', $id_usuario);

                // En ResultadosController.php
                // Si no se encuentra ningún registro, los creamos
                if (is_null($progresoExistente)) {
                    for ($i = 1; $i <= 7; $i++) {
                        $progreso = new ProgresoModulo([
                            'id_usuario' => $id_usuario,
                            'id_modulo' => $i,
                            // AHORA SOLO EL 1 ES DISPONIBLE AL INICIO
                            'estatus' => ($i === 1) ? 'disponible' : 'bloqueado',
                            'actividad_actual' => 1,
                            'fecha_desbloqueo' => ($i === 1) ? date('Y-m-d H:i:s') : null
                        ]);
                        $progreso->guardar();
                    }
                }

                header('Location: /panel-modulos');
                return;
            }
        }

        // --- LÓGICA PARA OBTENER RESULTADOS (MÉTODO GET) ---

        // Obtener sumas de los cuestionarios principales para la vista de resultados
        $puntaje_pss10 = ActiveRecord::sumarPuntajeCuestionario($id_usuario, 3);
        $puntaje_phq9 = ActiveRecord::sumarPuntajeCuestionario($id_usuario, 5);
        $puntaje_gad7 = ActiveRecord::sumarPuntajeCuestionario($id_usuario, 6);
        $suma_bruta_who5 = ActiveRecord::sumarPuntajeCuestionario($id_usuario, 8);
        $puntaje_who5 = $suma_bruta_who5 * 4;
        $suma_bruta_scs = ActiveRecord::sumarPuntajeCuestionario($id_usuario, 9);
        $puntaje_scs = $suma_bruta_scs / 26;

        // Obtener respuestas del cuestionario 10 para los dominios WHOQOL
        $query = "SELECT id_pregunta, valor_final_puntaje FROM respuestas ";
        $query .= "WHERE id_encuesta = (SELECT id_encuesta FROM encuestas_usuario ";
        $query .= "WHERE id_usuario = $id_usuario AND id_cuestionario = 10 LIMIT 1)";
        $res_db = ActiveRecord::getDB()->query($query);

        $resp = [];
        while ($row = $res_db->fetch_assoc()) {
            $resp[$row['id_pregunta']] = (int)$row['valor_final_puntaje'];
        }

        // Función para calcular y transformar dominios (0-100) según metodología OMS
        $calcularDominio = function ($items) use ($resp) {
            if (empty($items)) return 0;
            $suma = 0;
            $contador = 0;

            foreach ($items as $id) {
                $id_p = 900 + $id;
                if (isset($resp[$id_p])) {
                    $valor = (int)$resp[$id_p];
                    $valor_ajustado = ($valor === 0) ? 1 : $valor;
                    $suma += $valor_ajustado;
                    $contador++;
                }
            }

            if ($contador === 0) return 0;
            $promedio = $suma / $contador;
            $valor_transformado = (($promedio - 1) / 4) * 100;
            return round($valor_transformado, 2);
        };

        // Cálculos por dominio
        $dominios = [
            'fisico'      => $calcularDominio([3, 4, 10, 15, 16, 17, 18]),
            'psicologico' => $calcularDominio([5, 6, 7, 11, 19, 26]),
            'social'      => $calcularDominio([20, 21, 22]),
            'ambiental'   => $calcularDominio([8, 9, 12, 13, 14, 23, 24, 25])
        ];

        $router->render('crece/resultados-iniciales', [
            'titulo' => 'Tus Resultados',
            'puntaje_pss10' => $puntaje_pss10,
            'puntaje_phq9' => $puntaje_phq9,
            'puntaje_gad7' => $puntaje_gad7,
            'puntaje_who5' => $puntaje_who5,
            'puntaje_scs' => $puntaje_scs,
            'dominios_who' => $dominios
        ]);
    }
}
