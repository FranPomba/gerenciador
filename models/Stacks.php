<?php
require_once __DIR__ . "/../config/database.php";

use config\DataBase;
class Stask{
    private $conn;
    public function __construct() {
        $this->conn = (new DataBase()) -> getConnection();
    }

    public function create($nome){
        $query = 'INSERT INTO stasks (nome) values(?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nome, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function get($id){
        $query = 'SELECT * FROM stasks where id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            throw new \Exception("tarefa com ID $id não encontrado.");
        }
        return $result;
    }
    public function update($id, $nome){
        $query = "UPDATE stasks SET nome=? where id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id){
        $query = "delete from stasks where id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}