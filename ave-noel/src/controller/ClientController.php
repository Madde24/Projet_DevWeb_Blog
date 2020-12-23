<?php 

namespace App\src\controller;



use App\src\config\Session;

use App\src\Repository\ClientRepository;

use App\src\model\client;


class ClientController
{
    public function liste()
    {
        $clientRepository = new ClientRepository;
        $clients = $clientRepository->getClients();
        
    }

    public function connect(){
        $session = new Session;
        require 'templates/connexion.php';
        $clientRepository = new ClientRepository;
        
        if (isset($_POST['connexion'])){
            $client = new Client;
            $client->setEmail($_POST['email']);
            $client->setUserName($_POST['username']);
            $client->setPassword($_POST['password']);
            $clientRepository->connectClient($client);
            if ($session->checkSession()){
                header('Location: index.php?action=home');
            }
            $session->set("message","Les données entrées sont incorrectes.");
        }
        
        
    }

    public function disconnect(){
        $session = new Session;
        require 'templates/deconnexion.php';
        $clientRepository = new ClientRepository;
        
        if (isset($_POST['deconnection'])){
            $session->stop();
            header('Location: index.php?action=home');
        }
    }


    public function create()
    {
        $clientRepository = new ClientRepository;
        $session = new Session;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $client = new Client;
            $client->setUserName($_POST['username']);
            $client->setFirstName($_POST['firstname']);
            $client->setLastName($_POST['lastname']);
            $client->setEmail($_POST['email']);
            $client->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $client->setAvatarPath($_POST['avatarpath']);
            $clientRepository->insertClients($client);
        }
        require 'templates/newclient.php';
    }

    public function read()
    {
        $session = new Session;
        $clientRepository = new ClientRepository;
        if (isset($_SESSION['id'])){
        $clientID = $clientRepository->getClientsWithId($_SESSION['id']);
        }
        require 'templates/showprofile.php';
    }

    public function update()
    {   
        $clientRepository = new ClientRepository;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $client = new Client;
            $client->setId($_POST['id']);
            $client->setFirstName($_POST['firstname']);
            $client->setLastName($_POST['lastname']);
            $client->setEmail($_POST['email']);
            $client->setAvatarPath($_POST['avatarpath']);
            $clientRepository->upDateClient($client);
        }
        
        require 'templates/newclient.php';

    }

    public function delete()
    {
        $clientRepository = new ClientRepository;
        $idClient = 2;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $clientRepository->deleteClient($idClient);
        }
        require 'templates/home.php';
    }
}