<?php

use config\DataBase;

class Project
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new DataBase())->getConnection();
    }

    public function create($params)
    {
        $query = "INSERT INTO Project (titulo, descricao, ano, finalizado, img ) values (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $params["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(2, $params["descricao"], PDO::PARAM_STR);
        $stmt->bindParam(3, $params["ano"], PDO::PARAM_INT);
        $stmt->bindParam(4, $params["status"], PDO::PARAM_BOOL);
        $stmt->bindParam(5, $params["img"], PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function update($params, $id)
    {
        $query = "UPDATE Project SET titulo=?, descricao=?, ano=?, finalizado=?, img=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $params["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(2, $params["descricao"], PDO::PARAM_STR);
        $stmt->bindParam(3, $params["ano"], PDO::PARAM_INT);
        $stmt->bindParam(4, $params["status"], PDO::PARAM_BOOL);
        $stmt->bindParam(5, $params["img"], PDO::PARAM_STR);
        $stmt->bindParam(6, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM Project WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAllProjects()
    {
        $query = "SELECT * FROM Projects";
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

    public function get($id){
        $query = "SELECT * FROM Projects where=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
