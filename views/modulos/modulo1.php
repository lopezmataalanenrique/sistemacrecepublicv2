<?php
$actual = (int)$progreso->actividad_actual;

function getEstado($id, $actual)
{
    return [
        'visible' => ($id <= $actual) ? 'display: block;' : 'display: none;',
        'completada' => ($id < $actual)
    ];
}
?>

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
            Módulo 1. Reconociendo el terreno
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

<main class="cuerpo-modulo">
    <section class="encabezado-modulo">
        <h1>Módulo 1. Explorando el terreno</h1>
        <p>¡Hola! qué gusto darte la bienvenida al Programa CRECE</p>
        <p>Dentro de este primer módulo encontrarás un espacio que te invita a mirar desde otro ángulo y con curiosidad. Así es, CRECE no busca decirte que cambies tus ideas, sentimientos o aquello que piensas sobre ti o tu salud.</p>
        <p>En este espacio realizaremos diferentes actividades que conforman una invitación a observar cómo te has relacionado hasta ahora con situaciones que aparecen en tu vida y qué efecto ha tenido en tu vida diaria, en tu bienestar.</p>
        <p>A lo largo de la vida hemos aprendido diferentes estrategias para afrontar situaciones difíciles, lo que nos incomoda o duele. Algunas nos funcionaron en ese momento y luego con el tiempo dejaron de hacerlo, aunque seguimos repitiéndolas.</p>
        <p>Explorar no significa juzgar ni cambiar nada. Solo observar con curiosidad, apertura y amabilidad, dónde estás y cómo has llegado hasta aquí.</p>
    </section>

    <!-- ACTIVIDAD 1 -->
    <?php $st1 = getEstado(1, $actual); ?>
    <section class="actividad" id="act1" style="<?php echo $st1['visible']; ?>">

        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto texto-justificado">
            <h2 class="act-titulo">Actividad 1. Comprendiendo mi experiencia</h2>
            <p>¡Hola! es un gusto acompañarte en esta primera actividad</p>
            <p>Mantener el equilibrio en la vida diaria puede ser un reto, especialmente cuando enfrentamos situaciones demandantes o difíciles, como las relacionadas con la salud. Este espacio está dedicado a explorar cómo funciona la mente y cómo se integran tus sensaciones, pensamientos y emociones en la experiencia diaria y cómo respondemos ante ello.</p>
            <p>Vamos paso a paso, comencemos explorando cómo percibimos el mundo y a nosotros mismos.</p>
            <p>Nuestra experiencia del mundo y de nosotros mismos es más rica de lo que creemos. No solo percibimos a través de los cinco sentidos básicos, sino que nuestra mente integra constantemente sensaciones, pensamientos y emociones. Para profundizar en el tema observa el siguiente video:</p>
        </div>

        <div class="video-container">
            <video controls>
                <source src="/build/video/Video_B1_Más_allá_de_los_5_sentidos.mp4" type="video/mp4">
                Tu navegador no soporta el video.
            </video>
        </div>

        <div class="actividad-seccion-texto texto-justificado">
            <p>Antes de continuar, es importante que sepas que no necesitas entenderlo todo a la perfección, lo importante ahora es observar.</p>
            <p>Tómate unos instantes para notar cómo estás ahora mismo.</p>
            <p>En este momento, ¿qué sensaciones notas en tu cuerpo?</p>
            <p>¿Hay algún pensamiento presente mientras respondes?</p>
            <p>Antes de finalizar la actividad del día de hoy, te propongo un experimento, durante el día, elige un momento en el que notes una emoción clara (por ejemplo, sorpresa, alegría, frustración, tristeza), la que tú elijas.</p>
            <p>Haz una breve pausa y responde:</p>
        </div>

        <div class="m1-experimento-seccion">
            <p class="m1-experimento-titulo">Experimento emocional:</p>

            <div class="m1-experimento-lista">
                <label class="m1-check-contenedor">
                    <input type="checkbox" class="m1-check-input check-validar" <?php echo $st1['completada'] ? 'checked disabled' : ''; ?>>
                    <span class="m1-check-custom"></span>
                    <span class="m1-check-texto">¿Qué está ocurriendo en mi cuerpo a partir de esta emoción?</span>
                </label>

                <label class="m1-check-contenedor">
                    <input type="checkbox" class="m1-check-input check-validar" <?php echo $st1['completada'] ? 'checked disabled' : ''; ?>>
                    <span class="m1-check-custom"></span>
                    <span class="m1-check-texto">¿Mi mente está construyendo alguna historia sobre esto?</span>
                </label>

                <label class="m1-check-contenedor">
                    <input type="checkbox" class="m1-check-input check-validar" <?php echo $st1['completada'] ? 'checked disabled' : ''; ?>>
                    <span class="m1-check-custom"></span>
                    <span class="m1-check-texto">¿En qué comportamientos se traduce esto que siento?</span>
                </label>
            </div>
            <p class="texto-justificado">Recuerda no juzgar tu experiencia, ni intentes cambiar nada, solo observa cómo tu mente y tu cuerpo interactúan.</p>
        </div>

        <form class="formulario-guardar-actividad" method="POST" action="/guardar-actividad">

            <input type="hidden" name="id_modulo" value="1">
            <input type="hidden" name="actividad_id" value="1">

            <?php if ($st1['completada']): ?>
                <button type="button" class="boton boton-completado" disabled>
                    <i class="fas fa-check"></i> Completado
                </button>
            <?php else: ?>
                <button type="submit" id="btn-finalizar-act1" class="boton boton-por-guardar">
                    Guardar y finalizar Actividad 1
                </button>
            <?php endif; ?>
        </form>
    </section>

    <!-- ACTIVIDAD 2 -->
    <?php $st2 = getEstado(2, $actual); ?>
    <section class="actividad" id="act2" style="<?php echo $st2['visible']; ?>">

        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto texto-justificado">
            <h2 class="act-titulo">Actividad 2. Salud integral</h2>
            <p>¡Qué alegría volvernos a encontrar!</p>
            <p>En la actividad anterior hablamos de nuestra capacidad de integrar nuestras experiencias a partir de las señales que percibimos del mundo exterior e interior. En la construcción de nuestras experiencias influyen las interpretaciones que hacemos al integrar la información, que se expresan en emociones, sensaciones físicas, pensamientos, impulsos, fantasías o memorias.</p>
            <p>Todo esto a través de un proceso dinámico, continuo y automático, en donde mente y cuerpo interactúan juntos.</p>
            <p>Por lo tanto no tenemos control sobre todo lo que se produce en la mente, pero sí podemos aprender a elegir qué hacer con esos productos. A lo largo del recorrido en CRECE lo irás identificando.</p>
            <p>Para esto, observar lo que produce la mente, sin intentar cambiarlo, sin juzgarlo es una base y dejarnos llevar por ellos es un paso importante. Veamos cómo podemos hacerlo, escuchando el siguiente audio.</p>
        </div>

        <div class="m1-audio-contenedor">
            <p class="audio-titulo">Metáfora del Cielo y las Nubes</p>
            <audio controls style="width: 100%;">
                <source src="/build/audio/Audio_B1_Metáfora_del_Cielo_y_las_Nubes.mp3" type="audio/mpeg">
                Tu navegador no soporta el elemento de audio.
            </audio>
        </div>

        <div class="actividad-seccion-texto texto-justificado">
            <p>Observar tu experiencia como si fuera el cielo y las nubes puede ayudarte a colocarte en una posición diferente, con amplitud y en un espacio de pausa.</p>
            <p>En este punto quizá te preguntes, ¿qué pasa cuando lo que aparece son malestares físicos o emocionales persistentes o intensos</p>
            <p>A continuación exploraremos cómo interactúan los diferentes componentes de la salud, cuando enfrentamos malestares crónicos o intensos.</p>
        </div>


        <div class="video-container">
            <video controls>
                <source src="/build/video/Video_B2_Salud_Intregral_Metáfora_del_Taburete.mp4" type="video/mp4">
                Tu navegador no soporta el video.
            </video>
        </div>

        <div class="actividad-seccion-texto texto-justificado">
            <p>Hasta ahora, has visto que nada ocurre de forma aislada. Emociones, pensamientos, creencias, sensaciones van apareciendo y son cambiantes.</p>
            <p>Nuestra salud con sus componentes biológicos, psicológicos, sociales y las conductas que elegimos a cada momento.</p>
        </div>

        <div class="m1-experimento-seccion">
            <p class="m1-experimento-titulo">Pausa de reflexión:</p>
            <p class="texto-justificado" style="margin-bottom: 3rem;">Por eso te invito a que durante el día hagas una pausa y reflexiones con estas preguntas:</p>
            <p class="texto-justificado">Si mi salud fuera un taburete, ¿qué parte se está moviendo más en este momento?
                ¿puedo nombrar qué “nubes” están apareciendo al pensar en mi salud?</p>
            <label style="margin-top: 4rem;" class="m1-check-contenedor">
                <input type="checkbox" class="m1-check-input check-validar-act2" <?php echo $st2['completada'] ? 'checked disabled' : ''; ?>>
                <span class="m1-check-custom"></span>
                <span class="m1-check-texto">He realizado la pausa y reflexionado sobre mi salud.</span>
            </label>
        </div>

        <form method="POST" action="/guardar-actividad" class="formulario-guardar-actividad">

            <input type="hidden" name="id_modulo" value="1">
            <input type="hidden" name="actividad_id" value="2">

            <?php if ($st2['completada']): ?>
                <button type="button" class="boton boton-completado" disabled>
                    <i class="fas fa-check"></i> Completado
                </button>
            <?php else: ?>
                <button type="submit" id="btn-finalizar-act2" class="boton boton-por-guardar">
                    Guardar y finalizar Actividad 2
                </button>
            <?php endif; ?>
        </form>
    </section>

    <!-- ACTIVIDAD 3 -->
    <?php $st3 = getEstado(3, $actual); ?>
    <section class="actividad" id="act3" style="<?php echo $st3['visible']; ?>">

        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto texto-justificado">
            <h2 class="act-titulo">Actividad 3. Los lentes con los que miro</h2>
            <p>Hola, me alegra verte en esta nueva actividad. En la primera actividad observaste cómo a partir de la información de nuestros sentidos, lo que nos sucede se integra en nuestra mente y adquiere significado, es decir, lo que vivimos, lo interpretamos.</p>
            <p>Cuando aparece algún malestar, como fatiga, dolor físico o emociones abrumadoras, no solo aparece la sensación en el cuerpo, también aparecen ideas, reglas aprendidas y expectativas. Se activan rápidamente las interpretaciones que funcionan como unos “lentes" que influyen en cómo se vive esa experiencia.</p>
            <p>Los exploraremos a lo largo de esta actividad. Para ello, primero piensa en una molestia reciente, puede ser física, fatiga, un momento de frustración, tristeza, enojo o ansiedad. No el momento más intenso, solo uno cotidiano. El que llegue a tu mente, está bien.</p>
        </div>

        <form method="POST" action="/guardar-actividad">

            <input type="hidden" name="id_modulo" value="1">
            <input type="hidden" name="actividad_id" value="3">

            <div class="m1-experimento-seccion">
                <p style=" margin-bottom: 1rem; ">Ahora responde lo que más se acerque a tu experiencia. No se trata de calificar nada, solo de mirar con honestidad y curiosidad.</p>
                <p>Cuando apareció esa molestia, ¿qué pensamiento surgió primero?</p>

                <div class="opciones-lentes">
                    <?php
                    $opciones_lentes = [
                        'A' => 'No debería sentirme así. Tengo que poder con esto. Debo seguir como siempre. Si otros pueden, yo debo poder. No puedo permitirme estar mal.',
                        'B' => '¿Esto significa que algo empeoró?. ¿Y si ya no puedo hacer lo que antes hacía?. ¿Y si no se me quita?. ¿Y si significa algo grave?.',
                        'C' => 'Algo debe estar mal conmigo. Siempre me pasa lo mismo. Me pasa por ser débil. Esto demuestra que no puedo.',
                        'D' => '¿Qué hice mal?. No debería estar así. ¿Por qué me pasó esto?. Ahora no podré dejar de darle vueltas.',
                        'E' => 'Tengo que encontrar la forma de quitarlo. Lo mejor es ignorarlo. Necesito distraerme. Tal vez si ajusto mi medicamento. Mejor me quedo en casa. ¿Qué puedo hacer para olvidarlo?',
                        'F' => 'Esto arruina todo. Ya nunca podré estar bien.  Mi vida ya nunca será igual. Siempre estoy sufriendo.',
                        'G' => 'No lo recuerdo.'
                    ];
                    $valor_guardado = $respuestas['131'] ?? '';

                    foreach ($opciones_lentes as $key => $texto):
                        $es_la_elegida = ($valor_guardado === $key);
                    ?>
                        <label class="m1-check-contenedor <?php echo $es_la_elegida ? 'm1-opcion-seleccionada' : ''; ?>">
                            <input type="radio" name="131" value="<?php echo $key; ?>"
                                class="m1-check-input radio-lente"
                                <?php echo $es_la_elegida ? 'checked' : ''; ?>
                                <?php echo $st3['completada'] ? 'disabled' : ''; ?>>

                            <span class="m1-check-custom" style="border-radius: 50%;"></span>
                            <span class="m1-check-texto" style="<?php echo $es_la_elegida ? 'font-weight: bold; color: #12307D;' : ''; ?>">
                                <?php echo $texto; ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div id="m1-retro-lentes" class="retro-lentes">
                </div>
            </div>

            <p class="texto-justificado">Reflexiona un momento, para que notes si hay algún patrón de respuesta, es decir, ¿cuál de estos lentes te colocas con mayor frecuencia para mirar tus experiencias?</p>

            <div class="m1-frase-contenedor act1-frase" style="height: auto; padding: 4rem; flex-direction: column; align-items: flex-start;">
                <ol class="m1-lista">
                    <li>Expectativas o exigencias.</li>
                    <li>Anticipación o preocupación.</li>
                    <li>Sobreidentificación de los pensamientos.</li>
                    <li>Pensamientos repetitivos. </li>
                    <li>Evitación.</li>
                    <li>Generalizaciones o conclusiones amplias.</li>
                </ol>
            </div>

            <p class="texto-justificado">Es importante que sepas que lo que hace tu mente cuando aparece el malestar, está relacionado con la historia de nuestra vida, con lo que hemos aprendido de nuestra familia, nuestra cultura y entorno. ¿Reconoces algunas reglas?</p>

            <div class="m1-frase-contenedor act1-frase" style="height: auto; padding: 4rem; flex-direction: column; align-items: flex-start;">
                <ul class="texto-justificado" style="color: #555;">
                    <li>En mi familia uno se aguanta sin quejarse.</li>
                    <li>Las emociones son de personas débiles.</li>
                    <li>Aprendí que los problemas de salud deben eliminarse y no entorpecer tu productividad.</li>
                    <li>Escuché muchas veces que si algo duele, es que está muy mal.</li>
                    <li>Crecí siendo fuerte y permitirme sentir mal me hace vulnerable.</li>
                    <li>Aprendí a ocultar lo que siento para no preocupar a otros.</li>
                    <li>Es vergonzoso que otros sepan de tus males.</li>
                    <li>Escuché muchas veces que una persona enferma es una carga.</li>
                </ul>
            </div>

            <div class="act3-reglas">
                <div class="act3-reglas-1">
                    <img src="/build/img/m2a1_img3.webp" class="img-ebook" alt="Reflexión 3">
                </div>
                <div>
                    <p class="texto-justificado">En general, estas reglas intentan protegernos y ofrecernos una solución que funciona bien para el mundo externo, si aparece una fuga, la tapo; si no lo uso, no se desgasta; si lo cubro, no se ve.</p>
                </div>
            </div>

            <p class="texto-justificado">
                Cuando añadimos unos lentes –creencias personales, expectativas, exigencias del entorno– a una sensación física, toda la experiencia resultante puede verse muy distinta. En el siguiente video lo podrás observar con detalle.
            </p>

            <div class="video-container">
                <video controls>
                    <source src="/build/video/Video_B3_Los_lentes_con_los_que_miro.mp4" type="video/mp4">
                    Tu navegador no soporta el video.
                </video>
            </div>

            <div class="actividad-seccion-texto texto-justificado">
                <p>En este recorrido de hoy has podido notar que los pensamientos, las reglas o expectativas que aparecen frente a un malestar no estan ahí porque estés haciendo algo mal o algo funcione mal en ti.</p>
                <p>Aparecen porque en algún momento funcionaron para ayudarte a sobrevivir, resolver o protegerte. Se convierten en problemáticos cuando son automáticas, prolongadas y limitan nuestras acciones de autocuidado y bienestar.</p>
                <p>A lo largo del programa CRECE profundizaras más sobre cómo observar las experiencias y cómo dirigirte a una vida valiosa y plena, aún cuando aparezcan malestares físicos.</p>
            </div>

            <div class="m1-experimento-seccion" style="background: #fdfdfd; padding: 4rem; border: 0.2rem solid #e0e0e0; border-radius: 1.5rem; margin-top: 4rem;">
                <p style="font-weight: 700; color: #12307D;">Ahora, te propongo un experimento para lo que resta de tu día. Cuando aparezca una molestia física o emocional, observa si se activa algún lente primero.</p>

                <div class="m1-frase-contenedor act1-frase" style="height: auto; padding: 4rem; flex-direction: column; align-items: flex-start;">
                    <ul style="color: #555; line-height: 2;">
                        <li class="texto-justificado">¿Una idea sobre mí?</li>
                        <li class="texto-justificado">¿Alguna expectativa aprendida?</li>
                        <li class="texto-justificado">Una idea sobre alejarte del malestar?</li>
                    </ul>
                </div>

                <p class="texto-justificado">No intentes cambiar nada. Solo nota qué lente aparece. Nos vemos pronto.</p>

                <label class="m1-check-contenedor" style="margin-top: 3rem;">
                    <input type="checkbox" class="m1-check-input check-validar-act3" <?php echo $st3['completada'] ? 'checked disabled' : ''; ?>>
                    <span class="m1-check-custom"></span>
                    <span class="m1-check-texto">He comprendido cómo funcionan mis "lentes" mentales.</span>
                </label>
            </div>

            <div style="margin-top: 4rem;">
                <?php if ($st3['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>Completado</button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act3" class="boton boton-por-guardar">Guardar y finalizar Actividad 3</button>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <!-- ACTIVIDAD 4 -->
    <?php $st4 = getEstado(4, $actual); ?>
    <section class="actividad" id="act4" style="<?php echo $st4['visible']; ?>">
        <div class="divisor-modulo"></div>
        <h2 class="act-titulo" style="color: #12307D; margin-bottom: 3rem;">Actividad 4. El mapa del terreno</h2>

        <form method="POST" action="/guardar-actividad">
            <input type="hidden" name="id_modulo" value="1">
            <input type="hidden" name="actividad_id" value="4">

            <div class="actividad-seccion-texto">
                <p>Selecciona cómo te encuentras hoy en cada una de las siguientes dimensiones. El 10 representa el punto más alto donde te sientes vibrante.</p>
                <p>Te doy la bienvenida invitándote a realizar una exploración personal.</p>
                <p>Durante las actividades que has realizado en este módulo, has escuchado sobre acciones valiosas y sobre dirigir tus pasos hacia una vida plena y con bienestar. Y, como en cualquier recorrido, para avanzar primero necesitas reconocer en dónde te encuentras ahora.</p>
                <p>Para ello, te invito a hacer una pausa para observar tu presente.</p>
                <p>Selecciona cómo te encuentras hoy en cada una de las siguientes dimensiones, el 10 representa el punto más alto donde sientes que esa área se encuentra bien nutrida y te hace sentir vibrante en este momento de tu vida.</p>
            </div>

            <div class="m1-dimensiones-contenedor" style="margin-top: 4rem;">
                <?php
                $dimensiones = [
                    '141' => 'Dimensión Física',
                    '142' => 'Dimensión Emocional',
                    '143' => 'Dimensión Mental',
                    '144' => 'Dimensión Creativa',
                    '145' => 'Dimensión Espiritual',
                    '146' => 'Dimensión Social'
                ];
                foreach ($dimensiones as $id => $nombre):
                    $valor = $respuestas[$id] ?? 5;
                ?>
                    <div class="m1-escala-grupo" style="margin-bottom: 5rem;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;"><?php echo $nombre; ?></p>
                            <span id="valor-<?php echo $id; ?>" style="color: #12307D;"><?php echo $valor; ?></span>
                        </div>
                        <input type="range" name="<?php echo $id; ?>" min="1" max="10" step="1"
                            value="<?php echo $valor; ?>"
                            class="m1-slider check-validar-act4"
                            oninput="document.getElementById('valor-<?php echo $id; ?>').innerText = this.value"
                            <?php echo $st4['completada'] ? 'disabled' : ''; ?>
                            style="width: 100%; cursor: pointer;">
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="actividad-seccion-texto">
                <p>Muy bien, antes de continuar, tómate unos momentos para observar tu mapa completo.</p>
                <p>Solo observa, sin evaluar si está bien o mal, simplemente mira dónde estás hoy, con amabilidad y apertura.</p>
                <p>Ahora, te propongo unas preguntas de reflexión:</p>
            </div>

            <div class="m1-experimento-seccion" style="background: #fdfdfd; padding: 4rem; border: 0.2rem solid #e0e0e0; border-radius: 1.5rem; margin-top: 6rem;">

                <div style="margin-bottom: 4rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">¿Qué notas al mirar tu mapa?</p>
                    <select name="147" class="m1-select-personalizado check-validar-act4" style="width: 100%; padding: 1.5rem; border-radius: 1rem;" <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                        <option value="">-- Selecciona una opción --</option>
                        <?php foreach (['Me siento equilibrado', 'Algunas áreas están bien y otras necesitan atención', 'La mayoría de las áreas se sienten desgastadas', 'Me doy cuenta que me siento con poco bienestar'] as $opt): ?>
                            <option value="<?php echo $opt; ?>" <?php echo ($respuestas['147'] ?? '') === $opt ? 'selected' : ''; ?>><?php echo $opt; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div style="margin-bottom: 4rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">¿Qué dimensión consideras que requiere de atención?</p>
                    <select name="148" class="m1-select-personalizado check-validar-act4" style="width: 100%; padding: 1.5rem; border-radius: 1rem;" <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                        <option value="">-- Selecciona una opción --</option>
                        <?php foreach (['Física', 'Emocional', 'Mental', 'Creativa', 'Espiritual', 'Social', 'Todas', 'Ninguna'] as $opt): ?>
                            <option value="<?php echo $opt; ?>" <?php echo ($respuestas['148'] ?? '') === $opt ? 'selected' : ''; ?>><?php echo $opt; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div style="margin-bottom: 4rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">¿Notas si esas áreas bajas están influidas por tu situación de salud?</p>
                    <select name="149" class="m1-select-personalizado check-validar-act4" style="width: 100%; padding: 1.5rem; border-radius: 1rem;" <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                        <option value="">-- Selecciona una opción --</option>
                        <?php foreach (['Totalmente', 'Algo', 'Poco', 'No tiene relación'] as $opt): ?>
                            <option value="<?php echo $opt; ?>" <?php echo ($respuestas['149'] ?? '') === $opt ? 'selected' : ''; ?>><?php echo $opt; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">Si pudieras dar un pequeño paso para nutrir una dimensión, ¿cuál elegirías?</p>
                    <select name="150" class="m1-select-personalizado check-validar-act4" style="width: 100%; padding: 1.5rem; border-radius: 1rem;" <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                        <option value="">-- Selecciona una opción --</option>
                        <?php foreach (['Física', 'Emocional', 'Mental', 'Creativa', 'Espiritual', 'Social', 'No lo tengo claro'] as $opt): ?>
                            <option value="<?php echo $opt; ?>" <?php echo ($respuestas['150'] ?? '') === $opt ? 'selected' : ''; ?>><?php echo $opt; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p>Al concluir esta actividad, has dado un paso fundamental: mirar tu realidad con apertura y reconocer que tu salud es un sistema integrado y dinámico. Has podido observar que algunas áreas presentan mayores desafíos o "barreras", y aún así conservas la posibilidad de elegir cómo relacionarte con ellas y qué acciones tomar hoy.</p>
                <p>Recuerda que avanzar no se define por eliminar el malestar, sino por dar pasos valiosos hacia lo que es importante para ti, incluso cuando las dificultades están presentes.</p>
            </div>

            <div style="margin-top: 4rem;">
                <?php if ($st4['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>Completado</button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act4" class="boton boton-por-guardar">Guardar y finalizar Actividad 4</button>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <!-- ACTIVIDAD 5 -->
    <?php $st5 = getEstado(5, $actual); ?>
    <section class="actividad" id="act5" style="<?php echo $st5['visible']; ?>">

        <div class="divisor-modulo"></div>

        <h2 class="act-titulo">Actividad 5. Momento Presente</h2>

        <div class="actividad-seccion-texto">
            <p>Hasta ahora, has dado pasos importantes para comprender tu experiencia de salud y comenzar a preguntarte cómo construir una vida significativa, incluso cuando la salud no sea siempre óptima o aparezcan otras dificultades. A lo largo del recorrido en CRECE iremos profundizando en ello.</p>
            <p>En el camino, es natural que tu mente busque regresar a la lucha y surja duda, cansancio o desesperanza. Cuando eso ocurra, recuerda que no significa que estés haciendo algo mal. Sé paciente y amable contigo.</p>
            <p>Una habilidad esencial en este proceso, es aprender a notar lo que ocurre en tu mente y en tu cuerpo, momento a momento. A esto lo conocemos como atención plena, conciencia plena o mindfulness.</p>
            <p>Al entrenar tu atención, podrás reconocer pensamientos, emociones, sensaciones físicas, de manera consciente y sin tener que luchar con ellas. Además, te permite situarte en el momento presente, es decir, aquí y ahora.</p>
            <p>Estas pausas de presencia, ayudan que tu sistema nervioso se regule, actuando en tu mente y en tu cuerpo, y desde una actitud de calma, se vuelve más sencillo elegir las acciones alineadas con lo que realmente es importante para ti.</p>
            <p>Es importante que sepas, que no son prácticas de relajación, aunque alguna vez ese sea un resultado. El propósito es entrenar a tu mente a que intencionalmente dirija y sostenga la atención, a estar consciente de lo que ocurre en el momento y en el presente, a hacerlo sin juicio.</p>
            <p>Puede parecer una gran tarea, y si bien necesita ser practicada con constancia y paciencia, requiere menos tiempo del que piensas.</p>
            <p>El siguiente audio te presenta una práctica guiada.</p>
        </div>

        <div class="m1-audio-contenedor">
            <p class="audio-titulo">Práctica de MP 5 Sentidos</p>
            <audio controls style="width: 100%;">
                <source src="/build/audio/Audio_B2_Práctica_de_Momento_Presente.mp3" type="audio/mpeg">
                Tu navegador no soporta el audio.
            </audio>
        </div>

        <form method="POST" action="/guardar-actividad">
            <input type="hidden" name="id_modulo" value="1">
            <input type="hidden" name="actividad_id" value="5">

            <div class="m1-experimento-seccion">
                <p class="m1-experimento-titulo">Para cerrar esta práctica, describe tu experiencia:</p>

                <div style="margin-bottom: 3rem;">
                    <p style=" margin-bottom: 1rem;">1. Durante el ejercicio logré llevar mi atención a mis sentidos:</p>
                    <select name="151" class="m1-select-personalizado check-validar-act5" style="width: 100%; padding: 1.2rem;" <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                        <option value="">-- Selecciona --</option>
                        <?php foreach (['Si, con facilidad', 'En algunos momentos', 'Me esforcé por mantenerla'] as $o): ?>
                            <option value="<?php echo $o; ?>" <?php echo ($respuestas['151'] ?? '') === $o ? 'selected' : ''; ?>><?php echo $o; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div style="margin-bottom: 3rem;">
                    <p style=" margin-bottom: 1rem;">2. Al final del ejercicio pude notar mi respiración y mi cuerpo como un todo:</p>
                    <select name="152" class="m1-select-personalizado check-validar-act5" style="width: 100%; padding: 1.2rem;" <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                        <option value="">-- Selecciona --</option>
                        <?php foreach (['Sí, con claridad', 'Un poco', 'No lo noté'] as $o): ?>
                            <option value="<?php echo $o; ?>" <?php echo ($respuestas['152'] ?? '') === $o ? 'selected' : ''; ?>><?php echo $o; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div style="margin-bottom: 3rem;">
                    <p style=" margin-bottom: 1rem;">3. Después de la práctica noto que me siento:</p>
                    <select name="153" class="m1-select-personalizado check-validar-act5" style="width: 100%; padding: 1.2rem;" <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                        <option value="">-- Selecciona --</option>
                        <?php foreach (['Con calma y en el presente', 'Similar a como estaba', 'Con más inquietud que antes'] as $o): ?>
                            <option value="<?php echo $o; ?>" <?php echo ($respuestas['153'] ?? '') === $o ? 'selected' : ''; ?>><?php echo $o; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p>No importa si tu mente se distrajo. Cada vez que regresas al presente, estás entrenando una habilidad que regula tu cuerpo y tu mente.</p>
                <p>El experimento que te propongo es realizar esta práctica diariamente, procurando observar, con paciencia y sin juicio tu experiencia al realizarlo.</p>
            </div>

            <div class="m1-evaluacion-final" style="background: #eef2f7; padding: 4rem; border-radius: 1.5rem; border: 0.2rem dashed #12307D;">
                <h3 class="act-titulo" style="color: #12307D; margin-bottom: 2rem;">¡Felicidades, has concluido el módulo 1!</h3>
                <p style="margin-bottom: 3rem;">Conocer cómo ha sido tu experiencia es importante, marca la opción que mejor la refleja:</p>

                <?php
                $evaluacion = [
                    '154' => '1. El módulo fue claro y fácil de seguir',
                    '155' => '2. Lo trabajado en el módulo me resulta útil para mi calidad de vida',
                    '156' => '3. Considero que puedo aplicar lo trabajado en mi vida diaria'
                ];
                foreach ($evaluacion as $id => $pregunta): ?>
                    <div style="margin-bottom: 3rem;">
                        <p style="font-weight: 700;"><?php echo $pregunta; ?></p>
                        <select name="<?php echo $id; ?>" class="m1-select-personalizado check-validar-act5" style="width: 100%; padding: 1rem;" <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                            <option value="">-- Selecciona --</option>
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
                        ✨ ¡Concluiste con el Módulo 1! ✨
                    </div>
                    <button type="button" class="boton boton-completado" disabled>Módulo Completado</button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act5" class="boton boton-por-guardar">Guardar y finalizar Actividad 5</button>
                <?php endif; ?>
            </div>
        </form>
    </section>
</main>

<footer class="main-footer footer-pm">
    <div class="footer-content contenedor">

        <div class="logo-icon-row">

            <div class="developed-by-logos">
                <div class="circle-item"><img src="/build/img/logo-ipn.webp" alt="IPN" class="logo-item"></div>
                <div class="circle-item"><img src="/build/img/logo-escom.webp" alt="ESCOM" class="logo-item"></div>
                <div class="circle-item"><img src="/build/img/logo-unam.webp" alt="UNAM" class="logo-item"></div>
                <div class="circle-item"><img src="/build/img/logo-suayed.webp" alt="FES Iztacala" class="logo-item"></div>
                <div class="circle-item"><img src="/build/img/logo-labpsiit.webp" alt="Labpsiit" class="logo-item"></div>
                <h4 class="footer-title developed">Desarrollado por</h4>
            </div>

            <div class="social-media-group">

                <div class="circle-item social-icon-wrapper"><a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a></div>
                <div class="circle-item social-icon-wrapper"><a href="#" class="social-icon"><i class="fab fa-instagram"></i></a></div>
                <div class="circle-item social-icon-wrapper"><a href="#" class="social-icon"><i class="fab fa-youtube"></i></a></div>
                <h4 class="footer-title social">Nuestras redes sociales</h4>
            </div>
        </div>

        <div class="contact-legal-info">
            <p>¿Tienes dudas?: <a href="mailto:correo@correo.com">correo@correo.com</a></p>
            <p><a href="#">Aviso de privacidad</a></p>
            <p>Domicilio: Av. de los Barrios No. 1, Los Reyes Iztacala, Tlalnepantla de Baz. Méx. 54090</p>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('.check-validar');
        const boton = document.getElementById('btn-finalizar-act1');
        if (inputs.length > 0 && boton) {
            inputs.forEach(input => {
                input.addEventListener('change', function() {
                    const marcados = document.querySelectorAll('.check-validar:checked').length;
                    if (marcados === 3) {
                        boton.classList.add("activo");
                    } else {
                        boton.classList.remove("activo");
                    }
                });
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const checkAct2 = document.querySelector('.check-validar-act2');
        const btnAct2 = document.getElementById('btn-finalizar-act2');

        if (checkAct2 && btnAct2) {
            checkAct2.addEventListener('change', function() {
                if (this.checked) {
                    btnAct2.classList.add("activo");
                } else {
                    btnAct2.classList.remove("activo");
                }
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const retroalimentaciones = {
            'A': '<strong>Expectativas o exigencias.</strong> Muchas personas han aprendido que deben mantenerse fuertes, productivas o en control todo el tiempo. Cuando estas expectativas aparecen, el malestar puede sentirse como una señal de que estamos fallando, en lugar de ser simplemente una experiencia humana que aparece y cambia con el tiempo.',
            'B': '<strong>Anticipación o preocupación.</strong> Los pensamientos que anticipan problemas o riesgos, cuando aparece un malestar, buscan protegernos y prepararnos porque interpretan las señales como una amenaza, aunque no tengamos la suficiente información y no esté sucediendo en el presente.',
            'C': '<strong>Sobreidentificación.</strong> Las emociones, sensaciones y pensamientos son convertidos rápidamente en una historia de quienes somos. Mezclamos el malestar con nuestra identidad o autoconcepto y dejamos de observar la experiencia como momentánea, percibiendo más pesada y difícil de sostener al considerar que nos define.',
            'D': '<strong>Pensamientos repetitivos.</strong> Estos pensamientos, que se repiten una y otra vez, parecen ser intentos de buscar una explicación. Sin embargo consumen mucha energía mental y mantienen tu atención en el mismo malestar, haciendo que permanezca más tiempo e incluso se intensifique.',
            'E': '<strong>Evitación.</strong> Son reacciones con las que intentamos alejarnos rápidamente de la experiencia, buscando distraernos, escapar o evitarlo con el fin de protegernos del malestar y aliviarnos de inmediato, aunque solo a corto plazo. Cuando se vuelven automáticas y prolongadas limitan nuestra vida al seguir regresando el malestar.',
            'F': '<strong>Generalizaciones.</strong> La experiencia se convierte rápidamente en una conclusión amplia que parece una verdad absoluta sobre el presente y la vida futura. Cuando la mente generaliza de esta forma, la sensación inicial se transforma en una experiencia mucho más grande, pesada y difícil de manejar.',
            'G': '<strong>Está bien.</strong> Los pensamientos aparecen tan rápido que apenas los notamos. Te invitamos a realizar el experimento para que desarrolles la habilidad y te conozcas más profundamente.'
        };

        const radios = document.querySelectorAll('input[name="131"]');
        const boxRetro = document.getElementById('m1-retro-lentes');
        const checkFinal = document.querySelector('.check-validar-act3');
        const btnFinal = document.getElementById('btn-finalizar-act3');

        function actualizarInterfaz(valor) {
            if (retroalimentaciones[valor]) {
                boxRetro.innerHTML = retroalimentaciones[valor];
                boxRetro.style.display = 'block';
            }
            validarAct3();
        }

        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                actualizarInterfaz(this.value);
            });
        });

        const seleccionado = document.querySelector('input[name="131"]:checked');
        if (seleccionado) {
            actualizarInterfaz(seleccionado.value);
        }

        if (checkFinal) {
            checkFinal.addEventListener('change', validarAct3);
        }

        function validarAct3() {
            const algunLente = document.querySelector('input[name="131"]:checked');
            const estaCompletada = checkFinal ? (checkFinal.checked || checkFinal.disabled) : false;
            if (algunLente && estaCompletada && btnFinal) {
                btnFinal.classList.add("activo");
            } else {
                btnFinal.classList.remove("activo");
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const seccionAct4 = document.getElementById('act4');
        if (!seccionAct4) return;

        const btnAct4 = seccionAct4.querySelector('#btn-finalizar-act4');
        const selectsAct4 = seccionAct4.querySelectorAll('.m1-select-personalizado');
        const slidersAct4 = seccionAct4.querySelectorAll('.m1-slider');

        function validarAct4() {
            // Validar selects
            const selectsValidos = Array.from(selectsAct4)
                .every(select => select.value !== "");

            // Validar sliders (siempre tienen valor, pero igual lo dejamos)
            const slidersValidos = slidersAct4.length > 0;

            const todoListo = selectsValidos && slidersValidos;

            if (btnAct4) {
                btnAct4.classList.toggle("activo", todoListo);
            }
        }

        selectsAct4.forEach(select => {
            select.addEventListener('change', validarAct4);
        });

        slidersAct4.forEach(slider => {
            slider.addEventListener('input', validarAct4);
        });

        validarAct4();
    });

    document.addEventListener('DOMContentLoaded', function() {
        const btnAct5 = document.getElementById('btn-finalizar-act5');
        const selectsAct5 = document.querySelectorAll('.check-validar-act5');

        function validarAct5() {
            if (!btnAct5) return;
            // Verificamos que los 6 selectores de la Actividad 5 tengan valor
            const todosListos = Array.from(selectsAct5).every(select => select.value !== "");

            if (todosListos) {
                btnAct5.classList.add("activo");
            } else {
                btnAct5.classList.remove("activo");
            }
        }

        selectsAct5.forEach(select => select.addEventListener('change', validarAct5));
        validarAct5(); // Ejecutar al cargar
    });
</script>