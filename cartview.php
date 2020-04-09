<?php error_reporting(~E_NOTICE);


?>
<?php require_once('php/connect.php');?>
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
$mem_id =$_SESSION['mem_id'];
$sql1="SELECT * FROM `cart`,`product`  WHERE cart.product_id=product.product_id AND cart.mem_id=$mem_id";
$result1=mysqli_query($conn,$sql1);

require_once 'config.php';
include('includes/navbar.php')?>
    <!-- The Modal -->
    <br><br><br><br>
    <div class="container" style="background-color:white;">
    <br>
    <h3><center><?php echo $cartforme?></h3>
    <br>
    <div class="table-responsive">
    <table class="table table-striped table-bordered" >
        <tr>
            <th>#</th>
            <th><?php echo $image; ?></th> 
            <th><?php echo $nameproduct; ?></th>
            <th><?php echo $price; ?></th>
            <th><?php echo $date; ?></th>
            <th></th>
        </tr>
        <?php $i=1;
        while($rows=mysqli_fetch_array($result1)){?>
        <tr>
            <td><?php echo $i;?></td>
            <td style="width:100px"><img src="assets/image/store/<?php echo $rows['product_image']?>" style="width:100px"></td>
            <td><?php echo $rows['product_name']?></td>
            <td><?php echo number_format($rows['product_price'],2)?></td>
            <td><?php echo $rows['cart_date']?></td>
            <td> <a href="includes/delcart.php?cart_id=<?php echo $rows['cart_id']?>" class="delcart"style="font-size:23px"><i class="fas fa-times" style="color:red"></i></a></td>
        </tr>   
         
        <?php $i++; }
        
        ?>

    </table>
    <br><br><br><br><br><br><br><br><br><br><br><br><a href="order.php" class="btn btn-success" style="margin-left: 970px;"> <?php echo $continue?></a>
    <br><br>
    </div>
    
    </div>
    
 <?php 
 include('includes/footer.php');
 
 ?>
<script src="node_modules/jquery/dist/jquery.min.js"></script><!--เรียกjquery -->
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script><!--เรียกpopper -->
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script><!--เรียกbootstrap.min.js -->
<script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script><!--เรียกjquery.validate -->
</body>
</html>
