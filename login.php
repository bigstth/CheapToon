<?php
session_start();
require("connect.php");
if (isset($_POST['login']))  {
                     $username =  $conn->real_escape_string($_POST['username']);
                     $password = $conn->real_escape_string($_POST['password']);
                     $sqllogin = "SELECT * FROM `user` WHERE `name` = '".$username."' AND `password` = '".$password."'";
                     $result = $conn->query($sqllogin);
                     if($result->num_rows > 0){
                        $row = $result->fetch_assoc();
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['name'] = $row['name'];
                        if(strcmp($username, "admin") == 0) {
                          echo "<script langquage='javascript'>window.location='admin/index.php';</script>";
                        }
                        else {
                          echo "<script langquage='javascript'>window.location='index.php';</script>";
                        }
                    }else{
                        echo "<script langquage='javascript'>alert('รหัสผ่านไม่ถูกต้อง'); window.location='index.php';</script>";
                        
                      } 
                    }
                    ?>