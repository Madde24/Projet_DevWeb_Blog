<?php

namespace App\src\Repository;

use App\src\config\Database;

use App\src\model\client;

class ClientRepository
{
    public function getClients()
    {
        $database = new Database;

        $connection = $database->checkConnection();

        $result = $connection->query('SELECT * FROM client');

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertClients(Client $client)
    {
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare('INSERT INTO client(username,mail,nom,prenom,pass,isadmin,avatar_path,last_connection_at)  VALUES (:username, :mail, :nom, :prenom, :pass, :isadmin, :avatar_path, :last_connection_at)');
        $result->bindValue(':username', $client->getUserName(), \PDO::PARAM_STR);
        $result->bindValue(':mail', $client->getMail(), \PDO::PARAM_STR);
        $result->bindValue(':nom', $client->getLastName(), \PDO::PARAM_STR);
        $result->bindValue(':prenom', $client->getFirstName(), \PDO::PARAM_STR);
        $result->bindValue(':pass', $client->getPass(), \PDO::PARAM_STR);
        $result->bindValue(':isadmin', $client->getIsAdmin(), \PDO::PARAM_INT);
        $result->bindValue(':avatar_path', $client->getAvatarPath(), \PDO::PARAM_STR);
        $result->bindValue(':last_connection_at', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
        
        $result->execute();
    }

    public function getClientsWithId(int $idClient)
    {
        $database = new Database;

        $connection = $database->checkConnection();

        $result = $connection->query("SELECT * FROM client WHERE id=$idClient");

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteClient(int $idClient)
    {
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare("DELETE FROM client WHERE id=$idClient");
        $result->execute();
    }

    public function upDateClient(Client $client)
    {
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare('UPDATE client SET nom = :nom, prenom = :prenom, email = :email avatar_path = :avatar_path WHERE id = :id ');
        $result->bindValue(':id', $client->getId(), \PDO::PARAM_INT);
        $result->bindValue(':nom', $client->getLastName(), \PDO::PARAM_STR);
        $result->bindValue(':prenom', $client->getFirstName(), \PDO::PARAM_STR);
        $result->bindValue(':email', $client->getEmail(), \PDO::PARAM_STR);
        $result->bindValue(':avatar_path', $client->geAvatarPath(), \PDO::PARAM_STR);
        $result->execute();
    }
    
    public function connectClient(Client $client){
        $database = new Database;
        $db = $database->checkConnection();
        $username = $client->getUserName();
        $mail = $client->getMail();
        $pass = $client->getPass();
        $result = $db->query("SELECT * FROM client WHERE username ='$username' AND mail ='$mail' ");
        $client=$result->fetchAll(\PDO::FETCH_ASSOC);
        
        if (sizeof($client)==1) {
            foreach($client as &$clientConcerned){
                if (password_verify($pass,$clientConcerned['pass'])){
                    
                    $_SESSION['id']=$clientConcerned['id'];
                    $_SESSION['username']=$clientConcerned['username'];
                    $_SESSION['avatar']=$clientConcerned['avatar_path'];
                }
            }
        }
    }
}
?>