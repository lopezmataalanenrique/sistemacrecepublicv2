<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?? 'Mi Reconocimiento | CRECE'; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Lato:wght@400;700&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --unam-azul: #003b70;
            --unam-oro: #c79e57;
            --primary: #12307D;
        }

        body {
            font-family: 'Lato', sans-serif;
            background-color: #f4f6f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 0;
            margin: 0;
        }

        /* Contenedor para scroll en móvil */
        .diploma-wrapper {
            width: 100%;
            max-width: 100vw;
            overflow-x: auto;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
        }

        /* CONTENEDOR PRINCIPAL FIJO (950x750) */
        #diploma-container {
            width: 950px;
            min-width: 950px; 
            height: 750px; /* Altura fija para evitar desbordes */
            background-color: #ffffff;
            padding: 60px 50px 40px 50px;
            position: relative;
            box-sizing: border-box;
            border: 20px solid var(--unam-azul);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden; /* Nada sale del cuadro */
        }

        /* Marco dorado interior */
        #diploma-container::after {
            content: '';
            position: absolute;
            top: 10px; left: 10px; right: 10px; bottom: 10px;
            border: 2px solid var(--unam-oro);
            pointer-events: none;
            z-index: 5;
        }

        .header-logos {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding: 0 10px;
            z-index: 1;
        }

        .header-logos img {
            height: 48px; /* Tamaño exacto del diseño aprobado */
            object-fit: contain;
        }

        .content {
            text-align: center;
            z-index: 1;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            color: var(--unam-azul);
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .sub-titulo {
            font-size: 1.1rem;
            color: var(--unam-oro);
            font-weight: 700;
            letter-spacing: 5px;
            margin-bottom: 25px;
        }

        .nombre-usuario {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            color: var(--primary);
            border-bottom: 2px solid var(--unam-oro);
            display: inline-block;
            margin: 25px 0;
            padding: 0 60px;
            font-style: italic;
        }

        .descripcion {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 20px auto;
            line-height: 1.6;
            color: #333;
        }

        .footer-diploma {
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            margin-bottom: 20px;
            z-index: 1;
        }

        .fecha {
            font-size: 0.95rem;
            color: #555;
            padding-bottom: 10px;
            font-weight: 700;
        }

        .firma-wrapper {
            position: relative;
            text-align: center;
            width: 260px;
        }

        .sello-firma {
            position: absolute;
            bottom: 25px; 
            left: 50%;
            transform: translateX(-50%);
            width: 90px;
            height: auto;
            opacity: 0.85;
            z-index: 2;
        }

        .firma-espacio {
            border-top: 1px solid #aaa;
            padding-top: 12px;
            font-size: 1rem;
            font-weight: 700;
            color: var(--unam-azul);
            position: relative;
            z-index: 3;
        }

        /* Botón de descarga estilizado */
        .btn-descarga-final {
            margin: 40px 0;
            padding: 18px 45px;
            background-color: var(--unam-oro);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(199, 158, 87, 0.3);
        }

        .btn-descarga-final:hover {
            background-color: var(--unam-azul);
            transform: translateY(-2px);
        }

        .btn-descarga-final:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>

<body>

    <div class="diploma-wrapper">
        <div id="diploma-container">
            <div class="header-logos">
                <img src="/build/img/logo-unam.webp" alt="UNAM">
                <img src="/build/img/logo-suayed.webp" alt="SUAYED">
                <img src="/build/img/logo-labpsiit.webp" alt="LABPSIIT">
                <img src="/build/img/logo-ipn.webp" alt="IPN">
                <img src="/build/img/logo-escom.webp" alt="ESCOM">
            </div>

            <div class="content">
                <p class="sub-titulo">RECONOCIMIENTO</p>
                <h1>Programa CRECE</h1>

                <p style="margin-top: 15px; font-size: 1.2rem; color: #444;">Otorga con orgullo el presente a:</p>

                <div class="nombre-usuario">
                    <?php echo htmlspecialchars($usuario->nombre . " " . $usuario->apellido_paterno); ?>
                </div>

                <p class="descripcion">
                    En reconocimiento al <strong>compromiso, tiempo y esfuerzo dedicado</strong> para completar el programa de acompañamiento para la autogestión de condiciones crónicas de salud.
                </p>
            </div>

            <div class="footer-diploma">
                <div class="fecha">
                    México, <?php echo $fecha; ?>
                </div>
                
                <div class="firma-wrapper">
                    <img src="/build/img/logo-crece.webp" class="sello-firma" alt="Sello CRECE">
                    <div class="firma-espacio">
                        Equipo CRECE 2026
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="btn-descarga-final" id="btnDescargar">
        <i class="fas fa-file-pdf"></i> <span>DESCARGAR MI RECONOCIMIENTO</span>
    </button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('btnDescargar');
            const diploma = document.getElementById('diploma-container');

            btn.addEventListener('click', async () => {
                const textSpan = btn.querySelector('span');
                const originalText = textSpan.innerHTML;
                
                btn.disabled = true;
                textSpan.innerText = 'GENERANDO...';

                try {
                    // html2canvas con opciones específicas para evitar recortes
                    const canvas = await html2canvas(diploma, {
                        scale: 3, // Mayor calidad
                        useCORS: true,
                        backgroundColor: "#ffffff",
                        width: 950,
                        height: 750,
                        logging: false
                    });

                    const imgData = canvas.toDataURL('image/png');
                    const { jsPDF } = window.jspdf;
                    
                    // Formato carta/A4 horizontal
                    const pdf = new jsPDF('landscape', 'px', [950, 750]);
                    pdf.addImage(imgData, 'PNG', 0, 0, 950, 750);
                    pdf.save('Reconocimiento_CRECE_2026.pdf');

                } catch (error) {
                    console.error(error);
                    alert("Error al generar el documento.");
                } finally {
                    btn.disabled = false;
                    textSpan.innerHTML = originalText;
                }
            });
        });
    </script>
</body>
</html>