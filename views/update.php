<?php
require_once 'config/db.php';
require_once 'models/database.php';
require_once 'models/record_db.php';

$database = new Database();
$db = $database->getConnection();

$record = new Record($db);

if ($_GET) {
    $record->action = $_GET['action'];
    $record->id = $_GET['id'];
    $record->username = $_GET['username'];
    $record->email = $_GET['email'];

    if ($record->update()) {
        echo "Registro atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar registro.";
    }
} else {
    $record->id = $_GET['id'];
    $recordData = $record->read()->fetch(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Registro</title>
</head>

<body>
    <h1>Atualizar Registro</h1>
    <form action="index.php?action=update" method="get">

        <input type="hidden" name="id" value="<?php echo $recordData['id']; ?>">
        <label>Nome:</label>
        <input type="text" name="username" value="<?php echo $recordData['username']; ?>" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $recordData['email']; ?>" required>
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>

</html>