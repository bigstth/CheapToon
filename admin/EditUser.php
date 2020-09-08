<?php session_start();
if(isset($_SESSION['id'])){
    if($_SESSION['name']=='admin'){

    ?>
<html lang="en">

<head>

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">

    <meta charset=" UTF-8 ">
    <title>Admin</title>
</head>

<body>
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="/admin">
            <h1>Cheaptoon</h1>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="paddingmenu">
                        <a href="/admin">
                            <i class="fas fa-tachometer-alt"></i>หน้าหลัก</a>
                    </li>
                    <li class="paddingmenu  bg-white">
                        <a href="manageUser.php">
                            <i class="fas fa-users"></i>จัดการสมาชิก</a>
                    </li>
                    <li class="paddingmenu">
                        <a href="manageCartoon.php">
                            <i class="fas fa-copy"></i>จัดการหนังสือการ์ตูน</a>
                    </li>
                  
                </ul>
            </nav>
        </div>
    </aside>

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid" style="margin-left:80%">
                    <div style="display:inline; margin-right:20px">
                       <?php echo $_SESSION['name']; ?>
                    </div>
                  
                    <a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0 ml-auto">ออกจากระบบ</a>
                </div>
            </div>
        </header>
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content paddingcontant">
<?php require("../connect.php"); 
$id=$_GET['ID'];
 $sql ="SELECT * FROM user where id=$id";
 $sqlresult = mysqli_query($conn,$sql);
 $userinfo = mysqli_fetch_assoc($sqlresult);?>

  <div class="container jumbotron" style="background-color:#EFEFEF;">
  <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group row" style="padding-left:80px;">
  <div class="col-xs-2">
    <label for="id">รหัสผู้ใช้</label>
    <input type="text" class="form-control" name="id" id="id" value="<?php echo $userinfo['id'];?>"readonly required>
  </div>&nbsp;&nbsp;
  <div class="col-xs-3">
    <label for="name">ชื่อผู้ใช้</label>
    <input type="text" class="form-control" name="name" id="name" value="<?php echo $userinfo['name'];?>" required>
  </div>
</div>

  <div class="form-group">
  <div class="col-xs-2">
    <label for="realname">ชื่อ-นามสกุล</label>
    <input type="text" class="form-control" name="realname" id="realname" value="<?php echo $userinfo['realname'];?>" required>
  </div>&nbsp;&nbsp;
  <div class="col-xs-3">
    <label for="email">อีเมล</label>
    <input type="email" class="form-control" name="email" id="email" value="<?php echo $userinfo['email'];?>" required>
  </div>
  <div class="col-xs-3">
    <label for="tel">เบอร์โทรศัพท์</label>
    <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $userinfo['tel'];?>" required>
  </div>
  <div class="col-xs-3">
    <label for="facebookUrl">ลิงค์เฟสบุ้ค</label>
    <input type="text" class="form-control" name="facebookUrl" id="facebookUrl" value="<?php echo $userinfo['facebookUrl'];?>" required>
  </div>
</div>
<a href="manageUser.php" class="btn btn-danger">ย้อนกลับ</a>
 <input type="submit" name="updateprofile" value="บันทึกข้อมูล" class="btn btn-success">
       </form>
  </div>

  </div>
   
</body>

</html>  <?php }} 

else{
    echo "<script langquage='javascript'>
    alert('กรุณาเข้าสู่ระบบ');
    window.location='../index.php';
    </script>";
}
if(isset($_POST['updateprofile'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $realname= $_POST['realname'];
  $tel = $_POST['tel'];
  $email = $_POST['email'];
  $fb = $_POST['facebookUrl'];
  $sql = "UPDATE user
  SET name='$name',realname='$realname',tel='$tel',`email`='$email',`facebookUrl`='$fb'
  WHERE id=$id";
   $result = mysqli_query($conn,$sql);
             if($result){
              echo '<script> alert("แก้ไขข้อมูลเรียบร้อยแล้ว")</script>';
              echo '<script>window.location.replace("manageUser.php");</script>';
          }else{
              echo '<script> alert("ล้มเหลว")</script>';
              echo '<script>window.location.replace("manageUser.php");</script>';
          }
}
?>