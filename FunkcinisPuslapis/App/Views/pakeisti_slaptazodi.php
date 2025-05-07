<?php
session_start();

if (!isset($_SESSION['vardas'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Slaptažodžio keitimas</h2>

<form action="../Controllers/SlaptazodzioKeitimasController.php" method="POST">
    <label for="senas">Senas slaptažodis:</label><br>
    <input type="password" name="senas" required><br><br>

    <label for="naujas">Naujas slaptažodis:</label><br>
    <input type="password" name="naujas" required><br><br>

    <label for="patvirtinimas">Pakartok naują slaptažodį:</label><br>
    <input type="password" name="patvirtinimas" required><br><br>

    <button type="submit">Atnaujinti slaptažodį</button>
</form>
