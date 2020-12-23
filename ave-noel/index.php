<?php 
session_start();


use App\src\config\Router;
use App\src\config\Session;

require_once "vendor/autoload.php";
$session = new Session();
$router = new Router();
$router->loadRoutes();


?>