<style>
  /* Tags sale red*/
  .shopping-mall-tag {
    border-top-right-radius: .1875rem;
    border-bottom-right-radius: .1875rem;
    padding: 2px 6px;
    position: absolute;
    left: -4px;
    top: 6px;
    background-color: rgb(208, 1, 27);
    color: #fff;
  }

  .shopping-mall-tag::before {
    content: '';
    background-color: rgb(208, 1, 27);
    position: absolute;
    left: 0;
    bottom: -.1875rem;
    border-bottom: .1875rem solid currentColor;
    border-right: .1875rem solid transparent;
  }

  /* ----------------------- */
  /* Tags sale greenew*/
  .shopping-mall-tagn {
    border-top-right-radius: .1875rem;
    border-bottom-right-radius: .1875rem;
    padding: 2px 6px;
    position: absolute;
    left: -4px;
    top: 35px;
    background-color: rgb(44, 169, 3);
    color: #fff;
  }

  .shopping-mall-tagn::before {
    content: '';
    background-color: rgb(44, 169, 3);
    position: absolute;
    left: 0;
    bottom: -.1875rem;
    border-bottom: .1875rem solid currentColor;
    border-right: .1875rem solid transparent;
  }

  /* ----------------------- */
  .fonts {
    font-size: 23px;
  }

  .card {
    width: 300px;
    height: 500px;
  }

  .box {
    line-height: 14pt;
    height: 56pt;
    overflow: hidden;
  }

  .modal-xl {
    max-width: 850px !important;
  }

  .imgm {
    max-width: 100%;
    width: 300px;
  }

  .imgd {
    max-width: 100%;
    width: 95px;
  }
    .display-5{
    font-size:25px;
}
   
    .card-5 {
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}
</style>

<?php 
include_once('./php/connect.php');
$sql="SELECT * FROM product ORDER BY product_id DESC LIMIT 3";
$res=mysqli_query($conn,$sql);
?>
<!-- Show Shop -->
<div class="container"><br>
    <h3><center>New Collection</center></h3><br>
  <div id="result">
    <div class="row">
      <div class="card-deck">
        <?php while ($row = mysqli_fetch_array($res)) { ?>
          <div class="col-sm-4 ">
            <div class="card card-5"><a class="card-link" data-toggle="modal" data-target="#myModal<?php echo $row["product_id"]; ?>">
              <span class="shopping-mall-tagn">New </span><span class="shopping-mall-tag">Sale! </span>
              <img class="card-img-top border-bottom border-primary" src="assets/image/store/<?php echo $row["product_image"] ?>" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title " style="color:black"><?php echo $row["product_name"]; ?></h4>
                <p class="card-text box"><?php echo $row["product_detail"]; ?></p>
                
                
              </div>
              <div>
              <a class="card-link fonts" style="color:green;margin-left: 160px;"><?php echo number_format($row['product_price'], 2) ?>฿</a>
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
</div>
<!--- /container--->
