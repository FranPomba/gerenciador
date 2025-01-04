<?php

namespace model;
require_once __DIR__ . "/../config/database.php";

use config\DataBase;
use PDO;

class ProjectStack
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new DataBase)->connectSQLite();
    }
    public function create($project, $task)
    {
        $query = 'INSERT INTO project_stack (project_id, stack_id) VALUES (?, ?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $project, PDO::PARAM_INT);
        $stmt->bindParam(2, $task, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($new, $old)
    {
        $query = 'UPDATE project_stack SET project_id=?, stack_id=? WHERE project_id=? AND stack_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $new['project'], PDO::PARAM_INT);
        $stmt->bindParam(2, $new['stack'], PDO::PARAM_INT);
        $stmt->bindParam(3, $old['project'], PDO::PARAM_INT);
        $stmt->bindParam(4, $old['stack'], PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAll()
    {
        $query = 'SELECT * FROM project_stack, projects, stacks WHERE project_stack.project_id = projects.id AND project_stack.stack_id = stacks.id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getByProject($project){
        $query = 'SELECT stack_id FROM project_stack WHERE project_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $project, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function exist($project, $stack){
        $query = 'SELECT * FROM project_stack WHERE project_id=? AND stack_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $project, PDO::PARAM_INT);
        $stmt->bindParam(2, $stack, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        if($res){
            return true;
        }
        return false;
    }
    public function getStacks($project){
        $query = 'SELECT * FROM stacks, project_stack WHERE stacks.id = project_stack.stack_id AND project_stack.project_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $project, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
