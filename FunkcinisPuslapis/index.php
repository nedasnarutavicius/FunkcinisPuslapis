<?php
require_once 'config.php';

if (!isset($_SESSION['vardas'])) {
    header("Location: App/Views/login.php");
    exit;
}
?>

<h2>Sveikas, <?= htmlspecialchars($_SESSION['vardas']) ?>!</h2>
<p>Tipas: <strong><?= htmlspecialchars($_SESSION['tipas']) ?></strong></p>


<h3>Navigacija:</h3>
<ul>
    <li><a href="App/Views/register.php">Registracija (naujų vartotojų)</a></li>
    <li><a href="App/Views/login.php">Prisijungimo langas</a></li>
    <li><a href="App/Views/sukurti_bileta.php">Sukurti bilietą</a></li>
    <li><a href="App/Views/mano_biletai.php">Peržiūrėti bilietus</a></li>
    <li><a href="App/Views/pakeisti_slaptazodi.php">Slaptažodžio keitimas</a></li>
    <li><a href="App/Views/logout.php">Atsijungti</a></li>
</ul>

