<!--

Original Author:Derek Dombek
Date Created:01-31-20
Version:initial delete page
Date Last Modified:02-10-20
Modified by:Derek Dombek
Modification log:functionality for the delete button
                            -02-10-20: added catch for when database has issues
 
-->




<?php
require_once('./model/database.php');
$customer_name = filter_input(INPUT_POST, 'name');
$error_message = null;
            $dsn = 'mysql:host=localhost;dbname=bobscontact';
            $username = 'root';
            $password = 'Pa$$w0rd';

            try {
                //$db = new PDO($dsn, $username, $password);
                $db = Database::getDB();
                
            } catch (PDOException $e) {
                //$error_message = $e->getMessage();
                $error_message = "We're experiencing technical difficulties, please try again later.";
                include('./database_error.php');
                //echo "DB Error: " . $error_message; 
                exit();
            }
// Get IDs
$customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);


// Delete the product from the database
if (!$error_message) {
    $query = 'DELETE FROM customer
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $count = $statement->execute();    
    $statement->closeCursor(); 
    if ($count < 1) {
                    $error_message = "We're experiencing technical difficulties, please try again later.";
                    include('./errors/database_error.php');
                    exit();
        } else {
            $error_message = "Thank you, $customer_name, for contacting us!";
        }
}

// Display the Product List page
include('admin.php');