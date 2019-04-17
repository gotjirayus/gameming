<?php
    include_once('connect.php');
    session_start();
        $idSelect=$_GET["id"];
        $sql="SELECT * FROM member WHERE idmember = $idSelect";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $old_province =  $row['Proviance'];
        $old_amphur =  $row['District'];
        $old_tumbol =  $row['Subdistrict'];
        $old_postcode= $row['Postcode'];


       
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/regular.css" integrity="sha384-A/oR8MwZKeyJS+Y0tLZ16QIyje/AmPduwrvjeH6NLiLsp4cdE4uRJl8zobWXBm4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/brands.css" integrity="sha384-IiIL1/ODJBRTrDTFk/pW8j0DUI5/z9m1KYsTm/RjZTNV8RHLGZXkUDwgRRbbQ+Jh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="ajax.js" ></script>
    <title>Update</title>
  </head>
  <style>
      body {
        font-family: 'Mitr', sans-serif;
        font-size: 18px;
      }
    </style>
    <body onload="Add();">
   <!--StartNavbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><font  color="#00CD00">&nbsp;<i class="fas fa-gamepad"></i>TGP</font></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                     <a class="nav-link" href="index.php"><i class="fas fa-home"></i>&nbsp;หน้าแรก</a>
                 </li>
                <li class="nav-item active">
                    <a class="nav-link" href="product.php"><i class="fas fa-clipboard-list"></i>&nbsp;สินค้า</a>
                </li>
                <li class="nav-item active">
                <a class="nav-link " href="about.php"><i class="fas fa-street-view"></i>&nbsp;เกี่ยวกับเรา</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['id']))  {
                         if(trim($_SESSION['level'] == 1)){ ?>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-clipboard-check"></i>&nbsp;จัดการสินค้า
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="addproduct.php?id=<?php echo $_SESSION['id'];?>">เพิ่มสินค้า</a>
                            <a class="dropdown-item" href="delete.php">ลบสินค้า</a>
                            <a class="dropdown-item" href="stock.php">สต็อกสินค้า</a>
                            <a class="dropdown-item" href="check.php">ตรวจสอบการสั่งซื้อ</a>
                        </div>
                        <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>&nbsp;จัดการข้อมูลลูกค้า
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="view.php">ดูข้อมูลลูกค้า</a>
                        </div>
                        <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-id-badge"></i>&nbsp;สวัสดีคุณ  <?php  echo $_SESSION ['name']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <div class="dropdown-item"></div>
                            <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt">&nbsp;</i>ออกจากระบบ</a>
                        </div>
                        <?php } else { ?>
                            <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-id-badge"></i>&nbsp;สวัสดีคุณ  <?php  echo $_SESSION ['name']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="update.php?id=<?php echo $_SESSION['id'];?>"><i class="fas fa-pen-square"></i>&nbsp;ดู/แก้ไข/โปรไฟล์</a>
                            <a class="dropdown-item" href="promember.php?id=<?php echo $_SESSION['id'];?>"><i class="fas fa-clipboard-check"></i>&nbsp;ดูประวัติการสั่งซื้อ</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;ออกจากระบบ</a>
                        </div>
                        </li>
                            <li class="nav-item active">
                            <a class="nav-link" href="chart.php"><i class="fas fa-shopping-basket"></i>&nbsp;ตะกร้าสินค้า</a>
                            </li>
                        <?php }?>
                
                <?php  }else  { ?>
                    <li class="nav-item active">
                    <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i>&nbsp;เข้าสู่ระบบบ</a>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link" href="register.php"><i class="fas fa-user-plus"></i>&nbsp;สมัครสมาชิก</a>
                </li>
                <?php    } ?>
            </ul>
        </div>
    </div>
    </nav>
    <!--EndNavbar-->
       <?php

            if(isset($_POST['submit'])){
                 $name=$_POST['name'];
                 $lastname=$_POST['lastname'];
                 $username=$_POST['username'];
                 $password=$_POST['password'];
                 $tell=$_POST['tell'];
                 $birthday=$_POST['birthday'];
                 $email=$_POST['email'];
                 $residentialtype=$_POST['residentialtype'];
                 $nearby=$_POST['nearby'];
                 $building=$_POST['building'];
                 $number=$_POST['number'];
                 $room=$_POST['room'];
                 $class=$_POST['class'];
                 $road=$_POST['road'];
                 $soi=$_POST['soi'];
                 $Postcode=$_POST['Postcode'];
                 $Proviance=$_POST['Proviance'];
                 $District=$_POST['District'];
                 $Subdistrict=$_POST['Subdistrict'];
                 $_FILES['pic'];
              
                 $temp = explode('.',$_FILES['pic']['name']);
                 $newName = round(microtime(true)).'.'.end($temp);
                 //echo $newName;
                if(empty($_FILES['pic']['tmp_name'])){
                 
                
                
                
                $sql = "UPDATE  `member` SET `name`= '$name', `lastname`='$lastname', `username`='$username', `password`='$password', `tell`='$tell', `birthday`='$birthday', `email`='$email', `residentialtype`='$residentialtype',
                    `nearby`='$nearby', `building`='$building', `number`='$number', `room`='$room', `class`='$class', `road`='$road', `soi`='$soi', `Postcode`='$Postcode', `Proviance`='$Proviance', `District`='$District', `Subdistrict`='$Subdistrict'  WHERE idmember = $idSelect
                ";
                   }else{
                    move_uploaded_file($_FILES['pic']['tmp_name'],'uploads/'.$newName);
                    
                    $sql = "UPDATE  `member` SET `name`= '$name', `lastname`='$lastname', `username`='$username', `password`='$password', `tell`='$tell', `birthday`='$birthday', `email`='$email', `residentialtype`='$residentialtype',
                    `nearby`='$nearby', `building`='$building', `number`='$number', `room`='$room', `class`='$class', `road`='$road', `soi`='$soi', `Postcode`='$Postcode', `Proviance`='$Proviance', `District`='$District', `Subdistrict`='$Subdistrict',`pic`='$newName'  WHERE idmember = $idSelect
                ";
                   }
                $resul = $conn->query($sql);

                

                if($resul){
                    echo '<script>swal({
                        title: "เสร็จสิ้น",
                        text: "แก้ไขข้อมูลเรียบร้อยแล้ว",
                        icon: "success",
                        button: "ตกลง",
                      });</script>';
                    
                }else{
                    echo '<script>swal ( "ผิดพลาด" ,  "กรุณากรอกข้อมูลให้ถูกต้อง" ,  "error" )</script>';
                }
                   
            }
       ?>

       <!-- Start Form -->
       <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto mt-5">
                    <div class="card">
                    <form action="" method="post" enctype="multipart/form-data" >
                        <div class="card-header text-center"><h2>
                            แก้ไขข้อมูลส่วนตัว&nbsp;<i class="fas fa-edit"></i></h2>
                        </div>
                        <div class="card-body">
                             <!-- Start Form รูปภาพ-->
                             <div class="text-center">
                                <img id ="imgUpload" src="uploads/<?php echo $row['pic']?>" style="width:350px; heigth:350px;"  class="rounded-circle" alt="...">
                            </div>
                            <div class="form-group">

                                <input type="File" class="form-control-file" id="pic" name="pic" onchange="readURL(this)">
                            </div>
                            <!-- Start Form รูปภาพ-->
                            <!-- Start Form ข้อมูลส่วนตัว-->
                            <div class="row">
                                <div class="col">
                                    <label for="name" class="col-form-label">ชื่อ</label>
                                    <input type="text" class="form-control is-valid" required="required" id="name" name="name"  value="<?php echo $row['name']; ?>" >
                                </div>
                                <div class="col">
                                <label for="lastname" class="col-form-label">นามสกุล</label>
                                    <input type="text" class="form-control is-valid" required="required" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" >
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col">
                                    <label for="username" class="col-form-label">ชื่อผู้ใช้งาน</label>
                                    <input type="text" class="form-control is-valid" required="required" id="username"  name="username" value="<?php echo $row['username']; ?>">
                                </div>
                                <div class="col">
                                <label for="password" class="col-form-label">รหัสผ่าน</label>
                                    <input type="password" class="form-control is-valid" required="required" id="password" name="password" value="<?php echo $row['password']; ?>">
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col">
                                <label for="tell" class="col-form-label">เบอร์โทรศัพท์</label>
                                    <input type="tel" minlength="10" maxlength="10" pattern="[0-9]{10}" title="กรุณากรอกตัวเลข" class="form-control is-valid" id="tell" name="tell" placeholder="" value="<?php echo $row['tell']; ?>">
                                </div>
                                <div class="col">
                                <label for="birthday" class="col-form-label">วันเกิด</label>
                                    <input type="date" class="form-control is-valid" required="required" id="birthday" name="birthday" value="<?php echo $row['birthday']; ?>">
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col">
                                <label for="email" class="col-form-label">อีเมล</label>
                                    <input type="email" class="form-control is-valid" required="required" id="email" name="email" value="<?php echo $row['email']; ?>">
                                </div>
                            </div> 
                            <!-- End Form ข้อมูลส่วนตัว-->
                            

                            <!-- Start Form ที่อยู่ -->
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="residentialtype">ประเภทที่อยู่อาศัย</label>
                                    <select   class="form-control is-valid mr-sm-2" id="residentialtype" name="residentialtype" placeholder="" value="<?php echo $row['residentialtype']; ?>" required>
                                        <option selected><?php echo $row['residentialtype']; ?></option>
                                            <option value="บ้าน">บ้าน</option>
                                            <option value="คอนโด">คอนโด</option>
                                            <option value="อื่นๆ">อื่นๆ</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="nearby">สถานที่ใกล้เคียง</label>
                                        <input type="text" class="form-control is-valid"  id="nearby" name="nearby"  value="<?php echo $row['nearby']; ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="building">อาคาร/หมู่บ้าน</label>
                                        <input type="text" class="form-control is-valid"  id="building" name="building"  value="<?php echo $row['building']; ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="number">เลขที่</label>
                                    <input type="text" class="form-control is-valid"  id="number" name="number" value="<?php echo $row['number']; ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="room">ห้อง</label>
                                        <input type="text" class="form-control is-valid"  id="room" name="room" value="<?php echo $row['room']; ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="class">ชั้น</label>
                                        <input type="text" class="form-control is-valid"  id="class" name="class" value="<?php echo $row['class']; ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="road">ถนน</label>
                                    <input type="text" class="form-control is-valid"  id="road" name="road" value="<?php echo $row['road']; ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="soi">ซอย</label>
                                        <input type="text" class="form-control is-valid"  id="soi" name="soi" value="<?php echo $row['soi']; ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="province">จังหวัด</label>
                                    <select name="Proviance" id="Proviance" class="form-control is-valid"  data-old="<?=$old_province?>">
                                    </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="district">เขต/อำเภอ</label>
                                        <select name="District" id="District" class="form-control is-valid" data-old="<?=$old_amphur?>">
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="locality">แขวง/ตำบล</label>
                                        <select name="Subdistrict" id="Subdistrict" class="form-control is-valid" data-old="<?=$old_tumbol?>">
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="zipcode">รหัสไปรณีย์</label>
                                        <select name="Postcode" id="Postcode" class="form-control is-valid" data-old="<?=$old_postcode?>">
                                        </select>
                                    </div>
                                </div>
                                
                            <!-- End Form  ที่อยู่--> 
                        </div>
                        <div class ="card-footer text-center">
                        <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="submit">อัพเดทข้อมูล</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Form -->

    <!--Start footer-->
    <div class="card-footer bg-dark text-light" align="center">
    <font color="#00CD00">The Gameing perfect</font>
  </div>
  <!--End footer-->
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script>
                function readURL(input){
                    var reader = new FileReader();

                    reader.onload = function(e){
                        console.log (e.target.result)
                        $('#imgUpload').attr('src',e.target.result).width(300)
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            </script>
  
  
  
  </body>
</html>