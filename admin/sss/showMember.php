<?php 
include 'adminHeader.php';


?>
    <nav id="za2" class="navbar navbar-expand-lg navbar-dark sticky-top" style="background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(48,48,48,1) 65%, rgba(75,75,75,1) 100%);
  ">
        <div class="container">
            <a class="navbar-brand" href="/index.php">Cheaptoon</a>
            <button class="navbar-toggler navbar-toggler-right bg-primary text-white rounded" type="button"
                data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar navbar-default collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> หน้าหลัก <span
                                class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link">|</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="ListCartoon.php"><i class="fas fa-book"></i> หนังสือการ์ตูนทั้งหมด</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">|</a>
                    </li>
                    <?php if(isset($_SESSION['id'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal"
                                        data-target="#addCartoon" data-whatever="@addCartoon"><i class="fas fa-store" ></i> ลงขายหนังสือการ์ตูน</a>
                                        
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link">|</a>
                    </li><?php } ?>
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
        $sql ="SELECT * FROM user";
        $sqlresult = mysqli_query($conn,$sql);
        while( $array = mysqli_fetch_array($sqlresult)){ 
           
            ?>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div id="za" class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $array['id'];?></h5>
                        <p class="card-text">ชื่อ: <?php echo $array['name'];?></p>
                        <p class="card-text">Email: <?php echo $array['email'];?></p>
                        <p class="card-text">Tel: <?php echo $array['tel'];?></p>
                        <button type="button" class="btn btn-outline-success btn-lg btn-block btn-sm"
                            data-toggle="modal" data-target="#<?php echo $array['modalcode'];?>" data-whatever="@<?php echo $array['modalcode'];?>">ดูรายละเอียด</button>
                            <button type="button" class="btn btn-outline-danger btn-lg btn-block btn-sm"
                            data-toggle="modal" data-target="#" data-whatever="@<?php echo $array['modalcode'];?>">ลบสมาชิก</button>

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
                                        <img class="card-img-top"  src="/upload/<?php echo $array['image'];?>"  alt="onepiece">
                                    
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
                                             $userinfo = fetch($conn,$user); 
                                             $row = $userinfo->fetch_assoc()?>
                                             
                                            <p>
                                                <h4>ข้อมูลผู้ลงขาย</h4>
                                                ไอดี: <?$userinfo['name']?> <br>
                                                เบอร์โทร: 0875989878 <br>
                                                อีเมลล์: Sak@gmail.com <br>
                                                เฟสบุ้ค: <a href="https://fb.com/sitthi.thammawong"
                                                    target="blank">https://fb.com/sitthi.thammawong</a>

                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <a href="https://fb.com/sitthi.thammawong" class="btn btn-primary"
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

<?php include '/modalAdd.php' ?>

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
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>