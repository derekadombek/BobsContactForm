<!--

Original Author:Derek Dombek
Date Created:02-07-20
Version:initial database function page
Date Last Modified:02-10-20
Modified by:Derek Dombek
Modification log: 
                -02-10-20-added catches for when database has issues.
                  
-->
<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=bobscontact';
    private static $username = 'root';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                //$error_message = $e->getMessage();
                $error_message =" We're experiencing technical difficulties, please try again later.";
                include('./errors/database_error.php');
                
                //return $error_message;
                exit();
            }
        }
        return self::$db;
    }
}
?>
