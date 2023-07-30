<?php

declare(strict_types=1);
require_once (dirname(__DIR__, 1) . '/api/models/employeeModel.php');
require_once (dirname(__DIR__, 1) . '/db.php');

use PHPUnit\Framework\TestCase;



class EmployeeControllerTest extends TestCase
{

    // Ideally calls to the database shouldn't be mocked and should be a connection to a real database preferably a dev db
    public function testShouldGetEmployees(): void
    {
        $employeeModel = new EmployeeModel();
        $result = $employeeModel->getAll();
        if (!$result) {
            $employeeModel->addEmployee(1, 'testName', 'testEmail', 2000);
        }
        $this->assertNotNull($result);
    }
}