<?php
namespace App\src\config;

class Database
{
    private const DB_HOST = 'mysql:host=localhost;dbname=avance1';
    private const DB_USER = 'shareAndCare';
    private const DB_PASSWORD = 'shareStory';
    private $connection;
    
    public function getConnection()
    {
        $this->connection = new \PDO(self::DB_HOST, self::DB_USER, self::DB_PASSWORD);
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
       
        return $this->connection;
    }

    public function checkConnection()
    {
        if(!isset($this->connection)){
            return $this->getConnection();
        }
        
        return $this->connection;
    }
}
?>