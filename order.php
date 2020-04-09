<?php error_reporting(~E_ALL);?>
 
<?php require_once('php/connect.php');
    include('includes/function.php')?>
<?php 

$mem_id =$_SESSION['mem_id'];
$datetime=date("Y-m-d H:i:s");
    if($_REQUEST['data']=='confirm') {
   
        $order= date('dmyHis');
        $mem_address=$_REQUEST['mem_address'];
        $shipping= $_REQUEST['shipping'];
        $summy= $_SESSION['summy'];
     
         $sql= "INSERT INTO `orders`(`order_id`, `order_number`, `mem_id`, `address`, `order_shipping`, `price_total`, `order_status`, `order_date`) VALUES ('', '$order', '$mem_id', '$mem_address', '$shipping', '$summy', '0', '$datetime')";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($res);
    
      
    }  


if($_REQUEST['data']=='cancel'){
    $conn->query("DELETE FROM cart WHERE mem_id = '$mem_id'");
    Alert_Return('ลบสินค้าเรียบร้อยแล้ว');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> <!--เรียกbootstrap -->
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css"> <!--เรียกfontawesome -->
    <link rel="stylesheet" href="node_modules/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.3/css/flag-icon.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <title>SmartWatch Shop</title>
</head>
<style>
    body{
        background-color:#a9a8a863;
        color:black;
        
    }
    .container{
        margin-top: 11px;
    }
    .table-responsive {
    display: table;
}
    
</style>
<body>
<?php 

if(isset($_SESSION['mem_id'])==""){
    echo '<script> alert("กรุณาเข้าสู่ระบบก่อน")</script>';
    header('Refresh:0; url=../index.php');
}

?>
<?php 

$sql1="SELECT * FROM `cart`,`product`,`members`  WHERE cart.product_id=product.product_id AND cart.mem_id=$mem_id AND members.mem_id =$mem_id";
$result1=mysqli_query($conn,$sql1);
$sqlsum="SELECT *, SUM(cart.product_price) AS summy FROM `cart`,`product` WHERE cart.product_id=product.product_id AND cart.mem_id=$mem_id";


$resultsum=mysqli_query($conn,$sqlsum);
$rowsum=mysqli_fetch_array($resultsum);

$_SESSION['summy']=$rowsum['summy'];
require_once 'config.php';
include('includes/navbar.php');
?>
    <!-- The Modal -->
    <br><br><br><br>
    <div class="container" style="background-color:white;">
    <br><h3><center><?php echo $confirm ?></h3><br>
    <form  class="form-horizontal" id="myform1" name="form" action="?data=confirm" method="post" enctype="multipart/form-data">
    <div class="table-responsive">
    <table class="table table-striped table-bordered" >
        <tr>
            <th>#</th>
            <th><?php echo $image; ?></th> 
            <th><?php echo $nameproduct; ?></th>
            <th><?php echo $price; ?></th>
            <th><?php echo $date; ?></th>
            
        </tr>
        <?php $i=1;
        while($rows=mysqli_fetch_array($result1)){?>
        <tr><?php
        if($_REQUEST['data']=='confirm') {

             $sqlins="INSERT INTO `order_detail`(`order_detail_id`, `order_number`, `product_id`, `product_price`) VALUES ('','$order','$_SESSION[product_id]','$_SESSION[product_price]')";
            $resins=mysqli_query($conn,$sqlins);
            $rowins=mysqli_fetch_array($resins);
        
            $conn->query("DELETE FROM cart WHERE mem_id = '$mem_id'");
            Alert('ทำการสั่งซื้อเรียบร้อย','orderhistory.php');

        }
 
     
    //$products_prices=$_SESSION['product_price'];
   // $productsx_prices = array($_SESSION['product_price']);?>
            <td><?php echo $i;?></td>
            <td style="width:100px"><img src="assets/image/store/<?php echo $rows['product_image']?>" style="width:100px"></td>
            <td><?php echo $rows['product_name']; $mem_address=$rows['mem_address'];?></td>
            <td><?php echo number_format($rows['product_price'],2)?></td>
            <td><?php echo $rows['cart_date']?></td><?php 
           $_SESSION['product_id']=$rows['product_id'];
           $_SESSION['product_price']=$rows['product_price'];?>
        </tr>   
        
        <?php $i++; }?>
    </table>
    <table class="table table-bordered">
        <tr>
            <td colspan="5" style="padding-bottom: 4px;padding-top: 4px;">
                <div style="font-size:18px; margin-left:610px"><?php echo $totalprice?>：<?php echo number_format($rowsum['summy'],2); echo " ".$baht?></div> 
            </td>
        </tr>
        <tr>
            <td colspan="5" style="padding-bottom: 4px;padding-top: 4px;">
                <div style="font-size:18px;margin-left:590px"><?php echo $discountall?> ：0.00 <?php echo $baht?></div>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="padding-bottom: 4px;padding-top: 4px;">
                <div style="font-size:18px;margin-left:330px;color:green"><?php echo $allprice?>: <a style="color:red"><?php echo $notshipping?></a> <?php echo number_format($rowsum['summy'],2); echo " ".$baht?></div>
            </td>
        </tr>
    </table>
    <br>
            
            <label class="mem_address"><h5><?php echo $address?></h5></label>
              <div class="input-group-text"></div>
                <textarea name="mem_address" rows="3" class="form-control"><?php echo $mem_address?></textarea>
              </div>
              <br><h5><?php echo $deliverytype?></h5>
              <br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="shipping" id="shipping" value="50" required>
                    <label class="form-check-label" for="shipping"><?php echo $r50;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="shipping" id="shipping" value="80">
                    <label class="form-check-label" for="shipping"> <?php echo $e80;?></label>
                </div>

             
    <div class="text-right"><button type="submit" name="submits"class="btn btn-info btn-grad btn-xl" onClick="return confirm ('ยืนยันการสั่งซื้อ');">ยืนยันการสั่งซื้อ</button>&nbsp;
    <button type="button" class="btn btn-danger btn-grad" onClick="window.location='?data=cancel';">ยกเลิกรายการทั้งหมด</button></div>

    <br>
    </form>
    </div>
    
 <?php 

 include('includes/footer.php');?> 
<script src="node_modules/jquery/dist/jquery.min.js"></script><!--เรียกjquery -->
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script><!--เรียกpopper -->
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script><!--เรียกbootstrap.min.js -->
<script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script><!--เรียกjquery.validate -->
</body>
</html>
