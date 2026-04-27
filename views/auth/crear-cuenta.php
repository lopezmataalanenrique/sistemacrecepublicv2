<div class="dos-columnas">
    <div class="contenedor-sidebar">
        <div class="tarjeta-blanca-sidebar">
            <div class="sidebar-content">
                <a href="/">
                    <img src="/build/img/logo-crece.webp" alt="Programa CRECE" class="auth-sidebar-logo">
                </a>
                <h2 class="titulo-bienvenida">Bienvenido/a</h2>
                <p class="texto-sidebar">Únete al Programa CRECE y comienza tu camino hacia una vida más plena y saludable.</p>

                <a href="/login" class="enlace-secundario-sidebar">¿Ya tienes cuenta? Iniciar sesión</a>
            </div>
            <a href="/">
                <div class="regresar-inicio">

                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="40"
                            height="40"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="#12307D"
                            stroke-width="1.75"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M10 12h4v4h-4z" />
                        </svg>
                    </div>
                    <div>
                        <p class="texto-regresar-inicio">
                            Inicio
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="formulario">
        <div class="auth-container">
            <div class="auth-header">
                <h1 class="auth-title">Crear nueva cuenta</h1>
                <p class="auth-subtitle">Ingrese sus datos para comenzar</p>
            </div>

            <div class="auth-card">

                <?php
                include_once __DIR__ . "/../templates/alertas.php";
                ?>

                <form method="POST" action="/crear-cuenta" novalidate>
                    <div class="input-row">
                        <div class="pregunta-formulario">
                            <div>
                                <label for="nombre" class="fas fa-user icon">Nombre</label>
                            </div>
                            <div>
                                <input
                                    type="text"
                                    id="nombre"
                                    name="nombre"
                                    placeholder="Tu nombre"
                                    autocomplete="given-name"
                                    value="<?php echo s($usuario->nombre); ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="pregunta-formulario">
                            <div>
                                <label for="apellido_paterno" class="fas fa-user icon">Apellido</label>
                            </div>
                            <div>
                                <input
                                    type="text"
                                    id="apellido_paterno"
                                    name="apellido_paterno"
                                    placeholder="Tú apellido"
                                    autocomplete="family-name"
                                    value="<?php echo s($usuario->apellido_paterno) ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="pregunta-formulario">
                            <div>
                                <label for="email" class="fas fa-user icon">Correo principal</label>
                            </div>
                            <div>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="Tú correo principal"
                                    autocomplete="username"
                                    value="<?php echo s($usuario->email) ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="pregunta-formulario">
                            <div>
                                <label for="email_alt" class="fas fa-user icon">Correo alterno</label>
                            </div>
                            <div>
                                <input
                                    type="email"
                                    id="email_alt"
                                    name="email_alt"
                                    placeholder="Tú correo alterno"
                                    autocomplete="off"
                                    value="<?php echo s($usuario->email_alt) ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="pregunta-formulario">
                            <div>
                                <label for="password" class="fas fa-user icon">Contraseña</label>
                            </div>
                            <div>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Tu contraseña"
                                    autocomplete="new-password"
                                    aria-describedby="passwordHelp" />

                                <small class="password-requisitos">
                                    La contraseña debe tener:
                                    <ul>
                                        <li>Al menos 8 caracteres</li>
                                        <li>Una letra mayúscula</li>
                                        <li>Una letra minúscula</li>
                                        <li>Un número</li>
                                        <li>Un carácter especial (ej. !@#$%)</li>
                                    </ul>
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="pregunta-formulario">
                            <div>
                                <label for="password_confirm" class="fas fa-user icon">Verificar contraseña</label>
                            </div>
                            <div>
                                <input
                                    type="password"
                                    id="password_confirm"
                                    name="password_confirm"
                                    placeholder="Tú contraseña de nuevo"
                                    autocomplete="new-password" />
                            </div>
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="pregunta-formulario">
                            <div class="input-group half-width">
                                <label for="id_sexo" class="fas fa-venus-mars icon">Sexo</label>
                            </div>
                            <div>
                                <select id="id_sexo" name="id_sexo">
                                    <option value="1" <?php echo s($usuario->id_sexo == 1) ? 'selected' : ''; ?>>Hombre</option>
                                    <option value="2" <?php echo s($usuario->id_sexo == 2) ? 'selected' : ''; ?>>Mujer</option>
                                    <option value="3" <?php echo s($usuario->id_sexo == 3) ? 'selected' : ''; ?>>No binario</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="pregunta-formulario">
                            <div>
                                <label for="fecha_nac" class="fas fa-calendar-alt icon">
                                    Fecha de nacimiento
                                </label>
                            </div>
                            <div>

                                <input
                                    type="date"
                                    id="fecha_nac"
                                    name="fecha_nac"
                                    autocomplete="bday"
                                    value="<?php echo s($usuario->fecha_nac); ?>"
                                    required />
                            </div>
                            <div>
                                <small class="hint">
                                    Selecciona tu fecha de nacimiento en el calendario
                                </small>
                            </div>
                        </div>
                    </div>

                    <?php $valor_seleccionado_cronica = $_POST['condicion_cronica'] ?? null; ?>

                    <div class="pregunta-formulario">
                        <div>
                            <p>¿Padece alguna condición crónica?</p>
                        </div>
                        <div class="pregunta-formulario-radioButtons">

                            <label>
                                <input
                                    type="radio"
                                    name="condicion_cronica"
                                    value="1"
                                    required
                                    <?php echo ($valor_seleccionado_cronica == '1') ? 'checked' : ''; ?> />
                                <p>Sí</p>
                            </label>
                            <label>
                                <input
                                    type="radio"
                                    name="condicion_cronica"
                                    value="0"
                                    required
                                    <?php echo ($valor_seleccionado_cronica == '0') ? 'checked' : ''; ?> />
                                <p>No</p>
                            </label>

                        </div>
                    </div>

                    <div class="input-row">
                        <div class="pregunta-formulario">
                            <div>
                                <label for="id_tratamiento">Tipo de tratamiento</label>
                            </div>
                            <div>
                                <select id="id_tratamiento" name="id_tratamiento">
                                    <option value="1" <?php echo s($usuario->id_tratamiento == 1) ? 'selected' : ''; ?>>Únicamente tratamiento médico</option>
                                    <option value="2" <?php echo s($usuario->id_tratamiento == 2) ? 'selected' : ''; ?>>Tratamiento psicológico y psiquiátrico</option>
                                    <option value="3" <?php echo s($usuario->id_tratamiento == 3) ? 'selected' : ''; ?>>Tratamiento psicológico</option>
                                    <option value="4" <?php echo s($usuario->id_tratamiento == 3) ? 'selected' : ''; ?>>Sin tratamiento</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <?php
                    $valor_seleccionado = $_POST['supervision_medica'] ?? null;
                    ?>

                    <div class="pregunta-formulario">
                        <div>
                            <p>¿Se encuentra bajo supervisión médica?</p>
                        </div>
                        <div class="pregunta-formulario-radioButtons">
                            <label>
                                <input
                                    type="radio"
                                    name="supervision_medica"
                                    value="1"
                                    required
                                    <?php echo ($valor_seleccionado == '1') ? 'checked' : ''; ?> />
                                Sí
                            </label>
                            <label>
                                <input
                                    type="radio"
                                    name="supervision_medica"
                                    value="0"
                                    required
                                    <?php echo ($valor_seleccionado == '0') ? 'checked' : ''; ?> />
                                No
                            </label>
                        </div>
                    </div>

                    <div class="crear-cuenta-terminos">
                        <div class="crear-cuenta-header-legal">
                            <p class="crear-cuenta-label">Consentimiento Informado y Aviso de Privacidad</p>
                            <div class="crear-cuenta-descargas">
                                <a href="/descargas/Propuesta_consentimiento_informado_Crece.pdf" class="btn-descarga" download>
                                    <i class="fas fa-file-download"></i> Consentimiento
                                </a>
                                <a href="/descargas/Propuesta_de_Aviso_de_Privacidad.pdf" class="btn-descarga" download>
                                    <i class="fas fa-file-download"></i> Aviso Integral
                                </a>
                            </div>
                        </div>

                        <div class="crear-cuenta-scroll" id="contenedor-legal">
                            <div class="crear-cuenta-texto texto-justificado">

                                <h3>Aviso de Privacidad Simplificado</h3>
                                <p>El LABPSIIT de la FES Iztacala, UNAM, es responsable del tratamiento de sus datos personales.</p>

                                <p><strong>Finalidad:</strong> Los datos se recaban para gestionar su cuenta, identificar el grado de adecuación del programa a sus necesidades reportadas y realizar análisis estadísticos de investigación. Sus datos sensibles serán protegidos bajo estrictas medidas de seguridad físicas, técnicas y administrativas.</p>

                                <p><strong>Derechos ARCO:</strong> Usted puede acceder, rectificar, cancelar u oponerse al tratamiento de sus datos enviando un correo a 420178581@iztacala.unam.mx con el asunto "ARCO".</p>

                                <p>Para mayor detalle consulta el <a href="#">aviso de privacidad integral</a>.</p>

                                <h3>Consentimiento Informado</h3>
                                <p>Usted ha sido invitado a participar en el estudio científico "Programa de Compromiso como Respuesta a las Condiciones Crónicas En Línea: Estudio de viabilidad", coordinado por el Laboratorio de Psicología e Innovación Tecnológica de la FES Iztacala, UNAM.</p>

                                <p>Los detalles de las características del programa y las condiciones de su participación se describen en el <a href="#">consentimiento informado</a>.</p>

                                <hr>
                                <p><em>Al llegar al final de este texto, confirma que ha leído y comprendido que sus datos serán protegidos y utilizados únicamente con fines académicos y de investigación.</em></p>
                            </div>
                        </div>

                        <div class="crear-cuenta-checkbox-group">
                            <label class="crear-cuenta-checkbox-label">
                                <input id="aceptar" type="checkbox" name="terminos" disabled required>
                                <span class="crear-cuenta-checkbox-texto">He leído y acepto el Consentimiento Informado y el Aviso de Privacidad</span>
                            </label>
                        </div>
                    </div>

                    <div class="contenedor-bcc">
                        <input class="auth-button" type="submit" value="Crear cuenta" />
                    </div>

                    <a href="/login" class="forgot-password">¿Ya tienes cuenta? Inicia sesión</a>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const contenedorLegal = document.getElementById('contenedor-legal');
        const checkboxAceptar = document.getElementById('aceptar');

        if (contenedorLegal && checkboxAceptar) {
            contenedorLegal.addEventListener('scroll', () => {
                // Detecta si el usuario llegó al fondo del scroll
                const scrollTotal = contenedorLegal.scrollHeight - contenedorLegal.clientHeight;
                const scrollActual = contenedorLegal.scrollTop;

                // Usamos un margen de 5px para asegurar que detecte el final en cualquier navegador
                if (scrollActual >= scrollTotal - 5) {
                    checkboxAceptar.disabled = false;
                }
            });
        }
    });

    const radios = document.querySelectorAll('input[name="condicion_cronica"]');
    const tratamiento = document.getElementById('id_tratamiento');

    function toggleTratamiento() {
        const selected = document.querySelector('input[name="condicion_cronica"]:checked');

        if (selected && selected.value === "0") {
            // Si elige "No", seleccionamos la opción 4 y deshabilitamos
            tratamiento.value = "4";
            tratamiento.disabled = true;
        } else {
            // Si elige "Sí" y estaba en "Sin tratamiento", lo regresamos a la opción 1 por defecto
            if (tratamiento.value === "4") {
                tratamiento.value = "1";
            }
            tratamiento.disabled = false;
        }
    }

    radios.forEach(r => r.addEventListener('change', toggleTratamiento));
    toggleTratamiento();
</script>