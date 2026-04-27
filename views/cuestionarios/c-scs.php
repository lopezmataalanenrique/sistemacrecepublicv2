<header class="cuestionario-logout">
    <nav>
        <a href="/logout">Cerrar sesión</a>
    </nav>
</header>

<main class="formulario">
    <section class="auth-container auth-container--cuestionario">
        <header class="auth-header">
            <h1 class="auth-title">Escala de Autocompasión (SCS)</h1>
            <p class="auth-subtitle">Por favor, lea cada frase y responda qué tan seguido actúa de esa manera.</p>
        </header>

        <div class="auth-card">
            <?php include_once __DIR__ . "/../templates/alertas.php"; ?>

            <form method="POST">
                <?php foreach ($preguntas as $id => $texto): ?>
                    <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                        <legend class="mb-3"><?php echo $texto; ?></legend>

                        <?php
                        $opciones = [
                            '1' => 'Casi nunca',
                            '2' => 'Ocasionalmente',
                            '3' => 'La mitad de las veces',
                            '4' => 'Bastante a menudo',
                            '5' => 'Casi siempre'
                        ];
                        foreach ($opciones as $v => $etiqueta):
                            $id_op = $id . "0" . $v; // Ejemplo: 80101, 80102...
                        ?>
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