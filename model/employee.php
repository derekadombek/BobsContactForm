
<!--

Original Author:Derek Dombek
Date Created:01-31-20
Version:initial admin page
Date Last Modified:02-07-20
Modified by:Derek Dombek
Modification log: -01-31-20-made it to where an employee can select and delete a customer
                  -02-07-20-added require() to connect to database.
-->
<?php 
require_once('./model/database.php');

class EmployeeDB {
        public static function getEmployee() {
             try {
                //$db = new PDO($dsn, $username, $password);
                $db = Database::getDB();
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                /* include('database_error.php'); */
                echo "DB Error: " . $error_message; 
                exit();
            }
        // Add the product to the database  
                $query = 'SELECT employeeID, firstName FROM employee ORDER by employeeID';
                $statement = $db->prepare($query);
                $statement->execute();
                $employees = $statement;
                /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg; */
                return $employees;
    }
    
}


