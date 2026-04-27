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
            Módulo 3. Conduciendo mi viaje
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

$ya_respondio_intro = !empty($respuestas['301']) && !empty($respuestas['302']) && !empty($respuestas['303']);

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
        <h1>Módulo 3. Conduciendo mi viaje</h1>
        <p class="texto-justificado">Te doy la bienvenida a este nuevo módulo.</p>
        <p class="texto-justificado">En este módulo trabajaremos en cómo relacionarte de forma diferente con los pensamientos, emociones y sensaciones que aparecen en tu experiencia.</p>

        <form method="POST" action="/guardar-actividad" id="form-intro-m3">
            <input type="hidden" name="id_modulo" value="3">
            <input type="hidden" name="actividad_id" value="0">

            <div class="m1-evaluacion-final">
                <p>
                    Antes de comenzar, te invito a hacer una pausa y observar cómo han sido estos últimos días en tu proceso con CRECE. En este tiempo:
                </p>

                <?php
                $preguntas_intro = [
                    '301' => '¿Noto algún cambio en cómo me relaciono con mis pensamientos o emociones?',
                    '302' => '¿Noto cambios en mis respuestas o comportamientos habituales?',
                    '303' => '¿Practiqué alguno de los ejercicios y/o experimentos en mi vida diaria?'
                ];

                foreach ($preguntas_intro as $id => $texto):
                    $opciones = ($id === '303') ? ['No lo hice', 'Varias veces', 'Una vez'] : ['Sí, claramente', 'Un poco', 'Aún no lo noto'];
                ?>
                    <div style="margin-bottom: 3rem;">
                        <p style="font-weight: 700;color: #12307D;"><?php echo $texto; ?></p>
                        <select name="<?php echo $id; ?>" class="m1-select-personalizado check-validar-intro"
                            style="width: 100%; padding: 1rem; border-radius: 0.8rem;"
                            <?php echo ($ya_respondio_intro) ? 'disabled' : ''; ?>>
                            <option value="">-- Selecciona una opción --</option>
                            <?php foreach ($opciones as $op): ?>
                                <option value="<?php echo $op; ?>" <?php echo ($respuestas[$id] ?? '') === $op ? 'selected' : ''; ?>>
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
        <p class="texto justificado">
            Gracias por tu honestidad. Ahora profundicemos en cómo tomar el volante de tus acciones.
        </p>
        <p class="texto justificado">
            Es importante que sepas que una enfermedad crónica puede ser desafiante.
            En este bloque vas a reconocer tus pensamientos como eventos mentales y tener un espacio a la experiencia o experiencias difíciles.
        </p>
    </section>

    <?php $st1 = getEstado(1, $actual); ?>
    <section class="actividad" id="act1" style="<?php echo $st1['visible']; ?>">
        <div class="divisor-modulo"></div>
        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 1. Atiendo las señales: fatiga y alteraciones del sueño</h2>
            <p class="texto-justificado">Hola, en esta actividad vas a reconocer las señales que tu cuerpo te da, sin juzgar.</p>
            <p class="texto-justificado">Comenzarás primero con un pequeño ejercicio para centrarte en el presente, por lo que te pido:</p>

            <ul style=" margin-bottom: 3rem;">
                <li style="margin-bottom: 1rem;"><i class="fas fa-check-square" style="color: #12307D; margin-right: 1rem;"></i> Encuentra un lugar cómodo</li>
                <li style="margin-bottom: 1rem;"><i class="fas fa-check-square" style="color: #12307D; margin-right: 1rem;"></i> Evita distracciones</li>
                <li><i class="fas fa-check-square" style="color: #12307D; margin-right: 1rem;"></i> Presiona el botón de comenzar</li>
            </ul>

            <p class="texto-justificado">Da un respiro. Hoy tu cuerpo está haciendo su mejor esfuerzo. Observemos juntos qué señales te está enviando. Por lo que realizaremos un escaneo corporal con la ayuda del siguiente audio.</p>
        </div>

        <div class="m3-audio-contenedor" style="background: #f4f6f9; padding: 3rem; border-radius: 1.5rem; border: 0.1rem solid #dddddd; margin: 3rem 0; text-align: center;">
            <audio controls style="width: 100%; ">
                <source src="/build/audio/Audio_D1_Breve_Escaneo_Corporal.mp3" type="audio/mpeg">
                Tu navegador no soporta el elemento de audio.
            </audio>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act1-m3">
            <input type="hidden" name="id_modulo" value="3">
            <input type="hidden" name="actividad_id" value="1">

            <div class="m1-experimento-seccion">
                <p class="m1-experimento-titulo">Después de realizar el escaneo corporal, selecciona lo que notaste:</p>

                <?php
                $opciones_q1 = [
                    '304' => 'Fatiga intensa',
                    '305' => 'Falta de energía',
                    '306' => 'Tensión muscular',
                    '307' => 'Sueño ligero',
                    '308' => 'Dificultad para conciliar',
                    '309' => 'Dolor'
                ];
                foreach ($opciones_q1 as $id => $opcion):
                    $esta_marcada = isset($respuestas[$id]) && $respuestas[$id] === $opcion;
                ?>
                    <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                        <input type="checkbox" name="<?php echo $id; ?>" value="<?php echo $opcion; ?>"
                            class="m1-check-input act1-q1-check" id="chk-<?php echo $id; ?>"
                            <?php echo $esta_marcada ? 'checked' : ''; ?>
                            <?php echo $st1['completada'] ? 'disabled' : ''; ?>>
                        <span class="m1-check-custom"></span>
                        <span class="m1-check-texto"><?php echo $opcion; ?></span>
                    </label>
                <?php endforeach; ?>

                <div id="feedback-fatiga" style="display: <?php echo isset($respuestas['304']) ? 'block' : 'none'; ?>; margin-top: 1rem; margin-bottom: 2rem; padding: 1.5rem; background: #eef2f7; border-left: 5px solid #12307D; border-radius: 0.5rem;">
                    <p class="texto-justificado" style="margin: 0;"><strong>Nota:</strong> Recuerda que la intención de los ejercicios no es relajarse sino explorar los eventos que surgen en nuestro cuerpo y mente. La fatiga puede ser una señal de algunos obstáculos en tu cuerpo o ser parte de los síntomas.</p>
                </div>

                <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                    <input type="checkbox" id="chk-otro-q1" class="m1-check-input act1-q1-check"
                        <?php echo !empty($respuestas['310']) ? 'checked' : ''; ?>
                        <?php echo $st1['completada'] ? 'disabled' : ''; ?>>
                    <span class="m1-check-custom"></span>
                    <span class="m1-check-texto"">Otro</span>
                </label>
                <input type=" text" name="310" id="input-otro-q1" value="<?php echo htmlspecialchars($respuestas['310'] ?? ''); ?>"
                        class="act1-input-texto"
                        style="display: <?php echo !empty($respuestas['310']) ? 'block' : 'none'; ?>; width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; margin-top: 1rem;"
                        placeholder="Escribe qué otra señal notaste..." <?php echo $st1['completada'] ? 'disabled' : ''; ?>>
            </div>

            <div class="m1-experimento-seccion">
                <p class="m1-experimento-titulo">De acuerdo a la respuesta anterior, selecciona una respuesta amable, que implementarás.</p>
                <p style="margin-bottom: 2.5rem; font-weight: 700;">Estas señales podrían estar pidiendo…</p>

                <?php
                $opciones_q2 = [
                    'Pausa breve',
                    'Respiración 1 min',
                    'Estirar suavemente',
                    'Hidratación',
                    'Ajustar ritmo del día',
                    'Preparar rutina nocturna'
                ];
                $val_311 = $respuestas['311'] ?? '';
                foreach ($opciones_q2 as $opcion):
                    $es_la_elegida = ($val_311 === $opcion);
                ?>
                    <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                        <input type="radio" name="311" value="<?php echo $opcion; ?>"
                            class="m1-check-input act1-q2-radio"
                            <?php echo $es_la_elegida ? 'checked' : ''; ?>
                            <?php echo $st1['completada'] ? 'disabled' : ''; ?>>
                        <span class="m1-check-custom" style="border-radius: 50%;"></span>
                        <span class="m1-check-texto"><?php echo $opcion; ?></span>
                    </label>
                <?php endforeach; ?>

                <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                    <input type="radio" name="311" value="Otra" id="radio-otra-q2"
                        class="m1-check-input act1-q2-radio"
                        <?php echo ($val_311 === 'Otra') ? 'checked' : ''; ?>
                        <?php echo $st1['completada'] ? 'disabled' : ''; ?>>
                    <span class="m1-check-custom" style="border-radius: 50%;"></span>
                    <span class="m1-check-texto">Otra</span>
                </label>
                <input type="text" name="312" id="input-otra-q2" value="<?php echo htmlspecialchars($respuestas['312'] ?? ''); ?>"
                    class="act1-input-texto"
                    style="display: <?php echo ($val_311 === 'Otra') ? 'block' : 'none'; ?>; width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; margin-top: 1rem;"
                    placeholder="Escribe qué otra respuesta amable implementarás..." <?php echo $st1['completada'] ? 'disabled' : ''; ?>>

                <div id="frase-q2" style="display: <?php echo !empty($val_311) ? 'block' : 'none'; ?>; margin-top: 4rem; text-align: center;">
                    <p class="m-mensaje-completado-modulo">“Escuchar tu cuerpo no es rendirse: es cuidarte con inteligencia.”</p>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p class="texto-justificado">Durante los próximos días, cuando notes alguna señal de tu cuerpo como sueño, hormigueos, distensión, entre otras, haz una breve pausa, lleva tu atención a tu cuerpo realizando el ejercicio de escaneo corporal, con amabilidad, paciencia y sin juicio. Al finalizar indaga en tu experiencia:</p>
            </div>

            <div class="m1-experimento-seccion">

                <div style="margin-bottom: 3rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Te colocaste algunos lentes cuando apareció el malestar?</p>
                    <textarea name="313" class="act1-textarea" style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 80px; resize: vertical;" <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($respuestas['313'] ?? ''); ?></textarea>
                </div>

                <div style="margin-bottom: 3rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Notaste el estado de tu mente?</p>
                    <textarea name="314" class="act1-textarea" style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 80px; resize: vertical;" <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($respuestas['314'] ?? ''); ?></textarea>
                </div>

                <div style="margin-bottom: 3rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Qué podría estar necesitando tu cuerpo en este momento?</p>
                    <textarea name="315" class="act1-textarea" style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 80px; resize: vertical;" <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($respuestas['315'] ?? ''); ?></textarea>
                </div>

                <div style="margin-bottom: 1rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">Y finalmente ¿notaste algún cambio en tu cuerpo al finalizar el ejercicio?</p>
                    <textarea name="316" class="act1-textarea" style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 80px; resize: vertical;" <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($respuestas['316'] ?? ''); ?></textarea>
                </div>

            </div>

            <div style="text-align: center; margin-top: 6rem;">
                <?php if ($st1['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 1 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act1-m3" class="boton" data-intro="<?php echo $ya_respondio_intro ? 'true' : 'false'; ?>"
                        style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Actividad 1
                    </button>
                    <?php if (!$ya_respondio_intro): ?>
                        <p class="m-mensaje-advertencia">Debes completar la observación inicial del módulo para poder guardar esta actividad.</p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <?php $st2 = getEstado(2, $actual); ?>
    <section class="actividad" id="act2" style="<?php echo $st2['visible']; ?>">
        <div class="divisor-modulo"></div>
        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 2. Tomando distancia y perspectiva</h2>
            <p>A continuación, te guiaremos a través de un ejercicio sonoro. Escucha cada audio y responde cuando aparezca la pregunta.</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act2-m3">
            <input type="hidden" name="id_modulo" value="3">
            <input type="hidden" name="actividad_id" value="2">

            <div class="m1-experimento-seccion">
                <div class="m3-audio-contenedor" style="text-align: center; margin-bottom: 2rem;">
                    <audio id="audio-m6-11" controls style="width: 100%; ">
                        <source src="/build/audio/Audio_D2.1.mp3" type="audio/mpeg">
                        Tu navegador no soporta el audio.
                    </audio>
                </div>

                <?php $val_321 = $respuestas['321'] ?? ''; ?>
                <div id="caja-321" style="display: <?php echo (!empty($val_321) || $st2['completada']) ? 'block' : 'none'; ?>; margin-top: 3rem; animation: fadeIn 0.5s;">
                    <p style="font-weight: 700;  color: #12307D; margin-bottom: 1.5rem;">¿Qué pensamiento recurrente aparece en tu mente?</p>
                    <textarea name="321" class="act2-textarea" style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 80px; resize: vertical; " <?php echo $st2['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_321); ?></textarea>
                </div>
            </div>

            <div class="m1-experimento-seccion">
                <div class="m3-audio-contenedor" style="text-align: center; margin-bottom: 2rem;">
                    <audio controls style="width: 100%;  margin-bottom: 2rem;">
                        <source src="/build/audio/Audio_D2.2.mp3" type="audio/mpeg">
                        Tu navegador no soporta el audio.
                    </audio>
                    <br>
                    <audio id="audio-m6-13" controls style="width: 100%; ">
                        <source src="/build/audio/Audio_D2.3.mp3" type="audio/mpeg">
                        Tu navegador no soporta el audio.
                    </audio>
                </div>

                <?php $val_322 = $respuestas['322'] ?? ''; ?>
                <div id="caja-322" style="display: <?php echo (!empty($val_322) || $st2['completada']) ? 'block' : 'none'; ?>; margin-top: 3rem; animation: fadeIn 0.5s;">
                    <p style="font-weight: 700;  color: #12307D; margin-bottom: 1.5rem;">“Estoy teniendo el pensamiento de que…”</p>
                    <textarea name="322" class="act2-textarea" style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 80px; resize: vertical;  margin-bottom: 1.5rem;" <?php echo $st2['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_322); ?></textarea>
                    <p class="texto-justificado" style="color: #555; font-style: italic;">Observa qué cambia. No busques sentirte mejor, solo nota la distancia.</p>
                </div>
            </div>

            <div class="m1-experimento-seccion">
                <div class="m3-audio-contenedor" style="text-align: center; margin-bottom: 2rem;">
                    <audio id="audio-m6-14" controls style="width: 100%; ">
                        <source src="/build/audio/Audio_D2.4.mp3" type="audio/mpeg">
                        Tu navegador no soporta el audio.
                    </audio>
                </div>

                <?php $val_323 = $respuestas['323'] ?? ''; ?>
                <div id="caja-323" style="display: <?php echo (!empty($val_323) || $st2['completada']) ? 'block' : 'none'; ?>; margin-top: 3rem; animation: fadeIn 0.5s;">
                    <p style="font-weight: 700;  color: #12307D; margin-bottom: 1.5rem;">¿Qué pensamiento recurrente aparece en tu mente con la palabra <strong>pero</strong>?</p>
                    <textarea name="323" class="act2-textarea" style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 80px; resize: vertical;" <?php echo $st2['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_323); ?></textarea>
                </div>
            </div>

            <div class="m1-experimento-seccion">
                <div class="m3-audio-contenedor" style="text-align: center; margin-bottom: 2rem;">
                    <audio id="audio-m6-15" controls style="width: 100%; ">
                        <source src="/build/audio/Audio_D2.5.mp3" type="audio/mpeg">
                        Tu navegador no soporta el audio.
                    </audio>
                </div>

                <?php $val_324 = $respuestas['324'] ?? ''; ?>
                <div id="caja-324" style="display: <?php echo (!empty($val_324) || $st2['completada']) ? 'block' : 'none'; ?>; margin-top: 3rem; animation: fadeIn 0.5s;">
                    <p style="font-weight: 700;  color: #12307D; margin-bottom: 1.5rem;">“Estoy teniendo el pensamiento de que…”</p>
                    <textarea name="324" class="act2-textarea" style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 80px; resize: vertical; margin-bottom: 1.5rem;" <?php echo $st2['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_324); ?></textarea>
                    <p class="texto-justificado" style="color: #555; font-style: italic;">Nota cómo el lenguaje se vuelve más ligero y menos dominante.</p>
                </div>
            </div>

            <div style="display: flex; flex-wrap: wrap; gap: 4rem; align-items: center; margin: 6rem 0; background: #eef2f7; padding: 4rem; border-radius: 1.5rem;">
                <div style="flex: 1 1 300px; text-align: center;">
                    <img src="/build/img/m3a2_img1.webp" alt="Tomando distancia" class="img-ebook">
                </div>
                <div style="flex: 1 1 300px;">
                    <p class="texto-justificado" style=" font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">Puedes notar lo que aparece en tu mente y dejarlo pasar.</p>
                    <p class="texto-justificado" style=" margin-bottom: 1.5rem;">No necesitas pelear ni obedecer.</p>
                    <p class="texto-justificado" style=" margin-bottom: 2.5rem;">Tu camino sigue disponible.</p>
                    <p class="texto-justificado" style="color: #555; font-style: italic;"><i class="fas fa-headphones-alt"></i> Prueba escuchando nuevamente la metáfora del cielo y las nubes del módulo 1.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 4rem;">
                <?php if ($st2['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 2 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act2-m3" class="boton"
                        style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Actividad 2
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <!-- Actividad 3 -->
    <?php $st3 = getEstado(3, $actual); ?>
    <section class="actividad" id="act3" style="<?php echo $st3['visible']; ?>">

        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo" style="color: #12307D; margin-bottom: 3rem;">Actividad 3. Consciencia de la experiencia</h2>
            <p>Durante un malestar, registra tu experiencia completa: mente, emociones y cuerpo. El foco es observar, no cambiar.</p>
            <p style="color: #555; font-style: italic;"><i class="fas fa-hand-pointer"></i> Haz clic en cada luz del semáforo para registrar las diferentes partes de tu experiencia.</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act3-m3">
            <input type="hidden" name="id_modulo" value="3">
            <input type="hidden" name="actividad_id" value="3">

            <div class="m3-semaforo-wrapper" style="display: flex; flex-wrap: wrap; gap: 4rem; align-items: flex-start; margin: 4rem 0;">

                <div class="m3-semaforo-container">
                    <div class="m3-luz roja active" id="btn-luz-roja" data-target="panel-rojo"></div>
                    <div class="m3-luz amarilla" id="btn-luz-amarilla" data-target="panel-amarillo"></div>
                    <div class="m3-luz verde" id="btn-luz-verde" data-target="panel-verde"></div>
                </div>

                <div class="m3-paneles-container">

                    <div id="panel-rojo" class="m3-panel-semaforo" style="display: block; animation: fadeIn 0.5s;">
                        <h3 style="color: #e74c3c; font-weight: 700;  margin-bottom: 2rem; font-size: 2em;"><i class="fas fa-brain"></i> Mente</h3>
                        <p style="font-weight: 700;  color: #333; margin-bottom: 1.5rem;">Anota un pensamiento que esté apareciendo.</p>
                        <?php $val_331 = $respuestas['331'] ?? ''; ?>
                        <textarea name="331" id="input-331" class="act3-val-rojo" placeholder="Escribe aquí tu pensamiento..."
                            style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 100px; resize: vertical; "
                            <?php echo $st3['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_331); ?></textarea>
                    </div>

                    <div id="panel-amarillo" class="m3-panel-semaforo" style="display: none; animation: fadeIn 0.5s;">
                        <h3 style="color: #f39c12; font-size: 2em; font-weight: 800;  margin-bottom: 2rem;"><i class="fas fa-heart"></i> Emociones</h3>
                        <p style="font-weight: 700;  color: #333; margin-bottom: 1.5rem;">Selecciona la emoción o emociones que identifiques:</p>

                        <?php
                        $opciones_amarillo = [
                            '332' => 'Frustración',
                            '333' => 'Tristeza',
                            '334' => 'Cansancio emocional',
                            '335' => 'Miedo al síntoma',
                            '336' => 'Calma'
                        ];
                        foreach ($opciones_amarillo as $id => $opcion):
                            $esta_marcada = isset($respuestas[$id]) && $respuestas[$id] === $opcion;
                        ?>
                            <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                                <input type="checkbox" name="<?php echo $id; ?>" value="<?php echo $opcion; ?>"
                                    class="m1-check-input act3-val-amarillo"
                                    <?php echo $esta_marcada ? 'checked' : ''; ?>
                                    <?php echo $st3['completada'] ? 'disabled' : ''; ?>>
                                <span class="m1-check-custom"></span>
                                <span class="m1-check-texto" style=""><?php echo $opcion; ?></span>
                            </label>
                        <?php endforeach; ?>

                        <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                            <input type="checkbox" id="chk-otra-amarillo" class="m1-check-input act3-val-amarillo"
                                <?php echo !empty($respuestas['337']) ? 'checked' : ''; ?>
                                <?php echo $st3['completada'] ? 'disabled' : ''; ?>>
                            <span class="m1-check-custom"></span>
                            <span class="m1-check-texto" style="">Otra</span>
                        </label>
                        <input type="text" name="338" id="input-otra-amarillo" value="<?php echo htmlspecialchars($respuestas['338'] ?? ''); ?>"
                            class="act3-input-texto" placeholder="Escribe qué otra emoción..."
                            style="display: <?php echo !empty($respuestas['337']) ? 'block' : 'none'; ?>; width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem;  margin-top: 1rem;"
                            <?php echo $st3['completada'] ? 'disabled' : ''; ?>>
                    </div>

                    <div id="panel-verde" class="m3-panel-semaforo" style="display: none; animation: fadeIn 0.5s;">
                        <h3 style="font-size: 2em; color: #27ae60; font-weight: 800;  margin-bottom: 2rem;"><i class="fas fa-child"></i> Cuerpo</h3>
                        <p style="font-weight: 700;  color: #333; margin-bottom: 0.5rem;">Selecciona lo que tu cuerpo está sintiendo.</p>
                        <p style="color: #666; font-style: italic; margin-bottom: 2rem;">Si te cuesta identificarlo puedes realizar el escaneo corporal de la actividad anterior.</p>

                        <?php
                        $opciones_verde = [
                            '339' => 'Dolor leve',
                            '340' => 'Dolor moderado',
                            '341' => 'Opresión',
                            '342' => 'Rigidez',
                            '343' => 'Mareo'
                        ];
                        foreach ($opciones_verde as $id => $opcion):
                            $esta_marcada = isset($respuestas[$id]) && $respuestas[$id] === $opcion;
                        ?>
                            <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                                <input type="checkbox" name="<?php echo $id; ?>" value="<?php echo $opcion; ?>"
                                    class="m1-check-input act3-val-verde"
                                    <?php echo $esta_marcada ? 'checked' : ''; ?>
                                    <?php echo $st3['completada'] ? 'disabled' : ''; ?>>
                                <span class="m1-check-custom"></span>
                                <span class="m1-check-texto" style=""><?php echo $opcion; ?></span>
                            </label>
                        <?php endforeach; ?>

                        <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                            <input type="checkbox" id="chk-otro-verde" class="m1-check-input act3-val-verde"
                                <?php echo !empty($respuestas['344']) ? 'checked' : ''; ?>
                                <?php echo $st3['completada'] ? 'disabled' : ''; ?>>
                            <span class="m1-check-custom"></span>
                            <span class="m1-check-texto" style="">Otro</span>
                        </label>
                        <input type="text" name="345" id="input-otro-verde" value="<?php echo htmlspecialchars($respuestas['345'] ?? ''); ?>"
                            class="act3-input-texto" placeholder="Escribe qué otra sensación..."
                            style="display: <?php echo !empty($respuestas['344']) ? 'block' : 'none'; ?>; width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem;  margin-top: 1rem;"
                            <?php echo $st3['completada'] ? 'disabled' : ''; ?>>
                    </div>

                </div>
            </div>

            <div class="m3-experimento-seccion" style="background: #fdfdfd; padding: 4rem; border: 0.2rem solid #e0e0e0; border-radius: 1.5rem; margin: 4rem 0;">
                <p style="font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">¿Qué notaste que no estabas notando?</p>
                <?php $val_346 = $respuestas['346'] ?? ''; ?>
                <textarea name="346" id="input-346" class="act3-val-final"
                    style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 100px; resize: vertical; "
                    <?php echo $st3['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_346); ?></textarea>
            </div>

            <div style="margin: 5rem 0; text-align: center;">
                <p style="font-size: 2.4rem; font-weight: 700; color: #12307D; font-style: italic; line-height: 1.4;">“Observar tu experiencia no cambia tu diagnóstico… <br><span style="color: #27ae60;">pero sí cambia tu día.</span>”</p>
            </div>

            <div style="text-align: center; margin-top: 4rem;">
                <?php if ($st3['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 3 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act3-m3" class="boton"
                        style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Actividad 3
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <!-- Actividad 4 -->
    <?php $st4 = getEstado(4, $actual); ?>
    <section class="actividad" id="act4" style="<?php echo $st4['visible']; ?>">

        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 4. ¿Soy yo o mi condición?</h2>

            <p>A veces, la enfermedad intenta ocuparlo todo. Hoy vamos a darle su lugar… sin dejar que defina quién eres.</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act4-m3">
            <input type="hidden" name="id_modulo" value="3">
            <input type="hidden" name="actividad_id" value="4">

            <div class="m1-experimento-seccion">
                <p class="m1-experimento-titulo">Escribe una frase con la que te defines a veces:</p>

                <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 4rem; flex-wrap: wrap;">
                    <span style="font-weight: 700; color: #333;">Soy...</span>
                    <?php $val_351 = $respuestas['351'] ?? ''; ?>
                    <input type="text" name="351" id="input-351" class="act4-input"
                        placeholder="ej. una persona cansada, una persona enferma"
                        value="<?php echo htmlspecialchars($val_351); ?>"
                        style="flex: 1; min-width: 250px; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem;"
                        <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                </div>

                <p style="font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">Versión fusionada:</p>
                <?php $val_352 = $respuestas['352'] ?? ''; ?>
                <textarea name="352" id="input-352" class="act4-input"
                    style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 100px; resize: vertical; background: #eef2f7;"
                    <?php echo $st4['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_352); ?></textarea>
                <p style=" color: #666; font-style: italic; margin-top: 1rem;">* Se genera automáticamente, pero puedes editar el texto para que tenga más sentido para ti.</p>
            </div>

            <div class="actividad-seccion-texto">
                <p class="texto-justificado">En los próximos días nota el diálogo que sostienes contigo. Si detectas que te dices frases como <em>–ya no sirvo para nada, estoy condenado/a, el miedo me consume–</em>, haz una pausa y sin enjuiciarte, con mucha amabilidad busca una nueva frase en donde describas, así lo dirás de otra forma:</p>

                <div style="background: #eef2f7; border-left: 5px solid #12307D; padding: 2.5rem; border-radius: 0.8rem; margin: 3rem 0;">
                    <ul style="list-style: none; padding-left: 0; margin: 0; line-height: 2;">
                        <li style="margin-bottom: 1rem;"><i class="fas fa-quote-left" style="color: #12307D; margin-right: 1rem;"></i> Estoy sintiendo la emoción del miedo.</li>
                        <li><i class="fas fa-quote-left" style="color: #12307D; margin-right: 1rem;"></i> En este momento noto que estoy experimentando mucha fatiga.</li>
                    </ul>
                </div>
            </div>

            <div style="margin: 6rem 0; text-align: center;">
                <p style="font-size: 2.4rem; font-weight: 700; color: #12307D; font-style: italic; line-height: 1.4;">“Tu enfermedad es parte de tu historia, <br><span style="color: #27ae60;">pero no escribe tu nombre.</span>”</p>
            </div>

            <div style="text-align: center; margin-top: 4rem;">
                <?php if ($st4['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 4 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act4-m3" class="boton"
                        style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Actividad 4
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <!-- Actividad 5 -->
    <?php $st5 = getEstado(5, $actual); ?>
    <section class="actividad" id="act5" style="<?php echo $st5['visible']; ?>">

        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 5. Mente a bordo, yo al volante</h2>
            <p>Tu mente quiere ayudarte, aunque a veces suene como una radio exagerada. Vamos a escucharla… sin obedecer cada anuncio.</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act5-m3">
            <input type="hidden" name="id_modulo" value="3">
            <input type="hidden" name="actividad_id" value="5">

            <div class="m1-experimento-seccion">
                <p class="m1-experimento-titulo">Escribe el pensamiento repetitivo o temeroso:</p>
                <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
                    <span style="font-weight: 700; color: #333;">“Mi mente dice que…”</span>
                    <?php $val_361 = $respuestas['361'] ?? ''; ?>
                    <input type="text" name="361" id="input-361" class="act5-val-texto"
                        placeholder="Ej. “No voy a soportar el día”, “El dolor va a empeorar”"
                        value="<?php echo htmlspecialchars($val_361); ?>"
                        style="flex: 1; min-width: 250px; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem;"
                        <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                </div>
            </div>

            <div class="m1-audio-contenedor">
                <!-- <div style="margin-bottom: 2rem;">
                    <img src="/build/img/radio_mente.png" alt="Radio Mente" style="max-width: 120px;">
                </div> -->
                <p style="font-weight: 700;  color: #12307D; margin-bottom: 2rem;">📻 Anuncio de Radio Mente en curso...</p>
                <!-- <div class="m3-audio-contenedor" style="display: inline-block; width: 100%; max-width: 500px; margin-bottom: 3rem;">
                    <audio controls style="width: 100%;">
                        <source src="/build/audios/M3_Radio_Mente.mp3" type="audio/mpeg">
                        Tu navegador no soporta el audio.
                    </audio>
                </div> -->

                <div style="text-align: left;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 2rem;">Elige una acción valiosa que harás aunque el anuncio siga sonando:</p>
                    <?php
                    $opciones_radio = [
                        '362' => 'Respirar 1 min',
                        '363' => 'Tomar mi medicamento/seguir mi plan',
                        '364' => 'Ajustar el ritmo del día',
                        '365' => 'Escribir una nota para aliviar carga mental',
                        '366' => 'Realizar una pausa restaurativa',
                        '367' => 'Hacer algo que me importa'
                    ];
                    foreach ($opciones_radio as $id => $opcion):
                        $esta_marcada = isset($respuestas[$id]) && $respuestas[$id] === $opcion;
                    ?>
                        <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                            <input type="checkbox" name="<?php echo $id; ?>" value="<?php echo $opcion; ?>"
                                class="m1-check-input act5-val-check"
                                <?php echo $esta_marcada ? 'checked' : ''; ?>
                                <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                            <span class="m1-check-custom"></span>
                            <span class="m1-check-texto"><?php echo $opcion; ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p class="texto-justificado">Qué sucedería si en los próximos días, cuando notes que comienza a sonar esa radio con frases ruidosas, le pongas una melodía rítmica o graciosa, por ejemplo con la tonada de <em>“feliz cumpleaños a ti”</em> o <em>“a la víbora de la mar”</em>, y remata la frase anunciando la acción valiosa que realizarás.</p>

                <div style="margin: 4rem 0; text-align: center;">
                    <p style="font-size: 2.2rem; font-weight: 700; color: #12307D; font-style: italic;">“La mente habla fuerte… <span style="color: #27ae60;">pero tú eliges el rumbo.</span>”</p>
                </div>

                <p class="texto-justificado">Aunque haya síntomas, siempre puedes acercarte un poco a lo que te importa. Vuelve cada paso en algo valioso.</p>
            </div>

            <div class="m1-experimento-seccion">
                <div style="flex: 1 1 300px;">
                    <p style="font-weight: 700;  color: #12307D; margin-bottom: 2rem;">Elige un valor que hoy quieres honrar:</p>
                    <?php
                    $valores = ['Cuidado', 'Paciencia', 'Calma', 'Salud', 'Conexión', 'Esperanza'];
                    $val_371 = $respuestas['371'] ?? '';
                    foreach ($valores as $valor):
                        $es_elegido = ($val_371 === $valor);
                    ?>
                        <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                            <input type="radio" name="371" value="<?php echo $valor; ?>"
                                class="m1-check-input act5-val-radio1"
                                <?php echo $es_elegido ? 'checked' : ''; ?>
                                <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                            <span class="m1-check-custom" style="border-radius: 50%;"></span>
                            <span class="m1-check-texto"><?php echo $valor; ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div style="flex: 1 1 300px;">
                    <p style="font-weight: 700;  color: #12307D; margin-bottom: 2rem;">Selecciona una acción pequeña para acercarte a ese valor:</p>
                    <?php
                    $acciones_pequenas = ['Estirar suave', 'Tomar agua', 'Decir “no” a una demanda excesiva', 'Enviar un mensaje cariñoso', 'Organizar un espacio pequeño', 'Poner música relajante'];
                    $val_381 = $respuestas['381'] ?? '';
                    foreach ($acciones_pequenas as $accion):
                        $es_elegida = ($val_381 === $accion);
                    ?>
                        <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                            <input type="radio" name="381" value="<?php echo $accion; ?>"
                                class="m1-check-input act5-val-radio2"
                                <?php echo $es_elegida ? 'checked' : ''; ?>
                                <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                            <span class="m1-check-custom" style="border-radius: 50%;"></span>
                            <span class="m1-check-texto"><?php echo $accion; ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

            </div>

            <div style="margin: 4rem 0; text-align: center;">
                <p style="font-size: 2.2rem; font-weight: 700; color: #12307D; font-style: italic;">“Los valores son el volante… <span style="color: #27ae60;">y tú estás conduciendo.</span>”</p>
            </div>

            <div class="m1-evaluacion-final" style="background: #eef2f7; padding: 4rem; border-radius: 1.5rem; border: 0.2rem dashed #12307D; margin-top: 6rem;">
                <h3 class="act-titulo" style="color: #12307D; margin-bottom: 2rem;">Evaluación del Módulo 3</h3>
                <p style="margin-bottom: 3rem; ">¡Felicidades, has concluido el módulo 3! Tu experiencia es importante, marca la opción que mejor la refleja:</p>

                <?php
                $evaluacion_m3 = [
                    '391' => '1. El módulo fue claro y fácil de seguir',
                    '392' => '2. Lo trabajado en el módulo me resulta útil para mi calidad de vida o autocuidado',
                    '393' => '3. Considero que puedo aplicar lo trabajado en mi vida diaria'
                ];
                foreach ($evaluacion_m3 as $id => $pregunta): ?>
                    <div style="margin-bottom: 3rem;">
                        <p style="font-weight: 700; color: #333;"><?php echo $pregunta; ?></p>
                        <select name="<?php echo $id; ?>" class="m1-select-personalizado act5-val-eval" style="width: 100%; padding: 1.2rem; border-radius: 0.8rem;" <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                            <option value="">-- Selecciona una opción --</option>
                            <?php foreach (['Totalmente de acuerdo', 'De acuerdo', 'Poco de acuerdo', 'Totalmente en desacuerdo'] as $op): ?>
                                <option value="<?php echo $op; ?>" <?php echo ($respuestas[$id] ?? '') === $op ? 'selected' : ''; ?>><?php echo $op; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endforeach; ?>
            </div>

            <div style="text-align: center; margin-top: 4rem;">
                <?php if ($st5['completada']): ?>
                    <div class="m-mensaje-completado-modulo">
                        ✨ ¡Concluiste con el Módulo 3! ✨
                    </div>
                    <button type="button" class="boton boton-completado" disabled>
                        Módulo 3 Completado
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act5-m3" class="boton"
                        style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Módulo 3
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
    // ACTIVIDAD 1 - Módulo 3: Lógica y validación
    document.addEventListener('DOMContentLoaded', function() {
        const formAct1M3 = document.getElementById('form-act1-m3');
        if (!formAct1M3) return;

        const btnFinalizar = document.getElementById('btn-finalizar-act1-m3');

        // Obtenemos si el usuario ya contestó la introducción desde el dataset del botón
        const introCompletada = btnFinalizar ? btnFinalizar.dataset.intro === 'true' : false;

        // Elementos Pregunta 1
        const checksQ1 = document.querySelectorAll('.act1-q1-check');
        const chkOtroQ1 = document.getElementById('chk-otro-q1');
        const inputOtroQ1 = document.getElementById('input-otro-q1');
        const chkFatiga = document.getElementById('chk-304');
        const feedbackFatiga = document.getElementById('feedback-fatiga');

        // Elementos Pregunta 2
        const radiosQ2 = document.querySelectorAll('.act1-q2-radio');
        const radioOtraQ2 = document.getElementById('radio-otra-q2');
        const inputOtraQ2 = document.getElementById('input-otra-q2');
        const fraseQ2 = document.getElementById('frase-q2');

        // Elementos Reflexión (Textareas)
        const textareasReflexion = document.querySelectorAll('.act1-textarea');

        function validarFormularioAct1M3() {
            if (!btnFinalizar) return;

            // 1. Validar Q1: Al menos un checkbox marcado. Si "Otro" está marcado, debe tener texto.
            let q1Valido = false;
            const algunCheck = Array.from(checksQ1).some(chk => chk.checked);
            if (algunCheck) {
                if (chkOtroQ1.checked) {
                    q1Valido = inputOtroQ1.value.trim().length > 0;
                } else {
                    q1Valido = true;
                }
            }

            // 2. Validar Q2: Un radio seleccionado. Si es "Otra", debe tener texto.
            let q2Valido = false;
            const radioSeleccionado = Array.from(radiosQ2).find(r => r.checked);
            if (radioSeleccionado) {
                if (radioSeleccionado.value === 'Otra') {
                    q2Valido = inputOtraQ2.value.trim().length > 0;
                } else {
                    q2Valido = true;
                }
            }

            // 3. Validar Textareas: Todas las 4 preguntas finales deben tener algo escrito
            const textareasLlenas = Array.from(textareasReflexion).every(ta => ta.value.trim().length > 0);

            // EVALUACIÓN FINAL: Intro + Q1 + Q2 + Textareas
            const todoValido = introCompletada && q1Valido && q2Valido && textareasLlenas;

            if (todoValido) {
                btnFinalizar.disabled = false;
                btnFinalizar.style.opacity = "1";
                btnFinalizar.style.cursor = "pointer";
            } else {
                btnFinalizar.disabled = true;
                btnFinalizar.style.opacity = "0.5";
                btnFinalizar.style.cursor = "not-allowed";
            }
        }

        // Listeners para Pregunta 1
        checksQ1.forEach(chk => {
            chk.addEventListener('change', () => {
                // Si marcan/desmarcan "Otro", mostrar/ocultar caja de texto
                if (chk.id === 'chk-otro-q1') {
                    inputOtroQ1.style.display = chk.checked ? 'block' : 'none';
                    if (!chk.checked) inputOtroQ1.value = '';
                }
                // Si marcan/desmarcan "Fatiga Intensa", mostrar/ocultar feedback
                if (chk.id === 'chk-304') {
                    feedbackFatiga.style.display = chk.checked ? 'block' : 'none';
                }
                validarFormularioAct1M3();
            });
        });
        inputOtroQ1.addEventListener('input', validarFormularioAct1M3);

        // Listeners para Pregunta 2
        radiosQ2.forEach(radio => {
            radio.addEventListener('change', () => {
                fraseQ2.style.display = 'block'; // Mostrar la frase siempre que elija algo

                if (radio.value === 'Otra') {
                    inputOtraQ2.style.display = 'block';
                } else {
                    inputOtraQ2.style.display = 'none';
                    inputOtraQ2.value = '';
                }
                validarFormularioAct1M3();
            });
        });
        inputOtraQ2.addEventListener('input', validarFormularioAct1M3);

        // Listeners para las textareas finales
        textareasReflexion.forEach(ta => ta.addEventListener('input', validarFormularioAct1M3));

        // Ejecutar validación al cargar la página (por si ya tiene datos guardados o si recarga)
        validarFormularioAct1M3();
    });
    // ACTIVIDAD 2 - Módulo 3: Lógica de audios y validación
    document.addEventListener('DOMContentLoaded', function() {
        const formAct2M3 = document.getElementById('form-act2-m3');
        if (!formAct2M3) return;

        // Audios que detonan aparición
        const audio11 = document.getElementById('audio-m6-11');
        const audio13 = document.getElementById('audio-m6-13');
        const audio14 = document.getElementById('audio-m6-14');
        const audio15 = document.getElementById('audio-m6-15');

        // Cajas a mostrar
        const caja321 = document.getElementById('caja-321');
        const caja322 = document.getElementById('caja-322');
        const caja323 = document.getElementById('caja-323');
        const caja324 = document.getElementById('caja-324');

        // Función para mostrar las cajas cuando el audio termina
        if (audio11 && caja321) audio11.addEventListener('ended', () => caja321.style.display = 'block');
        if (audio13 && caja322) audio13.addEventListener('ended', () => caja322.style.display = 'block');
        if (audio14 && caja323) audio14.addEventListener('ended', () => caja323.style.display = 'block');
        if (audio15 && caja324) audio15.addEventListener('ended', () => caja324.style.display = 'block');

        // ---------------------------------------------------------
        // NUEVA LÓGICA: Control Inteligente de la línea de tiempo
        // ---------------------------------------------------------
        const todosLosAudios = formAct2M3.querySelectorAll('audio');

        todosLosAudios.forEach(audio => {
            let tiempoMaximoEscuchado = 0;
            let audioDesbloqueado = false;

            // Actualizamos el tiempo máximo escuchado mientras se reproduce normalmente
            audio.addEventListener('timeupdate', () => {
                if (!audioDesbloqueado && audio.currentTime > tiempoMaximoEscuchado) {
                    tiempoMaximoEscuchado = audio.currentTime;
                }
            });

            // Si el usuario intenta adelantar haciendo clic en la barra
            audio.addEventListener('seeking', () => {
                // Le damos un pequeño margen de 0.5 seg para evitar bugs del navegador
                if (!audioDesbloqueado && audio.currentTime > tiempoMaximoEscuchado + 0.5) {
                    // Lo regresamos a lo máximo que había escuchado
                    audio.currentTime = tiempoMaximoEscuchado;
                }
            });

            // Cuando el audio termina por primera vez, desbloqueamos la barra por completo
            audio.addEventListener('ended', () => {
                audioDesbloqueado = true;
            });
        });

        // ---------------------------------------------------------
        // Validación del botón Finalizar
        // ---------------------------------------------------------
        const textareasAct2 = document.querySelectorAll('.act2-textarea');
        const btnFinalizarAct2 = document.getElementById('btn-finalizar-act2-m3');

        function validarFormularioAct2M3() {
            if (!btnFinalizarAct2) return;

            // Verificar que las 4 áreas de texto tengan contenido
            const todasLlenas = Array.from(textareasAct2).every(ta => ta.value.trim().length > 0);

            if (todasLlenas) {
                btnFinalizarAct2.disabled = false;
                btnFinalizarAct2.style.opacity = "1";
                btnFinalizarAct2.style.cursor = "pointer";
            } else {
                btnFinalizarAct2.disabled = true;
                btnFinalizarAct2.style.opacity = "0.5";
                btnFinalizarAct2.style.cursor = "not-allowed";
            }
        }

        // Escuchar cambios en los textareas
        textareasAct2.forEach(ta => ta.addEventListener('input', validarFormularioAct2M3));

        // Ejecutar validación inicial
        validarFormularioAct2M3();
    });

    // ACTIVIDAD 3 - Módulo 3: Lógica del Semáforo y Validación
    document.addEventListener('DOMContentLoaded', function() {
        const formAct3M3 = document.getElementById('form-act3-m3');
        if (!formAct3M3) return;

        // Elementos del Semáforo
        const luces = document.querySelectorAll('.m3-luz');
        const paneles = document.querySelectorAll('.m3-panel-semaforo');

        // Lógica de pestañas (Cambiar luces)
        luces.forEach(luz => {
            luz.addEventListener('click', function() {
                // Quitar clase active a todas las luces
                luces.forEach(l => l.classList.remove('active'));
                // Ocultar todos los paneles
                paneles.forEach(p => p.style.display = 'none');

                // Activar luz clicada
                this.classList.add('active');
                // Mostrar panel correspondiente
                const targetId = this.getAttribute('data-target');
                document.getElementById(targetId).style.display = 'block';
            });
        });

        // Lógica para mostrar las cajas de texto de "Otra/Otro"
        const chkOtraAmarillo = document.getElementById('chk-otra-amarillo');
        const inputOtraAmarillo = document.getElementById('input-otra-amarillo');
        if (chkOtraAmarillo) {
            chkOtraAmarillo.addEventListener('change', () => {
                inputOtraAmarillo.style.display = chkOtraAmarillo.checked ? 'block' : 'none';
                if (!chkOtraAmarillo.checked) inputOtraAmarillo.value = '';
                validarFormularioAct3M3();
            });
            inputOtraAmarillo.addEventListener('input', validarFormularioAct3M3);
        }

        const chkOtroVerde = document.getElementById('chk-otro-verde');
        const inputOtroVerde = document.getElementById('input-otro-verde');
        if (chkOtroVerde) {
            chkOtroVerde.addEventListener('change', () => {
                inputOtroVerde.style.display = chkOtroVerde.checked ? 'block' : 'none';
                if (!chkOtroVerde.checked) inputOtroVerde.value = '';
                validarFormularioAct3M3();
            });
            inputOtroVerde.addEventListener('input', validarFormularioAct3M3);
        }

        // --- VALIDACIÓN DE GUARDADO ---
        const txtRojo = document.getElementById('input-331');
        const checksAmarillo = document.querySelectorAll('.act3-val-amarillo');
        const checksVerde = document.querySelectorAll('.act3-val-verde');
        const txtFinal = document.getElementById('input-346');
        const btnFinalizarAct3 = document.getElementById('btn-finalizar-act3-m3');

        function validarFormularioAct3M3() {
            if (!btnFinalizarAct3) return;

            // 1. Rojo Válido (Textarea tiene algo escrito)
            const rojoValido = txtRojo.value.trim().length > 0;

            // 2. Amarillo Válido (Algún checkbox seleccionado, y si es "Otra", tiene texto)
            let amarilloValido = false;
            const algunAmarillo = Array.from(checksAmarillo).some(chk => chk.checked);
            if (algunAmarillo) {
                if (chkOtraAmarillo.checked) {
                    amarilloValido = inputOtraAmarillo.value.trim().length > 0;
                } else {
                    amarilloValido = true;
                }
            }

            // 3. Verde Válido (Algún checkbox seleccionado, y si es "Otro", tiene texto)
            let verdeValido = false;
            const algunVerde = Array.from(checksVerde).some(chk => chk.checked);
            if (algunVerde) {
                if (chkOtroVerde.checked) {
                    verdeValido = inputOtroVerde.value.trim().length > 0;
                } else {
                    verdeValido = true;
                }
            }

            // 4. Pregunta final Válida
            const finalValido = txtFinal.value.trim().length > 0;

            // Evaluar todas
            if (rojoValido && amarilloValido && verdeValido && finalValido) {
                btnFinalizarAct3.disabled = false;
                btnFinalizarAct3.style.opacity = "1";
                btnFinalizarAct3.style.cursor = "pointer";
            } else {
                btnFinalizarAct3.disabled = true;
                btnFinalizarAct3.style.opacity = "0.5";
                btnFinalizarAct3.style.cursor = "not-allowed";
            }
        }

        // Agregar listeners para validación en tiempo real
        if (txtRojo) txtRojo.addEventListener('input', validarFormularioAct3M3);
        checksAmarillo.forEach(chk => chk.addEventListener('change', validarFormularioAct3M3));
        checksVerde.forEach(chk => chk.addEventListener('change', validarFormularioAct3M3));
        if (txtFinal) txtFinal.addEventListener('input', validarFormularioAct3M3);

        // Ejecutar validación inicial
        validarFormularioAct3M3();
    });
    // ACTIVIDAD 4 - Módulo 3: Auto-generación y Validación
    document.addEventListener('DOMContentLoaded', function() {
        const formAct4M3 = document.getElementById('form-act4-m3');
        if (!formAct4M3) return;

        const input351 = document.getElementById('input-351');
        const input352 = document.getElementById('input-352');
        const btnFinalizarAct4 = document.getElementById('btn-finalizar-act4-m3');

        // Bandera para saber si el usuario ya tocó la caja de versión fusionada
        let editadoManualmente = false;

        if (input351 && input352) {
            // Generación automática de la versión fusionada
            input351.addEventListener('input', function() {
                if (!editadoManualmente) {
                    const texto = this.value.trim();
                    if (texto.length > 0) {
                        // Concatenamos el prefijo con lo que el usuario va escribiendo
                        input352.value = "Hoy mi cuerpo está experimentando " + texto;
                    } else {
                        input352.value = "";
                    }
                }
                validarFormularioAct4M3();
            });

            // Si el usuario edita la versión fusionada manualmente, detenemos la auto-generación
            input352.addEventListener('input', function() {
                editadoManualmente = true;
                validarFormularioAct4M3();
            });
        }

        // --- VALIDACIÓN DE GUARDADO ---
        function validarFormularioAct4M3() {
            if (!btnFinalizarAct4) return;

            const val1 = input351.value.trim().length > 0;
            const val2 = input352.value.trim().length > 0;

            if (val1 && val2) {
                btnFinalizarAct4.disabled = false;
                btnFinalizarAct4.style.opacity = "1";
                btnFinalizarAct4.style.cursor = "pointer";
            } else {
                btnFinalizarAct4.disabled = true;
                btnFinalizarAct4.style.opacity = "0.5";
                btnFinalizarAct4.style.cursor = "not-allowed";
            }
        }

        // Ejecutar validación inicial (útil si la página se recarga con datos)
        validarFormularioAct4M3();
    });
    // ACTIVIDAD 5 Y EVALUACIÓN - Módulo 3: Validación Completa
    document.addEventListener('DOMContentLoaded', function() {
        const formAct5M3 = document.getElementById('form-act5-m3');
        if (!formAct5M3) return;

        const btnFinalizarAct5 = document.getElementById('btn-finalizar-act5-m3');

        // Elementos a validar
        const inputTexto = document.getElementById('input-361');
        const checksAccion = document.querySelectorAll('.act5-val-check');
        const radiosValor = document.querySelectorAll('.act5-val-radio1');
        const radiosPequena = document.querySelectorAll('.act5-val-radio2');
        const selectsEval = document.querySelectorAll('.act5-val-eval');

        function validarFormularioAct5M3() {
            if (!btnFinalizarAct5) return;

            // 1. Validar texto (que no esté vacío)
            const textoLleno = inputTexto.value.trim().length > 0;

            // 2. Validar checkboxes (al menos 1 seleccionado)
            const algunCheck = Array.from(checksAccion).some(chk => chk.checked);

            // 3. Validar radio de Valor (1 seleccionado)
            const valorElegido = Array.from(radiosValor).some(r => r.checked);

            // 4. Validar radio de Acción Pequeña (1 seleccionado)
            const pequenaElegida = Array.from(radiosPequena).some(r => r.checked);

            // 5. Validar selects de la Evaluación (los 3 deben tener valor)
            const evalLlena = Array.from(selectsEval).every(sel => sel.value !== "");

            // Comprobación Final
            if (textoLleno && algunCheck && valorElegido && pequenaElegida && evalLlena) {
                btnFinalizarAct5.disabled = false;
                btnFinalizarAct5.style.opacity = "1";
                btnFinalizarAct5.style.cursor = "pointer";
            } else {
                btnFinalizarAct5.disabled = true;
                btnFinalizarAct5.style.opacity = "0.5";
                btnFinalizarAct5.style.cursor = "not-allowed";
            }
        }

        // Asignar los "escuchadores" de eventos para validar en tiempo real
        if (inputTexto) inputTexto.addEventListener('input', validarFormularioAct5M3);
        checksAccion.forEach(chk => chk.addEventListener('change', validarFormularioAct5M3));
        radiosValor.forEach(r => r.addEventListener('change', validarFormularioAct5M3));
        radiosPequena.forEach(r => r.addEventListener('change', validarFormularioAct5M3));
        selectsEval.forEach(sel => sel.addEventListener('change', validarFormularioAct5M3));

        // Ejecutar validación inicial (útil si hay recarga de página con datos)
        validarFormularioAct5M3();
    });
</script>