<?php //error_reporting(~E_ALL);?>
 
<?php

require_once('php/connect.php');
    include('includes/function.php')?>
<?php 

if($_REQUEST['data']=='payment'){
$file = strrchr($_FILES['file']['name'], "."); //ตัดนามสกุลไฟล์เก็บไว้
$filename = (Date("dmy_His").$file); //ตั้งเป็น วันที่_เวลา.นามสกุล
$folder = "assets/image/payments/"; // path folder
$width = 0;// ความกว้างของภาพ
$height = 0;// ความยาวของภาพ
Upload_File ($filename,$folder,$width,$height); 
$sql1=$conn->query("INSERT INTO `payment` set `payment_id`= '', `order_id`='$_REQUEST[order_id]', `mem_id`= '$_SESSION[mem_id]', `payment_file`='$filename', `payment_price`='$_REQUEST[payment_price]', `payment_bank`='$_REQUEST[payment_bank]', `payment_Detail`='$_REQUEST[payment_Detail]', `payment_date`='$_REQUEST[payment_date]', `payment_time`='$_REQUEST[payment_time]'");
Chk_Insert($sql1,'รอตรวจสอบชำระเงิน','orderhistory.php');

$sql = $conn->query("update orders set order_status = '1' where order_id = '$_REQUEST[order_id]'");
  
  //function check แก้ไขข้อมูล จะมี alert ขึ้นมา ตามเงื่อนไข
  Chk_Update($sql,'อัพเดทข้อมูลเรียบร้อย');
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

$sql=$conn->query("SELECT * FROM orders WHERE order_id = '$_REQUEST[order_id]'");
$show=$sql->fetch_assoc();
?>
<?php 

require_once 'config.php';
include('includes/navbar.php');
?>
    <!-- The Modal -->
    <br><br><br><br>
    <div class="container" style="background-color:white;">
    <br><h3><center><?php echo "PAYMENT" ?></center></h3><br>
   
    <form name="form1" action="?data=payment" method="post" enctype="multipart/form-data" onsubmit="return chk_pic() ">
        
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="order_number">เลขที่สั่งซื้อ</label>
      <input type="hidden" class="form-control" id="order_id" name="order_id" readonly placeholder="order_id" value="<?php echo $show['order_id']?>">
      <input type="text" class="form-control" id="order_number" readonly placeholder="order_number" value="<?php echo $show['order_number']?>">
    </div>
    <div class="form-group col-md-6">
      <label for="fullname">ชื่อ-นามสกุล</label>
      <input type="text" class="form-control" id="fullname" placeholder="fullname"value="<?php echo $_SESSION['mem_fname']." ".$_SESSION['mem_lname']?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="pricetotal">จำนวนเงินที่ต้องชำระ</label>
      <input type="text" class="form-control" id="pricetotal" name="pricetotal" placeholder="pricetotal" value="<?php echo number_format($_SESSION['price_totals'],2); ?>"readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="payment_price">จำนวนเงินที่โอน</label>
      <input type="text" class="form-control" id="payment_price" name="payment_price"  placeholder="จำนวนเงินที่โอน" OnChange="JavaScript:chkNum(this)"required>
    </div>
    <div class="form-group col-md-6">
      <label for="payment_bank">โอนเข้าธนาคาร</label>
      <select class="form-control" id="payment_bank" name="payment_bank">
      <option value="ไทยพาณิชย์">ไทยพาณิชย์ (xxx)</option>
      <option value="กรุงเทพ">กรุงเทพ (xxx)</option>
      <option value="กสิกร">กสิกร (xxx)</option>
      <option value="กรุงไทย">กรุงไทย (xxx)</option>
    </select>
    </div>
    <div class="form-group col-md-6">
      <label for="file">หลักฐานการโอน</label>
      <input name="file" type="file" class="file form-control" required >
    </div>
    <div class="form-group col-md-6">
      <label for="payment_date">วันที๋โอน</label>
      <input name="payment_date" type="date" class="form-control" required>
    </div>
    <div class="form-group col-md-6">
      <label for="payment_time">เวลาที่โอน</label>
      <input name="payment_time" type="time" class="form-control" required>
    </div>
    <div class="form-group col-md-12">
    <label for="payment_Detail">ข้อมูลเพิ่มเติม</label>
            <textarea name="payment_Detail" class="form-control" rows="5" ></textarea>
          </div>

          <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-grad">ยืนยันชำระเงิน</button>
        <a href="orderhistory.php" class="btn btn-danger btn-grad" data-dismiss="modal">ยกเลิก</a>
      </div>
    </div>
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
<script>
function chk_pic(){
	var file = document.form1.file.value;
	var patt = /(.jpg|.png)/;
	var result = patt.test(file);
    if(!result){
        alert('กรุณาอัพโหลดเฉพาะไฟล์ jpg,png เท่านั้น！');
        return false
    }else if(document.form1.pricetotal.value != document.form1.payment_price.value){
        alert('ยอดเงินชำระไม่ถูกต้อง!');
        return false
    }
    return true
}
  
// function chk_pic(){
// 	var file=document.form1.payment_file.value;
// 	var patt=/(.jpg|.png)/;
// 	var result=patt.test(file);
//         if(!result){
//           alert('กรุณาอัพโหลดเฉพาะไฟล์ jpg,png เท่านั้น！');
//         }else{
//           chk_error();
//         }
//     return result;
// }  

function chk_error(){

if(document.form1.pricetotal.value != document.form1.payment_price.value){

  alert('ยอดเงินชำระไม่ถูกต้อง!');
  return true;

}else{
  chk_pic();
}
}

function addCommas(nStr)
			{
				nStr += '';
				x = nStr.split('.');
				x1 = x[0];
				x2 = x.length > 1 ? '.' + x[1] : '';
				var rgx = /(\d+)(\d{3})/;
				while (rgx.test(x1)) {
					x1 = x1.replace(rgx, '$1' + ',' + '$2');
				}
				return x1 + x2;
			}

			function chkNum(ele)
			{
				var num = parseFloat(ele.value);
				ele.value = addCommas(num.toFixed(2));
			}
</script>