<?php session_Start();

include_once('connect.php');
    error_reporting(0);
    
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
    <title>Datacustomer</title>
  </head>
  <style>
      body {
        font-family: 'Mitr', sans-serif;
        font-size: 18px;
      }
    </style>
    <body>
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
        if(isset($_POST['delete'])){
            $id=$_POST['hidden_id'];
            $sql = "DELETE FROM member WHERE idmember = $id ";
            $result = mysqli_query($conn,$sql);
            if($result){
            echo '<script>swal({
                title: "เสร็จสิ้น",
                text: "ลบข้อมูลเรียบร้อยแล้ว",
                icon: "success",
                button: "ตกลง",
              });</script>';
           
            }
        }
    
    ?>
    <div class="container" style="height:700px;">
    <br><h2 align="center">ข้อมูลลูกค้า</h2><br>
    <table class="table table-bordered text-center" >
  <thead>
    <tr class="bg-success">
      <th scope="col">ชื่อลูกค้า</th>
      <th scope="col">นามสกุล</th>
      <th scope="col">เบอร์โทรศัพท์</th>
      <th scope="col">อีเมล</th>
      <th scope="col">ดูรายละเอียด</th>
      <th scope="col">จัดการข้อมูล</th>
    </tr>
  </thead>
  <tbody>
  <?php 

         $id =  $_GET['id'];
         $sql = "SELECT * FROM member ";
         $test = mysqli_query($conn,$sql);
         while( $row = mysqli_fetch_assoc($test))
         {
                    ?>
    <tr class="table-success">

      <td scope="row"><?=$row["name"]?></th>
      <td><?=$row["lastname"]?></td>
      <td><?=$row["tell"]?></td>
      <td><?=$row["email"]?></td>
      <form method="POST" action="detail.php?id=<?php echo $row["idmember"];?>">
      <input type="hidden" name="hidden_id" value="<?=$row["idmember"]?>">
      <td><input type="submit" name="submit" style="margin-top: 5px;" class="btn btn-secondary btn-lg btn-block"  value="ดูรายละเอียด"></td>
      </form>
      <?php 
                                $idp = $row['idmember'];
                                    $sql2 = "SELECT COUNT(*) AS c FROM order1 WHERE idmember='$idp'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $i = mysqli_fetch_assoc($result2);
                                    if ($i['c'] >  0) {
                                        //เคยซื้อ
                            ?>
      <form method="POST">
      <input type="hidden" name="hidden_id" value="<?=$row["idmember"]?>">
      <td><input type="submit" disabled name="delete" style="margin-top: 5px;" onclick="return confirm('ลบข้อมูลลกค้า')" class="btn btn-danger btn-lg btn-block"  value="ลบข้อมูล"></td>
                                    </form><?php }  else {?>
                                        <form method="POST">
      <input type="hidden" name="hidden_id" value="<?=$row["idmember"]?>">
      <td><input type="submit" name="delete" style="margin-top: 5px;" onclick="return confirm('ลบข้อมูลลกค้า')" class="btn btn-danger btn-lg btn-block"  value="ลบข้อมูล"></td>
                                    </form>
                                    <?php } ?>
    </tr>
  </tbody>
  <?php 
                }
            ?>
</table>

    </div>
     <!--Start footer-->
    <div class="card-footer bg-dark text-light" align="center">
    <font color="#00CD00">The Gameing perfect</font>
  </div>
  <!--End footer-->     

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>