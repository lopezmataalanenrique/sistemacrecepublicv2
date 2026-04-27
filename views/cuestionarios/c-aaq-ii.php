<header class="cuestionario-logout">
    <nav>
        <a href="/logout">Cerrar sesión</a>
    </nav>
</header>

<main class="formulario">
    <section class="auth-container auth-container--cuestionario">
        <header class="auth-header">
            <h1 class="auth-title">Cuestionario de Aceptación y Acción (AAQ-II)</h1>
            <p class="auth-subtitle">A continuación, encontrará una lista de frases. Por favor indique qué tan cierta es cada una para usted:</p>
        </header>

        <div class="auth-card">
            <?php include_once __DIR__ . "/../templates/alertas.php"; ?>

            <form method="POST">
                <?php
                $preguntas = [
                    601 => '1. Puedo recordar algo desagradable sin que esto me cause molestias.',
                    602 => '2. Mis recuerdos y experiencias dolorosas me dificultan vivir una vida que pudiera valorar.',
                    603 => '3. Evito o escapo de mis sentimientos.',
                    604 => '4. Me preocupa no poder controlar mis sentimientos y preocupaciones.',
                    605 => '5. Mis recuerdos dolorosos me impiden tener una vida plena.',
                    606 => '6. Mantengo el control de mi vida.',
                    607 => '7. Mis emociones me causan problemas en la vida.',
                    608 => '8. Me parece que la mayoría de la gente maneja su vida mejor que yo.',
                    609 => '9. Mis preocupaciones obstaculizan mi superación.',
                    610 => '10. Disfruto mi vida a pesar de mis pensamientos y sentimientos desagradables.'
                ];

                $opciones = [
                    '1' => 'Completamente falso',
                    '2' => 'Rara vez cierto',
                    '3' => 'Algunas veces cierto',
                    '4' => 'A veces cierto',
                    '5' => 'Frecuentemente cierto',
                    '6' => 'Casi siempre cierto',
                    '7' => 'Completamente cierto'
                ];

                foreach ($preguntas as $id => $texto): ?>
                    <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                        <legend class="mb-3"><?php echo $texto; ?></legend>

                        <?php foreach ($opciones as $valor => $etiqueta):
                            $id_opcion = $id . "0" . $valor;
                        ?>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio"
                                    name="respuestas[<?php echo $id; ?>]"
                                    id="p<?php echo $id; ?>_<?php echo $valor; ?>"
                                    value="<?php echo $id_opcion; ?>"
                                    <?php echo (isset($respuestas[$id]) && $respuestas[$id] === $id_opcion) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="p<?php echo $id; ?>_<?php echo $valor; ?>" style="font-size: 2rem;">
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