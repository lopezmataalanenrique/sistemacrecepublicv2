<nav class="navbar navbar-pm navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand navbar-brand-pm" href="/panel-modulos">
            <div class="inicio-pm">
                <div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="30"
                        height="30"
                        viewBox="0 0 24 24"
                        fill="#FFF">
                        <path d="M12.707 2.293l9 9c.63 .63 .184 1.707 -.707 1.707h-1v6a3 3 0 0 1 -3 3h-1v-7a3 3 0 0 0 -2.824 -2.995l-.176 -.005h-2a3 3 0 0 0 -3 3v7h-1a3 3 0 0 1 -3 -3v-6h-1c-.89 0 -1.337 -1.077 -.707 -1.707l9 -9a1 1 0 0 1 1.414 0m.293 11.707a1 1 0 0 1 1 1v7h-4v-7a1 1 0 0 1 .883 -.993l.117 -.007z" />
                    </svg>
                </div>
                <div>
                    <p>Panel</p>
                </div>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="40"
                height="40"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#FFF"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M4 6l16 0" />
                <path d="M4 12l16 0" />
                <path d="M4 18l16 0" />
            </svg>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <img src="/build/img/logo-crece.webp" alt="Logo del programa CRECE" class="navbar--logo navbar--logo__offcanvas" />
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mt-3">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="offcanvas-body nav-item">
                        <a class="nav-link-c-pm" aria-current="page" href="/panel-modulos">Panel</a>
                    </li>
                    
                    <li class="offcanvas-body nav-item">
                        <a class="nav-link-c-pm" href="/logout">Cerrar sesión</a>
                    </li>
                    <li class="offcanvas-body nav-item">
                        <a class="nav-link-c-pm nav-link-c--active-pm" href="/saber-mas">Saber más</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<header class="encabezado-panel">
        <div class="encabezado-panel-instituciones">
            <a href="https://www.ipn.mx/" target="_blank">
                <img class="encabezado-panel__logo" src="/build/img/logo-ipn.webp" alt="IPN">
            </a>

            <a href="https://www.escom.ipn.mx/" target="_blank">
                <img class="encabezado-panel__logo" src="/build/img/logo-escom.webp" alt="ESCOM">
            </a>

            <a href="https://www.unam.mx/" target="_blank">
                <img class="encabezado-panel__logo" src="/build/img/logo-unam.webp" alt="UNAM">
            </a>

            <a href="https://suayed.iztacala.unam.mx/" target="_blank">
                <img class="encabezado-panel__logo" src="/build/img/logo-suayed.webp" alt="FES Iztacala / SUAYED">
            </a>

            <a href="https://labpsiit.iztacala.unam.mx/" target="_blank">
                <img class="encabezado-panel__logo" src="/build/img/logo-labpsiit.webp" alt="LABPSIIT">
            </a>
        </div>
        <div class="encabezado-panel-logo-crece">
            <img class="encabezado-panel__logo" src="/build/img/logo-crece.webp" alt="Logo del programa CRECE" />
        </div>
    </header>
<main class="dashboard-container">
    
    <section class="encabezado-modulo" style="text-align: center; margin-bottom: 4rem;">


        <h1 style="color: #12307D; margin-bottom: 1rem;">Sección Saber Más</h1>
        <p style="color: #666;">Encuentra aquí material de apoyo, infografías y lecturas adicionales para complementar tu proceso.</p>
    </section>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px; padding: 20px;">
        
        <?php if(!empty($archivos)): ?>
            <?php foreach($archivos as $archivo): ?>
                <div style="background: white; border: 1px solid #e0e0e0; border-radius: 12px; padding: 25px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.3s ease;">
                    
                    <!-- Ícono de PDF -->
                    <div style="margin-bottom: 20px;">
                        <i class="fas fa-file-pdf" style="font-size: 4rem; color: #e74c3c;"></i>
                    </div>
                    
                    <!-- Nombre formateado -->
                    <h3 style="color: #333; margin-bottom: 10px; font-weight: 700;">
                        <?php echo htmlspecialchars($archivo['nombre_limpio']); ?>
                    </h3>
                    
                    <!-- Peso del archivo -->
                    <p style="color: #888;  margin-bottom: 25px;">
                        Documento PDF (<?php echo $archivo['peso']; ?> MB)
                    </p>
                    
                    <!-- Botones de acción -->
                    <div style="display: flex; gap: 10px; justify-content: center;">
                        <!-- Botón Ver (Abre en otra pestaña) -->
                        <a href="<?php echo $archivo['ruta']; ?>" target="_blank" class="boton" style="background: #f1f3f5; color: #333; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 600; flex: 1;">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                        
                        <!-- Botón Descargar (Fuerza la descarga) -->
                        <a href="<?php echo $archivo['ruta']; ?>" download class="boton" style="background: #12307D; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 600; flex: 1;">
                            <i class="fas fa-download"></i> Bajar
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="grid-column: 1 / -1; text-align: center; padding: 5rem 2rem; background: #fdfdfd; border-radius: 12px; border: 2px dashed #ccc;">
                <i class="fas fa-folder-open" style="font-size: 4rem; color: #ccc; margin-bottom: 1rem;"></i>
                <h3 style="color: #666;">Próximamente</h3>
                <p style="color: #888;">Estamos preparando nuevos materiales. Vuelve pronto.</p>
            </div>
        <?php endif; ?>

    </div>
</main>