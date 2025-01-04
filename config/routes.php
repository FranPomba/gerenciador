<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controllers/ProjectController.php';
require_once __DIR__ . '/../controllers/StackController.php';


use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('controllers');
/* rotas project */
SimpleRouter::get('/', 'ProjectController@index');
SimpleRouter::get('/project','ProjectController@create');
SimpleRouter::post('/project', 'ProjectController@create');
SimpleRouter::get('/project/{id}/edit','ProjectController@update');
SimpleRouter::post('/project/{id}/edit','ProjectController@update');
SimpleRouter::post('/project/{id}/delete','ProjectController@delete');
SimpleRouter::get('/project/{id}','ProjectController@detail');
SimpleRouter::post('/project/{id}/stacks', 'ProjectController@addStack');
SimpleRouter::get('/project/{id}/stacks', 'ProjectController@addStack');
SimpleRouter::get('/sobre-mim', 'ProjectController@sobre');

// routas stacks
SimpleRouter::get('/stacks','StackController@index');
SimpleRouter::get('/stack', 'StackController@create');
SimpleRouter::post('/stack', 'StackController@create');
SimpleRouter::start();