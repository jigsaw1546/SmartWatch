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
        color:black;
        background-color:white;
        
    } 
    .card-5{
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
    
}
    
</style>
<body>
<?php 
require_once 'config.php';
include('includes/navbar.php')?>
<br><br> <br><br><br>
     <div class="container">
     <section class="jumbotron jumbotron-fluid text-center card-5">
        <div class="container my-5 my-sm-1">
            <h1><?php echo $profile?></h1>
        </div>
    </section>
    <?php 

$mem_id=$_SESSION['mem_id'];
$sql="select * from members where mem_id = $mem_id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
?>
    <section class="container my-3 card-5">
        <div class="row">
            <div class="col-12 profile-top ">
                
                <div class="card">
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="mem_username"><?php echo $user;?></label>
                                <input type="text" class="form-control" id="mem_username" value="<?php echo $row['mem_username']?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mem_fname"><?php echo $name;?></label>
                                <input type="text" class="form-control" id="mem_fname" value="<?php echo $row['mem_fname']?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mem_lname"><?php echo $lname;?></label>
                                <input type="text" class="form-control" id="mem_lname" value="<?php echo $row['mem_lname']?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mem_email"><?php echo $mail;?></label>
                                <input type="email" class="form-control" id="mem_email" value="<?php echo $row['mem_email']?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mem_tel"><?php echo $tel;?></label>
                                <input type="text" class="form-control" id="mem_tel" value="<?php echo $row['mem_tel']?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="mem_address"><?php echo $add;?></label>
                                <textarea class="form-control" id="mem_address" rows="5" disabled><?php echo $row['mem_address']?> </textarea>
                            </div>
                            <a href="profile-edit.php"class="btn btn-warning float-right">แก้ไขข้อมูล</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div></div>
<?php include('includes/footer.php'); ?>
<script src="node_modules/jquery/dist/jquery.min.js"></script><!--เรียกjquery -->
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script><!--เรียกpopper -->
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script><!--เรียกbootstrap.min.js -->
<script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script><!--เรียกjquery.validate -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>

