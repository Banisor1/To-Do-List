<?php
    try
    {
        $conectare = new PDO('mysql:host=localhost;dbname=to_do_list' , 'root' , '');
        $conectare -> setAttribute(PDO :: ATTR_ERRMODE , PDO :: ERRMODE_WARNING);
        echo "<h1>Hello!</h1>";
        
        echo "Database connection was successful!";
    }
    catch(PDOException $ex)
    {
        die('Database connection failed!');
        /// An issue occurred, please return to the main page
    }
?>
