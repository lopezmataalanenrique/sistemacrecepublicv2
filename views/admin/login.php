<section class="bg-admin">
    <main class="admin-login">
        <div class="admin-login-header">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="128"
                height="128"
                viewBox="0 0 24 24"
                fill="#FFF"
                stroke="#12307D"
                stroke-width="1"
                stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
            </svg>
            <h1>Login</h1>
        </div>
        <!-- ALERTAS -->
        <div> 
            <?php
            include_once __DIR__ . "/../templates/alertas.php";
            ?>
        </div>
        <div>
            <form class="admin-login-body" method="POST" action="/acceso-personal">
                <div>
                    <div>
                        <label>Usuario</label>
                    </div>

                    <div>
                        <input
                            type="text"
                            id="usuario"
                            placeholder="Usuario"
                            name="usuario"
                            autocomplete="username" />
                    </div>
                </div>

                <div>
                    <div>
                        <label>Contraseña</label>
                    </div>

                    <div>
                        <input
                            type="password"
                            id="password"
                            placeholder="Contraseña"
                            name="password"
                            autocomplete="current-password" />
                    </div>
                </div>

                <div class="admin-login-button">
                    <input type="submit" value="Iniciar sesión" />
                </div>

            </form>
        </div>
    </main>
</section>