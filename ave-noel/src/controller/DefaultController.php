<?php
namespace App\src\controller;

use App\src\config\Session;
use App\src\Repository\ClientRepository;

class DefaultController
{
    public function home()
    {
        $session = new Session();
        
        require 'templates/home.php';
    }
}