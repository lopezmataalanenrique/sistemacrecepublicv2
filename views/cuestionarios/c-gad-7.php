<header class="cuestionario-logout">
    <nav>
        <a href="/logout">Cerrar sesión</a>
    </nav>
</header>

<main class="formulario">
    <section class="auth-container auth-container--cuestionario">
        <header class="auth-header">
            <h1 class="auth-title">Cuestionario de Ansiedad Generalizada (GAD-7)</h1>
            <p class="auth-subtitle">Considerando la forma en la que se ha sentido en las últimas 2 semanas, selecciones la opción que más se ajuste a su situación.</p>
        </header>

        <div class="auth-card">
            <?php include_once __DIR__ . "/../templates/alertas.php"; ?>

            <form method="POST">
                <?php
                $preguntas = [
                    501 => '1. ¿Se ha sentido nervioso(a), ansioso(a) o con los nervios de punta?',
                    502 => '2. ¿No ha sido capaz de parar o controlar su preocupación?',
                    503 => '3. ¿Se ha preocupado demasiado por motivos diferentes?',
                    504 => '4. ¿Ha tenido dificultad para relajarse?',
                    505 => '5. ¿Se ha sentido tan inquieto(a) que no ha podido quedarse quieto(a)?',
                    506 => '6. ¿Se ha molestado o irritado fácilmente?',
                    507 => '7. ¿Ha tenido miedo de que algo terrible fuera a pasar?'
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
                            $id_opcion = $id . "0" . $valor; // Genera 50100, 50101, etc.
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