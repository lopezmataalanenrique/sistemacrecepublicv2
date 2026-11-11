<!DOCTYPE html>
<html lang="es-MX">

<head>
    <style>
        /* 1. ESPACIO PARA CELULARES (Pantallas pequeñas) */
        .actividad {
            /* Ajusta este número según el alto de tu menú en celular */
            scroll-margin-top: 180px;
        }

        /* 2. ESPACIO PARA COMPUTADORAS (Pantallas de 992px en adelante) */
        @media (min-width: 992px) {
            .actividad {
                /* Ajusta este número según el alto de tus dos menús juntos en PC */
                scroll-margin-top: 150px;
            }
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROGRAMA CRECE</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="build/css/app.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="body-c">
    <?php echo $contenido; ?>

    <script src="build/js/app.js"></script>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>