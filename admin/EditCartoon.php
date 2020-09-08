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
                    <li class="paddingmenu">
                        <a href="manageUser.php">
                            <i class="fas fa-users"></i>จัดการสมาชิก</a>
                    </li>
                    <li class="paddingmenu bg-white">
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
 $sql ="SELECT * FROM product where id=$id";
 $sqlresult = mysqli_query($conn,$sql);
 $userinfo = mysqli_fetch_assoc($sqlresult);?>

  <div class="container jumbotron" style="background-color:#EFEFEF;">
  
  <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group row" style="padding-left:80px;">
  <div class="col-xs-2">
    <label for="id">รหัสผู้ใช้</label>
    <input type="text" class="form-control" name="id" id="id" value="<?php echo $userinfo['id'];?>"readonly required>
  </div>&nbsp;&nbsp;

  <div class="col-xs-2">
    <label for="name">ชื่อหนังสือ</label>
    <input type="text" class="form-control" name="name" id="name" value="<?php echo $userinfo['name'];?>" required>
  </div>
  &nbsp;&nbsp;

  <div class="col-xs-2">
    <label for="style" >หมวดหมู่</label>
                                        <input list="category"class="form-control" name="category" placeholder="กรุณาเลือกหมวดหมู่" required>
                                             <datalist id="category">
                                                     <option value="ผจญภัย">
                                                     <option value="ต่อสู้">
                                                    <option value="ความรัก">
                                                    <option value="ดราม่า">
                                            </datalist>
  </div>&nbsp;&nbsp;
  <div class="col-xs-2">
    <label for="price">ราคา</label>
    <input type="text" class="form-control" name="price" id="price" value="<?php echo $userinfo['price'];?>" required>
  </div>
</div>  <label for="describe" class="col-form-label">รายละเอียด</label>
                                        <textarea class="form-control" name="describe" id="describe"  maxlength="700" required><?php echo $userinfo['describe'];?></textarea>  
<div style="text-align:center;">
<a href="manageCartoon.php" class="btn btn-danger">ย้อนกลับ</a>
 <input type="submit" name="updatetoon" value="บันทึกข้อมูล" class="btn btn-success"></div>
       </form>
  
   
</body>

</html>    <?php }} 

else{
    echo "<script langquage='javascript'>
    alert('กรุณาเข้าสู่ระบบ');
    window.location='../index.php';
    </script>";
}
if(isset($_POST['updatetoon'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $describe= mysqli_real_escape_string($conn,$_POST['describe']);
    $category = $_POST['category'];
    $price = $_POST['price'];
    $sql = "UPDATE product
    SET name='$name',category='$category',price='$price',`describe`='$describe'
    WHERE id=$id";
     $result = mysqli_query($conn,$sql);
               if($result){
                echo '<script> alert("แก้ไขข้อมูลเรียบร้อยแล้ว")</script>';
                echo '<script>window.location.replace("manageCartoon.php");</script>';
            }else{
                echo '<script> alert("ล้มเหลว")</script>';
                echo '<script>window.location.replace("manageCartoon.php");</script>';
            }
}

?>