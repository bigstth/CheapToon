<?php include 'header.php'; ?>
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
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal"
                                        data-target="#addCartoon" data-whatever="@addCartoon"><i class="fas fa-store" ></i> ลงขายหนังสือการ์ตูน</a>
                                        
                    </li>
                   
                   
                    <li class="nav-item">
                        <a class="nav-link">|</a>
                    </li><?php } ?>
                    <li class="nav-item  active">
                        <a class="nav-link " href="Contact.php"><i class="fas fa-comment-dots"></i> ติดต่อเรา<span
                                class="sr-only">(current)</span></a>
                    </li>

                    <?php 
                    if(isset($_SESSION['id'])){
                    if($_SESSION['name']=='admin'){ ?>
                        <li class="nav-item">
                        <a class="nav-link">|</a>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/admin"><i class="fas fa-cogs"></i> จัดการเว็บไซต์</a>
                    </li><?php }} ?>
                </ul>

            </div>
        </div>
    </nav>
    <div class="container" style="text-align:center;">
       

<h1>บริษัท: Cheaptoon  </h1><p>เบอร์โทร: 0871234567 </p><p>อีเมล: support@cheaptoon.co.th </p> <p>ที่อยู่: 9/1 หมู่ 1 Phahonyothin Rd, ตำบลคลองหนึ่ง อำเภอ คลองหลวง, จังหวัด ปทุมธานี 12120 </p>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30967.926683258822!2d100.62586311102142!3d14.018557521204034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x68e6a6a947f70fd1!2sThai+House+Bangkok+University+Rangsit!5e0!3m2!1sen!2sth!4v1556968003259!5m2!1sen!2sth" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

 <div class="foot">
                <footer>
                    <p>Copyright © 2019 Big</p>
                </footer>
            </div>
                
            </div>

            <?php include 'modalAdd.php' ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>