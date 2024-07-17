<?php
require_once 'database.php';

class User
{
    private $connect;
    private $table = 'users'; // Nome da tabela de usuários

    public function __construct()
    {
        $database = new Database();
        $this->connect = $database->getConnection();
    }

    public function login($username, $password)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE username = :username AND password = :password';
        $stmt = $this->connect->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // Supondo que a senha está armazenada como MD5

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        } else {
            return false;
        }
    }
}
?>