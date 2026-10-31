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
                            <a class="nav-link-c" aria-current="page" href="/panel-control">Dashboard</a>
                        </li>
                        <li class="offcanvas-body nav-item">
                            <a class="nav-link-c" href="/control-usuarios">Control usuarios</a>
                        </li>

                        <?php if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] === '1'): ?>

                            <li class="offcanvas-body nav-item">
                                <a class="nav-link-c nav-link-c--active" href="/control-personal">Control personal</a>
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

<main class="dashboard-container">

    <!-- Mostrar mensajes de éxito o error -->
    <?php if(isset($_GET['mensaje'])): ?>
        <?php if($_GET['mensaje'] === 'creado'): ?>
            <p class="alerta exito" style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; text-align: center;">El nuevo usuario ha sido creado correctamente.</p>
        
        <?php elseif($_GET['mensaje'] === 'estado_actualizado'): ?>
            <p class="alerta exito" style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; text-align: center;">El estado del usuario se actualizó correctamente.</p>
        
        <?php elseif($_GET['mensaje'] === 'error_propio'): ?>
            <p class="alerta error" style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; text-align: center;">Acción denegada: No puedes desactivar tu propia cuenta.</p>
            
        <?php elseif($_GET['mensaje'] === 'error_protegido'): ?>
            <p class="alerta error" style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; text-align: center;">Acción denegada: El Administrador Maestro no puede ser modificado.</p>
        <?php endif; ?>
    <?php endif; ?>

    <div class="dashboard-acciones-top" style="margin-bottom: 2rem; text-align: right;">
        <!-- El botón para ir al formulario de creación -->
        <a href="/crear-personal" class="btn-pm btn-pm-crear" style="background-color: #27ae60; color: white;">
            <i class="fas fa-plus"></i> Crear nuevo personal
        </a>
    </div>

    <div class="tabla-contenedor" style="overflow-x: auto;">
        <table class="tabla-admin" style="width: 100%; border-collapse: collapse;">
            <thead style="background-color: #12307D; color: white;">
                <tr>
                    <th style="padding: 1.5rem; text-align: left;">Nombre Completo</th>
                    <th style="padding: 1.5rem; text-align: left;">Usuario</th>
                    <th style="padding: 1.5rem; text-align: center;">Rol</th>
                    <th style="padding: 1.5rem; text-align: center;">Estado</th>
                    <th style="padding: 1.5rem; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personal as $p): ?>
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 1.5rem;"><?php echo htmlspecialchars($p->nombre_completo); ?></td>

                        <td style="padding: 1.5rem;"><strong><?php echo htmlspecialchars($p->usuario); ?></strong></td>

                        <td style="padding: 1.5rem; text-align: center;">
                            <?php echo $p->id_rol === '1' ? 'Administrador' : 'Psicólogo'; ?>
                        </td>

                        <td style="padding: 1.5rem; text-align: center;">
                            <?php if ($p->activo === '1'): ?>
                                <span style="background-color: #d4edda; color: #155724; padding: 5px 10px; border-radius: 1rem;">Activo</span>
                            <?php else: ?>
                                <span style="background-color: #f8d7da; color: #721c24; padding: 5px 10px; border-radius: 1rem;">Inactivo</span>
                            <?php endif; ?>
                        </td>

                        <td style="padding: 15px; text-align: center; display: flex; justify-content: center; gap: 10px;">
                            
                            <?php if ($p->id_personal === '1'): ?>
                                <span style="color: #666; font-style: italic">Sistema Protegido</span>
                            
                            <?php else: ?>
                                <a href="/actualizar-personal?id=<?php echo $p->id_personal; ?>" class="btn-pm btn-pm-ed" style=" background-color: #c79e57;">
                                    <i class="fas fa-edit"></i> Editar
                                </a>

                                <?php if ($p->id_personal !== $_SESSION['id_personal']): ?>
                                    <form method="POST" action="/estado-personal" style="margin: 0;">
                                        <input type="hidden" name="id_personal" value="<?php echo $p->id_personal; ?>">
                                        <input type="hidden" name="estado_actual" value="<?php echo $p->activo; ?>">

                                        <?php if ($p->activo === '1'): ?>
                                            <button type="submit" class="btn-pm btn-pm-ed" style="background-color: #e74c3c; border: none; cursor:pointer;" onclick="return confirm('¿Seguro que deseas desactivar este usuario?');">
                                                <i class="fas fa-ban"></i> Desactivar
                                            </button>
                                        <?php else: ?>
                                            <button type="submit" class="btn-pm btn-pm-ed" style="background-color: #27ae60; border: none; cursor:pointer;">
                                                <i class="fas fa-check"></i> Activar
                                            </button>
                                        <?php endif; ?>
                                    </form>
                                <?php else: ?>
                                    
                                <?php endif; ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>