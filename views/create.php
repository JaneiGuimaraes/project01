<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Registro</title>
</head>

<body>
    <h1>Criar Registro</h1>
    <form action="index.php?action=create" method="post">
        <label>Nome:</label>
        <input type="text" name="username" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>

</html>