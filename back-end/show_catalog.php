<?php

require_once 'connect.php';
$sql = "SELECT * FROM catalogs";
$stmt = $conn->prepare($sql);
$stmt->execute();
$catalog = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <style>
    .info__product {
        width: 400px;
        margin: 30px auto;
    }

    .add_product {
        margin: 4px 920px;
    }
    </style>
    <title>Show products</title>
</head>

<body>
    <div class="product__info">
        <div class="title__product text-center text-danger ">
            <h3 style="font-size:50px">LIST CATALOGS</h3>
        </div>
        <div class="add_product">
            <a href="add_catalog.php" class="btn btn-success" style="width:150px">Add</a>
        </div>
        <div class="info__product">
            <table class="table table-bordered text-center">
                <tr class="table-success">
                    <th>ID</th>
                    <th>Catalog_Name</th>
                    <th class="text-center">Actions</th>
                </tr>
                <?php foreach ($catalog as $value) : ?>
                <tr class="table-primary text-center">
                    <td><?=$value['catalog_id']?></td>
                    <td><?=$value['catalog_name']?></td>
                    <td class="text-center ">
                        <a href="update_catalog.php?catalog_id=<?= $value['catalog_id'] ?>"
                            class="btn btn-primary me-1">Update</a>
                        <a href="delete_catalog.php?catalog_id=<?= $value['catalog_id'] ?>"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>