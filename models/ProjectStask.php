<?php

require_once __DIR__ . "/../config/database.php";

use config\DataBase;

class ProjectStask
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new DataBase)->getConnection();
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
        $query = 'UPDATE project_stask SET project_id=?, stack_id=? WHERE project_id=? AND stack_id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $new['project'], PDO::PARAM_INT);
        $stmt->bindParam(2, $new['stack'], PDO::PARAM_INT);
        $stmt->bindParam(3, $old['project'], PDO::PARAM_INT);
        $stmt->bindParam(4, $old['stack'], PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAll()
    {
        $query = 'SELECT * FROM project_stask, project, stack WHERE project_stack.project_id = project.id AND project_stack.stack_id = stack.id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
