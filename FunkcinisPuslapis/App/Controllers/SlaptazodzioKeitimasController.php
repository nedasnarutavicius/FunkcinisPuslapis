<?php

require_once '../../config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senas = $_POST['senas'];
    $naujas = $_POST['naujas'];
    $patvirtinimas = $_POST['patvirtinimas'];
    $pastas = $_SESSION['pastas'];

    if (empty($senas) || empty($naujas) || empty($patvirtinimas)) {
        die("Užpildyk visus laukus.");
    }

    if ($naujas !== $patvirtinimas) {
        die("Nauji slaptažodžiai nesutampa.");
    }

    $sql = "SELECT * FROM users WHERE pastas = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$pastas]);
    $vartotojas = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$vartotojas || !password_verify($senas, $vartotojas['slaptazodis'])) {
        die("Senas slaptažodis neteisingas.");
    }

    $naujasHash = password_hash($naujas, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET slaptazodis = ? WHERE pastas = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$naujasHash, $pastas]);

    echo "Slaptažodis sėkmingai atnaujintas!";
} else {
    echo "Netinkamas užklausos metodas.";
}
