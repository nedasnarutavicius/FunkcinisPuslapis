<?php

require_once '../../autoload.php';
require_once '../../config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pastas = trim($_POST['pastas']);
    $slaptazodis = trim($_POST['slaptazodis']);

    if (empty($pastas) || empty($slaptazodis)) {
        die("Užpildyk visus laukus.");
    }

    try {
        $sql = "SELECT * FROM users WHERE pastas = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$pastas]);
        $vartotojas = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($vartotojas && password_verify($slaptazodis, $vartotojas['slaptazodis'])) {
            $_SESSION['vardas'] = $vartotojas['vardas'];
            $_SESSION['tipas'] = $vartotojas['tipas'];
            $_SESSION['pastas'] = $vartotojas['pastas'];

            header("Location: ../../index.php");
            exit;
        } else {
            echo "El. paštas arba slaptažodis neteisingas.";
        }
    } catch (PDOException $klaida) {
        echo "DB klaida: " . $klaida->getMessage();
    }
} else {
    echo "Netinkamas užklausos metodas.";
}
