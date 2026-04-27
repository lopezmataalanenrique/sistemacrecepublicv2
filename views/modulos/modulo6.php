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
            Módulo 6. Construyo mi camino
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

$ya_respondio_intro = !empty($respuestas['601']) && !empty($respuestas['602']) && !empty($respuestas['603']);

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
        <h1>Módulo 6. Contruyo mi camino</h1>
        <p class="texto-justificado">Te doy la bienvenida a este nuevo módulo. En este módulo explorarás la forma en que te vinculas con otras personas en tu vida cotidiana.</p>
        <p class="texto-justificado">Relacionarte no siempre es sencillo, surgen dificultades y barreras, La apertura y la elección de acciones comprometidas también se reflejan en las relaciones que deseas construir.</p>

        <form method="POST" action="/guardar-actividad" id="form-intro-m6">
            <input type="hidden" name="id_modulo" value="6">
            <input type="hidden" name="actividad_id" value="0">

            <div class="m1-evaluacion-final">
                <p>
                    Antes de comenzar, te invito a hacer una pausa y observar cómo han sido estos últimos días en tu proceso con CRECE. En este tiempo:
                </p>

                <?php
                $preguntas_intro = [
                    '601' => '¿Noto algún cambio en cómo me relaciono con mis pensamientos o emociones?',
                    '602' => '¿Noto cambios en mis respuestas o comportamientos habituales?',
                    '603' => '¿Practiqué alguno de los ejercicios y/o experimentos en mi vida diaria?'
                ];

                foreach ($preguntas_intro as $id => $texto):
                    $opciones = ($id === '603') ? ['No lo hice', 'Varias veces', 'Una vez'] : ['Sí, claramente', 'Un poco', 'Aún no lo noto'];
                ?>
                    <div style="margin-bottom: 3rem;">
                        <p style="font-weight: 700; color: #12307D;"><?php echo $texto; ?></p>
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
    </section>

    <?php $st1 = getEstado(1, $actual); ?>
    <section class="actividad" id="act1" style="<?php echo $st1['visible']; ?>">
        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 1. Etiquetas</h2>
        </div>

        <div class="m1-experimento-seccion" style="padding: 4rem;">

            <div id="et1-s1">
                <div class="m1-audio-contenedor" style="text-align: center; border: none; background: transparent; padding: 0;">
                    <img src="/build/img/m6a1_img1.png" class="img-ebook" alt="Etiqueta 1" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                    <audio controls style="max-width: 40rem;">
                        <source src="/build/audio/Audio_G1_Etiquetas.mp3" type="audio/mpeg">
                        Tu navegador no soporta el audio.
                    </audio>
                </div>
                <?php if (!$st1['completada']): ?>
                    <div style="text-align: center; margin-top: 3rem;">
                        <button type="button" class="boton" onclick="showStepAct1M6('et1-s2', this)">Siguiente paso</button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="step-content" id="et1-s2" style="<?php echo $st1['completada'] ? 'display: block; opacity: 1;' : 'display: none; opacity: 0;'; ?> transition: opacity 0.5s; margin-top: 4rem;">
                <div class="m1-audio-contenedor" style="text-align: center; border: none; background: transparent; padding: 0;">
                    <img src="/build/img/m6a1_img2.png" class="img-ebook" alt="Etiqueta 2" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                    <audio controls style=" max-width: 400px;">
                        <source src="/build/audio/Audio_G2_Etiquetas.mp3" type="audio/mpeg">
                    </audio>
                </div>
                <?php if (!$st1['completada']): ?>
                    <div style="text-align: center; margin-top: 3rem;">
                        <button type="button" class="boton" onclick="showStepAct1M6('et1-s3', this)">Siguiente paso</button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="step-content" id="et1-s3" style="<?php echo $st1['completada'] ? 'display: block; opacity: 1;' : 'display: none; opacity: 0;'; ?> transition: opacity 0.5s; margin-top: 4rem;">
                <div class="m1-audio-contenedor" style="text-align: center; border: none; background: transparent; padding: 0;">
                    <img src="/build/img/m6a1_img3.png" class="img-ebook" alt="Etiqueta 3" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                    <audio controls style="width: 100%; max-width: 400px;">
                        <source src="/build/audio/Audio_G3_Etiquetas.mp3" type="audio/mpeg">
                    </audio>
                </div>
                <?php if (!$st1['completada']): ?>
                    <div style="text-align: center; margin-top: 3rem;">
                        <button type="button" class="boton" onclick="showStepAct1M6('et1-s4', this)">Siguiente paso</button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="step-content" id="et1-s4" style="<?php echo $st1['completada'] ? 'display: block; opacity: 1;' : 'display: none; opacity: 0;'; ?> transition: opacity 0.5s; margin-top: 4rem;">
                <div class="m1-audio-contenedor" style="text-align: center; border: none; background: transparent; padding: 0;">
                    <img src="/build/img/m6a1_img4.png" class="img-ebook" alt="Etiqueta 4" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                    <audio controls style="width: 100%; max-width: 400px;">
                        <source src="/build/audio/Audio_G4_Etiquetas.mp3" type="audio/mpeg">
                    </audio>
                </div>
                <?php if (!$st1['completada']): ?>
                    <div style="text-align: center; margin-top: 3rem;">
                        <button type="button" class="boton" onclick="showStepAct1M6('et1-s5', this)">Siguiente paso</button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="step-content" id="et1-s5" style="<?php echo $st1['completada'] ? 'display: block; opacity: 1;' : 'display: none; opacity: 0;'; ?> transition: opacity 0.5s; margin-top: 4rem;">
                <div style="display: flex; flex-wrap: wrap; gap: 4rem; align-items: center; background: #eef2f7; padding: 4rem; border-radius: 1.5rem;">
                    <div style="flex: 1 1 300px; text-align: center;">
                        <img src="/build/img/m6a1_img5.png" class="img-ebook" alt="Avanzando con los peros" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    </div>
                    <div style="flex: 1 1 300px;">
                        <p style="margin-bottom: 1.5rem;">Las frases “sí, pero…”, “yo soy así” o “no puedo” suelen aparecer cuando quieres avanzar.</p>
                        <p style="margin-bottom: 1.5rem;">No son hechos, son solo pensamientos.</p>
                        <p style="font-weight: 700; color: #12307D;">Puedes notarlos… y aun así avanzar hacia lo que te importa.</p>

                        <?php if (!$st1['completada']): ?>
                            <div style="margin-top: 3rem;">
                                <button type="button" class="boton" onclick="showStepAct1M6('et1-s6', this)">Siguiente paso</button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="step-content" id="et1-s6" style="<?php echo $st1['completada'] ? 'display: block; opacity: 1;' : 'display: none; opacity: 0;'; ?> transition: opacity 0.5s; margin-top: 4rem;">
                <div style="display: flex; flex-wrap: wrap; gap: 4rem; align-items: center; flex-direction: row-reverse; background: #eef2f7; padding: 4rem; border-radius: 1.5rem;">
                    <div style="flex: 1 1 300px; text-align: center;">
                        <img src="/build/img/m6a1_img6.png" class="img-ebook" alt="Los pensamientos pasan" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    </div>
                    <div style="flex: 1 1 300px;">
                        <p style="margin-bottom: 1.5rem;">Los “peros” van a aparecer, es normal. El problema no es que estén, sino seguirlos sin darte cuenta.</p>
                        <p style="margin-bottom: 1.5rem;">Tus pensamientos y emociones son experiencias que pasan, no son lo que eres.</p>
                        <p style="font-weight: 700; color: #12307D;">Puedes notarlos y aun así elegir el siguiente paso.</p>

                        <form method="POST" action="/guardar-actividad" id="form-act1-m6" style="margin-top: 4rem;">
                            <input type="hidden" name="id_modulo" value="6">
                            <input type="hidden" name="actividad_id" value="1">

                            <?php if ($st1['completada']): ?>
                                <button type="button" class="boton boton-completado" disabled>
                                    <i class="fas fa-check"></i> Actividad 1 Completada
                                </button>
                            <?php else: ?>
                                <button type="submit" id="btn-finalizar-act1-m6" class="boton boton-por-guardar" data-intro="<?php echo $ya_respondio_intro ? 'true' : 'false'; ?>" disabled>
                                    Guardar y finalizar Actividad 1
                                </button>
                                <?php if (!$ya_respondio_intro): ?>
                                    <div class="m-mensaje-advertencia" style="margin-top: 2rem;">
                                        Debes completar la pausa inicial del módulo para poder guardar esta actividad.
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Actividad 2 -->
    <?php $st2 = getEstado(2, $actual); ?>
    <section class="actividad" id="act2" style="<?php echo $st2['visible']; ?>">
        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 2. Cuidar mi cuerpo</h2>
        </div>

        <div class="m1-experimento-seccion" style="padding: 4rem;">

            <div style="display: flex; flex-wrap: wrap; gap: 4rem; align-items: center; margin-bottom: 4rem;">
                <div style="flex: 1 1 300px;">
                    <p style="margin-bottom: 1.5rem;">Cuidar tu cuerpo es atenderte con pequeños gestos cada día.</p>
                    <p style="margin-bottom: 1.5rem;">No necesitas cambiar quién eres, solo empezar desde donde estás.</p>
                    <p><strong>Cada acción de cuidado suma y fortalece tu bienestar.</strong></p>
                </div>
                <div style="flex: 1 1 300px; text-align: center;">
                    <img src="/build/img/m6a2_img1.png" class="img-ebook" alt="Cuidar tu cuerpo" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                </div>
            </div>

            <div id="ac2-s1">
                <div class="m1-audio-contenedor" style="text-align: center; border: none; background: transparent; padding: 0;">
                    <img src="/build/img/m6a2_img2.png" class="img-ebook" alt="Paso 1" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                    <audio controls style="max-width: 40rem;">
                        <source src="/build/audio/Audio_G5_Cuidar_mi_cuerpo.mp3" type="audio/mpeg">
                        Tu navegador no soporta el audio.
                    </audio>
                </div>
                <?php if (!$st2['completada']): ?>
                    <div style="text-align: center; margin-top: 3rem;">
                        <button type="button" class="boton" onclick="showStepAct2M6('ac2-s2', this)">Siguiente paso</button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="step-content" id="ac2-s2" style="<?php echo $st2['completada'] ? 'display: block; opacity: 1;' : 'display: none; opacity: 0;'; ?> transition: opacity 0.5s; margin-top: 4rem;">
                <div class="m1-audio-contenedor" style="text-align: center; border: none; background: transparent; padding: 0;">
                    <img src="/build/img/m6a2_img3.png" class="img-ebook" alt="Paso 2" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                    <audio controls style="max-width: 40rem;">
                        <source src="/build/audio/Audio_G6_Cuidar_mi_cuerpo.mp3" type="audio/mpeg">
                    </audio>
                </div>
                <?php if (!$st2['completada']): ?>
                    <div style="text-align: center; margin-top: 3rem;">
                        <button type="button" class="boton" onclick="showStepAct2M6('ac2-s3', this)">Siguiente paso</button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="step-content" id="ac2-s3" style="<?php echo $st2['completada'] ? 'display: block; opacity: 1;' : 'display: none; opacity: 0;'; ?> transition: opacity 0.5s; margin-top: 4rem;">
                <div class="m1-audio-contenedor" style="text-align: center; border: none; background: transparent; padding: 0;">
                    <img src="/build/img/m6a2_img4.png" class="img-ebook" alt="Paso 3" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                    <audio controls style="max-width: 40rem;">
                        <source src="/build/audio/Audio_G7_Cuidar_mi_cuerpo.mp3" type="audio/mpeg">
                    </audio>
                </div>
                <?php if (!$st2['completada']): ?>
                    <div style="text-align: center; margin-top: 3rem;">
                        <button type="button" class="boton" onclick="showStepAct2M6('ac2-s4', this)">Siguiente paso</button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="step-content" id="ac2-s4" style="<?php echo $st2['completada'] ? 'display: block; opacity: 1;' : 'display: none; opacity: 0;'; ?> transition: opacity 0.5s; margin-top: 4rem;">
                <div class="m1-audio-contenedor" style="text-align: center; border: none; background: transparent; padding: 0;">
                    <img src="/build/img/m6a2_img5.png" class="img-ebook" alt="Paso 4" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                    <audio controls style="max-width: 40rem;">
                        <source src="/build/audio/Audio_G8_Cuidar_mi_cuerpo.mp3" type="audio/mpeg">
                    </audio>
                </div>
                <?php if (!$st2['completada']): ?>
                    <div style="text-align: center; margin-top: 3rem;">
                        <button type="button" class="boton" onclick="showStepAct2M6('ac2-s5', this)">Siguiente paso</button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="step-content" id="ac2-s5" style="<?php echo $st2['completada'] ? 'display: block; opacity: 1;' : 'display: none; opacity: 0;'; ?> transition: opacity 0.5s; margin-top: 4rem;">
                <div class="m1-audio-contenedor" style="text-align: center; border: none; background: transparent; padding: 0;">
                    <img src="/build/img/m6a2_img6.png" class="img-ebook" alt="Paso 5" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                    <audio controls style="max-width: 40rem;">
                        <source src="/build/audio/Audio_G9_Cuidar_mi_cuerpo.mp3" type="audio/mpeg">
                    </audio>
                </div>
                <?php if (!$st2['completada']): ?>
                    <div style="text-align: center; margin-top: 3rem;">
                        <button type="button" class="boton" onclick="showStepAct2M6('ac2-form', this)">Siguiente paso</button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="step-content" id="ac2-form" style="<?php echo $st2['completada'] ? 'display: block; opacity: 1;' : 'display: none; opacity: 0;'; ?> transition: opacity 0.5s; margin-top: 5rem; background: #fdfdfd; padding: 4rem; border: 0.2rem solid #e0e0e0; border-radius: 1.5rem;">

                <form method="POST" action="/guardar-actividad" id="form-act2-m6">
                    <input type="hidden" name="id_modulo" value="6">
                    <input type="hidden" name="actividad_id" value="2">

                    <div style="margin-bottom: 4rem;">
                        <div style="display: flex; flex-wrap: wrap; gap: 2rem; align-items: center; margin-bottom: 1.5rem;">
                            <div style="flex: 1 1 250px;">
                                <p style="font-weight: 700; color: #12307D; margin: 0;">¿Qué necesita hoy mi cuerpo?</p>
                            </div>
                            <div style="flex: 0 0 100px; text-align: right;">
                                <img src="/build/img/m6a2_img4.png" alt="Icono" style="max-width: 100px; border-radius: 1rem;">
                            </div>
                        </div>
                        <?php $val_604 = $respuestas['604'] ?? ''; ?>
                        <textarea name="604" id="txt-604" class="act2-textarea" style="width: 100%; border: 2px solid #e0e0e0; border-radius: 1.2rem; padding: 2rem; height: 100px; resize: vertical;" <?php echo $st2['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_604); ?></textarea>

                        <div id="fb-604" style="color: #27ae60; font-weight: 700; margin-top: 1rem; display: <?php echo !empty($val_604) ? 'block' : 'none'; ?>;">
                            <i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando
                        </div>
                    </div>

                    <div style="margin-bottom: 4rem;">
                        <div style="display: flex; flex-wrap: wrap; gap: 2rem; align-items: center; margin-bottom: 1.5rem;">
                            <div style="flex: 1 1 250px;">
                                <p style="font-weight: 700; color: #12307D; margin: 0;">¿Qué puedo ofrecerle a mi cuerpo ahora mismo, aunque sea algo pequeño?</p>
                            </div>
                            <div style="flex: 0 0 100px; text-align: right;">
                                <img src="/build/img/m6a2_img4.png" alt="Icono" style="max-width: 100px; border-radius: 1rem;">
                            </div>
                        </div>
                        <?php $val_605 = $respuestas['605'] ?? ''; ?>
                        <textarea name="605" id="txt-605" class="act2-textarea" style="width: 100%; border: 2px solid #e0e0e0; border-radius: 1.2rem; padding: 2rem; height: 100px; resize: vertical;" <?php echo $st2['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_605); ?></textarea>

                        <div id="fb-605" style="color: #27ae60; font-weight: 700; margin-top: 1rem; display: <?php echo !empty($val_605) ? 'block' : 'none'; ?>;">
                            <i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando
                        </div>
                    </div>

                    <div style="text-align: center; margin-top: 4rem;">
                        <?php if ($st2['completada']): ?>
                            <button type="button" class="boton boton-completado" disabled>
                                <i class="fas fa-check"></i> Actividad 2 Completada
                            </button>
                        <?php else: ?>
                            <button type="submit" id="btn-finalizar-act2-m6" class="boton boton-por-guardar" disabled>
                                Guardar y finalizar Actividad 2
                            </button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <!-- Actividad 3 -->
    <?php $st3 = getEstado(3, $actual); ?>
    <section class="actividad" id="act3" style="<?php echo $st3['visible']; ?>">
        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 3. Paradas Seguras</h2>
            <p>Aceptar tu cuerpo no es rendirte, es dejar de pelear con lo que ya está para poder cuidarte mejor.</p>
            <p>Cuando hay dolor o cansancio solemos exigirnos más o rechazarnos, eso agota y nos aleja del cuidado.</p>
            <p>Hacer una pausa, notar cómo estás y responder con amabilidad vuelve tu avance más sostenible.</p>

            <p style="font-weight: 700; color: #12307D; margin-top: 2rem; margin-bottom: 2rem;">Aceptar no es detenerte, es moverte con más sabiduría.</p>

            <p>Demos un paso más. Cuando permaneces frente a tu experiencia sin reaccionar de inmediato, puede empezar a ocurrir algo distinto:</p>
            <p>Puedes notar la presencia de la incomodidad, de sensaciones o síntomas abrumadores y darte cuenta que no define lo que eres. Este cambio de perspectiva abre nuevas posibilidades para responder.</p>
        </div>

        <div class="m1-audio-contenedor">
            <p class="audio-titulo">Audio: La Montaña</p>
            <p style="margin-bottom: 2rem;">Ahora, disponte a escuchar el siguiente audio con una actitud de apertura y curiosidad.</p>
            <audio controls style="width: 100%;">
                <source src="/build/audio/Audio_G10_Práctica_de_la_Montaña.mp3" type="audio/mpeg">
                Tu navegador no soporta el audio.
            </audio>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act3-m6">
            <input type="hidden" name="id_modulo" value="6">
            <input type="hidden" name="actividad_id" value="3">

            <div class="m1-experimento-seccion" style="padding: 4rem;">
                <p class="m1-experimento-titulo">Gracias por darte este momento de práctica. Reflexiona un momento en las siguientes preguntas:</p>
                <ul style="margin-left: 2rem; margin-bottom: 2rem; line-height: 1.8; color: #333;">
                    <li>¿Cómo fue para ti conectar con esa parte más estable?</li>
                    <li>¿Hubo algún momento en el que pudiste sentirte más amplio a lo que estaba ocurriendo en la montaña?</li>
                </ul>

                <?php $val_606 = $respuestas['606'] ?? ''; ?>
                <textarea name="606" id="txt-606" class="act3-textarea" placeholder="Escribe aquí tu reflexión..." style="width: 100%; border: 2px solid #e0e0e0; border-radius: 1.2rem; padding: 2rem; height: 120px; resize: vertical;" <?php echo $st3['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_606); ?></textarea>

                <div id="fb-606" style="color: #27ae60; font-weight: 700; margin-top: 1rem; display: <?php echo !empty($val_606) ? 'block' : 'none'; ?>;">
                    <i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando
                </div>

                <p style="margin-top: 3rem;">Te invito a repetir esta práctica nuevamente, a observarte como una montaña que permanece, aún cuando el clima cambie y sea adverso, no eres arrastrado o arrastrada por ello. Esa puede ser una parada segura.</p>
            </div>

            <div style="text-align: center; margin-top: 4rem;">
                <?php if ($st3['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 3 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act3-m6" class="boton boton-por-guardar" disabled>
                        Guardar y finalizar Actividad 3
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <?php $st4 = getEstado(4, $actual); ?>
    <section class="actividad" id="act4" style="<?php echo $st4['visible']; ?>">
        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 4. Puentes al autocuidado</h2>
            <p>Cuando se vive con una condición de salud a largo plazo, es común que aparezcan ideas o reglas sobre cómo “deberías” cuidarte. Observa algunos ejemplos. ¿Alguno resuena o ha aparecido en ti?</p>

            <ul style="margin-left: 2rem; margin-top: 2rem; margin-bottom: 2rem; line-height: 2; color: #333;">
                <li>Tengo que poder con todo</li>
                <li>No debo dejar que cambie mi ritmo de vida</li>
                <li>Si no hago más, estoy fallando</li>
                <li>Ya no soy como antes y me avergüenza</li>
                <li>No tengo tiempo / dinero para cuidados especiales</li>
                <li>Esto es un castigo que debo soportar</li>
                <li>Debo ser fuerte por mi familia</li>
                <li>Qué culpa tienen los demás de mi salud</li>
                <li>No quiero que nadie sepa sobre mi estado de salud</li>
            </ul>

            <p>Estas ideas surgen intentando ayudarnos a adaptarnos. Sin embargo, pueden volverse reglas absolutas e inamovibles, convirtiéndonos en personas rígidas, autoexigentes, con altos niveles de cansancio, culpa, crítica o vergüenza.</p>
            <p>Definen la forma en que nos tratamos e influye en la forma en cómo nos cuidamos. Aquí es donde la compasión ofrece una alternativa. Primero, aclaremos que la compasión no es sinónimo de lástima, ni debilidad.</p>

            <p style="font-weight: 700; color: #12307D; margin-top: 2rem; margin-bottom: 2rem;">La compasión es la capacidad de reconocer tu propio malestar, como lo estás viviendo y elegir responder con amabilidad, conexión y respeto con lo que necesitas para moverte de posición.</p>

            <p>Así que implica cuidar de ti, como un todo. En tu cuerpo, descansar cuando es necesario, alimentarte de forma que te nutra, ejercitarte de acuerdo a tus posibilidades.</p>
            <p>No desde la exigencia o la culpabilidad, sino desde el cuidado, la paciencia y el respeto. Para ello te invito a disponer de unos momentos de calma y presencia para escuchar el siguiente audio.</p>
        </div>

        <div class="m1-audio-contenedor">
            <p class="audio-titulo">Audio: Compasión en movimiento</p>
            <audio id="audio-act4-m6" controls style="width: 100%;">
                <source src="/build/audio/Audio_G11_Compasion_en_movimiento.mp3" type="audio/mpeg">
                Tu navegador no soporta el audio.
            </audio>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act4-m6">
            <input type="hidden" name="id_modulo" value="6">
            <input type="hidden" name="actividad_id" value="4">

            <div style="text-align: center; margin-top: 4rem;">
                <?php if ($st4['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 4 Completada
                    </button>
                <?php else: ?>
                    <div id="msg-advertencia-act4" class="m-mensaje-advertencia">
                        Debes escuchar el audio completo para poder avanzar.
                    </div>
                    <button type="submit" id="btn-finalizar-act4-m6" class="boton boton-por-guardar" disabled>
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
            <h2 class="act-titulo">Actividad 5. Conectando puentes</h2>
            <p>Creer que debes poder con todo aumenta el cansancio y el aislamiento.</p>
            <p>Pedir apoyo es una decisión valiosa cuando cuida tu salud, tu energía y tu presencia en tu vida.</p>
        </div>

        <div class="m1-audio-contenedor" style="text-align: center;">
            <img src="/build/img/m6a5_img1.png" class="img-ebook" alt="Pedir apoyo" style="max-width: 100%; border-radius: 1.5rem; margin-bottom: 2rem;">
            <p class="audio-titulo">Audio 1</p>
            <audio controls style="width: 100%;">
                <source src="/build/audio/Audio_G12_Conectado_puentes.mp3" type="audio/mpeg">
                Tu navegador no soporta el audio.
            </audio>
        </div>

        <div class="m1-audio-contenedor" style="text-align: center;">
            <img src="/build/img/m6a5_img2.png" class="img-ebook" alt="Conectando puentes" style="max-width: 100%; border-radius: 1.5rem; margin-bottom: 2rem;">
            <p class="audio-titulo">Audio 2</p>
            <audio controls style="width: 100%;">
                <source src="/build/audio/Audio_G13_Conectado_puentes.mp3" type="audio/mpeg">
                Tu navegador no soporta el audio.
            </audio>
        </div>

        <div class="actividad-seccion-texto">
            <p>Pedir apoyo es una forma de autocuidado. No porque no puedas solo, significa que reconoces lo que necesitas para avanzar de una forma más sostenible y saludable.</p>
            <p>A veces, lo más difícil es permitirnos recibir el apoyo. Identificarlo es un paso importante, por ello te invito a escuchar el siguiente audio:</p>
        </div>

        <div class="m1-audio-contenedor">
            <p class="audio-titulo">Audio 3</p>
            <audio controls style="width: 100%;">
                <source src="/build/audio/Audio_G14_Conectado_puentes.mp3" type="audio/mpeg">
                Tu navegador no soporta el audio.
            </audio>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act5-m6">
            <input type="hidden" name="id_modulo" value="6">
            <input type="hidden" name="actividad_id" value="5">

            <div class="actividad-seccion-texto">
                <p>Acercarte a otros desde lo que valoras, no sólo aligera el camino, fortalece tus vínculos y capacidad de seguir adelante. Además, permite que el flujo de apoyo circule y abre espacio a la conexión.</p>
                <p>Durante los próximos días, te invito a probar un pequeño paso. Elige uno de los apoyos que identificaste y llévalo a cabo.</p>
                <p>Quizás en este momento, te preguntes cómo hacerlo. Aquí tienes tres ejemplos sencillos, adáptalos a ti:</p>

                <ul style="margin-left: 2rem; margin-top: 2rem; margin-bottom: 2rem; line-height: 2; color: #333;">
                    <li>Hola, ¿tienes un momento? Me ayudaría poder (hablar un rato / contarte algo).</li>
                    <li>Hola, he estado pasando por una situación y me di cuenta que me haría bien no llevarlo solo/sola. Tú me inspiras confianza y seguridad. ¿Tendrías un momento para (escucharme / acompañarme)?</li>
                    <li>Hola, recordaba que hace un tiempo me comentaste que podrías (apoyarme / escucharme / acompañarme). ¿Aún estás disponible? Si no es así, lo entiendo.</li>
                    <li>Hola. Quiero pedirte algo pequeño, estos días me he sentido (con dolor, con cansancio, triste, con dudas) y me ayudaría si puedes (escucharme / ayudarme con). Si puedes me haría bien, si no, lo entiendo.</li>
                </ul>
            </div>

            <div class="m1-experimento-seccion" style="padding: 4rem;">
                <p class="m1-experimento-titulo">Antes de hacerlo, puedes preguntarte:</p>
                <ul style="margin-left: 2rem; margin-bottom: 2rem; line-height: 1.8; color: #333;">
                    <li>¿Qué me dice mi mente sobre pedir apoyo?</li>
                    <li>¿Es valioso intentarlo, aunque sea incómodo?</li>
                </ul>

                <?php $val_607 = $respuestas['607'] ?? ''; ?>
                <textarea name="607" id="txt-607" class="act5-textarea" placeholder="Escribe aquí tu reflexión..." style="width: 100%; border: 2px solid #e0e0e0; border-radius: 1.2rem; padding: 2rem; height: 120px; resize: vertical;" <?php echo $st5['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_607); ?></textarea>

                <div id="fb-607" style="color: #27ae60; font-weight: 700; margin-top: 1rem; display: <?php echo !empty($val_607) ? 'block' : 'none'; ?>;">
                    <i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando
                </div>

                <p style="margin-top: 3rem;">A veces, permitir un gesto de apoyo es una forma de tratarte con mayor amabilidad y mantenerte en movimiento hacia lo que valoras.</p>
            </div>

            <div class="m1-evaluacion-final" style="background: #eef2f7; padding: 4rem; border-radius: 1.5rem; border: 0.2rem dashed #12307D; margin-top: 6rem;">
                <h3 class="act-titulo" style="color: #12307D; margin-bottom: 2rem;">Evaluación del Módulo 6</h3>
                <p style="margin-bottom: 3rem;">¡Felicidades, has concluido el módulo 6! Tu experiencia es importante, marca la opción que mejor la refleja:</p>

                <?php
                $evaluacion_m6 = [
                    '611' => '1. El módulo fue claro y fácil de seguir',
                    '612' => '2. Lo trabajado en el módulo me resulta útil para mi calidad de vida o autocuidado',
                    '613' => '3. Considero que puedo aplicar lo trabajado en mi vida diaria'
                ];
                foreach ($evaluacion_m6 as $id => $pregunta): ?>
                    <div style="margin-bottom: 3rem;">
                        <p style="font-weight: 700; color: #333; margin-bottom: 1rem;"><?php echo $pregunta; ?></p>
                        <select name="<?php echo $id; ?>" class="m1-select-personalizado eval-final-m6" style="width: 100%; padding: 1.2rem; border-radius: 0.8rem;" <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
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
                        ✨ ¡Concluiste con el Módulo 6! ✨
                    </div>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Módulo 6 Completado
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act5-m6" class="boton boton-por-guardar" disabled>
                        Guardar y finalizar Módulo 6
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </section>
</main>

<script>
    // Cuestionario inicial
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

    // ACTIVIDAD 1 - Módulo 6: Revelación Progresiva y Validación
    function showStepAct1M6(stepId, btnOrigin) {
        const step = document.getElementById(stepId);
        if (step) {
            step.style.display = "block";

            // Ocultar el botón que fue presionado
            if (btnOrigin) {
                btnOrigin.style.display = "none";
            }

            // Pequeño timeout para la transición suave
            setTimeout(() => {
                step.style.opacity = "1";
                step.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 50);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const btnFinalizarAct1M6 = document.getElementById('btn-finalizar-act1-m6');

        if (btnFinalizarAct1M6) {
            // Evaluamos si el cuestionario inicial fue contestado
            const introCompletada = btnFinalizarAct1M6.dataset.intro === 'true';

            // Como no hay inputs que llenar en la Actividad 1, la habilitación
            // depende únicamente de que se haya completado el bloque inicial.
            if (introCompletada) {
                btnFinalizarAct1M6.disabled = false;
                btnFinalizarAct1M6.classList.add("activo");
            } else {
                btnFinalizarAct1M6.disabled = true;
                btnFinalizarAct1M6.classList.remove("activo");
            }
        }
    });
    // ACTIVIDAD 2 - Módulo 6: Revelación Progresiva y Validación
    function showStepAct2M6(stepId, btnOrigin) {
        const step = document.getElementById(stepId);
        if (step) {
            step.style.display = "block";

            if (btnOrigin) {
                btnOrigin.style.display = "none";
            }

            setTimeout(() => {
                step.style.opacity = "1";
                step.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 50);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const formAct2M6 = document.getElementById('form-act2-m6');
        if (!formAct2M6) return;

        const btnFinalizarAct2 = document.getElementById('btn-finalizar-act2-m6');
        const textareasAct2 = document.querySelectorAll('.act2-textarea');

        function validarFormularioAct2M6() {
            if (!btnFinalizarAct2) return;

            // Verificar que ambos cuadros de texto tengan contenido
            const todasLlenas = Array.from(textareasAct2).every(ta => ta.value.trim().length > 0);

            // Mostrar el mensaje de retroalimentación dinámicamente
            textareasAct2.forEach(ta => {
                const fbId = 'fb-' + ta.id.split('-')[1]; // Ejemplo: fb-604
                const fbElement = document.getElementById(fbId);
                if (fbElement) {
                    fbElement.style.display = ta.value.trim().length > 0 ? 'block' : 'none';
                }
            });

            if (todasLlenas) {
                btnFinalizarAct2.disabled = false;
                btnFinalizarAct2.classList.add("activo");
            } else {
                btnFinalizarAct2.disabled = true;
                btnFinalizarAct2.classList.remove("activo");
            }
        }

        // Agregar los listeners para validar en tiempo real mientras el usuario escribe
        textareasAct2.forEach(ta => ta.addEventListener('input', validarFormularioAct2M6));

        // Ejecutar validación inicial
        validarFormularioAct2M6();
    });

    // ACTIVIDAD 3 - Módulo 6: Validación del cuadro de reflexión
    document.addEventListener('DOMContentLoaded', function() {
        const formAct3M6 = document.getElementById('form-act3-m6');
        if (!formAct3M6) return;

        const btnFinalizarAct3 = document.getElementById('btn-finalizar-act3-m6');
        const textareaAct3 = document.getElementById('txt-606');
        const fbAct3 = document.getElementById('fb-606');

        function validarFormularioAct3M6() {
            if (!btnFinalizarAct3) return;

            const tieneTexto = textareaAct3 && textareaAct3.value.trim().length > 0;

            // Mostrar el mensaje de "Buen trabajo" dinámicamente
            if (fbAct3) {
                fbAct3.style.display = tieneTexto ? 'block' : 'none';
            }

            if (tieneTexto) {
                btnFinalizarAct3.disabled = false;
                btnFinalizarAct3.classList.add("activo");
            } else {
                btnFinalizarAct3.disabled = true;
                btnFinalizarAct3.classList.remove("activo");
            }
        }

        // Listener para que reaccione mientras el usuario escribe
        if (textareaAct3) textareaAct3.addEventListener('input', validarFormularioAct3M6);

        // Ejecutar validación inicial
        validarFormularioAct3M6();
    });

    // ACTIVIDAD 4 - Módulo 6: Lógica de Audio (Anti-skip y habilitación)
    document.addEventListener('DOMContentLoaded', function() {
        const formAct4M6 = document.getElementById('form-act4-m6');
        if (!formAct4M6) return;

        const audioAct4 = document.getElementById('audio-act4-m6');
        const btnFinalizarAct4 = document.getElementById('btn-finalizar-act4-m6');
        const msgAdvertenciaAct4 = document.getElementById('msg-advertencia-act4');

        if (audioAct4 && btnFinalizarAct4 && !btnFinalizarAct4.classList.contains('boton-completado')) {
            let tiempoMaximoEscuchado = 0;
            let audioDesbloqueado = false;

            // Rastrear el progreso
            audioAct4.addEventListener('timeupdate', () => {
                if (!audioDesbloqueado && audioAct4.currentTime > tiempoMaximoEscuchado) {
                    tiempoMaximoEscuchado = audioAct4.currentTime;
                }
            });

            // Evitar adelantar
            audioAct4.addEventListener('seeking', () => {
                if (!audioDesbloqueado && audioAct4.currentTime > tiempoMaximoEscuchado + 0.5) {
                    audioAct4.currentTime = tiempoMaximoEscuchado;
                }
            });

            // Desbloquear al finalizar
            audioAct4.addEventListener('ended', () => {
                audioDesbloqueado = true;

                btnFinalizarAct4.disabled = false;
                btnFinalizarAct4.classList.add("activo");

                // Ocultar la advertencia roja
                if (msgAdvertenciaAct4) msgAdvertenciaAct4.style.display = 'none';
            });
        }
    });

    // ACTIVIDAD 5 Y EVALUACIÓN - Módulo 6: Validación Completa
    document.addEventListener('DOMContentLoaded', function() {
        const formAct5M6 = document.getElementById('form-act5-m6');
        if (!formAct5M6) return;

        const btnFinalizarAct5 = document.getElementById('btn-finalizar-act5-m6');
        const textareaAct5 = document.getElementById('txt-607');
        const fbAct5 = document.getElementById('fb-607');
        const selectsEval = document.querySelectorAll('.eval-final-m6');

        function validarFormularioAct5M6() {
            if (!btnFinalizarAct5) return;

            // 1. Validar Cuadro de texto de la Actividad 5
            const tieneTexto = textareaAct5 && textareaAct5.value.trim().length > 0;

            if (fbAct5) {
                fbAct5.style.display = tieneTexto ? 'block' : 'none';
            }

            // 2. Validar Evaluación: los 3 selects deben tener un valor
            const evalLlena = Array.from(selectsEval).every(sel => sel.value !== "");

            // Comprobación Final para habilitar botón
            if (tieneTexto && evalLlena) {
                btnFinalizarAct5.disabled = false;
                btnFinalizarAct5.classList.add("activo");
            } else {
                btnFinalizarAct5.disabled = true;
                btnFinalizarAct5.classList.remove("activo");
            }
        }

        // Asignar listeners
        if (textareaAct5) textareaAct5.addEventListener('input', validarFormularioAct5M6);
        selectsEval.forEach(sel => sel.addEventListener('change', validarFormularioAct5M6));

        // Ejecutar al cargar la página
        validarFormularioAct5M6();
    });
</script>