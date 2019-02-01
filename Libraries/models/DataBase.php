<?php
class DataBase{
    private $pdo;
    public function __construct($host,$dbname,$user,$password){
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
        $pdo = new PDO($dsn,$user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
    }
    public function getPdo(){
        return $this->pdo;
    }
}