<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controllers/ProjectController.php';


use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('controllers');

SimpleRouter::get('/', 'ProjectController@index');


SimpleRouter::start();
