<header>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/panel-control">
                <img src="/build/img/logo-crece.webp" alt="Logo del programa CRECE" class="navbar--logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="40"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="#000000"
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
                            <a class="nav-link-c nav-link-c--active" aria-current="page" href="/panel-control">Dashboard</a>
                        </li>
                        <li class="offcanvas-body nav-item">
                            <a class="nav-link-c" href="/control-usuarios">Control usuarios</a>
                        </li>

                        <?php if (isset($_SESSION['id_rol']) && $_SESSION['id_rol'] === '1'): ?>

                            <li class="offcanvas-body nav-item">
                                <a class="nav-link-c" href="/control-personal">Control personal</a>
                            </li>
                        <?php endif; ?>

                        <li class="offcanvas-body nav-item">
                            <a class="nav-link-c" href="/logout">Cerrar Sesión</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<main class="dashboard-container p-4" style="padding-top: 100px;">
    <header class="bienvenida" style="margin-bottom: 2rem;">
        <h1 style="color: #12307D;">Bienvenido(a), <?php echo htmlspecialchars($nombre); ?></h1>
        <p style="color: #666;">
            Rol actual:
            <strong>
                <?php echo ($_SESSION['id_rol'] === '1') ? 'Administrador Maestro' : 'Psicólogo'; ?>
            </strong>
        </p>
    </header>

    <section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 3rem;">

        <div style="background: #12307D; color: white; padding: 2.5rem; border-radius: 12px; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <div style="font-size: 3.5rem; font-weight: 800; line-height: 1;">
                <?php echo $metricas['total_usuarios']; ?>
            </div>
            <p margin-top: 10px; opacity: 0.9;">Usuarios Registrados en CRECE</p>
        </div>

        <div style="background: #e74c3c; color: white; padding: 2.5rem; border-radius: 12px; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <div style="font-size: 3.5rem; font-weight: 800; line-height: 1;">
                <?php echo $metricas['total_canalizados']; ?>
            </div>
            <p margin-top: 10px; opacity: 0.9;">Total de Canalizados</p>
        </div>

    </section>

    <section>
        <h3 style="color: #333; border-bottom: 2px solid #e9ecef; padding-bottom: 10px; margin-bottom: 20px; font-size: 1.2em; font-weight: 600;">
            <i class="fas fa-chart-pie" style="color: #12307D; margin-right: 10px;"></i> Desglose de Canalización
        </h3>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">

            <div style="background: #fdfdfd; border: 1px solid #e0e0e0; border-left: 6px solid #f39c12; padding: 1.5rem; border-radius: 8px;">
                <p style="color: #666; margin-bottom: 5px; font-weight: 600;">Por Minoría de Edad</p>
                <div style="font-size: 2.5rem; font-weight: bold; color: #f39c12;">
                    <?php echo $metricas['canalizados_menores']; ?>
                </div>
            </div>

            <div style="background: #fdfdfd; border: 1px solid #e0e0e0; border-left: 6px solid #9b59b6; padding: 1.5rem; border-radius: 8px;">
                <p style="color: #666; margin-bottom: 5px; font-weight: 600;">Por Tratamiento Psiquiátrico</p>
                <div style="font-size: 2.5rem; font-weight: bold; color: #9b59b6;">
                    <?php echo $metricas['canalizados_tratamiento']; ?>
                </div>
            </div>

            <div style="background: #fdfdfd; border: 1px solid #e0e0e0; border-left: 6px solid #c0392b; padding: 1.5rem; border-radius: 8px;">
                <p style="color: #666; margin-bottom: 5px; font-weight: 600;">Por Resultados de Escalas</p>
                <div style="font-size: 2.5rem; font-weight: bold; color: #c0392b;">
                    <?php echo $metricas['canalizados_resultados']; ?>
                </div>
            </div>

        </div>
    </section>

    <?php if (isset($_SESSION['id_rol']) && $_SESSION['id_rol'] === '1'): ?>
        <section style="margin-top: 4rem;">
            <h3 style="color: #333; border-bottom: 2px solid #e9ecef; padding-bottom: 10px; margin-bottom: 20px; font-size: 1.2em; font-weight: 600;">
                <i class="fas fa-users-cog" style="color: #12307D; margin-right: 10px;"></i> Control de Personal Administrativo
            </h3>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">

                <div style="background: #fdfdfd; border: 1px solid #e0e0e0; border-left: 6px solid #34495e; padding: 1.5rem; border-radius: 8px;">
                    <p style="color: #666; margin-bottom: 5px; font-weight: 600;">Total Registrados</p>
                    <div style="font-size: 2.5rem; font-weight: bold; color: #34495e;">
                        <?php echo $metricas_personal['total_personal'] ?? 0; ?>
                    </div>
                </div>

                <div style="background: #fdfdfd; border: 1px solid #e0e0e0; border-left: 6px solid #27ae60; padding: 1.5rem; border-radius: 8px;">
                    <p style="color: #666; margin-bottom: 5px; font-weight: 600;">Cuentas Activas</p>
                    <div style="font-size: 2.5rem; font-weight: bold; color: #27ae60;">
                        <?php echo $metricas_personal['activos'] ?? 0; ?>
                    </div>
                </div>

                <div style="background: #fdfdfd; border: 1px solid #e0e0e0; border-left: 6px solid #e74c3c; padding: 1.5rem; border-radius: 8px;">
                    <p style="color: #666; margin-bottom: 5px; font-weight: 600;">Cuentas Desactivadas</p>
                    <div style="font-size: 2.5rem; font-weight: bold; color: #e74c3c;">
                        <?php echo $metricas_personal['inactivos'] ?? 0; ?>
                    </div>
                </div>

            </div>
        </section>
    <?php endif; ?>
</main>