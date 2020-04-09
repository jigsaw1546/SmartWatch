<style>
.dropdown-item {
  font-size:16px;
}
.navbar-nav .dropdown-menu {
    position: static;
    float: none;
    width: 280px;
    margin-top: 24px;
}
.itemcount {
  position: absolute;
  top: 3px;
  left: 63px;
  width: 15px;
  height: 15px;
  border-radius: 60%;
  background-color:black;
  font-size:10px;
  color: white;
  text-align: center;
}

</style>
<?php require_once('php/connect.php');
$mem_id=$_SESSION['mem_id'];
$sql="SELECT * FROM `cart`,`product`  WHERE cart.product_id=product.product_id AND cart.mem_id = '$mem_id'";
$result=mysqli_query($conn,$sql);
$sqlcount="SELECT COUNT(*) AS carttotal FROM `cart` WHERE mem_id = '$mem_id'";
$ressultcount=mysqli_query($conn,$sqlcount);
$rowcount=mysqli_fetch_array($ressultcount);
$_SESSION['carttotal']=$rowcount['carttotal'];
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
  <a class="navbar-brand " href="index.php"> SmartWatch </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    
  <div class="collapse navbar-collapse" id="navbarColor01">
    <?php if(isset($_SESSION["mem_id"])) {?>
<!-- login แล้ว -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-home"> </i> <?php echo $home?>  <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="stores.php"> <?php echo $store?> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php"><?php echo $about?> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="orderhistory.php"><?php echo $orderhistory?> </a>
      </li>
    </ul>
    
    <div class="form-inline my-2 my-lg-0">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <div class="dropdown show">
      <a class="nav-link dropdown-toggle active" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user"></i> <?php echo $_SESSION["mem_fname"]." ".$_SESSION["mem_lname"]?>
      </a>
      <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item " href="profile.php"><i class="far fa-address-card"></i> <?php echo $changeprofile?></a>
        
        <a class="dropdown-item" href="changepassword.php" data-toggle="modal" data-target="#mychangepassword" ><i class="fas fa-key"></i> <?php echo $changepassword?></a>
      </div>
    </div>
    </li>
    <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        
        <?php echo $cart;?> <i class="fas fa-shopping-cart fa-1x "></i><div class="itemcount"><?php echo $_SESSION['carttotal']?></div>
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <td colspan="3"><center><h5><?php echo $cartforme?></h5></td><br><br>
        <?php 
        $i=1;
        while($row=mysqli_fetch_array($result)){
          ?>
        
        <table  width="270"> 
        <tr>
        
        <td colspan="3" style="font-size:13px;color:black">
          <?php echo $i.". ".$row['product_name'];;?>
         
          </td>
          
        </tr>
        <tr>
          <td style="width:1%">
          <img src="assets/image/store/<?php echo $row['product_image']?>" name="imgcart" style="width:100px;">
          </td>
         
          <td style="font-size:14px;width:70px;color:black">
          <?php echo number_format($row['product_price'],2)." "."$baht";?>
          </td>
          <td align=center width="20px">
          <a href="includes/delcart.php?cart_id=<?php echo $row['cart_id']?>" class="delcart"style="font-size:23px"><i class="fas fa-times" style="color:red"></i></a>
          </td>
        </tr>
        
        </table>
        <?php  $i++?>
        <?php }?>
        <a href="cartview.php"><?php echo $cartmore;?></a>
      
 
      </li>
      <li class="nav-item active">
      <a class="nav-link " href="php/logout.php" ><i class="fas fa-sign-out-alt"></i> <?php echo $signout?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a href="?lang=en" class="flag-icon flag-icon-us nav-link"></a>
        <a href="?lang=th" class="flag-icon flag-icon-th nav-link"></a>
      </li>
      </ul>
    </div>
    </center>
    <!-- -------------------------------------------------------------------------------------- -->
    <?php }else{?> 
<!-- ไม่ได้login-->
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-home"> </i><?php echo $home ?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="stores.php"><?php echo $store ?> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php"><?php echo $about ?> </a>
      </li>
    </ul>
    
    <div class="form-inline my-2 my-lg-0">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link " href="login.php" data-toggle="modal" data-target="#mySignin" ><?php echo $signin?><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link " href="php/register.php" data-toggle="modal" data-target="#mySignup"><?php echo $signup ?>  <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a href="?lang=en" class="flag-icon flag-icon-us nav-link"></a>
        <a href="?lang=th" class="flag-icon flag-icon-th nav-link"></a>
      </li>
      </ul>
    </div>
    <?php }?>
  </div>
</nav> 


<?php  include('login.php');
include('php/changepassword.php');
include('register.php');    ?>

