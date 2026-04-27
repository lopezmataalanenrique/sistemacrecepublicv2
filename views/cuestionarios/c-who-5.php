<header class="cuestionario-logout">
    <nav>
        <a href="/logout">Cerrar sesión</a>
    </nav>
</header>

<main class="formulario">
    <section class="auth-container auth-container--cuestionario">
        <header class="auth-header">
            <h1 class="auth-title">Índice de Bienestar (WHO-5)</h1>
            <p class="auth-subtitle">Por favor, indique para cada una de las cinco afirmaciones cuál es la que más se acerca a cómo se ha sentido usted durante las últimas dos semanas.</p>
        </header>

        <div class="auth-card">
            <?php include_once __DIR__ . "/../templates/alertas.php"; ?>

            <form method="POST">
                <?php
                $preguntas = [
                    701 => '1. Me he sentido alegre y de buen ánimo',
                    702 => '2. Me he sentido tranquilo/a y relajado/a',
                    703 => '3. Me he sentido activo/a y con energía',
                    704 => '4. Me he despertado sintiéndome fresco y descansado/a',
                    705 => '5. Mi vida diaria ha tenido cosas interesantes para mí'
                ];

                $opciones = [
                    '0' => 'Nunca',
                    '1' => 'De vez en cuando',
                    '2' => 'Menos de la mitad del tiempo',
                    '3' => 'Más de la mitad del tiempo',
                    '4' => 'La mayor parte del tiempo',
                    '5' => 'Todo el tiempo'
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