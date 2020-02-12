
<!--

Original Author:Derek Dombek
Date Created:02-07-20
Version:initial customer function page
Date Last Modified:02-10-20
Modified by:Derek Dombek
Modification log: -02-07-20-inital class and function creation for customers database.
                -02-10-20-added catches for when database has issues.
                  
-->
<?php 
require_once('./model/database.php');
//include_once('./model/employee.php');

$error_message = null;
class CustomerDB {
        public static function getCustomer() {
            if (!isset(self::$employee_id)) {
                $customer_name = filter_input(INPUT_POST, 'name');
    $employee_id = filter_input(INPUT_GET, 'employee_id', 
            FILTER_VALIDATE_INT);
    if ($employee_id == NULL || $employee_id == FALSE) {
        $employee_id = 1;
    }
}
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
            $query2 = 'SELECT * FROM customer WHERE employeeID = :employeeID ' . 'ORDER by customerEmail';
            $statement2 = $db->prepare($query2);
            $statement2->bindValue(":employeeID", $employee_id);
            $count = $statement2->execute();
            $customers = $statement2;
                /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg; */
            if ($count < 1) {
                    $error_message = "We're experiencing technical difficulties, please try again later.";
                    include('./errors/database_error.php');
                    exit();
            } else {
                $error_message = "Thank you, $customer_name, for contacting us!";
            }
                    return $customers;
            }
    }
}

