<?php

require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;


$secretKey = getenv('SECRET_KEY');
$expirationTime = time() + getenv('Expiration_token');

function generateToken($userId) {
    global $secretKey, $expirationTime;

    $payload = [
        'iss' => "Gestao de Estagiarios",
        'iat' => time(),
        'exp' => $expirationTime,
        'data' => [
            'userId' => $userId,
            'email' => $email,
            'role' =>$roles

        ],
    ];

    return JWT::encode($payload, $secretKey, 'HS256');

    echo json_encode(['token' => $jwt]);


}

function validateToken($token) {
    global $secretKey;
    $headers = getallheaders();
     if (!isset($headers['Authorization'])) {
        http_response_code(401);
        echo json_encode(['message' => 'Token de autenticação não fornecido']);
        exit();
     }

     $token = str_replace('Bearer ', '', $headers['Authorization']);

    try {
        $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));
        return $decoded->data;
    } catch (Exception $e) {
        http_response_code(401);
        echo json_encode(['message' => 'Token de autenticação inválido']);
        exit();
        return null;
    }
}
?>

