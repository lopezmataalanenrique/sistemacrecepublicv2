<header class="cuestionario-logout">
    <nav>
        <a href="/logout">Cerrar sesión</a>
    </nav>
</header>

<main class="formulario">
    <section class="auth-container auth-container--cuestionario">
        <header class="auth-header">
            <h1 class="auth-title">Cuestionario APOI</h1>
            <p class="auth-subtitle">Por favor, indique su grado de acuerdo o desacuerdo con las siguientes afirmaciones sobre las intervenciones psicológicas online.</p>
        </header>

        <div class="auth-card">
            <?php include_once __DIR__ . "/../templates/alertas.php"; ?>

            <form method="POST">
                <?php
                $preguntas_apoi = [
                    1001 => '1. Si quiero aprender habilidades para gestionar mejor mi vida, prefiero un terapeuta antes que una intervención psicológica online.',
                    1002 => '2. Una intervención psicológica online puede ayudarme a reconocer los problemas que tengo que enfrentar.',
                    1003 => '3. Una intervención psicológica online puede inspirarme para abordar mejor mis problemas.',
                    1004 => '4. Creo que el concepto de intervenciones psicológicas online tiene sentido.',
                    1005 => '5. Tengo la sensación de que una intervención psicológica online puede ayudarme.',
                    1006 => '6. Es más probable que me mantenga motivada/o con un terapeuta que con una intervención psicológica online.',
                    1007 => '7. En situaciones de crisis, un terapeuta puede ayudarme mejor que una intervención psicológica online.'
                ];

                $opciones_apoi = [
                    1 => 'Totalmente en desacuerdo',
                    2 => 'En desacuerdo',
                    3 => 'Ni de acuerdo ni en desacuerdo',
                    4 => 'De acuerdo',
                    5 => 'Totalmente de acuerdo'
                ];

                foreach ($preguntas_apoi as $id => $texto): ?>
                    <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                        <legend class="mb-3"><?php echo $texto; ?></legend>
                        <?php foreach ($opciones_apoi as $v => $etiqueta):
                            $id_op = $id . "0" . $v; ?>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio"
                                    name="respuestas[<?php echo $id; ?>]"
                                    id="p<?php echo $id . "_" . $v; ?>"
                                    value="<?php echo $id_op; ?>"
                                    <?php echo (isset($respuestas[$id]) && $respuestas[$id] === $id_op) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="p<?php echo $id . "_" . $v; ?>" style="font-size: 2rem;">
                                    <?php echo $etiqueta; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>

                <div class="contenedor-bcc">
                    <input class="auth-button" type="submit" value="Enviar y Continuar" />
                </div>
            </form>
        </div>
    </section>
</main>