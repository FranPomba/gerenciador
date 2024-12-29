<?php

namespace controllers;

use Stask;

class StackController extends Controller
{
    public function __construct()
    {
        parent::__construct('/views', false);
    }
    public function index()
    {
        $stacks = (new Stask())->getAll();
        $this->render('/stack/index.php', ['stacks' => $stacks]);
    }
    public function create() {
        if(isset($_POST['submit'])) {
            $nome = $_POST['nome'] ?? null;
            if(!$nome) {
                echo 'preencha o nome da tecnologia';
            }
            $stack = (new Stask())->create($nome);
        }
    }
}
