<header class="cuestionario-logout">
    <nav>
        <a href="/logout">Cerrar sesión</a>
    </nav>
</header>

<main class="formulario">
    <section class="auth-container auth-container--cuestionario">
        <header class="auth-header">
            <h1 class="auth-title">Cuestionario MINI</h1>
            <p class="auth-subtitle">Responda a las siguientes preguntas seleccionando SÍ o NO según sea su caso.</p>
        </header>

        <div class="auth-card">
            <?php include_once __DIR__ . "/../templates/alertas.php"; ?>

            <form method="POST">
                <?php
                $preguntas = [
                    301 => '1. ¿Ha pensado que sería mejor morirse o ha deseado estar muerto(a)? (Último mes)',
                    302 => '2. ¿Ha querido hacerse daño? (Último mes)',
                    303 => '3. ¿Ha pensado en el suicidio? (Último mes)',
                    304 => '4. ¿Ha planeado suicidarse? (Último mes)',
                    305 => '5. ¿Ha intentado suicidarse? (Último mes)',
                    306 => '6. ¿Alguna vez ha intentado suicidarse? (A lo largo de su vida)'
                ];

                foreach ($preguntas as $id => $texto): ?>
                    <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                        <legend class="mb-3"><?php echo $texto; ?></legend>
                        
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="respuestas[<?php echo $id; ?>]" 
                                id="p<?php echo $id; ?>_no" value="<?php echo $id; ?>01"
                                <?php echo (isset($respuestas[$id]) && $respuestas[$id] === $id.'01') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="p<?php echo $id; ?>_no" style="font-size: 2rem;">No</label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="respuestas[<?php echo $id; ?>]" 
                                id="p<?php echo $id; ?>_si" value="<?php echo $id; ?>02"
                                <?php echo (isset($respuestas[$id]) && $respuestas[$id] === $id.'02') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="p<?php echo $id; ?>_si" style="font-size: 2rem;">Sí</label>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="contenedor-bcc">
                    <input class="auth-button" type="submit" value="Enviar y Continuar" />
                </div>
            </form>
        </div>
    </section>
</main>