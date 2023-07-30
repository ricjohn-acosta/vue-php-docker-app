<?php
require_once (dirname(__DIR__, 2) . '/db.php');

class CompanyModel extends DB{

    private $pdo;
    public function __construct()
    {
        $this->connect();
        $this->pdo = $this->getPDO();
    }

    public function getCompany($companyName)
    {
        try {
            $stmt = $this->pdo->query('SELECT * FROM companies WHERE company_name = "'.$companyName.'"');
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function addCompany($companyName)
    {
        try {
            $stmt = $this->pdo->prepare('INSERT INTO companies (company_name) values ( "'.$companyName.'")');
            return $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }
}