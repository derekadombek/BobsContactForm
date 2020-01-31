<!--

Original Author:Derek Dombek
Date Created:01-31-20
Version:initial delete page
Date Last Modified:01-31-20
Modified by:Derek Dombek
Modification log:functionality for the delete button
 
-->




<?php

            $dsn = 'mysql:host=localhost;dbname=bobscontact';
            $username = 'root';
            $password = 'Pa$$w0rd';

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                /* include('database_error.php'); */
                echo "DB Error: " . $error_message; 
                exit();
            }
// Get IDs
$customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);


// Delete the product from the database
if ($customer_id != false) {
    $query = 'DELETE FROM customer
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $success = $statement->execute();
   $statement->closeCursor(); 

}

// Display the Product List page
include('admin.php');