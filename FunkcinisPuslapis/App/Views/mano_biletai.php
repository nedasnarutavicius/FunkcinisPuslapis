<?php
session_start();
require_once '../../config.php';

if (!isset($_SESSION['vardas'])) {
    header("Location: login.php");
    exit;
}

$pastas = $_SESSION['pastas'];
$tipas = $_SESSION['tipas'];

$stmt = $pdo->prepare("SELECT id FROM users WHERE pastas = ?");
$stmt->execute([$pastas]);
$user = $stmt->fetch();
$user_id = $user['id'];

if ($tipas === 'admin') {
    $stmt = $pdo->query("SELECT tickets.*, users.vardas FROM tickets JOIN users ON tickets.user_id = users.id ORDER BY tickets.created_at DESC");
} else {
    $stmt = $pdo->prepare("SELECT * FROM tickets WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$user_id]);
}

$ticketai = $stmt->fetchAll();
?>

<h2>Bilietai</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Antraštė</th>
        <th>Vieta</th>
        <th>Tekstas</th>
        <th>Sukūrimo data</th>
        <?php if ($tipas === 'admin') echo "<th>Vartotojas</th>"; ?>
        <th>Atsakymas</th>
        <?php if ($tipas === 'admin') echo "<th>Veiksmas</th>"; ?>
    </tr>

    <?php foreach ($ticketai as $t): ?>
        <tr>
            <td><?= $t['id'] ?></td>
            <td><?= htmlspecialchars($t['antraste']) ?></td>
            <td><?= htmlspecialchars($t['vieta']) ?></td>
            <td><?= nl2br(htmlspecialchars($t['tekstas'])) ?></td>
            <td><?= $t['created_at'] ?></td>
            <?php if ($tipas === 'admin') echo "<td>" . $t['vardas'] . "</td>"; ?>
            <td><?= nl2br(htmlspecialchars($t['atsakymas'])) ?: "—" ?></td>
            <?php if ($tipas === 'admin'): ?>
                <td>
                <form action="../Controllers/TicketReplyController.php" method="POST">
                        <input type="hidden" name="id" value="<?= $t['id'] ?>">
                        <input type="text" name="atsakymas" placeholder="Atsakymas" required>
                        <button type="submit">Atsakyti</button>
                    </form>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>
