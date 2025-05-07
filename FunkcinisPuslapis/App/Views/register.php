<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
</head>
<body>
    <h2>Registracija</h2>

    <form action="/FunkcinisPuslapis/App/Controllers/RegisterController.php" method="POST">

        <label for="vardas">Vardas:</label><br>
        <input type="text" name="vardas" required><br><br>

        <label for="pastas">El. paštas:</label><br>
        <input type="email" name="pastas" required><br><br>

        <label for="slaptazodis">Slaptažodis:</label><br>
        <input type="password" name="slaptazodis" required><br><br>

        <label for="tipas">Vartotojo tipas:</label><br>
        <select name="tipas">
            <option value="admin">Administratorius</option>
            <option value="user">Paprastas vartotojas</option>
        </select><br><br>

        <input type="submit" value="Registruotis">
    </form>
</body>
</html>
