<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Prisijungimas</title>
</head>
<body>
    <h2>Prisijungimas</h2>

    <form action="../Controllers/LoginController.php" method="POST">
        <label for="pastas">El. paštas:</label><br>
        <input type="email" name="pastas" required><br><br>

        <label for="slaptazodis">Slaptažodis:</label><br>
        <input type="password" name="slaptazodis" required><br><br>

        <input type="submit" value="Prisijungti">

        <a href="register.php" style="margin-left: 10px;">
            <button type="button">Registracija</button>
        </a>
    </form>
</body>
</html>
