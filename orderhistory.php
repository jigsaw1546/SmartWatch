<?php error_reporting(~E_ALL);?>

<?php require_once('php/connect.php');
include('includes/function.php');
include('config.php');
?>
<?php 

//ยกเลิกรายการ
if($_REQUEST['data']=='delete'){

$sql = $conn->query("update orders set order_status = 4 where order_id = '$_REQUEST[order_id]'");
Chk_Update($sql,'ยกเลิกรายการเรียบร้อย');

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
        background-color:white;
        color:black;
    }
    
</style>
<body>
<br><br><br><br>
    <div class="container">
        <div class="table-responsive">
        <br><h3><center><?php echo $orderhistory; ?></h3><br>
            <table class="table table-striped table-bordered table-hover" id="table_example">
            <tr>
            <th >#</th>
            <th>ORDER NUMBER</th>
            <th>NAME</th>
            <th>DATE</th>
            <th>STATUS</th>
            <th>View Order</th>
            <th>แจ้งชำระเงิน</th>
            <th >ยกเลิก</th>
            </tr>
            <?php
           
            $sql = $conn->query("select * from orders where Mem_ID = '$_SESSION[mem_id]'");
            $i = 1;
            while ($show= $sql->fetch_assoc()) {

            if($show['order_status']==0){$status = '<span class=text-wrning>รอชำระเงิน</span>';}
            else if($show['order_status']==1){$status = '<span class=text-success>ตรวจสอบชำระเงิน</span>';}
            else if($show['order_status']==2){$status = '<span class=text-info>ชำระเงินเรียบร้อย</span>';}
            else if($show['order_status']==3){$status = '<span class=text-primary>จัดส่งเรียบร้อย</span>';}
            else if($show['order_status']==4){$status = '<span class=text-danger>ยกเลิกรายการ</span>';}
            ?>
            <tr>
            <td style="padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;"><div align="center"><?php echo $i++;?></div></td>
            <td style="padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;"><div align="center"><?php echo $show['order_number'];?></div></td>
            <td style="padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;"><div align="center"><?php echo $_SESSION['mem_fname']." ".$_SESSION['mem_lname'];?></div></td>
            <td style="padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;"><div align="center"><?php echo $show['order_date'];?></div></td>
            <td style="padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;"><div align="center"><?php echo $status;?></div></td>
             <td style="padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;"><div align="center"><a href="print_payment.php?order_number=<?php echo $show['order_number'];?>" target="_blank" class="btn btn-primary">View Order</a></div></td>
              <td style="padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;"><div align="center">
              <?php if($show['order_status']==0 or $show['order_status']==1){?>	
              <a href="payment.php?order_id=<?php echo $show['order_id'];?>" class="btn btn-success">ชำระเงิน</a>
              <?php } else {echo '-';}?>
              </div></td>
               <td style="padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;"><div align="center"><?php if($show['order_status']==0 or $show['order_status']==1){?><a href="?data=delete&order_id=<?php echo $show['order_id'];?>" onClick="return confirm('คุณแน่ใจที่จะยกเลิกรายการนี้!');" class="btn btn-danger">ยกเลิกรายการ</a><?php } else {echo '-';}?></div></td>
            </tr>
            <?php } ?>

                        </table>
                      
        </div>
    </div>


<?php 
require_once 'config.php';
include('includes/navbar.php')?>
    
    <br><br> <br><br>
 <?php 
 include('includes/footer.php');
 
 ?>
<script src="node_modules/jquery/dist/jquery.min.js"></script><!--เรียกjquery -->
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script><!--เรียกpopper -->
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script><!--เรียกbootstrap.min.js -->
<script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script><!--เรียกjquery.validate -->
</body>
</html>

