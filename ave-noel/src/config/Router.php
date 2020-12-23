<?php

namespace App\src\config;

use App\src\controller\ClientController;
use App\src\controller\PostController;
use App\src\controller\CommentController;
use App\src\controller\DefaultController;


require_once('vendor\autoload.php');


class Router
{
    public function loadRoutes()
    {
            $action = $_GET['action'];
            if (isset($_GET['page']) && $_GET['page']  == 'post') {
                $controller = new PostController;
            } elseif (isset($_GET['page']) && $_GET['page'] == 'client') {
                $controller = new ClientController;
            } elseif (isset($_GET['page']) && $_GET['page'] == 'comment') {
                $controller = new CommentController;
            } else {
                $controller = new DefaultController;
                
            }
            $controller->{$action}();
    }
}