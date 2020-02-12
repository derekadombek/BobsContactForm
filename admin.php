
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
    include_once('./model/database.php');
    require('./model/employee.php');
    require('./model/customer.php');
if (!isset($employee_id)) {
    $employee_id = filter_input(INPUT_GET, 'employee_id', 
            FILTER_VALIDATE_INT);
    if ($employee_id == NULL || $employee_id == FALSE) {
        $employee_id = 1;
    }
}
    $customer_name = filter_input(INPUT_POST, 'name');
    
    // Validate inputs
    
//            $dsn = 'mysql:host=localhost;dbname=bobscontact';
//            $username = 'root';
//            $password = 'Pa$$w0rd';
                try {
                //$db = new PDO($dsn, $username, $password);
                $db = Database::getDB();
                
            } catch (PDOException $e) {
                //$error_message = $e->getMessage();
                $error_message = "We're experiencing technical difficulties, please try again later.";
                include('./errors/database_error.php');
                //echo "DB Error: " . $error_message; 
                exit();
            }
//            try {
//                //$db = new PDO($dsn, $username, $password);
//                $db = Database::getDB();
//            } catch (PDOException $e) {
//                $error_message = $e->getMessage();
//                /* include('database_error.php'); */
//                echo "DB Error: " . $error_message; 
//                exit();
//            }

            // Add the product to the database  
//            $query = 'SELECT employeeID, firstName FROM employee ORDER by employeeID';
//            $statement = $db->prepare($query);
//            $statement->execute();
//            $employees = $statement;
//            /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg; */
            $employeeDB = new EmployeeDB();
            $employees = $employeeDB->getEmployee($employee_id);

//            $query2 = 'SELECT * FROM `customer` WHERE employeeID = :employeeID ' . 'ORDER by customerEmail';
//           
//            $statement2 = $db->prepare($query2);
//            $statement2->bindValue(":employeeID", $employee_id);
//            $statement2->execute();
//            $customers = $statement2;
            $customerDB = new CustomerDB();
            $customers = $customerDB->getCustomer($employee_id);
            
            

?>

<!DOCTYPE html>
<!--

Original Author:Derek Dombek
Date Created:08-22-19
Version:contact layout
Date Last Modified:09-06-19
Modified by:Derek Dombek
Modification log:added social media icons, made a new contact form with bootstrap.
 
-->
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta name="description" content="Enjoy the best fishing with the Best Fishing Guide in the country!">
<meta name="keywords" content="Fishing Guide, Fishing Tours, Marlin, Snook, Hog Fish, Mahi Mahi, Jack, Tarpon, King Fish, Stuart, Jensen Beach, South Florida">
<meta name="author" content="Derek Dombek">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact</title>
<!--===============================================================================================-->

<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->



<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/hamburger.css">
<link rel="stylesheet" href="css/contact.css">
<link rel="stylesheet" href="css/menuAnimate.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="images/site.webmanifest">

	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
        
    <header class="topbar"> 
       <!--social media layout-->
            <div class="mediaContainer">
                    
                    
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                </div>
        <a href="weekOneProject.html"><img src="images/bobfishinglogo.png" class="mainlogo" alt="icon logo"></a>
<!-- below I created a div to keep the hamburger on the same bar as the desktop nav bar-->
        <div class="blue-bar">
            <nav class="hamburger-horizontal">   
            <a id="hamburger" href="#" ><img src="images/navicon.png" alt="menu image"></a>
                <ul class="sub-menu">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="tours.html">Tours</a></li>
                    <li><a href="about.html">About Bob</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="login.php">Admin</a></li>
                </ul>
            </nav>
            <nav class="main-menu" id="animateMenu">  
                <ul >
                    <li><a href="index.html">Home</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="about.html">About Bob</a></li>
                    <li><a href="tours.html">Tours</a></li>
                    <li><a href="login.php">Admin</a></li>
                </ul>
            </nav>  
        </div>
    </header>
    <article>
            <header>
                    <?php foreach ($employees as $employee) : ?>
                <li><a href="admin.php?employee_id=<?php echo $employee['employeeID']; ?>">
                    <?php echo $employee['firstName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
            </header>
        </article>

    <article>
            <header>
                    
                  <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th >Package    </th>
                <th >Message</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer['customerName']; ?></td>
                <td><?php echo $customer['customerEmail']; ?></td>
                <td class="right"><?php echo $customer['customerDropDown']; ?></td>
                <td><?php echo $customer['customerMsg']; ?></td>
                <td><form action="delete_product.php" method="post">
                    <input type="hidden" name="customer_id"
                           value="<?php echo $customer['customerID']; ?>">
                    <input type="hidden" name="employee_id"
                           value="<?php echo $customer['employeeID']; ?>">
                   
                    <input type="submit" value="Delete" name="employee_id">
                            
                    
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
            </header>
        </article>

       



    <footer>
        <p>
            <a href="tel:17723331777">(772) 333-1777</a><br/>
            <a href="mailto:Bobsfishing9@gmail.com">Bobsfishing@gmail.com</a><br/><br/>
            <span style="color:rgb(226, 134, 59);">2019</span> &copy; <a href="index.html" class="copyright">Bob's Fishing Tours</a>. All Rights Reserved.
        </p>
    </footer>

</body>
</html>
