<?php

$username = "root";
$password = "";
$host = "localhost";
$dbname = "final-php";

try{
    $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    //echo "Kết nối dữ liệu thành công";
} catch(PDOException $e) {
    echo "Lỗi kết nối" . $e->getMessage();
}  
?>