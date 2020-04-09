
<?php 
include('../config.php');

?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password,"smartwatch");

$output='';
// $noysud=$_POST['noysud'];
$sql2="SELECT * FROM product WHERE product_name LIKE '%".$_POST['search']."%'";

//$sql3="SELECT * FROM product WHERE product_tag ";
// $sql3="SELECT * FROM `stores` WHERE `store_price` ; <= $_POST['noysud']";

$result = mysqli_query($conn,$sql2);
  if(mysqli_num_rows($result)>0){
    $output.="";
      ?>
        <div id="result">
        <br><br><br><br><br>
        <div class="row">
          <div class="card-deck ">
          
            <?php while ($row = mysqli_fetch_array($result)) { ?>
              <div class="col-sm-4" style="padding: 20px;padding-left: 90px;">
               
                <div class="card card-5 " data-toggle="modal" data-target="#myModal<?php echo $row["product_id"]; ?>">
                  <span class="shopping-mall-tagn">New </span><span class="shopping-mall-tag">Sale! </span>
                  <img class="card-img-top border-bottom border-primary" src="assets/image/store/<?php echo $row["product_image"] ?>" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title" style="color:black"><?php echo $row["product_name"]; ?></h4>
                    <p class="card-text box"><?php echo $row["product_detail"]; ?></p>
                    
                    <a class="card-link fonts" style="color:green;margin-left: 100px"><?php echo number_format($row['product_price'], 2) ?>฿</a>
                  </div>
                  <!-- /////////////////////  -->
                  <p class="card-text">
                    <form action="includes/addcart.php" method="post">
                      <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                      <button type="submit" class="btn btn-danger btn-lg btn-block" style="padding-top: 15px;padding-bottom: 15px;" name="addcart">Add To Cart <i class="fas fa-shopping-cart fa-1x"></i></button>
                    </form>
                    <!-- /////////////////////  -->
                </div>
                <br><br><br>
                <!-- The Modal -->
                <div class="modal fade " id="myModal<?php echo $row["product_id"]; ?>">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">
                          <h4 class="card-title"><?php echo $row["product_name"]; ?></h4>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-sm-5">
                            <!-- Gallery -->
                            <div id="js-gallery" class="gallery">
                              <!--Gallery Hero-->
                              <div class="gallery__hero">
                                <img class="imgm" src="assets/image/store/<?php echo $row["product_image"] ?>">
                              </div>
                            </div>
                            <!--.gallery-->
                            <!-- Gallery -->
                          </div>
                          <div class="col-sm-7">
                            <h3><?php echo $row['product_name'] ?></h3>
                            <br>
                            <div>
                              <?php echo $row['product_detail'] ?></div>
                            <h2><?php echo $price;
                                echo " ";
                                echo number_format($row['product_price'], 2);
                                echo " ";
                                echo $baht; ?></h2>
                            <br>
                          </div>
                        </div>
                        <form action="includes/addcart.php" method="post">
                          <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                          <button type="submit" class="btn btn-danger btn-lg btn-block" style="padding-top: 15px;padding-bottom: 15px;" name="addcart">Add To Cart <i class="fas fa-shopping-cart fa-1x"></i></button>
                          <button type="submit" class="btn btn-success btn-lg btn-block" style="padding-top: 15px;padding-bottom: 15px;" name="addcart">Buy<i class="fas fa-shopping-cart fa-1x"></i></button>
                        </form>
                      </div>
                    </div>
                    <!-- Modal footer -->
                  </div>
                </div>
              </div>
            <?php } ?>
            <!--- /col-md4 --->
          </div>
          <!-- /model -->
        </div>
        <!--- /card-deck--->
      </div>
      <!--- /row--->
    </div>
    <!--- /result--->
    <?php
    }else{
      echo "<br><br><br><center><h4>Data Not Found</h4></center>
      <br>
      ";
    }



?>
