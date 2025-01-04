<?php

namespace controllers;

use Helpers;
use model\Stack;

class StackController extends Controller
{
    public function __construct()
    {
        parent::__construct('views/', false);
    }
    public function index()
    {
        $stacks = (new Stack())->getAll();
        $this->render('stack/index.php', ['stacks' => $stacks]);
    }
    public function create()
    {
        if (isset($_POST['submit'])) {
            $nome = $_POST['nome'] ?? null;
            if (!$nome) {
                echo 'preencha o nome da tecnologia';
            }
            $stack = (new Stack())->create($nome);
            Helpers::redirecionar('stacks');
        } else {
            $this->render('stack/create.php');
        }
    }
}
