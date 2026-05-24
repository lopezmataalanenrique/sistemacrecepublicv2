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
            Módulo 5. Sigo en marcha
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

$ya_respondio_intro = !empty($respuestas['501']) && !empty($respuestas['502']) && !empty($respuestas['503']);

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
        <h1>Módulo 5. Sigo en marcha</h1>
        <p class="texto-justificado">¡Te felicito por llegar a este punto del programa! Tu constancia es una muestra de tu compromiso para tener una mejor relación con tu condición avanzando en camino hacía una vida plena y valiosa.</p>
        <p class="texto-justificado">Este módulo se orienta a la forma de relacionarse entre una condición de salud que te sucede y las elecciones que tomas en diferentes momentos de tu vida cotidiana.</p>

        <form method="POST" action="/guardar-actividad" id="form-intro-m5">
            <input type="hidden" name="id_modulo" value="5">
            <input type="hidden" name="actividad_id" value="0">

            <div class="m1-evaluacion-final" style="background: #eef2f7; padding: 4rem; border-radius: 1.5rem; border: 0.2rem dashed #12307D; margin: 4rem 0;">
                <p style="margin-bottom: 3rem;">
                    Antes de comenzar, te invito a hacer una pausa y observar cómo han sido estos últimos días en tu proceso con CRECE. En este tiempo:
                </p>

                <?php
                $preguntas_intro = [

                    '501' => [
                        'texto' => '¿Noto algún cambio en cómo me relaciono con mis pensamientos o emociones?',
                        'opciones' => [
                            'Sí, claramente',
                            'Un poco',
                            'Aún no lo noto'
                        ]
                    ],

                    '502' => [
                        'texto' => '¿Noto cambios en mis respuestas o comportamientos habituales?',
                        'opciones' => [
                            'Sí, claramente',
                            'Algunas respuestas',
                            'Aún no lo noto'
                        ]
                    ],

                    '503' => [
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
                        <button type="button" class="boton boton-completado"></i> Observación guardada
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </form>
        <p class="texto justificado">
            Gracias por tu honestidad. Ahora profundicemos en cómo tomar el volante de tus acciones.
        </p>
    </section>

    <!-- ACTIVIDAD 1 -->
    <?php $st1 = getEstado(1, $actual); ?>
    <section class="actividad" id="act1" style="<?php echo $st1['visible']; ?>">

        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 1. Autocuidado</h2>
            <p>Cuidar de uno mismo parece simple, pero sostener hábitos de autocuidado suele volverse difícil cuando hay cansancio, síntomas físicos, malestar emocional, falta de energía o poca motivación.</p>
            <p>En esta actividad reconoceremos que a menudo surgen barreras que nos alejan de aquello que nos hace bien y exploramos cómo el autocuidado puede conectarse con lo que valoras, para avanzar de forma más amable y conservando tu energía.</p>
        </div>

        <div class="m1-audio-contenedor">
            <div class="audio-titulo">
                A veces aparecen barreras en el camino
            </div>
            <div class="m5a1-c1">
                <div style="text-align: center;">
                    <img src="/build/img/m5a1_img1.webp"
                        class="img-ebook"
                        alt="Aparecen barreras">
                </div>
                <div>
                    <audio controls style="width: 100%;">
                        <source src="/build/audio/Audio_F1_A_veces_aparecen_barreras_en_el_camino.mp3" type="audio/mpeg">
                        Tu navegador no soporta el audio.
                    </audio>
                </div>
            </div>
        </div>


        <div class="actividad-seccion-texto">
            <p>Las razones profundas por las que deseas cuidarte son clave para fortalecer la motivación y construir un estilo de vida más congruente con lo que valoras.</p>
        </div>

        <div style="text-align: center; margin: 3rem 0;">
            <img src="/build/img/m5a1_img2.webp" class="img-ebook" alt="Razones para cuidarse">
        </div>

        <div class="actividad-seccion-texto">
            <p>Esas barreras en ocasiones aparecen fuera de ti, otras surgen dentro de ti en forma de emociones, pensamientos, impulsos, sensaciones incómodas o creencias sobre quién eres ahora que vives con una condición de salud. Para comprender mejor estas barreras internas, escucha el siguiente audio:</p>
        </div>

        <div class="m1-audio-contenedor">
            <p class="audio-titulo">Metáfora del monstruo</p>
            <audio controls style="width: 100%; max-width: 150rem;">
                <source src="/build/audio/Audio_F2_Metáfora_del_monstruo.mp3" type="audio/mpeg">
            </audio>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act1-m5">
            <input type="hidden" name="id_modulo" value="5">
            <input type="hidden" name="actividad_id" value="1">

            <div class="m1-experimento-seccion">
                <p class="m1-experimento-titulo">Iniciemos esta reflexión. Escribe en el espacio lo que identifiques. Recuerda que no se trata de juzgar si está bien o mal, solo observa tu experiencia con amabilidad.</p>

                <div style="margin-bottom: 3rem;">
                    <p style=" color: #333; margin-bottom: 1rem;">Si imaginas que ese monstruo representa algo con lo que luchas en tu día a día, para controlarlo, alejarlo o evitarlo, ¿qué monstruo es?</p>
                    <?php $val_504 = $respuestas['504'] ?? ''; ?>
                    <textarea name="504" id="txt-504" class="act1-textarea" style="width: 100%; border: 2px solid #e0e0e0; border-radius: 1.2rem; padding: 2rem; height: 100px; resize: vertical;" <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_504); ?></textarea>
                    <div id="fb-504" style="color: #329f00;; font-weight: 700; margin-top: 1rem; display: <?php echo !empty($val_504) ? 'block' : 'none'; ?>;">
                        <i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando
                    </div>
                </div>

                <div style="margin-bottom: 3rem;">
                    <p style="margin-bottom: 1rem;">¿Qué haces cuando aparece ese “monstruo"? ¿Cómo luchas con él?</p>
                    <?php $val_505 = $respuestas['505'] ?? ''; ?>
                    <textarea name="505" id="txt-505" class="act1-textarea" style="width: 100%; border: 2px solid #e0e0e0; border-radius: 1.2rem; padding: 2rem; height: 100px; resize: vertical; " <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_505); ?></textarea>
                    <div id="fb-505" style="color: #329f00;; font-weight: 700; margin-top: 1rem; display: <?php echo !empty($val_505) ? 'block' : 'none'; ?>;">
                        <i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando
                    </div>
                </div>

                <div style="margin-bottom: 3rem;">
                    <p style="margin-bottom: 1rem;">¿Qué cosas valiosas has dejado de hacer por estar pendiente de esa lucha?</p>
                    <?php $val_506 = $respuestas['506'] ?? ''; ?>
                    <textarea name="506" id="txt-506" class="act1-textarea" style="width: 100%; border: 2px solid #e0e0e0; border-radius: 1.2rem; padding: 2rem; height: 100px; resize: vertical; " <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_506); ?></textarea>
                    <div id="fb-506" style="color: #329f00;; font-weight: 700; margin-top: 1rem; display: <?php echo !empty($val_506) ? 'block' : 'none'; ?>;">
                        <i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando
                    </div>
                </div>
            </div>


            <div class="actividad-seccion-texto" style="margin: 0;">
                <p>Es importante enfatizar que no se trata de negar que existe ese “monstruo” y tampoco significa que haya algo mal contigo por estar atrapado con él en esa lucha.</p>
                <p>Luchar es algo que los seres humanos hacemos cuando queremos dejar de sentir incomodidad o malestar.</p>
                <p style="font-weight: 700; color: #12307D; margin-top: 2rem;">Entonces, ¿de qué se trata?</p>
                <p>De aprender a reconocer cuando el monstruo aparece y… poco a poco elegir dejar de “engancharte” en luchar.</p>
            </div>



            <div style="background:#f5ece0; padding:3.5rem; border-radius:1.5rem; margin-top:4rem; border-left:6px solid #c79e57;">
                <p style="font-weight: 700; color: #003b70; margin-bottom: 1.5rem;">Te propongo un pequeño experimento hasta que volvamos a encontrarnos:</p>
                <p class="texto-justificado" style="margin: 0;">Cuando notes que aparece “tu monstruo”, no lo intentes desaparecer, ni cambiar. Solo obsérvalo unos momentos. Luego pregúntate, <strong>¿esta lucha me acerca o me aleja de lo que es importante para mi?</strong></p>
            </div>

            <div style="text-align: center; margin-top: 6rem;">
                <?php if ($st1['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 1 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act1-m5" class="boton" data-intro="<?php echo $ya_respondio_intro ? 'true' : 'false'; ?>"
                        style="background: #12307D; color: #FFFFFF; padding: 1.5rem 5rem; border-radius: 0.8rem; border: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;" disabled>
                        Guardar y finalizar Actividad 1
                    </button>
                    <?php if (!$ya_respondio_intro): ?>
                        <p class="m-mensaje-advertencia">Debes completar el cuestionario inicial para poder guardar esta actividad.</p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <!-- Actividad 2 -->
    <?php $st2 = getEstado(2, $actual); ?>
    <section class="actividad" id="act2" style="<?php echo $st2['visible']; ?>">
        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 2. Soltar la cuerda</h2>
            <p>Piensa en una situación en la que hayas sentido que estás luchando contra algo que no puedes controlar (por ejemplo, un síntoma, un recuerdo o una emoción).</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act2-m5">
            <input type="hidden" name="id_modulo" value="5">
            <input type="hidden" name="actividad_id" value="2">

            <div class="m1-experimento-seccion">
                <p class="m1-experimento-titulo">Escribe una frase que represente cómo sería soltar la cuerda en esa situación.</p>
                <?php $val_507 = $respuestas['507'] ?? ''; ?>
                <textarea name="507" id="txt-507" class="act2-textarea" style="width: 100%; border: 2px solid #e0e0e0; border-radius: 1.2rem; padding: 2rem; height: 100px; resize: vertical;" <?php echo $st2['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_507); ?></textarea>

                <div id="fb-507" style="color: #27ae60; font-weight: 700; margin-top: 1rem;  display: <?php echo !empty($val_507) ? 'block' : 'none'; ?>;">
                    <i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando
                </div>
            </div>

            <div class="m1-experimento-seccion">
                <p class="m1-experimento-titulo">Si hoy soltaras un poco la cuerda, ¿hacia qué dirección podrías moverte?</p>
                <?php $val_508 = $respuestas['508'] ?? ''; ?>
                <textarea name="508" id="txt-508" class="act2-textarea" style="width: 100%; border: 2px solid #e0e0e0; border-radius: 1.2rem; padding: 2rem; height: 100px; resize: vertical; " <?php echo $st2['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_508); ?></textarea>

                <div id="fb-508" style="color: #27ae60; font-weight: 700; margin-top: 1rem;  display: <?php echo !empty($val_508) ? 'block' : 'none'; ?>;">
                    <i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <div style="background:#f4f6f9; padding:3rem; border-radius:1.5rem; margin:3.5rem 0; font-style:italic; border-left:4px solid #ccc;">
                    Por ejemplo: “En lugar de enojarme con mi cuerpo, voy a escucharlo y descansar.”; “No puedo cambiar el pasado, pero puedo cuidar lo que tengo hoy.” o “Soltar no es rendirse, es seguir avanzando hacia lo que valoro.”
                </div>
                <p>A veces, dejar de luchar contra el dolor es el primer paso para empezar a cuidar de ti con compasión y propósito.</p>
                <p>En el camino del autocuidado, reconectar con tu cuerpo es clave. Después de momentos difíciles, es común vivir más en la mente: pensando demasiado, anticipando o reviviendo situaciones. Esto hace que perdamos contacto con las señales del cuerpo y con lo que necesita en el presente.</p>
                <p>Aprender a tomar distancia de los pensamientos no significa dejar de pensar, sino reconocer que no todo lo que pasa por la mente es una verdad absoluta. Cuando observas lo que sientes y piensas sin pelear con ello, recuperas la posibilidad de elegir cómo actuar.</p>
            </div>

            <div class="actividad-seccion-texto">
                <h3 style="color: #12307D; font-weight: 700; font-size: 2rem; margin-bottom: 1.5rem;">Un respiro para reconectar</h3>
                <p>Realizaremos un ejercicio para reconectar con tu cuerpo, busca un lugar tranquilo y cómodo.</p>
            </div>

            <div class="video-container">
                <video controls>
                    <source src="/build/video/Video_F1_Un_respiro_para_reconectar.mp4" type="video/mp4">
                    Tu navegador no soporta el video.
                </video>
            </div>

            <div class="actividad-seccion-texto">
                <p>Cuando aprendes a prestar atención a tu cuerpo, puedes notar lo que sientes sin pelear con ello, esto te permite responder con más calma, escuchar las señales que te cuidan y volver al presente, que es el único lugar donde puedes actuar.</p>
                <p>Tu cuerpo no es un enemigo, ni un recordatorio del dolor o de una situación médica; es un aliado, cada vez que lo observas con amabilidad, te das la oportunidad de vivir con mayor consciencia y esto abre la puerta a la calma, presencia y cuidado.</p>
                <p>Te invito a realizar este ejercicio con regularidad para que notes lo que sucede en tu cuerpo y en tu mente.</p>
            </div>

            <div style="text-align: center; margin-top: 6rem;">
                <?php if ($st2['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 2 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act2-m5" class="boton boton-por-guardar" disabled>
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
            <h2 class="act-titulo">Actividad 3. El semáforo del cuerpo</h2>
            <p>Para comenzar, te invito a detenerte un momento para reflexionar que en el transcurso de nuestra vida convivimos con cierto nivel de malestar por causas y contextos diversos.</p>
            <p>Cuando vivimos con una condición de salud, se presentarán señales en el cuerpo y mente que pueden ser cambiantes.</p>
            <p>Momentos de mayor energía, habrá momentos de crisis o de cansancio, dolor o incomodidad.</p>
            <p>En esta actividad, explorarás sobre cómo reconocer esas señales y cómo puedes responder a ellas de manera más consciente. Observa el siguiente video:</p>
        </div>

        <div class="video-container">
            <video controls>
                <source src="/build/video/Video_F2_El_Dolor_Inevitable_y_el_Sufrimiento_Añadido.mp4" type="video/mp4">
                Tu navegador no soporta el video.
            </video>
        </div>

        <div class="actividad-seccion-texto">
            <p>Teniendo en mente lo que acabas de observar, vamos a llevarlo a tu experiencia, comenzando por explorar una forma sencilla de identificar y aceptar las señales del cuerpo, sin luchar, sin criticarnos.</p>
            <p>Recuerda que, aceptar no significa rendirse, sino reconocer lo que no podemos cambiar para recuperar nuestra capacidad de adaptarnos y seguir adelante.</p>
        </div>

        <div class="m1-experimento-seccion" id="semaforo-f1">
            <div style="display: flex; align-items: center; gap: 4rem; margin-bottom: 2.5rem;">
                <p style="flex: 1;">Imagina que tu cuerpo funciona como un semáforo interno.</p>
                <img src="/build/img/m5a3_img1.png" class="img-ebook" alt="Semáforo interno">
            </div>
            <button type="button" class="boton" onclick="mostrarPasoSemaforoAct3('semaforo-f2')">Siguiente</button>
        </div>

        <div class="m1-experimento-seccion" id="semaforo-f2" style="display: none; opacity: 0; transition: opacity 0.5s;">
            <div style="display: flex; align-items: center; gap: 4rem; flex-direction: row-reverse; margin-bottom: 2.5rem;">
                <p style="flex: 1;">La luz verde: hay energía, disposición, claridad. Puedes avanzar.</p>
                <img src="/build/img/m5a3_img2.png" class="img-ebook" alt="Luz verde">
            </div>
            <button type="button" class="boton" onclick="mostrarPasoSemaforoAct3('semaforo-f3')">Siguiente</button>
        </div>

        <div class="m1-experimento-seccion" id="semaforo-f3" style="display: none; opacity: 0; transition: opacity 0.5s;">
            <div style="display: flex; align-items: center; gap: 4rem; margin-bottom: 2.5rem;">
                <p style="flex: 1;">La luz amarilla: hay cansancio, tensión o incomodidad. Es momento de bajar el ritmo y observar.</p>
                <img src="/build/img/m5a3_img3.png" class="img-ebook" alt="Luz amarilla">
            </div>
            <button type="button" class="boton" onclick="mostrarPasoSemaforoAct3('semaforo-f4')">Siguiente</button>
        </div>

        <div class="m1-experimento-seccion" id="semaforo-f4" style="display: none; opacity: 0; transition: opacity 0.5s;">
            <div style="display: flex; align-items: center; gap: 4rem; margin-bottom: 2.5rem;">
                <p style="flex: 1;">La luz roja: hay dolor, saturación o agotamiento. Necesitas parar y cuidarte.</p>
                <img src="/build/img/m5a3_img4.png" class="img-ebook" alt="Luz roja">
            </div>

            <div style="text-align: center; margin: 4rem 0;">
                <img src="/build/img/m5a3_img5.png" class="img-ebook" alt="Semáforo completo">
            </div>

            <div class="m1-audio-contenedor">
                <p class="audio-titulo">Audio_F3: El semáforo del cuerpo</p>
                <audio controls style="width: 100%;">
                    <source src="/build/audio/Audio_F3_El_semáforo_del_cuerpo.mp3" type="audio/mpeg">
                    Tu navegador no soporta el audio.
                </audio>
            </div>

            <div class="actividad-seccion-texto" style="margin-top: 3rem;">
                <p>Hoy no se trata de exigir más, sino de acompañarte mejor. Tu cuerpo habla; aprender a escucharlo es parte de vivir con sentido.</p>
            </div>

            <button type="button" class="boton" onclick="mostrarPasoSemaforoAct3('semaforo-f5')">Siguiente</button>
        </div>

        <div id="semaforo-f5" style="display: <?php echo $st3['completada'] ? 'block' : 'none'; ?>; opacity: <?php echo $st3['completada'] ? '1' : '0'; ?>; transition: opacity 0.5s;">
            <div class="actividad-seccion-texto">
                <p>Ahora, exploremos cómo integramos todo esto:</p>
            </div>

            <form method="POST" action="/guardar-actividad" id="form-act3-m5">
                <input type="hidden" name="id_modulo" value="5">
                <input type="hidden" name="actividad_id" value="3">

                <div class="m1-experimento-seccion">
                    <p class="m1-experimento-titulo">Paso 1. Nota, observa:</p>
                    <p style="margin-bottom: 1.5rem;">¿En qué color está mi semáforo?</p>
                    <?php
                    $opciones_q1 = ['Verde', 'Amarillo', 'Rojo'];
                    $val_509 = $respuestas['509'] ?? '';
                    foreach ($opciones_q1 as $opcion):
                        $es_elegida = ($val_509 === $opcion);
                    ?>
                        <label class="m1-check-contenedor">
                            <input type="radio" name="509" value="<?php echo $opcion; ?>"
                                class="m1-check-input act3-val-q1"
                                <?php echo $es_elegida ? 'checked' : ''; ?>
                                <?php echo $st3['completada'] ? 'disabled' : ''; ?>>
                            <span class="m1-check-custom" style="border-radius: 50%;"></span>
                            <span class="m1-check-texto"><?php echo $opcion; ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div class="m1-experimento-seccion">
                    <p class="m1-experimento-titulo">Paso 2. Dale sentido y elige una respuesta adaptativa:</p>
                    <p style="margin-bottom: 1.5rem;">¿Qué me está indicando este estado: avanzar, ajustar, pausar?</p>
                    <?php
                    $opciones_q2 = [
                        'Hay suficiente energía para avanzar hacia lo importante para mí.',
                        'Detecto señales para hacer algunos ajustes y bajar el ritmo.',
                        'Reconozco que puedo hacer una pausa para priorizar el autocuidado.'
                    ];
                    $val_510 = $respuestas['510'] ?? '';
                    foreach ($opciones_q2 as $opcion):
                        $es_elegida = ($val_510 === $opcion);
                    ?>
                        <label class="m1-check-contenedor">
                            <input type="radio" name="510" value="<?php echo $opcion; ?>"
                                class="m1-check-input act3-val-q2"
                                <?php echo $es_elegida ? 'checked' : ''; ?>
                                <?php echo $st3['completada'] ? 'disabled' : ''; ?>>
                            <span class="m1-check-custom" style="border-radius: 50%;"></span>
                            <span class="m1-check-texto"><?php echo $opcion; ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div class="m1-experimento-seccion">
                    <p class="m1-experimento-titulo">Paso 3. Elijo una acción comprometida breve:</p>
                    <p style="margin-bottom: 1.5rem;">¿Qué pequeña acción elijo ante estas señales?</p>
                    <?php
                    $opciones_q3 = [
                        'Descansar unos minutos',
                        'Tomar agua',
                        'Ajustar la postura',
                        'Pedir apoyo',
                        'Respirar profundo 3 veces',
                        'Estirar y mover suavemente mi cuerpo'
                    ];
                    $val_511 = $respuestas['511'] ?? '';
                    foreach ($opciones_q3 as $opcion):
                        $es_elegida = ($val_511 === $opcion);
                    ?>
                        <label class="m1-check-contenedor">
                            <input type="radio" name="511" value="<?php echo $opcion; ?>"
                                class="m1-check-input act3-val-q3"
                                <?php echo $es_elegida ? 'checked' : ''; ?>
                                <?php echo $st3['completada'] ? 'disabled' : ''; ?>>
                            <span class="m1-check-custom" style="border-radius: 50%;"></span>
                            <span class="m1-check-texto"><?php echo $opcion; ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div class="actividad-seccion-texto">
                    <p>Para finalizar la actividad, te invito a que en los próximos días repitas este ejercicio.</p>
                    <p>Notar cómo estás es importante para adaptarte a lo que necesitas. Responder de forma adaptativa es cuidarte y una forma de avanzar.</p>
                </div>

                <div style="text-align: center; margin-top: 6rem;">
                    <?php if ($st3['completada']): ?>
                        <button type="button" class="boton boton-completado" disabled>
                            <i class="fas fa-check"></i> Actividad 3 Completada
                        </button>
                    <?php else: ?>
                        <button type="submit" id="btn-finalizar-act3-m5" class="boton boton-por-guardar" disabled>
                            Guardar y finalizar Actividad 3
                        </button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </section>

    <!-- Actividad 4 -->
    <?php $st4 = getEstado(4, $actual); ?>
    <section class="actividad" id="act4" style="<?php echo $st4['visible']; ?>">
        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 4. Expandiendo la visión</h2>
            <p>Ahora que has distinguido entre el malestar natural y la lucha innecesaria contra el dolor, la siguiente actividad te invita a aterrizar en la presencia y a labrar la disposición a estar, dirigiendo tu atención al momento presente utilizando tus sensaciones corporales como ancla.</p>
            <p>Es momento de explorar la tensión, el dolor o cualquier sensación física, el propósito principal es observarlas con una postura intencionalmente abierta, receptiva, flexible y sin prejuicios, que es la esencia de la aceptación activa.</p>
            <p>Esta práctica te ayudará a conectar con el "Yo observador", lo que puede ser de gran utilidad para que expandas la visión sobre ti. Pulsa el botón para escuchar el siguiente audio.</p>
        </div>

        <div class="m1-audio-contenedor">
            <p class="audio-titulo">Audio_F4_El Observador Amable y la Roca en el Lago</p>
            <audio controls style="width: 100%;">
                <source src="/build/audio/Audio_F4_El_Observador_Amable_y_la_Roca_en_el_Lago.mp3" type="audio/mpeg">
                Tu navegador no soporta el audio.
            </audio>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act4-m5">
            <input type="hidden" name="id_modulo" value="5">
            <input type="hidden" name="actividad_id" value="4">

            <div class="actividad-seccion-texto">
                <p>¡Gran trabajo al permanecer en este momento presente! Toma un momento y responde:</p>
            </div>

            <div class="m1-experimento-seccion">
                <div style="margin-bottom: 3rem;">
                    <p class="m1-experimento-titulo">¿Pudiste percibir sensaciones corporales sin intentar cambiarlas o juzgarlas?</p>
                    <?php $val_512 = $respuestas['512'] ?? ''; ?>
                    <textarea name="512" id="txt-512" class="act4-textarea" style="width: 100%; border: 2px solid #e0e0e0; border-radius: 1.2rem; padding: 2rem; height: 100px; resize: vertical;" <?php echo $st4['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_512); ?></textarea>

                    <div id="fb-512" style="color: #27ae60; font-weight: 700; margin-top: 1rem; display: <?php echo !empty($val_512) ? 'block' : 'none'; ?>;">
                        <i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando
                    </div>
                </div>

                <div style="margin-bottom: 3rem;">
                    <p class="m1-experimento-titulo">¿Notaste la diferencia entre lo que estabas sintiendo y esa parte de ti que lo estaba observando?</p>
                    <?php $val_513 = $respuestas['513'] ?? ''; ?>
                    <textarea name="513" id="txt-513" class="act4-textarea" style="width: 100%; border: 2px solid #e0e0e0; border-radius: 1.2rem; padding: 2rem; height: 100px; resize: vertical;" <?php echo $st4['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_513); ?></textarea>

                    <div id="fb-513" style="color: #27ae60; font-weight: 700; margin-top: 1rem; display: <?php echo !empty($val_513) ? 'block' : 'none'; ?>;">
                        <i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando
                    </div>
                </div>

                <div style="margin-bottom: 1rem;">
                    <p class="m1-experimento-titulo">Cuando miraste el malestar sin pelearte con él, ¿pudiste darle un poco de espacio o sentiste que bajó el impulso de resistirte?</p>
                    <?php $val_514 = $respuestas['514'] ?? ''; ?>
                    <textarea name="514" id="txt-514" class="act4-textarea" style="width: 100%; border: 2px solid #e0e0e0; border-radius: 1.2rem; padding: 2rem; height: 100px; resize: vertical;" <?php echo $st4['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_514); ?></textarea>

                    <div id="fb-514" style="color: #27ae60; font-weight: 700; margin-top: 1rem; display: <?php echo !empty($val_514) ? 'block' : 'none'; ?>;">
                        <i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando
                    </div>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p>Recuerda que las prácticas de atención plena pueden resultar relajantes algunas veces y notaste sensaciones agradables, o tal vez fueron incómodas o cambiantes. Tal vez en diferentes ocasiones te distrajiste o apareció la tendencia a tensarse o a querer que desaparecieran.</p>
                <p>Lo importante aquí no es lo que sentiste, sino cómo estuviste con ello.</p>
                <p>La capacidad de abrirte a lo que está presentándose, observar sin juzgar y darte el espacio para elegir cómo responder se conoce como flexibilidad psicológica, y es como un músculo, entre más practiques más se desarrollará.</p>
                <p>Cada vez que lo necesites, puedes realizar estas prácticas para observar sin quedar atrapado en la experiencia.</p>
            </div>

            <div style="text-align: center; margin-top: 6rem;">
                <?php if ($st4['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 4 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act4-m5" class="boton boton-por-guardar" disabled>
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
            <h2 class="act-titulo">Actividad 5. Sintonizador de la Disposición</h2>
            <p>¡Te doy la bienvenida al Sintonizador de la Disposición! Que es una práctica de exposición flexible, en donde nos enfocaremos en aumentar tu capacidad para ser flexible, permitiéndote actuar frente al dolor y miedo.</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act5-m5">
            <input type="hidden" name="id_modulo" value="5">
            <input type="hidden" name="actividad_id" value="5">
            <?php $val_dial = $respuestas['538'] ?? ''; ?>
            <input type="hidden" name="538" id="input-dial-m5" value="<?php echo htmlspecialchars($val_dial); ?>">

            <div class="m1-experimento-seccion">
                <p class="m1-experimento-titulo">Paso 1: El Camino Valioso. Define tu Acción Comprometida:</p>
                <div class="m5-sint-grid2">
                    <div>
                        <p style="font-weight: 700; margin-bottom: 1rem; color: #333;">🌟 Valores (elige 1):</p>
                        <select name="521" id="sel-valor-m5" class="m1-select-personalizado" style="width: 100%; padding: 1.2rem; border-radius: 0.8rem;" <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                            <option value="" disabled <?php echo empty($respuestas['521']) ? 'selected' : ''; ?>>-- Selecciona un valor --</option>
                            <?php
                            $valores_opt = ['Cuidado personal', 'Conexión con otros', 'Independencia', 'Tranquilidad / Paz mental', 'Propósito / Sentido'];
                            foreach ($valores_opt as $opt):
                            ?>
                                <option value="<?php echo $opt; ?>" <?php echo ($respuestas['521'] ?? '') === $opt ? 'selected' : ''; ?>><?php echo $opt; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <p style="font-weight: 700; margin-bottom: 1rem; color: #333;">👉 Acciones Comprometidas:</p>
                        <select name="522" id="sel-accion-m5" class="m1-select-personalizado" style="width: 100%; padding: 1.2rem; border-radius: 0.8rem;" <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                            <option value="" disabled <?php echo empty($respuestas['522']) ? 'selected' : ''; ?>>-- Selecciona una acción --</option>
                            <?php
                            $acciones_opt = [
                                'Hacer una actividad corta aunque haya dolor/fatiga.',
                                'Pedir ayuda de forma clara sin culpa.',
                                'Tomar descansos planeados sin autoexigencia.',
                                'Realizar una práctica breve de respiración o mindfulness.',
                                'Conectar con alguien (mensaje/llamada) aunque haya malestar.'
                            ];
                            foreach ($acciones_opt as $opt):
                            ?>
                                <option value="<?php echo $opt; ?>" <?php echo ($respuestas['522'] ?? '') === $opt ? 'selected' : ''; ?>><?php echo $opt; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="m1-experimento-seccion">
                <p class="m1-experimento-titulo">Paso 2: El Anzuelo Interno.</p>
                <p>Responde: ¿Qué pensamientos, sentimientos o sensaciones difíciles surgen que te dicen que no puedes o no deberías hacerlo? Estos son los anzuelos internos que lo jalan hacia la evitación. <strong style="color:#12307D;">Puedes elegir hasta 2 opciones por categoría.</strong></p>

                <div class="m5-sint-grid3">
                    <div class="m5-sint-barrier-col">
                        <p class="m5-sint-barrier-title">🧠 Pensamientos difíciles</p>
                        <?php
                        $pensamientos = [
                            '523' => 'No vale la pena intentarlo, igual me sentiré mal.',
                            '524' => 'Voy a empeorar si hago cualquier esfuerzo.',
                            '525' => 'No soy capaz como antes.',
                            '526' => 'Estoy fallando a los demás.',
                            '527' => 'Nunca voy a mejorar.'
                        ];
                        foreach ($pensamientos as $id => $texto):
                            $marcado = !empty($respuestas[$id]);
                        ?>
                            <label class="m1-check-contenedor" style="margin-bottom: 1rem; display: block;">
                                <input type="checkbox" name="<?php echo $id; ?>" value="<?php echo $texto; ?>" class="m1-check-input chk-barrera" data-grupo="p" <?php echo $marcado ? 'checked' : ''; ?> <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                                <span class="m1-check-custom"></span>
                                <span class="m1-check-texto"><?php echo $texto; ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>

                    <div class="m5-sint-barrier-col">
                        <p class="m5-sint-barrier-title">❤️‍🩹 Emociones frecuentes</p>
                        <?php
                        $emociones = [
                            '528' => 'Miedo al dolor / recaída',
                            '529' => 'Tristeza persistente',
                            '530' => 'Frustración / enojo con el cuerpo',
                            '531' => 'Vergüenza por necesitar ayuda',
                            '532' => 'Desesperanza'
                        ];
                        foreach ($emociones as $id => $texto):
                            $marcado = !empty($respuestas[$id]);
                        ?>
                            <label class="m1-check-contenedor" style="margin-bottom: 1rem; display: block;">
                                <input type="checkbox" name="<?php echo $id; ?>" value="<?php echo $texto; ?>" class="m1-check-input chk-barrera" data-grupo="e" <?php echo $marcado ? 'checked' : ''; ?> <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                                <span class="m1-check-custom"></span>
                                <span class="m1-check-texto"><?php echo $texto; ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>

                    <div class="m5-sint-barrier-col">
                        <p class="m5-sint-barrier-title">🌀 Sensaciones corporales</p>
                        <?php
                        $sensaciones = [
                            '533' => 'Dolor intenso en alguna zona',
                            '534' => 'Fatiga / agotamiento',
                            '535' => 'Presión en el pecho',
                            '536' => 'Mareo o debilidad',
                            '537' => 'Tensión muscular'
                        ];
                        foreach ($sensaciones as $id => $texto):
                            $marcado = !empty($respuestas[$id]);
                        ?>
                            <label class="m1-check-contenedor" style="margin-bottom: 1rem; display: block;">
                                <input type="checkbox" name="<?php echo $id; ?>" value="<?php echo $texto; ?>" class="m1-check-input chk-barrera" data-grupo="s" <?php echo $marcado ? 'checked' : ''; ?> <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                                <span class="m1-check-custom"></span>
                                <span class="m1-check-texto"><?php echo $texto; ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="m5-sint-brujula-container">
                <p style="font-weight: 700; margin-bottom: 1rem; color: #12307D">Paso 3: Activando el Sintonizador de la Disposición.</p>
                <p style="margin-bottom: 2rem;">Después nota como los pensamientos y sensaciones que indicaste no son el problema; el problema es cuando te resistes o te fusionas con ellos y permites que dicten tus acciones.</p>

                <p style="font-weight: 700; color: #333; margin-bottom: 1rem;">¿Cuánta disposición tienes para sentir incomodidad mientras actúas?</p>

                <p class="m5-aviso-movil">👈 Desliza horizontalmente la brújula para verla completa 👉</p>

                <div class="m5-sint-brujula-scroll-area">
                    <div class="m5-sint-brujula-wrapper">
                        <div class="m5-sint-brujula-visual <?php echo $st5['completada'] ? 'disabled' : ''; ?>" id="dial-area-m5">
                            <div class="m5-sint-bg"></div>
                            <div class="m5-sint-label m5-sint-label-n">Hacia mis Valores</div>
                            <div class="m5-sint-label m5-sint-label-s">Lejos de mis Valores</div>
                            <div class="m5-sint-label m5-sint-label-e">➡ Acercamiento</div>
                            <div class="m5-sint-label m5-sint-label-w">Evitación ⬅</div>

                            <div id="needle-m5" class="m5-sint-needle"></div>
                            <div style="position: absolute; width: 22px; height: 22px; background: #333; border-radius: 50%; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 6; border: 4px solid white;"></div>
                        </div>
                    </div>
                </div>

                <div id="dial-msg-m5" class="m5-sint-msg">
                    <?php if ($st5['completada'] && $val_dial !== ''): ?>
                        Nivel guardado: <?php echo $val_dial; ?>
                    <?php else: ?>
                        Haz clic en la brújula para marcar tu disposición (0 al 10)...
                    <?php endif; ?>
                </div>

                <?php if (!$st5['completada']): ?>
                    <div id="msg-advertencia-juego" class="m-mensaje-advertencia">
                        Para finalizar el juego debes seleccionar un valor, una acción comprometida y marcar tu disposición en la brújula.
                    </div>
                    <button type="button" class="boton" id="btn-finalizar-juego" disabled>Finalizar juego y ver resultados</button>
                <?php endif; ?>
            </div>

            <div id="game-results-m5" style="display: <?php echo $st5['completada'] ? 'block' : 'none'; ?>; border-top: 4px solid #c79e57; padding-top: 4rem;">
                <div id="feedback-final-m5" class="m5-sint-feedback-box">
                </div>

                <div class="actividad-seccion-texto">
                    <p>Ahora que has finalizado esta exploración, quizá puedes notar algo importante. Constantemente estaremos ante incomodidades, encontraremos obstáculos y barreras, algunas no desaparecerán, así que luchar contra todo ello, es agotador.</p>
                    <p>En lugar de eso puedes abrir la posibilidad de aprender a seguir avanzando aun cuando lleves contigo esa incomodidad.</p>
                    <p>Es una forma de dejar de pelear con lo que ya está ahí, para poder usar tu energía en lo que valoras y es importante para tí.</p>
                    <p style="font-weight: 700; color: #12307D;">Puedes elegir dar pasos valiosos llevando contigo aquello que incomoda, sin necesidad de evitarlo, rodearlo o eliminarlo.</p>
                    <p>Avanzar, no es pretender que desaparezca lo que nos desagrada o incomoda, sino aprender a caminar con ellas hacia un destino.</p>
                </div>
            </div>

            <div class="m1-evaluacion-final" id="seccion-evaluacion-m5" style="display: <?php echo $st5['completada'] ? 'block' : 'none'; ?>; background: #eef2f7; padding: 4rem; border-radius: 1.5rem; border: 0.2rem dashed #12307D; margin-top: 6rem;">
                <h3 class="act-titulo" style="color: #12307D; margin-bottom: 2rem;">Evaluación del Módulo 5</h3>
                <p style="margin-bottom: 3rem;">¡Felicidades, has concluido el módulo 5! Tu experiencia es importante, marca la opción que mejor la refleja:</p>

                <?php
                $evaluacion_m5 = [
                    '541' => '1. El módulo fue claro y fácil de seguir',
                    '542' => '2. Lo trabajado en el módulo me resulta útil para mi calidad de vida o autocuidado',
                    '543' => '3. Considero que puedo aplicar lo trabajado en mi vida diaria'
                ];
                foreach ($evaluacion_m5 as $id => $pregunta): ?>
                    <div style="margin-bottom: 3rem;">
                        <p style="font-weight: 700; color: #333; margin-bottom: 1rem;"><?php echo $pregunta; ?></p>
                        <select name="<?php echo $id; ?>" class="m1-select-personalizado eval-final-m5" style="width: 100%; padding: 1.2rem; border-radius: 0.8rem;" <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
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
                        ✨ ¡Concluiste con el Módulo 5! ✨
                    </div>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Módulo 5 Completado
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act5-m5" class="boton boton-por-guardar" style="display: none;" disabled>
                        Guardar y finalizar Actividad 5
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

    // ACTIVIDAD 1 - Módulo 5: Lógica y validación
    document.addEventListener('DOMContentLoaded', function() {
        const formAct1M5 = document.getElementById('form-act1-m5');
        if (!formAct1M5) return;

        const btnFinalizarAct1 = document.getElementById('btn-finalizar-act1-m5');
        const introCompletada = btnFinalizarAct1 ? btnFinalizarAct1.dataset.intro === 'true' : false;

        // Elementos de texto
        const textareasAct1 = document.querySelectorAll('.act1-textarea');

        function validarFormularioAct1M5() {
            if (!btnFinalizarAct1) return;

            // Verificar que todos los textareas tengan contenido
            const todasLlenas = Array.from(textareasAct1).every(ta => ta.value.trim().length > 0);

            // Mostrar u ocultar el feedback dinámicamente para cada textarea
            textareasAct1.forEach(ta => {
                const fbId = 'fb-' + ta.id.split('-')[1];
                const fbElement = document.getElementById(fbId);
                if (fbElement) {
                    fbElement.style.display = ta.value.trim().length > 0 ? 'block' : 'none';
                }
            });

            // EVALUACIÓN FINAL: Intro contestada + Textareas llenos
            if (todasLlenas && introCompletada) {
                btnFinalizarAct1.disabled = false;
                btnFinalizarAct1.style.opacity = "1";
                btnFinalizarAct1.style.cursor = "pointer";
                btnFinalizarAct1.style.background = "#12307D";
            } else {
                btnFinalizarAct1.disabled = true;
                btnFinalizarAct1.style.opacity = "0.5";
                btnFinalizarAct1.style.cursor = "not-allowed";
            }
        }

        // Listeners para las textareas
        textareasAct1.forEach(ta => ta.addEventListener('input', validarFormularioAct1M5));

        // Ejecutar validación al cargar la página (por si recarga con datos ya guardados)
        validarFormularioAct1M5();
    });

    // ACTIVIDAD 2 - Módulo 5: Validación y Feedback Dinámico
    document.addEventListener('DOMContentLoaded', function() {
        const formAct2M5 = document.getElementById('form-act2-m5');
        if (!formAct2M5) return;

        const btnFinalizarAct2 = document.getElementById('btn-finalizar-act2-m5');
        const textareasAct2 = document.querySelectorAll('.act2-textarea');

        function validarFormularioAct2M5() {
            if (!btnFinalizarAct2) return;

            // Verificar que ambos cuadros de texto tengan contenido
            const todasLlenas = Array.from(textareasAct2).every(ta => ta.value.trim().length > 0);

            // Mostrar el mensaje de "Buen trabajo" individualmente
            textareasAct2.forEach(ta => {
                const fbId = 'fb-' + ta.id.split('-')[1]; // Extraer el número del ID (ej. 507)
                const fbElement = document.getElementById(fbId);
                if (fbElement) {
                    fbElement.style.display = ta.value.trim().length > 0 ? 'block' : 'none';
                }
            });

            // Habilitar o deshabilitar el botón usando la clase 'activo' como en modulo1.php
            if (todasLlenas) {
                btnFinalizarAct2.disabled = false;
                btnFinalizarAct2.classList.add("activo");
            } else {
                btnFinalizarAct2.disabled = true;
                btnFinalizarAct2.classList.remove("activo");
            }
        }

        // Agregar los listeners para que se actualice mientras se escribe
        textareasAct2.forEach(ta => ta.addEventListener('input', validarFormularioAct2M5));

        // Ejecutar validación inicial
        validarFormularioAct2M5();
    });

    // FUNCION DE NAVEGACION PARA EL SEMAFORO (Actividad 3)
    function mostrarPasoSemaforoAct3(idFaseSiguiente) {
        const fase = document.getElementById(idFaseSiguiente);
        if (fase) {
            fase.style.display = "block";
            // Pequeño timeout para permitir que la transición de opacidad ocurra suavemente
            setTimeout(() => {
                fase.style.opacity = "1";
                fase.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 50);
        }
    }

    // ACTIVIDAD 3 - Módulo 5: Validación del Formulario
    document.addEventListener('DOMContentLoaded', function() {
        const formAct3M5 = document.getElementById('form-act3-m5');
        if (!formAct3M5) return;

        const btnFinalizarAct3 = document.getElementById('btn-finalizar-act3-m5');

        // Agrupamos los radios de cada pregunta
        const radiosQ1 = document.querySelectorAll('.act3-val-q1');
        const radiosQ2 = document.querySelectorAll('.act3-val-q2');
        const radiosQ3 = document.querySelectorAll('.act3-val-q3');

        function validarFormularioAct3M5() {
            if (!btnFinalizarAct3) return;

            // Verificamos que al menos un radio de cada pregunta esté seleccionado
            const q1Valido = Array.from(radiosQ1).some(r => r.checked);
            const q2Valido = Array.from(radiosQ2).some(r => r.checked);
            const q3Valido = Array.from(radiosQ3).some(r => r.checked);

            if (q1Valido && q2Valido && q3Valido) {
                btnFinalizarAct3.disabled = false;
                btnFinalizarAct3.classList.add("activo");
            } else {
                btnFinalizarAct3.disabled = true;
                btnFinalizarAct3.classList.remove("activo");
            }
        }

        // Asignar listeners para validar en tiempo real
        radiosQ1.forEach(r => r.addEventListener('change', validarFormularioAct3M5));
        radiosQ2.forEach(r => r.addEventListener('change', validarFormularioAct3M5));
        radiosQ3.forEach(r => r.addEventListener('change', validarFormularioAct3M5));

        // Ejecutar validación inicial
        validarFormularioAct3M5();
    });
    // ACTIVIDAD 4 - Módulo 5: Validación y Feedback Dinámico
    document.addEventListener('DOMContentLoaded', function() {
        const formAct4M5 = document.getElementById('form-act4-m5');
        if (!formAct4M5) return;

        const btnFinalizarAct4 = document.getElementById('btn-finalizar-act4-m5');
        const textareasAct4 = document.querySelectorAll('.act4-textarea');

        function validarFormularioAct4M5() {
            if (!btnFinalizarAct4) return;

            // Verificar que los tres cuadros de texto tengan contenido
            const todasLlenas = Array.from(textareasAct4).every(ta => ta.value.trim().length > 0);

            // Mostrar u ocultar el mensaje de "Buen trabajo" individualmente
            textareasAct4.forEach(ta => {
                const fbId = 'fb-' + ta.id.split('-')[1]; // Extrae el ID (512, 513, 514)
                const fbElement = document.getElementById(fbId);
                if (fbElement) {
                    fbElement.style.display = ta.value.trim().length > 0 ? 'block' : 'none';
                }
            });

            // Habilitar o deshabilitar el botón de finalizar
            if (todasLlenas) {
                btnFinalizarAct4.disabled = false;
                btnFinalizarAct4.classList.add("activo");
            } else {
                btnFinalizarAct4.disabled = true;
                btnFinalizarAct4.classList.remove("activo");
            }
        }

        // Agregar los listeners para que reaccione mientras el usuario escribe
        textareasAct4.forEach(ta => ta.addEventListener('input', validarFormularioAct4M5));

        // Ejecutar validación inicial al cargar la página
        validarFormularioAct4M5();
    });
    // ACTIVIDAD 5 Y MINIJUEGO - Módulo 5
    document.addEventListener('DOMContentLoaded', function() {
        const formAct5M5 = document.getElementById('form-act5-m5');
        if (!formAct5M5) return;

        // Elementos del Minijuego
        const dialArea = document.getElementById('dial-area-m5');
        const needle = document.getElementById('needle-m5');
        const inputDial = document.getElementById('input-dial-m5');
        const msgDial = document.getElementById('dial-msg-m5');
        const btnJuego = document.getElementById('btn-finalizar-juego');
        const msgAdvertenciaJuego = document.getElementById('msg-advertencia-juego');

        const selValor = document.getElementById('sel-valor-m5');
        const selAccion = document.getElementById('sel-accion-m5');
        const chkBarreras = document.querySelectorAll('.chk-barrera');

        // Elementos de la Evaluación y Botón Final
        const btnFinalizarAct5 = document.getElementById('btn-finalizar-act5-m5');
        const seccionEvaluacion = document.getElementById('seccion-evaluacion-m5');
        const selectsEval = document.querySelectorAll('.eval-final-m5');

        let m5DialValue = inputDial.value !== '' ? parseInt(inputDial.value) : -1;

        // 1. Restaurar posición de la aguja si ya había un valor guardado
        if (m5DialValue !== -1) {
            let savedAngle = 0;
            if (m5DialValue >= 5) {
                // Lado derecho (Acercamiento)
                savedAngle = (10 - m5DialValue) * 18;
            } else {
                // Lado izquierdo (Evitación)
                savedAngle = 180 + (m5DialValue * 18);
            }
            needle.style.transform = `translateX(-50%) rotate(${savedAngle}deg)`;
            generarFeedback(m5DialValue);
        }

        // 2. Interacción con la Brújula (Dial)
        if (dialArea && !dialArea.classList.contains('disabled')) {
            dialArea.addEventListener('click', (e) => {
                const rect = dialArea.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;

                let angle = Math.atan2(e.clientY - centerY, e.clientX - centerX) * (180 / Math.PI) + 90;
                if (angle < 0) angle += 360;

                needle.style.transform = `translateX(-50%) rotate(${angle}deg)`;

                // Mapear a escala 0-10
                let score = (angle <= 180) ? (10 - (angle / 18)) : ((angle - 180) / 18);
                m5DialValue = Math.round(score);
                inputDial.value = m5DialValue;

                if (m5DialValue <= 3) {
                    msgDial.innerText = `Nivel ${m5DialValue}: "Estoy luchando intensamente contra mi malestar."`;
                    msgDial.style.color = "#d9534f";
                } else if (m5DialValue <= 6) {
                    msgDial.innerText = `Nivel ${m5DialValue}: "Estoy considerando hacer espacio al malestar para avanzar poco a poco."`;
                    msgDial.style.color = "#003b70";
                } else {
                    msgDial.innerText = `Nivel ${m5DialValue}: "Estoy dispuesto a avanzar, aunque las sensaciones no cambien."`;
                    msgDial.style.color = "#28a745";
                }

                validarJuego();
            });
        }

        // 3. Regla: Máximo 2 opciones por categoría de barrera
        chkBarreras.forEach(cb => {
            cb.addEventListener('change', () => {
                const grupo = cb.getAttribute('data-grupo');
                const marcados = document.querySelectorAll(`.chk-barrera[data-grupo="${grupo}"]:checked`);

                if (marcados.length > 2) {
                    cb.checked = false;
                    alert("Por favor, selecciona un máximo de 2 opciones por categoría.");
                }
                validarJuego();
            });
        });

        // Eventos para Selects del Paso 1
        if (selValor) selValor.addEventListener('change', validarJuego);
        if (selAccion) selAccion.addEventListener('change', validarJuego);

        // 4. Validación para habilitar el botón "Finalizar juego"
        function validarJuego() {
            if (!btnJuego) return;
            const tieneValor = selValor && selValor.value !== "";
            const tieneAccion = selAccion && selAccion.value !== "";
            const tieneDial = m5DialValue !== -1;

            if (tieneValor && tieneAccion && tieneDial) {
                btnJuego.disabled = false;
                btnJuego.classList.add("activo");
                if (msgAdvertenciaJuego) msgAdvertenciaJuego.style.display = "none";
            } else {
                btnJuego.disabled = true;
                btnJuego.classList.remove("activo");
                if (msgAdvertenciaJuego) msgAdvertenciaJuego.style.display = "block";
            }
        }

        // 5. Procesar clic en "Finalizar juego"
        if (btnJuego) {
            btnJuego.addEventListener('click', () => {
                document.getElementById('game-results-m5').style.display = 'block';
                seccionEvaluacion.style.display = 'block';
                btnFinalizarAct5.style.display = 'inline-block';

                generarFeedback(m5DialValue);

                // Desplazar la vista suavemente hacia los resultados
                document.getElementById('game-results-m5').scrollIntoView({
                    behavior: 'smooth'
                });

                // Ocultar este botón porque ya desbloqueó lo que sigue
                btnJuego.style.display = 'none';
            });
        }

        function generarFeedback(valor) {
            const fbBox = document.getElementById('feedback-final-m5');
            if (!fbBox) return;

            if (valor >= 7) {
                fbBox.innerHTML = "<p style=' font-weight: 800; color: #12307D; margin-bottom: 1rem;'>A. Movimiento de Acercamiento</p><p style=' color: #333;'>Estás eligiendo avanzar hacia lo que importa, incluso con el malestar presente. Este es un movimiento valioso hacia tu vida elegida.</p>";
            } else if (valor >= 4) {
                fbBox.innerHTML = "<p style=' font-weight: 800; color: #12307D; margin-bottom: 1rem;'>B. Eficacia en Marcha</p><p style=' color: #333;'>Has dado un paso importante. Aunque haya dudas o síntomas, estás construyendo flexibilidad y acercándote a tus valores.</p>";
            } else {
                fbBox.innerHTML = "<p style=' font-weight: 800; color: #12307D; margin-bottom: 1rem;'>C. Movimiento de Evitación</p><p style=' color: #333;'>Parece que hoy el malestar está ocupando mucho espacio. Esto no es un fracaso. Observa con amabilidad lo que está presente y vuelve a intentarlo cuando te sientas listo.</p>";
            }
        }

        // 6. Validación de Evaluación para el Botón de Guardado Final
        function validarEvaluacion() {
            if (!btnFinalizarAct5) return;
            const todosSelects = Array.from(selectsEval).every(sel => sel.value !== "");

            if (todosSelects) {
                btnFinalizarAct5.disabled = false;
                btnFinalizarAct5.classList.add("activo");
            } else {
                btnFinalizarAct5.disabled = true;
                btnFinalizarAct5.classList.remove("activo");
            }
        }

        selectsEval.forEach(sel => sel.addEventListener('change', validarEvaluacion));

        validarJuego();
        validarEvaluacion();
    });
</script>