<?php error_reporting(~E_NOTICE);?>
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
        
    }
    .container{
        background-color: white;
        color:black;
    }
    
    .card-5 {
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}
.card-3 {
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
}
    
</style>
<?php 
require_once 'config.php';
include('includes/navbar.php')?>
<body>
    <!-- The Modal -->
    <br><br> <br><br><br>
    <div class="container card-5">
        <h3><center><?php echo $about ?></center></h3><br>
        <div class="row">
  <div class="col-6 col-md-4 border border-secondary rounded card-3"><center><h5><?php echo$Contact ?></h5><?php echo $faddress."<br>".$femail."<br>". $ftel ?></center></div>
  <div class="col-6 col-md-4 border border-secondary rounded card-3"><center><h5><?php echo$history ?></h5></center><?php echo$historys ?></div>
  <div class="col-6 col-md-4 border border-secondary rounded card-3"><center><h5><?php echo$Service ?></h5><?php echo $Freeshipping."<br>".$Support24hr."<br>".$CashonDelivery ?></center></div><br>
  <div class="col-12 "><br><h5><center><?php echo $map?></center></h5><img style="width:1100px"src="assets/image/map.png "></div>
 
  
</div> <br>
    </div>
    <br> <br>
 <?php 
 include('includes/footer.php'); ?>
<script src="node_modules/jquery/dist/jquery.min.js"></script><!--เรียกjquery -->
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script><!--เรียกpopper -->
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script><!--เรียกbootstrap.min.js -->
<script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script><!--เรียกjquery.validate -->
</body>
</html>
