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
            Módulo 7. Ampliando mis horizontes
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

$ya_respondio_intro = !empty($respuestas['701']) && !empty($respuestas['702']) && !empty($respuestas['703']);

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
        <h1>Módulo 7. Ampliando mis horizontes</h1>
        <p class="texto-justificado">Hola ¡Qué bueno verte aquí para continuar este recorrido dentro de CRECE!</p>
        <p class="texto-justificado">En este módulo continuaremos explorando los caminos que pueden ayudarte a fortalecer estrategias para relacionarse de forma diferente con el cuerpo, de forma respetuosa, bondadosa y serena.</p>

        <form method="POST" action="/guardar-actividad" id="form-intro-m7">
            <input type="hidden" name="id_modulo" value="7">
            <input type="hidden" name="actividad_id" value="0">

            <div class="m1-evaluacion-final">
                Antes de comenzar, te invito a hacer una pausa y observar cómo han sido estos últimos días en tu proceso con CRECE. En este tiempo:
                </p>

                <?php
                $preguntas_intro = [
                    '701' => '¿Noto algún cambio en cómo me relaciono con mis pensamientos o emociones?',
                    '702' => '¿Noto cambios en mis respuestas o comportamientos habituales?',
                    '703' => '¿Practiqué alguno de los ejercicios y/o experimentos en mi vida diaria?'
                ];

                foreach ($preguntas_intro as $id => $texto):
                    $opciones = ($id === '703') ? ['No lo hice', 'Varias veces', 'Una vez'] : ['Sí, claramente', 'Un poco', 'Aún no lo noto'];
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
            <h2 class="act-titulo">Actividad 1. Un acompañante inesperado</h2>
            <p>En el recorrido de CRECE, has caminado aprendiendo a observar la mente, a hacer espacio, a conectar con el presente y con lo que realmente te importa.</p>
            <p>A menudo, cuando se diagnostica una condición crónica, como diabetes, una enfermedad cardíaca, artritis o cualesquiera, es común que la primera reacción sea rechazarla, querer que desaparezca. Nos resistimos a una realidad que no nos agrada. Así es, hablaremos de esa presencia que no invitaste, pero está ahí.</p>
            <p>Como si en el camino apareciera inesperadamente un acompañante. No lo elegiste, no sabes cuánto tiempo se quedará. A veces camina en silencio, a veces grita, quiere detenerte o cambiar tu rumbo.</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act1-m7">
            <input type="hidden" name="id_modulo" value="7">
            <input type="hidden" name="actividad_id" value="1">

            <div class="m1-experimento-seccion">
                <div class="dos-columnas">
                    <div style="display:flex; align-items:center; justify-content:center;">
                        <img src="/build/img/m7a1_img1.png" class="img-ebook" alt="Acompañante inesperado en el horizonte">
                    </div>
                    <div>
                        <div class="texto-justificado" style="margin-bottom: 2.5rem;">
                            <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Cómo se llama ese acompañante inesperado para ti? ¿Es el diagnóstico, algún síntoma, una emoción o una historia recurrente sobre ti que se repite una y otra vez?</p>
                            <?php $val_704 = $respuestas['704'] ?? ''; ?>
                            <textarea class="m7-textarea" name="704" id="txt-704" rows="3" placeholder="Escribe aquí..." <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_704); ?></textarea>
                            <div id="fb-704" class="feedback-pregunta" style="display: <?php echo !empty($val_704) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                        </div>
                        <div>
                            <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Qué comportamientos tiene? ¿En qué momentos se hace más presente, cuándo es más ruidoso, o demandante?</p>
                            <?php $val_705 = $respuestas['705'] ?? ''; ?>
                            <textarea class="m7-textarea" name="705" id="txt-705" rows="3" placeholder="Escribe aquí..." <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_705); ?></textarea>
                            <div id="fb-705" class="feedback-pregunta" style="display: <?php echo !empty($val_705) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p>Tal vez has discutido con ese acompañante, intentado ignorarlo o despedirlo. Quizás en momentos te ha perseguido o lo has arrastrado como un lastre.</p>
            </div>

            <div class="m1-experimento-seccion">
                <div class="dos-columnas">

                    <div class="texto-justificado">
                        <div style="margin-bottom: 2.5rem;">
                            <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Qué has intentado hacer con este acompañante?</p>
                            <?php $val_706 = $respuestas['706'] ?? ''; ?>
                            <textarea class="m7-textarea" name="706" id="txt-706" rows="3" placeholder="Escribe aquí..." <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_706); ?></textarea>
                            <div id="fb-706" class="feedback-pregunta" style="display: <?php echo !empty($val_706) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                        </div>
                        <div style="margin-bottom: 2.5rem;">
                            <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Cómo te ha hecho sentir viajar con este acompañante? ¿Consideras que has avanzado o te has sentido atrapado?</p>
                            <?php $val_707 = $respuestas['707'] ?? ''; ?>
                            <textarea class="m7-textarea" name="707" id="txt-707" rows="3" placeholder="Escribe aquí..." <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_707); ?></textarea>
                            <div id="fb-707" class="feedback-pregunta" style="display: <?php echo !empty($val_707) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                        </div>
                        <div>
                            <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Qué recursos has invertido en mantener la lucha para que se vaya, en que nadie lo vea o solo preguntándote “por qué a mí”? ¿Energía, sueño, tiempo?</p>
                            <?php $val_708 = $respuestas['708'] ?? ''; ?>
                            <textarea class="m7-textarea" name="708" id="txt-708" rows="3" placeholder="Escribe aquí..." <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_708); ?></textarea>
                            <div id="fb-708" class="feedback-pregunta" style="display: <?php echo !empty($val_708) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; justify-content:center;">
                        <img src="/build/img/m7a1_img2.png" class="img-ebook" alt="Discusión y frustración">
                    </div>
                </div>

            </div>

            <div class="actividad-seccion-texto">
                <p>Mientras discutes con el acompañante, te quejas o huyes de él, has dejado de ver la ruta y el paisaje. El camino sigue ahí, los lugares para visitar, las personas con las que querías encontrarte, las cosas que querías hacer.</p>
            </div>

            <div class="m1-experimento-seccion">
                <div class="dos-columnas">
                    <div style="display:flex; align-items:center; justify-content:center;">
                        <img src="/build/img/m7a1_img3.png" class="img-ebook" alt="El paisaje del camino" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    </div>
                    <div>
                        <div class="texto-justificado">
                            <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Qué destinos se han quedado desatendidos por mantener la lucha? ¿La familia, proyectos, relaciones afectivas?</p>
                            <?php $val_709 = $respuestas['709'] ?? ''; ?>
                            <textarea class="m7-textarea" name="709" id="txt-709" rows="3" placeholder="Escribe aquí..." <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_709); ?></textarea>
                            <div id="fb-709" class="feedback-pregunta" style="display: <?php echo !empty($val_709) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                        </div>
                        <div>
                            <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Ha pasado algún paisaje inadvertido? ¿Momentos recreativos, ajustes a tu estilo de vida, adaptaciones en tu entorno?</p>
                            <?php $val_710 = $respuestas['710'] ?? ''; ?>
                            <textarea class="m7-textarea" name="710" id="txt-710" rows="3" placeholder="Escribe aquí..." <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_710); ?></textarea>
                            <div id="fb-710" class="feedback-pregunta" style="display: <?php echo !empty($val_710) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p>¿Y si no tuvieras que deshacerte de ese acompañante inesperado para seguir tu camino? ¿Podrías aprender a caminar con él ahí, sin que decida el ritmo de tu andar, ni el destino? No se trata de que te guste. Se trata que tú elijas cómo y a dónde encaminarte.</p>
            </div>

            <div class="m1-experimento-seccion">
                <div class="dos-columnas">
                    <div class="texto-justificado">
                        <div>
                            <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Qué significaría que camine junto a ti? Solo reconociendo que existe y está ahí, aunque no sea bienvenido.</p>
                            <?php $val_711 = $respuestas['711'] ?? ''; ?>
                            <textarea name="711" id="txt-711" class="m7-textarea" rows="3" placeholder="Escribe aquí..." <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_711); ?></textarea>
                            <div id="fb-711" class="feedback-pregunta" style="display: <?php echo !empty($val_711) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                        </div>
                        <div>
                            <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">Si pudieras asignar un lugar en tu camino, ¿cuál sería? Por ejemplo: en los momentos de mayor rigidez por la mañana, en los días que me toca tratamiento o revisión, grita al elegir un estilo de vida más saludable.</p>
                            <?php $val_712 = $respuestas['712'] ?? ''; ?>
                            <textarea name="712" id="txt-712" class="m7-textarea" rows="3" placeholder="Escribe aquí..." <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_712); ?></textarea>
                            <div id="fb-712" class="feedback-pregunta" style="display: <?php echo !empty($val_712) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; justify-content:center;">
                        <img src="/build/img/m7a1_img4.png" class="img-ebook" alt="Caminante confiado y acompañante a distancia" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    </div>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p>Al saber que ese acompañante se queda para siempre y aprendas a caminar marcando el ritmo...</p>
            </div>

            <div class="m1-experimento-seccion">
                <div class="dos-columnas">
                    <div style="display:flex; align-items:center; justify-content:center;">
                        <img src="/build/img/m7a1_img5.png" class="img-ebook" alt="Caminante con mapa" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    </div>
                    <div class="texto-justificado">
                        <div>
                            <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Qué acción pequeña podrías hacer para caminar bajo tus condiciones?</p>
                            <?php $val_713 = $respuestas['713'] ?? ''; ?>
                            <textarea name="713" id="txt-713" class="m7-textarea" rows="3" placeholder="Escribe aquí..." <?php echo $st1['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_713); ?></textarea>
                            <div id="fb-713" class="feedback-pregunta" style="display: <?php echo !empty($val_713) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p>Tu vida es más grande que ese acompañante inesperado. Dejar que camine a tu lado, no es rendirte. Es dejar de desgastarte en una pelea sin fin. Así puedes utilizar tu energía en los paisajes y destinos que elijas.</p>

                <div style="background: #eef2f7; border-left: 5px solid #12307D; padding: 3rem; border-radius: 0.8rem; margin: 4rem 0;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">Durante estos días, puedes realizar este pequeño experimento.</p>
                    <ul style="margin-left: 2rem; margin-bottom: 2rem; line-height: 1.8; color: #333;">
                        <li style="margin-bottom: 1rem;"><strong>Elige un paisaje o destino.</strong> Puede ser llamar a una amistad, preparar una comida especial, hacer algo que disfrutabas con tu pareja, dedicar tiempo a estudiar o a algún proyecto personal. La que surja está bien.</li>
                        <li style="margin-bottom: 1rem;"><strong>Identifica el momento.</strong> Elige un día y momento para realizar esa acción con el invitado presente.</li>
                        <li style="margin-bottom: 1rem;"><strong>Cuando llegue el momento que elegiste</strong>, identifica si el acompañante está presente (discurso mental, malestar, preocupación, emoción, etc.) y nómbralo diciendo: "Ahí está la sensación de...", "ahí está la historia de que...", "noto que está la preocupación de...".</li>
                        <li style="margin-bottom: 1rem;"><strong>Actúa comprometidamente.</strong> Recuerda que puedes hacer esto, aunque el acompañante esté ahí. No tienes que esperar a que se vaya. Dirige tu atención a la acción que elegiste.</li>
                        <li style="margin-bottom: 1rem;"><strong>Observa.</strong> Al final del día tómate un momento para reflexionar y notar si hubo alguna diferencia al actuar comprometidamente.</li>
                    </ul>
                </div>

                <p>Aprender a convivir con un acompañante inesperado no es resignarte. Significa manifestar: <strong>Mi vida va más allá de lo que me pasa.</strong></p>
                <p>Cada acción comprometida es un acto de valentía. Sé paciente y amable contigo en este proceso. No se trata de hacerlo perfecto, sino de estar dispuesto a intentarlo.</p>
            </div>

            <div style="text-align: center; margin-top: 5rem;">
                <?php if ($st1['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 1 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act1-m7" class="boton boton-por-guardar" data-intro="<?php echo $ya_respondio_intro ? 'true' : 'false'; ?>" disabled>
                        Guardar y finalizar Actividad 1
                    </button>
                    <?php if (!$ya_respondio_intro): ?>
                        <div class="m-mensaje-advertencia" style="margin-top: 2rem;">
                            Debes completar la pausa inicial del módulo para poder guardar esta actividad.
                        </div>
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
            <h2 class="act-titulo">Actividad 2. Orientarme con mi brújula interior</h2>
            <p>Después de reconocer que hay experiencias que no has elegido, como situaciones adversas en el pasado, pensamientos, emociones o cambios en la salud y en el cuerpo, aparece una pregunta importante:</p>

            <p style="font-weight: 700; color: #12307D; margin-top: 2.5rem; margin-bottom: 2.5rem;">Si no todo depende de lo que siento o pienso, ¿entonces, hacia dónde quiero dirigirme?</p>

            <p>La mente puede opinar sobre tu cuerpo, cómo debería verse, cambiar o sentirse.</p>
            <p>Pero tú eres más que esas opiniones. Hay una parte en ti que puede observar todo eso y elegir una dirección.</p>
            <p>Imagina que vas de paseo a campo traviesa. El terreno cambia, a veces es más fácil andar, otras, más difícil, el clima también cambia. No puedes decidir cómo se ve el camino, de nada te sirve quejarte o desear que sea diferente, solo puedes elegir hacia donde diriges tus pasos.</p>
            <p><strong>Esa dirección es tu brújula interior.</strong></p>

            <div style="background: #fdfdfd; padding: 3.5rem; border: 1px solid #e0e0e0; border-radius: 1.5rem; margin: 4rem 0;">
                <p style="font-weight: 700; color: #12307D; margin-bottom: 2rem;">Ahora, detente un momento para pensar en tu cuerpo. Reflexiona en el tipo de relación que te gustaría construir con él, quizás:</p>

                <div class="dos-columnas">
                    <ul style="margin-left: 2.5rem; line-height: 2; color: #333;">
                        <li>Más amable</li>
                        <li>Más adaptada</li>
                        <li>Más respetuosa</li>
                        <li>Más paciente</li>
                    </ul>
                    <ul style="margin-left: 2.5rem; line-height: 2; color: #333;">
                        <li>Más activa</li>
                        <li>Más flexible</li>
                        <li>Más nutritiva</li>
                    </ul>
                </div>
            </div>

            <p>Y la siguiente pregunta que surge es <strong>¿cómo construyo esa relación?</strong> Te invito a escuchar el siguiente audio para ayudarte a contactar con tu brújula desde el cuerpo.</p>
        </div>

        <div class="m1-audio-contenedor">
            <p class="audio-titulo">Audio: Contactar mi brújula desde el cuerpo</p>
            <audio controls style="width: 100%;">
                <source src="/build/audio/Audio_H1_Contactar_mi_brujula.mp3" type="audio/mpeg">
                Tu navegador no soporta el audio.
            </audio>
        </div>

        <div class="actividad-seccion-texto">
            <p>Este ejercicio muestra una forma que integra lo que elabora la mente –emociones, pensamientos, fantasías, recuerdos, impulsos– y lo que ocurre en el cuerpo.</p>
            <p>Al inspeccionar cómo interpretas lo que vives, cómo lo sientes y los impulsos que sientes, abres espacio a nuevas posibilidades.</p>
            <p>Con la práctica de este ejercicio, irás construyendo una forma más sabia de relacionarte contigo y afinar esa brújula interior. Ahora sabes que no todo lo que aparece en la mente marca la dirección, no necesitas reaccionar automáticamente y puedes elegir hacia donde avanzar.</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act2-m7">
            <input type="hidden" name="id_modulo" value="7">
            <input type="hidden" name="actividad_id" value="2">

            <div class="m1-experimento-seccion" style="padding: 4rem; margin-top: 4rem;">
                <p class="m1-experimento-titulo">Y mientras afinas esta brújula, también puedes empezar a dar pasos en la dirección importante para ti, sin importar si son pequeños.</p>
                <p style="margin-bottom: 3rem;">A continuación, hay una lista de acciones con las que puedes comenzar a comprometerte y que refleja la relación que quieres con el cuerpo:</p>

                <?php
                $acciones = [
                    '714' => 'Moverte con suavidad',
                    '715' => 'Poner atención a tu alimento',
                    '716' => 'Hablarte con más respeto',
                    '717' => 'Tomar pequeños descansos sin culpa',
                    '718' => 'Observarse en el espejo sin crítica',
                    '719' => 'Brindarte una sonrisa'
                ];

                foreach ($acciones as $id => $texto):
                    $marcado = !empty($respuestas[$id]);
                ?>
                    <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                        <input type="checkbox" name="<?php echo $id; ?>" value="<?php echo $texto; ?>" class="m1-check-input chk-act2" <?php echo $marcado ? 'checked' : ''; ?> <?php echo $st2['completada'] ? 'disabled' : ''; ?>>
                        <span class="m1-check-custom"></span>
                        <span class="m1-check-texto"><?php echo $texto; ?></span>
                    </label>
                <?php endforeach; ?>

                <?php
                $otra_marcada = !empty($respuestas['720']);
                $val_721 = $respuestas['721'] ?? '';
                ?>
                <div style="margin-top: 2rem;">
                    <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                        <input type="checkbox" name="720" value="Otra" id="chk-otra-act2" class="m1-check-input chk-act2" <?php echo $otra_marcada ? 'checked' : ''; ?> <?php echo $st2['completada'] ? 'disabled' : ''; ?>>
                        <span class="m1-check-custom"></span>
                        <span class="m1-check-texto">Otra:</span>
                    </label>
                    <textarea name="721" id="txt-otra-act2" class="m7-textarea" rows="2" placeholder="Escribe aquí otra acción..." style="width: 100%; border: 2px solid #e0e0e0; <?php echo !$otra_marcada && !$st2['completada'] ? 'background-color: #f4f4f4;' : ''; ?>" <?php echo (!$otra_marcada || $st2['completada']) ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_721); ?></textarea>
                </div>

                <p style="margin-top: 3rem; font-style: italic; color: #555;">Recuerda, no es una exigencia, es una intención consciente y con un solo paso, comienza el movimiento.</p>
            </div>

            <div style="text-align: center; margin-top: 5rem;">
                <?php if ($st2['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 2 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act2-m7" class="boton boton-por-guardar" disabled>
                        Guardar y finalizar Actividad 2
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <!-- Actividad 3 -->
    <?php $st3 = getEstado(3, $actual); ?>
    <section class="actividad" id="act3" style="<?php echo $st3['visible']; ?>">
        <div class="divisor-modulo"></div>

        <div class="actividad-seccion-texto">
            <h2 class="act-titulo">Actividad 3. Pasos amables</h2>
            <p>Relacionarse con el cuerpo no solo implica lo que haces, también cómo te tratas mientras lo haces.</p>
            <p>Es probable que en algún momento, hayas implementado cambios en tu estilo de vida –levantarte a otra hora, abandonar algún tipo de hábito o comida, tomar medicamentos, gestionar el estrés–. Y mientras lo hacías, quizá apareció algo más:</p>

            <ul style="margin-left: 2.5rem; margin-bottom: 2rem; line-height: 1.8; color: #333;">
                <li>Reproches no haber comenzado antes</li>
                <li>Crítica ante olvidos o errores</li>
                <li>Exigencia de perfección o competitividad</li>
                <li>O incluso terminaste con frustración y vergüenza.</li>
            </ul>

            <p>Muchas veces, la forma en cómo cuidamos de nosotros mismos, se acompaña de dureza y hostilidad. La compasión propone otra forma de dar esos pasos.</p>

            <p style="font-weight: 700; color: #12307D; margin-top: 2rem; margin-bottom: 2rem;">La compasión no es autocomplacencia, ni lástima, ni debilidad.</p>

            <p>Es reconocer la dificultad, el dolor, el sufrimiento y responder con bondad, amabilidad, soporte y respeto.</p>
            <p>Con esta disposición, puedes influir en cómo te sientes emocionalmente y en cómo tu cuerpo responde, promoviendo la calma, reduciendo la tensión, además de favorecer la flexibilidad y conexión contigo mismo y con los demás.</p>
            <p>Vamos a hacer el experimento de acercarnos a esta disposición compasiva. Para ello, te invito a que comiences con el siguiente audio.</p>

            <div style="background: #eef2f7; border-left: 5px solid #12307D; padding: 3rem; border-radius: 0.8rem; margin: 3rem 0;">
                <p style="margin-bottom: 1rem;">Antes de continuar es importante mencionarte que acercarse a la compasión puede no ser fácil para muchas personas. Puede aparecer incomodidad, resistencias o hasta rechazo. Si eso te ocurre, no significa que haya algo mal, solo indica que esta relación merece y necesita ser construida con tiempo, paciencia y delicadeza.</p>
                <p>Por eso, no es necesario forzar ninguna sensación o esperar que suceda algo en específico, solo abrirte a lo que vaya surgiendo.</p>
            </div>
        </div>

        <div class="m1-audio-contenedor">
            <p class="audio-titulo">Audio: Color compasivo</p>
            <audio controls style="width: 100%;">
                <source src="/build/audio/Audio_H2_Color_compasivo.mp3" type="audio/mpeg">
                Tu navegador no soporta el audio.
            </audio>
        </div>

        <div class="actividad-seccion-texto">
            <p>Después de haber contactado con sensaciones de compasión, surge una invitación natural, llevarla hacia el cuerpo.</p>
            <p>Primero, detente un momento para observar tu experiencia. Considera tanto lo que piensas, lo que sientes y lo que haces.</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act3-m7">
            <input type="hidden" name="id_modulo" value="7">
            <input type="hidden" name="actividad_id" value="3">

            <div class="m1-experimento-seccion" style="padding: 4rem; margin-top: 4rem;">

                <div style="margin-bottom: 4rem; background: #fdfdfd; padding: 3rem; border: 1px solid #e0e0e0; border-radius: 1.5rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 2rem;">En una escala del 0 al 10, ¿qué tan amable es tu forma de tratar el cuerpo hoy?</p>
                    <?php $val_722 = $respuestas['722'] ?? 5; ?>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <span style="font-weight: 700; color: #555;">0 (Nada amable)</span>
                        <span id="valor-722" style="font-weight: 700; color: #12307D; font-size: 2rem; background: #eef2f7; padding: 0.5rem 1.5rem; border-radius: 1rem; border: 1px solid #ccc;"><?php echo $val_722; ?></span>
                        <span style="font-weight: 700; color: #555;">10 (Muy amable)</span>
                    </div>
                    <input type="range" name="722" id="rng-722" min="0" max="10" step="1" value="<?php echo $val_722; ?>" class="m1-slider" style="width: 100%; cursor: pointer;" <?php echo $st3['completada'] ? 'disabled' : ''; ?>>
                </div>

                <div style="margin-bottom: 3.5rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">En los últimos días, ¿en qué momentos te has relacionado con el cuerpo desde la crítica, la exigencia, el rechazo o el descuido?</p>
                    <?php $val_723 = $respuestas['723'] ?? ''; ?>
                    <textarea class="m7-textarea input-espacio act3-textarea" name="723" id="txt-723" rows="3" placeholder="Escribe aquí..." <?php echo $st3['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_723); ?></textarea>
                    <div id="fb-723" class="feedback-pregunta" style="display: <?php echo !empty($val_723) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                </div>

                <div style="margin-bottom: 3.5rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">Cuando esto ocurre, ¿qué sucede con tus emociones, pensamientos, impulsos o qué haces después?</p>
                    <?php $val_724 = $respuestas['724'] ?? ''; ?>
                    <textarea class="m7-textarea input-espacio act3-textarea" name="724" id="txt-724" rows="3" placeholder="Escribe aquí..." <?php echo $st3['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_724); ?></textarea>
                    <div id="fb-724" class="feedback-pregunta" style="display: <?php echo !empty($val_724) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                </div>

                <div style="margin-bottom: 3.5rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">¿Reconoces alguna zona o parte del cuerpo que te ayuda en el día a día?</p>
                    <?php $val_725 = $respuestas['725'] ?? ''; ?>
                    <textarea class="m7-textarea input-espacio act3-textarea" name="725" id="txt-725" rows="3" placeholder="Escribe aquí..." <?php echo $st3['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_725); ?></textarea>
                    <div id="fb-725" class="feedback-pregunta" style="display: <?php echo !empty($val_725) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                </div>

                <div style="margin-bottom: 3.5rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">Recuerda alguna ocasión, en que te hayas tratado con más amabilidad o compasión hacia el cuerpo, aunque haya sido pequeña, como un gesto, ¿Qué fue diferente en ese momento?</p>
                    <?php $val_726 = $respuestas['726'] ?? ''; ?>
                    <textarea class="m7-textarea input-espacio act3-textarea" name="726" id="txt-726" rows="3" placeholder="Escribe aquí..." <?php echo $st3['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_726); ?></textarea>
                    <div id="fb-726" class="feedback-pregunta" style="display: <?php echo !empty($val_726) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                </div>

                <div style="margin-bottom: 3.5rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">Si hoy dieras un paso en dirección de relacionarte amable y compasivamente con el cuerpo para aumentar solo 1 punto, ¿qué harías?</p>
                    <?php $val_727 = $respuestas['727'] ?? ''; ?>
                    <textarea class="m7-textarea input-espacio act3-textarea" name="727" id="txt-727" rows="3" placeholder="Escribe aquí..." <?php echo $st3['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_727); ?></textarea>
                    <div id="fb-727" class="feedback-pregunta" style="display: <?php echo !empty($val_727) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                </div>

                <div class="actividad-seccion-texto" style="margin-top: 4rem;">
                    <p>Teniendo esto en cuenta, en los próximos días, prueba llevar a cabo esta acción, observando cómo es para ti tratarte con una actitud amable.</p>
                    <p style="font-weight: 700;">No se trata de hacerlo perfecto, sino de empezar a relacionarte diferente y orientarte hacia lo que importa para ti.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 5rem;">
                <?php if ($st3['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 3 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act3-m7" class="boton boton-por-guardar" disabled>
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
            <h2 class="act-titulo">Actividad 4. Piedras en el camino</h2>
            <p>En el camino hacia lo que te importa van a aparecer obstáculos: pensamientos, emociones, cansancio, personas o imprevistos.</p>
            <p style="font-weight: 700; color: #12307D;">No es el obstáculo lo que te detiene, sino cómo reaccionas.</p>
            <p>Cuando no los notas, puedes evitar, pelear o quedarte inmóvil.</p>
            <p>Observar es hacer una pausa y mirar: qué pasó, qué sentí o pensé, qué hice y qué resultado tuvo.</p>
            <p>Eso te devuelve la elección.</p>
            <p>No decides si aparecen las piedras, pero sí cómo caminar frente a ellas.</p>
        </div>

        <div class="m1-experimento-seccion" style="padding: 4rem; margin-bottom: 4rem;">
            <div class="dos-columnas" style="align-items: center;">
                <div style="text-align: center;">
                    <img src="/build/img/m7a4_img1.png" class="img-ebook" alt="Camino con obstáculos" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                </div>
                <div>
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">Imagina que caminas hacia un lugar importante para ti.</p>
                    <p>El camino no es plano: hay piedras, charcos, pendientes, tramos resbalosos.</p>
                    <p>A veces nos podemos detener en la primera piedra, o nos podemos enojar con el camino, posiblemente, seguimos caminando sin mirar y tropezar.</p>
                </div>
            </div>
        </div>

        <div class="m1-experimento-seccion" style="padding: 4rem; margin-bottom: 4rem;">
            <div class="dos-columnas" style="align-items: center; flex-direction: row-reverse;">
                <div style="text-align: center;">
                    <img src="/build/img/m7a4_img2.png" class="img-ebook" alt="Opciones ante el obstáculo" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                </div>
                <div>
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">La opción más sabia es mirar el camino, reconocer la piedra y elegir:</p>
                    <ul style="margin-left: 2rem; margin-bottom: 1.5rem; line-height: 1.8; color: #333;">
                        <li>¿La rodeo?</li>
                        <li>¿Paso con cuidado?</li>
                        <li>¿Me detengo un momento?</li>
                        <li>¿Cambio de paso?</li>
                    </ul>
                    <p style="font-weight: 700;">La piedra no desaparece, sin embargo al observarla, deja de controlar tu camino.</p>
                </div>
            </div>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act4-m7">
            <input type="hidden" name="id_modulo" value="7">
            <input type="hidden" name="actividad_id" value="4">

            <div class="actividad-seccion-texto">
                <p>Hagamos el ejercicio. Identifica la principal piedra que apareció hoy, puede ser un obstáculo, una barrera o una resistencia.</p>
                <p>No lo analices demasiado, solo identifica qué estuvo presente. Si no aparece en la lista, selecciona “Otra” y escríbelo.</p>
            </div>

            <div class="m1-experimento-seccion" style="padding: 4rem; margin-bottom: 4rem;">
                <p class="m1-experimento-titulo">Hoy noto que la piedra que me obstaculizó se llama:</p>
                <p style="color: #666; font-style: italic; margin-bottom: 2rem;">(Selecciona máximo 2 opciones)</p>

                <div class="dos-columnas">
                    <div>
                        <?php
                        $piedras_col1 = [
                            '728' => 'Cansancio',
                            '729' => 'Dolor / malestar',
                            '730' => 'Pensamientos negativos',
                            '731' => 'Falta de ganas'
                        ];
                        foreach ($piedras_col1 as $id => $texto):
                            $marcado = !empty($respuestas[$id]);
                        ?>
                            <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                                <input type="checkbox" name="<?php echo $id; ?>" value="<?php echo $texto; ?>" class="m1-check-input chk-piedra" <?php echo $marcado ? 'checked' : ''; ?> <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                                <span class="m1-check-custom"></span>
                                <span class="m1-check-texto"><?php echo $texto; ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                    <div>
                        <?php
                        $piedras_col2 = [
                            '732' => 'Problemas con alguien',
                            '733' => 'No sé a quién acudir',
                            '734' => 'Resisto los ajustes'
                        ];
                        foreach ($piedras_col2 as $id => $texto):
                            $marcado = !empty($respuestas[$id]);
                        ?>
                            <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                                <input type="checkbox" name="<?php echo $id; ?>" value="<?php echo $texto; ?>" class="m1-check-input chk-piedra" <?php echo $marcado ? 'checked' : ''; ?> <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                                <span class="m1-check-custom"></span>
                                <span class="m1-check-texto"><?php echo $texto; ?></span>
                            </label>
                        <?php endforeach; ?>

                        <?php
                        $otra_piedra_marcada = !empty($respuestas['735']);
                        $val_736 = $respuestas['736'] ?? '';
                        ?>
                        <label class="m1-check-contenedor" style="margin-bottom: 1rem; display: block;">
                            <input type="checkbox" name="735" value="Otra" id="chk-otra-piedra" class="m1-check-input chk-piedra" <?php echo $otra_piedra_marcada ? 'checked' : ''; ?> <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                            <span class="m1-check-custom"></span>
                            <span class="m1-check-texto">Otra:</span>
                        </label>
                        <textarea name="736" id="txt-otra-piedra" class="m7-textarea" rows="1" placeholder="Escribe aquí..." style="width: 100%; border: 2px solid #e0e0e0; <?php echo !$otra_piedra_marcada && !$st4['completada'] ? 'background-color: #f4f4f4;' : ''; ?>" <?php echo (!$otra_piedra_marcada || $st4['completada']) ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_736); ?></textarea>
                    </div>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p style="font-weight: 700; color: #12307D;">Observa sin juzgar, solo describe lo que pasó. No hay respuestas correctas o incorrectas.</p>
            </div>

            <div class="m1-experimento-seccion" style="padding: 4rem; margin-bottom: 4rem;">
                <div style="margin-bottom: 3rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">Cuando apareció la piedra, pensé…</p>
                    <?php $val_737 = $respuestas['737'] ?? ''; ?>
                    <textarea name="737" id="txt-737" class="m7-textarea act4-textarea input-espacio" rows="2" placeholder="Escribe aquí..." <?php echo $st4['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_737); ?></textarea>
                    <div id="fb-737" class="feedback-pregunta" style="display: <?php echo !empty($val_737) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                </div>

                <div style="margin-bottom: 3rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">Sentí…</p>
                    <?php $val_738 = $respuestas['738'] ?? ''; ?>
                    <textarea name="738" id="txt-738" class="m7-textarea act4-textarea input-espacio" rows="2" placeholder="Escribe aquí..." <?php echo $st4['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_738); ?></textarea>
                    <div id="fb-738" class="feedback-pregunta" style="display: <?php echo !empty($val_738) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                </div>

                <div>
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;">Hice…</p>
                    <?php $val_739 = $respuestas['739'] ?? ''; ?>
                    <textarea name="739" id="txt-739" class="m7-textarea act4-textarea input-espacio" rows="2" placeholder="Escribe aquí..." <?php echo $st4['completada'] ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_739); ?></textarea>
                    <div id="fb-739" class="feedback-pregunta" style="display: <?php echo !empty($val_739) ? 'block' : 'none'; ?>;"><i class="fas fa-check-circle"></i> Buen trabajo, sigue avanzando</div>
                </div>
            </div>

            <div class="m1-experimento-seccion" style="padding: 4rem; margin-bottom: 4rem;">
                <p class="m1-experimento-titulo">Elección consciente</p>
                <p style="color: #666; font-style: italic; margin-bottom: 2rem;">(Selecciona las opciones que consideres)</p>

                <div class="dos-columnas">
                    <div>
                        <?php
                        $elecciones = [
                            '740' => 'Pausar',
                            '741' => 'Pedir apoyo',
                            '742' => 'Avanzar con calma',
                            '743' => 'Cambiar de estrategia',
                            '744' => 'Tratarme con más amabilidad'
                        ];
                        foreach ($elecciones as $id => $texto):
                            $marcado = !empty($respuestas[$id]);
                        ?>
                            <label class="m1-check-contenedor" style="margin-bottom: 1.5rem; display: block;">
                                <input type="checkbox" name="<?php echo $id; ?>" value="<?php echo $texto; ?>" class="m1-check-input chk-eleccion" <?php echo $marcado ? 'checked' : ''; ?> <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                                <span class="m1-check-custom"></span>
                                <span class="m1-check-texto"><?php echo $texto; ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                    <div>
                        <?php
                        $otra_eleccion_marcada = !empty($respuestas['745']);
                        $val_746 = $respuestas['746'] ?? '';
                        ?>
                        <label class="m1-check-contenedor" style="margin-bottom: 1rem; display: block;">
                            <input type="checkbox" name="745" value="Otra" id="chk-otra-eleccion" class="m1-check-input chk-eleccion" <?php echo $otra_eleccion_marcada ? 'checked' : ''; ?> <?php echo $st4['completada'] ? 'disabled' : ''; ?>>
                            <span class="m1-check-custom"></span>
                            <span class="m1-check-texto">Otra:</span>
                        </label>
                        <textarea name="746" id="txt-otra-eleccion" class="m7-textarea" rows="2" placeholder="Escribe aquí..." style="width: 100%; border: 2px solid #e0e0e0; <?php echo !$otra_eleccion_marcada && !$st4['completada'] ? 'background-color: #f4f4f4;' : ''; ?>" <?php echo (!$otra_eleccion_marcada || $st4['completada']) ? 'disabled' : ''; ?>><?php echo htmlspecialchars($val_746); ?></textarea>
                    </div>
                </div>
            </div>

            <div class="actividad-seccion-texto">
                <p>Te propongo que en los próximos días continúes haciendo este ejercicio.</p>
                <p>Las piedras no significan fracaso, significan que estás en movimiento.</p>
                <p>Mirarlas te permite elegir cómo avanzar en lugar de reaccionar sin pensar.</p>
                <p>Cada obstáculo observado fortalece tu cuidado y tu rumbo.</p>
            </div>

            <div class="m1-experimento-seccion" style="padding: 4rem; margin-top: 4rem; background: #eef2f7;">
                <div class="dos-columnas" style="align-items: center;">
                    <div>
                        <p style="font-weight: 800; color: #12307D; font-size: 2rem; margin-bottom: 1.5rem;">RECUERDA</p>
                        <ul style="margin-left: 2rem; line-height: 1.8; color: #333; font-weight: 700;">
                            <li>Los obstáculos aparecen.</li>
                            <li>Solo los observo.</li>
                            <li>Y sigo caminando con decisión.</li>
                        </ul>
                    </div>
                    <div style="text-align: center;">
                        <img src="/build/img/m7a4_img3.png" class="img-ebook" alt="Sigo caminando con decisión" style="max-width: 100%; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 5rem;">
                <?php if ($st4['completada']): ?>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Actividad 4 Completada
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act4-m7" class="boton boton-por-guardar" disabled>
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
            <h2 class="act-titulo">Actividad 5. Trazando nuevas rutas</h2>
            <p>El trabajo que has realizado a lo largo de este módulo ha sido muy importante y arduo. Has explorado cuál es la relación que quieres tener con el cuerpo, al notarlo, escucharlo y acercarte a él con más amabilidad y compromiso. Has podido explorar cuáles son las barreras y resistencias que hasta ahora te habían desviado o detenido en el camino a lo importante.</p>
            <p>Tu cuerpo no es un problema que resolver, es una relación que se construye a diario. Ahora, puedes estar consciente que no necesitas hacer mucho y perfecto, lo importante es haber comenzado a mirar diferente, orientándote por esa brújula interior. La que te mantiene en la dirección.</p>
            <p>En este camino, quizá también hayas notado algo importante. Una misma acción puede tener efectos muy distintos, dependiendo de cómo se ajusta a la situación, a lo que necesitas y de la actitud con la que la realizas.</p>
            
            <p style="font-weight: 700; color: #12307D; margin-top: 2.5rem; margin-bottom: 2.5rem;">La adaptación es una forma de regularse, desde tus emociones y pensamientos hasta la forma en que respondes. Así es, las acciones no son por sí mismas “buenas” o “malas”, sino de si se adaptan al momento que vives, la actitud e intención que las guía.</p>
            
            <p>Vamos a explorarlo con el siguiente ejercicio donde puedes observar algunas acciones cotidianas y cómo pueden funcionar de maneras diferentes, acercándote o alejándote de la vida valiosa y plena.</p>
        </div>

        <form method="POST" action="/guardar-actividad" id="form-act5-m7">
            <input type="hidden" name="id_modulo" value="7">
            <input type="hidden" name="actividad_id" value="5">

            <div class="m1-experimento-seccion" style="padding: 4rem; margin-top: 4rem;">
                <p class="texto-justificado" style="margin-bottom: 3rem;">A continuación, se enlistan diferentes funciones de la acción. No las enjuicies, no hay respuestas correctas, solo selecciona <strong>“C (Me acerca)”</strong> si al utilizarla la mayor parte del tiempo te acerca a lo importante, o <strong>“L (Me aleja)”</strong> si te aleja. Si no te describe, selecciona <strong>"No aplica"</strong>.</p>

                <?php
                $categorias = [
                    'Aislarme para pasar tiempo a solas' => [
                        '747' => 'Me ayuda a descansar',
                        '748' => 'Me ayuda a evitar o escapar de algo difícil',
                        '749' => 'Me permite conectar conmigo y lo que necesito'
                    ],
                    'Comer algo que disfruto' => [
                        '750' => 'Es una forma de darme un momento agradable',
                        '751' => 'Me ayuda a calmar las emociones intensas',
                        '752' => 'Tomo un pequeño bocadillo para mantener mi energía'
                    ],
                    'Distraerme consumiendo pantallas (televisión, juegos, redes sociales, reels)' => [
                        '753' => 'Me ayuda a no pensar en mis dificultades',
                        '754' => 'Destino tiempo que me hace postergar cosas importantes',
                        '755' => 'Me permite cambiar de ritmo por un momento'
                    ],
                    'Prestar atención a los síntomas' => [
                        '756' => 'Me mantiene alerta y enfocado en el malestar',
                        '757' => 'Es una forma de anticiparse y cuidar de mi',
                        '758' => 'Me ayuda a escuchar lo que el cuerpo necesita'
                    ],
                    'Expresarme sobre mi cuerpo' => [
                        '759' => 'Intento motivarme y acompañarme',
                        '760' => 'Lo comparo porque me gustaría que fuera diferente',
                        '761' => 'Lo considero una limitación'
                    ],
                    'Hacer actividad física (caminata, ejercicio, yoga, danza, etc.)' => [
                        '762' => 'Me ayuda a compensar mis excesos',
                        '763' => 'Es una forma de cuidado y bienestar',
                        '764' => 'Es una forma de conectar conmigo y con otros'
                    ]
                ];

                foreach($categorias as $titulo => $opciones):
                ?>
                    <div style="margin-bottom: 4rem; background: #fdfdfd; padding: 2.5rem; border-radius: 1.2rem; border: 1px solid #e0e0e0;">
                        <p style="font-weight: 800; color: #12307D; margin-bottom: 1.5rem; border-bottom: 2px solid #c79e57; padding-bottom: 0.5rem;"><?php echo $titulo; ?></p>
                        
                        <?php foreach($opciones as $id => $texto): ?>
                            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; gap: 2rem;">
                                <p style="flex: 1 1 300px; margin: 0; color: #333; font-weight: 700;"><?php echo $texto; ?></p>
                                <select name="<?php echo $id; ?>" class="m1-select-personalizado val-act5" style="flex: 0 1 200px; padding: 1rem; border-radius: 0.8rem;" <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                                    <option value="">-- Selecciona --</option>
                                    <?php foreach(['C (Me acerca)', 'L (Me aleja)', 'No aplica'] as $opt): ?>
                                        <option value="<?php echo $opt; ?>" <?php echo ($respuestas[$id] ?? '') === $opt ? 'selected' : ''; ?>><?php echo $opt; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="actividad-seccion-texto">
                <p style="font-weight: 800; color: #12307D; margin-bottom: 2rem;">Ahora, observa tus respuestas:</p>
                <ul style="margin-left: 2.5rem; margin-bottom: 2rem; line-height: 1.8; color: #333;">
                    <li>¿Notas como una misma acción puede cumplir funciones diferentes?</li>
                    <li>¿Te das cuenta si tus acciones, en el tiempo son sostenibles para tu bienestar y calidad de vida?</li>
                </ul>

                <p>Recuerda, lo que determina si te acerca o aleja no solo es la acción, es en qué momento, para qué la haces, la frecuencia con la que la haces y cómo te relacionas contigo mientras la realizas.</p>
                
                <div style="background: #eef2f7; border-left: 5px solid #12307D; padding: 3rem; border-radius: 0.8rem; margin: 3rem 0;">
                    <p style="font-weight: 700; margin-bottom: 1.5rem; color: #333;">Así que en los próximos días, elige una acción y pregúntate:</p>
                    <p style="font-weight: 800; color: #12307D; font-style: italic;">¿Cómo podría cambiar su función para que me acerque más a lo que valoro e importa para mí?</p>
                </div>
            </div>

            <div class="m1-evaluacion-final" style="background: #eef2f7; padding: 4rem; border-radius: 1.5rem; border: 0.2rem dashed #12307D; margin-top: 6rem;">
                <h3 class="act-titulo" style="color: #12307D; margin-bottom: 2rem;">Evaluación del Módulo 7</h3>
                <p style="margin-bottom: 3rem;">¡Felicidades, has concluido el módulo 7! Tu experiencia es importante, marca la opción que mejor la refleja:</p>

                <?php
                $evaluacion_m7 = [
                    '765' => '1. El módulo fue claro y fácil de seguir',
                    '766' => '2. Lo trabajado en el módulo me resulta útil para mi calidad de vida o autocuidado',
                    '767' => '3. Considero que puedo aplicar lo trabajado en mi vida diaria'
                ];
                foreach ($evaluacion_m7 as $id => $pregunta): ?>
                    <div style="margin-bottom: 3rem;">
                        <p style="font-weight: 700; color: #333; margin-bottom: 1rem;"><?php echo $pregunta; ?></p>
                        <select name="<?php echo $id; ?>" class="m1-select-personalizado val-eval-m7" style="width: 100%; padding: 1.2rem; border-radius: 0.8rem;" <?php echo $st5['completada'] ? 'disabled' : ''; ?>>
                            <option value="">-- Selecciona una opción --</option>
                            <?php foreach (['Totalmente de acuerdo', 'De acuerdo', 'Poco de acuerdo', 'Totalmente en desacuerdo'] as $op): ?>
                                <option value="<?php echo $op; ?>" <?php echo ($respuestas[$id] ?? '') === $op ? 'selected' : ''; ?>><?php echo $op; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endforeach; ?>
            </div>

            <div style="text-align: center; margin-top: 5rem;">
                <?php if ($st5['completada']): ?>
                    <div class="m-mensaje-completado-modulo">
                        ✨ ¡Concluiste con el Módulo 7! ✨
                    </div>
                    <button type="button" class="boton boton-completado" disabled>
                        <i class="fas fa-check"></i> Módulo 7 Completado
                    </button>
                <?php else: ?>
                    <button type="submit" id="btn-finalizar-act5-m7" class="boton boton-por-guardar" disabled>
                        Guardar y finalizar Módulo 7
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
    // ACTIVIDAD 1 - Módulo 7: Validación de las áreas de texto
    document.addEventListener('DOMContentLoaded', function() {
        const formAct1M7 = document.getElementById('form-act1-m7');
        if (!formAct1M7) return;

        const btnFinalizarAct1 = document.getElementById('btn-finalizar-act1-m7');

        // CORRECCIÓN AQUÍ: Cambiamos '.act1-textarea' por '.m7-textarea' que es la que usaste en el HTML
        const textareasAct1 = formAct1M7.querySelectorAll('.m7-textarea');
        const introCompletada = btnFinalizarAct1 ? btnFinalizarAct1.dataset.intro === 'true' : false;

        function validarFormularioAct1M7() {
            if (!btnFinalizarAct1) return;

            // Verificamos que sí existan textareas y que TODAS tengan más de 3 caracteres
            const todasLlenas = textareasAct1.length > 0 && Array.from(textareasAct1).every(ta => ta.value.trim().length > 0);

            textareasAct1.forEach(ta => {
                const fbId = 'fb-' + ta.id.split('-')[1];
                const fbElement = document.getElementById(fbId);
                if (fbElement) {
                    // CAMBIO AQUÍ: de > 3 a > 0
                    fbElement.style.display = ta.value.trim().length > 0 ? 'block' : 'none';
                }
            });

            // Activar botón solo si se llenaron correctamente todas las cajas y la intro está lista
            if (todasLlenas && introCompletada) {
                btnFinalizarAct1.disabled = false;
                btnFinalizarAct1.classList.add("activo");
            } else {
                btnFinalizarAct1.disabled = true;
                btnFinalizarAct1.classList.remove("activo");
            }
        }

        // Agregar listeners para validación en tiempo real al escribir
        textareasAct1.forEach(ta => ta.addEventListener('input', validarFormularioAct1M7));

        // Validar al iniciar la página
        validarFormularioAct1M7();
    });
    // ACTIVIDAD 2 - Módulo 7: Validación de checkboxes y textarea
    document.addEventListener('DOMContentLoaded', function() {
        const formAct2M7 = document.getElementById('form-act2-m7');
        if (!formAct2M7) return;

        const btnFinalizarAct2 = document.getElementById('btn-finalizar-act2-m7');
        const chkAct2 = formAct2M7.querySelectorAll('.chk-act2');
        const chkOtra = document.getElementById('chk-otra-act2');
        const txtOtra = document.getElementById('txt-otra-act2');

        function validarFormularioAct2M7() {
            if (!btnFinalizarAct2) return;

            let algunMarcado = false;
            let validacionOtra = true;

            // Revisar si hay al menos un checkbox seleccionado
            chkAct2.forEach(chk => {
                if (chk.checked) algunMarcado = true;
            });

            // Lógica para la opción "Otra"
            if (chkOtra && chkOtra.checked) {
                // Habilitamos el cuadro de texto
                txtOtra.disabled = false;
                txtOtra.style.backgroundColor = '#fff';

                // Si está seleccionada, exigimos que escriban al menos 3 caracteres
                if (txtOtra.value.trim().length < 3) {
                    validacionOtra = false;
                }
            } else if (chkOtra && !chkOtra.checked) {
                // Si la desmarcan, deshabilitamos y limpiamos el cuadro de texto
                if (txtOtra && !txtOtra.disabled) {
                    txtOtra.disabled = true;
                    txtOtra.value = '';
                    txtOtra.style.backgroundColor = '#f4f4f4';
                }
            }

            // Habilitar o deshabilitar el botón de guardado
            if (algunMarcado && validacionOtra) {
                btnFinalizarAct2.disabled = false;
                btnFinalizarAct2.classList.add("activo");
            } else {
                btnFinalizarAct2.disabled = true;
                btnFinalizarAct2.classList.remove("activo");
            }
        }

        // Asignar listeners a los checkboxes y al textarea
        chkAct2.forEach(chk => chk.addEventListener('change', validarFormularioAct2M7));
        if (txtOtra) txtOtra.addEventListener('input', validarFormularioAct2M7);

        // Validar al iniciar la página
        validarFormularioAct2M7();
    });
    // ACTIVIDAD 3 - Módulo 7: Validación de Slider y Textareas
    document.addEventListener('DOMContentLoaded', function() {
        const formAct3M7 = document.getElementById('form-act3-m7');
        if (!formAct3M7) return;

        const btnFinalizarAct3 = document.getElementById('btn-finalizar-act3-m7');
        // Buscamos estrictamente dentro del form actual
        const textareasAct3 = formAct3M7.querySelectorAll('.act3-textarea');

        // Elementos del slider
        const sliderAct3 = document.getElementById('rng-722');
        const sliderValDisplay = document.getElementById('valor-722');

        // Lógica para que el número del slider cambie en tiempo real
        if (sliderAct3 && sliderValDisplay) {
            sliderAct3.addEventListener('input', function() {
                sliderValDisplay.innerText = this.value;
                validarFormularioAct3M7();
            });
        }

        function validarFormularioAct3M7() {
            if (!btnFinalizarAct3) return;

            // Revisamos que las 5 áreas de texto tengan al menos un caracter ( > 0 )
            const todasLlenas = textareasAct3.length > 0 && Array.from(textareasAct3).every(ta => ta.value.trim().length > 0);

            // Mostramos o escondemos el texto "Buen trabajo" según corresponda
            textareasAct3.forEach(ta => {
                const fbId = 'fb-' + ta.id.split('-')[1]; // ej. '723'
                const fbElement = document.getElementById(fbId);
                if (fbElement) {
                    fbElement.style.display = ta.value.trim().length > 0 ? 'block' : 'none';
                }
            });

            // Activar botón solo si se llenó todo
            if (todasLlenas) {
                btnFinalizarAct3.disabled = false;
                btnFinalizarAct3.classList.add("activo");
            } else {
                btnFinalizarAct3.disabled = true;
                btnFinalizarAct3.classList.remove("activo");
            }
        }

        // Agregar listeners para validación en tiempo real al escribir
        textareasAct3.forEach(ta => ta.addEventListener('input', validarFormularioAct3M7));

        // Validar al iniciar
        validarFormularioAct3M7();
    });
    // ACTIVIDAD 4 - Módulo 7: Validación de Checkboxes y Textareas
    document.addEventListener('DOMContentLoaded', function() {
        const formAct4M7 = document.getElementById('form-act4-m7');
        if (!formAct4M7) return;

        const btnFinalizarAct4 = document.getElementById('btn-finalizar-act4-m7');

        // Elementos Grupo 1: Piedras
        const chkPiedras = formAct4M7.querySelectorAll('.chk-piedra');
        const chkOtraPiedra = document.getElementById('chk-otra-piedra');
        const txtOtraPiedra = document.getElementById('txt-otra-piedra');

        // Elementos Grupo 2: Textareas
        const textareasAct4 = formAct4M7.querySelectorAll('.act4-textarea');

        // Elementos Grupo 3: Elecciones
        const chkElecciones = formAct4M7.querySelectorAll('.chk-eleccion');
        const chkOtraEleccion = document.getElementById('chk-otra-eleccion');
        const txtOtraEleccion = document.getElementById('txt-otra-eleccion');

        // Regla: Máximo 2 opciones para el Grupo 1 (Piedras)
        chkPiedras.forEach(cb => {
            cb.addEventListener('change', () => {
                const marcados = formAct4M7.querySelectorAll('.chk-piedra:checked');
                if (marcados.length > 2) {
                    cb.checked = false;
                    alert("Por favor, selecciona un máximo de 2 opciones.");
                }
                validarFormularioAct4M7();
            });
        });

        function validarFormularioAct4M7() {
            if (!btnFinalizarAct4) return;

            // 1. Validar Grupo 1 (Piedras)
            const piedrasMarcadas = formAct4M7.querySelectorAll('.chk-piedra:checked').length;
            let validPiedras = piedrasMarcadas > 0;

            if (chkOtraPiedra && chkOtraPiedra.checked) {
                txtOtraPiedra.disabled = false;
                txtOtraPiedra.style.backgroundColor = '#fff';
                if (txtOtraPiedra.value.trim().length === 0) validPiedras = false;
            } else if (chkOtraPiedra && !chkOtraPiedra.checked) {
                if (txtOtraPiedra && !txtOtraPiedra.disabled) {
                    txtOtraPiedra.disabled = true;
                    txtOtraPiedra.value = '';
                    txtOtraPiedra.style.backgroundColor = '#f4f4f4';
                }
            }

            // 2. Validar Textareas (Que tengan al menos 1 letra)
            const textareasLlenas = textareasAct4.length > 0 && Array.from(textareasAct4).every(ta => ta.value.trim().length > 0);
            textareasAct4.forEach(ta => {
                const fbId = 'fb-' + ta.id.split('-')[1]; // ej: fb-737
                const fbElement = document.getElementById(fbId);
                if (fbElement) {
                    fbElement.style.display = ta.value.trim().length > 0 ? 'block' : 'none';
                }
            });

            // 3. Validar Grupo 3 (Elecciones)
            const eleccionesMarcadas = formAct4M7.querySelectorAll('.chk-eleccion:checked').length;
            let validElecciones = eleccionesMarcadas > 0;

            if (chkOtraEleccion && chkOtraEleccion.checked) {
                txtOtraEleccion.disabled = false;
                txtOtraEleccion.style.backgroundColor = '#fff';
                if (txtOtraEleccion.value.trim().length === 0) validElecciones = false;
            } else if (chkOtraEleccion && !chkOtraEleccion.checked) {
                if (txtOtraEleccion && !txtOtraEleccion.disabled) {
                    txtOtraEleccion.disabled = true;
                    txtOtraEleccion.value = '';
                    txtOtraEleccion.style.backgroundColor = '#f4f4f4';
                }
            }

            // Habilitar o deshabilitar botón principal
            if (validPiedras && textareasLlenas && validElecciones) {
                btnFinalizarAct4.disabled = false;
                btnFinalizarAct4.classList.add("activo");
            } else {
                btnFinalizarAct4.disabled = true;
                btnFinalizarAct4.classList.remove("activo");
            }
        }

        // Asignar listeners
        if (txtOtraPiedra) txtOtraPiedra.addEventListener('input', validarFormularioAct4M7);
        textareasAct4.forEach(ta => ta.addEventListener('input', validarFormularioAct4M7));
        chkElecciones.forEach(cb => cb.addEventListener('change', validarFormularioAct4M7));
        if (txtOtraEleccion) txtOtraEleccion.addEventListener('input', validarFormularioAct4M7);

        // Validar al inicio
        validarFormularioAct4M7();
    });
    // ACTIVIDAD 5 Y EVALUACIÓN FINAL - Módulo 7: Validación Completa
    document.addEventListener('DOMContentLoaded', function() {
        const formAct5M7 = document.getElementById('form-act5-m7');
        if (!formAct5M7) return;

        const btnFinalizarAct5 = document.getElementById('btn-finalizar-act5-m7');
        
        // Obtenemos todos los selectores de la Actividad 5 (Funciones de la acción)
        const selectsAct5 = formAct5M7.querySelectorAll('.val-act5');
        
        // Obtenemos los selectores de la Evaluación Final
        const selectsEval = formAct5M7.querySelectorAll('.val-eval-m7');

        function validarFormularioAct5M7() {
            if (!btnFinalizarAct5) return;

            // 1. Verificamos que todos los items de la actividad tengan una opción seleccionada
            const act5Lista = selectsAct5.length > 0 && Array.from(selectsAct5).every(sel => sel.value !== "");

            // 2. Verificamos que las 3 preguntas de la evaluación estén contestadas
            const evalLista = selectsEval.length > 0 && Array.from(selectsEval).every(sel => sel.value !== "");

            // Si ambas secciones están listas, activamos el botón
            if (act5Lista && evalLista) {
                btnFinalizarAct5.disabled = false;
                btnFinalizarAct5.classList.add("activo");
            } else {
                btnFinalizarAct5.disabled = true;
                btnFinalizarAct5.classList.remove("activo");
            }
        }

        // Asignamos los listeners para que validen al cambiar cualquier opción
        selectsAct5.forEach(sel => sel.addEventListener('change', validarFormularioAct5M7));
        selectsEval.forEach(sel => sel.addEventListener('change', validarFormularioAct5M7));

        // Validación inicial
        validarFormularioAct5M7();
    });
</script>