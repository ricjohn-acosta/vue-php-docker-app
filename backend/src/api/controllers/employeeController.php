<?php

require_once (dirname(__DIR__, 1) . '/models/employeeModel.php');
require_once (dirname(__DIR__, 1) . '/models/companyModel.php');

class EmployeeController {

    private EmployeeModel $employee;
    private CompanyModel $company;

    public function __construct()
    {
        $this->employee = new EmployeeModel();
        $this->company = new CompanyModel();
    }

    public function addEmployees($file)
    {
        $tmpName = $file['tmp_name'];

        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
                if (($ref = fopen($tmpName, "r")) !== false) {
                    fgetcsv($ref);

                    while (($data = fgetcsv($ref)) !== false) {
                        $companyName = $data[0];
                        $employeeName = $data[1];
                        $email = $data[2];
                        $salary = intval($data[3]);

                        $companyExists = $this->company->getCompany($companyName);
                        if (!$companyExists) {
                            // We need to make sure the company exists in the db.
                            $this->company->addCompany($companyName);
                        }
                        $company = $this->company->getCompany($companyName);
                        $this->employee->addEmployee($company['company_id'], $employeeName, $email, $salary);
                    }

                    http_response_code(200);
                    echo json_encode(['message' => 'File read successfully.']);

                    fclose($ref);
                }
            } else {
                http_response_code(400);
                echo json_encode(['message' => 'Invalid file.']);
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getEmployees()
    {
        return $this->employee->getAll();
    }

    public function updateEmail($data)
    {
        $employeeId = $data['employee_id'];
        $newEmail = $data['email'];
        return $this->employee->updateEmail($employeeId, $newEmail);
    }
}