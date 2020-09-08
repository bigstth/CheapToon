<?php
$conn = new mysqli('localhost','root','','cheaptoon');

if (mysqli_connect_errno()) {
    printf("การเชื่อมต่อฐานข้อมูลล้มเหลว");
    exit();
}

mysqli_query($conn, "SET NAMES UTF8");

?>