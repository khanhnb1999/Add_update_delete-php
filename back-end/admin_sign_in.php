<?php
require_once 'connect.php';
if(!isset($_SESSION['user_name'])) {
    header("Location: sign-in.php");
    die;
}


?>