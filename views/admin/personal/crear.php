<main class="dashboard-container" style="margin-top: 1rem;">
    <!-- Botón para regresar -->
    <div style="margin-bottom: 2rem;">
        <a href="/control-personal" class="btn-pm btn-pm-ed" style="background-color: #6c757d; color: white; margin-bottom: 5rem;">
            <i class="fas fa-arrow-left"></i> Volver a la lista
        </a>
    </div>

    <!-- Imprimir Alertas -->
    <div class="contenedor-alertas" style="max-width: 60rem; margin: 0 auto;">
        <?php include_once __DIR__ . "/../../templates/alertas.php"; ?>
    </div>

    <!-- Contenedor del Formulario -->
    <div class="formulario-crear" style="max-width: 60rem; margin: 0 auto; background: #fff; padding: 2rem; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">

        <form method="POST" action="/crear-personal">

            <!-- Campo Nombre Completo -->
            <div class="campo" style="margin-bottom: 1.5rem;">
                <label for="nombre_completo" style="display: block; font-weight: bold; margin-bottom: 0.5rem; color: #12307D;">Nombre Completo</label>
                <input
                    type="text"
                    id="nombre_completo"
                    name="nombre_completo"
                    placeholder="Ej. Lic. Ana Pérez"
                    value="<?php echo htmlspecialchars($personal->nombre_completo); ?>"
                    autocomplete="name"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            </div>

            <!-- Campo Usuario -->
            <div class="campo" style="margin-bottom: 1.5rem;">
                <label for="usuario" style="display: block; font-weight: bold; margin-bottom: 0.5rem; color: #12307D;">Nombre de Usuario</label>
                <input
                    type="text"
                    id="usuario"
                    name="usuario"
                    placeholder="Ej. ana_psicologa"
                    value="<?php echo htmlspecialchars($personal->usuario); ?>"
                    autocomplete="username"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
                <small style="color: #666666; font-size: 1.8rem;">Este será el usuario con el que iniciará sesión.</small>
            </div>

            <!-- Campo contraseña -->
            <div class="campo" style="margin-bottom: 1.5rem;">
                <label for="password" style="display: block; font-weight: bold; margin-bottom: 0.5rem; color: #12307D;">Contraseña</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Escribe una contraseña segura"
                    autocomplete="new-password"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            </div>

            <!-- Campo Confirmar Contraseña -->
            <div class="campo" style="margin-bottom: 1.5rem;">
                <label for="password_confirm" style="display: block; font-weight: bold; margin-bottom: 0.5rem; color: #12307D;">Confirmar Contraseña</label>
                <input
                    type="password"
                    id="password_confirm"
                    name="password_confirm"
                    placeholder="Repite la contraseña"
                    autocomplete="new-password"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            </div>

            <!-- Campo Rol -->
            <div class="campo" style="margin-bottom: 2rem;">
                <label for="id_rol" style="display: block; font-weight: bold; margin-bottom: 0.5rem; color: #12307D;">Rol del Usuario</label>
                <select
                    id="id_rol"
                    name="id_rol"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; background-color: white;">
                    <option value="" disabled <?php echo empty($personal->id_rol) ? 'selected' : ''; ?>>-- Selecciona un Rol --</option>
                    <option value="1" <?php echo ($personal->id_rol === '1') ? 'selected' : ''; ?>>Administrador</option>
                    <option value="2" <?php echo ($personal->id_rol === '2') ? 'selected' : ''; ?>>Psicólogo</option>
                </select>
            </div>

            <!-- Botón de Envío -->
            <div class="submit" style="text-align: right;">
                <button type="submit" class="btn-pm" style="background-color: #12307D; color: white; padding: 12px 25px; border: none; width: 100%;">
                    <i class="fas fa-save"></i> Registrar Usuario
                </button>
            </div>

        </form>
    </div>
</main>