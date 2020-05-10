<?php

include 'core/Router.php';
include 'core/Controller.php';


include 'model/listTurnos.php';
include 'model/turnoModel.php'; 
include 'core/validations.php';
include 'core/Persistencia.php';

include 'controllers/TurnoController.php';
include 'controllers/FormController.php';
//include 'core/Persistencia.php';
//include 'core/form.php';


use App\core\Router;

$router = new Router;
$router->define([
    'GET /' => 'TurnoController@index',
    'POST /form' => 'FormController@save',
    'GET /turno' => 'TurnoController@turno',
    'GET /ficha' => 'TurnoController@ficha',
]);
