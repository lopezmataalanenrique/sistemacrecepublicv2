<header class="cuestionario-logout">
    <nav>
        <a href="/logout">Cerrar sesión</a>
    </nav>
</header>

<main class="formulario">
    <section class="auth-container auth-container--cuestionario">
        <header class="auth-header">
            <h1 class="auth-title">Cuestionario sobre la Salud del Paciente (PHQ-9)</h1>
            <p class="auth-subtitle">Durante las últimas 2 semanas, ¿con qué frecuencia le han molestado los siguientes problemas?</p>
        </header>

        <div class="auth-card">
            <?php include_once __DIR__ . "/../templates/alertas.php"; ?>

            <form method="POST">
                <?php
                $preguntas = [
                    401 => '1. ¿Ha tenido poco interés o placer en hacer las cosas?',
                    402 => '2. ¿Se ha sentido decaído(a), deprimido(a) o sin esperanzas?',
                    403 => '3. ¿Ha tenido dificultad para dormir o permanecer dormido(a), o ha dormido demasiado?',
                    404 => '4. ¿Se ha sentido cansado(a), o con poca energía?',
                    405 => '5. ¿Se ha sentido con poco apetito o ha comido en exceso?',
                    406 => '6. ¿Se ha sentido mal con usted mismo(a) – o que es un fracaso o que ha quedado mal con usted mismo(a) o con su familia?',
                    407 => '7. ¿Ha tenido dificultad para concentrarse en cosas tales como leer el periódico o ver televisión?',
                    408 => '8. ¿Se ha estado moviendo o hablando tan lento que otras personas podrían notarlo, o por el contrario, ha estado tan inquieto(a) o agitado(a)?',
                    409 => '9. ¿Ha pensado que estaría mejor muerto(a) o se le ha ocurrido lastimarse de alguna manera?'
                ];

                $opciones = [
                    '0' => 'Ningún día',
                    '1' => 'Varios días',
                    '2' => 'Más de la mitad de los días',
                    '3' => 'Casi todos los días'
                ];

                foreach ($preguntas as $id => $texto): ?>
                    <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                        <legend class="mb-3"><?php echo $texto; ?></legend>

                        <?php foreach ($opciones as $valor => $etiqueta):
                            $id_opcion = $id . "0" . $valor; // Genera 40100, 40101, etc.
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