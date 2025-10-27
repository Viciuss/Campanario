<?php
require_once "db.php";
class Confissao{
    private $db;
    private $conn;

    public function __construct(){
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function add(string $texto):array{
        $sql = "INSERT INTO confissoes (confissao) VALUES (?)";

        $stmt= $this->conn->prepare($sql);

        if (!$stmt) {
            error_log("Erro na preparação: " . $this->conn->error);
            return ["success"=>false];
        }

        $stmt->bind_param('s',$texto);

        if ($stmt->execute()) {

            $stmt->close();
            return ["success"=>true];
        } else {
            error_log("Erro ao inserir: " . $stmt->error);
            $stmt->close();
            return ["success"=>false];
        } 
    }

    public function read():array{
            $sql = "SELECT id, confissao FROM confissoes  ORDER BY RAND() LIMIT 1";

            $stmt = $this->conn->prepare($sql);

            if (!$stmt) {
                error_log("Erro na preparação: " . $this->conn->error);
                return ["success"=>false];
            }


            if ($stmt->execute()) {
                $resposta = $stmt->get_result();
                if($resposta->num_rows > 0){
                    $dados = $resposta->fetch_assoc();
                    $stmt->close();
                    return ["success"=>true,"data"=>$dados];
                }else{
                    $stmt->close();
                    return ["success"=>false, "data"=> "sem confissoes salvas no banco de dados"];
                }
            } else {
                error_log("Erro ao buscar confissao: " . $stmt->error);
                $stmt->close();
                return ["success"=>false];
            }
    }

    public function apagar(int $id):array{
        $sql ="DELETE FROM confissoes WHERE ID = ?";
        
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            error_log("Erro na preparação: " . $this->conn->error);
            return ["success"=>false];
        }

        $stmt->bind_param('s',$id);

        if ($stmt->execute()) {
            $stmt->close();
            return ["success"=>true, "data"=> "Essa confissão foi apagada para sempre"];
        } else {
            error_log("Erro ao apagar: " . $stmt->error);
            $stmt->close();
            return ["success"=>false];
        } 

    }
    

    public function __destruct() {
        $this->db->close();
    }

}
