<section class="header-resultados">
    <div class="">
        <div class="">
            <a href="/">
                <img src="/build/img/logo-crece.webp" alt="Programa CRECE" class="logo-resultados">
            </a>

        </div>
        <div class="header-texto-resultados">
            <p>Muchas gracias por el tiempo y la dedicación que invertiste en responder los cuestionarios.</p>
            <p>Después de analizar tus respuestas, te presentamos un resumen general sobre algunos aspectos de tu salud mental.</p>
            <p class="no-diagnostico">Es importante enfatizar, que esta información es de carácter orientativo y <span class="cursiva-negritas">no constituye un diagnóstico psicológico</span>.</p>
        </div>
    </div>
</section>

<main class="contenedor-resultados">
    <div class="resultado">
        <h2 class="titulo-resultado">Estrés</h2>

        <?php
        // El puntaje máximo teórico del PSS-10 es 40
        $porcentaje_llenado = ($puntaje_pss10 / 40) * 100;
        // Limitamos al 100% para evitar desbordamientos visuales
        $porcentaje_llenado = $porcentaje_llenado > 100 ? 100 : $porcentaje_llenado;
        ?>

        <div class="contenedor-barra">
            <div class="barra-llenado" style="width: <?php echo $porcentaje_llenado; ?>%;"></div>
        </div>

        <?php if ($puntaje_pss10 <= 19) : ?>
            <p class="texto-justificado">El estrés es una reacción natural del cuerpo y la mente ante las demandas de la vida cotidiana. Refleja qué tan exigentes o abrumadoras se perciben las situaciones que enfrentamos.</p>

            <p class="texto-justificado">Tu nivel de estrés percibido se encuentra en un <strong>rango leve</strong>. Este resultado sugiere que, en general, has logrado manejar de forma efectiva las situaciones desafiantes durante el último mes.</p>

            <p class="texto-justificado">CRECE busca fortalecer habilidades de regulación emocional y autocuidado que pueden ayudarte a mantener una relación saludable con las exigencias en tu vida cotidiana.</p>

        <?php elseif ($puntaje_pss10 <= 25) : ?>
            <p class="texto-justificado">El estrés es una reacción natural del cuerpo y la mente ante las demandas de la vida cotidiana. Refleja qué tan exigentes o abrumadoras se perciben las situaciones que enfrentamos.</p>

            <p class="texto-justificado">Tu nivel de estrés percibido se encuentra en un <strong>rango moderado</strong>. Esto sugiere que, en algunas ocasiones, experimentas una carga de tensión o estrés mayor, lo cual podría generar desgaste físico y mental si se mantiene con el tiempo.</p>

            <p class="texto-justificado">CRECE es una oportunidad para desarrollar herramientas de regulación y autocuidado que te permitan manejar las situaciones desafiantes más efectivamente y prevenir que la carga del estrés aumente y se prolongue.</p>

        <?php else : ?>
            <p class="texto-justificado">El estrés es una reacción natural del cuerpo y la mente ante las demandas de la vida cotidiana. Refleja qué tan exigentes o abrumadoras se perciben.</p>

            <p class="texto-justificado">Tu puntuación refleja un <strong>nivel elevado de estrés percibido</strong>, lo que sugiere una sobrecarga importante, que puede impactar en tu bienestar y calidad de vida.</p>

            <p class="texto-justificado">Este resultado puede tomarse como una señal para prestar atención en ti. CRECE busca cultivar habilidades de regulación emocional y autocuidado que pueden ayudarte a relacionarte de forma más saludable con las situaciones de estrés.</p>
        <?php endif; ?>
    </div>
    <div class="resultado">
        <h2 class="titulo-resultado">Depresión</h2>

        <?php
        // El puntaje máximo del PHQ-9 es 27 (9 preguntas x 3 puntos máximo)
        $porcentaje_phq9 = ($puntaje_phq9 / 27) * 100;
        $porcentaje_phq9 = $porcentaje_phq9 > 100 ? 100 : $porcentaje_phq9;
        ?>

        <div class="contenedor-barra">
            <div class="barra-llenado" style="width: <?php echo $porcentaje_phq9; ?>%;"></div>
        </div>

        <?php if ($puntaje_phq9 <= 9) : ?>
            <p class="texto-justificado">La depresión se relaciona con la presencia persistente de desánimo, pérdida de interés o disfrute y tiene algunas manifestaciones cognitivas y en el comportamiento.</p>

            <p class="texto-justificado">Tu resultado apunta a un <strong>nivel leve</strong> de síntomas depresivos. Esto sugiere que puedes haber experimentado algunos desafíos con una intensidad manejable y no interfiere con tu vida cotidiana.</p>

            <p class="texto-justificado">CRECE está diseñado para que fortalezcas tu conexión con el autocuidado y resiliencia, favoreciendo respuestas saludables.</p>

        <?php elseif ($puntaje_phq9 <= 19) : ?>
            <p class="texto-justificado">La depresión se relaciona con la presencia persistente de desánimo, pérdida de interés y tiene algunas manifestaciones cognitivas y en el comportamiento.</p>

            <p class="texto-justificado">Tu resultado revela la <strong>presencia moderada</strong> de síntomas depresivos. Es posible que durante las últimas semanas hayas experimentado con mayor frecuencia malestar emocional que podría estar impactando en tu energía, motivación y capacidad de disfrute.</p>

            <p class="texto-justificado">CRECE es una oportunidad para desarrollar prácticas de conexión y afrontamiento que te ayuden a lidiar con situaciones adversas y fomentar tu bienestar.</p>

        <?php else : ?>
            <p class="texto-justificado">La depresión se relaciona con la presencia persistente de desánimo, pérdida de interés y tiene algunas manifestaciones cognitivas y en el comportamiento.</p>

            <p class="texto-justificado">El <strong>nivel de síntomas depresivos</strong> que reportas es <strong>elevado</strong> y sugiere que podrían estar interfiriendo en tu vida cotidiana.</p>

            <p class="texto-justificado">CRECE está diseñado para promover el bienestar emocional, sin embargo no sustituye una evaluación y atención especializada y personalizada por un profesional de la salud mental.</p>
        <?php endif; ?>
    </div>
    <div class="resultado">
        <h2 class="titulo-resultado">Ansiedad</h2>

        <?php
        // El puntaje máximo del GAD-7 es 21 (7 ítems x 3 puntos)
        $porcentaje_gad7 = ($puntaje_gad7 / 21) * 100;
        $porcentaje_gad7 = $porcentaje_gad7 > 100 ? 100 : $porcentaje_gad7;
        ?>

        <div class="contenedor-barra">
            <div class="barra-llenado" style="width: <?php echo $porcentaje_gad7; ?>%;"></div>
        </div>

        <?php if ($puntaje_gad7 <= 9) : ?>
            <p class="texto-justificado">La ansiedad se relaciona con la incertidumbre, la preocupación constante y dificultad para relajarse cuando una situación se percibe como amenazante.</p>

            <p class="texto-justificado">Tu resultado indica un <strong>rango leve</strong> de síntomas de ansiedad. Este resultado sugiere que las señales que has llegado a experimentar ante situaciones específicas suelen ser manejables.</p>

            <p class="texto-justificado">Este momento puede ser una oportunidad para desarrollar estrategias que te ayuden a lidiar con las preocupaciones, favoreciendo respuestas saludables y asertivas.</p>

        <?php elseif ($puntaje_gad7 <= 14) : ?>
            <p class="texto-justificado">La ansiedad se relaciona con la incertidumbre, la preocupación constante y dificultad para relajarse cuando una situación se percibe como amenazante.</p>

            <p class="texto-justificado">Tu resultado se encuentra en un <strong>rango moderado</strong>. Esto sugiere que la preocupación o el nerviosismo se presentan con mayor frecuencia o intensidad y podrían estar interfiriendo con tus relaciones, productividad, salud o alguna otra área de tu vida.</p>

            <p class="texto-justificado">CRECE es una oportunidad para desarrollar herramientas que te ayuden a responder de manera más consciente y flexible ante las situaciones desafiantes.</p>

        <?php else : ?>
            <p class="texto-justificado">La ansiedad se relaciona con la incertidumbre, la preocupación constante y dificultad para relajarse cuando una situación se percibe como amenazante.</p>

            <p class="texto-justificado">El <strong>nivel que reportas es elevado</strong>, lo que sugiere la presencia de malestar e interferencias significativas en tu vida cotidiana.</p>

            <p class="texto-justificado">CRECE es un programa de acompañamiento y fortalecimiento de recursos que no cuenta con el alcance para brindarte la atención a tus necesidades actuales.</p>

            <p class="texto-justificado">Un profesional de la salud mental puede brindarte esta atención específica y acompañarte durante el proceso.</p>
        <?php endif; ?>
    </div>
    <div class="resultado">
        <h2 class="titulo-resultado">Bienestar</h2>

        <?php
        // El puntaje ya viene estandarizado de 0 a 100 desde el controlador
        $porcentaje_who5 = $puntaje_who5;
        ?>

        <div class="contenedor-barra">
            <div class="barra-llenado" style="width: <?php echo $porcentaje_who5; ?>%;"></div>
        </div>

        <?php if ($puntaje_who5 <= 36) : ?>
            <p class="texto-justificado">El bienestar es la percepción personal sobre el balance y satisfacción con nuestra vida diaria y cómo lo manifestamos.</p>

            <p class="texto-justificado">Tu puntuación indica un <strong>nivel bajo de bienestar</strong>, lo que sugiere que puedes estar experimentando con menor frecuencia sentimientos como la alegría, la energía, o el interés por tu entorno.</p>

            <p class="texto-justificado">CRECE es un espacio orientado a favorecer respuestas de afrontamiento asertivo que te ayuden a encontrar mayor equilibrio en tu bienestar físico, emocional, mental y social, favoreciendo respuestas funcionales a las demandas del día a día.</p>

        <?php elseif ($puntaje_who5 <= 72) : ?>
            <p class="texto-justificado">El bienestar es la percepción personal sobre el balance y satisfacción con nuestra vida diaria y cómo lo manifestamos.</p>

            <p class="texto-justificado">Tu puntuación corresponde a los <strong>niveles promedio de bienestar</strong>. Esto sugiere que has experimentado momentos de alegría, energía y tranquilidad, aunque podrías estar experimentado momentos de cansancio emocional o disminución del disfrute en algunas áreas de tu vida.</p>

            <p class="texto-justificado">CRECE es una oportunidad para fortalecer el autocuidado y contribuir a acrecentar tu bienestar.</p>

        <?php else : ?>
            <p class="texto-justificado">El bienestar es la percepción personal sobre el balance y satisfacción con nuestra vida diaria y cómo lo manifestamos.</p>

            <p class="texto-justificado">Tu puntuación en bienestar se encuentra en un <strong>rango alto</strong>, lo que sugiere una experiencia frecuente de energía, ánimo positivo y satisfacción en tu vida diaria.</p>

            <p class="texto-justificado">Las actividades en CRECE, pueden ayudarte a mantener y fortalecer tus recursos, consolidar las prácticas de autocuidado que favorezcan tu bienestar general.</p>
        <?php endif; ?>
    </div>
    <div class="resultado resultado-final">
        <h2 class="titulo-resultado">Calidad de Vida Relacionada a la Salud</h2>

        <?php
        $promedio_general = array_sum($dominios_who) / 4;
        ?>

        <div class="detalles-dominios">
            <?php
            $nombres = [
                'fisico' => 'Salud Física',
                'psicologico' => 'Salud Psicológica',
                'social' => 'Relaciones Sociales',
                'ambiental' => 'Ambiente y Entorno'
            ];

            foreach ($dominios_who as $clave => $valor): ?>
                <div class="bloque-dominio-grafico" style="margin-bottom: 1.5rem;">
                    <p style="margin-bottom: 5px;"><strong><?php echo $nombres[$clave]; ?></strong></p>
                    <div class="contenedor-barra">
                        <div class="barra-llenado" style="width: <?php echo $valor; ?>%;"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="retroalimentacion-caja">
            <?php if ($promedio_general <= 44) : ?>
                <p class="texto-justificado">La calidad de vida relacionada a la salud refleja cómo percibes tu vida en distintas áreas, tomando en cuenta la influencia de tu estado de salud.</p>
                <p class="texto-justificado">De acuerdo a tu resultado, tu percepción se encuentra en un <strong>rango bajo</strong>, lo que sugiere que experimentas desafíos importantes en una o varias áreas de tu vida: salud física, emocional, relaciones personales o en la relación con tu entorno.</p>
                <p class="texto-justificado">CRECE está diseñado para acompañarte en la identificación de lo que es valioso para ti y en el desarrollo de habilidades y prácticas que contribuyan a mejorar el equilibrio dinámico en tu bienestar integral.</p>

            <?php elseif ($promedio_general <= 69) : ?>
                <p class="texto-justificado">La calidad de vida relacionada a la salud refleja cómo percibes tu vida en distintas áreas, tomando en cuenta la influencia de tu estado de salud.</p>
                <p class="texto-justificado">De acuerdo a tu resultado, tu percepción se encuentra en un <strong>rango promedio</strong>. Esto sugiere que algunas áreas en tu vida (salud física, emocional, relaciones personales o en la relación con tu entorno) se encuentran más impactadas.</p>
                <p class="texto-justificado">CRECE es una oportunidad para reflexionar y elegir acciones cotidianas que favorezcan esas áreas de tu vida, de forma que fortalezcas tu calidad de vida.</p>

            <?php else : ?>
                <p class="texto-justificado">La calidad de vida relacionada a la salud refleja cómo percibes tu vida en distintas áreas, tomando en cuenta la influencia de tu estado de salud.</p>
                <p class="texto-justificado">De acuerdo a tu resultado, tu percepción se encuentra en un <strong>rango alto</strong>. Esto sugiere que has logrado un buen equilibrio entre las distintas áreas en tu vida: salud física, emocional, relaciones personales y en la relación con tu entorno.</p>
                <p class="texto-justificado">CRECE puede ayudarte a mantener fortalecida la forma en que te relacionas con tu salud y consolidar prácticas que preserven una vida equilibrada y alineada a lo que es importante para ti.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="contenedor-boton-final">
        <form method="POST" class="formulario">
            <input type="submit" value="Continuar" class="boton-resultados">
        </form>
    </div>

</main>