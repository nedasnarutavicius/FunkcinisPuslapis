<?php
session_start();

if (!isset($_SESSION['vardas'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Sukurti bilietą (gedimą, komentarą)</h2>

<form action="../Controllers/TicketController.php" method="POST">
    <label for="antraste">Antraštė:</label><br>
    <input type="text" name="antraste" required><br><br>

    <label for="vieta">Vieta (pvz. kabinetas, serverinė):</label><br>
    <input type="text" name="vieta"><br><br>

    <label for="tekstas">Tekstas (gedimas, komentaras):</label><br>
    <textarea name="tekstas" rows="5" cols="50" required></textarea><br><br>

    <input type="submit" value="Pateikti bilietą">
</form>
