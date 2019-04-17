<?php session_Start();
include_once('connect.php'); 
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
                            <a class="dropdown-item" href="stock.php">สต็อกสินค้า</a><a class="dropdown-item" href="stock.php">สต็อกสินค้า</a>
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
<div>
    <img src="pic/about5.jpg" width="100%"  class="img-fluid" alt="Responsive image">
</div>
<!--ข้อความ 1-->
<div class="jumbotron jumbotron-fluid text-center">
  <div class="container">
    <h1 class="display-4">The Gameing perfect</h1>
    <p class="lead">จำหน่ายอุปกรณ์ Gameing gear หลากหลายประเภทมีให้เลือกมากมายตามที่ท่านต้องการ</p>
  </div><br>
  <!--card 1-->
<div>
  <div class="card-deck text-dark">
  <div class="card">
    <img class="card-img-top" src="pic/about1.jpeg" width="180" height="277" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Keyboard</h5>
      <p class="card-text">มีให้เลือกหลากหลายค่ายตามที่ท่านต้องการ</p>
      <p class="card-text"><small class="text-muted">The Gameing perfect</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="pic/about2.jpg" width="180" height="277"  alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Mouse Gamer</h5>
      <p class="card-text">สินค้าดีมีคุณภาพทุกชิ้นที่จำหน่าย</p>
      <p class="card-text"><small class="text-muted">The Gameing perfect</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="pic/about7.jpg" width="180" height="277"  alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Headset</h5>
      <p class="card-text">จัดส่งรวดเร็วทันใจสินค้าถึงมือลูกค้าอย่างปลอดภัยอย่างแน่นอน</p>
      <p class="card-text"><small class="text-muted">The Gameing perfect</small></p>
    </div>
    
  </div>
  <!--card 1-->
</div>
<!--ข้อความ 1-->
 <br><br>   <img src="pic/about10.jpg" width="100%"  class="img-fluid" alt="Responsive image">
<!--ข้อความ2-->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">ด้านการบริการ</h1>
    <p class="lead">มีการบริการที่ทันสมัย ครบวงจร ผสมผสานกับความหลากหลายของอุปกรณ์ Gameing Gear คุณภาพ</p>
    <p class="lead">ซึ่งผ่านการคัดสรรจากแบรนด์ ที่มีชื่อเสียง และได้รับการรับรองมาตรฐานการผลิตจากบริษัทชั้นนำ</p>
  </div>
</div>
<!--ข้อความ2-->
<img src="pic/about11.png" width="100%"  class="img-fluid" alt="Responsive image">
<!--ข้อความ3-->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">ด้านวิสัยทัศน์</h1>
    <p class="lead">เป้าหมายสู่การเป็นผู้นำอันดับหนึ่งด้านอุปกรณ์ Gameing gear ทำให้เราตระนักถึง</p>
    <p class="lead">ความสำคัญของการยกระดับมาตรฐานและคุณภาพของการบริการอย่างต่อเนื่อง</p>
  </div>
</div></div>
<img src="pic/about12.jpg" width="100%"  class="img-fluid" alt="Responsive image">
<br><br>
  <div class="container">
    <h1 class="display-4">ขอขอบคุณ</h1>
    <p class="lead">ลูกค้าทุกท่านที่ให้ความไว้วางใจในการใช้บริการของเรา</p>
    <p class="lead">ขอบคุณครับ</p>
  </div>

</div>
<!--ข้อความ3-->
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
  </body>
</html>