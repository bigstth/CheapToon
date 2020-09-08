<meta charset="utf-8">
<?php  session_start();
    require 'connect.php';
  
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql = "DELETE from product WHERE `id`=$id";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo '<script> alert("ลบหนังสือการ์ตูนเรียบร้อยแล้ว")</script>';
            echo '<script>window.location.replace("MyCartoon.php");</script>';
        }else{
            echo '<script> alert("ล้มเหลว")</script>';
            echo '<script>window.location.replace("MyCartoon.php");</script>';
        }
    
    }