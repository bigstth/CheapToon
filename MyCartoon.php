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
                        <li class="nav-item active">
                        <a class="nav-link" href="MyCartoon.php"><i class="fas fa-book-open"></i> หนังสือการ์ตูนของฉัน<span
                                class="sr-only">(current)</span></a>
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
                    </li><?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Contact.php"><i class="fas fa-comment-dots"></i> ติดต่อเรา</a>
                    </li>

                    <?php if($_SESSION['name']=='admin'){ ?>
                        <li class="nav-item">
                        <a class="nav-link">|</a>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/admin"><i class="fas fa-cogs"></i> จัดการเว็บไซต์</a>
                    </li><?php } ?>
                </ul>

            </div>
        </div>
    </nav>
    <div class="container"><h3>หนังสือการ์ตูนของฉัน</h3>
        <div class="row col-12">

        <?php 
        if(isset($_SESSION['id'])){
            $id=$_SESSION['id'];
        $sql ="SELECT * FROM product WHERE userID=$id ORDER BY id DESC";
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
                        <button type="button" class="btn btn-warning btn-lg btn-block btn-sm"
                            data-toggle="modal" data-target="#<?php echo $array['modalcode'];?>" data-whatever="@<?php echo $array['modalcode'];?>">แก้ไขข้อมูล</button>
                        <a href="delete.php?id=<?php echo $array['id'];?>" class="btn btn-danger btn-lg btn-block btn-sm" name="delete">ลบหนังสือ</a>
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
                                    <form action="Edit.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <label for="id" class="col-form-label">รหัสโพสต์</label>
                                        <input type="text" class="form-control" name="id" id="id" value="<?php echo $array['id'];?>"readonly required>
                                    </div>
                                    <div class="form-group">
                                    <label for="name" class="col-form-label">ชื่อหนังสือ</label>
                                        <input type="text" class="form-control" name="bookname" id="bookname" maxlength="50" value="<?php echo $array['name'];?>" required>
                                    </div>
                                        <div class="form-group">
                                            <label for="cartoon-detail" class="col-form-label">
                                            <label for="describe" class="col-form-label">รายละเอียด</label>
                                            </label>
                                            <textarea class="form-control" name="des" maxlength="700" required><?php echo $array['describe'];?> </textarea>
                                            <p>
                                            <label for="category" class="col-form-label">หมวดหมู่</label> <input class="form-control" list="category"placeholder="เลือกหมวดหมู่" name="category" required  >
                                             <datalist id="category">
                                                     <option value="ผจญภัย">
                                                     <option value="ต่อสู้">
                                                    <option value="ความรัก">
                                                    <option value="ดราม่า">
                                            </datalist>
                                            </p>

                                            <div class="form-group  col-lg-3">
                                        <label for="price" class="col-form-label">ราคา</label>
                                        <input type="text" class="form-control" maxlength="7" name="price" id="price"value="<?php echo $array['price'];?>" required>
                                    </div>
                                          
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                <input type="submit" class="btn btn-success" name="edit" value="แก้ไขข้อมูลหนังสือ">
                                        </div>
                                    </div></form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }}
        else{
            echo "<script langquage='javascript'>
    alert('กรุณาเข้าสู่ระบบ');
    window.location='index.php';
    </script>";
        }
        ?>


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