<?php

namespace models;

require_once __DIR__ . "/../config/database.php";

use config\DataBase;
use PDO;

class User
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new DataBase())->getConnection();
    }
    public function signup($params)
    {
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $params["username"], PDO::PARAM_STR);
        $stmt->bindParam(2, $params["email"], PDO::PARAM_STR);
        $stmt->bindParam(3, $params["password"], PDO::PARAM_STR);
    }

    public function login($params)
    {
        $query = "SELECT * FROM users WHERE email=? AND password=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $params["email"], PDO::PARAM_STR);
        $stmt->bindParam(2, $params["password"], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function index()
    {
        return "Ola";
    }
}
