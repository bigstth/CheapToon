<meta charset="utf-8">
<?php  session_start();
    require 'connect.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $realname = $_POST['realname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $facebookUrl = $_POST['facebookUrl'];
                            if(isset($_POST['updateprofile'])){
                           
                                    $sql = "UPDATE user
                                    SET realname='$realname',email='$email',tel='$tel',`facebookUrl`='$facebookUrl'
                                    WHERE id=$id";
                                   
                                    $result = mysqli_query($conn,$sql);
                                    if($result){
                                        echo '<script> alert("แก้ไขข้อมูลเรียบร้อยแล้ว")</script>';
                                        echo '<script>window.location.replace("Profile.php");</script>';
                                    }else{
                                        echo '<script> alert("ล้มเหลว")</script>';
                                        echo '<script>window.location.replace("Profile.php");</script>';
                                    }
                                }
                            
                        ?>