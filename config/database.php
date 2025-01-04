<?php

namespace config;

use PDO;
use PDOException;

class DataBase
{

    private $conn;
    private static $pdo;

    public function getConnection()
    {
        $this->conn = null;
        $db = require __DIR__ . '/config.php';

        try {
            $this->conn = new PDO(
                "mysql:host={$db['host']};dbname={$db['dbname']}",
                $db['user'],
                $db['password']
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            die("Erro de conexão: " . $ex->getMessage());
        }
        return $this->conn;
    }
    public static function connectSQLite(){
        if (!self::$pdo) {
            self::$pdo = new PDO('sqlite:' . __DIR__ . '/../armazenamento.db');
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }
}
