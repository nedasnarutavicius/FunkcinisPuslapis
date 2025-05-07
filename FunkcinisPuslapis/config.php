<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$privatus = require_once __DIR__ . '/App/Core/private_config.php';

try {
    $pdo = new PDO(
        "mysql:host={$privatus['host']};dbname={$privatus['db']};charset=utf8",
        $privatus['user'],
        $privatus['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $klaida) {
    die("DB klaida: " . $klaida->getMessage());
}
