<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controllers/ProjectController.php';


use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('controllers');
/* Rotas project */
SimpleRouter::get('/', 'ProjectController@index');
SimpleRouter::get('/project','ProjectController@create');
SimpleRouter::post('/project', 'ProjectController@create');
SimpleRouter::get('/project/{id}/edit','ProjectController@update');
SimpleRouter::post('/project/{id}/edit','ProjectController@update');
SimpleRouter::post('/project/{id}/delete','ProjectController@delete');
SimpleRouter::get('/project/{id}','ProjectController@detail');
SimpleRouter::start();