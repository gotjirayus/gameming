<?php session_Start();
include_once('connect.php'); 
$idSelect=$_GET["id"];
$sql="SELECT * FROM product WHERE idproduct = $idSelect";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/regular.css" integrity="sha384-A/oR8MwZKeyJS+Y0tLZ16QIyje/AmPduwrvjeH6NLiLsp4cdE4uRJl8zobWXBm4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/brands.css" integrity="sha384-IiIL1/ODJBRTrDTFk/pW8j0DUI5/z9m1KYsTm/RjZTNV8RHLGZXkUDwgRRbbQ+Jh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>about</title>
 
  </head>

  <style>
      body {
        font-family: 'Mitr', sans-serif;
        font-size: 18px;
      }
    </style>
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
                 $name=$_POST['productname'];
                 $lastname=$_POST['price'];
                 $username=$_POST['st'];
                 $_FILES['pic'];
                
                 $temp = explode('.',$_FILES['pic']['name']);
                 $newName = round(microtime(true)).'.'.end($temp);
                 //echo $newName;
     
                 move_uploaded_file($_FILES['pic']['tmp_name'],'uploads/'.$newName);
                 
                
                
                
                $sql = "UPDATE  `product` SET `productname`= '$name', `price`='$lastname', `st`='$username', `image`='$newName' WHERE idproduct = $idSelect ";
                   
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

     <!-- Start Form --><br><br><br>
     <div class="container" style="height:600px;" >
            <div class="row">
                <div class="col-md-8 mx-auto mt-5">
                    <div class="card">
                    <form action="" method="post" enctype="multipart/form-data" >
                        <div class="card-header text-center bg-light text-dark"><h2>
                            แก้ไขสินค้า&nbsp;<i class="fas fa-arrow-circle-up"></i></h2>
                        </div>
                        <div class="card-body bg-light text-dark">

                            <!-- Start Form เพิ่มรูป-->
                            <div class="text-center">
                                <img id ="imgUpload" src="uploads/<?php echo $row['image']?>" style="width:250px; heigth:250px;" class="rounded" alt="...">
                            </div>
                            <div class="form-group">

                                <input type="File" class="form-control-file" id="pic" name="pic" onchange="readURL(this)">
                            </div>
                            <!-- End Form เพิ่มรูป-->

                            <!-- Start Form ข้อมูลส่วนตัว-->
                            <div class="row">
                                <div class="col">
                                    <label for="name" class="col-form-label">ชื่อสินค้า</label>
                                    <input type="text" class="form-control is-valid" id="productname" name="productname" value="<?php echo $row["productname"];?>" >
                                </div>
                                <div class="col">
                                <label for="lastname" class="col-form-label">ราคา</label>
                                    <input type="text" class="form-control is-valid" id="price" name="price" value="<?php echo $row["price"];?>">
                                </div>
                                <div class="col">
                                <label for="lastname" class="col-form-label">จำนวน</label>
                                    <input type="number" class="form-control is-valid" id="st" name="st" value="<?php echo $row["st"];?>">
                                </div>
                            </div> 
                            <!-- End Form ข้อมูลส่วนตัว-->
                            

                            
                        </div>
                        <div class ="card-footer text-center bg-light text-dark">
                            <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="ตกลง">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><br>
        <!-- End Form -->




    <!--Start footer-->

    <div class="card-footer bg-dark text-light" valign="top" align="center">
    <font color="#00CD00">The Gameing perfect</font>
  </div>
 
  <!--End footer-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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