<?php
require_once '../../controllers/employeeController.php';

class AddEmployeesEndpoint {
    private EmployeeController $controller;

    public function __construct()
    {
        $this->controller = new EmployeeController();
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $file = $_FILES['file'];

            if ($file['type'] !== 'text/csv') {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid file format. Only CSV files are allowed.']);
                exit;
            }

            $res = $this->controller->addEmployees($file);
            echo json_encode($res);
        }
    }
}

$endpoint = new AddEmployeesEndpoint();
$endpoint->handleRequest();
