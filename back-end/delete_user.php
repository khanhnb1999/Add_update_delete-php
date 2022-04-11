<?php

require_once 'connect.php';

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $sql = "DELETE  FROM users WHERE user_id='$user_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: show_user.php");
}


?>