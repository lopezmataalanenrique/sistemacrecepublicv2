<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\CreceController;
use Controllers\LoginController;
use Controllers\CuestionarioController;
use Controllers\ResultadosController;
use MVC\Router;

$router = new Router();

// Página principal
$router->get('/', [LoginController::class, 'inicio']);
$router->post('/', [LoginController::class, 'inicio']);
// Iniciar Sesión
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
// Cerrar Sesión
$router->get('/logout', [LoginController::class, 'logout']);
// Recuperar contraseña
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);
// Crear cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);
// Confirmar cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);
// Pantalla para usuarios menores de 18 años
$router->get('/menorEdad', [LoginController::class, 'menorEdad']);
$router->get('/tipoTratamiento', [LoginController::class, 'tipoTratamiento']);
$router->get('/canalizacion', [LoginController::class, 'canalizacion']);
// Area privada
// Cuestionario sociodemografico
// --- Rutas de Cuestionarios del Sistema CRECE ---

// 2. Sociodemográfico
$router->get('/c-sociodemografico', [CuestionarioController::class, 'sociodemografico']);
$router->post('/c-sociodemografico', [CuestionarioController::class, 'sociodemografico']);

// 3. PSS-10
$router->get('/c-pss-10', [CuestionarioController::class, 'pss10']);
$router->post('/c-pss-10', [CuestionarioController::class, 'pss10']);

// 4. MINI
$router->get('/c-mini', [CuestionarioController::class, 'mini']);
$router->post('/c-mini', [CuestionarioController::class, 'mini']);

// 5. PHQ-9
$router->get('/c-phq-9', [CuestionarioController::class, 'phq9']);
$router->post('/c-phq-9', [CuestionarioController::class, 'phq9']);

// 6. GAD-7
$router->get('/c-gad-7', [CuestionarioController::class, 'gad7']);
$router->post('/c-gad-7', [CuestionarioController::class, 'gad7']);

// 7. AAQ-II
$router->get('/c-aaq-ii', [CuestionarioController::class, 'aaqii']);
$router->post('/c-aaq-ii', [CuestionarioController::class, 'aaqii']);

// 8. WHO-5
$router->get('/c-who-5', [CuestionarioController::class, 'who5']);
$router->post('/c-who-5', [CuestionarioController::class, 'who5']);

// 9. Autocompasión
$router->get('/c-scs', [CuestionarioController::class, 'scs']);
$router->post('/c-scs', [CuestionarioController::class, 'scs']);

// 10. WHOQOL-BREF
$router->get('/c-whoqol-bref', [CuestionarioController::class, 'whoqolbref']);
$router->post('/c-whoqol-bref', [CuestionarioController::class, 'whoqolbref']);

// 11. APOI
$router->get('/c-apoi', [CuestionarioController::class, 'apoi']);
$router->post('/c-apoi', [CuestionarioController::class, 'apoi']);

// 12. MAAS
$router->get('/c-maas', [CuestionarioController::class, 'maas']);
$router->post('/c-maas', [CuestionarioController::class, 'maas']);

// 13. SF-12
$router->get('/resultados-iniciales', [ResultadosController::class, 'resultadosIniciales']);
$router->post('/resultados-iniciales', [ResultadosController::class, 'resultadosIniciales']);

$router->get('/panel-modulos', [CreceController::class, 'panel']);
$router->post('/panel-modulos', [CreceController::class, 'panel']);

$router->get('/modulo1', [CreceController::class, 'modulo1']);
$router->post('/modulo1', [CreceController::class, 'modulo1']);

$router->get('/modulo2', [CreceController::class, 'modulo2']);
$router->post('/modulo2', [CreceController::class, 'modulo2']);

$router->get('/modulo3', [CreceController::class, 'modulo3']);
$router->post('/modulo3', [CreceController::class, 'modulo3']);

$router->get('/modulo4', [CreceController::class, 'modulo4']);
$router->post('/modulo4', [CreceController::class, 'modulo4']);

$router->get('/modulo5', [CreceController::class, 'modulo5']);
$router->post('/modulo5', [CreceController::class, 'modulo5']);

$router->get('/modulo6', [CreceController::class, 'modulo6']);
$router->post('/modulo6', [CreceController::class, 'modulo6']);

$router->get('/modulo7', [CreceController::class, 'modulo7']);
$router->post('/modulo7', [CreceController::class, 'modulo7']);

$router->post('/elegir-modulo', [Controllers\CreceController::class, 'elegirModulo']);

$router->get('/guardar-actividad', [CreceController::class, 'guardarActividad']);
$router->post('/guardar-actividad', [CreceController::class, 'guardarActividad']);

$router->get('/c-salida', [Controllers\CuestionarioController::class, 'salida']);
$router->post('/c-salida', [Controllers\CuestionarioController::class, 'salida']);

$router->get('/diploma', [Controllers\CreceController::class, 'diploma']);

$router->comprobarRutas();
