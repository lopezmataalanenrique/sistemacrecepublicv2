<nav class="navbar navbar-pm navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand navbar-brand-pm" href="/panel-modulos">
            <div class="inicio-pm">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="#FFF">
                        <path d="M12.707 2.293l9 9c.63 .63 .184 1.707 -.707 1.707h-1v6a3 3 0 0 1 -3 3h-1v-7a3 3 0 0 0 -2.824 -2.995l-.176 -.005h-2a3 3 0 0 0 -3 3v7h-1a3 3 0 0 1 -3 -3v-6h-1c-.89 0 -1.337 -1.077 -.707 -1.707l9 -9a1 1 0 0 1 1.414 0m.293 11.707a1 1 0 0 1 1 1v7h-4v-7a1 1 0 0 1 .883 -.993l.117 -.007z" />
                    </svg>
                </div>
                <div>
                    <p>Panel</p>
                </div>
            </div>
        </a>
        <div class="navbar-modulo-nombre">Instrumentos de Salida</div>
    </div>
</nav>

<header class="encabezado-panel">
    <div class="encabezado-panel-instituciones">
        <img class="encabezado-panel__logo" src="/build/img/logo-ipn.webp" alt="IPN">
        <img class="encabezado-panel__logo" src="/build/img/logo-escom.webp" alt="ESCOM">
        <img class="encabezado-panel__logo" src="/build/img/logo-unam.webp" alt="UNAM">
        <img class="encabezado-panel__logo" src="/build/img/logo-suayed.webp" alt="FES Iztacala / SUAYED">
        <img class="encabezado-panel__logo" src="/build/img/logo-labpsiit.webp" alt="LABPSIIT">
    </div>
    <div class="encabezado-panel-logo-crece">
        <img class="encabezado-panel__logo" src="/build/img/logo-crece.webp" alt="Logo del programa CRECE" />
    </div>
</header>

<main class="cuerpo-modulo">
    <section class="encabezado-modulo">
        <h1>Evaluación Final del Programa CRECE</h1>
        <p class="texto-justificado">Para nosotros es muy importante conocer sobre tu experiencia en el Programa CRECE, esto ayudará a mejorar las intervenciones psicológicas digitales, por eso te pedimos contestes algunas preguntas:</p>
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    </section>

    <form method="POST" action="/c-salida" id="form-salida">

        <div class="m1-experimento-seccion" style="padding: 4rem; margin-bottom: 4rem;">
            <p class="m1-experimento-titulo">1. ¿Descargó alguno de los audios, videos, material imprimible para realizarlos durante su vida diaria?</p>
            <?php $val_1301 = $respuestas['1301'] ?? ''; ?>
            <label class="m1-check-contenedor" style="margin-bottom: 1rem; display: block;">
                <input type="radio" name="respuestas[1301]" value="13011" class="m1-check-input req-radio" <?php echo ($val_1301 === '13011') ? 'checked' : ''; ?>>
                <span class="m1-check-custom" style="border-radius: 50%;"></span>
                <span class="m1-check-texto">Sí</span>
            </label>
            <label class="m1-check-contenedor" style="display: block;">
                <input type="radio" name="respuestas[1301]" value="13012" class="m1-check-input req-radio" <?php echo ($val_1301 === '13012') ? 'checked' : ''; ?>>
                <span class="m1-check-custom" style="border-radius: 50%;"></span>
                <span class="m1-check-texto">No</span>
            </label>
        </div>

        <div class="m1-experimento-seccion">
            <h2 class="act-titulo">Encuesta de Usabilidad (SUS)</h2>
            <p class="texto-justificado" style="margin-bottom: 2rem; color: #666;">Dónde:</p>
            <p class="texto-justificado" style="margin-bottom: 2rem; color: #666;">1 = completamente en desacuerdo</p>
            <p class="texto-justificado" style="margin-bottom: 2rem; color: #666;">5 = totalmente de acuerdo</p>
            <?php
            $preguntas_sus = [
                1302 => 'Creo que me gustaría utilizar con frecuencia esta plataforma',
                1303 => 'La plataforma me pareció innecesariamente compleja',
                1304 => 'Pienso que fue fácil utilizar la plataforma',
                1305 => 'Creo que se necesita el apoyo de un experto para navegar dentro de la plataforma',
                1306 => 'Encontré que los componentes de la plataforma están bastante bien integrados',
                1307 => 'Creo que la plataforma presentó demasiadas inconsistencias',
                1308 => 'Creo que la mayoría de las personas aprenderían muy rápidamente a utilizar la plataforma',
                1309 => 'Me pareció que la plataforma es demasiado extensa para su uso',
                1310 => 'Me sentí muy confiado y seguro',
                1311 => 'Necesité aprender muchas cosas antes de poder usar la plataforma'
            ];

            foreach ($preguntas_sus as $id => $pregunta):
                $val_actual = $respuestas[$id] ?? '';
            ?>
                <div style="margin-bottom: 3rem; padding-bottom: 2rem; border-bottom: 1px solid #e0e0e0;">
                    <p class="m1-experimento-titulo texto-justificado" ><?php echo $pregunta; ?></p>
                    <div style="display: flex; gap: 2rem; flex-wrap: wrap;">
                        <?php for ($i = 1; $i <= 5; $i++):
                            $radio_val = $id . $i;
                        ?>
                            <label class="m1-check-contenedor">
                                <input type="radio" name="respuestas[<?php echo $id; ?>]" value="<?php echo $radio_val; ?>" class="m1-check-input req-radio" <?php echo ($val_actual == $radio_val) ? 'checked' : ''; ?>>
                                <span class="m1-check-custom" style="border-radius: 50%;"></span>
                                <span class="m1-check-texto"><?php echo $i; ?></span>
                            </label>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="m1-experimento-seccion" style="padding: 4rem; margin-bottom: 4rem;">
            <h2 class="act-titulo">Encuesta de Aceptación, satisfacción e idoneidad</h2>
            <p class="texto-justificado" style="margin-bottom: 2rem; color: #666;">Dónde:</p>
            <p class="texto-justificado" style="margin-bottom: 2rem; color: #666;">1 = Nada</p>
            <p class="texto-justificado" style="margin-bottom: 2rem; color: #666;">10 = Muchísimo</p>
            
            <?php
            $preguntas_1_10 = [
                1312 => 'El programa CRECE fue adecuado para mi',
                1313 => '¿Cree que el programa CRECE fue útil en su caso?',
                1314 => '¿Cree que el programa CRECE podría ser útil para tratar otros problemas psicológicos?'
            ];
            foreach ($preguntas_1_10 as $id => $pregunta):
                $val_actual = $respuestas[$id] ?? '';
            ?>
                <div style="margin-bottom: 3rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;"><?php echo $pregunta; ?></p>
                    <select name="respuestas[<?php echo $id; ?>]" class="m1-select-personalizado req-select" style="width: 100%; padding: 1rem; border-radius: 0.8rem;">
                        <option value="">-- Selecciona del 1 al 10 --</option>
                        <?php for ($i = 1; $i <= 10; $i++):
                            $opt_val = $id . str_pad($i, 2, "0", STR_PAD_LEFT);
                        ?>
                            <option value="<?php echo $opt_val; ?>" <?php echo ($val_actual == $opt_val) ? 'selected' : ''; ?>>
                                <?php echo $i; ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
            <?php endforeach; ?>

            <div style="margin-top: 4rem; margin-bottom: 4rem;">
                <p style="font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">1. En general, ¿qué tan satisfecho(a) está con la forma en que el programa CRECE ha tratado su problema?</p>
                <?php
                $val_1315 = $respuestas['1315'] ?? '';
                $satis1 = [
                    1 => 'Completamente insatisfecho/a', 
                    2 => 'Muy insatisfecho/a', 
                    3 => 'Algo insatisfecho/a', 
                    4 => 'Bastante satisfecho/a', 
                    5 => 'Muy satisfecho/a', 
                    6 => 'Completamente satisfecho/a'
                ];
                foreach ($satis1 as $k => $txt):
                    $radio_val = "1315" . $k;
                ?>
                    <label class="m1-check-contenedor" style="display: block; margin-bottom: 1rem;">
                        <input type="radio" name="respuestas[1315]" value="<?php echo $radio_val; ?>" class="m1-check-input req-radio" <?php echo ($val_1315 == $radio_val) ? 'checked' : ''; ?>>
                        <span class="m1-check-custom" style="border-radius: 50%;"></span>
                        <span class="m1-check-texto"><?php echo $txt; ?></span>
                    </label>
                <?php endforeach; ?>
            </div>

            <div style="margin-top: 4rem; margin-bottom: 4rem;">
                <p style="font-weight: 700; color: #12307D; margin-bottom: 1.5rem;">2. ¿Le ha ayudado el programa CRECE en relación con un problema específico?</p>
                <?php
                $val_1316 = $respuestas['1316'] ?? '';
                $ayuda_especifica = [
                    1 => 'No estoy seguro/a', 
                    2 => 'Hizo que las cosas empeoraran bastante', 
                    3 => 'Hizo que las cosas empeoraran un poco', 
                    4 => 'No ha habido cambios', 
                    5 => 'Hizo que las cosas mejoraran algo', 
                    6 => 'Hizo que las cosas mejoraran mucho'
                ];
                foreach ($ayuda_especifica as $k => $txt):
                    $radio_val = "1316" . $k;
                ?>
                    <label class="m1-check-contenedor" style="display: block; margin-bottom: 1rem;">
                        <input type="radio" name="respuestas[1316]" value="<?php echo $radio_val; ?>" class="m1-check-input req-radio" <?php echo ($val_1316 == $radio_val) ? 'checked' : ''; ?>>
                        <span class="m1-check-custom" style="border-radius: 50%;"></span>
                        <span class="m1-check-texto"><?php echo $txt; ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="m1-experimento-seccion" style="padding: 4rem; margin-bottom: 4rem;">
            <h2 class="act-titulo">Idoneidad</h2>
            <p class="texto-justificado" style="margin-bottom: 2rem; color: #666;">Dónde:</p>
            <p class="texto-justificado" style="margin-bottom: 2rem; color: #666;">1 = Nada</p>
            <p class="texto-justificado" style="margin-bottom: 2rem; color: #666;">10 = Muchísimo</p>
            
            <?php
            $preguntas_idoneidad = [
                1317 => '¿Las estrategias terapéuticas/ tareas/ actividades que se utilizaron a lo largo de esta aplicación fueron entendibles para usted?',
                1318 => 'Los contenidos de la aplicación le parecieron interesantes.'
            ];
            foreach ($preguntas_idoneidad as $id => $pregunta):
                $val_actual = $respuestas[$id] ?? '';
            ?>
                <div style="margin-bottom: 3rem;">
                    <p style="font-weight: 700; color: #12307D; margin-bottom: 1rem;"><?php echo $pregunta; ?></p>
                    <select name="respuestas[<?php echo $id; ?>]" class="m1-select-personalizado req-select" style="width: 100%; padding: 1rem; border-radius: 0.8rem;">
                        <option value="">-- Selecciona del 1 al 10 --</option>
                        <?php for ($i = 1; $i <= 10; $i++):
                            $opt_val = $id . str_pad($i, 2, "0", STR_PAD_LEFT);
                        ?>
                            <option value="<?php echo $opt_val; ?>" <?php echo ($val_actual == $opt_val) ? 'selected' : ''; ?>>
                                <?php echo $i; ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="m1-experimento-seccion" style="padding: 4rem; margin-bottom: 4rem; background: #eef2f7;">
            <p style="font-weight: 700; color: #333; margin-bottom: 1rem;">¿Qué modificaría?</p>
            <input type="hidden" name="respuestas[1319]" value="13190">
            <textarea name="respuestas_texto[1319]" id="txt-modificar" class="m7-textarea req-text" rows="4" style="width: 100%; border: 2px solid #ccc; padding: 1.5rem; border-radius: 0.8rem;"><?php echo htmlspecialchars($val_txt_1319); ?></textarea>
        </div>

        <div style="text-align: center; margin-top: 5rem; margin-bottom: 5rem;">
            <button type="submit" id="btn-finalizar-postest" class="boton boton-por-guardar" style="padding: 1.5rem 5rem;" disabled>
                Finalizar y Guardar Resultados
            </button>
        </div>
    </form>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('form-salida');
        const btnSubmit = document.getElementById('btn-finalizar-postest');

        const reqRadiosNames = new Set([...form.querySelectorAll('.req-radio')].map(r => r.name));
        const reqSelects = form.querySelectorAll('.req-select');
        const reqText = document.getElementById('txt-modificar');

        function validarFormulario() {
            let esValido = true;

            // Validar todos los grupos de radio buttons
            for (let name of reqRadiosNames) {
                const radioSeleccionado = form.querySelector(`input[name="${name}"]:checked`);
                if (!radioSeleccionado) {
                    esValido = false;
                    break;
                }
            }

            // Validar selects
            if (esValido) {
                for (let select of reqSelects) {
                    if (select.value === "") {
                        esValido = false;
                        break;
                    }
                }
            }

            // Validar textarea
            if (esValido) {
                if (reqText && reqText.value.trim().length === 0) {
                    esValido = false;
                }
            }

            // Habilitar o deshabilitar botón
            if (esValido) {
                btnSubmit.disabled = false;
                btnSubmit.classList.add('activo');
            } else {
                btnSubmit.disabled = true;
                btnSubmit.classList.remove('activo');
            }
        }

        form.querySelectorAll('input[type="radio"]').forEach(r => r.addEventListener('change', validarFormulario));
        reqSelects.forEach(s => s.addEventListener('change', validarFormulario));
        if (reqText) reqText.addEventListener('input', validarFormulario);

        validarFormulario();
    });
</script>