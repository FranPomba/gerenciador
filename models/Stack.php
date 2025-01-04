<?php
namespace model;
require_once __DIR__ . "/../config/database.php";

use config\DataBase;
use PDO;
class Stack{
    private $conn;
    public function __construct() {
        $this->conn = (new DataBase()) -> connectSQLite();
    }

    public function create($nome){
        $query = 'INSERT INTO stacks (nome) values(?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nome, PDO::PARAM_STR);
        $stmt->execute();
        $id = $this->conn->lastInsertId();
        return $this->get($id);
    }
    public function get($id){
        $query = 'SELECT * FROM stacks where id=?';
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
        $query = "UPDATE stacks SET nome=? where id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->get($id);
    }

    public function delete($id){
        $query = "delete from stacks where id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAll(){
        $query = "SELECT * FROM stacks";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}