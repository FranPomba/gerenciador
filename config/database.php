<?php

namespace config;

use PDO;
use PDOException;

class DataBase
{

    private $conn;

    public function getConnection()
    {
        $this->conn = null;

        // Carregar configuração
        $db = require __DIR__ . '/config.php';

        try {
            // Estabelecer conexão com o banco de dados
            $this->conn = new PDO(
                "mysql:host={$db['host']};dbname={$db['dbname']}",
                $db['user'],
                $db['password']
            );
            // Definir o modo de erro do PDO
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            // Exibir mensagem de erro caso a conexão falhe
            die("Erro de conexão: " . $ex->getMessage());
        }

        return $this->conn;
    }
}
