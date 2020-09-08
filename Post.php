<?php  session_start();
    require 'connect.php';
                            function generateRandomString($length = 10) {
                                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $charactersLength = strlen($characters);
                                $randomString = '';
                                for ($i = 0; $i < $length; $i++) {
                                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                                }
                                return $randomString;
                            }
                            $modalcode=generateRandomString();
                                
                            if(isset($_POST['upload'])){
                              
                                $temp = explode('.',$_FILES['fileUpload']['name']);
                                $new_name = round(microtime(true)) . '.' . end($temp);
                                
                                if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'upload/' .$new_name)){
                                   
                                    $sql = "INSERT INTO `product` (`id`, `name`, `image`, `describe`, `category`, `price`, `userID`, `modalcode`) 
                                            VALUES (NULL, '".$_POST['bookname']."', '". $new_name."', '".$_POST['describe']."', '".$_POST['category']."', '".$_POST['price']."', '".$_SESSION['id']."', '". $modalcode."');";
                                    $result = $conn->query($sql);
                                               
                                    if($result){
                                        echo '<script> alert("ลงขายหนังสือการ์ตูนเรียบร้อยแล้ว")</script>';
                                        echo '<script>window.location.replace("MyCartoon.php");</script>';
                                    }else{
                                        echo '<script> alert("ล้มเหลว")</script>';
                                        echo '<script>window.location.replace("MyCartoon.php");</script>';
                                    }
                                }
                            }
                        ?>