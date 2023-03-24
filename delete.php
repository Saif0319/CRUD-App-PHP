<?php 
    require_once("./connect.php");

    $sql = "DELETE FROM Collections WHERE id = :id";
    
    //prepare the statement
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":id", $_GET["id"], PDO::PARAM_INT);

    $stmt->execute();

    header("Location: ./index.php");
?>