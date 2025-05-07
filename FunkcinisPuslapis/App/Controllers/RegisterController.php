<?php

require_once '../../autoload.php';
require_once '../../config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use App\Models\Admin;
use App\Models\RegularUser;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vardas = $_POST['vardas'];
    $pastas = $_POST['pastas'];
    $slaptazodis = $_POST['slaptazodis'];
    $tipas = $_POST['tipas'];

    if ($tipas === 'admin') {
        $vartotojas = new Admin($vardas, $pastas, $slaptazodis);
    } else {
        $vartotojas = new RegularUser($vardas, $pastas, $slaptazodis);
    }

    try {
        $sql = "INSERT INTO users (vardas, pastas, slaptazodis, tipas) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $vardas,
            $pastas,
            password_hash($slaptazodis, PASSWORD_DEFAULT),
            $tipas
        ]);

        echo "Vartotojas <strong>'$vardas'</strong> sėkmingai užregistruotas!";
    } catch (PDOException $e) {
        echo "Klaida registruojant: " . $e->getMessage();
    }
} else {
    echo "Netinkama užklausa.";
}
