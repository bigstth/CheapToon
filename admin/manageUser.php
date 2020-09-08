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
<!--Table-->
<table id="tablePreview" class="table table-light table-hover table-bordered ">
<!--Table head-->
<?php require("../connect.php"); 
 $sql ="SELECT * FROM user";
 $sqlresult = mysqli_query($conn,$sql);?>
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>ชื่อผู้ใช้</th>
      <th>ชื่อ-นามสกุล</th>
      <th>อีเมล</th>
      <th>เบอร์โทร</th>
      <th>ลิงค์เฟสบุ้ค</th>

      <th>แก้ไขข้อมูล</th>
      <th>ลบ</th>
     
    </tr>
  </thead>
  <!--Table head-->
  <!--Table body-->
  <tbody>
  <?php while($array = mysqli_fetch_array($sqlresult)){ 
    echo "<tr>";
    echo "<td>".$array['id']."</td>";
    echo "<td>".$array['name']."</td>";
    echo "<td>".$array['realname']."</td>";
    echo "<td>".$array['email']."</td>";
    echo "<td>".$array['tel']."</td>";
    echo "<td>".$array['facebookUrl']."</td>";
    echo "<td>  <a href='EditUser.php?ID=".$array['id']."' class='btn btn-warning'>แก้ไข</a></td>";
    echo "<td>  <a href='DeleteUser.php?ID=".$array['id']."' class='btn btn-danger'>ลบ</a></td>";
    echo "</tr>";}?>
   
  </tbody>
  <!--Table body-->
</table>
<!--Table-->
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

</html>  <?php }} 

else{
    echo "<script langquage='javascript'>
    alert('กรุณาเข้าสู่ระบบ');
    window.location='../index.php';
    </script>";
}?>