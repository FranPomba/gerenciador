<?php

namespace controllers;

require_once __DIR__ . "/../models/Project.php";

use controllers\Controller;
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
        $this->render('templats/app.php', ['projects' => $dados]);
    }

    public function create() {}

    public function update() {}

    public function delete() {}
}
