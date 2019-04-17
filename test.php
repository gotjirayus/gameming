<?php
            include_once('connect.php');

            if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $conn->real_escape_string ($_POST['password']);
            
            $sql = "SELECT * FROM `member` WHERE `username` = '".$username."' AND `password` = '".$password."'";
            $result = $conn->query($sql);

            if ($result->num_rows> 0){
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['idmember'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['level']=$row['lv'];
              
                
                header('location:index.php');

                echo $row['name'];
        
        
        }else{
                echo '<script>alert("กรุณากรอกชื่อผู้ใช้และรหัสผ่านให้ถูกต้อง")</script>';
            }





            }
        ?>