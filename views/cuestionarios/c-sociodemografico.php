<header class="cuestionario-logout">
    <nav>
        <a href="/logout">Cerrar sesión</a>
    </nav>
</header>

<main class="formulario">
    <section class="auth-container auth-container--cuestionario">
        <header class="auth-header">
            <h1 class="auth-title">Encuesta sociodemográfica</h1>
            <p class="auth-subtitle">A continuación te presentamos una serie de preguntas que nos permiten conocer algunas características generales. Seleccione la opción que se adecue a tu situación:</p>
        </header>

        <div class="auth-card">
            <!-- ALERTAS  -->
            <?php include_once __DIR__ . "/../templates/alertas.php"; ?>
            <!-- Cuestionario -->
            <form method="POST">
                <!-- Pregunta 1 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">1. ¿Cuál es su estado civil?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[101]" id="p101_1" value="10101" <?php echo (isset($respuestas[101]) && $respuestas[101] === '10101') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p101_1">Soltero(a)</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[101]" id="p101_2" value="10102" <?php echo (isset($respuestas[101]) && $respuestas[101] === '10102') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p101_2">Unión libre</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[101]" id="p101_3" value="10103" <?php echo (isset($respuestas[101]) && $respuestas[101] === '10103') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p101_3">Casado(a)</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[101]" id="p101_4" value="10104" <?php echo (isset($respuestas[101]) && $respuestas[101] === '10104') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p101_4">Divorciado(a) / Separado(a)</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[101]" id="p101_5" value="10105" <?php echo (isset($respuestas[101]) && $respuestas[101] === '10105') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p101_5">Viudo(a)</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[101]" id="p101_6" value="10106" <?php echo (isset($respuestas[101]) && $respuestas[101] === '10106') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p101_6">Otro</label>

                        <div class="mt-2" id="contenedor-especifique" style="display: <?php echo (isset($respuestas[101]) && $respuestas[101] === '10106') ? 'block' : 'none'; ?>;">
                            <input
                                type="text"
                                name="respuestas_texto[101]"
                                class="form-control form-control-sm"
                                placeholder="Especifique su estado civil (opcional)"
                                value="<?php echo $respuestas_texto[101] ?? ''; ?>">
                        </div>
                    </div>
                </div>
                <!-- Pregunta 2 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">2. ¿Cuál es su nivel máximo de estudios?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[102]" id="p102_1" value="10201" <?php echo (isset($respuestas[102]) && $respuestas[102] === '10201') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p102_1">Sin escolaridad</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[102]" id="p102_2" value="10202" <?php echo (isset($respuestas[102]) && $respuestas[102] === '10202') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p102_2">Educación básica (Primaria/Secundaria)</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[102]" id="p102_3" value="10203" <?php echo (isset($respuestas[102]) && $respuestas[102] === '10203') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p102_3">Bachillerato / Preparatoria</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[102]" id="p102_4" value="10204" <?php echo (isset($respuestas[102]) && $respuestas[102] === '10204') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p102_4">Carrera técnica</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[102]" id="p102_5" value="10205" <?php echo (isset($respuestas[102]) && $respuestas[102] === '10205') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p102_5">Licenciatura</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[102]" id="p102_6" value="10206" <?php echo (isset($respuestas[102]) && $respuestas[102] === '10206') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p102_6">Posgrado (Especialización, Maestría, Doctorado)</label>
                    </div>
                </div>

                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">3. ¿Cuál es su ocupación principal actualmente?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[103]" id="p103_1" value="10301" <?php echo (isset($respuestas[103]) && $respuestas[103] === '10301') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p103_1">Encargado(a) del hogar</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[103]" id="p103_2" value="10302" <?php echo (isset($respuestas[103]) && $respuestas[103] === '10302') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p103_2">Estudiante</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[103]" id="p103_3" value="10303" <?php echo (isset($respuestas[103]) && $respuestas[103] === '10303') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p103_3">Desempleado(a)</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[103]" id="p103_4" value="10304" <?php echo (isset($respuestas[103]) && $respuestas[103] === '10304') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p103_4">Autoempleo</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[103]" id="p103_5" value="10305" <?php echo (isset($respuestas[103]) && $respuestas[103] === '10305') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p103_5">Profesionista</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[103]" id="p103_6" value="10306" <?php echo (isset($respuestas[103]) && $respuestas[103] === '10306') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p103_6">Jubilado(a) o pensionado(a)</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[103]" id="p103_7" value="10307" <?php echo (isset($respuestas[103]) && $respuestas[103] === '10307') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p103_7">Empleado(a)</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[103]" id="p103_8" value="10308" <?php echo (isset($respuestas[103]) && $respuestas[103] === '10308') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p103_8">Otro</label>

                        <div class="mt-2" id="contenedor-ocupacion-otro" style="display: <?php echo (isset($respuestas[103]) && $respuestas[103] === '10308') ? 'block' : 'none'; ?>;">
                            <input
                                type="text"
                                name="respuestas_texto[103]"
                                class="form-control form-control-sm"
                                placeholder="Especifique su ocupación"
                                value="<?php echo $respuestas_texto[103] ?? ''; ?>">
                        </div>
                    </div>
                </div>

                <!-- Pregunta 4 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">4. ¿Cuál es su lugar de residencia?</legend>

                    <select name="respuestas[104]" id="p104_select" class="form-select mb-3" style="font-size: 2.2rem; text-align: center;">
                        <option value="" selected disabled>-- Seleccione un estado --</option>
                        <?php
                        $estados = [
                            '10401' => 'Aguascalientes',
                            '10402' => 'Baja California',
                            '10403' => 'Baja California Sur',
                            '10404' => 'Campeche',
                            '10405' => 'Chiapas',
                            '10406' => 'Chihuahua',
                            '10407' => 'Ciudad de México',
                            '10408' => 'Coahuila',
                            '10409' => 'Colima',
                            '10410' => 'Durango',
                            '10411' => 'Estado de México',
                            '10412' => 'Guanajuato',
                            '10413' => 'Guerrero',
                            '10414' => 'Hidalgo',
                            '10415' => 'Jalisco',
                            '10416' => 'Michoacán',
                            '10417' => 'Morelos',
                            '10418' => 'Nayarit',
                            '10419' => 'Nuevo León',
                            '10420' => 'Oaxaca',
                            '10421' => 'Puebla',
                            '10422' => 'Querétaro',
                            '10423' => 'Quintana Roo',
                            '10424' => 'San Luis Potosí',
                            '10425' => 'Sinaloa',
                            '10426' => 'Sonora',
                            '10427' => 'Tabasco',
                            '10428' => 'Tamaulipas',
                            '10429' => 'Tlaxcala',
                            '10430' => 'Veracruz',
                            '10431' => 'Yucatán',
                            '10432' => 'Zacatecas',
                            '10433' => 'Extranjero'
                        ];
                        foreach ($estados as $id => $nombre):
                        ?>
                            <option value="<?php echo $id; ?>" <?php echo (isset($respuestas[104]) && $respuestas[104] === (string)$id) ? 'selected' : ''; ?>>
                                <?php echo $nombre; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <div id="contenedor-extranjero" style="display: <?php echo (isset($respuestas[104]) && $respuestas[104] === '10433') ? 'block' : 'none'; ?>;">
                        <label class="form-label small">Especifique Ciudad y País:</label>
                        <input
                            type="text"
                            name="respuestas_texto[104]"
                            id="input-extranjero"
                            class="form-control form-control-sm"
                            style="font-size: 2.2rem;"
                            placeholder="Ej: Madrid, España"
                            value="<?php echo $respuestas_texto[104] ?? ''; ?>">
                    </div>
                </div>
                <!-- Pregunta 5 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">5. ¿Con cuántas personas vive habitualmente?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[105]" id="p105_1" value="10501"
                            <?php echo (isset($respuestas[105]) && $respuestas[105] === '10501') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p105_1">Vivo solo (a)</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[105]" id="p105_2" value="10502"
                            <?php echo (isset($respuestas[105]) && $respuestas[105] === '10502') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p105_2">1 persona</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[105]" id="p105_3" value="10503"
                            <?php echo (isset($respuestas[105]) && $respuestas[105] === '10503') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p105_3">2 a 3 personas</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[105]" id="p105_4" value="10504"
                            <?php echo (isset($respuestas[105]) && $respuestas[105] === '10504') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p105_4">4 a 5 personas</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[105]" id="p105_5" value="10505"
                            <?php echo (isset($respuestas[105]) && $respuestas[105] === '10505') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p105_5">6 o más personas</label>
                    </div>
                </div>
                <!-- Pregunta 6 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">6. En su vida cotidiana, ¿percibe que cuenta con una red de apoyo (soporte y acompañamiento) suficiente?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[106]" id="p106_1" value="10601"
                            <?php echo (isset($respuestas[106]) && $respuestas[106] === '10601') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p106_1">No cuento con red de apoyo</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[106]" id="p106_2" value="10602"
                            <?php echo (isset($respuestas[106]) && $respuestas[106] === '10602') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p106_2">Cuento con poco apoyo</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[106]" id="p106_3" value="10603"
                            <?php echo (isset($respuestas[106]) && $respuestas[106] === '10603') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p106_3">El apoyo que recibo es moderado</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[106]" id="p106_4" value="10604"
                            <?php echo (isset($respuestas[106]) && $respuestas[106] === '10604') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p106_4">El apoyo que recibo es suficiente</label>
                    </div>
                </div>
                <!-- Pregunta 7 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">7. ¿Quiénes conforman principalmente esa red de apoyo?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[107]" id="p107_1" value="10701"
                            <?php echo (isset($respuestas[107]) && $respuestas[107] === '10701') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p107_1">Pareja</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[107]" id="p107_2" value="10702"
                            <?php echo (isset($respuestas[107]) && $respuestas[107] === '10702') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p107_2">Familia</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[107]" id="p107_3" value="10703"
                            <?php echo (isset($respuestas[107]) && $respuestas[107] === '10703') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p107_3">Amistades</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[107]" id="p107_4" value="10704"
                            <?php echo (isset($respuestas[107]) && $respuestas[107] === '10704') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p107_4">Grupos de apoyo o comunitarios</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[107]" id="p107_5" value="10705"
                            <?php echo (isset($respuestas[107]) && $respuestas[107] === '10705') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p107_5">Compañeros de trabajo/escuela</label>
                    </div>
                </div>
                <!-- Pregunta 8 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">8. ¿Con qué tipo de condición física crónica vive? (Si usted es familiar o cuidador de una persona que vive con alguna condición física crónica, indique cuál)</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[108]" id="p108_1" value="10801"
                            <?php echo (isset($respuestas[108]) && $respuestas[108] === '10801') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p108_1">Hipertensión arterial</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[108]" id="p108_2" value="10802"
                            <?php echo (isset($respuestas[108]) && $respuestas[108] === '10802') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p108_2">Enfermedades cardiovasculares</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[108]" id="p108_3" value="10803"
                            <?php echo (isset($respuestas[108]) && $respuestas[108] === '10803') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p108_3">Diabetes tipo 2</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[108]" id="p108_4" value="10804"
                            <?php echo (isset($respuestas[108]) && $respuestas[108] === '10804') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p108_4">Alteraciones metabólicas</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[108]" id="p108_5" value="10805"
                            <?php echo (isset($respuestas[108]) && $respuestas[108] === '10805') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p108_5">Cáncer (neoplasias)</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[108]" id="p108_6" value="10806"
                            <?php echo (isset($respuestas[108]) && $respuestas[108] === '10806') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p108_6">Enfermedades renales</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[108]" id="p108_7" value="10807"
                            <?php echo (isset($respuestas[108]) && $respuestas[108] === '10807') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p108_7">Enfermedad respiratorias crónicas</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[108]" id="p108_8" value="10808"
                            <?php echo (isset($respuestas[108]) && $respuestas[108] === '10808') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p108_8">Trastornos del sistema nervioso</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[108]" id="p108_9" value="10809"
                            <?php echo (isset($respuestas[108]) && $respuestas[108] === '10809') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p108_9">Trastornos del sistema digestivo</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[108]" id="p108_10" value="10810"
                            <?php echo (isset($respuestas[108]) && $respuestas[108] === '10810') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p108_10">Trastornos del sistema músculo esquelético</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[108]" id="p108_11" value="10811"
                            <?php echo (isset($respuestas[108]) && $respuestas[108] === '10811') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p108_11">Trastornos dermatológicos</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[108]" id="p108_12" value="10812"
                            <?php echo (isset($respuestas[108]) && $respuestas[108] === '10812') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p108_12">Trastornos endocrinos</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[108]" id="p108_13" value="10813"
                            <?php echo (isset($respuestas[108]) && $respuestas[108] === '10813') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p108_13">Otra</label>

                        <div class="mt-2" id="contenedor-condicion-otra" style="display: <?php echo (isset($respuestas[108]) && $respuestas[108] === '10813') ? 'block' : 'none'; ?>;">
                            <input
                                type="text"
                                name="respuestas_texto[108]"
                                id="input-condicion-otra"
                                class="form-control form-control-sm"
                            
                                placeholder="Especifique la condición física"
                                value="<?php echo $respuestas_texto[108] ?? ''; ?>">
                        </div>
                    </div>
                </div>
                <!-- Pregunta 9 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">9. ¿Cuándo recibió el diagnóstico?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[109]" id="p109_1" value="10901"
                            <?php echo (isset($respuestas[109]) && $respuestas[109] === '10901') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p109_1">Menos de 6 meses</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[109]" id="p109_2" value="10902"
                            <?php echo (isset($respuestas[109]) && $respuestas[109] === '10902') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p109_2">Entre 6 y 12 meses</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[109]" id="p109_3" value="10903"
                            <?php echo (isset($respuestas[109]) && $respuestas[109] === '10903') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p109_3">Entre 1 y 5 años</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[109]" id="p109_4" value="10904"
                            <?php echo (isset($respuestas[109]) && $respuestas[109] === '10904') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p109_4">Entre 6 y 10 años</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[109]" id="p109_5" value="10905"
                            <?php echo (isset($respuestas[109]) && $respuestas[109] === '10905') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p109_5">Más de 11 años</label>
                    </div>
                </div>
                <!-- Pregunta 10 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">10. ¿Su condición de salud física crónica cursa con dolor?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[110]" id="p110_1" value="11001"
                            <?php echo (isset($respuestas[110]) && $respuestas[110] === '11001') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p110_1">La mayoría del tiempo</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[110]" id="p110_2" value="11002"
                            <?php echo (isset($respuestas[110]) && $respuestas[110] === '11002') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p110_2">La mitad del tiempo</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[110]" id="p110_3" value="11003"
                            <?php echo (isset($respuestas[110]) && $respuestas[110] === '11003') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p110_3">En algunas ocasiones</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[110]" id="p110_4" value="11004"
                            <?php echo (isset($respuestas[110]) && $respuestas[110] === '11004') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p110_4">No cursa con dolor</label>
                    </div>
                </div>
                <!-- Pregunta 11 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">11. En una escala del 0 al 10, ¿cuál es la intensidad del dolor? [0 = sin dolor; 10 = el peor imaginable]</legend>

                    <div class="d-flex flex-column align-items-center">
                        <span id="valor-dolor" class="fw-bold mb-2" style="font-size: 4rem; color: #007bff;">
                            <?php
                            // Lógica para mostrar el número correcto basado en el ID persistente
                            $valor_actual = "0";
                            if (isset($respuestas[111])) {
                                $valor_actual = substr($respuestas[111], -2); // Extrae los últimos dígitos (00-10)
                                $valor_actual = (int)$valor_actual;
                            }
                            echo $valor_actual;
                            ?>
                        </span>

                        <input type="range" class="form-range" min="0" max="10" step="1" id="slider-dolor"
                            value="<?php echo $valor_actual; ?>" style="height: 3rem;">

                        <input type="hidden" name="respuestas[111]" id="input-id-dolor"
                            value="<?php echo $respuestas[111] ?? '11100'; ?>">

                        <div class="d-flex justify-content-between w-100 mt-2" style="font-size: 1.5rem;">
                            <span>0 (Sin dolor)</span>
                            <span>10 (El peor)</span>
                        </div>
                    </div>
                </div>
                <!-- Pregunta 12 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">12. ¿A qué tipo de servicio médico acude para el control de su condición?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[112]" id="p112_1" value="11201"
                            <?php echo (isset($respuestas[112]) && $respuestas[112] === '11201') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p112_1">Servicios de salud pública</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[112]" id="p112_2" value="11202"
                            <?php echo (isset($respuestas[112]) && $respuestas[112] === '11202') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p112_2">Seguridad social pública (IMSS, ISSSTE, etc.)</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[112]" id="p112_3" value="11203"
                            <?php echo (isset($respuestas[112]) && $respuestas[112] === '11203') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p112_3">Servicio particular</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[112]" id="p112_4" value="11204"
                            <?php echo (isset($respuestas[112]) && $respuestas[112] === '11204') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p112_4">Servicio particular con seguro</label>
                    </div>
                </div>
                <!-- Pregunta 13 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">13. ¿A qué tipo de médico acude para controlar su condición crónica?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[113]" id="p113_1" value="11301"
                            <?php echo (isset($respuestas[113]) && $respuestas[113] === '11301') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p113_1">Médico general o familiar</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[113]" id="p113_2" value="11302"
                            <?php echo (isset($respuestas[113]) && $respuestas[113] === '11302') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p113_2">Médico especialista</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[113]" id="p113_3" value="11303"
                            <?php echo (isset($respuestas[113]) && $respuestas[113] === '11303') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p113_3">No acudo a atención médica</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[113]" id="p113_4" value="11304"
                            <?php echo (isset($respuestas[113]) && $respuestas[113] === '11304') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p113_4">Otro (alternativa, tradicional)</label>

                        <div class="mt-2" id="contenedor-medico-otro" style="display: <?php echo (isset($respuestas[113]) && $respuestas[113] === '11304') ? 'block' : 'none'; ?>;">
                            <input
                                type="text"
                                name="respuestas_texto[113]"
                                id="input-medico-otro"
                                class="form-control form-control-sm"
                            
                                placeholder="Especifique qué tipo de atención"
                                value="<?php echo $respuestas_texto[113] ?? ''; ?>">
                        </div>
                    </div>
                </div>
                <!-- Pregunta 14 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">14. ¿Con qué frecuencia acude a su médico?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[114]" id="p114_1" value="11401"
                            <?php echo (isset($respuestas[114]) && $respuestas[114] === '11401') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p114_1">Cada mes</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[114]" id="p114_2" value="11402"
                            <?php echo (isset($respuestas[114]) && $respuestas[114] === '11402') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p114_2">Entre 2 y 6 meses</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[114]" id="p114_3" value="11403"
                            <?php echo (isset($respuestas[114]) && $respuestas[114] === '11403') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p114_3">1 vez en el año</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[114]" id="p114_4" value="11404"
                            <?php echo (isset($respuestas[114]) && $respuestas[114] === '11404') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p114_4">Cuando tengo malestares</label>
                    </div>
                </div>
                <!-- Pregunta 15 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">15. En su opinión, ¿qué tanto comprende la información que recibe sobre su condición de salud (causas, síntomas, manejo, crisis)?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[115]" id="p115_1" value="11501"
                            <?php echo (isset($respuestas[115]) && $respuestas[115] === '11501') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p115_1">No la comprendo</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[115]" id="p115_2" value="11502"
                            <?php echo (isset($respuestas[115]) && $respuestas[115] === '11502') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p115_2">La comprendo poco</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[115]" id="p115_3" value="11503"
                            <?php echo (isset($respuestas[115]) && $respuestas[115] === '11503') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p115_3">La comprendo moderadamente</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[115]" id="p115_4" value="11504"
                            <?php echo (isset($respuestas[115]) && $respuestas[115] === '11504') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p115_4">La comprendo bastante</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[115]" id="p115_5" value="11505"
                            <?php echo (isset($respuestas[115]) && $respuestas[115] === '11505') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p115_5">La comprendo totalmente</label>
                    </div>
                </div>
                <!-- Pregunta 16 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">16. En su opinión, ¿sigue las indicaciones de su médico para controlar su condición crónica?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[116]" id="p116_1" value="11601"
                            <?php echo (isset($respuestas[116]) && $respuestas[116] === '11601') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p116_1">Sí, sigo todas las instrucciones</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[116]" id="p116_2" value="11602"
                            <?php echo (isset($respuestas[116]) && $respuestas[116] === '11602') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p116_2">Solo sigo toma de medicamentos</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[116]" id="p116_3" value="11603"
                            <?php echo (isset($respuestas[116]) && $respuestas[116] === '11603') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p116_3">Sigo parcialmente medicamentos y estilos de vida</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[116]" id="p116_4" value="11604"
                            <?php echo (isset($respuestas[116]) && $respuestas[116] === '11604') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p116_4">Sigo solo cambios de estilos de vida</label>
                    </div>
                </div>
                <!-- Pregunta 17 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">17. ¿Toma medicamentos ansiolíticos o antidepresivos?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[117]" id="p117_1" value="11701"
                            <?php echo (isset($respuestas[117]) && $respuestas[117] === '11701') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p117_1">No</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[117]" id="p117_2" value="11702"
                            <?php echo (isset($respuestas[117]) && $respuestas[117] === '11702') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p117_2">Solo ansiolíticos</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[117]" id="p117_3" value="11703"
                            <?php echo (isset($respuestas[117]) && $respuestas[117] === '11703') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p117_3">Solo antidepresivos</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[117]" id="p117_4" value="11704"
                            <?php echo (isset($respuestas[117]) && $respuestas[117] === '11704') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p117_4">Sí, ansiolíticos y antidepresivos</label>
                    </div>
                </div>
                <!-- Pregunta 18 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">18. En su opinión, ¿los síntomas físicos de su condición interfieren con sus actividades cotidianas?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[118]" id="p118_1" value="11801"
                            <?php echo (isset($respuestas[118]) && $respuestas[118] === '11801') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p118_1">Afectadas gravemente</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[118]" id="p118_2" value="11802"
                            <?php echo (isset($respuestas[118]) && $respuestas[118] === '11802') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p118_2">Afectadas fuertemente</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[118]" id="p118_3" value="11803"
                            <?php echo (isset($respuestas[118]) && $respuestas[118] === '11803') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p118_3">Afectadas ligeramente</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[118]" id="p118_4" value="11804"
                            <?php echo (isset($respuestas[118]) && $respuestas[118] === '11804') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p118_4">No afectadas</label>
                    </div>
                </div>
                xº
                <!-- Pregunta 19 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">19. ¿Debido a su condición crónica requiere de ser asistido por un cuidador?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[119]" id="p119_1" value="11901"
                            <?php echo (isset($respuestas[119]) && $respuestas[119] === '11901') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p119_1">Si, todo el tiempo</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[119]" id="p119_2" value="11902"
                            <?php echo (isset($respuestas[119]) && $respuestas[119] === '11902') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p119_2">Si, la mayoría del tiempo</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[119]" id="p119_3" value="11903"
                            <?php echo (isset($respuestas[119]) && $respuestas[119] === '11903') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p119_3">Si, parcialmente</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[119]" id="p119_4" value="11904"
                            <?php echo (isset($respuestas[119]) && $respuestas[119] === '11904') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p119_4">No requiero asistencia</label>
                    </div>
                </div>

                <!-- Pregunta 20 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">20. ¿Cómo describiría el nivel de facilidad para usar aplicaciones digitales?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[120]" id="p120_1" value="12001"
                            <?php echo (isset($respuestas[120]) && $respuestas[120] === '12001') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p120_1">Bajo, tengo dificultades</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[120]" id="p120_2" value="12002"
                            <?php echo (isset($respuestas[120]) && $respuestas[120] === '12002') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p120_2">Medio, puedo usarlas</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[120]" id="p120_3" value="12003"
                            <?php echo (isset($respuestas[120]) && $respuestas[120] === '12003') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p120_3">Alto, las uso con facilidad</label>
                    </div>
                </div>

                <!-- Pregunta 21 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">21. ¿En qué tipo de dispositivo regularmente utilizarás para realizar el Programa CRECE?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[121]" id="p121_1" value="12101"
                            <?php echo (isset($respuestas[121]) && $respuestas[121] === '12101') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p121_1">Computadora de escritorio</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[121]" id="p121_2" value="12102"
                            <?php echo (isset($respuestas[121]) && $respuestas[121] === '12102') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p121_2">Computadora portátil</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[121]" id="p121_3" value="12103"
                            <?php echo (isset($respuestas[121]) && $respuestas[121] === '12103') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p121_3">Tableta</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[121]" id="p121_4" value="12104"
                            <?php echo (isset($respuestas[121]) && $respuestas[121] === '12104') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p121_4">Teléfono inteligente</label>
                    </div>
                </div>
                <!-- Pregunta 22 -->
                <div class="campo-encuesta card mb-4 p-4 shadow-sm">
                    <legend class="mb-3">22. ¿Qué tipo de conexión a Internet utilizarás regularmente para iniciar sesión en el Programa CRECE?</legend>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[122]" id="p122_1" value="12201"
                            <?php echo (isset($respuestas[122]) && $respuestas[122] === '12201') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p122_1">Wi-fi</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[122]" id="p122_2" value="12202"
                            <?php echo (isset($respuestas[122]) && $respuestas[122] === '12202') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p122_2">Datos celulares de prepago</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[122]" id="p122_3" value="12203"
                            <?php echo (isset($respuestas[122]) && $respuestas[122] === '12203') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p122_3">Datos celulares de plan de renta</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="respuestas[122]" id="p122_4" value="12204"
                            <?php echo (isset($respuestas[122]) && $respuestas[122] === '12204') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="p122_4">Internet comunitario/público</label>
                    </div>
                </div>
                <div class="contenedor-bcc">
                    <input class="auth-button" type="submit" value="Enviar" />
                </div>
            </form>
        </div>
    </section>
</main>

<script>
    // Manejo de la Pregunta 1 (Estado Civil)
    document.querySelectorAll('input[name="respuestas[101]"]').forEach((radio) => {
        radio.addEventListener('change', function() {
            const contenedorTexto = document.getElementById('contenedor-especifique');
            const inputTexto = contenedorTexto.querySelector('input'); // Seleccionamos el input de texto

            if (this.id === 'p101_6') {
                contenedorTexto.style.display = 'block';
            } else {
                contenedorTexto.style.display = 'none';
                inputTexto.value = ''; // <-- LIMPIAMOS EL TEXTO si elige otra opción
            }
        });
    });

    // Manejo de la Pregunta 3 (Ocupación)
    document.querySelectorAll('input[name="respuestas[103]"]').forEach((radio) => {
        radio.addEventListener('change', function() {
            const contenedorOcupacion = document.getElementById('contenedor-ocupacion-otro');
            const inputOcupacion = contenedorOcupacion.querySelector('input'); // Seleccionamos el input

            if (this.id === 'p103_8') {
                contenedorOcupacion.style.display = 'block';
            } else {
                contenedorOcupacion.style.display = 'none';
                inputOcupacion.value = ''; // <-- LIMPIAMOS EL TEXTO si elige otra opción
            }
        });
    });

    // Manejo de la Pregunta 4 (Residencia)
    const selectResidencia = document.getElementById('p104_select');
    if (selectResidencia) {
        selectResidencia.addEventListener('change', function() {
            const contenedorExtranjero = document.getElementById('contenedor-extranjero');
            const inputExtranjero = document.getElementById('input-extranjero');

            if (this.value === '10433') {
                contenedorExtranjero.style.display = 'block';
            } else {
                contenedorExtranjero.style.display = 'none';
                inputExtranjero.value = ''; // Limpieza de persistencia
            }
        });
    }

    // Manejo de la Pregunta 108 (Condición Física)
    document.querySelectorAll('input[name="respuestas[108]"]').forEach((radio) => {
        radio.addEventListener('change', function() {
            const contenedorOtra = document.getElementById('contenedor-condicion-otra');
            const inputOtra = document.getElementById('input-condicion-otra');

            if (this.id === 'p108_13') { // Opción 10813 es "Otra"
                contenedorOtra.style.display = 'block';
            } else {
                contenedorOtra.style.display = 'none';
                inputOtra.value = ''; // Limpiamos el texto si elige otra opción
            }
        });
    });

    const slider = document.getElementById('slider-dolor');
    const visor = document.getElementById('valor-dolor');
    const inputHidden = document.getElementById('input-id-dolor');

    if (slider) {
        slider.addEventListener('input', function() {
            const valor = this.value;
            visor.textContent = valor;

            // Mapeo: Si el valor es 0-9, el ID es 11100-11109. Si es 10, el ID es 11110.
            let idBase = "111";
            let sufijo = valor.padStart(2, '0'); // Convierte 1 en "01", 10 en "10"

            inputHidden.value = idBase + sufijo;
        });
    }

    // Manejo de la Pregunta 113 (Tipo de médico)
    document.querySelectorAll('input[name="respuestas[113]"]').forEach((radio) => {
        radio.addEventListener('change', function() {
            const contenedorMedico = document.getElementById('contenedor-medico-otro');
            const inputMedico = document.getElementById('input-medico-otro');

            if (this.id === 'p113_4') { // Opción 11304 es "Otro"
                contenedorMedico.style.display = 'block';
            } else {
                contenedorMedico.style.display = 'none';
                inputMedico.value = ''; // Limpiamos el texto si cambia de opción
            }
        });
    });
</script>