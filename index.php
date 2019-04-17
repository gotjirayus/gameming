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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/regular.css" integrity="sha384-A/oR8MwZKeyJS+Y0tLZ16QIyje/AmPduwrvjeH6NLiLsp4cdE4uRJl8zobWXBm4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/brands.css" integrity="sha384-IiIL1/ODJBRTrDTFk/pW8j0DUI5/z9m1KYsTm/RjZTNV8RHLGZXkUDwgRRbbQ+Jh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <title>Index</title>
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

    <!--StartCarousel-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
        <div class="carousel-inner" >
            <div class="carousel-item active">
                <img class="d-block w-100 " height="700px" src="pic/in5.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 " height="700px" src="pic/in4.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 " height="700px" src="pic/in3.jpg" alt="Third slide">
            </div>
        </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>
    <!--EndCarousel-->

    <!--StartJumbotron-->
    <div class="jumbotron bg-dark">
    <div class="container text-center  text-light">
        <h1 class="display-4">The Gameing Perfect</h1>
        <p class="lead">ร้านขายอุปกรณ์ Gameing gear ทุกรูปแบบ มีให้เลือกชมมากมายสินค้าดีมีคุณภาพ</p>
    </div>
    </div>
    <!--EndJumbotron-->
    <!--card-->
    <div class="card-deck text-center">
  <div class="card ">
    <img class="card-img-top" src="pic/in9.jpg" width="200" height="277" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Razer Abyssus V2</h5>
      <p class="card-text">จุดเด่นในการเป็นเมาส์แบบที่ใช้ได้ทั้งมือซ้ายและมือขวา เป็นตัวเลือกที่ดีอีกตัวหนึ่้งในท้องตลาด ดังนั้นถ้าคุณชอบเมาส์ที่เล่นได้ทั้งซ้ายและขวา รวมถึงขนาดพอเหมาะสำหรับมือ ไม่ใหญ่เกินไป Razer Abyssus V2 เป็นอีกรุ่นหนึ่งที่น่าสนใจ</p>
      <a href="product.php"><button type="button" class="btn btn-outline-success">เลือกซื้อ</button></a>
      <p class="card-text"><small class="text-muted">The Gameing Perfect</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="pic/in7.jpg" width="200" height="277" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">MSI Interceptor DS4200 </h5>
      <p class="card-text">หน้าตาของ Keyboard ตัวนี้จะมาในรูปแบบค่อนข้างโฉบเฉี่ยวเลยไม่น้อยเลยทีเดียว มาเป็นแบบ Polygon ค่อนข้างแปลกตาเมื่อเทียบกับแบรนด์อื่น จำนวนปุ่ม 104 ปุ่มที่เป็นมาตรฐานทั่วไป มีแผ่นรองข้อมือให้มาด้วยสามารถใช้ได้ในขณะพิมพ์หรือเล่นเกมส์ </p>
      <a href="product.php"><button type="button" class="btn btn-outline-success">เลือกซื้อ</button></a>
      <p class="card-text"><small class="text-muted">The Gameing Perfect</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="pic/in8.jpg" width="200" height="277" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Razer Announces the Hammerhead V2 BT</h5>
      <p class="card-text"> Razer Hammerhead BT จัดทำออกมาได้อย่างลงตัว เหมาะกับสาวกค่าย Razer ที่เน้นใช้งานนอกบ้านซะเป็นส่วนใหญ่ และเบื่อความเกะกะของสาย รวมถึงปัญหาสายพันกันนั่นเองครับ สะดวกสบาย ใช้งานง่าย สิ่งต่างๆ ได้ถูกคิดและออกแบบไว้เป็นอย่างดี </p>
      <a href="product.php"><button type="button" class="btn btn-outline-success">เลือกซื้อ</button></a>
      <p class="card-text"><small class="text-muted">The Gameing Perfect</small></p>
    </div>
  </div>
</div><br>
    <!--card-->
    <!--card2-->
    <div class="card-group">
  <div class="card">
    <img class="card-img-top" src="pic/in11.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Gaming Keyboard</h5>
      <p class="card-text">Razer Blackwidow X Chroma [GreenSW][TH] ราคาพิเศษ 4,990 บาท จากปกติ 5,990 บาท</p>
      <!--model-->
            <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
        รายละเอียดเพิ่มเติม
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Razer Blackwidow X Chroma [GreenSW][TH]</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            คีย์บอร์ด Mechanical อัพเกรดมาตรฐานใหม่ สามารถกันน้ำและฝุ่น 
            ด้วยมาตรฐาน IP54 พร้อมกับความทึกทนของปุ่ม Razer Mechanical
             Switches กดรองรับการกด 80 ล้านครั้ง และมี Action Point 
             ที่มีความรวดเร็วและแม่นยำสูง มีการปรับเปลี่ยนรูปแบบฟอนท์และระบบไฟ
              Backlit ให้ดูเรียบหรูในแบบของเวอร์ชั่นใหม่   สามารถตั้งมาโคร 
              แบบ On-the-fly ได้ทันที หรือขั้นสูงผ่านโปรแกรม Razer Synapse
               มีค่า Polling Rate สูงสุด 1000Hz พร้อมปุ่ม Gaming Mode 
               เพื่อเปิด – ปิดการใช้งานปุ่ม Windows และสามารถกดได้พร้อมกันมากถึง 10 ปุ่ม
               <ul></ul>
               <li>Razer Mechanical Switches แรงกด 50g</li>
               <li>รองรับการกด 80 ล้านครั้ง</li>
               <li>สามารถกันน้ำและฝุ่น ด้วยมาตรฐาน IP54</li>
               <li>สามารถกดพร้อมกันได้มากถึง 10 ปุ่ม</li>
               <li>รองรับการใช้งานร่วมกับ Razer Synapse</li>
               <li>ระบบไฟ Backlit รูปแบบใหม่</li>
               <li>สามารถตั้งมาโครได้เต็มรูปแบบ หรือบันทึกค่าแบบ On-the-fly</li>
               <li>ปุ่ม Gaming Mode</li>
               <li>อัตราการส่งข้อมูลปรับได้สูงสุด 1000Hz</li>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
      <!--model-->
      <p class="card-text"><small class="text-muted">The Gameing Perfect</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="pic/in12.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Gaming Headset</h5>
      <p class="card-text">Razer Electra V2 ราคาพิเศษ 1,990 บาท จากปกติ 2,190 บาท</p>
            <!--model-->
 <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong">
รายละเอียดเพิ่มเติม
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Razer Electra V2</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Razer Electra V2 ชุดหูฟังเกมมิ่งที่มีการเชื่อมต่อแบบแจ็ค 3.5 มม. ขับเสียงด้วยดอกลำโพงไดรเวอร์ Neodymium ขนาด 40 มม. ถูกปรับแต่งเพื่อให้ได้ประสบการณ์เสียงที่ดีที่สุดในขณะเล่นเกมบนพีซีและคอนโซลหรือเมื่อฟังเพลงทางโทรศัพท์ ตัวเชื่อมต่อเสียงและไมโครโฟนแบบรวมช่วยให้ใช้งานได้ง่ายกับเครื่อง PC, Mac, Xbox One, PlayStation 4 หรือโทรศัพท์ที่มีแจ็ค 3.5 มม. ไมโครโฟนบูมแบบถอดได้ช่วยเติมเต็มไลฟ์สไตล์มือถือของนักเล่นเกม และมีการสวมใส่ที่เน้นความสบายเป็นคุณลักษณะพิเศษ ความทนทานที่ถูกอัพเกรดประกอบด้วยกรอบอลูมิเนียมที่มีน้ำหนักเบาและยืดหยุ่นพร้อมพนักพิงศีรษะสุดพรีเมี่ยม ไมโครโฟนแบบถอดได้ เป็นลักษณะไมค์บูมช่วยให้สามารถสื่อสารได้อย่างคมชัด ในระหว่างการต่อสู้หรือในการสนทนาทางโทรศัพท์
      <ul></ul>
      <li>ขนาดลำโพง 40 มม.</li>
      <li>เสียงจำลอง 7.1 รอบทิศทาง</li>
      <li>รองรับการเชื่อมต่อทุก Platform</li>
      <li>ไมโครโฟนแบบถอดได้</li>
      <li>การเชื่อมต่อแบบ 3.5mm ใช้งานได้กับ (PC, Mac, PS4, Xbox One, Switch, Mobile)</li>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      <!--model-->
      <p class="card-text"><small class="text-muted">The Gameing Perfect</small></p>
    </div>
  </div>
</div><br>
    <!--card2-->
    <!--jumbotron
    <div class="jumbotron jumbotron-fluid bg-dark text-light">
  <div class="container">
    <h1 class="display-4">การสั่งซื้อสินค้า</h1>
    <p class="lead ">1.เลือกรายการสินค้า</p>
                    <li>ค้นหาสินค้า หรือเลือกรายการสินค้าจากเมนูด้านซ้าย</li>
                    <li>คลิ๊กปุ่มซื้อสินค้าระบบจะแสดงหน้า “ตะกร้าสินค้าและจัดส่ง”</li>
    <p class="lead">2.เลือกวิธีการจัดส่ง</p>
                    <li>เลือกวิธีการจัดส่งที่ต้องการ</li>
                    <li>ตรวจสอบรายละเอียดสินค้า และที่อยู่ในการจัดส่ง</li>
                    <li>ดูรายละเอียดการจัดส่งและรับสินค้าได้</li>
    <p class="lead">3.เลือกวิธีชำระเงิน</p>
                    <li>เลือกวิธีการชำระเงินที่ต้องการ</li>
                    <li>ดูรายละเอียดวิธีชำระเงินต่างๆได้</li>
  </div>
  
</div>   
    jumbotron-->
    <!--carousel-->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" height="600" src="pic/in16.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="600" src="pic/in17.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="600" src="pic/in18.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <!--carousel-->
    
    
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