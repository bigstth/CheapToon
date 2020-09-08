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
                    <li class="nav-item active">
                        <a class="nav-link" href="/"><i class="fas fa-home"></i> หน้าหลัก <span
                                class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link">|</a>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link  dropdown-toggle" href="#"id="categor" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-book"></i> หมวดหมู่</a>
                        <div class="dropdown-menu" aria-labelledby="categor">
                        <a class="dropdown-item" href="index.php?category=all">ทั้งหมด</a>
          <a class="dropdown-item" href="index.php?category=adventure">ผจญภัย</a>
          <a class="dropdown-item" href="index.php?category=action">ต่อสู้</a>
          <a class="dropdown-item" href="index.php?category=love">ความรัก</a>
          <a class="dropdown-item" href="index.php?category=drama">ดราม่า</a>
        </div>
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
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal"
                                        data-target="#addCartoon" data-whatever="@addCartoon"><i class="fas fa-store" ></i> ลงขายหนังสือการ์ตูน</a>
                                        
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
                     <?php }} ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Contact.php"><i class="fas fa-comment-dots"></i> ติดต่อเรา</a>
                    </li>

                   
                      
                </ul>

            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row col-12">

        <?php 
        if(isset($_GET['category'])){
            if ($_GET['category']=='all'){  $sql ="SELECT * FROM product order by id desc";}
            else if ($_GET['category']=='adventure'){  $sql ="SELECT * FROM product where category='ผจญภัย' order by id desc"; }
            else if ($_GET['category']=='action'){  $sql ="SELECT * FROM product where category='ต่อสู้' order by id desc"; }
            else if ($_GET['category']=='love'){  $sql ="SELECT * FROM product where category='ความรัก' order by id desc"; }
            else if ($_GET['category']=='drama'){  $sql ="SELECT * FROM product where category='ดราม่า' order by id desc"; }
        }
        else{
            $sql ="SELECT * FROM product order by id desc  ";
           
        }
        $sqlresult = mysqli_query($conn,$sql);
        while( $array = mysqli_fetch_array($sqlresult)){ 
        
            ?>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div id="za" class="card">
                    <a href="#" data-toggle="modal" data-target="#<?php echo $array['modalcode'];?>" data-whatever="@<?php echo $array['modalcode'];?>"> <img
                            class="card-img-top" src="upload/<?php echo $array['image'];?>" alt="onepiece" width="273px" height="222px"></a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $array['name'];?></h5>
                        <p class="card-text">ราคา <?php echo $array['price'];?> บาท</p>
                        <button type="button" class="btn btn-outline-success btn-lg btn-block btn-sm"
                            data-toggle="modal" data-target="#<?php echo $array['modalcode'];?>" data-whatever="@<?php echo $array['modalcode'];?>">ดูรายละเอียด</button>

                        <div class="modal fade" id="<?php echo $array['modalcode'];?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $array['modalcode'];?>"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detail"><?php echo $array['name'];?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="card-img-top"  src="upload/<?php echo $array['image'];?>"  alt="onepiece">
                                    
                                        <div class="form-group">
                                            <label for="cartoon-detail" class="col-form-label">
                                                <h3>รายละเอียด:</h3>
                                            </label>
                                            <p><?php echo $array['describe'];?></p>
                                            <p>
                                                <h3>หมวดหมู่:</h3> <?php echo $array['category'];?>
                                            </p>

                                            <h3>ราคา:<?php echo $array['price'];?> บาท</h3>
                                            <hr>
                                             <?php 
                                             $userid=$array['userID'];
                                             $user ="SELECT * FROM user where id = $userid";
                                             $userinfo = mysqli_query($conn,$user); 
                                             $row = $userinfo->fetch_assoc();?>
                                             
                                            <p>
                                                <h4>ข้อมูลผู้ลงขาย</h4>
                                                ชื่อ: <?php echo $row['realname'];?> <br>
                                                เบอร์โทร: <?php echo $row['tel'];?>  <br>
                                                อีเมลล์: <?php echo $row['email'];?>  <br>
                                                เฟสบุ้ค: <a href="<?php echo $row['facebookUrl'];?> "
                                                    target="blank"><?php echo $row['facebookUrl'];?> </a>

                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">ปิดหน้าต่าง</button>
                                            <a href="<?php echo $row['facebookUrl'];?>" class="btn btn-primary"
                                                target="blank">ติดต่อผู้ขายทางเฟสบุ้ค</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>


            <div class="foot">
                <footer>
                    <p>Copyright © 2019 Big</p>
                </footer>
            </div>
        </div>
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