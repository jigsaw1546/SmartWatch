<?php //error_reporting(~E_ALL);?>
<?php require_once('php/connect.php');
include('includes/function.php');
include('config.php');
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
        background-color:white;
        color:black;
    }
  
    
</style><body>
<?php 
$mem_id=$_SESSION['mem_id'];
$sql1 ="select * from members where mem_id = $mem_id";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($res1);

$sql2 = $conn->query("select * from orders WHERE order_number = '$_REQUEST[order_number]' ");
$show2= $sql2->fetch_assoc();
if($show2['order_status']==0){$status = '<span class=text-wrning>รอชำระเงิน</span>';}
else if($show2['order_status']==1){$status = '<span class=text-success>ตรวจสอบชำระเงิน</span>';}
else if($show2['order_status']==2){$status = '<span class=text-info>ชำระเงินเรียบร้อย</span>';}
else if($show2['order_status']==3){$status = '<span class=text-primary>จัดส่งเรียบร้อย</span>';}
else if($show2['order_status']==4){$status = '<span class=text-danger>ยกเลิกรายการ</span>';}
if($show2['order_shipping']==50){

    $shipping = 'ลงทะเบียน';
  }
  else {
  
    $shipping = 'EMS';
  }

?>
<br>
    <div class="container">
        <div >
        <br><h3><center>SmartWatch</h3></center>
        <h4><center>ใบสั่งซื้อสินค้า</h4><br></center>

        <center>
        <div class="row">
            <div class="col-sm"><div style="text-align: left;font-weight:bold;">ข้อมูลลูกค้า</div>
            <div style="text-align: left;"> ชื่อ : <?php echo $_SESSION['mem_fname']." ".$_SESSION['mem_lname'];?></div>
            <div style="text-align: left;">เบอร์ : <?php echo $row1['mem_tel'];?></div>
            <div style="text-align: left;">อีเมลล์ : <?php echo $row1['mem_email'];?></div>
            <div style="text-align: left;">ที่อยู่ : <?php echo $row1['mem_address'];?></div>
            
            </div>
            <div class="col-sm"><div style="text-align: left;font-weight:bold;">ข้อมูลติดต่อร้าน</div>
            <div style="text-align: left;"> ชื่อร้าน : SmartWatch</div>
            <div style="text-align: left;">เบอร์ : 0123456788</div>
            <div style="text-align: left;">อีเมลล์ : info@example.com</div>
            <div style="text-align: left;">ที่อยู่ : บ้านบึง ชลบุรี 20220</div>
            
            </div>
            <div class="col-sm"><div style="text-align: left;font-weight:bold;">วันที่สั่งซื้อ : <?php echo $show2['order_date']?></div> 
            <div style="text-align: left;font-weight:bold;"> เลขที่สั่งซื้อ : <?php echo $_REQUEST['order_number'];?></div>
            <div style="text-align: left;font-weight:bold;">สถานะ : <?php echo $status;?></div>
            </div>
</div>
<br>
            <table border=1 class="table table-striped table-bordered" id="table_example" >
            <tr align="center">
            <th >#</th>
            <th>สินค้า</th>
    
            <th>ยี่ห้อสินค้า</th>
            <th>จำนวน</th>
            <th>ราคา</th>
            <th>ราคารวม</th>
            </tr>
            <?php
           //AND orders.mem_id ='$_SESSION[mem_id]'
            $sql = $conn->query("select * from order_detail,orders,product WHERE product.product_id = order_detail.product_id and order_detail.order_number=orders.order_number  AND orders.order_number='$_REQUEST[order_number]'");
            $i = 1;
            while ($show= $sql->fetch_assoc()) {

           
            ?>
            <tr>
            <td ><div align="center"><?php echo $i++;?></div></td>
            <td ><div align="center"><?php echo $show['product_name'];?></div></td>
            <td ><div align="center"><?php echo $show['product_tag'];?></div></td>
            <td ><div align="center">1</div></td>
            <td ><div align="center"><?php echo $show['product_price'];?></div></td>
            <td ><div align="center"><?php echo $show['product_price'];?></div></td>
            </tr>
            <?php 
            // $sqlcount ="SELECT COUNT('order_number') AS countorder_number FROM `order_detail` WHERE order_number = '$_REQUEST[order_number]'";
            // $rescount=mysqli_query($conn,$sql1);
            // $showcount=mysqli_fetch_array($rescount);
            
            $sqlcount = $conn->query("SELECT COUNT(order_number) AS countorder_number FROM `order_detail` WHERE order_number = '$_REQUEST[order_number]' ");
            $showcount= $sqlcount->fetch_assoc();
            ?>
            <?php } ?>
                <tr>
                    <td   colspan="5" style="text-align: right;padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;"><h5>ราคาสินค้าทั้งหมด: </h5></td><td   style="padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;"><h5><?php echo   number_format($show2['price_total'],2)?> บาท</h5></td>
                </tr>
                <tr>
                <?php 
                    //ราคารวมระหว่างค่าจัดส่งกับ จำนวนสินค้า
                    $totalshipping= $showcount['countorder_number'] * $show2['order_shipping'];
                    $totalsum=$totalshipping+$show2['price_total'];
                    $_SESSION['price_totals']=$totalsum;
                 ?>
                    <td colspan="5"  style="text-align: right;padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;"><h5>ค่าจัดส่ง: <span class="text-success">(<?php  echo $shipping ?>)</span></h5></td><td   style="padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;"><h5><?php echo number_format($totalshipping,2)?> บาท</h5></td>
                </tr>
                <tr>
                    <td colspan="5"   style="text-align: right;padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px; "><h5 style="    color: green;">รวมค่าใช้จ่ายที่ต้องชำระทั้งหมด: </h5></td><td  style="padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;"><h5 style="    color: green;"><?php echo number_format($totalsum,2) ?> บาท</h5></td>
                </tr>
                
               
           

                        </table>
                        <input type="button" name="Button" value="Print" onclick="javascript:this.style.display='none';window.print();">
        
    </div>
    </center>

  
    <br><br> <br><br>
<script src="node_modules/jquery/dist/jquery.min.js"></script><!--เรียกjquery -->
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script><!--เรียกpopper -->
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script><!--เรียกbootstrap.min.js -->
<script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script><!--เรียกjquery.validate -->
</body>
</html>

