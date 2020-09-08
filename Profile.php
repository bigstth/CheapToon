<?php 
include 'header.php';


?>
    <nav id="za2" class="navbar navbar-expand-lg navbar-dark sticky-top" style="background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(48,48,48,1) 65%, rgba(75,75,75,1) 100%);
  ">
        <div class="container">
            <a class="navbar-brand" href="index.php">Cheaptoon</a>
            <button class="navbar-toggler navbar-toggler-right bg-primary text-white rounded" type="button"
                data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar navbar-default collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-home"></i> หน้าหลัก </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link">|</a>
                    </li>

                   
                    <?php if(isset($_SESSION['id'])){ ?>
                        <li class="nav-item">
                        <a class="nav-link" href="MyCartoon.php"><i class="fas fa-book-open"></i> หนังสือการ์ตูนของฉัน</a>
                    </li>

                   
                    <li class="nav-item">
                        <a class="nav-link">|</a>
                    </li><?php if($_SESSION['name']=='admin'){ ?>

                    <li class="nav-item">
                    <a class="nav-link" href="/admin"><i class="fas fa-cogs"></i> จัดการเว็บไซต์</a>
                    </li>
                    
                    <li class="nav-item">
                    <a class="nav-link">|</a>
                    </li>
                     <?php }}
                     else{
                        echo "<script langquage='javascript'>
                        alert('กรุณาเข้าสู่ระบบ');
                        window.location='index.php';
                        </script>";
                     } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Contact.php"><i class="fas fa-comment-dots"></i> ติดต่อเรา</a>
                    </li>

                   
                      
                </ul>

            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row col-lg-8 col-sm-6" style="margin-top:20px;">

        <?php 
        if(isset($_SESSION['id'])){ 
            $id=$_SESSION['id'];
            $sql ="SELECT * FROM user WHERE id=$id";
            $sqlresult = mysqli_query($conn,$sql);
            $god=mysqli_fetch_assoc ($sqlresult);
            ?>
            
       <div class="container jumbotron" style="background-color:#EFEFEF;">
        <form action="EditProfile.php" method="POST" enctype="multipart/form-data">
        <div class="form-group row" style="padding-left:80px;">
  <div class="col-xs-2">
    <label for="id">รหัสผู้ใช้</label>
    <input type="text" class="form-control" name="id" id="id" value="<?php echo $_SESSION['id'];?>"readonly required>
  </div>&nbsp;&nbsp;
  <div class="col-xs-3">
    <label for="name">ชื่อผู้ใช้</label>
    <input type="text" class="form-control" name="name" id="name" value="<?php echo $_SESSION['name'];?>"readonly required>
  </div>
</div>

  <div class="form-group">
  <div class="col-xs-2">
    <label for="realname">ชื่อ-นามสกุล</label>
    <input type="text" class="form-control" name="realname" id="realname" value="<?php echo $god['realname'];?>" required>
  </div>&nbsp;&nbsp;
  <div class="col-xs-3">
    <label for="email">อีเมล</label>
    <input type="email" class="form-control" name="email" id="email" value="<?php echo $god['email'];?>" required>
  </div>
  <div class="col-xs-3">
    <label for="tel">เบอร์โทรศัพท์</label>
    <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $god['tel'];?>" required>
  </div>
  <div class="col-xs-3">
    <label for="facebookUrl">ลิงค์เฟสบุ้ค</label>
    <input type="text" class="form-control" name="facebookUrl" id="facebookUrl" value="<?php echo $god['facebookUrl'];?>" required>
  </div>
</div>
 <input type="submit" name="updateprofile" value="บันทึกข้อมูล" class="btn btn-success">
       </form>
    <?php }?>
    </div>
            </div>
            <div class="foot">
                <footer>
                    <p>Copyright © 2019 Big</p>
                </footer>
    </div>

<?php include 'modalAdd.php' ?>

                <script>
        function readURL(input){
            if(input.files[0]){
                var reader = new FileReader();
                $('.figure').addClass('d-block');
                reader.onload = function (e) {
                    console.log(e.target.result)
                    $('#imgUpload').attr('src',e.target.result).width(240);
                }  
                reader.readAsDataURL(input.files[0]);
            }         
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>