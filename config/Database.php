<?php
class Database{
    protected $host = "localhost";
    protected $user = "root";
    protected $pass = "Root@123";
    protected $dbName ="CoachProv2";

    protected function connect(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}