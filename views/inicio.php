<!-- BARRA DE NAVEGACIÓN -->
<header>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="contenedor-cambiar-size">
            <button class="boton-cambiar-size" onclick="disminuirTexto()">A-</button>
            <button class="boton-cambiar-size" onclick="aumentarTexto()">A+</button>
        </div>
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/build/img/logo-crece.webp" alt="Logo del programa CRECE" class="navbar--logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="40"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="#000000"
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
                            <a class="nav-link-c nav-link-c--active" aria-current="page" href="#inicio">Inicio</a>
                        </li>
                        <li class="offcanvas-body nav-item">
                            <a class="nav-link-c" href="#quienes-somos">¿Quiénes somos?</a>
                        </li>
                        <li class="offcanvas-body nav-item">
                            <a class="nav-link-c" href="#faqs">Acerca de</a>
                        </li>
                        <li class="offcanvas-body nav-item">
                            <a class="nav-link-c" href="/login">Iniciar sesión</a>
                        </li>
                        <li class="offcanvas-body nav-item">
                            <a class="nav-link-c" href="/crear-cuenta">Crear cuenta</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- SECCIÓN PRINCIPAL -->
<main>
    <!-- CONTENEDOR DE LOGOS INVOLUCRADOS-->
    <section class="contenedor-logos">
        <a href="https://www.ipn.mx/" target="_blank">
            <img src="/build/img/logo-ipn.webp" alt="IPN" class="contenedor-logos__logo">
        </a>

        <a href="https://www.escom.ipn.mx/" target="_blank">
            <img src="/build/img/logo-escom.webp" alt="ESCOM" class="contenedor-logos__logo">
        </a>

        <a href="https://www.unam.mx/" target="_blank">
            <img src="/build/img/logo-unam.webp" alt="UNAM" class="contenedor-logos__logo">
        </a>

        <a href="https://suayed.iztacala.unam.mx/" target="_blank">
            <img src="/build/img/logo-suayed.webp" alt="FES Iztacala / SUAYED" class="contenedor-logos__logo">
        </a>

        <a href="https://labpsiit.iztacala.unam.mx/" target="_blank">
            <img src="/build/img/logo-labpsiit.webp" alt="LABPSIIT" class="contenedor-logos__logo">
        </a>
    </section>
    <!-- HERO SECTION -->

    <!-- LOGO Y LEMA -->
    <section class="contenedor hero-header">
        <div>
            <img src="/build/img/logo-crece.webp" alt="Logo del programa CRECE" />
        </div>
        <div>
            <p>POR UNA VIDA VALIOSA Y PLENA</p>
        </div>
    </section>

    <!-- FONDO ANIMADO -->
    <section class="hero-fondo-animado">
        <!-- <img src="/build/img/Campo_girasol.gif" alt="Fondo animado del programa CRECE"/> -->
    </section>

    <!-- ¿QUÉ ES CRECE? -->
    <section class="what-is-crece-columns" id="inicio">
        <div class="contenedor">
            <div class="gold-bar">
                <h2 class="section-title-centered">¿QUÉ ES CRECE?</h2>
            </div>

            <div class="three-column-layout">

                <div class="info-block">
                    <h3>CALIDAD DE VIDA</h3>
                    <p>El Programa Crece favorece el desarrollo de estrategias de manejo de condiciones crónicas que te permita desarrollar tu vida cotidiana con calidad.</p>
                    <a href="#" class="read-more-link">Leer más</a>
                </div>

                <div class="info-block">
                    <h3>PROGRAMA EN LÍNEA</h3>
                    <p>Acceso dentro de la plataforma con actividades predeterminadas y de corta duración que contribuirán a incrementar la calidad de vida, salud mental y promoción de hábitos físicos.</p>
                    <a href="#" class="read-more-link">Leer más</a>
                </div>

                <div class="info-block">
                    <h3>RESPALDO</h3>
                    <p>Forma parte de los proyectos de la Facultad de Estudios Superiores Iztacala de la UNAM para promover el bienestar y la salud mental mediante intervenciones digitales basadas en evidencia.</p>
                    <a href="#" class="read-more-link">Leer más</a>
                </div>
            </div>
        </div>
    </section>

    <!-- OTROS PROYECTOS -->
    <section class="contenedor otros-proyectos">
        <div class="titulo-otros-proyectos">
            <p>Investigamos cómo elevar el bienestar, la salud mental y la calidad de vida</p>
        </div>

        <div id="carouselExampleCaptions" class="carousel carousel-dark slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/build/img/work-in-progress.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Primer proyecto</h5>
                        <p>(Yo soy el primer slide)</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/build/img/work-in-progress.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Primer proyecto</h5>
                        <p>(Yo soy el segundo slide)</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/build/img/work-in-progress.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Primer proyecto</h5>
                        <p>(Yo soy el tercer slide)</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="titulo-otros-proyectos">
            <p>Conoce nuestros proyectos</p>
        </div>
        <div class="mensaje-otros-proyectos">
            <p>Buscamos soluciones a diferentes problemáticas y sectores de población</p>
        </div>
    </section>

    <!-- ¿QUIÉNES SOMOS? -->
    <section class="content-section who-we-are" id="quienes-somos">
        <div class="contenedor">
            <div class="gold-bar">
                <h2>¿Quiénes somos?</h2>
            </div>
            <div class="texto-justificado">
                <p>CRECE está conformado por un equipo multi e interdisciplinario para generar una solución tecnológica eficiente y útil en salud mental y calidad de vida. Es liderado por psicólogas y psicólogos de la UNAM que colaboran en el Laboratorio de Psicología e Innovación Tecnológica de la Facultad de Estudios Superiores Iztacala (LABPSIIT). Y en conjunto con desarrolladores de la Escuela Superior de Cómputo del IPN, es posible darle vida a este Programa. Cada uno aporta sus experiencias, conocimientos y pasión. ¡Te invitamos a conocernos!</p>
            </div>

            <div class="member-detail-panel" id="memberDetailPanel">
                <button class="close-panel-btn" id="closePanelBtn">
                    &times;
                </button>
                <img src="assets/placeholder-person.jpg" alt="Foto del miembro" class="detail-photo" id="detailPhoto">
                <h3 class="detail-name" id="detailName">Selecciona un miembro</h3>
                <p class="detail-role" id="detailRole"></p>
                <p class="detail-bio" id="detailBio">Haz clic en la foto de un miembro del equipo para ver su biografía completa aquí.</p>
            </div>

            <h3 class="team-title psychological-team">Equipo de investigación psicológica</h3>
            <div class="team-grid-container psych-team-grid">
                <!-- Miembro 1: Dra. Anabel de la Rosa Gómez -->
                <div class="team-member-card" data-member-id="anabel">
                    <img src="build/img/foto-anabel.jpg" alt="Dra. Anabel de la Rosa Gómez" class="member-photo">
                    <div class="member-details">
                        <h4 class="member-name">Dra. Anabel de la Rosa Gómez</h4>
                        <p class="member-role">Investigadora. Fundadora LABPSIIT</p>
                        <p class="member-bio-full" style="display: none;">Doctora en Psicología especializada en terapias cognitivo-conductuales y salud digital. Contribuye al diseño e implementación de intervenciones basadas en evidencia.</p>
                    </div>
                </div>
                <!-- Miembro 2: Dra. Lorena A. Flores Plata -->
                <div class="team-member-card" data-member-id="lorena">
                    <img src="build/img/foto-lorena.jpg" alt="Dra. Lorena A. Flores Plata" class="member-photo">
                    <div class="member-details">
                        <h4 class="member-name">Dra. Lorena A. Flores Plata</h4>
                        <p class="member-role">Investigadora. Coordinadora LABPSIIT</p>
                        <p class="member-bio-full" style="display: none;">Doctora en Psicología con especialización en intervenciones digitales para la salud mental. Líder en proyectos de investigación sobre calidad de vida en personas con condiciones crónicas.</p>
                    </div>
                </div>
                <!-- Miembro 3: Lic. Griselda Suzán Montoya -->
                <div class="team-member-card" data-member-id="griselda">
                    <img src="/build/img/foto-griselda.jpg" alt="Lic. Griselda Suzán Montoya" class="member-photo">
                    <div class="member-details">
                        <h4 class="member-name">Lic. Griselda Suzán Montoya</h4>
                        <p class="member-role">Licenciada en Psicología (UNAM)</p>
                        <p class="member-bio-full" style="display: none;">Titulada con Mención Honorífica en Psicología por la Facultad de Estudios Superiores Iztacala de la UNAM. Cuenta con entrenamientos en terapias humanistas y terapias cognitivo-conductuales de tercera generación. Actualmente es doctoranda en Psicología en la UNAM, en el campo del tratamiento psicológico en el ámbito clínico y de la salud. Es también fundadora y colaboradora del Laboratorio de Psicología e Innovación Tecnológica (LABPSIIT), donde participa en la generación de evidencia sobre el uso de tecnologías para la promoción de la salud mental. Dentro de sus principales intereses de investigación y laborales se encuentra la aplicación de terapias de tercera generación y el diseño de intervenciones en salud digital para el manejo de condiciones crónicas de salud.</p>
                    </div>
                </div>
                <!-- Miembro 4: Lic. Stephanie Cortés Abad -->
                <div class="team-member-card" data-member-id="stephanie">
                    <img src="/build/img/foto-stephanie.jpg" alt="Lic. Stephanie Cortés Abad" class="member-photo">
                    <div class="member-details">
                        <h4 class="member-name">Lic. Stephanie Cortés Abad</h4>
                        <p class="member-role">Colaboradora LABPSIIT</p>
                        <p class="member-bio-full" style="display: none;">Egresada de la Licenciatura en Psicología, de la Facultad de Estudios Superiores Iztacala, con profundización en el campo clínico. Su interés particular en la práctica terapéutica la ha llevado a colocarse en los trastornos emocionales y el trauma. Formó parte de los terapeutas del Centro de Apoyo Psicológico y Educativo a Distancia (CAPED), labor orientada a potenciar habilidades en las áreas clínica y educativa, incluyendo la intervención para disminuir el malestar emocional y su impacto en el rendimiento académico. Desde 2024 colabora de manera activa en el Laboratorio de Psicología e Innovación Tecnológica (LABPSIIT) de la FES Iztacala, participando en proyectos dedicados al diseño, desarrollo y aplicación de intervenciones clínicas y de salud sustentadas en evidencia científica, implementadas a través de aplicaciones móviles y plataformas web. Su labor ha abarcado tanto aspectos técnicos como acciones de divulgación en torno a la prevención y promoción de la salud mental, impartiendo charlas dirigidas a padres, tutores y estudiantes del Colegio de Ciencias y Humanidades. Ha participado en eventos de sensibilización y educación para la salud mental en diversas instituciones, incluyendo ferias organizadas en planteles del IPN.</p>
                    </div>
                </div>
                <!-- Miembro 5: Mtro. Javier D. Ríos Castillo -->
                <div class="team-member-card" data-member-id="javier">
                    <img src="build/img/foto-javier.jpg" alt="Mtro. Javier D. Ríos Castillo" class="member-photo">
                    <div class="member-details">
                        <h4 class="member-name">Mtro. Javier D. Ríos Castillo</h4>
                        <p class="member-role">Investigador. Maestro en Psicología</p>
                        <p class="member-bio-full" style="display: none;">Maestro en Psicología con experiencia en el desarrollo de programas de intervención para la mejora de la calidad de vida en población con condiciones crónicas. Colaborador activo en proyectos de investigación del LABPSIIT.</p>
                    </div>
                </div>
                <!-- Miembro 6: Lic. Zuleyca -->
                <div class="team-member-card" data-member-id="zuleyca">
                    <img src="build/img/foto-zuleyca.jpg" alt="Lic. Zuleyca Pérez Martínez" class="member-photo">
                    <div class="member-details">
                        <h4 class="member-name">Lic. Zuleyca Pérez Martínez</h4>
                        <p class="member-role">Licenciada en Psicología</p>
                        <p class="member-bio-full" style="display: none;">Licenciada en Psicología con experiencia en el área clínica y de investigación. Colabora en el desarrollo de estrategias de intervención para el programa CRECE.</p>
                    </div>
                </div>
                <!-- Miembro 7: Lic. Nayeli de la Rosa -->
                <div class="team-member-card" data-member-id="nayeli">
                    <img src="build/img/foto-nayeli.jpg" alt="Lic. Nayeli de la Rosa" class="member-photo">
                    <div class="member-details">
                        <h4 class="member-name">Lic. Nayeli de la Rosa</h4>
                        <p class="member-role">Licenciada en Psicología</p>
                        <p class="member-bio-full" style="display: none;">Licenciada en Psicología con enfoque en salud mental y bienestar. Participa en la implementación y evaluación de intervenciones digitales del programa CRECE.</p>
                    </div>
                </div>
                <!-- Miembro 8: Psic. Susana Martínez Bautista -->
                <div class="team-member-card" data-member-id="susana">
                    <img src="build/img/foto-susana.jpg" alt="Psic. Susana Martínez Bautista" class="member-photo">
                    <div class="member-details">
                        <h4 class="member-name">Psic. Susana Martínez Bautista</h4>
                        <p class="member-role">Licenciada en Psicología</p>
                        <p class="member-bio-full" style="display: none;">Psicóloga con experiencia en intervención clínica y promoción de la salud mental. Colabora en el desarrollo de contenidos terapéuticos para el programa CRECE.</p>
                    </div>
                </div>
            </div>

            <h3 class="team-title technology-team">Equipo de Desarrollo Tecnológico</h3>
            <div class="team-grid-container tech-team-grid">
                <div class="team-member-card" data-member-id="jose">
                    <img src="build/img/foto-jose.jpg" alt="Dr. José A. Jiménez Benitez" class="member-photo">
                    <div class="member-details">
                        <h4 class="member-name">Dr. José A. Jiménez Benitez</h4>
                        <p class="member-role">Doctor en Ciencias de la Computación</p>
                        <p class="member-bio-full" style="display: none;">Doctor en Ciencias de la Computación con especialización en desarrollo de aplicaciones para la salud digital. Asesor técnico del proyecto CRECE, aporta su experiencia en arquitectura de software y sistemas de información en salud.</p>
                    </div>
                </div>
                <div class="team-member-card" data-member-id="david">
                    <img src="build/img/foto-david.jpg" alt="Mtro. David Araujo" class="member-photo">
                    <div class="member-details">
                        <h4 class="member-name">Mtro. David Araujo</h4>
                        <p class="member-role">Maestro en Ciencias de la Computación</p>
                        <p class="member-bio-full" style="display: none;">Maestro en Ciencias de la Computación con experiencia en desarrollo de plataformas web y aplicaciones móviles. Colabora en la arquitectura técnica y la implementación de soluciones tecnológicas para el programa CRECE.</p>
                    </div>
                </div>
                <div class="team-member-card" data-member-id="alan">
                    <img src="/build/img/foto-alan.jpg" alt="Ing. Alan Enrique Lopez Mata" class="member-photo">
                    <div class="member-details">
                        <h4 class="member-name">Ing. Alan Enrique Lopez Mata</h4>
                        <p class="member-role">Desarrollador Web</p>
                        <p class="member-bio-full" style="display: none;">Estudiante de la ESCOM, responsable del desarrollo backend de la plataforma CRECE. Encargado del diseño e implementación de la base de datos en MySQL y del uso del patrón MVC para la organización del sistema. Enfocado en la construcción de soluciones funcionales, estructuradas y escalables.</p>
                    </div>
                </div>
                <div class="team-member-card" data-member-id="joselyn">
                    <img src="/build/img/foto-joselyn.jpg" alt="Ing. Joselyn Guadalupe Mireles Silvestre" class="member-photo">
                    <div class="member-details">
                        <h4 class="member-name">Ing. Joselyn Guadalupe Mireles Silvestre</h4>
                        <p class="member-role">Desarrolladora Web</p>
                        <p class="member-bio-full" style="display: none;">Estudiante de la ESCOM, responsable del diseño de la interfaz de usuario, garantizando la usabilidad y accesibilidad del programa en diferentes dispositivos. Se especializa en la creación de wireframes, prototipos y mockups, así como en la realización de pruebas de usuario para asegurar una experiencia intuitiva y agradable. Joselyn tiene un fuerte enfoque en el diseño centrado en el usuario y se esfuerza por traducir requisitos complejos en interfaces sencillas y atractivas. Su trabajo es fundamental para que el Programa CRECE sea fácil de usar y visualmente atractivo para todos los participantes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ACERCA DE -->
    <section class="content-section faq-section" id="faqs">
        <div class="contenedor">
            <div class="gold-bar">
                <h2>Acerca de</h2>
            </div>
            <div class="faq-item">
                <h3>¿El programa CRECE es un tratamiento psicológico?</h3>
                <p class="texto-justificado">No, es una intervención psicológica basada en evidencia científica que no sustituye un tratamiento psicológico o tratamiento médico pertinente.</p>
            </div>

            <div class="faq-item">
                <h3>¿Cómo me puedo inscribir?</h3>
                <p class="texto-justificado">Puedes registrarte desde la página con un correo válido, <a href="/crear-cuenta">registrate aquí</a>.</p>
            </div>

            <div class="faq-item">
                <h3>¿Cuáles son los requisitos para inscribirse a la intervención psicológica?</h3>
                <p class="texto-justificado">Solo necesitas tener un correo válido que uses frecuentemente y compromiso para completar de inicio a fin.</p>
            </div>

            <div class="faq-item">
                <h3>¿Todas las personas que se registren pueden participar?</h3>
                <p class="texto-justificado">No, existen algunos criterios de exclusión debido a que el Programa CRECE se encuentra en un proceso de investigación y está orientado a quien padece alguna condición física crónica no transmisible.</p>
            </div>

            <div class="faq-item">
                <h3>¿A qué me comprometo al inscribirme en el Programa?</h3>
                <p class="texto-justificado">Al estar inserto en un estudio académico que busca beneficiar a quien presenta una condición física crónica no transmisible implica que:</p>
                <ul>
                    <li>Realices las actividades y ejercicios de cada módulo.</li>
                    <li>Contestes algunos cuestionarios antes de comenzar, durante y al finalizar el programa.</li>
                    <li>Respondas una encuesta de satisfacción y usabilidad al cierre.</li>
                    <li>Completes un cuestionario de seguimiento 3 meses después.</li>
                </ul>
                <p class="texto-justificado">Al crear una cuenta en el sistema podrás leer con detenimiento el Consentimiento Informado.</p>
            </div>

            <div class="faq-item">
                <h3>¿Por qué es importante este compromiso?</h3>
                <p class="texto-justificado">Con ello nos permites analizar la calidad y aceptabilidad del sistema, identificar qué fue de mayor utilidad y así mejorar la experiencia y ofrecer evidencia que respalde su aplicación, de manera que contribuyes al desarrollo de programas que beneficiarán a más personas en el futuro.</p>
            </div>

            <div class="faq-item">
                <h3>¿Cuál es la duración de la intervención psicológica?</h3>
                <p class="texto-justificado">No tiene una duración limitada. Está diseñado para que dedicas tiempos cortos diariamente, entre 15 y 25 minutos dependiendo de la actividad. De esta forma, cada uno de los siete módulos lo podrás terminar en el lapso de una semana.</p>
            </div>

            <div class="faq-item">
                <h3>¿En qué dispositivos puedo hacer mis actividades?</h3>
                <p class="texto-justificado">Para mayor comodidad de visualización, se recomienda ingresar mediante el navegador de una PC o laptop. Sin embargo, también se puede acceder mediante otro dispositivo como tabletas o teléfonos inteligentes.</p>
            </div>

            <div class="faq-item">
                <h3>¿Tiene algún costo el Programa?</h3>
                <p class="texto-justificado">El Programa CRECE es totalmente gratuito, al ser parte de un proyecto de investigación de la UNAM. En ninguna fase del proyecto se cobrará ningún monto.</p>
            </div>

            <div class="faq-item">
                <h3>¿Qué sustenta el diseño de la intervención del Programa?</h3>
                <p class="texto-justificado">Los contenidos del Programa están basados en principios contextuales cognitivos integrados para promover la flexibilidad psicológica, la compasión, y el manejo de síntomas físicos y emocionales asociados a condiciones crónicas validadas científicamente.</p>
            </div>

            <div class="faq-item">
                <h3>¿Cuál es la finalidad de la intervención psicológica que ofrecen?</h3>
                <p class="texto-justificado">El Programa CRECE tiene el propósito de proporcionar herramientas que permitan mejorar tu bienestar mental y emocional, y que tengas mecanismos que te ayuden a corto, mediano y largo plazo.</p>
            </div>

            <div class="faq-item">
                <h3>¿Se garantiza la privacidad y confidencialidad de los datos e información proporcionada durante la intervención psicológica?</h3>
                <p class="texto-justificado">Todos los datos e información que nos proporcionas son tratados con privacidad y confidencialidad. Puedes consultar el <a href="#">aviso de privacidad</a>.</p>
            </div>
        </div>
    </section>

    <section class="contenedor invitacion-registro">
        <p class="login-prompt">Te invitamos a <a href="/crear-cuenta">registrarte</a> para dedicar tiempo en ti y para construir una vida más saludable.</p>
    </section>
    <!-- FOOTER -->
    <footer class="main-footer">
        <div class="footer-content contenedor">

            <div class="logo-icon-row">

                <div class="developed-by-logos">
                    <h4 class="footer-title developed">Desarrollado por</h4>
                    <a href="https://www.ipn.mx/" class="circle-item"><img src="/build/img/logo-ipn.webp" alt="IPN" class="logo-item"></a>
                    <a class="circle-item"><img src="/build/img/logo-escom.webp" alt="ESCOM" class="logo-item"></a>
                    <a class="circle-item"><img src="/build/img/logo-unam.webp" alt="UNAM" class="logo-item"></a>
                    <a class="circle-item"><img src="/build/img/logo-suayed.webp" alt="FES Iztacala" class="logo-item"></a>
                    <a class="circle-item"><img src="/build/img/logo-labpsiit.webp" alt="Labpsiit" class="logo-item"></a>
                    
                </div>

                <div class="social-media-group">
                    <h4 class="footer-title social">Nuestras redes sociales</h4>
                    <a class="circle-item social-icon-wrapper"><a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a></a>
                    <a class="circle-item social-icon-wrapper"><a href="#" class="social-icon"><i class="fab fa-instagram"></i></a></a>
                    <a class="circle-item social-icon-wrapper"><a href="#" class="social-icon"><i class="fab fa-youtube"></i></a></a>
                    
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