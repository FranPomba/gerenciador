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
        $query = "INSERT INTO Project (titulo, descricao, ano, finalizado, tecnologias, img ) values (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query, $params);
        return $stmt->execute();
    }
}
