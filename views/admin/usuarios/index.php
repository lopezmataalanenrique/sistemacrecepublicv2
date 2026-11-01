<header>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/panel-control">
                <img src="/build/img/logo-crece.webp" alt="Logo del programa CRECE" class="navbar--logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                            <a class="nav-link-c" aria-current="page" href="/panel-control">Dashboard</a>
                        </li>

                        <li class="offcanvas-body nav-item">
                            <a class="nav-link-c nav-link-c--active" href="/control-usuarios">Control usuarios</a>
                        </li>

                        <?php if (isset($_SESSION['id_rol']) && $_SESSION['id_rol'] === '1'): ?>
                            <li class="offcanvas-body nav-item">
                                <a class="nav-link-c" href="/control-personal">Control personal</a>
                            </li>
                        <?php endif; ?>

                        <li class="offcanvas-body nav-item">
                            <a class="nav-link-c" href="/logout">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<main class="dashboard-container" style="padding-top: 100px;">

    <div style="margin-top: 3rem; text-align: center; background: #f8f9fa; padding: 3rem; border-radius: 10px; border: 1px solid #e9ecef;">
        <p style="color: #12307D; margin-bottom: 2rem;">Exportar Bases de Datos</p>

        <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 280px; max-width: 400px; background: white; padding: 2rem; border-radius: 8px; border: 1px solid #dee2e6;">
                <p style="color: #333; margin-bottom: 1rem;">Cuestionarios Clínicos</p>
                <a href="/exportar-usuarios" class="btn-pm" style="background-color: #27ae60; color: white; padding: 12px 20px; text-decoration: none; border-radius: 5px; display: inline-block; transition: background 0.3s; width: 100%;">
                    <i class="fas fa-file-csv" style="margin-right: 8px;"></i> Descargar Cuestionarios
                </a>
            </div>

            <div style="flex: 1; min-width: 280px; max-width: 400px; background: white; padding: 2rem; border-radius: 8px; border: 1px solid #dee2e6;">
                <p style="color: #333; margin-bottom: 1rem;">Observaciones de Módulos</p>
                <a href="/exportar-observaciones" class="btn-pm" style="background-color: #2980b9; color: white; padding: 12px 20px; text-decoration: none; border-radius: 5px; display: inline-block; transition: background 0.3s; width: 100%;">
                    <i class="fas fa-file-csv" style="margin-right: 8px;"></i> Descargar Observaciones
                </a>
            </div>
        </div>
    </div>

    <div style="margin-top: 4rem; background: white; border-radius: 10px; border: 1px solid #e9ecef; padding: 2rem; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        <p style="color: #12307D; margin-bottom: 1.5rem; border-bottom: 2px solid #e9ecef; padding-bottom: 10px; font-size: 1.2em; font-weight: bold;">
            <i class="fas fa-users"></i> Usuarios Registrados
        </p>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; min-width: 1200px;">
                <thead>
                    <tr style="background-color: #f1f3f5; color: #333; text-align: left;">
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">ID</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">Nombre Completo</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">Correos</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">Sexo / Edad</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">Salud / Tratamiento</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">Registro</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">Recorrido (Módulos)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($usuarios)): ?>
                        <?php foreach ($usuarios as $user): ?>
                            <tr style="border-bottom: 1px solid #e9ecef;">
                                <td style="padding: 15px; color: #666; font-weight: bold;"><?php echo $user['id_usuario']; ?></td>
                                <td style="padding: 15px;">
                                    <?php echo htmlspecialchars($user['nombre'] . ' ' . $user['apellido_paterno']); ?>
                                </td>
                                <td style="padding: 15px;">
                                    <div><strong>Principal:</strong> <?php echo htmlspecialchars($user['email']); ?></div>
                                    <div style="color: #666;"><strong>Alt:</strong> <?php echo htmlspecialchars($user['email_alt']); ?></div>
                                </td>
                                <td style="padding: 15px;">
                                    <div><?php echo htmlspecialchars($user['sexo']); ?></div>
                                    <div><?php echo $user['edad']; ?> años</div>
                                </td>
                                <td style="padding: 15px;">
                                    <div><strong>Crónica:</strong> <?php echo $user['condicion_cronica']; ?></div>
                                    <div><strong>Trat:</strong> <?php echo htmlspecialchars($user['tratamiento']); ?></div>
                                </td>
                                <td style="padding: 15px; color: #666;">
                                    <?php echo date('d/m/Y', strtotime($user['fecha_creacion'])); ?>
                                </td>
                                <td style="padding: 15px;">
                                    <div style="display: flex; gap: 6px;">
                                        <?php
                                        // Dibujando los círculos del recorrido
                                        if (!empty($user['modulos'])):
                                            foreach ($user['modulos'] as $mod):
                                                // Gris por defecto (Bloqueado)
                                                $bgColor = '#e9ecef';
                                                $textColor = '#6c757d';

                                                if ($mod['estatus'] === 'completado') {
                                                    $bgColor = '#27ae60'; // Verde
                                                    $textColor = '#ffffff';
                                                } elseif ($mod['estatus'] === 'disponible' || $mod['estatus'] === 'en curso' || $mod['estatus'] === 'seleccionable') {
                                                    $bgColor = '#12307D'; // Azul CRECE
                                                    $textColor = '#ffffff';
                                                }

                                                // Formatear la fecha para el tooltip (Si no es nula)
                                                $tooltip = $mod['fecha_desbloqueo'] ? 'Desbloqueado: ' . date('d/m/Y', strtotime($mod['fecha_desbloqueo'])) : 'Bloqueado';
                                        ?>
                                                <span style="width: 28px; height: 28px; border-radius: 50%; background: <?php echo $bgColor; ?>; color: <?php echo $textColor; ?>; display: inline-flex; align-items: center; justify-content: center; font-weight: bold; box-shadow: 0 2px 4px rgba(0,0,0,0.1); cursor: help;" title="<?php echo $tooltip; ?>">
                                                    <?php echo $mod['id_modulo']; ?>
                                                </span>
                                        <?php
                                            endforeach;
                                        else:
                                            echo "<span style='color: #888;'>Sin progreso</span>";
                                        endif;
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" style="padding: 20px; text-align: center; color: #888;">No hay usuarios registrados en el sistema.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>