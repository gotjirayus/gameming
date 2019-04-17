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
    <title>chart</title>
  </head>
  <style>
      body {
        font-family: 'Mitr', sans-serif;
        font-size: 18px;
      }
    </style>
    <body>
<?php
    session_start();
    require './connect.php';
    
    if(isset($_POST["add_to_cart"]))
    {
        if (isset($_SESSION['id'])){
        if(isset($_SESSION["shopping_cart"]))
        {
            $item_array_id= array_column($_SESSION["shopping_cart"],"item_id");
            if(!in_array($_GET["id"],$item_array_id))
            {
                $count = count($_SESSION["shopping_cart"]);
                $id = $_GET["id"];
                $item_array=array(

                        'item_id' => $_GET["id"],
                        'item_image'=>$_POST["hidden_image"],
                        'item_name'=>$_POST["hidden_name"],
                        'item_price'=>$_POST["hidden_price"],
                        'item_quantity'=>$_POST["quantity"] 
                );
               // $_SESSION["shopping_cart"][$count] = $item_array;
               $_SESSION["shopping_cart"][$id] = $item_array;
            }
            else
            {
                $id = $_GET["id"];

                /*echo '<script>swal({
                    title: "ผิดพลาด",
                    text: "คุณได้สั่งซื้อสินค้าซ้ำ",
                    icon: "error",
                    button: "ตกลง"
                  }). then(function(result){
                    window.location = "product.php";
                               })</script>';*/

                  $_SESSION["shopping_cart"][$id]['item_quantity'] =  $_SESSION["shopping_cart"][$id]['item_quantity'] + $_POST["quantity"] ;

                

            }
        }
        else
        {
            $item_array= array(

                'item_id' => $_GET["id"],
                'item_image'=>$_POST["hidden_image"],
                'item_name'=>$_POST["hidden_name"],
                'item_price'=>$_POST["hidden_price"],
                'item_quantity'=>$_POST["quantity"]
            );
            $_SESSION["shopping_cart"][0]=$item_array;
        }
    }else {
        echo '<script>alert ("กรุณาเข้าสู่ระบบ")</script>';
        echo '<script>window.location="login.php"</script>';
                
    }
    }
    
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
        {
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                if($values["item_id"] == $_GET["id"])
                {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>swal({
                        title: "สำเร็จ",
                        text: "นำสินค้าออกเรียบร้อยแล้ว",
                        icon: "success",
                        button: "ตกลง"
                      }). then(function(result){
                        window.location = "chart.php";
                                   })</script>'; 
                }
            }
            $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
        }
    }
    if(isset($_POST["confirm"])){
        if($_SESSION["shopping_cart"] == $_SESSION["shopping_cart"][0] ){
             echo '<script>alert ("กรุณาเลือกสินค้า")</script>';
             echo '<script>window.location="product.php"</script>';
        }else
            echo '<script>alert ("สั่งซื้อเรียบร้อยแล้ว")</script>';
            echo '<script>window.location="save.php"</script>';

    }
?>

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
       <!-- Start Form --><br>
       <br><div class="container" style="height:1000px;" >
            <div class="row">
                <div class="col-md-8 mx-auto mt-5">
                    <div class="card">
                    
                        <div class="card-header text-center bg-light text-dark"><h1>
                            รายการสั่งซื้อ</h1>
                        </div>
                        <div class="table-responsive">
            <table class="table " style="color:;text-align:center; ">
                <tr>
                    <th >ชื่อสินค้า</th>
                    <th >รูปสินค้า</th>
                    <th >จำนวน</th>
                    <th >ราคา</th>
                    <th >ราคารวม</th>
                    <th ></th>
                </tr>
                <?php
                if(!empty($_SESSION["shopping_cart"]))
                {
                    $total =  0;
                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                    {
                ?>
                <tr>
                    <td><?php echo $values["item_name"]; ?></td>
                    <td><img src="uploads/<?php echo $values["item_image"];?>" width="150" height="130" ></td>
                    <td><?php echo $values["item_quantity"]; ?></td>
                    <td><?php echo $values["item_price"]; ?></td>
                    <td><?php echo number_format($values["item_quantity"] * $values["item_price"],2); ?></td>
                    <td><a href="chart.php?action=delete&id=<?php echo $values["item_id"];?>"><span class="">ยกเลิกการสั่งซื้อ</span></a></td>
                </tr>
                <?php
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }
                ?>
                <tr>
                    <td colspan="4" align="right">total</td>
                    <td align="right"><?php echo number_format($total, 2);?></td>
                    <td>บาท</td>
                </tr>
                <?php
                }

                ?>
            </table>
                            

                            
                        </div>
                        <div class ="card-footer text-center bg-light text-dark">
                            <form  action="save.php" method="POST" >
                            <input type="hidden" name="hidden_id" value="<?php echo $_SESSION['id'];?>">
                            <input type="hidden" name="hidden_total" value="<?php echo $total;?>">
                            <input type="submit" name="confirm" class="btn btn-success btn-lg btn-block" value="ยืนยันการซื้อ">
                            <a href="product.php" class="btn btn-secondary btn-lg btn-block" role="button" aria-pressed="true">เลือกสินค้าเพิ่มเติม</a>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div><br>
        <!-- End Form -->
        <!--footer-->
        <div class="card-footer bg-dark text-light" align="center">
        <font color="#00CD00">The Gameing perfect</font>
        </div>    
        <!--end footer-->


        
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