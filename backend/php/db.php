<?php

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "123456";
    private $dbname = "poker_game";

    private $conn; 

    public function __construct()
    {
        //now inside class database
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );

        if ($this->conn->connect_error) {
            die("Database connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

// $this - is the current  object created from the class

//class is the blueprint
//object is the house built from the blueprint
//$this = the specific house you're inside right now