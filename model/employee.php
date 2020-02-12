
<!--

Original Author:Derek Dombek
Date Created:01-31-20
Version:initial employee function page
Date Last Modified:02-12-20
Modified by:Derek Dombek
Modification log: -01-31-20-made it to where an employee can select and delete a customer
                  -02-07-20-added require() to connect to database.
                  -02-10-20-added catches for when database has issues.
                  
-->
<?php 
require_once('./model/database.php');

class EmployeeDB {
        public static function getEmployee() {
            $customer_name = filter_input(INPUT_POST, 'name');
             $error_message = null;
             try {
                //$db = new PDO($dsn, $username, $password);
                $db = Database::getDB();
                
            } catch (PDOException $e) {
                //$error_message = $e->getMessage();
                $error_message = "We're experiencing technical difficulties, please try again later.";
                include('../errors/database_error.php');
                //echo "DB Error: " . $error_message; 
                exit();
            }
        // Add the product to the database  
            if (!$error_message) {
                $query = 'SELECT employeeID, firstName FROM employee ORDER by employeeID';
                $statement = $db->prepare($query);
                $count = $statement->execute();
                $employees = $statement;
                /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg; */
                
                if ($count < 1) {
                    $error_message = "We're experiencing technical difficulties, please try again later.";
                    include('./errors/database_error.php');
                    exit();
            } else {
                $error_message = "Thank you, $customer_name, for contacting us!";
            }
                    return $employees;
            }
                
    }
    
}


