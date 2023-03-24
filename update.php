<?php 
    require_once("./connect.php");
    
    $sql = "UPDATE Collections SET 
        name = :name,
        description = :description,
        value = :value,
        country = :country
    WHERE id = :id";


    //prepare the statement
    $stmt = $conn->prepare($sql);

    //bind the parameters
    $stmt->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
    $stmt->bindParam(":description", $_POST["description"], PDO::PARAM_STR);
    $stmt->bindParam(":value", $_POST["value"], PDO::PARAM_STR);
    $stmt->bindParam(":country", $_POST["country"], PDO::PARAM_STR);
    
    $stmt->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
    
    $stmt->execute();

    //Redirect to home page
    header("Location: ./index.php");
?>