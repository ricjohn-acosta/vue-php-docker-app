<?php
class DB {
    private $dsn = "mysql:host=db;dbname=asknicely;charset=utf8";
    private $dsnTest = "mysql:host=db;dbname=asknicely-dev;charset=utf8";
    private $dbUsername = "root";
    private $dbPassword = "example";
    private $pdo;

    public function connect()
    {
        try {
            $this->pdo = new PDO($this->dsn, $this->dbUsername, $this->dbPassword);
        } catch (PDOException $exception) {
            echo 'Connection failed: ' . $exception->getMessage();
        }
        return $this->pdo;
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}

header('Content-Type: application/json');
header('Content-Type: multipart/form-data');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

$conn = new DB();
$conn->connect();
?>