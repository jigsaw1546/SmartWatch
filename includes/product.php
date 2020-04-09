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
  body {
  background: #fff;
  color: #333;
  margin: 0 auto;
}

.right {
  float: right
}

.search input[type=search]::-webkit-search-decoration,
.search input[type=search]::-webkit-search-cancel-button {
  display: none;
}

.search input[type=search] {
  outline: none;
  font-family: inherit;
  font-size: 100%;
  background: transparent url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEzOSAxMzkiIGhlaWdodD0iMTM5cHgiIGlkPSJGaW5kIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMzkgMTM5IiB3aWR0aD0iMTM5cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0xMjcuNTU4LDExMS45NjFMMTAwLjI0OSw4NC42NWM0LjY0LTcuMzg3LDcuMzMzLTE2LjExOCw3LjMzMy0yNS40ODhjMC0yNi41MDktMjEuNDktNDcuOTk2LTQ3Ljk5OC00Ny45OTYgIGMtMjYuNTA4LDAtNDcuOTk2LDIxLjQ4Ny00Ny45OTYsNDcuOTk2YzAsMjYuNTEsMjEuNDg3LDQ3Ljk5NSw0Ny45OTYsNDcuOTk1YzEwLjE5NywwLDE5LjY0Mi0zLjE4OCwyNy40MTQtOC42MDVsMjYuOTg0LDI2Ljk4NiAgYzEuODc1LDEuODczLDQuMzMzLDIuODA2LDYuNzg4LDIuODA2YzIuNDU4LDAsNC45MTMtMC45MzMsNi43OTEtMi44MDZDMTMxLjMwOCwxMjEuNzg3LDEzMS4zMDgsMTE1LjcxMSwxMjcuNTU4LDExMS45NjF6ICAgTTU5LjU4NCw5MS42MDdjLTE3LjkxNywwLTMyLjQ0My0xNC41MjUtMzIuNDQzLTMyLjQ0M1M0MS42NjcsMjYuNzIsNTkuNTg0LDI2LjcyYzE3LjkxOCwwLDMyLjQ0MywxNC41MjYsMzIuNDQzLDMyLjQ0NCAgUzc3LjUwMiw5MS42MDcsNTkuNTg0LDkxLjYwN3oiLz48L3N2Zz4=') no-repeat 0 center;
  
  background-size: 30px;
  border: none;
  border-bottom: 3px solid transparent;
  color: transparent;
  padding: 15px;
  width: 10px;
  margin: 10px 0;
  cursor: pointer;
  z-index: 5;
  -webkit-transition: all .5s;
  -moz-transition: all .5s;
  transition: all .5s;
}

.search input[type=search]:focus {
  width: 300px;
  padding-left: 32px;
  background: none;
  border-bottom: 3px solid #333;
  color: #333;
  cursor: auto;
}

.search input[type=search]:hover {
  border-bottom: 3px solid #333;
}

input::-webkit-input-placeholder {
    color: transparent;
}
input:focus::-webkit-input-placeholder {
    color: #333;
}
/* Firefox < 19 */
input:-moz-placeholder {
    color: transparent;
}
input:focus:-moz-placeholder {
    color: #333;
}
/* Firefox > 19 */
input::-moz-placeholder {
    color: transparent;
}
input:focus::-moz-placeholder {
    color: #333;
}
/* Internet Explorer 10 */
input:-ms-input-placeholder {
    color: transparent;
}
input:focus:-ms-input-placeholder {
    color: #333;
}

.col-sm-4{
width:160px;
}

.card-5 {
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}

</style>
<?php include("php/connect.php"); ?>
<?php



if($_GET['product_tag']==""){
  $sql = "SELECT * FROM `product` ";
}else{
  $sql = "select * from product where `product_tag` =  '".$_GET['product_tag']."'  ";
}
$res = mysqli_query($conn, $sql);

?>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
<div class="container ">

<br><br><br><br><br>
<?php include('cateta.php') ?> 
<div id="result">
  
    <div class="row">
      
      <div class="card-deck ">
      
        <?php while ($row = mysqli_fetch_array($res)) { ?>
          <div class="col-sm-4" style="padding: 20px;">
          <!-- <div class="col-sm-4" style="padding: 20px;padding-left: 90px;"> -->
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
</div>
<!--- /container--->
