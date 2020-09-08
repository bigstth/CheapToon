<meta charset="utf-8">
<?php  session_start();
    require 'connect.php';
    $id = $_POST['id'];
    $name = $_POST['bookname'];
    $describe= mysqli_real_escape_string($conn,$_POST['des']);
    $category = $_POST['category'];
    $price = $_POST['price'];
                            if(isset($_POST['edit'])){
                           
                                    $sql = "UPDATE product
                                    SET name='$name',category='$category',price='$price',`describe`='$describe'
                                    WHERE id=$id";
                                   
                                    $result = mysqli_query($conn,$sql);
                                    if($result){
                                        echo '<script> alert("แก้ไขข้อมูลเรียบร้อยแล้ว")</script>';
                                        echo '<script>window.location.replace("MyCartoon.php");</script>';
                                    }else{
                                        echo '<script> alert("ล้มเหลว")</script>';
                                        echo '<script>window.location.replace("MyCartoon.php");</script>';
                                    }
                                }
                            
                        ?>