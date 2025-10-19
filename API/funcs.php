<?php
require_once "db.php";
class Confissao{
    private $db;
    private $conn;

    public function __construct(){
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function add(string $texto):bool{
        $sql = "INSERT INTO confissoes (confissao) VALUES (?)";

        $stmt= $this->conn->prepare($sql);

        if (!$stmt) {
            error_log("Erro na preparação: " . $this->conn->error);
            return false;
        }

        $stmt->bind_param('s',$texto);

        if ($stmt->execute()) {

            $stmt->close();
            return true;
        } else {
            error_log("Erro ao inserir: " . $stmt->error);
            $stmt->close();
            return false;
        }
    }

    public function __destruct() {
        $this->db->close();
    }

}
