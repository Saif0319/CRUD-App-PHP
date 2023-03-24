<?php 
    //Connect to the DB
    require_once("./connect.php");

    $sql = "SELECT id, name, description, value, country FROM Collections WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":id", $_GET["id"], PDO::PARAM_INT);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_OBJ);

    
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Collections</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <!-- Page Header -->
    <header class="bg-body-tertiary">
        <ul class="list-unstyled d-flex p-4">
            <li><a href="./" class="text-decoration-none mx-2 border py-2 px-3 ">Home</a></li>
            <li><a href="./new.php" class="text-decoration-none mx-2 border py-2 px-3 ">Create</a></li>
        </ul>
    </header>

    
    <main>
        <h1 class="m-4">Edit a Collection</h1>

        <form action="./update.php" method="post" class="w-25 m-4">

            <input type="hidden" name="id" value=<?= $row->id ?>>

            <!-- All inputs have the required attribute, all fields must be filled before submitting  -->
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control my-2" required value="<?= $row->name ?>">
            </div>

            <div>
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control my-2" required value="<?= $row->description ?>">
            </div>

            <!-- The input for value has a max val because the table only accepts DECIMAL(7,2)  -->
            <div>
                <label for="value">Value</label>
                <input type="number" step="0.01" min="0" max="99999.99" name="value" class="form-control my-2" required value="<?= $row->value ?>">
            </div>

            <div>
                <label for="country">Country</label>
                <input type="text" name="country" class="form-control my-2" required value="<?= $row->country ?>">
            </div>

            <button type="submit" class="btn btn-success my-3">Submit</button>
        </form>
    </main>
</body>
</html>