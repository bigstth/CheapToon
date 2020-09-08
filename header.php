<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">


    <title>Cheaptoon แหล่งรวมหนังสือการ์ตูนมือสอง</title>
    <style>
    /* width */
    ::-webkit-scrollbar {
        width: 8px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: rgb(110, 110, 110);
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: rgb(185, 185, 185);
    }
    </style>
    <link rel="icon" href="favicon.png" type="image/png">
    <?php
    require("connect.php");
    
?>
</head>

<body>
<div id="bgheader">
        <div class="container">
            <div class="row">
                <div class="header col-lg-6" id="logo">
                    <img src="img/logo.png" alt="onepiece">
                    <p>แหล่งรวมหนังสือการ์ตูนมือสอง</p>
                </div>
                <div class="row col-lg-12 d-flex justify-content-end">
                    <div class="d-flex align-items-end">
                        <div class="jumbotron" id="idbox">
                            <div class="form-row">
                                <div class="col">
                                <?php if(isset($_SESSION['id'])){ ?> 
                                   <p style="color:white;"> ยินดีต้อนรับ คุณ <?php echo $_SESSION['name']; ?>  <a href="Profile.php" class="btn btn-success">ข้อมูลส่วนตัว</a> <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a></p>
                                    <?php }else{?>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#login" data-whatever="@login">เข้าสู่ระบบ</button>&nbsp;&nbsp;
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#register" data-whatever="@register">สมัครสมาชิก</button>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
                <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="login">เข้าสู่ระบบ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="login.php" method="POST">
                                <div class="form-group">
                                        <label for="username" class="col-form-label">ชื่อผู้ใช้:</label>
                                        <input type="text" class="form-control" name="username" id="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-form-label">รหัสผ่าน:</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                <input type="submit" class="btn btn-success" name="login" value="เข้าสู่ระบบ">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

               
                <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="register"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="register">สมัครสมาชิก</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <?php
      
        if(isset($_POST['submit'])){
           
            
                $sql = "INSERT INTO `user` (`id`, `name`, `password`, `email`, `tel`, `facebookUrl`,`realname`) 
                        VALUES (NULL, '".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', '".$_POST['tel']."', '".$_POST['facebook']."','".$_POST['realname']."');";
                $result = $conn->query($sql);
               
                if($result){
                    echo '<script> alert("สมัครสมาชิกสำเร็จ");</script>';
                    echo '<script> window.location="index.php";</script>';
                }else{
                    echo 'no';
                    echo '<script> alert("ล้มเหลว");</script>';
                }
            }
        
    ?>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="username" class="col-form-label">ชื่อผู้ใช้:</label>
                                        <input type="text" class="form-control" name="username" id="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-form-label">รหัสผ่าน:</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="realname" class="col-form-label">ชื่อ-นามสกุล:</label>
                                        <input type="text" class="form-control" name="realname" id="realname" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-form-label">อีเมลล์:</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="tel" class="col-form-label">เบอร์โทร:</label>
                                        <input type="tel" class="form-control" name="tel" id="tel" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="facebook" class="col-form-label">ลิ้งค์เฟสบุ้ค:</label>
                                        <input type="facebook" class="form-control" name="facebook" id="facebook" required>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                <input type="submit" class="btn btn-success" name="submit" value="สมัครสมาชิก">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>