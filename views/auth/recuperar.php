<div class="dos-columnas">
    <div class="contenedor-sidebar">
        <div class="tarjeta-blanca-sidebar">
            <div class="sidebar-content">
                <a href="/">
                    <img src="/build/img/logo-crece.webp" alt="Programa CRECE" class="auth-sidebar-logo">
                </a>
                <h2 class="titulo-bienvenida">Bienvenido/a</h2>
                <p class="texto-sidebar">A continuación puedes reestablecer tu contraseña.</p>
            </div>
            <a href="/">
                <div class="regresar-inicio">

                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="40"
                            height="40"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="#12307D"
                            stroke-width="1.75"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M10 12h4v4h-4z" />
                        </svg>
                    </div>
                    <div>
                        <p class="texto-regresar-inicio">
                            Inicio
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="formulario">
        <div class="auth-container">
            <div class="auth-header">
                <h1 class="auth-title">Reestablecer Tu contrasela</h1>
                    <p class="auth-subtitle">Coloca tu nueva contraseña a continuación: </p>
            </div>
            <div class="auth-card">
                <?php
                include_once __DIR__ . "/../templates/alertas.php";
                ?>
                <?php if ($error) return; ?>
                <form method="POST"> 

                    <div class="input-row">
                        <div class="pregunta-formulario">
                            <div>
                                <label class="fas fa-user icon" for="password">Nueva Contraseña</label>
                            </div>
                            <div>
                                <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Tu nueva contraseña"
                                autocomplete="new-password"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="pregunta-formulario">
                            <div>
                                <label class="fas fa-user icon" for="password_confirm">Verificar contraseña</label>
                            </div>
                            <div>
                                <input
                                type="password"
                                id="password_confirm"
                                name="password_confirm"
                                placeholder="Tu contraseña de nuevo" 
                                autocomplete="new-password"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="contenedor-bcc">
                        <input class="auth-button" type="submit" value="Guardar nueva contraseña" />
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>