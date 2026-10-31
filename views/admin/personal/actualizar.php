<main class="dashboard-container" style="margin-top: 1rem;">

    <!-- Botón para regresar -->
    <div style="margin-bottom: 2rem;">
        <a href="/control-personal" class="btn-pm btn-pm-ed" style="background-color: #6c757d; color: white;">
            <i class="fas fa-arrow-left"></i> Volver a la lista
        </a>
    </div>

    <!-- Imprimir Alertas -->
    <div class="contenedor-alertas" style="max-width: 60rem; margin: 0 auto;">
        <?php include_once __DIR__ . "/../../templates/alertas.php"; ?>
    </div>

    <!-- Contenedor del Formulario -->
    <div class="formulario-crear" style="max-width: 60rem; margin: 0 auto; background: #fff; padding: 2rem; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">

        <!-- IMPORTANTE: Conservar el ID en la URL de acción -->
        <form method="POST" action="/actualizar-personal?id=<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">

            <div class="campo" style="margin-bottom: 1.5rem;">
                <label for="nombre_completo" style="display: block; font-weight: bold; margin-bottom: 0.5rem; color: #12307D;">Nombre Completo</label>
                <input type="text" id="nombre_completo" name="nombre_completo" value="<?php echo htmlspecialchars($personal->nombre_completo); ?>" autocomplete="name" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            </div>

            <div class="campo" style="margin-bottom: 1.5rem;">
                <label for="usuario" style="display: block; font-weight: bold; margin-bottom: 0.5rem; color: #12307D;">Nombre de Usuario</label>
                <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($personal->usuario); ?>" autocomplete="username" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            </div>

            <!-- Campos de Contraseña con nota aclaratoria -->
            <div class="campo" style="margin-bottom: 1.5rem;">
                <label for="password" style="display: block; font-weight: bold; margin-bottom: 0.5rem; color: #12307D;">Nueva Contraseña (Opcional)</label>
                <input type="password" id="password" name="password" placeholder="Déjalo en blanco para no cambiarla" autocomplete="new-password" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            </div>

            <div class="campo" style="margin-bottom: 1.5rem;">
                <label for="password_confirm" style="display: block; font-weight: bold; margin-bottom: 0.5rem; color: #12307D;">Confirmar Nueva Contraseña</label>
                <input type="password" id="password_confirm" name="password_confirm" placeholder="Repite la nueva contraseña" autocomplete="new-password" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            </div>

            <div class="campo" style="margin-bottom: 2rem;">
                <label for="id_rol" style="display: block; font-weight: bold; margin-bottom: 0.5rem; color: #12307D;">Rol del Usuario</label>
                <select id="id_rol" name="id_rol" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; background-color: white;">
                    <option value="" disabled>-- Selecciona un Rol --</option>
                    <option value="1" <?php echo ($personal->id_rol === '1') ? 'selected' : ''; ?>>Administrador</option>
                    <option value="2" <?php echo ($personal->id_rol === '2') ? 'selected' : ''; ?>>Psicólogo</option>
                </select>
            </div>

            <div class="submit" style="text-align: right;">
                <button type="submit" class="btn-pm" style="background-color: #c79e57; color: white; padding: 12px 25px; border: none; width: 100%;">
                    <i class="fas fa-save"></i> Guardar Cambios
                </button>
            </div>

        </form>
    </div>
</main>