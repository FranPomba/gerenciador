<?php

namespace controllers;

require_once __DIR__ . "/../models/Project.php";

use controllers\Controller;
use Exception;
use Project;

class ProjectController extends Controller
{
    public function __construct()
    {
        parent::__construct('views/', false);
    }

    public function index()
    {
        $projeto = new Project();
        $dados = $projeto->getAllProjects();
        $this->render('project/index.php', ['projects' => $dados]);
    }

    public function create()
    {
        $project = new Project();
        if (isset($_POST['submit'])) {
            $titulo = $_POST['titulo'] ?? null;
            $desc = $_POST['descricao'] ?? null;
            $ano = $_POST['ano'] ?? null;
            $status = $_POST['status'] ?? null;
            $img = $_POST['img'] ?? null;
            if (!$titulo || !$desc || !$ano) {
                echo "Por Favor Preencha todos os campos obrigatórios.";
                return;
            }
            $dados = ['titulo' => $titulo, 'descricao' => $desc, 'ano' => $ano, 'status' => $status,  'img' => $img];
            try {
                $project->create($dados);
                header('Location: /');
            } catch (\PDOException $ex) {
                echo 'Erro ao inserir projecto ' . $ex->getMessage();
            }
        } else {
            $this->render('project/create.php');
        }
    }

    public function update() {}

    public function delete() {}
}
