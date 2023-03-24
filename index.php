<?php 
    //Connect to the DB
    require_once("./connect.php");

    $sql = "SELECT id, name, description, value, country FROM Collections";

    $rows = [];

    if($conn) {
        $rows = $conn->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collections</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
        <h1 class="text-center mb-5">Collections</h1>
        <table class="table table-striped table-success text-center table-hover">

        <!-- Table head -->
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Value</th>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <!-- Table body -->
            <tbody class="table-group-divider">
                <!-- Outputting data from the DB -->
                <?php foreach($rows as $row): ?>
                    <tr>
                        <td class="p-3"> <?= $row->id ?> </td>
                        <td class="p-3"> <?= $row->name ?> </td>
                        <td class="p-3"> <?= $row->description ?> </td>
                        <td class="p-3"> <?= $row->value ?> </td>
                        <td class="p-3"> <?= $row->country ?> </td>
                        <td class="p-3">
                            <!-- Edit button -->
                            <a href="./edit.php?id=<?= $row->id ?>" class="text-decoration-none text-dark mx-2" >
                                <span class="material-symbols-outlined"> edit </span>
                            </a>

                            <!-- Delete button with protection -->
                            <a href="./delete.php?id=<?= $row->id ?>" class="text-decoration-none text-dark mx-2" onclick="return confirm('Are you sure want to delete <?= $row->name ?>?')">
                                <span class="material-symbols-outlined"> delete </span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
</body>
</html>