
<!--

Original Author:Derek Dombek
Date Created:02-07-20
Version:initial admin page
Date Last Modified:02-07-20
Modified by:Derek Dombek
Modification log: -02-07-20-inital class and function creation for customers database.
                  
-->
<?php 
require_once('./model/database.php');
//include_once('./model/employee.php');


class CustomerDB {
        public static function getCustomer() {
            if (!isset(self::$employee_id)) {
    $employee_id = filter_input(INPUT_GET, 'employee_id', 
            FILTER_VALIDATE_INT);
    if ($employee_id == NULL || $employee_id == FALSE) {
        $employee_id = 1;
    }
}
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
                $query2 = 'SELECT * FROM `customer` WHERE employeeID = :employeeID ' . 'ORDER by customerEmail';
           
            $statement2 = $db->prepare($query2);
            $statement2->bindValue(":employeeID", $employee_id);
            $statement2->execute();
            $customers = $statement2;
                /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg; */
                return $customers;
    }
}

