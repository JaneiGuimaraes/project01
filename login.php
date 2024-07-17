<?php
session_start();
require_once 'models/users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();

    if ($user->login($username, $password)) {
        header('Location: index.php');
        exit();
    } else {
        $error = "Usuário ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(45deg, yellow, black);
        }

        div {
            background-color: rgba(0, 0, 0, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
        }

        input {
            padding: 15px;
            border: none;

        }
    </style>
</head>

<body>
    <div>
        <form method="post" action="login.php">
            <h1>Login</h1>
            <?php if (isset($error))
                echo '<p style="color:red;">' . $error . '</p>'; ?>
            <input type="username" placeholder="login" name="username" required>
            <br><br>
            <input type="password" placeholder="senha" name="password" required>
            <br><br>
            <input type="submit" value="Login">
        </form>
    </div>
  

</body>

</html>