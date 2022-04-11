<?php

require_once 'connect.php';
$sql = "SELECT * FROM users";

if(isset($_POST['btn_submit'])) {
    $user_name = $_POST['user_name'];
    if(empty($user_name) || strlen($user_name) > 30) {
        $message['user_name'] = "Bạn phải nhập username và độ dài không quá 30 kí tự";
    }
    else {
        $sql = "SELECT * FROM users WHERE user_name LIKE '%$user_name%'";
    }
}

$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
    .user__info {
        width: auto;
        height: auto;
        margin: 20px 100px;
    }

    .tab__search {
        background-color: aliceblue;
        width: 400px;
        height: auto;
        padding: 20px;
        margin: 30px 100px;
    }
    </style>
    <title>Show products</title>
</head>

<body>
    <div class="tab__search">
        <h2 class="mx-5">Search user</h2>
        <div class="search_user d-flex">
            <form action="search_user.php" method="post" class="d-flex align-items-center ">
                <div class="search_user--input ">
                    <input type="text" name="user_name" class="form-control" placeholder="Search username">
                    <span style="color:red">
                        <?= isset($message['user_name']) ? $message['user_name'] : "" ?>
                    </span>
                </div>
                <div class="search_user--send">
                    <button type="submit" name="btn_submit" class="btn btn-primary mx-3">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="user__info">
        <div class="title__user text-center text-danger ">
            <h3 style="font-size:50px">LIST USER</h3>
        </div>
        <div class="info__user">
            <table class="table table-bordered text-center">
                <tr class="table-success">
                    <th>ID</th>
                    <th>User_name</th>
                    <th>User_email</th>
                    <th>User_password</th>
                    <th>User_address</th>
                    <th class="text-center">Actions</th>
                </tr>
                <?php foreach ($user as $value) : ?>
                <tr class="table-primary text-center">
                    <td><?=$value['user_id']?></td>
                    <td><?=$value['user_name']?></td>
                    <td><?=$value['user_email']?></td>
                    <td><?=$value['user_password']?></td>
                    <td><?=$value['user_address']?></td>
                    <td class="text-center ">
                        <a href="update_user.php?user_id=<?= $value['user_id'] ?>"
                            class="btn btn-primary me-1">Update</a>
                        <a href="delete_user.php?user_id=<?= $value['user_id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>