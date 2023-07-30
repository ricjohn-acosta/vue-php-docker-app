<?php
require_once '../../controllers/employeeController.php';

class GetEmployeesEndpoint {
    private EmployeeController $controller;

    public function __construct()
    {
        $this->controller = new EmployeeController();
    }

    public function handleRequest()
    {
        $employees = $this->controller->getEmployees();
        echo json_encode($employees);
    }
}

$endpoint = new GetEmployeesEndpoint();
$endpoint->handleRequest();
