<header class="cuestionario-logout">
    <nav>
        <a href="/logout">Cerrar sesión</a>
    </nav>
</header>

<main class="formulario">
    <section class="auth-container auth-container--cuestionario">
        <header class="auth-header">
            <h1 class="auth-title">Escala de Estrés Percibido (PSS-10)</h1>
            <p class="auth-subtitle">Marque la opción que mejor se adecúe a tu situación actual, teniendo en cuenta el último mes.</p>
        </header>

        <div class="auth-card">
            <?php include_once __DIR__ . "/../templates/alertas.php"; ?>

            <form method="POST">

                <?php
                // Definición de las preguntas basadas en tu consulta SQL
                $preguntas = [
                    201 => '1. ¿Con qué frecuencia has estado afectado/a por algo que ha ocurrido inesperadamente?',
                    202 => '2. ¿Con qué frecuencia te has sentido incapaz de controlar las cosas importantes de tu vida?',
                    203 => '3. ¿Con qué frecuencia te has sentido nervioso/a o estresado/a (lleno de tensión)?',
                    204 => '6. ¿Con qué frecuencia has estado seguro/a sobre tu capacidad de manejar tus problemas personales?',
                    205 => '7. ¿Con qué frecuencia has sentido que las cosas te van bien?',
                    206 => '8. ¿Con qué frecuencia has sentido que no podías afrontar todas las cosas que tenías que hacer?',
                    207 => '9. ¿Con qué frecuencia has podido controlar las dificultades de tu vida?',
                    208 => '10. ¿Con qué frecuencia has sentido que tienes el control de todo?',
                    209 => '11. ¿Con qué frecuencia has estado enfadado/a porque las cosas que te han ocurrido estaban fuera de tu control?',
                    210 => '14. ¿Con qué frecuencia has sentido que las dificultades se acumulan tanto que no puedes superarlas?'
                ];

                // Opciones comunes para todas las preguntas
                $opciones = [
                    '0' => 'Nunca',
                    '1' => 'Casi nunca',
                    '2' => 'De vez en cuando',
                    '3' => 'A menudo',
                    '4' => 'Muy a menudo'
                ];

                foreach ($preguntas as $id_pregunta => $texto_pregunta):
                ?>
                    <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                        <legend class="mb-3"><?php echo $texto_pregunta; ?></legend>

                        <?php foreach ($opciones as $valor => $etiqueta):
                            $id_opcion = $id_pregunta . "0" . $valor; // Genera 20100, 20101, etc.
                        ?>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio"
                                    name="respuestas[<?php echo $id_pregunta; ?>]"
                                    id="p<?php echo $id_pregunta; ?>_<?php echo $valor; ?>"
                                    value="<?php echo $id_opcion; ?>"
                                    <?php echo (isset($respuestas[$id_pregunta]) && $respuestas[$id_pregunta] === $id_opcion) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="p<?php echo $id_pregunta; ?>_<?php echo $valor; ?>" style="font-size: 2rem;">
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