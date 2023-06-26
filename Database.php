<?php

class Database{
    private $username;
    private $password;
    private $host;
    private $database;

    public function __construct(){
        $this->username = 'UseR';
        $this->password = 'PassworD';
        $this->host = 'db';
        $this->database = 'db_name';
    }

    public function connect(){
        try {

            $conn = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            die("Connection failed: ".$e->getMessage());
        }
    }
}