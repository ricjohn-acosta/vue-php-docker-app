<?php
require_once '../../controllers/employeeController.php';

class UpdateEmailEndpoint extends DB {
    private $controller;

    public function __construct()
    {
        $this->controller = new EmployeeController();
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] ==='POST') {
            $data = json_decode(file_get_contents("php://input"),true);

            $res = $this->controller->updateEmail($data);
            echo json_encode($res);
        }
    }
}

$endpoint = new UpdateEmailEndpoint();
$endpoint->handleRequest();
