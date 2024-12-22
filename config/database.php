<?php

namespace config;

use PDO;
use PDOException;

class DataBase
{

    private $conn;

    public  function getConnection()
    {
        $this->conn = null;
        $db = require './config.php';
        try {
            $this->conn = new PDO(
                "mysql:host={$db['host']};dbname={$db['dbname']}",
                $db['user'],
                $db['password']
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo "error de conexão" . $ex->getMessage();
        }
        return $this->conn;
    }
}
