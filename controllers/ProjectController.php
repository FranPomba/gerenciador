<?php

namespace controllers;

require_once __DIR__ . "/../models/Project.php";
require_once __DIR__ . "/../models/ProjectStack.php";
require_once __DIR__ . "/../models/Stack.php";

use controllers\Controller;
use Helpers;
use model\Project;
use model\ProjectStack;
use model\Stack;
use PDOException;


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
        $stacks = (new ProjectStack())->getAll();
        
        $this->render('project/index.php', ['projects' => $dados, 'stacks' => $stacks]);
    }

    public function create()
    {

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
                $project = (new Project())->create($dados);
                $this->addStack($project['id']);
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
                Helpers::redirecionar("project/$id/stacks");
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
            $stacks = (new ProjectStack())->getStacks($id);
            $this->render('/project/detail.php', ['project' => $dados, 'stacks' => $stacks]);
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

    public function addStack($id)
    {
        $stacks = $_POST['tecnologias'];
        $projStack = new ProjectStack();
        if (isset($_POST['submit']) and is_array($stacks)) {
            
            if (!empty($stacks)) {
                foreach ($stacks as $stack) {
                    if(!$projStack->exist($id, $stack)){
                        $projStack->create($id, $stack);
                    }
                }
            }
            Helpers::redirecionar("project/$id");
        } else {
            $stacks = (new Stack())->getAll();
            $project = (new Project())->get($id);
            $list_stacks = array_map(fn($stack) => $stack['stack_id'], $projStack->getByProject($id));
            $this->render("stack/stacks.php", ['project' => $project, 'stacks' => $stacks, 'list_stacks'=> $list_stacks]);
        }
    }
    public function sobre(){
        $this->render('project/sobre.php');
    }
}
