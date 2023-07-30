<?php
require_once (dirname(__DIR__, 2) . '/db.php');

class EmployeeModel extends DB{

    private $pdo;
    public function __construct()
    {
        $this->connect();
        $this->pdo = $this->getPDO();
    }

    public function getAll()
    {
        try {
            $stmt = $this->pdo->query('
                SELECT c.company_name, e.employee_id, e.employee_name, e.email, e.salary
                FROM companies
                AS c
                INNER JOIN employees
                AS e
                ON c.company_id = e.company_id
                ');

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function addEmployee($companyId, $employeeName, $email, $salary) {
        $stmt = $this->pdo->prepare('
                                INSERT INTO employees (company_id, employee_name, email, salary)
                                VALUES ( "'.$companyId.'", "'.$employeeName.'", "'.$email.'", "'.$salary.'")
                                ');
        return $stmt->execute();
    }

    public function updateEmail($uid, $newEmail)
    {
        try {
            $stmt = $this->pdo->prepare('UPDATE employees SET email = ? WHERE employee_id = ?');
            return $stmt->execute([$newEmail, $uid]);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}