<?php
require_once '../../config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['tipas'] === 'admin') {
    $id = $_POST['id'];
    $atsakymas = $_POST['atsakymas'];

    $stmt = $pdo->prepare("UPDATE tickets SET atsakymas = ? WHERE id = ?");
    $stmt->execute([$atsakymas, $id]);

    header("Location: ../Views/mano_biletai.php");
    exit;
} else {
    echo "Tik administratoriai gali atlikti šį veiksmą.";
}
