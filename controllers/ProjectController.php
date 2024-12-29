<?php

namespace controllers;

require_once __DIR__ . "/../models/Project.php";

use controllers\Controller;
use PDOException;
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
            if (!$this->validarDados($titulo, $ano, $desc)) {
                return;
            }
            $dados = ['titulo' => $titulo, 'descricao' => $desc, 'ano' => $ano, 'status' => $status,  'img' => $img];
            try {
                $project->create($dados);
                header('Location: /');
            } catch (PDOException $ex) {
                echo 'Erro ao inserir projecto ' . $ex->getMessage();
            }
        } else {
            $this->render('project/create.php');
        }
    }
    public function update($id)
    {
        $project = new Project();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'] ?? null;
            $desc = $_POST['descricao'] ?? null;
            $ano = $_POST['ano'] ?? null;
            $status = $_POST['status'] ?? null;
            $img = $_POST['img'] ?? null;

            if (!$project->get($id)) {
                echo 'Projeto não encontrado.';
                return;
            }
            if (!$this->validarDados($titulo, $ano, $desc)) {
                return;
            }

            $dados = [
                'titulo' => $titulo,
                'descricao' => $desc,
                'ano' => $ano,
                'status' => $status,
                'img' => $img
            ];

            try {
                $project->update($dados, $id);
                header('Location: /');
            } catch (\PDOException $ex) {
                echo 'Erro ao atualizar o projeto: ' . $ex->getMessage();
            }
        } else {
            $dados = $project->get($id);

            if (!$dados) {
                echo 'Projeto não encontrado.';
                return;
            }
            $this->render('project/edit.php', ['project' => $dados]); // Certifique-se de que o template está correto
        }
    }


    public function delete($id)
    {
        $project = new Project();
        if ($project->delete($id)) {
            $this->render('project/index.php', ['success' => 'projeto eliminado']);
        }
    }

    public function detail($id)
    {
        try {
            $dados = (new Project())->get($id);
            $this->render('/project/detail.php', ['project' => $dados]);
        } catch (\PDOException $ex) {
            echo 'erro! ' . $ex->getMessage();
        }
    }
    private function validarDados($titulo, $ano, $desc)
    {
        if (!$titulo || !$desc || !$ano) {
            echo "Por Favor Preencha todos os campos obrigatórios.";
            return false;
        }
        return true;
    }
}
