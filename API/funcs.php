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

    public function read(int $id){
        $sql = "SELECT * FROM confissoes WHERE ID = ?";

        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            error_log("Erro na preparação: " . $this->conn->error);
            return false;
        }

        $stmt->bind_param('i',$id);

        if ($stmt->execute()) {
            $resposta = $stmt->get_result();
            if($resposta->num_rows > 0){
                $dados = $resposta->fetch_assoc();
                $stmt->close();
                return $dados["confissao"];
            }else{
                $stmt->close();
                return null;
            }
        } else {
            error_log("Erro ao buscar confissao: " . $stmt->error);
            $stmt->close();
            return false;
        } 


    }

    public function __destruct() {
        $this->db->close();
    }

}
