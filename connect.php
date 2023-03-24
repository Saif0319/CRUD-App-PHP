<?php 
    try {
        // DB we're usnig, host, port, DB name
        $dsn = "mysql:host=localhost;port=3308;dbname=assignment2";

        //dsn username, pass
        $conn = new PDO($dsn, "root", "");

        //Turning on error mode
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }

    catch (PDOException $error) {
        echo $error->getMessage();
        $conn = false;
    }
?>