<?php
namespace App\Classes;
use PDO;
use Exception;
class Database{
    private $connection;

    public function __construct()
    {           

        try{
            $this->connection=new PDO("mysql:host=localhost;dbname=cafeteria","root","");
        }catch(Exception $e){
            echo $e->getMessage();
        }  
    }

    public function runDML($stmt){
        return $this->connection->query($stmt);
    }
}

