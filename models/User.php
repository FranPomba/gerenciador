<?php

use config\DataBase;

class User{
    private $conn;
    public function __construct()
    {
        $this->conn = (new DataBase())->getConnection();
    }
}