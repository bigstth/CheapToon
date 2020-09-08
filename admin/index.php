<?php session_start();
if(isset($_SESSION['id'])){
    if($_SESSION['name']=='admin'){
require '../connect.php';
$sql ="SELECT * FROM user";
$sqlresult = mysqli_query($conn,$sql);
$sql2 ="SELECT * FROM product";
$sqlresult2 = mysqli_query($conn,$sql2);
    ?>
<html lang="en">

<head>
<meta charset="utf-8">
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
    <aside class="menu-sidebar">
        <div class="logo">
            <a href="/admin ">
                <h1>Cheaptoon</h1>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="paddingmenu bg-white">
                        <a href="/admin">
                            <i class="fas fa-tachometer-alt"></i>หน้าหลัก</a>
                    </li>
                    <li class="paddingmenu">
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
            <div class="mainborder" style="display:inline-block">
                <i class="fas fa-users"></i>
                <div style="color:black">จำนวนสมาชิก</div>
                <div class="mainbordersup">
                <?php echo mysqli_num_rows($sqlresult)." คน"; ?>
                </div>
            </div>
            <div class="mainborder" style="display:inline-block">
                <i class="fas fa-copy"></i>
                <div style="color:black">จำนวนหนังสือการ์ตูน</div>
                <div class="mainbordersup">
                <?php echo mysqli_num_rows($sqlresult2)." เล่ม"; ?>
                </div>
            </div>
        </div>

        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>
    <div class="footer">
        <footer>
            <p>Copyright © 2019 Top</p>
        </footer>
    </div>
</body>

</html>
<?php }else{
    echo "<script langquage='javascript'>
    alert('คุณไม่ใช่แอดมิน อย่ามา');
    window.location='../index.php';
    </script>";  
}} 

else{
    echo "<script langquage='javascript'>
    alert('กรุณาเข้าสู่ระบบ');
    window.location='../index.php';
    </script>";
}
?>