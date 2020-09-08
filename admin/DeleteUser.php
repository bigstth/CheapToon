<meta charset="utf-8">
<?php  session_start();
    require '../connect.php';
  
    if(isset($_GET['ID'])){
        $id=$_GET['ID'];
        $sql = "DELETE from user WHERE `id`=$id";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo '<script> alert("ลบสมาชิกเรียบร้อยแล้ว")</script>';
            echo '<script>window.location.replace("manageUser.php");</script>';
        }else{
            echo '<script> alert("ล้มเหลว")</script>';
            echo '<script>window.location.replace("manageUser.php");</script>';
        }
    
    }