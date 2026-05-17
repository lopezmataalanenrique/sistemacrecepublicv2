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
            Módulo 4. Paso a Paso
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

$ya_respondio_intro = !empty($respuestas['401']) && !empty($respuestas['402']) && !empty($respuestas['403']);

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
        <h1>Módulo 4. Paso a paso</h1>
        <p class="texto-justificado">¡Hola! Me da mucho gusto que sigas aquí hasta este momento.</p>
        <p class="texto-justificado">Aquí exploraremos cómo avanzar en dirección a lo que valoras, incluso cuando aparece incomodidad.</p>

        <form method="POST" action="/guardar-actividad" id="form-intro-m4">
            <input type="hidden" name="id_modulo" value="4">
            <input type="hidden" name="actividad_id" value="0">

            <div class="m1-evaluacion-final">
                <p>Antes de comenzar, te invito a hacer una pausa y observar cómo han sido estos últimos días en tu proceso con CRECE. En este tiempo:</p>

                <?php
                $preguntas_intro = [

                    '401' => [
                        'texto' => '¿Noto algún cambio en cómo me relaciono con mis pensamientos o emociones?',
                        'opciones' => [
                            'Sí, claramente',
                            'Un poco',
                            'Aún no lo noto'
                        ]
                    ],

                    '402' => [
                        'texto' => '¿Noto cambios en mis respuestas o comportamientos habituales?',
                        'opciones' => [
                            'Sí, claramente',
                            'Algunas respuestas',
                            'Aún no lo noto'
                        ]
                    ],

                    '403' => [
                        'texto' => '¿Practiqué alguno de los ejercicios y/o experimentos en mi vida diaria?',
                        'opciones' => [
                            'No lo hice',
                            'Varias veces',
                            'Una vez'
                        ]
                    ]
                ];

                foreach ($preguntas_intro as $id => $pregunta):
                ?>
                    <div style="margin-bottom: 3rem;">

                        <p style="font-weight: 700; color: #12307D;">
                            <?php echo $pregunta['texto']; ?>
                        </p>

                        <select
                            name="<?php echo $id; ?>"
                            class="m1-select-personalizado check-validar-intro"
                            style="width: 100%; padding: 1rem; border-radius: 0.8rem;"
                            <?php echo ($ya_respondio_intro) ? 'disabled' : ''; ?>>

                            <option value="">-- Selecciona una opción --</option>

                            <?php foreach ($pregunta['opciones'] as $op): ?>

                                <option
                                    value="<?php echo htmlspecialchars($op); ?>"
                                    <?php echo ($respuestas[$id] ?? '') === $op ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($op); ?>
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
            Gracias por tus respuestas, cada paso cuenta. ¡Comencemos!
        </p>
    </section>
    <!-- ACTIVIDAD 1 -->
    <?php $st1 = getEstado(1, $actual); ?>
    <section class="actividad" id="act1" style="<?php echo $st1['visible']; ?>">
        <div class="divisor-modulo"></div>
        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 1. Aceptando la incomodidad</h2>
            <p>Quiero invitarte a pensar en esos momentos en los que se vuelve difícil aceptar lo que pasa por tu mente. Muchas veces, cuando enfrentamos situaciones complicadas, como un diagnóstico difícil, cambios en la rutina, en la alimentación o en la forma de relacionarnos con otras personas, nuestra mente puede llenarse de pensamientos que resultan incómodos, repetitivos o muy cansados. En lugar de pelear con esos pensamientos, hoy vamos a probar algo diferente: la aceptación.</p>
            <p>Antes de continuar, tómate un momento para reflexionar en lo que significa para ti la aceptación.</p>
            <p>Para profundizar en esto, vamos a usar una metáfora. La metáfora del autobús y los pasajeros la encontrarás en el siguiente audio:</p>
        </div>

        <div class="m1-audio-contenedor">
            <p class="audio-titulo">Metáfora: El autobús y los pasajeros</p>
            <audio controls style="width: 100%; max-width: 150rem;">
                <source src="/build/audio/Audio_E1_Metáfora_El_autobús_y_los_pasajeros.mp3" type="audio/mpeg">
                Tu navegador no soporta el elemento de audio.
            </audio>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act1-m4">
            <input type="hidden" name="id_modulo" value="4">
            <input type="hidden" name="actividad_id" value="1">

            <div class="m1-experimento-seccion">
                <p class="m1-experimento-titulo">Iniciemos una reflexión, con las siguientes preguntas:</p>

                <div style="margin-bottom: 3rem;">
                    <p style="font-weight: 700; color: #333; margin-bottom: 1rem;"> Cuando los pasajeros más difíciles aparecen, ¿qué sueles hacer: detener el autobús, desviarlo o seguir conduciendo?</p>
                    <?php $val_404 = $respuestas['404'] ?? ''; ?>
                    <textarea name="404" class="act1-textarea" style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 100px; resize: vertical; " <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_404); ?></textarea>
                </div>

                <div style="margin-bottom: 3rem;">
                    <p style="font-weight: 700;  color: #333; margin-bottom: 1rem;">¿Qué cosas importantes en tu vida se detienen cuando intentas pelear con tus pensamientos?</p>
                    <?php $val_405 = $respuestas['405'] ?? ''; ?>
                    <textarea name="405" class="act1-textarea" style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 100px; resize: vertical; " <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_405); ?></textarea>
                </div>

                <div style="margin-bottom: 3rem;">
                    <p style="font-weight: 700;  color: #333; margin-bottom: 1rem;">Si hoy siguieras conduciendo aun con esos pasajeros, ¿hacia dónde te gustaría dirigir tu autobús?</p>
                    <?php $val_406 = $respuestas['406'] ?? ''; ?>
                    <textarea name="406" class="act1-textarea" style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 100px; resize: vertical; " <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_406); ?></textarea>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p style="font-weight: 700; color: #12307D;">En conclusión, aceptar no significa que te gusten los pensamientos, ni que estés de acuerdo con ellos; significa dejarlos estar sin que detengan tu vida.</p>

                <div style="background: #eef2f7; border-left: 5px solid #12307D; padding: 3rem; border-radius: 0.8rem; margin: 4rem 0;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 2rem;">Te propongo observar en los próximos días:</p>
                    <ul style="list-style: none; padding-left: 0;  margin: 0; line-height: 2;">
                        <li style="margin-bottom: 1rem;"><i class="fas fa-eye" style="color: #12307D; margin-right: 1.5rem;"></i> ¿Cuáles son los pasajeros que más te acompañan y que más gritan?</li>
                        <li><i class="fas fa-eye" style="color: #12307D; margin-right: 1.5rem;"></i> ¿En qué situaciones aparecen gritando?</li>
                    </ul>
                    <p style="margin-top: 3rem; font-style: italic; color: #555; border-top: 1px solid #ccc; padding-top: 2rem;">Prueba permanecer unos minutos en presencia de los pasajeros, sin elaborar ningún juicio, sin expectativas ni reacciones.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 6rem;">
                <?php if ($st1['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 1 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act1-m4" class="boton" data-intro="<?php echo $ya_respondio_intro ? 'true' : 'false'; ?>"
                        style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Actividad 1
                    </button>
                    <?php if (!$ya_respondio_intro): ?>
                        <p class="m-mensaje-advertencia">Debes completar la pausa de observación inicial del módulo para poder guardar esta actividad.</p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <!-- ACTIVIDAD 2 -->
    <?php $st2 = getEstado(2, $actual); ?>
    <section class="actividad" id="act2" style="<?php echo $st2['visible']; ?>">

        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 2. Separando la sensación de la historia</h2>
            <p>Como has estado revisando, no solo sentimos dolor físico, sino que también llegamos a experimentar “dolor sobre el dolor”. Esto es, cuando las ideas, prejuicios o miedos provenientes de nuestra cultura y experiencias aparecen matizando el significado del dolor. Sin embargo, se puede aprender a relacionarnos con esta realidad, como si la viéramos a través de lentes, y no como la realidad misma.</p>
            <p>Escucha el siguiente audio, te ayudará a distinguir entre la experiencia física y la narrativa mental asociada.</p>
        </div>

        <div class="m1-audio-contenedor">
            <p class="audio-titulo">Separando la sensación de la historia</p>
            <audio id="audio-act2-m4" controls>
                <source src="/build/audio/Audio_E2_Separando_la_sensación_de_la_historia.mp3" type="audio/mpeg">
                Tu navegador no soporta el elemento de audio.
            </audio>
        </div>

        <div class="actividad-seccion-texto">
            <p>Recuerda que la sensación física y la historia que la narra, son dos cosas diferentes. No siempre podemos controlar la sensación, pero podemos cambiar nuestra relación con la historia que la envuelve. Para esto, necesitamos aprender a escucharla sin que la confundamos con parte de nosotros, como quien mira pasar las nubes en el cielo.</p>
            <p>Este ejercicio de separación de la sensación física y su historia, lo puedes practicar de manera cotidiana, de manera que con la repetición cada vez vaya saliendo más fácil.</p>
            <p>Al distinguir entre la sensación corporal y la narrativa mental, comprendes que tus pensamientos son productos de la mente, no verdades absolutas. Reconocer la "historia" como un ruido de fondo te libera de su control y te permite cambiar tu relación con ella.</p>
            <p>Es probable que el dolor físico u otros malestares físicos sigan presentándose, sin embargo ya no tiene por qué controlar tu reacción. Continuaremos profundizando.</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act2-m4">
            <input type="hidden" name="id_modulo" value="4">
            <input type="hidden" name="actividad_id" value="2">

            <div style="text-align: center; margin-top: 5rem;">
                <?php if ($st2['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 2 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act2-m4" class="boton"
                        style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Actividad 2
                    </button>
                    <p id="msg-audio-act2" class="m-mensaje-advertencia">Debes escuchar el audio completo para poder avanzar.</p>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <!-- ACTIVIDAD 3 -->
    <?php $st3 = getEstado(3, $actual); ?>
    <section class="actividad" id="act3" style="<?php echo $st3['visible']; ?>">

        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">

            <h2 class="act-titulo">Actividad 3. ¿A dónde me dirijo si lucho con mis síntomas?</h2>
            <p>Cuando luchas con tus síntomas (pensamientos, emociones o sensaciones incómodas) puedes sentir alivio momentáneo, pero a largo plazo esa lucha te desgasta y te aleja de lo que te importa.</p>
            <p>La lucha interna consume tiempo, energía y atención. Nos desconecta de lo que valoramos, nos aleja de actividades significativas y nos deja atrapados en un esfuerzo constante por “sentir menos” en vez de vivir más.</p>

            <div style="background: #eef2f7; padding: 3rem; border-radius: 1.2rem; margin: 4rem 0; border-left: 5px solid #12307D;">
                <p style="font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">La pregunta clave no es “¿cómo los elimino?”, más bien:</p>
                <p style=" font-weight: 700; color: #333;">¿Hacia dónde me está llevando esta lucha? ¿Qué estoy perdiendo al invertir mi vida en pretender controlar lo incontrolable?</p>
            </div>

            <p style="font-weight: 700; color: #12307D; text-align: center;">Imagina que estás en un cuarto lleno de puertas.</p>
        </div>

        <div class="m4-carousel-container" id="carousel-puertas" style="position: relative; max-width: 150rempx; margin: 4rem auto; border-radius: 1.5rem; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.1); background: #fdfdfd; border: 1px solid #e0e0e0;">

            <div class="m4-carousel-slide" style="display: block; padding: 4rem; text-align: center; animation: fadeIn 0.5s;">
                <h3 style="color: #12307D; font-size: 2.2rem; font-weight: 800; margin-bottom: 2rem;">Puerta 1</h3>
                <img src="/build/img/m4a3_img1.webp" alt="Puerta 1" class="img-ebook">
                <audio controls style="width: 100%;">
                    <source src="/build/audio/Audio_E3_ ¿A_dónde_me_dirijo_si_lucho_con_mis_síntomas.mp3" type="audio/mpeg">
                </audio>
            </div>

            <div class="m4-carousel-slide" style="display: none; padding: 4rem; text-align: center; animation: fadeIn 0.5s;">
                <h3 style="color: #12307D; font-size: 2.2rem; font-weight: 800; margin-bottom: 2rem;">Puerta 2</h3>
                <img src="/build/img/m4a3_img2.webp" alt="Puerta 2" class="img-ebook">
                <audio controls style="width: 100%;">
                    <source src="/build/audio/Audio_E4_¿A_dónde_me_dirijo_si_lucho_con_mis_síntomas.mp3" type="audio/mpeg">
                </audio>
            </div>

            <div class="m4-carousel-slide" style="display: none; padding: 4rem; text-align: center; animation: fadeIn 0.5s;">
                <h3 style="color: #12307D; font-size: 2.2rem; font-weight: 800; margin-bottom: 2rem;">Puerta 3</h3>
                <img src="/build/img/m4a3_img3.webp" alt="Puerta 3" class="img-ebook">
                <audio controls style="width: 100%;">
                    <source src="/build/audio/Audio_E5_¿A_dónde_me_dirijo_si_lucho_con_mis_síntomas.mp3" type="audio/mpeg">
                </audio>
            </div>

            <div class="m4-carousel-slide" style="display: none; padding: 4rem; text-align: center; animation: fadeIn 0.5s;">
                <h3 style="color: #12307D; font-size: 2.2rem; font-weight: 800; margin-bottom: 2rem;">Puerta 4</h3>
                <img src="/build/img/m4a3_img4.webp" alt="Puerta 4" class="img-ebook">
                <audio controls style="width: 100%;">
                    <source src="/build/audio/Audio_E6_¿A_dónde_me_dirijo_si_lucho_con_mis_síntomas.mp3" type="audio/mpeg">
                </audio>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; padding: 2rem 3rem; background: #eef2f7; border-top: 1px solid #e0e0e0;">
                <button type="button" id="btn-prev-puertas" class="boton" style="background: #12307D; color: white; border: none; padding: 1rem 2rem; border-radius: 0.8rem; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                    <i class="fas fa-chevron-left"></i> Anterior
                </button>
                <span id="indicador-puertas" style="font-weight: 800; color: #12307D; font-size: 1.8rem;">1 / 4</span>
                <button type="button" id="btn-next-puertas" class="boton" style="background: #12307D; color: white; border: none; padding: 1rem 2rem; border-radius: 0.8rem; font-weight: 700; cursor: pointer;">
                    Siguiente <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act3-m4">
            <input type="hidden" name="id_modulo" value="4">
            <input type="hidden" name="actividad_id" value="3">

            <div class="m4-experimento-seccion" style="background: #fdfdfd; padding: 4rem; border: 0.2rem solid #e0e0e0; border-radius: 1.5rem; margin: 4rem 0;">
                <p style="font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">Escribe una breve reflexión sobre lo que notaste al explorar las puertas:</p>
                <?php $val_407 = $respuestas['407'] ?? ''; ?>
                <textarea name="407" id="txt-act3-reflexion" class="act3-textarea" placeholder="¿Qué descubres sobre tu propia lucha interna?..." style="width: 100%; border: 1px solid #ccc; border-radius: 0.5rem; padding: 1.5rem; height: 120px; resize: vertical; " <?php echo $st3['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_407); ?></textarea>
            </div>

            <div style="text-align: center; margin-top: 6rem;">
                <?php if ($st3['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 3 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act3-m4" class="boton"
                        style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Actividad 3
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>

    <?php $st4 = getEstado(4, $actual); ?>
    <section class="actividad" id="act4" style="<?php echo $st4['visible']; ?>">
        <div class="divisor-modulo"></div>
        <div class="actividad-seccion-texto">
            <h2 class="act-titulo" style="color: #12307D; margin-bottom: 3rem;">Actividad 4. Jugando con mis síntomas y respuestas</h2>
            <p class="texto-justificado">El humor suaviza la carga de los síntomas, es una herramienta para afrontarlos. Hoy vamos a practicar cómo hacer tu síntoma un poco menos intimidante.</p>
            <p class="texto-justificado">Toma unos instantes para ubicar un síntoma que te moleste en este momento o en tu vida cotidiana, incluso puedes comenzar con alguno que no sea tan intenso.</p>
            <p class="texto-justificado">Toma unos instantes para observar el síntoma y elegir un apodo o una frase caricaturesca. Observa el siguiente ejemplo y realiza tu ejercicio:</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act4-m4">

            <input type="hidden" name="id_modulo" value="4">
            <input type="hidden" name="actividad_id" value="4">

            <div class="m1-experimento-seccion">

                <div class="m4a4-sintomas-titulo" style="">
                    <p style="font-weight: 700; color: #12307D; ">Malestar</p>
                    <p style="font-weight: 700; color: #12307D; ">Apodo o frase caricaturesca</p>
                </div>

                <div class="m4a4-sintomas-cuerpo">

                    <?php
                    $sintomas = [
                        ['id_chk' => '411', 'id_txt' => '412', 'nombre' => 'Dolor', 'placeholder' => 'Ej.: "Señor Dolorcito"'],
                        ['id_chk' => '413', 'id_txt' => '414', 'nombre' => 'Fatiga', 'placeholder' => 'Ej.: "El Bostezo Dramático"'],
                        ['id_chk' => '415', 'id_txt' => '416', 'nombre' => 'Inflamación', 'placeholder' => 'Ej.: "Doña Rigidez"'],
                        ['id_chk' => '417', 'id_txt' => '418', 'nombre' => 'Edema', 'placeholder' => 'Escribe aquí el apodo...'],
                        ['id_chk' => '419', 'id_txt' => '420', 'nombre' => 'Escozor o comezón', 'placeholder' => 'Escribe aquí el apodo...'],
                        ['id_chk' => '421', 'id_txt' => '422', 'nombre' => 'Palpitaciones', 'placeholder' => 'Escribe aquí el apodo...'],
                        ['id_chk' => '423', 'id_txt' => '424', 'nombre' => 'Disnea ligera', 'placeholder' => 'Escribe aquí el apodo...']
                    ];

                    foreach ($sintomas as $sintoma):
                        $chk_id = $sintoma['id_chk'];
                        $txt_id = $sintoma['id_txt'];
                        $esta_marcado = !empty($respuestas[$chk_id]);
                        $texto_guardado = $respuestas[$txt_id] ?? '';
                    ?>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" name="<?php echo $chk_id; ?>" value="<?php echo $sintoma['nombre']; ?>"
                                class="act4-sintoma-chk" data-target="<?php echo $txt_id; ?>"
                                style="margin-right: 1.5rem; transform: scale(1.4);"
                                <?php echo $esta_marcado ? 'checked' : ''; ?>
                                <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                            <?php echo $sintoma['nombre']; ?>
                        </label>
                        <input type="text" name="<?php echo $txt_id; ?>" id="txt-<?php echo $txt_id; ?>"
                            class="act4-sintoma-txt" placeholder="<?= htmlspecialchars($sintoma['placeholder']) ?>"
                            value="<?php echo htmlspecialchars($texto_guardado); ?>"
                            style="width: 100%; padding: 1.2rem; border: 1px solid #ccc; border-radius: 0.8rem; <?php echo !$esta_marcado && !$st4['completada'] ? 'background-color: #f4f4f4;' : ''; ?>"
                            <?php echo (!$esta_marcado || $st4['completada']) ? 'disabled' : ''; ?>>
                    <?php endforeach; ?>

                    <?php
                    $otro_marcado = !empty($respuestas['425']);
                    $otro_nombre = $respuestas['426'] ?? '';
                    $otro_apodo = $respuestas['427'] ?? '';
                    ?>
                    <div style="display: flex; flex-direction: column; gap: 1rem; justify-content: center;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" name="425" value="Otro" id="chk-otro-sintoma"
                                class="act4-sintoma-chk" data-target="txt-nombre-otro"
                                style="margin-right: 1.5rem; transform: scale(1.4);"
                                <?php echo $otro_marcado ? 'checked' : ''; ?>
                                <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                            Otro síntoma:
                        </label>
                        <input type="text" name="426" id="txt-nombre-otro" class="act4-sintoma-txt"
                            placeholder="¿Cuál síntoma?" value="<?php echo htmlspecialchars($otro_nombre); ?>"
                            style="width: 100%; padding: 1.2rem; border: 1px solid #ccc; border-radius: 0.8rem; <?php echo !$otro_marcado && !$st4['completada'] ? 'background-color: #f4f4f4;' : ''; ?>"
                            <?php echo (!$otro_marcado || $st4['completada']) ? 'disabled' : ''; ?>>
                    </div>
                    <input type="text" name="427" id="txt-apodo-otro" class="act4-sintoma-txt"
                        placeholder="Escribe aquí el apodo..." value="<?php echo htmlspecialchars($otro_apodo); ?>"
                        style="height: 100%; width: 100%; padding: 1.2rem; border: 1px solid #ccc; border-radius: 0.8rem; <?php echo !$otro_marcado && !$st4['completada'] ? 'background-color: #f4f4f4;' : ''; ?>"
                        <?php echo (!$otro_marcado || $st4['completada']) ? 'disabled' : ''; ?>>
                </div>
            </div>

            <div class="m1-evaluacion-final">
                <p style="font-weight: 700; color: #12307D; margin-bottom: 2rem;">Ahora, imagina que esa sensación se sienta a tu lado. Obsérvala junto a ti, con su apodo. Elige qué harás aunque ‘el invitado’ esté presente:</p>

                <div style="display: flex; flex-wrap: wrap; gap: 2rem; margin-top: 2.5rem;">
                    <?php
                    $acciones = [
                        '431' => 'Respirar',
                        '432' => 'Pausa amable',
                        '433' => 'Caminar unos pasos',
                        '434' => 'Continuar con tu actividad',
                        '435' => 'Aplicar una estrategia de cuidado',
                        '436' => 'Beber con calma un poco de agua o té',
                        '437' => 'Hacer algunos estiramientos suaves',
                        '438' => 'Realizar alguno de los ejercicios anteriores'
                    ];

                    foreach ($acciones as $id => $accion):
                        $esta_marcada = !empty($respuestas[$id]);
                    ?>
                        <label style="width: 45%; min-width: 28rem; cursor: pointer; display: flex; align-items: center;">
                            <input type="checkbox" name="<?php echo $id; ?>" value="<?php echo $accion; ?>"
                                class="act4-accion-chk" style="margin-right: 1.5rem; transform: scale(1.4);"
                                <?php echo $esta_marcada ? 'checked' : ''; ?>
                                <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                            <?php echo $accion; ?>
                        </label>
                    <?php endforeach; ?>

                    <div style=" margin-top: 1rem;">
                        <label style=" cursor: pointer; width: 100%;">
                            <input type="checkbox" name="439" value="Otra" id="chk-otra-accion"
                                class="act4-accion-chk" style=" transform: scale(1.4);"
                                <?php echo !empty($respuestas['439']) ? 'checked' : ''; ?>
                                <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                            <span style="margin-left: 1rem;">
                                Otra:
                            </span>
                        </label>
                        <input type="text" name="440" id="txt-otra-accion" value="<?php echo htmlspecialchars($respuestas['440'] ?? ''); ?>"
                            placeholder="Escribe otra acción..." class="act4-accion-txt"
                            style="margin: 1rem 0; width: 100%; padding: 1rem; border: 1px solid #ccc; border-radius: 0.8rem; <?php echo empty($respuestas['439']) && !$st4['completada'] ? 'background-color: #f4f4f4;' : ''; ?>"
                            <?php echo (empty($respuestas['439']) || $st4['completada']) ? 'disabled' : ''; ?>>
                    </div>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p>Esta herramienta puede auxiliarte a tomar distancia de la experiencia y dejar de pelear con ella.</p>
                <p>Toma unos instantes para observar el ejercicio, principalmente en cómo te hace sentir y para qué síntomas te funciona mejor.</p>

                <div style="margin: 5rem 0; text-align: center;">
                    <p style="font-size: 2.6rem; font-weight: 800; color: #12307D; font-style: italic;">“Si el síntoma viene… <br><span style="color: #27ae60;">que no te quite el día.</span>”</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 4rem;">
                <?php if ($st4['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 4 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act4-m4" class="boton"
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

            <h2 class="act-titulo">Actividad 5. Aceptación compasiva</h2>
            <p>La aceptación es una actitud activa, que dista de la resignación o la simple tolerancia.</p>
            <p>En el contexto de la salud, desarrollar la aceptación nos permite reconocer estas experiencias sin añadir una lucha improductiva. Consiste en fomentar la disposición abierta a la realidad tal como se presenta en el momento presente.</p>
            <p>La aceptación está profundamente conectada con la consciencia del momento presente. Ambas se fortalecen mutuamente, al practicar la atención plena se entrena la habilidad de reconocer y aceptar la experiencia, y desde ahí actuar con amabilidad y compasión hacia nosotros mismos.</p>
        </div>

        <div class="m1-audio-contenedor">
            <p class="audio-titulo">Ahora, disponte a escuchar el siguiente audio:</p>
            <audio controls>
                <source src="/build/audio/Audio_E7_Aceptación_compasiva.mp3" type="audio/mpeg">
                Tu navegador no soporta el elemento de audio.
            </audio>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act5-m4">
            <input type="hidden" name="id_modulo" value="4">
            <input type="hidden" name="actividad_id" value="5">

            <div class="m1-experimento-seccion">
                <p class="m1-experimento-titulo">Después de esta práctica, exploremos tu experiencia.</p>

                <div style="margin-bottom: 4rem;">
                    <p style="font-weight: 700; color: #333; margin-bottom: 1.5rem;">1. Durante la práctica, ¿qué fue lo que más notaste en tu experiencia?</p>
                    <?php
                    $opciones_q1 = [
                        '451' => 'Sensaciones físicas en el cuerpo',
                        '452' => 'Pensamientos o preocupaciones',
                        '453' => 'Emociones',
                        '454' => 'No identifiqué algo en particular'
                    ];
                    foreach ($opciones_q1 as $id => $opcion):
                        $esta_marcada = isset($respuestas[$id]) && $respuestas[$id] === $opcion;
                    ?>
                        <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                            <input type="checkbox" name="<?php echo $id; ?>" value="<?php echo $opcion; ?>"
                                class="m1-check-input act5-val-q1" style="transform: scale(1.4);"
                                <?php echo $esta_marcada ? 'checked' : ''; ?>
                                <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                            <span class="m1-check-custom"></span>
                            <span class="m1-check-texto"><?php echo $opcion; ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div style="margin-bottom: 2rem;">
                    <p style="font-weight: 700; color: #333; margin-bottom: 1.5rem;">2. Cuando apareció una incomodidad, ¿cómo respondiste?</p>
                    <?php
                    $opciones_q2 = [
                        'Fue muy incómodo y no pude tratarme con amabilidad',
                        'Me distraje y perseguía mis pensamientos, sensaciones o ideas',
                        'Me resultó neutral',
                        'Algunos momentos pude aceptarla con amabilidad'
                    ];
                    $val_461 = $respuestas['461'] ?? '';
                    foreach ($opciones_q2 as $opcion):
                        $es_elegida = ($val_461 === $opcion);
                    ?>
                        <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                            <input type="radio" name="461" value="<?php echo $opcion; ?>"
                                class="m1-check-input act5-val-q2" style="transform: scale(1.4);"
                                <?php echo $es_elegida ? 'checked' : ''; ?>
                                <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                            <span class="m1-check-custom" style="border-radius: 50%;"></span>
                            <span class="m1-check-texto"><?php echo $opcion; ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <div style="background: #eef2f7; border-left: 5px solid #12307D; padding: 2rem; border-radius: 0.8rem; margin: 2rem 0;">
                    <p style="font-weight: 700;color: #12307D; margin-bottom: 2rem;">Finalmente, te invito a probar un pequeño ejercicio en los próximos días, cuando aparezca un malestar o intencionalmente en un momento de tu día:</p>
                    <ul style=" color: #333; margin-left: 2rem;">
                        <li style="margin-bottom: 1rem;">Toma unas respiraciones para anclarse en el momento presente.</li>
                        <li style="margin-bottom: 1rem;">Toma unos instantes para notar qué está ocurriendo en tu cuerpo o en tu mente.</li>
                        <li style="margin-bottom: 1rem;">Nombra suavemente tu experiencia, aceptando: <em>“Esto es difícil”, “Hay dolor en este momento”, “Hay preocupación ahora”</em>.</li>
                        <li style="margin-bottom: 1rem;">Pregúntate, ¿qué podría hacer en este momento para cuidarme? Podrías descansar unos minutos, hablar con alguien, hacer algunos masajes, beber un té, salir a caminar, programar una cita con un profesional de la salud, entre otras.</li>
                        <li style="margin-bottom: 1rem;">Al finalizar, nota si hay algún cambio en tu mente o en tu cuerpo.</li>
                    </ul>
                </div>

                <p>La aceptación es un camino que permite reconciliarnos con nuestro cuerpo, con situaciones complejas del pasado, con errores cometidos, con nuestra historia, con situaciones que están fuera de tus manos o dejar de preocuparnos por un futuro que desconocemos.</p>
                <p>Cuando agregamos a la práctica de la aceptación la compasión, acompañas tu proceso con amabilidad, comprensión y paciencia. En lugar de reaccionar con culpa, vergüenza, crítica, comparación o miedo, puedes dirigir un gesto de respeto y dar pasos con mayor claridad, serenidad y sabiduría para gestionar tus respuestas con efectividad.</p>
            </div>

            <div class="m1-evaluacion-final">
                <h3 class="act-titulo">Evaluación del Módulo 4</h3>
                <p style="margin-bottom: 3rem;">¡Felicidades, has concluido el módulo 4! Tu experiencia es importante, marca la opción que mejor la refleja:</p>

                <?php
                $evaluacion_m4 = [
                    '491' => '1. El módulo fue claro y fácil de seguir',
                    '492' => '2. Lo trabajado en el módulo me resulta útil para mi calidad de vida o autocuidado',
                    '493' => '3. Considero que puedo aplicar lo trabajado en mi vida diaria'
                ];
                foreach ($evaluacion_m4 as $id => $pregunta): ?>
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
                        ✨ ¡Concluiste con el Módulo 4! ✨
                    </div>
                    <button type="button" class="boton boton-completado" disabled>
                        Módulo 4 Completado
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act5-m4" class="boton"
                        style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Módulo 4
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
    // ACTIVIDAD 1 - Módulo 4: Validación y Lógica
    document.addEventListener('DOMContentLoaded', function() {
        const formAct1M4 = document.getElementById('form-act1-m4');
        if (!formAct1M4) return;

        const btnFinalizarAct1 = document.getElementById('btn-finalizar-act1-m4');

        // Verificamos si la variable PHP le dio el "OK" a la intro
        const introCompletada = btnFinalizarAct1 ? btnFinalizarAct1.dataset.intro === 'true' : false;

        // Obtenemos los 3 textareas
        const textareasAct1 = document.querySelectorAll('.act1-textarea');

        function validarFormularioAct1M4() {
            if (!btnFinalizarAct1) return;

            // Comprobamos que todos los textarea tengan algo escrito (sin contar espacios en blanco)
            const todasLlenas = Array.from(textareasAct1).every(ta => ta.value.trim().length > 0);

            // Se habilita SOLO si llenó los textos Y completó la intro previamente
            if (todasLlenas && introCompletada) {
                btnFinalizarAct1.disabled = false;
                btnFinalizarAct1.style.opacity = "1";
                btnFinalizarAct1.style.cursor = "pointer";
            } else {
                btnFinalizarAct1.disabled = true;
                btnFinalizarAct1.style.opacity = "0.5";
                btnFinalizarAct1.style.cursor = "not-allowed";
            }
        }

        // Agregar listeners para validación en tiempo real al escribir
        textareasAct1.forEach(ta => ta.addEventListener('input', validarFormularioAct1M4));

        // Ejecutar validación inicial (por si la página recarga con datos)
        validarFormularioAct1M4();
    });
    // ACTIVIDAD 2 - Módulo 4: Lógica de Audio (Anti-skip y habilitación)
    document.addEventListener('DOMContentLoaded', function() {
        const formAct2M4 = document.getElementById('form-act2-m4');
        if (!formAct2M4) return;

        const audioAct2 = document.getElementById('audio-act2-m4');
        const btnFinalizarAct2 = document.getElementById('btn-finalizar-act2-m4');
        const msgAudio = document.getElementById('msg-audio-act2');

        if (audioAct2 && btnFinalizarAct2 && !btnFinalizarAct2.classList.contains('fa-check')) {
            let tiempoMaximoEscuchado = 0;
            let audioDesbloqueado = false;

            // Actualizamos el tiempo máximo escuchado mientras se reproduce
            audioAct2.addEventListener('timeupdate', () => {
                if (!audioDesbloqueado && audioAct2.currentTime > tiempoMaximoEscuchado) {
                    tiempoMaximoEscuchado = audioAct2.currentTime;
                }
            });

            // Si el usuario intenta adelantar haciendo clic en la barra
            audioAct2.addEventListener('seeking', () => {
                if (!audioDesbloqueado && audioAct2.currentTime > tiempoMaximoEscuchado + 0.5) {
                    audioAct2.currentTime = tiempoMaximoEscuchado; // Lo regresamos
                }
            });

            // Cuando el audio termina
            audioAct2.addEventListener('ended', () => {
                audioDesbloqueado = true; // Desbloqueamos la barra por si quiere volver a escucharlo libremente

                // Habilitamos el botón
                btnFinalizarAct2.disabled = false;
                btnFinalizarAct2.style.opacity = "1";
                btnFinalizarAct2.style.cursor = "pointer";

                // Ocultamos el mensaje de advertencia
                if (msgAudio) msgAudio.style.display = 'none';
            });
        }
    });
    // ACTIVIDAD 3 - Módulo 4: Carrusel y Validación
    document.addEventListener('DOMContentLoaded', function() {
        const formAct3M4 = document.getElementById('form-act3-m4');
        if (!formAct3M4) return;

        // --- LÓGICA DEL CARRUSEL ---
        const slides = document.querySelectorAll('.m4-carousel-slide');
        const btnPrev = document.getElementById('btn-prev-puertas');
        const btnNext = document.getElementById('btn-next-puertas');
        const indicador = document.getElementById('indicador-puertas');

        let indiceActual = 0;

        function actualizarCarrusel() {
            // Ocultar todas las slides
            slides.forEach((slide, i) => {
                slide.style.display = (i === indiceActual) ? 'block' : 'none';

                // Pausar audios de las slides ocultas para que no se encimen
                if (i !== indiceActual) {
                    const audio = slide.querySelector('audio');
                    if (audio) audio.pause();
                }
            });

            // Actualizar indicador
            indicador.innerText = `${indiceActual + 1} / ${slides.length}`;

            // Actualizar estado del botón Anterior
            if (indiceActual === 0) {
                btnPrev.disabled = true;
                btnPrev.style.opacity = "0.5";
                btnPrev.style.cursor = "not-allowed";
            } else {
                btnPrev.disabled = false;
                btnPrev.style.opacity = "1";
                btnPrev.style.cursor = "pointer";
            }

            // Actualizar estado del botón Siguiente
            if (indiceActual === slides.length - 1) {
                btnNext.disabled = true;
                btnNext.style.opacity = "0.5";
                btnNext.style.cursor = "not-allowed";
            } else {
                btnNext.disabled = false;
                btnNext.style.opacity = "1";
                btnNext.style.cursor = "pointer";
            }
        }

        if (btnNext && btnPrev) {
            btnNext.addEventListener('click', () => {
                if (indiceActual < slides.length - 1) {
                    indiceActual++;
                    actualizarCarrusel();
                }
            });

            btnPrev.addEventListener('click', () => {
                if (indiceActual > 0) {
                    indiceActual--;
                    actualizarCarrusel();
                }
            });
        }

        // --- LÓGICA DE VALIDACIÓN ---
        const txtReflexion = document.getElementById('txt-act3-reflexion');
        const btnFinalizarAct3 = document.getElementById('btn-finalizar-act3-m4');

        function validarFormularioAct3M4() {
            if (!btnFinalizarAct3) return;

            // Verificamos que el textarea tenga contenido
            const tieneTexto = txtReflexion.value.trim().length > 0;

            if (tieneTexto) {
                btnFinalizarAct3.disabled = false;
                btnFinalizarAct3.style.opacity = "1";
                btnFinalizarAct3.style.cursor = "pointer";
            } else {
                btnFinalizarAct3.disabled = true;
                btnFinalizarAct3.style.opacity = "0.5";
                btnFinalizarAct3.style.cursor = "not-allowed";
            }
        }

        if (txtReflexion) {
            txtReflexion.addEventListener('input', validarFormularioAct3M4);
            validarFormularioAct3M4(); // Ejecutar al inicio
        }
    });

    // ACTIVIDAD 4 - Módulo 4: Lógica de Tabla y Validación
    document.addEventListener('DOMContentLoaded', function() {
        const formAct4M4 = document.getElementById('form-act4-m4');
        if (!formAct4M4) return;

        const btnFinalizarAct4 = document.getElementById('btn-finalizar-act4-m4');

        // Elementos de Síntomas
        const chkSintomas = document.querySelectorAll('.act4-sintoma-chk');
        const txtNombreOtro = document.getElementById('txt-nombre-otro');
        const txtApodoOtro = document.getElementById('txt-apodo-otro');

        // Elementos de Acciones
        const chkAcciones = document.querySelectorAll('.act4-accion-chk');
        const chkOtraAccion = document.getElementById('chk-otra-accion');
        const txtOtraAccion = document.getElementById('txt-otra-accion');

        // 1. Habilitar/Deshabilitar cuadros de texto de Síntomas
        chkSintomas.forEach(chk => {
            chk.addEventListener('change', function() {
                if (this.id === 'chk-otro-sintoma') {
                    // Lógica especial para el campo "Otro"
                    txtNombreOtro.disabled = !this.checked;
                    txtApodoOtro.disabled = !this.checked;
                    txtNombreOtro.style.backgroundColor = this.checked ? '#fff' : '#f4f4f4';
                    txtApodoOtro.style.backgroundColor = this.checked ? '#fff' : '#f4f4f4';
                    if (!this.checked) {
                        txtNombreOtro.value = '';
                        txtApodoOtro.value = '';
                    }
                } else {
                    // Lógica normal para los demás (Se usa disabled en lugar de readonly)
                    const targetId = this.getAttribute('data-target');
                    const txtInput = document.getElementById('txt-' + targetId);
                    if (txtInput) {
                        txtInput.disabled = !this.checked;
                        txtInput.style.backgroundColor = this.checked ? '#fff' : '#f4f4f4';
                        if (!this.checked) txtInput.value = '';
                    }
                }
                validarFormularioAct4M4();
            });
        });

        // 2. Habilitar/Deshabilitar cuadro de texto de "Otra" Acción
        if (chkOtraAccion && txtOtraAccion) {
            chkOtraAccion.addEventListener('change', function() {
                txtOtraAccion.disabled = !this.checked;
                txtOtraAccion.style.backgroundColor = this.checked ? '#fff' : '#f4f4f4';
                if (!this.checked) txtOtraAccion.value = '';
                validarFormularioAct4M4();
            });
            txtOtraAccion.addEventListener('input', validarFormularioAct4M4);
        }

        // 3. Validación General para activar el botón
        function validarFormularioAct4M4() {
            if (!btnFinalizarAct4) return;

            // A) Verificar que al menos un síntoma esté checkeado Y su texto no esté vacío
            let sintomaValido = false;
            for (let chk of chkSintomas) {
                if (chk.checked) {
                    if (chk.id === 'chk-otro-sintoma') {
                        if (txtNombreOtro.value.trim().length > 0 && txtApodoOtro.value.trim().length > 0) {
                            sintomaValido = true;
                            break;
                        }
                    } else {
                        const targetId = chk.getAttribute('data-target');
                        const txtInput = document.getElementById('txt-' + targetId);
                        if (txtInput && txtInput.value.trim().length > 0) {
                            sintomaValido = true;
                            break;
                        }
                    }
                }
            }

            // B) Verificar que al menos una acción esté checkeada (y si es "Otra", tenga texto)
            let accionValida = false;
            for (let chk of chkAcciones) {
                if (chk.checked) {
                    if (chk.id === 'chk-otra-accion') {
                        if (txtOtraAccion.value.trim().length > 0) {
                            accionValida = true;
                            break;
                        }
                    } else {
                        accionValida = true;
                        break;
                    }
                }
            }

            // C) Evaluar y aplicar al botón
            if (sintomaValido && accionValida) {
                btnFinalizarAct4.disabled = false;
                btnFinalizarAct4.style.opacity = "1";
                btnFinalizarAct4.style.cursor = "pointer";
            } else {
                btnFinalizarAct4.disabled = true;
                btnFinalizarAct4.style.opacity = "0.5";
                btnFinalizarAct4.style.cursor = "not-allowed";
            }
        }

        // Escuchar inputs de texto de los síntomas para revalidar mientras escriben
        const txtSintomas = document.querySelectorAll('.act4-sintoma-txt');
        txtSintomas.forEach(txt => txt.addEventListener('input', validarFormularioAct4M4));

        chkAcciones.forEach(chk => chk.addEventListener('change', validarFormularioAct4M4));

        validarFormularioAct4M4(); // Ejecutar al inicio
    });
    // ACTIVIDAD 5 Y EVALUACIÓN - Módulo 4: Validación Completa
    document.addEventListener('DOMContentLoaded', function() {
        const formAct5M4 = document.getElementById('form-act5-m4');
        if (!formAct5M4) return;

        const btnFinalizarAct5 = document.getElementById('btn-finalizar-act5-m4');

        // Elementos a validar
        const checksQ1 = document.querySelectorAll('.act5-val-q1');
        const radiosQ2 = document.querySelectorAll('.act5-val-q2');
        const selectsEval = document.querySelectorAll('.act5-val-eval');

        function validarFormularioAct5M4() {
            if (!btnFinalizarAct5) return;

            // 1. Validar Q1: al menos un checkbox marcado
            const q1Valido = Array.from(checksQ1).some(chk => chk.checked);

            // 2. Validar Q2: al menos un radio seleccionado
            const q2Valido = Array.from(radiosQ2).some(r => r.checked);

            // 3. Validar Evaluación: los 3 selects deben tener un valor diferente de vacío
            const evalLlena = Array.from(selectsEval).every(sel => sel.value !== "");

            // Comprobación Final
            if (q1Valido && q2Valido && evalLlena) {
                btnFinalizarAct5.disabled = false;
                btnFinalizarAct5.style.opacity = "1";
                btnFinalizarAct5.style.cursor = "pointer";
            } else {
                btnFinalizarAct5.disabled = true;
                btnFinalizarAct5.style.opacity = "0.5";
                btnFinalizarAct5.style.cursor = "not-allowed";
            }
        }

        // Asignar listeners
        checksQ1.forEach(chk => chk.addEventListener('change', validarFormularioAct5M4));
        radiosQ2.forEach(r => r.addEventListener('change', validarFormularioAct5M4));
        selectsEval.forEach(sel => sel.addEventListener('change', validarFormularioAct5M4));

        // Ejecutar al cargar la página
        validarFormularioAct5M4();
    });
</script>