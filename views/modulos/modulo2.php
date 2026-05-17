<nav class="navbar navbar-pm navbar-expand-lg fixed-top">
    <div class="contenedor-cambiar-size">
        <button class="boton-cambiar-size" onclick="disminuirTexto()">A-</button>
        <button class="boton-cambiar-size" onclick="aumentarTexto()">A+</button>
    </div>
    <div class="container-fluid">
        <a class="navbar-brand navbar-brand-pm" href="/panel-modulos">
            <div class="inicio-pm">
                <div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="30"
                        height="30"
                        viewBox="0 0 24 24"
                        fill="#FFF">
                        <path d="M12.707 2.293l9 9c.63 .63 .184 1.707 -.707 1.707h-1v6a3 3 0 0 1 -3 3h-1v-7a3 3 0 0 0 -2.824 -2.995l-.176 -.005h-2a3 3 0 0 0 -3 3v7h-1a3 3 0 0 1 -3 -3v-6h-1c-.89 0 -1.337 -1.077 -.707 -1.707l9 -9a1 1 0 0 1 1.414 0m.293 11.707a1 1 0 0 1 1 1v7h-4v-7a1 1 0 0 1 .883 -.993l.117 -.007z" />
                    </svg>
                </div>
                <div>
                    <p>Panel</p>
                </div>
            </div>
        </a>
        <div class="navbar-modulo-nombre">
            Módulo 2. Usando la brújula de los valores
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="40"
                height="40"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#FFF"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M4 6l16 0" />
                <path d="M4 12l16 0" />
                <path d="M4 18l16 0" />
            </svg>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <img src="/build/img/logo-crece.webp" alt="Logo del programa CRECE" class="navbar--logo navbar--logo__offcanvas" />
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mt-3">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="offcanvas-body nav-item">
                        <a class="nav-link-c-pm nav-link-c--active-pm" aria-current="page" href="/panel-modulos">Panel</a>
                    </li>
                    <li class="offcanvas-body nav-item">
                        <a class="nav-link-c-pm" href="#">Perfil</a>
                    </li>
                    <li class="offcanvas-body nav-item">
                        <a class="nav-link-c-pm" href="/logout">Cerrar sesión</a>
                    </li>
                    <li class="offcanvas-body nav-item">
                        <a class="nav-link-c-pm" href="#">Saber más</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<header class="encabezado-panel">
    <div class="encabezado-panel-instituciones">
        <a href="https://www.ipn.mx/" target="_blank">
            <img class="encabezado-panel__logo" src="/build/img/logo-ipn.webp" alt="IPN">
        </a>

        <a href="https://www.escom.ipn.mx/" target="_blank">
            <img class="encabezado-panel__logo" src="/build/img/logo-escom.webp" alt="ESCOM">
        </a>

        <a href="https://www.unam.mx/" target="_blank">
            <img class="encabezado-panel__logo" src="/build/img/logo-unam.webp" alt="UNAM">
        </a>

        <a href="https://suayed.iztacala.unam.mx/" target="_blank">
            <img class="encabezado-panel__logo" src="/build/img/logo-suayed.webp" alt="FES Iztacala / SUAYED">
        </a>

        <a href="https://labpsiit.iztacala.unam.mx/" target="_blank">
            <img class="encabezado-panel__logo" src="/build/img/logo-labpsiit.webp" alt="LABPSIIT">
        </a>
    </div>
    <div class="encabezado-panel-logo-crece">
        <img class="encabezado-panel__logo" src="/build/img/logo-crece.webp" alt="Logo del programa CRECE" />
    </div>
</header>

<?php

$actual = (int)$progreso->actividad_actual;

$ya_respondio_intro = !empty($respuestas['201']) && !empty($respuestas['202']) && !empty($respuestas['203']);
function getEstado($id, $actual)
{
    return [
        'visible' => ($id <= $actual) ? 'display: block;' : 'display: none;',
        'completada' => ($id < $actual)
    ];
}
?>

<main class="cuerpo-modulo">

    <section class="encabezado-modulo">

        <h1>Módulo 2. Usando la brújula de los valores</h1>

        <p>¡Hola! qué gusto verte en este módulo del Programa CRECE</p>
        <p>En este espacio exploraremos aquello que da dirección y sentido a tu vida, incluso cuando aparecen dificultades.</p>

        <form method="POST" action="/guardar-actividad" id="form-intro-m2">
            <input type="hidden" name="id_modulo" value="2">
            <input type="hidden" name="actividad_id" value="0">

            <div class="m1-evaluacion-final">
                <p>Antes de comenzar, te invito a hacer una pausa y observar cómo han sido estos últimos días en tu proceso con CRECE. En este tiempo:</p>

                <?php
                $preguntas_intro = [
                    '201' => [
                        'texto' => '¿Noto algún cambio en cómo me relaciono con mis pensamientos o emociones?',
                        'opciones' => ['Sí, claramente', 'Un poco', 'Aún no lo noto']
                    ],

                    '202' => [
                        'texto' => '¿Noto cambios en mis respuestas o comportamientos habituales?',
                        'opciones' => ['Sí, claramente', 'Algunas respuestas', 'Aún no lo noto']
                    ],

                    '203' => [
                        'texto' => '¿Practiqué alguno de los ejercicios y/o experimentos en mi vida diaria?',
                        'opciones' => ['No lo hice', 'Varias veces', 'Una vez']
                    ]
                ];

                foreach ($preguntas_intro as $id => $pregunta):
                ?>
                    <div style="margin-bottom: 3rem;">
                        <p style="font-weight: 700; color: #12307D;">
                            <?php echo $pregunta['texto']; ?>
                        </p>

                        <select name="<?php echo $id; ?>"
                            class="m1-select-personalizado check-validar-intro"
                            style="width: 100%; padding: 1rem; border-radius: 0.8rem;"
                            <?php echo ($ya_respondio_intro) ? 'disabled' : ''; ?>>

                            <option value="">-- Selecciona una opción --</option>

                            <?php foreach ($pregunta['opciones'] as $op): ?>
                                <option value="<?php echo $op; ?>"
                                    <?php echo ($respuestas[$id] ?? '') === $op ? 'selected' : ''; ?>>
                                    <?php echo $op; ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                <?php endforeach; ?>

                <div style="text-align: center; margin-top: 2rem;">
                    <?php if (!$ya_respondio_intro): ?>
                        <button type="submit" id="btn-guardar-intro" class="boton" style="background: #12307D; color: #FFFFFF; padding: 1.5rem 4rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                            Guardar Observación
                        </button>
                    <?php else: ?>
                        <button type="button" class="boton boton-completado" disabled>
                            <i class="fas fa-check"></i> Observación guardada
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </form>

        <p>Gracias por detenerte a observar. Ahora exploremos hacia dónde quieres dirigir tus pasos.</p>
        <p>Vivir con una condición de salud puede hacerte sentir en el límite o fuera de control, sin embargo tus valores (lo que dirige vitalmente tu vida) siguen ahí.</p>
        <p>En este módulo, descubrirás cuáles son esas direcciones que pueden darte sentido, fuerza y coherencia.</p>
    </section>

    <?php $st1 = getEstado(1, $actual); ?>
    <section class="actividad" id="act1" style="<?php echo $st1['visible']; ?>">

        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">

            <h2 class="act-titulo">Actividad 1. Usando la brújula</h2>
            <p>Piensa en una persona o actividad que le da significado a tu vida. ¿Qué valor hay detrás de eso? ¿Qué representa para ti?</p>
            <p>Mientras piensas en ello, observa la siguiente reflexión.</p>
        </div>

        <div class="ebook-seccion">
            <div class="ebook-viewport">
                <div class="ebook-hojas">
                    <div class="hoja active">
                        <div class="hoja-contenido">
                            <img src="/build/img/m2a1_img1.webp" class="img-ebook" alt="Reflexión 1">
                        </div>
                    </div>

                    <div class="hoja">
                        <div class="hoja-contenido">
                            <img src="/build/img/m2a1_img2.webp" class="img-ebook" alt="Reflexión 2">
                        </div>
                    </div>

                    <div class="hoja">
                        <div class="hoja-contenido">
                            <img src="/build/img/m2a1_img3.webp" class="img-ebook" alt="Reflexión 3">
                        </div>
                    </div>

                    <div class="hoja">
                        <div class="hoja-contenido">
                            <img src="/build/img/m2a1_img4.webp" class="img-ebook" alt="Reflexión 4">
                        </div>
                    </div>

                    <div class="hoja">
                        <div class="hoja-contenido">
                            <img src="/build/img/m2a1_img5.webp" class="img-ebook" alt="Reflexión 5">
                        </div>
                    </div>

                </div>
            </div>

            <div class="ebook-controles">
                <button type="button" id="prevEbook" class="btn-ebook">
                    <i class="fas fa-chevron-left"></i> Anterior
                </button>
                <button type="button" id="nextEbook" class="btn-ebook">
                    Siguiente <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="actividad-seccion-texto">
            <p>Todas las personas tenemos aspectos que dan sentido a nuestra vida: personas importantes, actividades significativas o causas que valoramos profundamente. A esto les llamamos valores; ¿recuerdas?, no son metas que se cumplen, sino direcciones que guían nuestras decisiones y acciones cada día.</p>
            <p>En este espacio, podrás reflexionar sobre qué es importante para ti, sin juicios ni respuestas correctas. No se trata de lo que otros esperan, sino de aquello que realmente valoras y deseas cultivar, incluso frente a los desafíos de la salud o del entorno.</p>
            <p>¿Qué tan importante es esto para ti hoy? No hay respuestas correctas o incorrectas.Solo nota qué es importante para ti hoy.</p>
        </div>

        <div>

            <form method="POST" action="/guardar-actividad" id="form-act1-m2">
                <input type="hidden" name="id_modulo" value="2">
                <input type="hidden" name="actividad_id" value="1">

                <div class="m2-evaluacion-areas" style="margin-top: 5rem;">
                    <p style="text-align: center; font-weight: 700; color: #12307D; margin-bottom: 3rem;"> ¿Qué tan importante es esto para ti hoy?</p>

                    <div class="contenedor-sliders" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                        <?php
                        $areas = [
                            'Relaciones Familiares',
                            'Parejas o relación íntima',
                            'Paternidad o maternidad',
                            'Amistades y vida social',
                            'Trabajo o carrera',
                            'Crecimiento personal y aprendizaje',
                            'Esparcimiento y diversión',
                            'Espiritualidad',
                            'Vida en comunidad',
                            'Salud y bienestar físico',
                            'Medio Ambiente',
                            'Arte y belleza'
                        ];

                        foreach ($areas as $index => $area):
                            $id_slider = 211 + $index; // Creamos un ID único para la BD
                            $valor_guardado = $respuestas[$id_slider] ?? 1; // Recuperamos valor o ponemos 1
                        ?>
                            <div class="tarjeta-slider" style="background: #fdfdfd; padding: 2rem; border: 1px solid #e0e0e0; border-radius: 1.2rem;">
                                <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;"><?php echo $area; ?></p>
                                <div style="display: flex; align-items: center; gap: 1.5rem;">
                                    <input type="range" name="<?php echo $id_slider; ?>" class="m2-slider-valor" data-nombre="<?php echo $area; ?>"
                                        min="1" max="10" value="<?php echo $valor_guardado; ?>" step="1" style="flex-grow: 1; cursor: pointer;"
                                        <?php echo $st1['completada'] ? 'disabled' : ''; ?>>
                                    <span class="puntos-display" style="font-weight: 800; color: #12307D; min-width: 30px;"><?php echo $valor_guardado; ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if (!$st1['completada']): ?>
                    <div class="m2-fase-1" style="margin-top: 5rem;">
                        <div style="text-align: center; margin-top: 4rem;">
                            <button type="button" id="btn-guardar-importancia" class="boton"
                                style="background: #12307D; color: #FFFFFF; padding: 1.5rem 4rem; border-radius: 0.8rem; border: none; font-weight: 700; cursor: pointer;">
                                Confirmar importancia de mis áreas
                            </button>
                        </div>
                    </div>
                <?php endif; ?>

                <div id="resumen-valores" style="margin-top: 8rem; display: <?php echo $st1['completada'] ? 'block' : 'none'; ?>;">
                    <div style="text-align: center; margin-bottom: 4rem;">
                        <h3 style="color: #12307D; font-weight: 800; font-size: 2.6rem;">Lo que hoy es más importante para ti</h3>
                        <p>Estas son las tres áreas que hoy tienen mayor valor para ti.</p>
                    </div>

                    <div id="contenedor-top3" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 2rem;">
                        <?php if ($st1['completada']):
                            for ($i = 0; $i < 3; $i++) {
                                $idNombre = 223 + ($i * 2);
                                $idValor = 224 + ($i * 2);
                                $nombre_top = $respuestas[$idNombre] ?? '';
                                $valor_top = $respuestas[$idValor] ?? '';
                                if ($nombre_top):
                        ?>
                                    <div style="flex: 1 1 300px; max-width: 350px; background: #12307D; color: #FFFFFF; padding: 3rem 2rem; border-radius: 1.5rem; text-align: center; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                                        <h4 style=" margin-bottom: 1rem; font-weight: 800;"><?php echo htmlspecialchars($nombre_top); ?></h4>
                                        <p style=" opacity: 0.9;">Valoración: <?php echo htmlspecialchars($valor_top); ?>/10</p>
                                    </div>
                        <?php
                                endif;
                            }
                        endif; ?>
                    </div>
                </div>

                <div class="actividad-seccion-texto">
                    <p>No significa que las demás no importen; simplemente reflejan en donde puede estar enfocada tu atención.</p>
                    <p>Reconocer lo que valoras es el primer paso para acercarte a ello, poco a poco.</p>
                </div>

                <div id="fase-planeacion" style="margin-top: 8rem; display: <?php echo $st1['completada'] ? 'block' : 'none'; ?>;">
                    <div class="actividad-seccion-texto">
                        <h3 class="act-titulo">Reconocer lo que valoras es el primer paso para acercarte a ello, poco a poco.</h3>
                        <div class="act3-reglas">
                            <div class="act3-reglas-1">
                                <img src="/build/img/m2a1_img6.webp" class="img-ebook" alt="Reflexión 6">
                            </div>
                            <div>
                                <p class="texto-justificado">
                                    Exploremos juntos qué acciones pueden acercarte a tus valores más importantes. Recuerda que no se trata de hacerlo perfecto, sino de elegir pasos con dirección clara hacia que le da sentido a tu vida.
                                </p>
                            </div>
                        </div>
                        <div class="actividad-seccion-texto">
                            <p>A menudo creemos que dar pasos hacia lo que realmente valoramos implica hacer grandes cambios de inmediato. ¿Sabes? las acciones sencillas, concretas y posibles, a menudo son las que comienzan un camino sólido.</p>
                            <p>A continuación, te invitamos a reflexionar en estas acciones para cada área que elegiste como más importantes. Para ayudarte a que cada acción sea clara, realista y adaptada a tu contexto, responde a las preguntas con calma.</p>
                            <p>Recuerda, puedes comenzar con algo posible, todos los pasos cuentan.</p>
                        </div>
                    </div>

                    <div id="contenedor-acciones-top3" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 3rem;">
                        <?php if ($st1['completada']):
                            for ($i = 0; $i < 3; $i++) {
                                $idNombre = 223 + ($i * 2);
                                $nombre_top = $respuestas[$idNombre] ?? '';

                                if ($nombre_top):
                        ?>
                                    <div style="flex: 1 1 350px; background: #fdfdfd; border: 2px solid #12307D; border-radius: 1.5rem; padding: 2.5rem; box-shadow: 0 10px 20px rgba(0,0,0,0.05);">
                                        <div style="background: #12307D; color: white; margin: -2.5rem -2.5rem 2rem -2.5rem; padding: 1.5rem; border-radius: 1.3rem 1.3rem 0 0; text-align: center;">
                                            <h4 style="font-family: 'Poppins', sans-serif; font-weight: bold; margin:0; font-size: 1.2em;"><?php echo htmlspecialchars($nombre_top); ?></h4>
                                        </div>
                                        <div class="preguntas-accion">
                                            <?php
                                            $campos = [
                                                'que' => ['texto' => '¿Qué haré?', 'offset' => 0],
                                                'quien' => ['texto' => '¿Con quién?', 'offset' => 1],
                                                'donde' => ['texto' => '¿Dónde?', 'offset' => 2],
                                                'cuando' => ['texto' => '¿Cuándo?', 'offset' => 3],
                                                'dificultad' => ['texto' => '¿Qué podría dificultarlo?', 'offset' => 4],
                                                'solucion' => ['texto' => '¿Cómo podrías sobrepasar esas dificultades?', 'offset' => 5]
                                            ];

                                            foreach ($campos as $key => $datos):
                                                $idPregunta = 229 + ($i * 6) + $datos['offset'];
                                                $val_accion = $respuestas[$idPregunta] ?? '';
                                            ?>
                                                <div style="margin-bottom: 1.5rem;">
                                                    <label style="display: block; color: #12307D; font-weight: bold; margin-bottom: 0.5rem;"><?php echo $datos['texto']; ?></label>
                                                    <textarea disabled style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 0.8rem; height: 60px; resize: none; background: #eef2f7;"><?php echo htmlspecialchars($val_accion); ?></textarea>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                        <?php
                                endif;
                            }
                        endif; ?>
                    </div>

                    <div style="text-align: center; margin: 4rem 0;">
                        <img src="/build/img/m2a1_img7.webp" class="img-ebook" alt="Reflexión 7">
                    </div>

                    <div style="text-align: center; margin-top: 6rem;">
                        <?php if ($st1['completada']): ?>
                            <button type="button" class="boton boton-completado" disabled>
                                <i class="fas fa-check"></i> Actividad 1 Completada
                            </button>
                        <?php else: ?>
                            <button type="submit" id="btn-finalizar-act1-m2" class="boton" data-intro="<?php echo $ya_respondio_intro ? 'true' : 'false'; ?>"
                                style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                                Guardar y finalizar Actividad 1
                            </button>
                            <?php if (!$ya_respondio_intro): ?>
                                <p style="color: #e74c3c; margin-top: 1.5rem; font-weight: 700; font-size: 1.4rem;">Debes completar la observación inicial del módulo para poder guardar esta actividad.</p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
    </section>

    <?php $st2 = getEstado(2, $actual); ?>
    <section class="actividad" id="act2" style="<?php echo $st2['visible']; ?>">

        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo" style="color: #12307D; margin-bottom: 3rem;">Actividad 2. Identificando barreras</h2>
            <p>A veces hay cosas que se interponen cuando queremos avanzar o cuidarnos. Estas barreras pueden aparecer de muchas formas y reconocerlas es el primer paso para tomar decisiones diferentes.</p>
        </div>

        <div class="m2-barreras-carrusel" style="margin: 4rem 0; text-align: center;">
            <div id="barrera-contenedor" style="display: flex; flex-direction: column; align-items: center; justify-content: center; ">
            </div>
            <button type="button" id="btn-siguiente-barrera" class="boton" style="margin-top: 2rem; background: #12307D; color: #FFFFFF; padding: 1rem 2.5rem; border-radius: 0.8rem; border: none; font-weight: bold;">
                Siguiente <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div class="actividad-seccion-texto">
            <p class="texto-justificado">Todas las personas enfrentan barreras. Reconocerlas no es rendirse, es empezar a cuidarte mejor.</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act2-m2">
            <input type="hidden" name="id_modulo" value="2">
            <input type="hidden" name="actividad_id" value="2">

            <div class="m2-experimento-seccion" style="background: #fdfdfd; padding: 4rem; border: 0.2rem solid #e0e0e0; border-radius: 1.5rem; margin: 4rem 0;">
                <p style="font-weight: 700; font-size: 2rem; color: #12307D; margin-bottom: 2rem;">
                    Piensa en tu vida actual. ¿Qué cosas suelen dificultar que te cuides o que hagas lo que es importante para ti?
                </p>
                <?php
                $id_pregunta_act2 = '251';
                $respuesta_barrera = $respuestas[$id_pregunta_act2] ?? '';
                ?>
                <textarea name="<?php echo $id_pregunta_act2; ?>" id="texto-barrera"
                    style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 120px; resize: vertical;"
                    <?php echo $st2['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($respuesta_barrera); ?></textarea>
            </div>

            <div class="actividad-seccion-texto" style="margin-top: 4rem;">
                <p class="texto-justificado">Reconocerlo ya es un paso importante, y vamos más allá, reflexiona;</p>
                <p style="font-weight: 700; color: #12307D;">Cuándo aparece esa barrera ¿qué suele ocurrir?</p>

                <div style="margin: 2rem 0 4rem 2rem;">
                    <?php
                    $opciones_reflexion = [
                        '252' => 'Pospones la acción',
                        '253' => 'Cambias a otra actividad',
                        '254' => 'Esperas a sentirte mejor para hacerlo',
                        '255' => 'Te convences que no podrás lograrlo',
                        '256' => 'Te recriminas por que aparece la barrera',
                        '257' => 'Terminas no haciéndolo'
                    ];

                    foreach ($opciones_reflexion as $id_check => $opcion):
                        $esta_marcada = isset($respuestas[$id_check]) && $respuestas[$id_check] === $opcion;
                    ?>
                        <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                            <input type="checkbox" name="<?php echo $id_check; ?>" value="<?php echo $opcion; ?>"
                                class="m1-check-input act2-checkbox"
                                <?php echo $esta_marcada ? 'checked' : ''; ?>
                                <?php echo $st2['completada'] ? 'disabled' : ''; ?>>
                            <span class="m1-check-custom"></span>
                            <span class="m1-check-texto"><?php echo $opcion; ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <p class="texto-justificado">Las barreras pueden aparecer una y otra vez, no porque estés fallando o haya algo mal en ti, sino porque tu mente y tu cuerpo intentan protegerte del esfuerzo, del riesgo o de emociones y pensamientos difíciles.</p>
                <p class="texto-justificado">No tienes que eliminarlas para avanzar.</p>
                <p class="texto-justificado">Lo importante es aprender a reconocerlas y elegir cómo responder.</p>
                <p class="texto-justificado">Para ello, te invito a realizar el experimento de notar si cuando vas a intentar hacer algo que sea importante para ti, principalmente novedoso o distinto de lo que ya haces, observa si aparece alguna barrera,</p>
                <p class="texto-justificado">Recuerda las barreras pueden tomar forma de emociones, pensamientos, cansancio, alguna excusa para posponerla, y simplemente, con amabilidad expresalo, “Noto que tengo una barrera”.</p>
                <p class="texto-justificado">No necesitas eliminarla, ni luchar contra ella.</p>
                <p class="texto-justificado" style="font-weight: 700;">Solo reconócelo y elige si darás un pequeño paso a lo que es importante para ti.</p>
            </div>

            <div style="text-align: center; margin-top: 6rem;">
                <?php if ($st2['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 2 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act2-m2" class="boton"
                        style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Actividad 2
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <?php $st3 = getEstado(3, $actual); ?>
    <section class="actividad" id="act3" style="<?php echo $st3['visible']; ?>">

        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo" style="color: #12307D; margin-bottom: 3rem;">Actividad 3. Abro espacio para lo que está</h2>
            <p class="texto-justificado">
                Detente un momento y busca una postura cómoda. No necesitas hacerlo perfecto, solo observar. Presiona iniciar y regálate estos minutos para ti.
            </p>
        </div>

        <div class="m2-audio-contenedor" style="background: #f4f6f9; padding: 3rem; border-radius: 1.5rem; border: 0.1rem solid #dddddd; margin: 3rem 0; text-align: center;">
            <audio controls style="width: 100%; max-width: 120rem;">
                <source src="/build/audio/Audio_C1.mp3" type="audio/mpeg">
                Tu navegador no soporta el elemento de audio.
            </audio>
        </div>

        <div style="margin: 5rem 0;">
            <div style="display: flex; align-items: center; gap: 3rem; margin-bottom: 4rem; flex-wrap: wrap;">
                <div style="flex: 1 1 300px;">
                    <p class="texto-justificado">
                        Luchar por controlar lo que sentimos puede parecer la única salida, sin embargo esa estrategia suele atraparnos en un ciclo sin movimiento, esta lucha interna te aleja de tus valores.
                    </p>
                </div>
                <div style="flex: 1 1 300px; text-align: center;">
                    <img src="/build/img/m2a3_img1.webp" alt="Lucha interna" style="max-width: 100%; border-radius: 1.5rem; border: solid 0.5rem #12307D; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-height: 65rem;">
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 3rem; margin-bottom: 4rem; flex-wrap: wrap; flex-direction: row-reverse;">
                <div style="flex: 1 1 300px; text-align: center;">
                    <img src="/build/img/m2a3_img2.webp" alt="Apertura ante sensaciones" style="max-width: 100%; border-radius: 1.5rem; border: solid 0.5rem #12307D; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-height: 65rem;">
                </div>
                <div style="flex: 1 1 300px;">
                    <p class="texto-justificado">
                        La apertura ante sensaciones y pensamientos nos devuelve la energía. No necesitas que el malestar se vaya para cuidarte.
                    </p>
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 3rem; margin-bottom: 4rem; flex-wrap: wrap;">
                <div style="flex: 1 1 30rem;">
                    <p class="texto-justificado">
                        La dirección cambia cuando dejamos de empujar y empezamos a avanzar, incluso con incomodidad.
                    </p>
                </div>
                <div style="flex: 1 1 30rem; text-align: center;">
                    <img src="/build/img/m2a3_img3.webp" alt="Avanzar con dirección" style="max-width: 100%; border-radius: 1.5rem; border: solid 0.5rem #12307D; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-height: 65rem;">
                </div>
            </div>
        </div>

        <div class="actividad-seccion-texto">
            <p class="texto-justificado">Iniciemos esta reflexión. Escribe en el espacio lo que identifiques. Recuerda que no se trata de juzgar si está bien o mal, solo observa tu experiencia con amabilidad.</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act3-m2">
            <input type="hidden" name="id_modulo" value="2">
            <input type="hidden" name="actividad_id" value="3">

            <div class="m2-experimento-seccion" style="background: #fdfdfd; padding: 4rem; border: 0.2rem solid #e0e0e0; border-radius: 1.5rem; margin: 4rem 0;">

                <div style="margin-bottom: 4rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">
                        ¿Qué estás dejando de lado mientras intentas controlar lo que sientes?
                    </p>
                    <?php $val_261 = $respuestas['261'] ?? ''; ?>
                    <textarea name="261" class="input-act3"
                        style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 100px; resize: vertical;"
                        <?php echo $st3['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_261); ?></textarea>
                </div>

                <div style="margin-bottom: 2rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">
                        ¿Qué significa para ti moverte hacia lo que realmente importa en tu vida?
                    </p>
                    <?php $val_262 = $respuestas['262'] ?? ''; ?>
                    <textarea name="262" class="input-act3"
                        style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 100px; resize: vertical;"
                        <?php echo $st3['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_262); ?></textarea>
                </div>

            </div>

            <div class="actividad-seccion-texto">
                <p class="texto-justificado">Este tema invita a reconocer con honestidad esa elección y a construir, paso a paso, una vida guiada por valores y no por la lucha interna.</p>
                <p class="texto-justificado">Durante los próximos días, cuando te encuentres en una situación abrumadora o difícil, prueba lo siguiente:</p>

                <ul style="color: #555; line-height: 2; margin-left: 2rem;">
                    <li class="texto-justificado"><strong>Detente un momento.</strong></li>
                    <li class="texto-justificado"><strong>Nombra lo que notes en ese momento</strong>, por ejemplo, “Aquí esta la emoción del enojo”, “En este momento noto que está el cansancio”.</li>
                    <li class="texto-justificado"><strong>Permítete no luchar</strong>, ni intentar cambiarlo o enjuiciarlo.</li>
                    <li class="texto-justificado"><strong>Pregúntate</strong>, en este momento ¿qué pequeño paso puedo dar hacia algo importante para mí?</li>
                </ul>

                <p class="texto-justificado" style="font-weight: 700; margin-top: 2rem;">Recuerda que no necesitas que la emoción, pensamientos, sensaciones o impulsos desaparezcan para dar ese paso.</p>
            </div>

            <div style="text-align: center; margin-top: 6rem;">
                <?php if ($st3['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 3 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act3-m2" class="boton"
                        style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Actividad 3
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <!-- ACTIVIDAD 4 -->
    <?php $st4 = getEstado(4, $actual); ?>
    <section class="actividad" id="act4" style="<?php echo $st4['visible']; ?>">

        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 4. Mi valor más importante</h2>
            <p>Toca cada una de las tarjetas para descubrir cómo tus valores se conectan con tu autocuidado.</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act4-m2">
            <input type="hidden" name="id_modulo" value="2">
            <input type="hidden" name="actividad_id" value="4">

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 3rem; margin: 4rem 0;">

                <div class="tarjeta-flip">
                    <div class="tarjeta-inner">
                        <div class="tarjeta-front">
                            <h3 style="font-size: 2.2rem; font-weight: 700; margin: 0;">Activación del valor</h3>
                        </div>
                        <div class="tarjeta-back">
                            <p class="texto-justificado">Cuidar tu salud a veces implica esfuerzo, incomodidad o disciplina. Pero cuando lo haces por algo que es importante para ti, deja de ser una obligación.</p>
                        </div>
                    </div>
                </div>

                <div class="tarjeta-flip">
                    <div class="tarjeta-inner">
                        <div class="tarjeta-front">
                            <h3 style="font-size: 2.2rem; font-weight: 700; margin: 0;">Conexión emocional</h3>
                        </div>
                        <div class="tarjeta-back">
                            <p class="texto-justificado">Cada vez que eliges dormir mejor, asistir a una cita médica o preparar una comida saludable, no lo haces solo por tu cuerpo. Lo haces porque deseas compartir más tiempo y calidad de vida con tus seres queridos.</p>
                        </div>
                    </div>
                </div>

                <div class="tarjeta-flip">
                    <div class="tarjeta-inner">
                        <div class="tarjeta-front">
                            <h3 style="font-size: 2.2rem; font-weight: 700; margin: 0;">Reencuadre</h3>
                        </div>
                        <div class="tarjeta-back">
                            <p class="texto-justificado">Cuando el autocuidado está conectado con lo que más valoras, se convierte en una acción comprometida. No es una carga. Es una elección con sentido.</p>
                        </div>
                    </div>
                </div>

                <div class="tarjeta-flip <?php echo $st4['completada'] ? 'girada' : ''; ?>">
                    <div class="tarjeta-inner">
                        <div class="tarjeta-front">
                            <h3 style="font-size: 2.2rem; font-weight: 700; margin: 0;">Integración personal</h3>
                        </div>
                        <div class="tarjeta-back" style="padding: 1.5rem;">
                            <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Por quién o por qué vale la pena que cuides tu salud?</p>
                            <?php
                            $id_pregunta_act4 = '271';
                            $val_271 = $respuestas[$id_pregunta_act4] ?? '';
                            ?>
                            <textarea name="<?php echo $id_pregunta_act4; ?>" class="input-act4"
                                style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1rem; height: 100px; resize: none;"
                                <?php echo $st4['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_271); ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="tarjeta-flip">
                    <div class="tarjeta-inner">
                        <div class="tarjeta-front">
                            <h3 style="font-size: 2.2rem; font-weight: 700; margin: 0;">Validación automática</h3>
                        </div>
                        <div class="tarjeta-back">
                            <p class="texto-justificado">Bien hecho. Conectar con tus valores fortalece tu motivación.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p>Reconocer tus barreras ayuda a comprender que el autocuidado no es un deber impuesto.</p>
                <p>Es una elección consciente hacia lo que realmente importa. Cada acción alineada con tus valores fortalece tu bienestar, tu propósito y tu capacidad para adaptarte a los desafíos de vivir con una condición crónica.</p>
                <p>El experimento que puedes realizar en los próximos días, es elegir un pequeño gesto diario que represente el valor que identificas importante.</p>
                <p>No tiene que ser algo grande, puedes enviar un mensaje de cariño, dedicar unos minutos a escuchar a alguien, dedicar unos momentos a disfrutar de una planta o mascota, o aplicar un suave masaje en tus manos. lo importante es que conscientemente esa acción refleja tu valor.</p>
            </div>

            <div style="text-align: center; margin-top: 6rem;">
                <?php if ($st4['completada']): ?>
                    <button type="button" class="boton boton-completado"></i> Actividad 4 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act4-m2" class="boton"
                        style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Actividad 4
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <!-- ACTIVIDAD 5 -->
    <?php $st5 = getEstado(5, $actual); ?>
    <section class="actividad" id="act5" style="<?php echo $st5['visible']; ?>">
        <div class="divisor-modulo"></div>
        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 5. Elecciones conscientes y valiosas</h2>
        </div>

        <div class="m2-carrusel-act5" style="margin: 4rem 0; text-align: center;">
            <div id="contenedor-pantallas-act5" style="min-height: 350px; display: flex; flex-direction: column; align-items: center; justify-content: center; background: #fdfdfd; border: 2px solid #e0e0e0; border-radius: 1.5rem; padding: 4rem; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            </div>

            <div style="display: flex; justify-content: center; gap: 2rem; margin-top: 3rem;">
                <button type="button" id="btn-anterior-act5" class="boton" style="display: none; background: #6c757d; color: #FFFFFF; padding: 1.5rem 4rem; border-radius: 0.8rem; border: none; font-weight: 700;">
                    <i class="fas fa-chevron-left"></i> Anterior
                </button>

                <button type="button" id="btn-siguiente-act5" class="boton" style="background: #12307D; color: #FFFFFF; padding: 1.5rem 4rem; border-radius: 0.8rem; border: none; font-weight: 700;">
                    Siguiente <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="actividad-seccion-texto" style="margin-top: 5rem;">
            <p>Las elecciones valiosas no surgen de evitar lo que duele, sino de recordar lo que importa.</p>
            <p>Cuando atiendes al momento presente, reconoces tus impulsos sin obedecerlos ciegamente. Cada decisión consciente, por pequeña que sea, fortalece tu autocuidado y te acerca a la vida que quieres construir.</p>
            <p style="font-weight: 700; color: #12307D;">Es avanzar guiado por tu faro, incluso con neblina.</p>

            <div style="background: #eef2f7; border-left: 5px solid #12307D; padding: 2.5rem; border-radius: 0.8rem; margin: 4rem 0;">
                <p class="texto-justificado" style="margin-bottom: 1.5rem;">Durante los próximos días, prueba hacer una pausa breve cuando tengas que tomar alguna decisión, como quedarte más tiempo en cama, hacer algo de actividad física y pregúntate:</p>
                <p style="font-weight: 700; color: #12307D; text-align: center; margin: 2rem 0;">¿Cuál de estas opciones me acerca más a la dirección que quiero para mi salud, o para mi vida?</p>
                <p class="texto-justificado" style="margin: 0;">No siempre será la opción más fácil, pero recuerda que un pequeño paso, sigue siendo un paso.</p>
            </div>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act5-m2">
            <input type="hidden" name="id_modulo" value="2">
            <input type="hidden" name="actividad_id" value="5">

            <div class="m1-evaluacion-final">
                <h3 class="act-titulo" style="color: #12307D; margin-bottom: 2rem;">¡Felicidades, has concluido el módulo 2!</h3>
                <p style="margin-bottom: 3rem;">Tu experiencia es importante, marca la opción que mejor la refleja:</p>

                <?php
                $evaluacion_m2 = [
                    '281' => '1. El módulo fue claro y fácil de seguir',
                    '282' => '2. Lo trabajado en el módulo me resulta útil para mi calidad de vida o autocuidado',
                    '283' => '3. Considero que puedo aplicar lo trabajado en mi vida diaria'
                ];
                foreach ($evaluacion_m2 as $id => $pregunta): ?>
                    <div style="margin-bottom: 3rem;">
                        <p style="font-weight: 700; color: #333;"><?php echo $pregunta; ?></p>
                        <select name="<?php echo $id; ?>" class="m1-select-personalizado check-validar-act5-m2" style="width: 100%; padding: 1.2rem; border-radius: 0.8rem;" <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                            <option value="">-- Selecciona una opción --</option>
                            <?php foreach (['Totalmente de acuerdo', 'De acuerdo', 'Poco de acuerdo', 'Totalmente en desacuerdo'] as $op): ?>
                                <option value="<?php echo $op; ?>" <?php echo ($respuestas[$id] ?? '') === $op ? 'selected' : ''; ?>><?php echo $op; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endforeach; ?>
            </div>

            <div style="margin-top: 4rem; text-align: center;">
                <?php if ($st5['completada']): ?>
                    <div class="m-mensaje-completado-modulo">
                        ✨ ¡Concluiste con el Módulo 2! ✨
                    </div>
                    <button type="button" class="boton boton-completado" disabled>
                        Módulo 2 Completado
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act5-m2" class="boton" style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Módulo 2
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </section>

</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnIntro = document.getElementById('btn-guardar-intro');
        const selectsIntro = document.querySelectorAll('.check-validar-intro');

        function validarIntro() {
            if (!btnIntro) return;
            const todosListos = Array.from(selectsIntro).every(select => select.value !== "");
            btnIntro.disabled = !todosListos;
            btnIntro.style.opacity = todosListos ? "1" : "0.5";
            btnIntro.style.cursor = todosListos ? "pointer" : "not-allowed";
        }

        selectsIntro.forEach(select => select.addEventListener('change', validarIntro));
        validarIntro();
    });

    // EBOOK 
    document.addEventListener('DOMContentLoaded', function() {
        const hojas = document.querySelectorAll('.hoja');
        const btnNext = document.getElementById('nextEbook');
        const btnPrev = document.getElementById('prevEbook');
        let indiceActual = 0;

        function renderizarLibro() {
            hojas.forEach((hoja, i) => {
                if (i === indiceActual) {
                    // Hoja Visible (En el centro)
                    hoja.style.transform = "rotateY(0deg)";
                    hoja.style.opacity = "1";
                    hoja.style.zIndex = "10";
                } else if (i < indiceActual) {
                    // Hojas ya pasadas (Giradas a la izquierda -180 o -90)
                    hoja.style.transform = "rotateY(-110deg)";
                    hoja.style.opacity = "0";
                    hoja.style.zIndex = "1";
                } else {
                    // Hojas por venir (Giradas a la derecha 90)
                    hoja.style.transform = "rotateY(110deg)";
                    hoja.style.opacity = "0";
                    hoja.style.zIndex = "1";
                }
            });

            btnPrev.disabled = (indiceActual === 0);
            btnNext.disabled = (indiceActual === hojas.length - 1);
        }

        btnNext.addEventListener('click', () => {
            if (indiceActual < hojas.length - 1) {
                indiceActual++;
                renderizarLibro();
            }
        });

        btnPrev.addEventListener('click', () => {
            if (indiceActual > 0) {
                indiceActual--;
                renderizarLibro();
            }
        });

        renderizarLibro(); // Estado inicial
    });

    // ÁREA DE DATOS
    document.addEventListener('DOMContentLoaded', function() {
        const sliders = document.querySelectorAll('.m2-slider-valor');
        const contenedorResumen = document.getElementById('resumen-valores');
        const contenedorTop3 = document.getElementById('contenedor-top3');
        const btnGuardarImportancia = document.getElementById('btn-guardar-importancia');
        const fasePlaneacion = document.getElementById('fase-planeacion');
        const contenedorAcciones = document.getElementById('contenedor-acciones-top3');
        const btnFinalizar = document.getElementById('btn-finalizar-act1-m2');

        function actualizarTop3() {
            let datos = Array.from(sliders).map(slider => {
                return {
                    nombre: slider.dataset.nombre,
                    valor: parseInt(slider.value)
                };
            });

            datos.sort((a, b) => {
                if (b.valor !== a.valor) {
                    return b.valor - a.valor;
                }
                return a.nombre.localeCompare(b.nombre);
            });

            const top3 = datos.slice(0, 3);
            contenedorTop3.innerHTML = '';

            top3.forEach(item => {
                const tarjeta = document.createElement('div');
                tarjeta.style.cssText = `
                flex: 1 1 300px;
                max-width: 350px;
                background: #12307D;
                color: #FFFFFF;
                padding: 3rem 2rem;
                border-radius: 1.5rem;
                text-align: center;
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            `;
                tarjeta.innerHTML = `
                <h4 style="font-size: 2.2rem; margin-bottom: 1rem; font-weight: 800;">${item.nombre}</h4>
                <p style="opacity: 0.9;">Valoración: ${item.valor}/10</p>
            `;
                contenedorTop3.appendChild(tarjeta);
            });

            contenedorResumen.style.display = 'block';
            return top3; // Retornamos para poder usarlo en la siguiente fase
        }

        sliders.forEach(slider => {
            slider.addEventListener('input', function() {
                this.nextElementSibling.innerText = this.value;
                actualizarTop3();
            });
        });

        // Evento de Botón para pasar a fase de planeación
        if (btnGuardarImportancia) {
            btnGuardarImportancia.addEventListener('click', function() {
                const top3 = actualizarTop3(); // Obtenemos el array actualizado

                // Bloquear Sliders y Botón
                sliders.forEach(s => s.disabled = true);
                this.innerHTML = '<i class="fas fa-check"></i> Valores Fijados';
                this.style.background = "#27ae60";
                this.disabled = true;

                // Generar Tarjetas con Preguntas e Inputs Ocultos
                contenedorAcciones.innerHTML = '';
                top3.forEach((item, index) => {
                    const tarjeta = document.createElement('div');
                    tarjeta.style.cssText = `flex: 1 1 350px; background: #fdfdfd; border: 2px solid #12307D; border-radius: 1.5rem; padding: 2.5rem; box-shadow: 0 10px 20px rgba(0,0,0,0.05);`;

                    // Calculamos IDs numéricos correlativos para Nombre y Valor
                    const idNombre = 223 + (index * 2);
                    const idValor = 224 + (index * 2);

                    tarjeta.innerHTML = `
                    <input type="hidden" name="${idNombre}" value="${item.nombre}">
                    <input type="hidden" name="${idValor}" value="${item.valor}">
                    
                    <div style="background: #12307D; color: white; margin: -2.5rem -2.5rem 2rem -2.5rem; padding: 1.5rem; border-radius: 1.3rem 1.3rem 0 0; text-align: center;">
                        <h4 style="font-family: 'Poppins', sans-serif; font-weight: bold; margin:0; font-size: 2.2rem;">${item.nombre}</h4>
                    </div>
                    <div class="preguntas-accion">
                        ${crearCampoAccion(index, "que", "¿Qué haré?")}
                        ${crearCampoAccion(index, "quien", "¿Con quién?")}
                        ${crearCampoAccion(index, "donde", "¿Dónde?")}
                        ${crearCampoAccion(index, "cuando", "¿Cuándo?")}
                        ${crearCampoAccion(index, "dificultad", "¿Qué podría dificultarlo?")}
                        ${crearCampoAccion(index, "solucion", "¿Cómo podrías sobrepasar esas dificultades?")}
                    </div>
                `;
                    contenedorAcciones.appendChild(tarjeta);
                });

                fasePlaneacion.style.display = 'block';
                vincularValidacion();
            });
        }

        function crearCampoAccion(idVal, campo, texto) {
            const mapaCampos = {
                "que": 0,
                "quien": 1,
                "donde": 2,
                "cuando": 3,
                "dificultad": 4,
                "solucion": 5
            };

            const idPregunta = 229 + (idVal * 6) + mapaCampos[campo];

            return `
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-weight: bold; color: #12307D; margin-bottom: 0.5rem;">${texto}</label>
                <textarea name="${idPregunta}" class="input-accion" 
                    style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 0.8rem; height: 60px; resize: none;"></textarea>
            </div>
            `;
        }

        function vincularValidacion() {
            const inputs = document.querySelectorAll('.input-accion');
            inputs.forEach(input => {
                input.addEventListener('input', () => {
                    const todosLlenos = Array.from(inputs).every(i => i.value.trim() !== "");
                    btnFinalizar.disabled = !todosLlenos;
                    btnFinalizar.style.opacity = todosLlenos ? "1" : "0.5";
                    btnFinalizar.style.cursor = todosLlenos ? "pointer" : "not-allowed";
                });
            });
        }
    });

    // ACTIVIDAD 2 - Lógica del Carrusel de Barreras
    document.addEventListener('DOMContentLoaded', function() {
        const contenedorBarrera = document.getElementById('barrera-contenedor');
        const btnSiguienteBarrera = document.getElementById('btn-siguiente-barrera');

        if (!contenedorBarrera || !btnSiguienteBarrera) return;

        // Arreglo con las imágenes y textos
        const barreras = [{
                img: '/build/img/m2a2_img1.webp',
                texto: 'Pensamientos como: “ya no tiene caso intentarlo”.'
            },
            {
                img: '/build/img/m2a2_img2.webp',
                texto: 'Emociones intensas, como miedo o frustración.'
            },
            {
                img: '/build/img/m2a2_img3.webp',
                texto: 'Cansancio, dolor o falta de energía.'
            },
            {
                img: '/build/img/m2a2_img4.webp',
                texto: 'Falta de apoyo o comprensión del entorno.'
            }
        ];

        let indiceBarrera = 0;

        function mostrarBarrera(indice) {
            contenedorBarrera.style.opacity = 0;

            setTimeout(() => {
                contenedorBarrera.innerHTML = `
                    <img src="${barreras[indice].img}" alt="Ilustración de barrera" style="max-width: 100%; height: auto; border-radius: 1.5rem; margin-bottom: 2rem; max-height: 65rem; border: solid 0.5rem #12307D;">
                    <p style="font-weight: 700; color: #12307D; text-align: center; margin: 0;">${barreras[indice].texto}</p>
                `;
                contenedorBarrera.style.transition = "opacity 0.4s ease-in-out";
                contenedorBarrera.style.opacity = 1;
            }, 300);
        }

        mostrarBarrera(indiceBarrera);

        btnSiguienteBarrera.addEventListener('click', () => {
            indiceBarrera++;
            if (indiceBarrera < barreras.length) {
                mostrarBarrera(indiceBarrera);
            }

            // Si es la última tarjeta, ocultamos el botón
            if (indiceBarrera === barreras.length - 1) {
                btnSiguienteBarrera.style.display = 'none';
            }
        });
    });

    // ACTIVIDAD 2 - Validación del formulario
    document.addEventListener('DOMContentLoaded', function() {
        const textoBarrera = document.getElementById('texto-barrera');
        const checkboxesBarrera = document.querySelectorAll('.act2-checkbox');
        const btnFinalizarAct2 = document.getElementById('btn-finalizar-act2-m2');

        if (textoBarrera && btnFinalizarAct2) {
            function validarAct2() {
                // 1. Verificamos que el área de texto no esté vacía
                const tieneTexto = textoBarrera.value.trim().length > 0;

                // 2. Verificamos que al menos un checkbox esté seleccionado
                const tieneCheckbox = Array.from(checkboxesBarrera).some(chk => chk.checked);

                // Solo si ambas condiciones se cumplen, habilitamos el botón
                if (tieneTexto && tieneCheckbox) {
                    btnFinalizarAct2.disabled = false;
                    btnFinalizarAct2.style.opacity = "1";
                    btnFinalizarAct2.style.cursor = "pointer";
                } else {
                    btnFinalizarAct2.disabled = true;
                    btnFinalizarAct2.style.opacity = "0.5";
                    btnFinalizarAct2.style.cursor = "not-allowed";
                }
            }

            // Escuchamos los cambios tanto en el texto como en los checkboxes
            textoBarrera.addEventListener('input', validarAct2);
            checkboxesBarrera.forEach(chk => chk.addEventListener('change', validarAct2));

            validarAct2(); // Ejecutar al inicio por si el formulario recarga con datos
        }
    });

    // ACTIVIDAD 3 - Validación del formulario
    document.addEventListener('DOMContentLoaded', function() {
        const inputsAct3 = document.querySelectorAll('.input-act3');
        const btnFinalizarAct3 = document.getElementById('btn-finalizar-act3-m2');

        if (inputsAct3.length > 0 && btnFinalizarAct3) {
            function validarAct3() {
                // Verificamos que ambos textareas tengan texto
                const todosLlenos = Array.from(inputsAct3).every(input => input.value.trim().length > 0);

                if (todosLlenos) {
                    btnFinalizarAct3.disabled = false;
                    btnFinalizarAct3.style.opacity = "1";
                    btnFinalizarAct3.style.cursor = "pointer";
                } else {
                    btnFinalizarAct3.disabled = true;
                    btnFinalizarAct3.style.opacity = "0.5";
                    btnFinalizarAct3.style.cursor = "not-allowed";
                }
            }

            // Escuchamos los cambios en cada textarea
            inputsAct3.forEach(input => input.addEventListener('input', validarAct3));

            // Ejecutamos al inicio por si recarga con datos
            validarAct3();
        }
    });

    // ACTIVIDAD 4 - Lógica de Tarjetas Giratorias y Validación
    document.addEventListener('DOMContentLoaded', function() {

        // 1. Tarjetas Giratorias
        const tarjetas = document.querySelectorAll('.tarjeta-flip');
        tarjetas.forEach(tarjeta => {
            tarjeta.addEventListener('click', function(e) {
                // SI el clic fue en un textarea o input, NO girar la tarjeta
                if (e.target.tagName === 'TEXTAREA' || e.target.tagName === 'INPUT') {
                    return;
                }
                this.classList.toggle('girada');
            });
        });

        // 2. Validación del formulario
        const inputAct4 = document.querySelector('.input-act4');
        const btnFinalizarAct4 = document.getElementById('btn-finalizar-act4-m2');

        if (inputAct4 && btnFinalizarAct4) {
            function validarAct4() {
                if (inputAct4.value.trim().length > 0) {
                    btnFinalizarAct4.disabled = false;
                    btnFinalizarAct4.style.opacity = "1";
                    btnFinalizarAct4.style.cursor = "pointer";
                } else {
                    btnFinalizarAct4.disabled = true;
                    btnFinalizarAct4.style.opacity = "0.5";
                    btnFinalizarAct4.style.cursor = "not-allowed";
                }
            }

            inputAct4.addEventListener('input', validarAct4);
            validarAct4(); // Ejecutar al inicio
        }
    });

    // ACTIVIDAD 5 - Lógica del Carrusel Paso a Paso
    document.addEventListener('DOMContentLoaded', function() {
        const contenedorPantallas = document.getElementById('contenedor-pantallas-act5');
        const btnSiguiente = document.getElementById('btn-siguiente-act5');
        const btnAnterior = document.getElementById('btn-anterior-act5');

        if (!contenedorPantallas || !btnSiguiente) return;

        const pantallas = [{
                tipo: 'texto',
                html: `
                <p style="color: #12307D; font-weight: 700;">Actuar en automático te aleja de lo que importa.</p>
                <p>Hacer una pausa te permite notar, elegir y dar un paso con sentido.</p>
                <p>No se trata de hacerlo perfecto, sino de avanzar con intención.</p>
            `
            },
            {
                tipo: 'multimedia',
                img: '/build/img/m2a5_img1.webp',
                audio: '/build/audio/Audio_C2.mp3'
            },
            {
                tipo: 'multimedia',
                img: '/build/img/m2a5_img2.webp',
                audio: '/build/audio/Audio_C3.mp3'
            },
            {
                tipo: 'multimedia',
                img: '/build/img/m2a5_img3.webp',
                audio: '/build/audio/Audio_C4.mp3'
            }
        ];

        let pasoActual = 0;

        function renderizarPantalla(indice) {
            contenedorPantallas.style.opacity = 0;

            setTimeout(() => {
                const data = pantallas[indice];

                // Manejo de visibilidad de botones
                btnAnterior.style.display = (indice === 0) ? 'none' : 'inline-block';

                // Si es la última pantalla, ocultamos el botón siguiente (porque ya aparece el form final)
                btnSiguiente.style.display = (indice === pantallas.length - 1) ? 'none' : 'inline-block';

                if (data.tipo === 'texto') {
                    contenedorPantallas.innerHTML = data.html;
                    desbloquearBoton(btnSiguiente);
                } else if (data.tipo === 'multimedia') {
                    contenedorPantallas.innerHTML = `
                    <img src="${data.img}" alt="Ilustración" style="max-width: 100%; max-height: 65rem; border: solid 0.3rem #12307D; border-radius: 1.5rem; margin-bottom: 2rem;">
                    <audio id="audio-act5" controls style="width: 100%; max-width: 600px;">
                        <source src="${data.audio}" type="audio/mpeg">
                        Tu navegador no soporta el audio.
                    </audio>
                `;

                    bloquearBoton(btnSiguiente);

                    // Esperamos un pequeño tick para asegurar que el DOM cargó el ID
                    const audioPlayer = document.getElementById('audio-act5');
                    if (audioPlayer) {
                        audioPlayer.onended = () => {
                            desbloquearBoton(btnSiguiente);
                        };
                    }
                }

                contenedorPantallas.style.opacity = 1;
            }, 300);
        }

        function bloquearBoton(btn) {
            btn.disabled = true;
            btn.style.opacity = "0.5";
            btn.style.cursor = "not-allowed";
            btn.innerHTML = 'Escucha el audio para continuar <i class="fas fa-lock" style="margin-left:10px;"></i>';
        }

        function desbloquearBoton(btn) {
            btn.disabled = false;
            btn.style.opacity = "1";
            btn.style.cursor = "pointer";
            btn.innerHTML = 'Siguiente <i class="fas fa-chevron-right"></i>';
        }

        btnSiguiente.addEventListener('click', () => {
            if (pasoActual < pantallas.length - 1) {
                pasoActual++;
                renderizarPantalla(pasoActual);
            }
        });

        btnAnterior.addEventListener('click', () => {
            if (pasoActual > 0) {
                pasoActual--;
                renderizarPantalla(pasoActual);
            }
        });

        renderizarPantalla(pasoActual);
    });

    // ACTIVIDAD 5 - Validación del Formulario de Evaluación
    document.addEventListener('DOMContentLoaded', function() {
        const btnAct5M2 = document.getElementById('btn-finalizar-act5-m2');
        const selectsAct5M2 = document.querySelectorAll('.check-validar-act5-m2');

        if (btnAct5M2 && selectsAct5M2.length > 0) {
            function validarEvaluacion() {
                // Verificar que los 3 selects tengan una respuesta
                const todosListos = Array.from(selectsAct5M2).every(select => select.value !== "");

                if (todosListos) {
                    btnAct5M2.disabled = false;
                    btnAct5M2.style.opacity = "1";
                    btnAct5M2.style.cursor = "pointer";
                } else {
                    btnAct5M2.disabled = true;
                    btnAct5M2.style.opacity = "0.5";
                    btnAct5M2.style.cursor = "not-allowed";
                }
            }

            selectsAct5M2.forEach(select => select.addEventListener('change', validarEvaluacion));
            validarEvaluacion(); // Se ejecuta al cargar por si recarga con datos ya guardados
        }
    });
</script>