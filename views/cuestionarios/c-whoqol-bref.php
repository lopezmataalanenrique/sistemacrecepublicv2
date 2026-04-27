<header class="cuestionario-logout">
    <nav>
        <a href="/logout">Cerrar sesión</a>
    </nav>
</header>

<main class="formulario">
    <section class="auth-container auth-container--cuestionario">
        <header class="auth-header">
            <h1 class="auth-title">Calidad de Vida (WHOQOL-BREF)</h1>
            <p class="auth-subtitle">Este cuestionario pregunta cómo se siente usted respecto a su calidad de vida, salud y otras áreas. Por favor, elija la respuesta que mejor describa su situación en las <strong>últimas dos semanas</strong>.</p>
        </header>

        <div class="auth-card">
            <?php include_once __DIR__ . "/../templates/alertas.php"; ?>

            <form method="POST">
                <?php
                // Array de preguntas mapeadas con sus respectivas escalas
                $preguntas_whoqol = [
                    901 => ['texto' => '1. ¿Cómo calificaría su calidad de vida?', 'tipo' => 'calidad'],
                    902 => ['texto' => '2. ¿Qué tan satisfecho está con su salud?', 'tipo' => 'satisfaccion'],
                    903 => ['texto' => '3. ¿Hasta qué punto piensa que el dolor físico le impide hacer lo que necesita?', 'tipo' => 'nada_total'],
                    904 => ['texto' => '4. ¿Qué tanto necesita de cualquier tratamiento médico para llevar a cabo su vida diaria?', 'tipo' => 'nada_total'],
                    905 => ['texto' => '5. ¿Qué tanto disfruta de la vida?', 'tipo' => 'nada_total'],
                    906 => ['texto' => '6. ¿Hasta qué punto siente que su vida tiene significado?', 'tipo' => 'nada_total'],
                    907 => ['texto' => '7. ¿Qué tan capaz es de concentrarse?', 'tipo' => 'nada_total'],
                    908 => ['texto' => '8. ¿Qué tan seguro (en general) se siente en su vida diaria?', 'tipo' => 'nada_total'],
                    909 => ['texto' => '9. ¿Qué tan saludable es su entorno físico?', 'tipo' => 'nada_total'],
                    910 => ['texto' => '10. ¿Qué tanta energía tiene para su vida diaria?', 'tipo' => 'nada_total'],
                    911 => ['texto' => '11. ¿Qué tanto acepta su apariencia física?', 'tipo' => 'nada_total'],
                    912 => ['texto' => '12. ¿Qué tanto su economía le permite cubrir sus necesidades?', 'tipo' => 'nada_total'],
                    913 => ['texto' => '13. ¿Qué tan disponible tiene la información que necesita en su vida diaria?', 'tipo' => 'nada_total'],
                    914 => ['texto' => '14. ¿Hasta qué punto tiene oportunidad para realizar actividades recreativas?', 'tipo' => 'nada_total'],
                    915 => ['texto' => '15. ¿Qué tan capaz es de desplazarse de un lugar a otro?', 'tipo' => 'nada_total'],
                    916 => ['texto' => '16. ¿Qué tan satisfecho está con su sueño?', 'tipo' => 'satisfaccion'],
                    917 => ['texto' => '17. ¿Qué tan satisfecho está con su habilidad para realizar sus actividades de la vida diaria?', 'tipo' => 'satisfaccion'],
                    918 => ['texto' => '18. ¿Qué tan satisfecho está con su capacidad de trabajo?', 'tipo' => 'satisfaccion'],
                    919 => ['texto' => '19. ¿Qué tan satisfecho está de sí mismo?', 'tipo' => 'satisfaccion'],
                    920 => ['texto' => '20. ¿Qué tan satisfecho está con sus relaciones personales?', 'tipo' => 'satisfaccion'],
                    921 => ['texto' => '21. ¿Qué tan satisfecho está con su vida sexual?', 'tipo' => 'satisfaccion'],
                    922 => ['texto' => '22. ¿Qué tan satisfecho está con el apoyo que le brindan sus amistades?', 'tipo' => 'satisfaccion'],
                    923 => ['texto' => '23. ¿Qué tan satisfecho está de las condiciones del lugar donde vive?', 'tipo' => 'satisfaccion'],
                    924 => ['texto' => '24. ¿Qué tan satisfecho está con el acceso que tiene a los servicios de salud?', 'tipo' => 'satisfaccion'],
                    925 => ['texto' => '25. ¿Qué tan satisfecho está con el medio de transporte que utiliza?', 'tipo' => 'satisfaccion'],
                    926 => ['texto' => '26. ¿Con qué frecuencia tiene sentimientos negativos tales como tristeza, desesperanza, ansiedad, depresión?', 'tipo' => 'frecuencia_negativa']
                ];

                // Definición de las escalas según el tipo
                $escalas = [
                    'calidad' => ['1' => 'Muy mala', '2' => 'Mala', '3' => 'Ni buena ni mala', '4' => 'Buena', '5' => 'Muy buena'],
                    'satisfaccion' => ['1' => 'Muy insatisfecho/a', '2' => 'Insatisfecho/a', '3' => 'Ni satisfecho/a ni insatisfecho/a', '4' => 'Satisfecho/a', '5' => 'Muy satisfecho/a'],
                    'nada_total' => ['1' => 'Nada / Poco', '2' => 'Poco / Un poco', '3' => 'Moderado', '4' => 'Bastante', '5' => 'Totalmente'],
                    'frecuencia_negativa' => ['1' => 'Siempre', '2' => 'Muchas veces', '3' => 'Algunas veces', '4' => 'Pocas veces', '5' => 'Nunca']
                ];

                foreach ($preguntas_whoqol as $id => $info):
                    $tipo_escala = $info['tipo'];
                    $opciones = $escalas[$tipo_escala];
                ?>
                    <div class="campo-encuesta card mb-5 p-4 shadow-sm">
                        <legend class="mb-3"><strong><?php echo $info['texto']; ?></strong></legend>

                        <div class="opciones-grid">
                            <?php foreach ($opciones as $valor => $etiqueta):
                                $id_opcion = $id . "0" . $valor;
                            ?>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio"
                                        name="respuestas[<?php echo $id; ?>]"
                                        id="p<?php echo $id . "_" . $valor; ?>"
                                        value="<?php echo $id_opcion; ?>"
                                        <?php echo (isset($respuestas[$id]) && $respuestas[$id] === $id_opcion) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="p<?php echo $id . "_" . $valor; ?>" style="line-height: 1.2;">
                                        <?php echo $etiqueta; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
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