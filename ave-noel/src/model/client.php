<?php
namespace App\src\model;

require_once('vendor\autoload.php');

class Client
{
    private $id;
    private $userName;
    private $firstName;
    private $lastName;
    private $pass;
    private $isAdmin = 0;
    private $avatarPath;
    private $lastConnection;
    private $mail;

    public function getUserName()
    {
        return $this->userName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getIsAdmin()
    {
        return (int)$this->isAdmin;
    }

    public function getAvatarPath()
    {
        return $this->avatarPath;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setId($id)
    {
        $this->id= $id;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setEmail($mail)
    {
        $this->mail = $mail;
    }

    public function setPassword($password)
    {
        $this->pass = $password;
    }

    public function setAvatarPath($avatar)
    {
        $this->avatarPath = $avatar;
    }
}
?>