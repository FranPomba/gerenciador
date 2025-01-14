<?php

namespace model;

require_once __DIR__ . "/../config/database.php";

use config\DataBase;
use PDO;

class Project
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new DataBase())->connectSQLite();
    }

    public function create($params)
    {
        $query = "INSERT INTO Projects (titulo, descricao, ano, status, img ) values (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $params["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(2, $params["descricao"], PDO::PARAM_STR);
        $stmt->bindParam(3, $params["ano"], PDO::PARAM_INT);
        $stmt->bindParam(4, $params["status"], PDO::PARAM_STR);
        $stmt->bindParam(5, $params["img"], PDO::PARAM_STR);
        $stmt->execute();
        $id = $this->conn->lastInsertId();
        return $this->get($id);
    }
    public function update($params, $id)
    {
        $query = "UPDATE Projects SET titulo=?, descricao=?, ano=?, status=?, img=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $params["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(2, $params["descricao"], PDO::PARAM_STR);
        $stmt->bindParam(3, $params["ano"], PDO::PARAM_INT);
        $stmt->bindParam(4, $params["status"], PDO::PARAM_STR);
        $stmt->bindParam(5, $params["img"], PDO::PARAM_STR);
        $stmt->bindParam(6, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM Projects WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAllProjects()
    {
        $query = "SELECT * FROM projects";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProject($params)
    {
        $query = "SELECT * FROM Projects WHERE 1=1";
        $values = [];
        if (isset($params['titulo'])) {
            $query .= " AND titulo LIKE ?";
            $values[] = '%' . $params['titulo'] . '%';
        }
        if (isset($params['descricao'])) {
            $query .= " AND descricao LIKE ?";
            $values[] = '%' . $params['descricao'] . '%';
        }
        if (isset($params['ano'])) {
            $query .= " AND ano= ?";
            $values[] = $params['ano'];
        }
        if (isset($params['status'])) {
            $query .= ' AND status=?';
            $values[] = $params['status'];
        }
        $stmt = $this->conn->prepare($query);
        $stmt->execute($values);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get(int $id): array
    {
        $query = "SELECT * FROM Projects where id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            throw new \Exception("Projeto com ID $id não encontrado.");
        }
        return $result;
    }
    public function getProjects()
    {
        $query = "SELECT id, titulo, nome, stack_id, descricao, img, ano,  FROM projects";
    }
}
