<?php
require_once 'models/database.php';
require_once 'models/record_db.php';

class RecordController
{
    private $db;
    private $record;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->record = new Record($this->db);
    }

    public function index()
    {
        $stmt = $this->record->read();
        require 'views/index.php';
    }

    public function create()
    {
        if ($_POST) {
            $this->record->username = $_POST['username'];
            $this->record->email = $_POST['email'];

            if ($this->record->create()) {
                header("Location: index.php");
            } else {
                echo "Erro ao criar registro.";
            }
        } else {
            require 'views/create.php';
        }
    }

    public function update()
    {
        if ($_POST) {
            $this->record->id = $_POST['id'];
            $this->record->username = $_POST['username'];
            $this->record->email = $_POST['email'];

            if ($this->record->update()) {
                header("Location: index.php");
            } else {
                echo "Erro ao atualizar registro.";
            }
        } else {
            $this->record->id = $_GET['id'];
            $recordData = $this->record->read()->fetch(PDO::FETCH_ASSOC);
            require 'views/update.php';
        }
    }

    public function delete()
    {
        if ($_GET) {
            $this->record->id = $_GET['id'];

            if ($this->record->delete()) {
                header("Location: index.php");
            } else {
                echo "Erro ao excluir registro.";
            }
        }
    }
}
?>