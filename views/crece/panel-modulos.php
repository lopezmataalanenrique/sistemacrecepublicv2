<nav class="navbar navbar-pm navbar-expand-lg fixed-top">
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
<main>
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

    <section class="panel-section section-a">
        <div class="panel-grid">
            <div class="panel-text">
                <h1>Guía para el usuario</h1>
                <p>Guía para navegar dentro del sistema CRECE y seguimiento del progreso.</p>
                <a class="btn-pm" onclick="mostrarSeccionA()">Revisar</a>
            </div>
            <div class="panel-image">
                <div class="campo-girasol"></div>
            </div>
        </div>

        <div id="contenido-seccion-a" class="contenido-a">
            <span class="cerrar" onclick="cerrarSeccionA()">×</span>

            <h2 class="titulo-c-a">Conoce CRECE</h2>

            <div class="texto-justificado">
                <p>¡Te damos la más cordial bienvenida!</p>

                <p>Al equipo del programa CRECE nos entusiasma que formes parte de este programa de acompañamiento y que puedas aprovechar todas las herramientas diseñadas para apoyar tu bienestar y calidad de vida.</p>

                <p>Es importante que conozcas en qué consiste el programa CRECE, sus fundamentos, qué puedes esperar al participar activamente para aprovechar al máximo esta experiencia. </p>

                <p>Para ello, te invitamos a ver el siguiente video y conocer los fundamentos de CRECE.</p>

                <div class="video-placeholder">A1_Qué_es_CRECE</div>

                <p>CRECE ha sido diseñado pensando en ti. No buscamos presentarte un programa complejo o técnico. Cada pilar está concatenado con los otros con un propósito claro: contribuir a que comprendas cómo has experimentado tu condición de salud hasta ahora, y que aprendas, sin cambiar quién eres, a que tengas más opciones, más amabilidad contigo mismo y más dirección hacia lo que realmente importa para ti.</p>

                <p>En el siguiente video explicaremos cómo está estructurado CRECE.</p>

                <div class="video-placeholder">A2_Estructura_CRECE</div>

                <p>Ahora que conoces más sobre CRECE, te invitamos a familiarizarte con tu espacio. Así podrás navegar tu recorrido con mayor claridad, confianza y menor esfuerzo. </p>

            </div>



            <h3>Panel principal</h3>
        </div>
    </section>
    <div class="divisor-modulo"></div>

    <section class="seccion-modulos">
        <h1 class="titulo-seccion-modulos">Recorrido del Programa CRECE</h1>
        <div class="contenedor-modulos">

            <?php foreach ($progresos as $modulo): ?>
                <?php
                $estaBloqueado = ($modulo['estatus'] === 'bloqueado');
                $esCompletado = ($modulo['estatus'] === 'completado');
                $esSeleccionable = ($modulo['estatus'] === 'seleccionable'); // NUEVO ESTADO
                ?>

                <div class="modulo <?php echo $estaBloqueado ? 'modulo--bloqueado' : ''; ?>">
                    <div class="icono-modulo">
                        <?php if ($estaBloqueado): ?>
                            <div class="candado-pm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </div>
                        <?php else: ?>
                            <div class="icono-modulo-<?php echo $modulo['id_modulo']; ?>"></div>
                        <?php endif; ?>
                    </div>

                    <p class="num-modulo">Módulo <?php echo $modulo['id_modulo']; ?></p>
                    <h2 class="titulo-modulo"><?php echo s($modulo['nombre_modulo']); ?></h2>

                    <div class="modulo-footer">
                        <?php if ($estaBloqueado): ?>
                            <p class="descripcion-modulo">Este módulo se encuentra bloqueado por el momento. Sigue avanzando en tu recorrido para acceder a él.</p>
                            <span class="btn-pm btn-pm--bloqueado">Bloqueado</span>

                        <?php elseif ($esSeleccionable): ?>

                            <div class="descripcion-seleccionable-fija">
                                <p class="descripcion-modulo">
                                    <strong style="color:#a30000;">Este módulo está disponible para que lo elijas. Al seleccionarlo, pausarás temporalmente las otras opciones.</strong>
                                    
                                </p>
                                <p class="descripcion-modulo">
                                    <?php echo s($modulo['descripcion']); ?>
                                </p>
                            </div>

                            <form method="POST" action="/elegir-modulo">
                                <input type="hidden" name="id_modulo_elegido" value="<?php echo $modulo['id_modulo']; ?>">
                                <button type="submit" class="btn-pm btn-pm--seleccionable ">
                                    Elegir este Módulo
                                </button>
                            </form>

                        <?php else: ?>
                            <div class="modulo-progreso-visual">
                                <?php
                                $totalCirculos = 5;
                                $progresoActual = max(0, (int)$modulo['actividad_actual'] - 1);
                                $progresoActual = min(5, $progresoActual);

                                for ($i = 1; $i <= $totalCirculos; $i++):
                                ?>
                                    <div class="circulo-progreso <?php echo ($i <= $progresoActual) ? 'circulo-progreso--activo' : ''; ?>"></div>
                                <?php endfor; ?>
                            </div>

                            <a href="/modulo<?php echo $modulo['id_modulo']; ?>" class="btn-pm">
                                <?php echo $esCompletado ? 'Repasar' : 'Continuar'; ?>
                            </a>

                            <div class="descripcion-expandible">
                                <div class="descripcion-contenido">
                                    <p class="descripcion-modulo"><?php echo s($modulo['descripcion']); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <div class="divisor-modulo"></div>

    <section class="panel-section section-b" id="seccion-b">
        <?php if ($usuario->id_estatus < 4): ?>
            <div class="panel-grid" style="opacity: 0.5; filter: grayscale(100%); pointer-events: none;">
                <div class="panel-text">
                    <h2>Integración y evaluación</h2>
                    <p>Evaluación final del impacto formativo.</p>
                    <span class="btn-pm btn-pm--bloqueado" style="display: inline-block; margin-top: 2rem;">
                        <i class="fas fa-lock"></i> Bloqueado (Finaliza el Módulo 7)
                    </span>
                </div>
                <div class="panel-image">
                    <img src="/build/img/atardecer.jpg" alt="Imagen sección B">
                </div>
            </div>

        <?php else: ?>
            <div class="cierre-container">
                <h2>Cierre y evaluación</h2>
                <p>¡Hola! Es un placer encontrarte en este punto de tu recorrido por CRECE.</p>
                <p>Has recorrido un camino que no siempre sigue líneas rectas. Has ido a tu ritmo, quizá con momentos de duda, pausas y también con momentos de claridad. Todo eso es parte del camino.</p>
                <p>Antes de continuar, te invito a hacer una pausa y observar cómo han sido estos últimos días en tu proceso con CRECE. En este tiempo:</p>

                <form class="form-observacion" action="/panel-modulos" method="POST">
                    <div class="obs-pregunta">
                        <p>1. Noto algún cambio en cómo me relaciono con mis pensamientos o emociones</p>
                        <label><input type="radio" name="obs1" value="Si, claramente" <?php echo (isset($observaciones['obs1']) && $observaciones['obs1'] === 'Si, claramente') ? 'checked' : ''; ?>> Sí, claramente</label>
                        <label><input type="radio" name="obs1" value="Un poco" <?php echo (isset($observaciones['obs1']) && $observaciones['obs1'] === 'Un poco') ? 'checked' : ''; ?>> Un poco</label>
                        <label><input type="radio" name="obs1" value="Aun no lo noto" <?php echo (isset($observaciones['obs1']) && $observaciones['obs1'] === 'Aun no lo noto') ? 'checked' : ''; ?>> Aún no lo noto</label>
                    </div>
                    <div class="obs-pregunta">
                        <p>2. Noto cambios en mis respuestas o comportamientos habituales</p>
                        <label><input type="radio" name="obs2" value="Si, claramente" <?php echo (isset($observaciones['obs2']) && $observaciones['obs2'] === 'Si, claramente') ? 'checked' : ''; ?>> Sí, claramente</label>
                        <label><input type="radio" name="obs2" value="Algunas respuestas" <?php echo (isset($observaciones['obs2']) && $observaciones['obs2'] === 'Algunas respuestas') ? 'checked' : ''; ?>> Algunas respuestas</label>
                        <label><input type="radio" name="obs2" value="Aun no lo noto" <?php echo (isset($observaciones['obs2']) && $observaciones['obs2'] === 'Aun no lo noto') ? 'checked' : ''; ?>> Aún no lo noto</label>
                    </div>
                    <div class="obs-pregunta">
                        <p>3. Practiqué alguno de los ejercicios y/o experimentos en mi vida diaria</p>
                        <label><input type="radio" name="obs3" value="No lo hice" <?php echo (isset($observaciones['obs3']) && $observaciones['obs3'] === 'No lo hice') ? 'checked' : ''; ?>> No lo hice</label>
                        <label><input type="radio" name="obs3" value="Varias veces" <?php echo (isset($observaciones['obs3']) && $observaciones['obs3'] === 'Varias veces') ? 'checked' : ''; ?>> Varias veces</label>
                        <label><input type="radio" name="obs3" value="Una vez" <?php echo (isset($observaciones['obs3']) && $observaciones['obs3'] === 'Una vez') ? 'checked' : ''; ?>> Una vez</label>
                    </div>

                    <?php if (!empty($observaciones)): ?>
                        <p style="color: #27ae60; font-weight: bold; margin-top: 1rem;"><i class="fas fa-check-circle"></i> Tus observaciones han sido guardadas con éxito.</p>
                    <?php endif; ?>

                    <button type="submit"
                        class="btn-pm <?php echo !empty($observaciones) ? 'boton boton-completado' : ''; ?>"
                        style="margin-top: 1rem;"
                        <?php echo !empty($observaciones) ? 'disabled' : ''; ?>>
                        <?php echo !empty($observaciones) ? 'Observaciones guardadas' : 'Guardar observación'; ?>
                    </button>
                </form>

                <p>Gracias por tu honestidad en la recta final del recorrido.</p>
                <p>A lo largo de este camino, has probado formas nuevas y diferentes de mirar tu experiencia, de relacionarte contigo y de acercarse, paso a paso, a lo que más te importa, a quienes más valoras.</p>
                <p>Que hoy te encuentres aquí no es casualidad, es tu esfuerzo y el espacio que has abierto para ti.</p>
                <p>Este espacio ha sido creado para reconocer lo que has estado construyendo, para llevar contigo lo más valioso de este proceso y para cerrar este ciclo con la mirada puesta en continuar.</p>
                <p>Encontrarás un breve recorrido integrador; posteriormente, te pediremos que realices el cuestionario final que nos permitirá comprender tu experiencia y seguir mejorando esta intervención.</p>
                <p>Al completarlo, observarás que se activa tu reconocimiento al compromiso y dedicación que has puesto.</p>

                <hr style="margin: 3rem 0; border: 1px solid #eee;">

                <h3>Integración. Sosteniendo el mapa</h3>
                <p>A lo largo del recorrido en CRECE, fuiste desarrollando habilidades y herramientas que ahora forman parte de tu camino. No importa el orden en los exploraste, lo importante es que ahora están contigo.</p>
                <p>Mira lo que has cultivado:</p>

                <div class="tarjetas-grid">
                    <div class="tarjeta-flip">
                        <div class="tarjeta-inner">
                            <div class="tarjeta-frente">Abrirme a la experiencia</div>
                            <div class="tarjeta-dorso">
                                <ul>
                                    <li>Aprendí a observar</li>
                                    <li>Hice espacio para las emociones, pensamientos, recuerdos, impulsos o sensaciones difíciles, intensas o abrumadoras</li>
                                    <li>Comprendí cómo se construye mi experiencia y que no me define</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tarjeta-flip">
                        <div class="tarjeta-inner">
                            <div class="tarjeta-frente">Conectar conscientemente con la dirección de mis valores</div>
                            <div class="tarjeta-dorso">
                                <ul>
                                    <li>Aprendí que puedo hacer una pausa</li>
                                    <li>Descubrí que puedo estar con lo que duele desde un lugar más amplio</li>
                                    <li>Desde la conciencia, puedo preguntarme ¿hacia dónde quiero dirigirme?</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tarjeta-flip">
                        <div class="tarjeta-inner">
                            <div class="tarjeta-frente">Dar pasos, con sentido e intencionados</div>
                            <div class="tarjeta-dorso">
                                <ul>
                                    <li>Descubrí que los pasos significativos pueden ser pequeños y se expresan de diferentes formas.</li>
                                    <li>Di pasos significativos hacia lo que valoro en medio del malestar</li>
                                    <li>Me dí cuenta que yo elijo el paso que quiero dar</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tarjeta-flip">
                        <div class="tarjeta-inner">
                            <div class="tarjeta-frente">Cuidarme con presencia y compromiso</div>
                            <div class="tarjeta-dorso">
                                <ul>
                                    <li>Abrí la posibilidad de tratarme con más amabilidad</li>
                                    <li>Descubrí que hay diferentes formas de responder a una situación de salud</li>
                                    <li>Descubrí que se trata de responder a lo que se necesita</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <p>Como ves, cada módulo fue una pieza que se integra al mapa de vida que deseas vivir.</p>
                <p>Seguramente algunas cosas resuenan más que otras. Algunas otras requieren tiempo y experiencias para asentarse y consolidarse.</p>
                <p>Ahora tienes un mapa con más rutas y herramientas que puedes llevar contigo, porque esto no termina aquí. Puedes volver a estas herramientas en lo cotidiano, en momentos difíciles o en momentos de decisiones.</p>

                <div class="frase-destacada">
                    Este mapa no está terminado, se sigue construyendo, incluso cuando no todo es claro. <br><br>
                    Avanza a tu ritmo, en la dirección que elijas, con paciencia y amabilidad, con lo que hoy es posible.
                </div>

                <hr style="margin: 3rem 0; border: 1px solid #eee;">

                <h3>Reconocimiento y cierre del recorrido</h3>
                <p>¡Has completado este recorrido! Tómate un momento para reconocer el compromiso que tuviste contigo y que puedes seguir creciendo paso a paso.</p>
                <p>A continuación encontrarás dos botones, el primero contiene el reconocimiento a tu tiempo, dedicación y compromiso, se descargará automáticamente a tu equipo en cuanto finalices el cuestionario postest.</p>
                <p>Este cuestionario busca explorar tu experiencia en las últimas semanas y dentro de esta herramienta, por lo que no hay respuestas correctas o incorrectas, solo importa lo que es cierto para ti.</p>

                <p style="text-align: center; font-weight: bold; margin-top: 2rem;">¡Agradecemos tu participación, tus respuestas son muy valiosas!</p>

                <div class="botones-finales">
                    <?php if ($usuario->id_cuestionario_pendiente == 14): ?>
                        <a href="/diploma" target="_blank" class="btn-pm" style="background-color: #c79e57; border: none; color: white;">
                            <i class="fas fa-file-pdf"></i> Descargar tu reconocimiento
                        </a>
                        <a href="#" class="btn-pm" style="background-color: #27ae60; border: none; color: white; pointer-events: none;">
                            <i class="fas fa-check"></i> Postest Completado
                        </a>
                    <?php else: ?>
                        <?php
                        // Mapa de rutas de tu código original
                        $rutasPostest = [
                            3 => '/c-pss-10',
                            5 => '/c-phq-9',
                            6 => '/c-gad-7',
                            7 => '/c-aaq-ii',
                            8 => '/c-who-5',
                            9 => '/c-scs',
                            10 => '/c-whoqol-bref',
                            11 => '/c-maas',
                            12 => '/c-apoi',
                            13 => '/c-salida'
                        ];
                        $ruta_actual = $rutasPostest[$usuario->id_cuestionario_pendiente] ?? '/c-pss-10';
                        $texto_boton = ($usuario->id_cuestionario_pendiente == 3) ? 'Iniciar Postest' : 'Continuar Postest';
                        ?>

                        <a href="#" class="btn-pm" style="background-color: #ccc; border: none; color: white; cursor: not-allowed; pointer-events: none;">
                            <i class="fas fa-lock"></i> Descargar tu reconocimiento
                        </a>

                        <a href="<?php echo $ruta_actual; ?>" class="btn-pm" style="background-color: #12307D; border: none; color: white;">
                            <?php echo $texto_boton; ?> <i class="fas fa-arrow-right"></i>
                        </a>
                    <?php endif; ?>
                </div>

                <div style="text-align: center;">
                    <img src="/build/img/logo-crece.webp" alt="Logo CRECE" class="logo-crece-cierre">
                </div>
            </div>
        <?php endif; ?>
    </section>

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
</main>

<script>
    function toggleModule(element) {
        document.querySelectorAll('.module-main').forEach(mod => {
            if (mod !== element) {
                mod.classList.remove('active');
            }
        });
        element.classList.toggle('active');
    }

    function mostrarSeccionA() {
        document.getElementById("contenido-seccion-a").style.display = "block";
    }

    function cerrarSeccionA() {
        document.getElementById("contenido-seccion-a").style.display = "none";
    }
</script>