<?php
require_once '../../config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['vardas']) || !isset($_SESSION['pastas'])) {
    die("Tik prisijungę vartotojai gali siųsti bilietus.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $antraste = $_POST['antraste'];
    $vieta = $_POST['vieta'];
    $tekstas = $_POST['tekstas'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $pastas = $_SESSION['pastas'];

    if (empty($tekstas) || empty($antraste)) {
        die("Užpildyk visus privalomus laukus.");
    }

    $stmt = $pdo->prepare("SELECT id FROM users WHERE pastas = ?");
    $stmt->execute([$pastas]);
    $user = $stmt->fetch();

    if (!$user) {
        die("Vartotojas nerastas.");
    }

    $user_id = $user['id'];

    $sql = "INSERT INTO tickets (user_id, tekstas, antraste, vieta, ip) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $tekstas, $antraste, $vieta, $ip]);

    echo "Bilietas sėkmingai pateiktas!";
} else {
    echo "Netinkamas užklausos metodas.";
}
