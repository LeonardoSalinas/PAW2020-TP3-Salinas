<?php

include 'setup.php';


$url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$http_method = $_SERVER["REQUEST_METHOD"];

try{
    $router->direct($url_path, $http_method);
} catch (Error $e) {
    http_response_code(404);
    include "views/View.Error.php";
}
