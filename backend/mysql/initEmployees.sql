USE asknicely;

CREATE TABLE employees (
    employee_id INT AUTO_INCREMENT PRIMARY KEY,
    company_id TEXT NOT NULL,
    employee_name TEXT NOT NULL,
    email TEXT NOT NULL,
    salary INT NOT NULL
);