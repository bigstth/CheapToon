<?php if(isset($_SESSION['id'])) {?>
<div class="modal fade" id="addCartoon" tabindex="-1" role="dialog" aria-labelledby="addCartoon"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addcartoon">ลงขายหนังสือการ์ตูน</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="Post.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                        <label for="name" class="col-form-label">ชื่อหนังสือ</label>
                                        <input type="text" class="form-control" name="bookname" id="bookname" maxlength="50" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="describe" class="col-form-label">รายละเอียด</label>
                                        <textarea class="form-control" name="describe" id="describe"  maxlength="700" required></textarea>
                                   
                                    </div>
                                    <div class="form-group ">
                                        <label for="style" class="col-form-label">หมวดหมู่</label>
                                        <input list="category"class="form-control" name="category" placeholder="กรุณาเลือกหมวดหมู่"required>
                                             <datalist id="category">
                                                     <option value="ผจญภัย">
                                                     <option value="ต่อสู้">
                                                    <option value="ความรัก">
                                                    <option value="ดราม่า">
                                            </datalist>
                                    </div>
                                    <div class="form-group  col-lg-3">
                                        <label for="price" class="col-form-label">ราคา</label>
                                        <input type="text" class="form-control" name="price" maxlength="7" id="price" required>
                                    </div>
                                    <div class="form-group">
                                <label for="fileUpload" class="col-form-label">อัพโหลดภาพตัวอย่าง</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="fileUpload" name="fileUpload" onchange="readURL(this)">
                                </div>      <figure class="figure text-center d-none">
                                <img id="imgUpload" class="figure-img img-fluid rounded" alt="">
                            </figure>
                            </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                <input type="submit" class="btn btn-success" name="upload" value="ลงขายหนังสือการ์ตูน">
                            </div>
                            </form>
                           
                        </div>
                    </div>
                </div>

<?php }?>