<header class="cuestionario-logout">
    <nav>
        <a href="/logout">Cerrar sesión</a>
    </nav>
</header>

<main class="formulario">
    <section class="auth-container auth-container--cuestionario">
        <header class="auth-header">
            <h1 class="auth-title">Escala de Atención Plena (MAAS)</h1>
            <p class="auth-subtitle">A continuación, encontrará una serie de afirmaciones sobre su experiencia cotidiana. Por favor, califique qué tan seguido le ocurre lo siguiente.</p>
        </header>

        <div class="auth-card">
            <?php include_once __DIR__ . "/../templates/alertas.php"; ?>

            <form method="POST">
                <?php
                $preguntas_maas = [
                    1101 => '1. Puedo sentir una emoción y no estar consciente de ella hasta tiempo después',
                    1102 => '2. Rompo o derramo cosas por descuido, al no poner atención, o porque estoy pensando en otra cosa',
                    1103 => '3. Se me hace difícil permanecer concentrado en lo que está sucediendo en un momento dado',
                    1104 => '4. Tiendo a caminar rápidamente para llegar a donde tengo que ir, sin poner mucha atención a lo que ocurre alrededor',
                    1105 => '5. Tiendo a no percibir la tensión física o el nivel de incomodidad a que estoy sometido, hasta que realmente son evidentes',
                    1106 => '6. Se me olvidan los nombres de las personas, inmediatamente después de que me presentan a alguien',
                    1107 => '7. Parece como si estuviera funcionando de manera «automática» sin darme cuenta de lo que estoy haciendo',
                    1108 => '8. Me apresuro a hacer mis tareas sin realmente prestarles mucha atención a lo que hago',
                    1109 => '9. Me concentro tanto en la meta que quiero alcanzar, que pierdo contacto con lo que estoy haciendo para conseguirla',
                    1110 => '10. Realizo trabajos automáticamente, sin ponerle mucha atención a lo que hago',
                    1111 => '11. Escucho a mi interlocutor con un oído, mientras hago otra cosa simultáneamente',
                    1112 => '12. Llego a un lugar en «piloto automático» y luego me pregunto qué iba a hacer en ese lugar',
                    1113 => '13. Me preocupo por cosas que pueden ocurrir en el futuro o por asuntos del pasado',
                    1114 => '14. Hago cosas sin ponerles mucha atención',
                    1115 => '15. Como entre comidas sin estar consciente de que estoy comiendo'
                ];

                $opciones_maas = [
                    1 => 'Casi siempre',
                    2 => 'Con mucha frecuencia',
                    3 => 'Con cierta frecuencia',
                    4 => 'Con poca frecuencia',
                    5 => 'Con muy poca frecuencia',
                    6 => 'Casi nunca'
                ];

                foreach ($preguntas_maas as $id => $texto): ?>
                    <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                        <legend class="mb-3"><?php echo $texto; ?></legend>
                        <?php foreach ($opciones_maas as $v => $etiqueta):
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